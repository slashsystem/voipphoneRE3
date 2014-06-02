<?php


#-----------------------------------------------------------------#
# $Rev:: 21            $:  Revision of last commit                #
#-----------------------------------------------------------------#

/**
 * class AppController
 *
 */
class AppController extends Controller {

	// class variables
	var $_Filter = array ();

	// setup components
	var $components = array (
		'Filter',
		'AutoPaginate',
		'Authentication',
		'FileUpload'
	);
	// default datetime filter
	var $_Form_options_datetime = array ();
	var $helpers = array (
		'Html',
		'Form',
		'Javascript',
		'Session'
	);
	var $uses = array (
		'Station',
		'Stationkey',
		'Feature',
		'Location',
		'Log',
		'Customer'
	);
	//var $layout = 'default';

	/**
	 * Before any Controller action
	 */
	function beforeFilter() { //echo session_save_path();die();
		$cameFrom = $this->here;
	    $this->log('APP CONTROLLER : Start of before_filter, came from : ' . $cameFrom , LOG_DEBUG);
	    

	    #Add a bypass for all of the pages that don't require authenticaiton
	    
	    preg_match("/\/xmlengines\//", $cameFrom, $matches);
	    if ($matches[0]) {
	    	$this->log('APP CONTROLLER : EXITING BEFORE FILTER FOR URL  ' . $cameFrom, LOG_DEBUG);
	    	#exit;
	    	return;
	    }
	    
	    
	    
	    
	    #Load XML Handler
	    
	    App::import('Vendor', 'array2xml');
	    
	    
	    #--------------Security Check for XSS -------------
	    $sec_uri = $this->params['pass'];
	    #$sec_ul = $this->params['url'];
	    $this->log('APP CONTROLLER : PAssed URI' . $sec_uri[0], LOG_DEBUG);
	    
	    #$secItems = explode('/', $ul['url']);
		#$url_array=print_r($for_sort, true);
		foreach($sec_uri as $uriCheckItem)
	    {
	    	$this->log('APP CONTROLLER : CHECKING URI' . $uriCheckItem, LOG_DEBUG);
	    	if(preg_match('/^[\w-@]+$/', $uriCheckItem) && ( strlen($uriCheckItem) < 13))
	    	{
	    			$this->log('APP CONTROLLER : VALID URI' . $uriCheckItem, LOG_DEBUG);
	    	}	
	    	else
	    	{
	    			$this->log('APP CONTROLLER : INVALID URI' . $uriCheckItem, LOG_DEBUG);
	    			$this->log('INVALID URI : ' . $uriCheckItem);
	    			$this->cakeError('accessDenied');
	    			$this->redirect('/customers');
	    	}
	    }
	    
			#if (isset ($uri[0]))
			#	$url = $uri[0];
			#else
			#	$url = '';
			#if (empty ($url)) {
			#	$url = '/';
			#}
						
   		#----------------End Security Check-----------------
	    

		// keep the debug log in in the debug file
		#foreach ($_SERVER as $key => $value) {

		#	$this->params[$key] = $value;
		#}
		#$session_array=print_r($_SESSION, true);
		#$this->log('App controller : SESSION DATA ' . $session_array, LOG_DEBUG);
		
		#$this->log($this->params, LOG_DEBUG);
		//echo $this->Session->read('SELECTED_CUSTOMER');die();
		//$this->Session->write('SELECTED_CUSTOMER',169572);	die();

		#if ((!$this->Session->read('SELECTED_CUSTOMER')) || (!$this->Session->read('APPNAME')) || ($this->Session->read('APPNAME') == '')) {
		if ((!$this->Session->read('SELECTED_CUSTOMER'))) {
			$this->log('APP CONTROLLER : NOT SET : SELECTED_CUSTOMER -> ' . $this->Session->read('SELECTED_CUSTOMER') , LOG_DEBUG);

			// check the authentication
			$value = $this->Authentication->authenticate();
			
			

			/**************activity log*****************/

			#$log_string	= date('Y-m-d H:i:s') .' Activity :'.$value['user_id'].' || '.$value['USERNAME'].' | Logged on ||'	;
			$log_string = $value['user_id'] . ' || ' . $value['USERNAME'] . ' | Logged on ||';

			$this->log($log_string, 'activity');
			$this->log($log_string, 'debug');

			/**************activity log*****************/

			//$this->log('Logged by user '. $value['USERNAME'].' and id is '.$value['user_id'], 'activity');	

			$this->Session->write('SELECTED_CUSTOMER', $value['user_id']);
			$this->Session->write('ACCOUNTID', $value['ACCOUNTID']);
			$this->Session->write('ACCOUNTNAME', $value['ACCOUNTNAME']);
			$this->Session->write('USERNAME', $value['USERNAME']);
			$this->Session->write('USERFIRSTNAME', $value['USERFIRSTNAME']);
			$this->Session->write('ORGANIZATION', $value['ORGANIZATION']);
			$this->set('userpermission', $this->Session->read('SELECTED_CUSTOMER'));
			$this->set('userid', $this->Session->read('ACCOUNTNAME'));
			#$_SESSION['Config']['language'] = $value['lang'];
			$_SESSION['Config']['language'] = strtolower($value['lang']);
			$this->Session->write('APPNAME', $value['APPNAME']);
			#$this->log('APP CONTROLLER : SETTING APPNAME -> ' . $value['APPNAME'], LOG_DEBUG);
			$this->log('APP CONTROLLER : SETTING APPNAME ->' . $value['APPNAME'] , LOG_DEBUG);

			#Find all customer records with matching BSK and matching tyoe to the application accessed
			if ($value['user_id']) 
			{
				#$this->log("App controller : redirecting", LOG_DEBUG);
				#$this->redirect('/customers');



				$record = $this->Customer->find('all', array (
					'conditions' => array (
						"Customer.status" => array (
							1,
							2,
							3
						),
						'Customer.bsk' => $value['user_id']
					)
				));
				#$this->log("vAR HERE0", LOG_DEBUG);	
				if (empty ($record) && Configure :: read('access_id') != $value['user_id']) 
				{
					#$this->log("Some one trying to loggin with id ".$value['user_id']);
					$this->log("APP Controller : Invalid SSO data " . $value['user_id']);
					$this->log("APP Controller : Access Denied : Invalid SSO data " . $value['user_id'], LOG_DEBUG);
					$this->layout = 'ajax';
					$this->cakeError('accessDenied');
					#$this->log("vAR HERE1", LOG_DEBUG);	
				} else 
				{
					

                       			$insert = array(
                       			'Log' => array(
               		        	'log_entry'   =>    'User logged in',
                       			'slug'   =>    '',
               		        	'created'              =>   date('Y-m-d H:i:s'),
               	        		'modified'              =>   date('Y-m-d H:i:s'),
                       			'status'               =>      1,
                       			'modification_status'               =>      '1',
               	        		'modification_response'               =>      ' ',
                       			'bsk'  =>      $this->Session->read('SELECTED_CUSTOMER'),
               	        		'customer_id'     =>     $record[0]['Customer']['id'],
                       			'affected_obj'     =>      '',
			      		'user'	=>	$this->Session->read('ACCOUNTNAME'),
		         		'app_type'	=> $value['APPNAME']	
		                   
      					)
					);
			
					$this->Log->create();
					$this->Log->save($insert,false);


					if ($value['user_id'] == Configure :: read('access_id')) {
						$this->log("App controller : Internal user redirecting to Customers", LOG_DEBUG);
						$this->redirect('/customers');
						
					} else {
							
						$this->log("App controller : Phone access : no session(selected_customer)", LOG_DEBUG);
						#$this->redirect('/dns/viewdns/customer_id:' . $record[0]['Customer']['id']);
						$this->redirect('/customers/edit?customer_id:' . $record[0]['Customer']['id']);
					}
				}

			}
		}
		
		#To get here user should already have a session. To check for users who have 
		
		
		$this->log("App controller : Has selected customer session  " . $this->Session->read('APPNAME') . ' APP', LOG_DEBUG);	
		#If There is already a sessio then continue here. 
		$this->set('userpermission', $this->Session->read('SELECTED_CUSTOMER'));
		$this->set('userid', $this->Session->read('ACCOUNTNAME'));
		// for index actions
		if ($this->action == 'index' || $this->action == 'index1' || $this->action == 'viewlog' || $this->action == 'viewdns') {
			
			$this->log('App controller : Index action', LOG_DEBUG);

			// setup filter component
			$this->_Filter = $this->Filter->process($this);

			//$url = $this->Filter->url;
			$uri = $this->params['pass'];
			if (isset ($uri[0]))
				$url = $uri[0];
			else
				$url = '';
			if (empty ($url)) {
				$url = '/';
			}
						
		
			$ul = $this->params['url'];
			
			$for_sort = explode('/', $ul['url']);
			#$url_array=print_r($for_sort, true);
			#$this->log('App controller : URL PARAMS ' . $url_array, LOG_DEBUG);

			$this->set('filter_sort', $for_sort);

			/*if(in_array('direction:asc',$for_desc))
			
			
			if(in_array('direction:asc',$for_desc))
			$this->set('filter_options',array('url'=>array($url), 'id'=>'sortlink_asc'));
			elseif (in_array('direction:desc',$for_desc))
			$this->set('filter_options',array('url'=>array($url), 'id'=>'sortlink_desc'));
			else */

			$this->set('filter_options', array (
				'url' => array (
					$url
				),
				'id' => 'sortlink'
			));
			
			$this->set('filter_ur', trim($url, '/'));

			if (isset ($this->data['reset']) || isset ($this->data['cancel'])) {
				$this->log("App controller : redircting to index page.", LOG_DEBUG);
				$this->redirect(array (
					'action' => 'index'
				));
			}
			$this->log("App controller : End before filter  ", LOG_DEBUG);
		}
	}

