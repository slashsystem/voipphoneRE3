<?php
/**
 * Mediatrix Controller
 *
 * file: /app/controllers/mediatrix_controller.php
 */
class MediatrixesController extends AppController {
	// good practice to include the name variable
	var $uses = array('Mediatrix', 'Station', 'Location', 'Port');
	var $name = 'Mediatrixes';
	var $paginate = array('Paginate' => 15, 'page' => 1); 

	
	// load any helpers used in the views
	var $helpers = array('Html', 'Form', 'Javascript','General');
	
	function beforeFilter (){
		parent::beforeFilter();
		
		if(!$this->Session->read('SELECTED_CUSTOMER')){
			$this->layout='ajax';
			$this->log('MEDIATRIX CONTROLLER SESSION EXPIRED', LOG_DEBUG);
			$this->cakeError('sessionExpired'); 
			
		
		}
		
	}

	/**
	 *
	 * index()
	 * main index page of the locaitons page
	 * url: /locations/index
	 */
	function index () {
		$this->paginate['Paginate']	=	$this->AutoPaginate->setPaginate();
		
	//	echo "<pre>";print_r($this->params);

		$customer_id=isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:"");
		
		
		$cond1 = array('Location.customer_id'=>$customer_id);
		if (isset($customer_id) && $customer_id )
		{
			$this->passedArgs['customer_id'] = $customer_id;
			$this->Session->write('cond', serialize($cond1));
			$condition_array=print_r($cond1, true);
			$this->log("Mediatrix controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
		
		}
		
		$mediatrix_desc=isset($this->params['url']['mediatrix_desc'])?$this->params['url']['mediatrix_desc']:(isset($this->params['named']['mediatrix_desc'])?$this->params['named']['mediatrix_desc']:"");
		if($mediatrix_desc!=''){
			$cond1 = array_merge($cond1,array('Mediatrix.location_desc LIKE'=>'%'.$mediatrix_desc.'%'));
			$this->passedArgs['mediatrix_desc'] = $mediatrix_desc;
			$this->Session->write('cond', serialize($cond1));
			$condition_array=print_r($cond1, true);
			$this->log("Mediatrix controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
		}
		
		$location_id=isset($this->params['url']['location_id'])?$this->params['url']['location_id']:(isset($this->params['named']['location_id'])?$this->params['named']['location_id']:"");
		if($location_id!=''){
			$cond1 = array_merge($cond1,array('Location.id LIKE'=>'%'.$this->params['url']['location_id'].'%'));
			$this->passedArgs['location_id'] = $location_id;
			$this->Session->write('cond', serialize($cond1));
			$condition_array=print_r($cond1, true);
			$this->log("Mediatrix controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
		}
		#$cond1 = array();
		
		
		
		
		/*$mediatrix_id=isset($this->params['url']['id'])?$this->params['url']['mediatrix_id']:(isset($this->params['named']['mediatrix_id'])?$this->params['named']['mediatrix_id']:"");*/
	$mediatrix_id=isset($this->params['url']['id'])?$this->params['url']['id']:(isset($this->params['named']['id'])?$this->params['named']['id']:"");
		
		if($mediatrix_id!=''){
			$cond1 = array_merge($cond1,array('Mediatrix.name LIKE'=>'%'.$mediatrix_id.'%'));
			$this->passedArgs['id'] = $mediatrix_id;
			$this->Session->write('cond', serialize($cond1));
			$condition_array=print_r($cond1, true);
			$this->log("Mediatrix controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
		}
		
		
		
		
		
		
	
		#$this->set('portCount', $this->Mediatrix->find('all',
		#		array(
		#				'fields' => array(
		#						'Mediatrix.id',
		#						'Port.id',
		#				'count(Mediatrix.id)'),
		#				'group' => 'Meditrix.id',
		#				'conditions' => array('Location.customer_id' => $customer_val))
		#));
		

		
		#$this->set('title_header','Mediatrix List');
		$this->pageTitle = 'Mediatrix List';
		
		$customer = $this->Customer->find('first',array('contain'=>array('Location'),'conditions'=>array('id'=>$customer_id)));
		foreach($customer['Location'] as $key=>$value):
			$locations[$value['id']] =  $value['name'];
			
		endforeach;
		$custName = $customer['Customer']['name'];
		$custId = $customer['Customer']['id'];
		$this->Session->write('Customer.Name', $custName);
		$this->Session->write('Customer.Id', $custId);
		$this->set('custId',$custId);
		$this->set('SELECTED_CNN',$custId);
		$this->set('cust_for_layout',$custName);
		$this->set('custName',$custName);
		$this->set('selected_customer',  $custName);
		$this->set('locations',  $locations);
		
	
		#$join_locations = array('table'=>'locations','alias'=>'Location','type'=>'INNER','foreignKey'=>false,'conditions'=>$cond);
		
		$this->paginate = array('conditions'=>$cond1,'fields'=>array('Mediatrix.*,Location.name'),'order'=>'Location.name asc','limit' => $this->paginate['limit']);
		$results = $this->paginate('Mediatrix');
		
		#$mediatrixArray = print_r($results, true);
		#$this->log("DNS controller : details aray : $mediatrixArray", LOG_DEBUG);
		
		#pr($results);die;
		
		$this->set('mediatrices', $results);
		
			
		$portCount = $this->Mediatrix->find('all',
				array(
						'fields' => array(
						'Location.id,Location.name,Location.plz,Location.scm_name,Location.address, Mediatrix.*'),
						'conditions' => array('Location.customer_id' => $customer['Customer']['id']))
		);
		
		foreach($portCount as $med)
		{
			$portfreeMap[$med['Mediatrix']['id']] =  0	;
			foreach ($med['Port'] as $portC)
			{
				$porttotalMap[$med['Mediatrix']['id']] =  $porttotalMap[$med['Mediatrix']['id']] + 1;
				if ($portC['station_id'] == '')
				{
					$portfreeMap[$med['Mediatrix']['id']] =  $portfreeMap[$med['Mediatrix']['id']] + 1;
				
				}
			}
			#foreach ($med['Location'] as $loc)
			#{
				//$validLocation[$med['Location']['id']] =  $med['Location']['name'];
				
			if($med['Location']['scm_name']=="" && $med['Location']['address']!="" ) {
				$validLocation[$value['id']] =$locationstring = $med['Location']['name'] . ' ( ' . $med['Location']['plz'] . ' ,' .$med['Location']['address'].' )';
			}
			elseif($med['Location']['address']=="" &&  $med['Location']['scm_name']!="") {
				$validLocation[$med['Location']['id']] =$locationstring =$med['Location']['name'] . ' ( ' .$med['Location']['plz'] . ' ,' .$med['Location']['scm_name'].' )';
			}
			elseif($med['Location']['address']=="" &&  $med['Location']['scm_name']=="") {
            $validLocation[$med['Location']['id']]  = $med['Location']['name'] . ' ( ' . $med['Location']['plz'] .' )';
			}
			else {
				$validLocation[$med['Location']['id']] =  $med['Location']['name'] . ' ( ' . $med['Location']['plz'] . ' ,' . $med['Location']['scm_name'] . ','.$med['Location']['address'].' )';
			}
				
				
				
				
				
				
			#}
		}
		$this->set('validLocation',$validLocation);
		$locs = print_r($validLocation, true);
		$this->log("Mediatrix controller : valid lcoations: $locs", LOG_DEBUG);
		$mediatrixArray = print_r($portCount, true);
		$this->log("DNS controller : details aray : $mediatrixArray", LOG_DEBUG);
		#$mediatrixArray = print_r($portCount, true);
		#$this->log("DNS controller : details aray : $mediatrixArray", LOG_DEBUG);
		
		$this->set('porttotalMap',$porttotalMap);
		$this->set('portfreeMap',$portfreeMap);
		
		#For export usage
		
		if(isset($this->params['url']['type']) && $this->params['url']['type']=='detail'){
			$this->layout = false;
			$this->render('viewdnsdetail');
		}
	}
	
  
	/**
	 * edit()
	 * displays a single Location and all related stations
	 * url: /formats/view/Location_slug
	 */
	function edit ($mediatrix_id = null) {
		
		$this->pageTitle = 'Mediatrix Edit';
		
		$mediatrix_id=isset($this->params['url']['mediatrix_id'])?$this->params['url']['mediatrix_id']:(isset($this->params['named']['mediatrix_id'])?$this->params['named']['mediatrix_id']:"");
		
		#Save form data
		
		if(isset($this->data))
		{
			$this->log('MEDIATRIX CONTROLLER : EDIT  => MEDIATRIX_ID WITH POSTED DATA' . $mediatrix_id, LOG_DEBUG);
			$medsave['Mediatrix']['id'] = $mediatrix_id;
			$medsave['Mediatrix']['location_desc'] = $this->data['Mediatrix']['location_desc'];
			$medsave['Mediatrix']['location_id'] = $this->data['Mediatrix']['location_id'];
			$medsave['Mediatrix']['ipaddress'] = $this->data['Mediatrix']['ipaddress'];
			$medsave['Mediatrix']['mask'] = $this->data['Mediatrix']['mask'];
			$medsave['Mediatrix']['default_gw'] = $this->data['Mediatrix']['default_gw'];
			$medsave['Mediatrix']['status'] = 4;
			$medUpdate = $this->Mediatrix->save($medsave, false,  array('id','location_desc', 'location_id', 'ipaddress', 'mask', 'default_gw','status'));
		
		}
		
				
		
		$mediatrix = $this->Mediatrix->find('all',array('conditions'=>array('Mediatrix.id'=>$mediatrix_id)));
		$mediatrix_array=print_r($mediatrix, true);
		$this->log("Mediatrix controller : Mediatrix Details : $mediatrix_array", LOG_DEBUG);
		$cust_id	= $mediatrix[0]['Location']['customer_id'];
		$location_id	= $mediatrix[0]['Location']['id'];
	
		
		
		
		$mediatrix_array=print_r($location, true);
		$this->log("Mediatrix controller : Edit Page" .  $mediatrix_array, LOG_DEBUG);
	
		$this->set('title_header','Mediatrix Edit');
	
		
		$stations = $this->Station->find('all',array('conditions'=>array('Station.customer_id'=>$cust_id)));
		foreach ($stations as $station)
		{
			$portMap[$station['Station']['port']] = $station['Station']['id'];
			$this->set('portMap',  $portMap);
		}
		$condition_array=print_r($portMap, true);
		$this->log("Mediatrix controller : Setting 	port_map : $condition_array", LOG_DEBUG);
		
		$customer = $this->Customer->find('first',array('contain'=>array('Location'),'conditions'=>array('id'=>$cust_id)));
		foreach($customer['Location'] as $key=>$value):
		$locations[$value['id']] =  $value['name'];
		endforeach;
		#$location_array=print_r($locations, true);
		#$this->log("Mediatrix controller : Location Details : $location_array", LOG_DEBUG);
		
		$this->set('locations',$locations);
		$this->set('location_id',$location_id);
		$this->log("Mediatrix controller : Location ID" . $location_id, LOG_DEBUG);
		$custName = $this->Session->read('Customer.Name');
		$this->set('cust_for_layout',$custName);
		$this->set('custId',$cust_id);
		$this->set('SELECTED_CNN',$cust_id);
				
		$this->set('selected_customer',  $custName);
		 
		$this->set('mediatrix', $mediatrix);
		$this->log("Mediatrix controller : END", LOG_DEBUG);
	
	
	}
	
		//function for export station data in csv format.
	// function export()
	// {
	// 	$this->layout = ""; 
		
	// 	$conds = unserialize($this->Session->read('cond'));
		
	// 	$filename = "export_dns_".date("Y.m.d").".csv";
	// 	$csv_file = fopen('php://output', 'w');
	// 	header('Content-type: application/csv');
	// 	header('Content-Disposition: attachment; filename="'.$filename.'"');
	// 	$this->loadModel('Dns');
	// 	$results = $this->Dns->find('all',array('fields' => array('Dns.id', 'Location.name', 'Dns.emer', 'Dns.function', 'Dns.display'),'order'=>'Dns.id ASC','conditions' => $conds)); 
	// 	$header_row = array(__("S.No.", true), __("ID", true), __("Location", true), __("Emergency", true), __("Function", true), __("DISPLAYNAME", true));
	// 	fputcsv($csv_file,$header_row,';','"');
	
	// 	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	// 	$i=1;
	// 	foreach($results as $result)
	// 	{
			
	// 		// Array indexes correspond to the field names in your db table(s)
	// 		$row = array(
	// 			$result['Dns']['Sno']= $i,
	// 			$result['Dns']['id'],
	// 			$result['Location']['name'],
	// 			$result['Dns']['emer'],
	// 			__($result['Dns']['function'], true),
	// 			$result['Dns']['display']
	// 		);
	// 		$i++;
	// 		fputcsv($csv_file,$row,';','"');
	// 	}
	
	// 	fclose($csv_file);exit();
	// }
	
	function blurb_info(){
		 $this->layout = false;
	}


	function export()
	{
		$this->layout = ""; 
		
		$conds = unserialize($this->Session->read('cond'));
		
		$filename = "export_mediatrixes_".date("Y.m.d").".csv";
		$csv_file = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		//$this->loadModel('Dns');
		//print_r($conds);
		//exit;
		$results = $this->Mediatrix->find('all',array('conditions' => $conds)); 
		
		//print_r($results);
		//exit;

		$header_row = array(__("S.No.", true), __("ID", true), __("Location", true), __("Default gw", true), __("Mask", true), __("Ip address", true));
		fputcsv($csv_file,$header_row,';','"');
	
		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		$i=1;
		foreach($results as $result)
		{
			
			// Array indexes correspond to the field names in your db table(s)
			$row = array(
				$result['Mediatrix']['Sno']= $i,
				$result['Mediatrix']['id'],
				$result['Location']['name'],
				$result['Mediatrix']['default_gw'],
				$result['Mediatrix']['mask'],
				//__($result['Dns']['function'], true),
				$result['Mediatrix']['ipaddress']
			);
			$i++;
			fputcsv($csv_file,$row,';','"');
		}
	
		fclose($csv_file);exit();
	}
	
	
}
?>