	/**
	 * Builds up a selected datetime for the form helper
	 * @param string $fieldname
	 * @return null|string
	 */
	function process_datetime($fieldname) {
		$selected = null;
		if (isset ($this->params['named'][$fieldname])) {
			$exploded = explode('-', $this->params['named'][$fieldname]);
			if (!empty ($exploded)) {
				$selected = '';
				foreach ($exploded as $k => $e) {
					if (empty ($e)) {
						$selected .= (($k == 0) ? '0000' : '00');
					} else {
						$selected .= $e;
					}
					if ($k != 2) {
						$selected .= '-';
					}
				}
			}
		}
		return $selected;
	}
	
	
	function convertToJQueryDate($str){
	  
	  if($str!=""){
	    $strArr=explode("-",$str);
	    if(count($strArr)==3){
		$strArr[2] = "0".$strArr[2];
	      return $strArr[2]."/".$strArr[1]."/".$strArr[0];
	    }
	  }
	  return $str;

	}
	
	
	/*_____________________________________________________________________________
	Function:	covertToSystemDate
	*	@param:	$date  dd/MM/YYYY
	*/
	function convertToSystemDate($date){
	  $dateArr=explode("/",$date);
	  $newDate="";
	  if(in_array("",$dateArr)){
	    return $newDate;
	  }
	  if(count($dateArr)==3){
	    return $newDate=$dateArr[2]."-".$dateArr[1]."-".$dateArr[0];
	  }
	  return $newDate;

      
	}
}
?>
