<?php


#-----------------------------------------------------------------#
# $Rev:: 40            $:  Revision of last commit                #
#-----------------------------------------------------------------#

/* Controller for  station
 *	Develeoper	:	Mano
 *	Date		:	05 JULY 2010
 */
class StationsController extends AppController {

	/**
	 * name property
	 * @var string 'Stations'
	 * @access public
	 */
	var $name = 'Stations';
	var $uses = array (
		'Station',
		'CStation',
		'CFeature',
		'Stationkey',
		'Feature',
		'Location',
		'Log',
		'Userlog',
		'Customer',
		'Group',
		'Port',
		'Dns',
		'Transaction',
		'Transentry',
		'Xmlengine'
	);

	// load any helpers used in the views
	var $helpers = array (
		'Html',
		'Form',
		'Javascript',
		'Paginator'
	);
	var $paginate = array (
		'Paginate' => 15,
		'page' => 1
	);
	var $components = array (
		'Authentication',
		'AlgInterface',
		'TransferMoh',
		'Pagination',
		'RequestHandler'
	);

	function beforeFilter() {

		parent :: beforeFilter();

		if (!$this->Session->read('SELECTED_CUSTOMER')) {
			$this->layout = 'ajax';
			$this->log("Station controller : No Selected Customer : using AJAX", LOG_DEBUG);
			$this->cakeError('sessionExpired');
		}
		
	}

	/**
	 * default action
	 *
	 */
	function selectstation() { //print_r($_POST);die();
		$this->pageTitle = 'Station Select';
		
		$group_id=isset($this->params['url']['group_id'])?$this->params['url']['group_id']:(isset($this->params['named']['group_id'])?$this->params['named']['group_id']:""); 
		$stationlocation_id=isset($this->params['url']['location_id'])?$this->params['url']['location_id']:(isset($this->params['named']['location_id'])?$this->params['named']['location_id']:"");
		$this->log("Station controller : Select Station GROUP ID => $group_id", LOG_DEBUG);  
		
		if($stationlocation_id != '')
		{
			$locationDetails = $this->Location->find('first',array('conditions'=>array('Location.id'=>$stationlocation_id)));
			$stationlocation_id = $locationDetails['Location']['name'];
		}
		
		
		
		if ($group_id != '')
		{

			$group_array = $this->Group->find('all',array('conditions'=>array('Group.id'=>$group_id)));
			
			#$g_array=print_r($group_array, true);
			#$this->log("Station controller : Select STATION" .  $g_array, LOG_DEBUG);
			$customer_id = $group_array[0]['Group']['customer_id'];
			
			#Find all stations that have a free Key
			
			
			#$freeKeyStations = $this->Station->getStationsWithFreeKey($customer_id); # ???Check performance of this query.
			
			#$g_array=print_r($freeKeyStations, true);
			#$this->log("Station controller : STATIONS WITH NO FREE KEY" .  $g_array, LOG_DEBUG);
			#$freeKeyStationIds = array();
			#foreach ($freeKeyStations as $freeKeyStation)
			#{
			#	array_push($freeKeyStationIds, $freeKeyStation['T1']['station_id']);
			#}
			
			##End free key
			
			$group_type = strtoupper($group_array[0]['Group']['type']);
			$identifier = $group_array[0]['Group']['identifier'];
			if ($group_type == 'CPU')
			{
				$groupMemberStations = $this->Stationkey->find('all',array(
						'fields'=>array('Stationkey.station_id'),
						'joins' => array(
              			      array(
                        	'table' => 'features',
                        	'type' => 'LEFT',
                        	'alias' => 'Feature',
                        	'conditions' => array('Feature.stationkey_id = Stationkey.id')
  
                    )
                ),
				'conditions'=>array('Station.customer_id'=>$customer_id,'Feature.short_name'=> array('cpu'))));
			
				$groupMemberStationids = array();
				#$g_array=print_r($groupMemberStations, true);
				#$this->log("Station controller : CPU Station array" .  $g_array, LOG_DEBUG);
				foreach ($groupMemberStations as $groupMemberStation)
				{
					$this->log('STATION CONTROLLER : GROUP MEMBER STATION ' . $groupMemberStation['Stationkey']['station_id'], LOG_DEBUG);
					array_push($groupMemberStationids, $groupMemberStation['Stationkey']['station_id']);
				}
				//Comment 28 apr 2014
				/*$cond = array (
					    'Station.id NOT' => $groupMemberStationids,
						'Station.id' => $freeKeyStationIds,
						'Customer.id'=>$customer_id
						
				);*/
				$cond = array (
					    'Station.id NOT' => $groupMemberStationids,						
						'Customer.id'=>$customer_id
						
				);
				#$cond = array (
				#		'Customer.id'=>$customer_id
				
				#);
			}
			elseif ($group_type == 'MADN')
			{
				
				
				
				#???REMOVE MADN Members
			
				/*
				 * 
				 *$existingStations = $this->Stationkey->find('all',array(
						'fields'=>array('Stationkey.station_id'),
						'joins' => array(
								array(
										'table' => 'features',
										'type' => 'LEFT',
										'alias' => 'Feature',
										'conditions' => array('Feature.stationkey_id = Stationkey.id')
			
								)
						),
						'conditions'=>array('Station.customer_id'=>$customer_id,'Feature.short_name'=> array('MADN'))));
					
				$groupMemberStationids = array();
				$g_array=print_r($existingStations, true);
				$this->log("Station controller : MADN Station array" .  $g_array, LOG_DEBUG);
				foreach ($existingStations as $groupMemberStation)
				{
					$this->log('GROUPS CONTROLLER : GROUP MEMBER STATION ' . $groupMemberStation['Stationkey']['station_id'], LOG_DEBUG);
					array_push($groupMemberStationids, $groupMemberStation['Stationkey']['station_id']);
				}
				
				
				
				#??? With exclusision for test
				
				
				$cond = array (
						'Station.id NOT' => $groupMemberStationids,
						'Station.type' => 'CICM',
						'Customer.id'=>$customer_id
				);
				
				*/
				$cond = array (
						'Station.type' => 'CICM',
						'Customer.id'=>$customer_id
				);
				
				
				#$cond = array (
				#		'Customer.id'=>$customer_id
			
				#);
				
				
			}
			else
			{
				$cond = array (
						'Customer.id'=>$customer_id
				
				);
			}
			
		}
		else
		{  
			$this->log("Station controller : Select Station no Group => $group_id", LOG_DEBUG);  
			$customer_id=isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:"");
			$cond =array('Station.customer_id'=>$customer_id);
		}
		
		if (!$customer_id) {
			$this->log("Station controller : Customer ID => $customer_id  : Therefore redirecting to customer", LOG_DEBUG);
			$this->redirect('/customers');
			exit ();
		}
		
		$this->log("Station controller : Select STATION HERE" , LOG_DEBUG);
		
		/**********for case of internal/external users********/
		if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {

			#If The user is an external..

			$id = $this->Session->read('SELECTED_CUSTOMER');
			$cnt = count($this->_Filter);

			if (!$this->Customer->validCustomer($id, $customer_id)) {
				#print_r("not valid");die();
				$this->redirect('/customers');
				exit ();
			}
			#print_r("valid checking $id $customer_id");die();

		}
		/**********************END*************************/

		/**these for getting the current customer name*/

		$this->set('SELECTED_CUSTOMER_NAME', $customer_id);

		#User for left hand Menu navigation.
		$this->Session->write('SELECTED_CNN', $customer_id);
		$this->set('SELECTED_CNN', $customer_id);
		/**end for getting the current customer name*/

		$this->paginate['Paginate'] = $this->AutoPaginate->setPaginate();
		$cnt = count($this->_Filter);

		// save the formats in a variable for the view
		$this->_Filter[$cnt] = "Station.customer_id = '$customer_id'";
		$sel_location = 0;
		$sel_customer = $this->Session->read('sel_customer');
		#if (isset($sel_customer) && $sel_customer)
		#{
			
		#}
		#else
		#{
			#$sel_customer =  $this->Session->read('SELECTED_CUSTOMER');
		#}
		/*

			  $this->Station->bindModel(
                array('belongsTo' => array(
                'Stationkey' => array(
                    'className' => 'Stationkey',
                    'foreignKey' => false,
					'type' => 'RIGHT',
					'conditions' => array('Station.id = Stationkey.station_id','Station.location_id!=""')
                )
            )
                ), false
        );

		*/

			if ($customer_id!= '')
			{
				#Find Locations
				$customer = $this->Customer->find('first',array('contain'=>array('Location'),'conditions'=>array('id'=>$customer_id)));
				foreach($customer['Location'] as $value):
				  $locations = $value['name'];
				endforeach;
				$this->set('locations', $locations);
			}	
		$this->set('cust_id', $customer_id);

		$stations = $this->Station->find('all',
				array(
						'fields'=>array(
								'Station.*',
								'Customer.*',
								'Location.name',
								
								'Feature.primary_value'
						),
								'joins' => array (
								array (
										'table' => 'locations',
										'alias' => 'Location',
										'type' => 'LEFT',
										'foreignKey' => false,
										'conditions' => array (
												'Station.location_id = Location.id','Station.type!="ANLG"'
										)
								),
								array (
										'table' => 'stationkeys',
										'alias' => 'Stationkey',
										
										'foreignKey' => false,
										'conditions' => array ('Station.id = Stationkey.Station_id'),'group' => 'Stationkey.Station_id'
								),
								array (
										'table' => 'features',
										'alias' => 'Feature',
										
										'foreignKey' => false,
										'conditions' => array (
												'Feature.stationkey_id = Stationkey.id','Feature.short_name="DISPLAYNAME"'
										)
								)
	
						),
						'conditions'=>$cond));
						
						
							
						
						
						
						
		#$stations_array=print_r($stations, true);
		#$this->log("Station controller : Select STATION" .  $stations_array, LOG_DEBUG);
		
				
		
		$this->set('stations', $stations);
		$this->set('identifier', urlencode($identifier));
		$this->set('group_id', $group_id);
		$this->set('group_type', $group_type);
		$this->set('stationLocationid', $stationlocation_id);
		
		$this->log("Station controller : VARS =>  $customer_id $identifier $group_type", LOG_DEBUG);
		
		foreach($stations as $station) {
			 $stationLocationName = $station['Location']['name'];
		}
			
		$this->set('stationsfirstLocationName', $stationLocationName);
		
		/**these for getting the current customer name*/
		#For export usage
		//pr($this->params);die;
		if(isset($this->params['url']['update'])){
			$this->set('referred_from',$this->params['url']['update']);
		}elseif(isset($this->params['url']['add'])){
			$this->set('addabove',$this->params['url']['add']);
		}elseif(isset($this->params['url']['replace'])){
			$this->set('replaceabove',$this->params['url']['replace']);
		}
		
		$this->render('select_station');
		

	}
	
	function index($number = null, $reset = null) { //print_r($_POST);die();
		$this->pageTitle = 'Station List';
	
		if (!$number) {
			$this->log("Station controller : Customer ID => $number  : Therefore redirecting to customer", LOG_DEBUG);
			$this->redirect('/customers');
			exit ();
		}
		if (!$reset) {
			$this->log("Station controller : Come from pther page Customer ID => $number sessionvar : $sel_customer", LOG_DEBUG);
		}
		else
		{
			$this->log("Station controller : Reset : $reset on page Customer ID => $number sessionvar : $sel_customer", LOG_DEBUG);
		}
	
		/**********for case of internal/external users********/
		if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {
	
			#If The user is an external..
	
			$id = $this->Session->read('SELECTED_CUSTOMER');
			$cnt = count($this->_Filter);
	
			if (!$this->Customer->validCustomer($id, $number)) {
				#print_r("not valid");die();
				$this->redirect('/customers');
				exit ();
			}
			#print_r("valid checking $id $number");die();
	
			}
			/**********************END*************************/
	
			/**these for getting the current customer name*/
	
			$this->set('SELECTED_CUSTOMER_NAME', $number);
	
			#User for left hand Menu navigation.
			$this->Session->write('SELECTED_CNN', $number);
			$this->set('SELECTED_CNN', $number);
			/**end for getting the current customer name*/
	
			$this->paginate['Paginate'] = $this->AutoPaginate->setPaginate();
			$cnt = count($this->_Filter);
	
			// save the formats in a variable for the view
			$this->_Filter[$cnt] = "Station.customer_id = '$number'";
			$sel_location = 0;
			$sel_customer = $this->Session->read('sel_customer');
			#if (isset($sel_customer) && $sel_customer)
				#{
					
			#}
			#else
			#{
			#$sel_customer =  $this->Session->read('SELECTED_CUSTOMER');
			#}
	
			if ($number != $sel_customer) {
				$this->Session->write('sel_customer', $number);
				$this->log("Station controller : number != sel_Customer, $number  <> $sel_customer", LOG_DEBUG);
			}
			else
			{
					
				$this->log("Station controller : HERE", LOG_DEBUG);
				$passed_sel_location=isset($this->params['url']['location'])?$this->params['url']['location']:(isset($this->params['named']['location'])?$this->params['named']['location']:"");
	
				if (isset ($passed_sel_location) && $passed_sel_location) {
	
					$sel_location = $passed_sel_location;
					$this->Session->write('sel_location', $sel_location);
	
					$this->log("Station controller : HERE2", LOG_DEBUG);
	
				}
				elseif (isset ($passed_sel_location) && $passed_sel_location == 0) {
					$this->Session->write('sel_location', '');
					$sel_location = '';
	
					$this->log("Station controller : HERE3", LOG_DEBUG);
				}
				elseif ($this->Session->read('sel_location') && !$reset) {
					$sel_location = $this->Session->read('sel_location');
	
					$this->log("Station controller : HERE4", LOG_DEBUG);
				}
				$this->log("Station controller : location = $sel_location", LOG_DEBUG);
				$this->passedArgs['location'] = $sel_location;
			}
			$stationStates = $this->Station->find('all', array(
					'fields'=>array('DISTINCT status'),
					'conditions'=>array('customer_id' => $number)
			));
			$statuses[''] = '';
			$stationStatus = Configure :: read('stationStatus');
			foreach($stationStates as $stationState):
			#$localized_function = __($stationState['Station']['status'], true);
			$statuses[$stationState['Station']['status']] = $stationStatus[$stationState['Station']['status']];
			endforeach;
			
			$this->set('statuses',$statuses);
	
			/* If Location value is selected */
			if ($sel_location) {
	
				$count_val = $this->Station->station_count($number, $sel_location);
				$count = $count_val[0][0]['count'];
	
				$this->paginate = array (
						'joins' => array (
								array (
										'table' => 'stationkeys',
										'alias' => 'Stationkey',
										'type' => 'LEFT',
										'foreignKey' => false,
										'conditions' => array (
												'Station.id = Stationkey.Station_id'
										)
								),
								array (
										'table' => 'features',
										'alias' => 'Feature',
										'type' => 'LEFT',
										'foreignKey' => false,
										'conditions' => array (
												'Feature.stationkey_id = Stationkey.id'
										)
								)
						),
						'order' => 'Station.id asc',
						'limit' => $this->paginate['limit'],
						'fields' => array (
								'Feature.primary_value',
								'Station.4voip_id',
								'Station.id',
								'Station.customer_id',
								'Station.port',
								'Station.type',
								'Station.password',
								'Station.MOH',
								'Station.extensions',
								'Station.slug',
								'Station.desc',
								'Station.created',
								'Station.modified',
								'Station.status',
								'Customer.id',
								'Customer.name',
								'Customer.bsk',
								'Customer.created',
								'Customer.modified',
								'Customer.status',
								'Customer.type',
								'Customer.moh_id'
						)
				);
	
				$cnt = count($this->_Filter);
				$this->_Filter[$cnt] = "Feature.short_name= 'DISPLAYNAME' and	Stationkey.keynumber = 1";
				#$this->_Filter[$cnt] = "Stationkey.keynumber = 1 group by Stationkey.station_id";
				$cnt = count($this->_Filter);
				if ($sel_location == 'NULL')
					$this->_Filter[$cnt] = "Stationkey.location_id is NULL  group by Stationkey.station_id";
				else {
					$this->_Filter[$cnt] = "Stationkey.location_id = '$sel_location'";
					#$this->passedArgs['location_id'] = $sel_location;
	
				}
	
				//$this->_Filter[$cnt] = "Stationkey.location_id = '$sel_location'  group by Stationkey.station_id";
	
				$id=isset($this->params['url']['sid'])?$this->params['url']['sid']:(isset($this->params['named']['sid'])?$this->params['named']['sid']:"");
				if($id!=''){
					$this->_Filter = array_merge($this->_Filter,array('Station.id LIKE'=>'%'.$id.'%'));
					$this->passedArgs['sid'] = $id;
				}
				$type=isset($this->params['url']['type'])?$this->params['url']['type']:(isset($this->params['named']['type'])?$this->params['named']['type']:"");
				if($type!=''){
					$this->_Filter = array_merge($this->_Filter,array('Station.type'=>$type));
					$this->passedArgs['type'] = $type;
				}
				$port=isset($this->params['url']['port'])?$this->params['url']['port']:(isset($this->params['named']['port'])?$this->params['named']['port']:"");
				if($port!=''){
					$this->_Filter = array_merge($this->_Filter,array('Station.port LIKE'=>'%'.$port.'%'));
					$this->passedArgs['port'] = $port;
				}
				
				$dispname=isset($this->params['url']['dispname'])?$this->params['url']['dispname']:(isset($this->params['named']['dispname'])?$this->params['named']['dispname']:"");
			if($dispname!=''){
				$this->_Filter = array_merge($this->_Filter,array('Feature.primary_value LIKE'=>'%'.$dispname.'%'));
				$this->passedArgs['dispname'] = $dispname;
			}
				
				$status=isset($this->params['url']['status'])?$this->params['url']['status']:(isset($this->params['named']['status'])?$this->params['named']['status']:"");
				if($status!=''){
					$this->_Filter = array_merge($this->_Filter,array('Station.status'=>$status));
					$this->passedArgs['status'] = $status;
				}
					
			$location_id=isset($this->params['url']['location_id'])?$this->params['url']['location_id']:(isset($this->params['named']['location_id'])?$this->params['named']['location_id']:"");
			if($location_id!=''){
				$this->_Filter = array_merge($this->_Filter,array('Stationkey.location_id LIKE'=>$location_id));
				$this->passedArgs['location_id'] = $location_id;
			}
	
					
				#Workaround to handle the location id being sent as a parameter.
					
				unset($this->_Filter['Station.location']);
				unset($this->_Filter['Station.sid']);
					
				#-------------------------------------------------------------
					
				$station_details = $this->paginate('Station', $this->_Filter);
				//$this->params['paging']['Station']['count']	=	$count;
				
				
				$cond = $this->_Filter;
				$this->Session->write('cond', serialize($cond));
				$condition_array=print_r($cond, true);
				$this->log("1Station controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
	
		} else {
	
			/* added code start */
			$this->paginate = array (
					'joins' => array (
							array (
									'table' => 'stationkeys',
									'alias' => 'Stationkey',
									'type' => 'LEFT',
						'foreignKey' => false,
						'conditions' => array (
							'Station.id = Stationkey.Station_id'
							)
					),
					array (
					'table' => 'features',
					'alias' => 'Feature',
					'type' => 'LEFT',
					'foreignKey' => false,
					'conditions' => array (
							'Feature.stationkey_id = Stationkey.id'
					)
			)
			),
			'order' => 'Station.id asc',
			'limit' => $this->paginate['limit'],
			'fields' => array (
					'Feature.primary_value',
					'Station.4voip_id',
					'Station.id',
					'Station.customer_id',
					'Station.port',
					'Station.type',
					'Station.MOH',
					'Station.extensions',
					'Station.slug',
					'Station.desc',
					'Station.created',
					'Station.modified',
					'Station.status',
			        'Station.phone_type',
					'Customer.id',
					'Customer.name',
					'Customer.bsk',
					'Customer.created',
					'Customer.modified',
					'Customer.status',
					'Customer.type',
					'Customer.moh_id',
					'Stationkey.location_id'
				)
				);
				
				
			$cnt = count($this->_Filter);
			$mycond = $this->_Filter;
			$this->_Filter[$cnt] = "Feature.short_name= 'DISPLAYNAME' and	Stationkey.keynumber = 1";
			#$this->_Filter[$cnt] = "(Feature.short_name= 'DISPLAYNAME' OR Feature.short_name= 'DN') and Stationkey.keynumber = 1";
	
			$id=isset($this->params['url']['sid'])?$this->params['url']['sid']:(isset($this->params['named']['sid'])?$this->params['named']['sid']:"");
			if($id!=''){
				$this->_Filter = array_merge($this->_Filter,array('Station.id LIKE'=>'%'.$id.'%'));
				$this->passedArgs['sid'] = $id;
			}
			$type=isset($this->params['url']['type'])?$this->params['url']['type']:(isset($this->params['named']['type'])?$this->params['named']['type']:"");
			if($type!=''){
				$this->_Filter = array_merge($this->_Filter,array('Station.type'=>$type));
				$this->passedArgs['type'] = $type;
			}
			$port=isset($this->params['url']['port'])?$this->params['url']['port']:(isset($this->params['named']['port'])?$this->params['named']['port']:"");
			if($port!=''){
				$this->_Filter = array_merge($this->_Filter,array('Station.port LIKE'=>'%'.$port.'%'));
				$this->passedArgs['port'] = $port;
			}
			
			$dispname=isset($this->params['url']['dispname'])?$this->params['url']['dispname']:(isset($this->params['named']['dispname'])?$this->params['named']['dispname']:"");
			if($dispname!=''){
				$this->_Filter = array_merge($this->_Filter,array('Feature.primary_value LIKE'=>'%'.$dispname.'%'));
				$this->passedArgs['dispname'] = $dispname;
			}
			
			 $location_id=isset($this->params['url']['location_id'])?$this->params['url']['location_id']:(isset($this->params['named']['location_id'])?$this->params['named']['location_id']:"");
			if($location_id!=''){
				$this->_Filter = array_merge($this->_Filter,array('Stationkey.location_id LIKE'=>$location_id));
				$this->passedArgs['location_id'] = $location_id;
			}
			
			
			$status=isset($this->params['url']['status'])?$this->params['url']['status']:(isset($this->params['named']['status'])?$this->params['named']['status']:"");
			if($status!=''){
				$this->_Filter = array_merge($this->_Filter,array('Station.status'=>$status));
				$this->passedArgs['status'] = $status;
			}	
			#Workaround to handle the location id being sent as a parameter.
				
			#unset($this->_Filter['Station.location']);
			unset($this->_Filter['Station.sid']);
				
			#-------------------------------------------------------------
	
			/* added code ends */
			#echo "<pre>";print_r($this->paginate('Station', $this->_Filter));
	
			$station_details = $this->paginate('Station', $this->_Filter);
				
			$cond = $this->_Filter;
			$this->Session->write('cond', serialize($cond));
			$condition_array=print_r($cond, true);
			$this->log("2Station controller : Setting sesion conditions : $condition_array", LOG_DEBUG);
	
			}
			$cond = $this->_Filter;
	
			$this->log('Index page ' . $number . 'request returned station count ' . sizeof($station_details), LOG_DEBUG);
	
			$this->set('stations', $station_details);
			
			
			$this->set('cust_id', $number);
	
			$this->set('locations_ids', $this->Location->find('all', array (
					'fields' => array (
							'Location.name',
							'Location.plz',
							'Location.id',
							'Location.address',
							'Location.pro_nr'
					),
					'conditions' => array (
							'Location.customer_id =' => $number
					),
					'order' => array (
							'Location.name' => 'asc'
					)
			)));
			
			
	
			/**these for getting the current customer name*/
			if (isset ($location[0]['Customer']['name']))
				$this->set('SELECTED_CUSTOMER_NAME', $location[0]['Customer']['name']);
			/**end for getting the current customer name*/
	
			$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));
			$this->set('curr_loc', $sel_location);
	
			/*CBM Added*/
			$customerInfo = $this->Customer->findById($number);
			if (isset ($customerInfo['Customer']['name'])) {
				$this->set('selected_customer', $customerInfo['Customer']['name']);
			} else {
				$this->set('selected_customer', 'UNDEF');
	
			}
	
		}
	
	/**
	 * function for getting the station major features
	 *
	 */
	function resetFeature($station_id = null) {
		
		$stationInfo = $this->Stationkey->find('first', array (
                                'conditions' => array (
                                        'Station.id' => $station_id
                                )
				, 'fields' => array (
                                        'Station.status',
				)
                        ));
		
		 $statArray = print_r($stationInfo, true);
		#$output_array=print_r($output, true);
		$this->log('editstation page ' . 'station Info ' . $statArray, LOG_DEBUG);
		
		//First Create an as-is version.
		
		if(($station_id != '') && ($stationInfo['Station']['status'] == 5))
		{	
			//First Create an as-is version.	
			#$resetAsis = $this->Station->resetStation($station_id);
			#$resetAsis = $this->Station->resetStationKeys($station_id);
			$resetAsis = $this->Station->deleteFeatures($station_id);
			$resetAsis = $this->Station->resetFeatures($station_id);
			$resetAsis = $this->Station->deleteAsisFeatures($station_id);
			#$resetAsis = $this->Station->deleteAsisStation($station_id);
			#$resetAsis = $this->Station->deleteAsisStationkeys($station_id);
			
			#Change the stationkey status to 1
			$kl=$this->Stationkey->updateAll(array('Stationkey.status' =>1),array('Stationkey.station_id' => $station_id));
				
			
			#station status update
			$update['Station']['status'] = '1';
			$update['Station']['id'] = $station_id ;
			$this->Station->save($update, false,  array('id','status'));
				
			$this->log('resetFunction : reset sfeatures ' . $resetAsis, LOG_DEBUG);
		}
		else
		{
			$this->log('resetFeature function ' . 'No ID ' . $stationId, LOG_DEBUG);
		}
		
		$this->redirect('/stations/editstation/' . $station_id);

	}
	
	function overrideException($station_id = null) {
		$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
		$this->log('STATION CONTROLLER ' . 'Overriding Station status for station :' .   $station_id, LOG_DEBUG);
		if($station_id != '')
		{
			$stationsave['Station']['id'] = $station_id;
			$stationsave['Station']['status'] = 5;
			$this->log('STATION CONTROLLER ' . 'Overriding Station status ' .   $station_id, LOG_DEBUG);
			$stationsave = $this->Station->save($stationsave, false,  array('id','status'));
			$this->redirect('/stations/editstation/' . $station_id);
			
		}
		else 
		{
			exit;
		}
		
	}
	/**
	 * function to apply a station to C20	
	 *
	 */
	function apply($station_id = null, $transId) {
		$this->layout = false;
		$this->autoRender = false;
		
		$this->log('STATION CONTROLLER : APPLY : ' . 'station :' . $station_id . 'TRans :' . $transId, LOG_DEBUG);
		
		
		
	
		$stationInfo = $this->Station->find('first', array (
				'conditions' => array (
						'Station.id' => $station_id
				)
				, 'fields' => array (
						'Station.status',
						'Station.customer_id'
				)
		));
		
		
		if($stationInfo['Station']['status'] == 7)
		{
			$this->log('STATION CONTROLLER : APPLY : STATION IN EXCEPTIUON', LOG_DEBUG);
			$_SESSION['error'] .= 'stationInExceptionNoAcitvationPossible';
			$this->redirect('/stations/editstation/' . $station_id);
			
		}
		
		
		$this->log('xeditstation page ' . 'station :' . $station_id . 'TRans :' . $transId, LOG_DEBUG);
		
		$customer_id = $stationInfo['Station']['customer_id'];
		$statArray = print_r($stationInfo, true);
		#$output_array=print_r($output, true);
		$this->log('editstation page ' . 'station Info ' . $statArray, LOG_DEBUG);
	
		//Finally Clear All as-is
	
		if($station_id != '')
		{
			if($transId == '')
			{
				#Generate transaction ID
				$transId = time();
				$this->log('STATIONS CONTROLLER : Generating new timestamp : ' . $transId, LOG_DEBUG);
			}
			$layoutFile = 'CICMconfig.xml';
						
			#Call the backend to create the Commands
			// creating object of SimpleXMLElement
			
			
			$asisXML = $this->calculateLayout($station_id, $layoutFile ,'ASIS');
			#$results_array=print_r($asisXML, true);
			#$this->log('STATION CONTROLLER APPLY : ASIS XML ' . $asisXML, LOG_DEBUG);
			$base_path = Configure :: read('base_path');
			$asisXMLFormatted = $asisXML->asXML();
			
			#$dom = new $DOMDocument('1.0');
			#$dom->preserveWhiteSpace = false;
			#$dom->formatOutput = true;
			#$dom->loadXML($asisXML->asXML());
			#$asisXMLFormatted = $dom->saveXML();
			
			$asisRemoveHeader = preg_replace('/\<\?xml version=\"1.0\"\?\>/', '', $asisXMLFormatted);
			
			#$find = array('/>\s*</', '/value\>\n\<\/primary', '/label\>\n\</label');
			#$replace = array(">\n<", "", "");
			$find = array('/>\s*</', '/\n<\/primary/', '/\n\<\/label/');
			$replace = array(">\n<", "</primary", "</label");
			
			#$asisOut = preg_replace("/>\s*</", ">\n<", $asisRemoveHeader);
			$asisOut = preg_replace($find, $replace, $asisRemoveHeader);
			#$asisOut = preg_replace('/CFeature/', 'Feature', $asisRemoveHeader); # Change to Feature tag
			
			
			$fileName = 'activation.' . $transId  . '.input.xml';
			$path = Configure :: read('base_path') . '/XMLEngine/transactions/' . $fileName;
			#$path = Configure :: read('base_path') . '/XSLTWork/POC2/merged_scripts/transactions/activation.' . $transId . '.input.xml';
			
			
			$header = '<Activations transaction-id="'. $transId . '">';
			$commands = '<actions>' . "\n";
			
			#FOR TESTING ???
			#$commands .= '<key id="04" featureId="01@99999-DISPLAYNAME">UPDATE</key>' . "\n";
			#$commands .= '<key id="03">REPLACE</key>' . "\n";
			#$commands .= '<key id="02">DELETE</key>' . "\n";
			#$commands .= '<key id="01">ADD</key>' . "\n";
			
			#Generate real commands ???
			

			#-----------First find all keys that need ADD/REPLACE/DELETING----------
			
			$commandKeySource = $this->Stationkey->find('all', array (
					'fields' => array (
							'Stationkey.id', 'Stationkey.status'
					),
					'conditions' => array (
							'Stationkey.station_id' => $station_id,
							'Stationkey.status' => array(5,6,7)
					)
					,'order' => array (
							'Stationkey.id',
					),
			));
			
			foreach($commandKeySource as $commandkey)
			{
				$stationKey = $commandkey['Stationkey']['id'];
				$status = $commandkey['Stationkey']['status'];
				$this->log('STATION CONTROLLER : Key Actions :' . $stationKey . ' ' .$status, LOG_DEBUG);
				$keynumber = substr($stationKey, 0, 2);
				
				if($keynumber != 1) #??? Added for testing not to replace key 1 while the state is not handled correctly
				{
					#StaitonFeatureMap is used as a source keyed on the stationkey to find the real type
					if($status == 5)
					{
						$commands .= '<key id="' .$keynumber .'">REPLACE</key>' . "\n";
					}
					elseif($status == 6)
					{
						$commands .= '<key id="' .$keynumber .'">ADD</key>' . "\n";
					}
					elseif($status == 7)
					{
						$commands .= '<key id="' .$keynumber .'">DELETE</key>' . "\n";
					}
					$replacedKeys[$keynumber] = 1;
					$commandGenerated = 1;
				}
			}
			
			
			#------------Now find all features that need changeing update only????
			
			
			$commandFeaturesSource = $this->Feature->find('all', array (
					'fields' => array (
							'Feature.id', 'Feature.short_name', 'Feature.stationkey_id', 'Feature.primary_value',  'Feature.status'
					),
					'conditions' => array (
							'Feature.id like' => '%' . $station_id . '%'
					)
					,'order' => array (
							'Feature.id',
					),
			));
				
			
			foreach($commandFeaturesSource as $commandfeature)
			{
				$featureId = $commandfeature['Feature']['id'];
				$shortName = $commandfeature['Feature']['short_name'];
				$stationKey = $commandfeature['Feature']['stationkey_id'];
				$primaryValue = $commandfeature['Feature']['primary_value'];
				$status = $commandfeature['Feature']['status'];
				$keynumber = substr($featureId, 0, 2);
				#StaitonFeatureMap is used as a source keyed on the stationkey to find the real type
				if($replacedKeys[$keynumber] != 1)
				{
					if($status == 4)
					{
						$commands .= '<key id="' .$keynumber .'" featureId="'. $featureId . '">UPDATE</key>' . "\n";
						$commandGenerated = 1;
					}
				#Below replace with Key behaviour above
				#elseif($status == 8)
				#{
				#	$commands .= '<key id="' .$keynumber .'">REPLACE</key>' . "\n";
				#}
				}
			}
			
			
			#---------------End command generation----------------
			#If there are no commands generated then exit	. !!Should not get here.
			if($commandGenerated != 1)
			{
				exit;
			}
			
			
			$commands .= '</actions>' . "\n";
			$footer = '</Activations>';
			file_put_contents($path, $header);
			file_put_contents($path, $commands, FILE_APPEND);
			#file_put_contents($path, $asisXMLFormatted, FILE_APPEND);
			file_put_contents($path, $asisOut, FILE_APPEND);
	
			$this->log('STATION CONTROLLER : APPLY : call calculateLayot for TOBE  => ', LOG_DEBUG);
			$tobeXML = $this->calculateLayout($station_id, $layoutFile ,'TOBE');
			$this->log('STATION CONTROLLER : APPLY : RETURNED FROM CALC LAYOUt  => ', LOG_DEBUG);
			$tobeXMLFormatted = $tobeXML->asXML();
			#$this->log('STATION CONTROLLER APPLY : TOBE XML ' . $tobeXMLFormatted, LOG_DEBUG);
			$tobeRemoveHeader = preg_replace('/\<\?xml version=\"1.0\"\?\>/', '', $tobeXMLFormatted);
				
			#$tobeOut = preg_replace("/>\s*</", ">\n<", $tobeRemoveHeader);
			#$find = array('/>\s*</', '/value\>\n\<\/primary', '/label\>\n\</label');
			#$replace = array(">\n<", "", "");
			$find = array('/>\s*</', '/\n<\/primary/', '/\n\<\/label/');
			$replace = array(">\n<", "</primary", "</label");
				
				
			#$asisOut = preg_replace("/>\s*</", ">\n<", $asisRemoveHeader);
			$tobeOut = preg_replace($find, $replace, $tobeRemoveHeader);
			
			$this->log('STATION CONTROLLER : APPLY : END PREG_REPLACE  => ', LOG_DEBUG);
			
			#$tobeOut = preg_replace('/\<\?xml version=\"1.0\"\?\>/', '', $tobeXMLFormatted);
			file_put_contents($path, $tobeOut, FILE_APPEND);
			file_put_contents($path, $footer, FILE_APPEND);
			$mode = 'activation';
			#$execPath = 'sudo /usr/bin/perl ' . $base_path . '/XSLTWork/POC2/merged_scripts/activationProcessor.pl ' . ' ' . $mode . ' ' . $layoutFile . ' ' .  $transId . ' 2>&1';
			
			
			$backEndMode = Configure :: read('backEndMode');
			
			if($backEndMode == 'REMOTE')
			{
				
				$this->log('STATIONS CONTROLLER : WORKING IN REMOTE BACKEND MODE', LOG_DEBUG);
				$dbXmlString = $header . $commands . $asisOut . $tobeOut . $footer;
				
				
				#store files in DB
				
				#station status update
				$update['Xmlengine']['transaction_id'] = $transId;
				$update['Xmlengine']['layoutFile'] = 'CICMconfig.xml';
				$update['Xmlengine']['mode'] = 'activation';
				$update['Xmlengine']['data'] = $dbXmlString;
				$this->Xmlengine->save($update);
				$xmlid = $this->Xmlengine->id;
				
				
				
				#Call function remotely to export to file system and run command.
				
				
				#$host = 'http://91.250.116.95:8080/activiti-rest/service/runtime/tasks?assignee=kermit';
				$host =  Configure :: read('xmlengine_url') . '/xmlengines/process?xmlid=' . $xmlid;
				
				$this->log('STATION CONTROLLER : CALLING BACKEND => ' .  $host, LOG_DEBUG);
				
				#exit;
		
				$process = curl_init($host);
	
				curl_setopt($process, CURLOPT_TIMEOUT, 10);
				curl_setopt($process, CURLOPT_HEADER, 0);

				$return = curl_exec($process);
				curl_close($process);
				
				$this->log('STATION CONTROLLER : GOT RESPONSE  => ' .  $return, LOG_DEBUG);
				

				
				
			}
			else {

				$this->log('STATIONS CONTROLLER :APPLY : WORKING IN LOCAL BACKEND MODE : CALL SCRIPT', LOG_DEBUG);
				$execPath = 'sudo /usr/bin/perl ' . $base_path . 'XMLEngine/processor.pl' . ' ' . $fileName . ' ' . $layoutFile . ' 2>&1';
				$this->log('STATIONS CONTROLLER :APPLY : CAlling perl script ' . $execPath, LOG_DEBUG);
				
				#$output = system($execPath, $retval);
				
				#Run locally
				$output = exec($execPath, $output, $retval);
				
				$this->log('STATIONS CONTROLLER : WORKING IN LOCAL BACKEND MODE : END SCRIPT', LOG_DEBUG);
				$this->log('STATIONS CONTROLLER :APPLY : output' .  $output . ' retval ' . $retval, LOG_DEBUG);
				
			}
		
			
				
			#exit;
							
			#Get the Commands from teh DB
			$TransactionDetails = $this->Transaction->find('first', array (
				'conditions' => array (
						'Transaction.id' => $transId
				)
			));
			
			#Send to the ALG compoennt

			$fullTransaction = $TransactionDetails['Transaction']['transaction'];
			$transResponse = $this->AlgInterface->processTransaction($fullTransaction);
			
			
			#Now Create the Log entry with status and associate the transaction.
			preg_match("/C20_FAILURE/", $transResponse, $matches);
			if ($matches[0])
			{
				#???vIf ther was an error then it is possible to save the correctly applied features with active state but not the remaining.
				#This can be handled by looping through the subtransactions in sequence
				$this->log('Station Controller : Apply TO C20 FAILED ' .  $transResponse, LOG_DEBUG);
				$transStatus = 0;
				#$_SESSION['success'] = __('applySucceeded', true) ;
				$_SESSION['error'] = __('applyFailed', true) ;
				
				#station status update
				$update['Station']['status'] = '7';
				$update['Station']['id'] = $station_id ;
				$this->Station->save($update, false,  array('id','status'));
				
				
			}
			else
			{
				$this->log('Station Controller : Apply TO C20 SUCCEEDED ' .  $transResponse, LOG_DEBUG);
				$transStatus = 1;
				$_SESSION['success'] = __('applySucceeded', true) ;
				
				#If all transaction was successfull then save all features to state 1. 
				
				$fl=$this->Feature->updateAll(array('Feature.status' =>1),array('Feature.id like' => '%'.$station_id . '%'));
				$kl=$this->Stationkey->updateAll(array('Stationkey.status' =>1),array('Stationkey.station_id' => $station_id));
					
				//reset asis tables.
					
				if($stationInfo['Station']['status'] == 5)
				{
					$resetAsis = $this->Station->deleteAsisFeatures($station_id);
					$resetAsis = $this->Station->deleteAsisStation($station_id);
					$resetAsis = $this->Station->deleteAsisStationkeys($station_id);
				
					#station status update
					$update['Station']['status'] = '1';
					$update['Station']['id'] = $station_id ;
					$this->Station->save($update, false,  array('id','status'));
				}
				
			}
			
			
			
			#Now Create the Log entry with status and associate the transaction.
			
			$log = 'Station Update : Complex';
			
			$insert = array (
					'Log' => array (
							'affected_obj' => $station_id,
							'log_entry' => $commands,
							'created' => date('Y-m-d H:i:s'),
							'status' => 1,
							'customer_id' => $customer_id,
							'bsk' => $this->Session->read('BSK'),
							'user' => $this->Session->read('ACCOUNTNAME'),
							'app_type' => $this->Session->read('APPNAME'),
							'modified' => '0000-00-00 00:00:00',
							'modification_status' => $transStatus,
							'modification_response' => $transResponse,
							'transaction_id' => $transId
					)
			);
			
			$this->Log->create();
			$this->Log->save($insert, false);
			
			$log_id = $this->Log->id;
			
			$transUpdate = array (
					'Transaction' => array (
							'id' => $transId,
							'log_id' => $log_id,
					
					)
			);
	
			$this->Transaction->save($transUpdate, false);
				
		}
		else
		{
			$this->log('resetFeature function ' . 'No ID ' . $stationId, LOG_DEBUG);
		}
	
		
		
		#$link = $html->link(__("Request", true), array('controller'=> 'logs', 'action'=>'logdetails',$log_id), array('class' => "fancybox fancybox.ajax"));
		if($transStatus == 1)
		{
			$link = '<a class="fancybox fancybox.ajax" href="' . Configure::read('base_url') . '/logs/logdetails/' . $log_id . '">' . __("LogEntry", true) . '</a>';
			$_SESSION['success'] .= $link;	
		}
		else 
		{
			$link = '<a class="fancybox fancybox.ajax" href="' . Configure::read('base_url') . '/logs/logdetails/' . $log_id . '">' . __("LogEntry", true) . '</a>';
			$_SESSION['error'] .= $link;
		}
		#$_SESSION['success'] = $_SESSION['success'] . 'log:' . $link;
		#$_SESSION['error'] = __('TEST', true) ;
		
		
		$cameFrom = $this->here;
		$this->log('STATION CONTROLLER : CAME FROM : ' .$cameFrom, LOG_DEBUG);
		
		preg_match("/\/apply\//", $cameFrom, $matches);
		if ($matches[0]) {
			$this->log('STATION CONTROLLER : NOT REDIRECTING CAME FROM ' . $cameFrom, LOG_DEBUG);
		}
		else {
			
			
			
			preg_match("/\/minor_delete/", $cameFrom, $minor_delete);
			if($minor_delete[0])
			{
				$this->log('STATION CONTROLLER : MINOR DELETE GOING BACK TO WHEREVER', LOG_DEBUG);
				#go back to wherever you came from (could be group edit apge)
				return;			
			}
			else {
				preg_match("/\/addMember/", $cameFrom, $addMember);
				if($addMember[0])
				{
					$this->log('STATION CONTROLLER : AddMember GOING BACK TO WHEREVER', LOG_DEBUG);
					#go back to wherever you came from (could be group edit apge)
					return;
				}
				else {
				
			
					$this->log('STATION CONTROLLER : REDIRECTING TO EDITSTAIOTN' . $stationId, LOG_DEBUG);
					$this->redirect('/stations/editstation/' . $station_id);
				}
			}
		}
		
		#$this->redirect('/stations/editstation/' . $station_id);
	}
	
	function processTransaction($fullTransaction) {
		#$fullTransaction = $TransactionDetails['Transaction']['transaction'];
		$this->log("STATION controller : APPLYING FULL TRANS : $fullTransaction", LOG_DEBUG);
	
	
	
		$pattern='/<algRequest>(.+?)<\/algRequest>/';
		$ft = preg_replace("/[\n\r]+\s+/", "", $fullTransaction);
		#$results_array=isXML($fullTransaction);
		if(preg_match_all($pattern, $ft, $matches))
			#if(preg_match_all($pattern, $fullTransaction, &$matches))
		{
	
	
			foreach($matches[1] as $match)
			{
					
				$xmltosend = $match;
					
				$this->log('STATION CONTROLLER APPLY : individual transaction' . $xmltosend, LOG_DEBUG);
					
					
				#Send the command and
				$res = $this->Authentication->algclient($xmltosend, $transId);
				$this->log('STATION CONTROLLER APPLY : RESPONSE FROM C20' . $res, LOG_DEBUG);
				$transTrace .=  $xmltosend . '\n' . $res;
					
				#Check status somehow
				#if ivalid break out of loop???
	
			}
				
				return $transTrace;
	
		}
	}
	
	/**
	 * function for getting the station major features
	 *
	 */
	function editstation($station_id = null) {
		$this->log("Station controller : EDITSTATION :START STATION EDIT", LOG_DEBUG);
        if($this->RequestHandler->isAjax()==true)
		{ 
				//echo "<pre/>"; $result = $_REQUEST["table-3"]; print_r($this->params);  die;
		}
		$this->Session->write('sel_customer', '');
		$this->pageTitle = 'Station Edit';

		if (!$station_id) {
			$this->log("Station controller :NO STATION ID", LOG_DEBUG);
			$this->redirect('/customers');
			exit ();
		}
		$this->Station->recursive=2;
		$stationDetails = $this->Station->find('all', array (
				'conditions' => array (
						'Station.id' => $station_id
				)
		));
		
		/**these for getting the current customer name*/
		if (isset ($stationDetails[0]['Customer']['name']))
			$this->set('SELECTED_CUSTOMER_NAME', $stationDetails[0]['Customer']['name']);
		$customer_id = $stationDetails[0]['Customer']['id'];
		$this->set('SELECTED_CNN', $stationDetails[0]['Customer']['id']);
		
		#Accept DN passed as argument will lookup station and redirect to correct station.
		preg_match("/^DN-([0-9]+)/", $station_id, $matches);
		if ($matches[0]) {
			$DN_ID = $matches[1];
			#print "looking for station with DN -> $matches[1]";
			$record = $this->Stationkey->find('all', array (
				'conditions' => array (
					'Stationkey.dn' => $DN_ID
				)
			));
			
			

			if (empty ($record)) {

				print "NO STATIONKEY FOUND $record[0]['Stationkey]['station_id']";
				$this->log("Station controller :EDITSTATION :NO STATIONKEY FOUND", LOG_DEBUG);
				#exit ();

				$this->cakeError('accessDenied');
			}
			else
			{
				#if more than one record the treat as group

				if (count($record) > 1) {

					$this->log("Station controller : EDITSTATION :MORE THAN 1 STATIONKEY FOUND IS GROUP, LOOKING FOR PILOT", LOG_DEBUG);
					$pilotStation = $this->Station->getPilotFromDn($DN_ID);
					#print_r($pilotStation);
					#exit ();
					
					if($pilotStation[0]['stationkeys']['station_id'] != '')
					{
						$this->log("Station controller : EDITSTATION :ACCESSING PILOT:" . $pilotStation[0]['stationkeys']['station_id'], LOG_DEBUG);
						$this->redirect('/stations/editstation/' . $pilotStation[0]['stationkeys']['station_id']);
					}
					else
					{
						$this->log("Station controller : EDITSTATION :NO PILOT FOUND !! using passed DN:" . $DN_ID, LOG_DEBUG);
						$this->redirect('/stations/editstation/' . $DN_ID);
						
					}
				} else {

					#print "FOUND $record[0]['Stationkey]['station_id']";
					$this->log("Station controller :  EDITSTATION : ACCESSING :" . $record[0]['Stationkey']['station_id'], LOG_DEBUG);
						
					$this->redirect('/stations/editstation/' . $record[0]['Stationkey']['station_id']);
					#exit ();

				}
				#exit();
			}
		}

		#--------------------------------------------------------------------------------------------#
		#							Create an array containing key states							 #
		#--------------------------------------------------------------------------------------------#
		
		$statkeys = $this->Stationkey->find('all', array (
				'conditions' => array (
						'Stationkey.station_id' => $station_id
				)
		));
		
		
		
		foreach ($statkeys as $statkey)
		{
			$stationkeylocation = $statkey['Stationkey']['location_id'];
			$stationkeystate[$statkey['Stationkey']['keynumber']] = $statkey['Stationkey']['status'];
			#$this->log("Station controller : setting status of keys  : " . $statkey['Stationkey']['keynumber'] . " : " . $statkey['Stationkey']['status'], LOG_DEBUG);
		}
		$this->set('stationkeystate', $stationkeystate);
		$this->set('stationkeylocation',$stationkeylocation);
		
		#--------------------------------------------------------------------------------------------#
		#							Create an array containing key features							 #
		#--------------------------------------------------------------------------------------------#
		
		
		
		
		$keyFeaturesSource = $this->Feature->find('all', array (
				'fields' => array (
						'Feature.id', 'Feature.short_name', 'Feature.stationkey_id', 'Feature.primary_value', 'Feature.label', 'Feature.status'
				),
				'conditions' => array (
						'Feature.id like' => '%' . $station_id . '%'
				)
				,'order' => array (
						'Feature.id',
				),
		));
		
		$keyFeatureDefinition = array('DN','MADN', 'madn', 'MLH', 'HNTID', 'CPU','CWT', 'UCDLG', 'MSB', 'MWT', 'PRK', 'RAG', 'CNF','CWT',
				'UCDLG', 'MSB', 'MWT', 'PRK', 'RAG', 'CNF','AUD', 'BLF', 'CXR', 'CFUFEATURE', 'CFKFEATURE', 'CFUIF','PILOT');
		#Need to have a view of ALL features - THis can repalce the query above - ??
		
		#Loop throught the features and foreach stationeky determine a type for that key
		foreach($keyFeaturesSource as $keyfeature)
		{
			#$results_array=print_r($keyfeature, true);
			#$this->log("Station controller : !!station featuresarray : $results_array", LOG_DEBUG);
			$shortName = $keyfeature['Feature']['short_name'];
			$stationKey = $keyfeature['Feature']['stationkey_id'];
			$primaryValue = $keyfeature['Feature']['primary_value'];
			$status = $keyfeature['Feature']['status'];
			$label = $keyfeature['Feature']['label'];
		
			$allFeatureMap[$stationKey][$shortName] = $primaryValue;
			$allFeatureStatusMap[$stationKey][$shortName] = $status;
			
			
			
			if (in_array($shortName, $keyFeatureDefinition))
			{
				$keyFeatureMap[$stationKey][$shortName] = $primaryValue;
				#$keyFeatureMap[$stationKey]['label'] = $label;
				$keyFeatureStatusMap[$stationKey][$shortName] = $status;
				$keyFeatureLabelMap[$stationKey][$shortName] = $label;
				#$this->log("Station controller : Setting label : --> keyFeatureStatusMap[". $stationKey . '=>' . $label, LOG_DEBUG);

			}
		
		}
		
		
		
		
		
		foreach($keyFeatureMap as $arrayKeyIndex=>$arrayKey)
		{
			#$this->log("Station controller : Feature : $arrayKeyIndex => $arrayKey", LOG_DEBUG);
			
			foreach($arrayKey as $arrayFeatureIndex=>$arrayKeyPrimary)
			{
				#$this->log("Station controller : Feature : --> $arrayFeatureIndex => $arrayKeyPrimary", LOG_DEBUG);
				
				#$set status for all feature types.
				$keyFeatures[$arrayKeyIndex]['Feature']['status'] = $keyFeatureStatusMap[$arrayKeyIndex][$arrayFeatureIndex];
				#$dispFeature = $arrayKeyIndex . '-' . 'DISPLAYNAME';
				
				#$keyFeatures[$arrayKeyIndex]['Feature']['label'] = 'test';
	
				if($arrayFeatureIndex == 'DN')
				{
					#Set Label for DN
					$keyFeatures[$arrayKeyIndex]['Feature']['label'] = $allFeatureMap[$arrayKeyIndex]['DISPLAYNAME'];
					
					
					#Check if on key 1, if so master DN.
					#preg_match("/^01/", $arrayKeyIndex, $matches);
					
					#For DN Features make the status to the status of all features on that key if any child is inwork and DN is in work.
					#if( $keyFeatures[$arrayKeyIndex]['Feature']['status'] = 4)
					#{
						#Determine the Key
						#If the DN is not moved or added..
						if (($keyFeatures[$arrayKeyIndex]['Feature']['status'] != 6) && ($keyFeatures[$arrayKeyIndex]['Feature']['status'] != 5))
						{
							foreach ($allFeatureStatusMap[$arrayKeyIndex] as $statKeyFeat=>$statkeyVal)
							{
								#$this->log("Station controller : Feature DN Status : " . $arrayKeyIndex . $statKeyFeat . $statkeyVal, LOG_DEBUG);
								if ($statkeyVal == 4)
								{
									$keyFeatures[$arrayKeyIndex]['Feature']['status'] = 4;
								}
								
							}
						}
					#}
					
					
					
					if (substr($arrayKeyIndex, 0, 2) == 'FAIL') # TESTING REMOVED VALID CHACK FOR KEY 1 DN (BELOW)
					#if (substr($arrayKeyIndex, 0, 2) == '01')
					{
						$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = 'KEY1_DN';
						$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $keyFeatureMap[$arrayKeyIndex]['DN'];
						$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . 'KEY1_DN';
						#$this->log("Station controller : Feature : is KEY1_DN", LOG_DEBUG);
					}
					else
					{	
						#$this->log("Station controller : Feature : DIDN't MATCH KEY1_DN" . $arrayKeyIndex, LOG_DEBUG);
					
						$DN_VALUE = $keyFeatureMap[$arrayKeyIndex]['DN'];
						#$this->log("Station controller : Feature : Checking DN Type for $DN_VALUE", LOG_DEBUG);
						
						$dNfeatureType = $this->check_feature_type($arrayKey);
					
						#if(array_key_exists('madn', $stationFeatureMap[$arrayKeyIndex]))
						if($dNfeatureType == 'DN_MADN')
						{
							
							$madnGroupDetail = $this->Group->find('first', array (
									'conditions' => array (
										'Group.type' => 'MADN',
										'Group.identifier' => $DN_VALUE
									)
							));
							
							
							$keyFeatures[$arrayKeyIndex]['Feature']['link'] =  $madnGroupDetail['Group']['id'];
							
							$groupnamedetails = $this->Station->getGroupDisplaynameFromDn($DN_VALUE);
							#$results_array=print_r($groupname, true);
							#$this->log("Features controller : GROUP DISPLAY : $results_array", LOG_DEBUG);
							$groupname = $groupnamedetails[0]['features']['primary_value'];
							
							$keyFeatures[$arrayKeyIndex]['Feature']['label'] =  $groupname;
								

							#$stationFeatures[$arrayKeyIndex]['madn'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = 'DN_MADN';
							$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . 'DN_MADN';
							
							#$this->log("Station controller : Feature : is DN_MADN", LOG_DEBUG);
						}
						elseif($dNfeatureType == 'DN_MADN_PILOT')
						{
							$madnGroupDetail = $this->Group->find('first', array (
									'conditions' => array (
											'Group.type' => 'MADN',
											'Group.identifier' => $DN_VALUE
									)
							));
							$keyFeatures[$arrayKeyIndex]['Feature']['link'] =  $madnGroupDetail['Group']['id'];
							#$keyFeatures[$arrayKeyIndex]['Feature']['label'] =  $madnGroupDetail['Group']['name'];
							
							#$stationFeatures[$arrayKeyIndex]['madn_pilot'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = 'DN_MADN_PILOT';
							$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . 'DN_MADN_PILOT';
							#$this->log("Station controller : Feature : is DN_MADN_PILOT", LOG_DEBUG);
								
	
						}
						elseif($dNfeatureType == 'DN_XLH')
						{
							#$madnGroupDetail = $this->Group->find('first', array (
							#		'conditions' => array (
							#				'Group.type' => 'MADN',
							#				'Group.identifier' => $DN_VALUE
							#		)
							#));
							$keyFeatures[$arrayKeyIndex]['Feature']['link'] =  'UNSET_XLH';
							$keyFeatures[$arrayKeyIndex]['Feature']['label'] =  'UNSET_XLH';
							
							#$stationFeatures[$arrayKeyIndex]['madn_pilot'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = 'DN_XLH';
							$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . 'DN_XLH';
							#$this->log("Station controller : Feature : is DN_MADN_PILOT", LOG_DEBUG);
								
	
						}
						else
						{
							#$stationFeatures[$arrayKeyIndex]['DN_INDIVIDUAL'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = 'DN_INDIVIDUAL';
							$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $DN_VALUE;
							$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . 'DN_INDIVIDUAL';
							#$this->log("Station controller : Feature : is DN_INDIVIDUAL", LOG_DEBUG);
						}
					}
					continue 2; #go to next key
				}
				else
				{
					#For all other features set the primary_value depending on their type:
					
					$keyFeatures[$arrayKeyIndex]['Feature']['label'] = $keyFeatureLabelMap[$arrayKeyIndex][$arrayFeatureIndex];
					#$stationFeatures[$arrayKeyIndex][$arrayFeatureIndex] = $arrayKeyPrimary;
					$keyFeatures[$arrayKeyIndex]['Feature']['short_name'] = $arrayFeatureIndex;
					
					$keyFeatures[$arrayKeyIndex]['Feature']['id'] = $arrayKeyIndex . '-' . $arrayFeatureIndex;
					#$this->log("Station controller : Feature : is other $arrayFeatureIndex", LOG_DEBUG);
					
					#--------------------------------
					# For tpyes that have MEmbers
					#--------------------------------
					
					if (($arrayFeatureIndex == 'MSB') || ($arrayFeatureIndex == 'CPU') || ($arrayFeatureIndex == 'CFK'))
					{
						$keyList = '';
						#$this->log("Station controller : Finding Keylist Members :" . $arrayFeatureIndex, LOG_DEBUG);
						foreach($allFeatureMap as $memberKeyIndex=>$memberKey)
						{
							$memberLookup = $arrayFeatureIndex . 'MEMBER';
							#$this->log("Station controller : Finding Checking :allFeatureMap[" .$memberKeyIndex . $memberLookup, LOG_DEBUG);
							
							if ($allFeatureMap[$memberKeyIndex][$memberLookup] == 1)
							{
								
								$keyList = $keyList . ',' . substr($memberKeyIndex, 0, 2);
							}
							#$this->log("Station controller : Feature : is other $arrayFeatureIndex", LOG_DEBUG);
						}
						$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $keyList;
						if ($arrayFeatureIndex == 'CPU')
						{
							 $cpuGroupDetail = $this->Group->find('first', array (
                 				               'conditions' => array (
                                                		'Group.type' => 'CPU',
                                                		'Group.id' => $arrayKeyPrimary
                                				)
                						));

							$keyFeatures[$arrayKeyIndex]['Feature']['label'] =  $cpuGroupDetail['Group']['name'];
							$keyFeatures[$arrayKeyIndex]['Feature']['link'] =  $cpuGroupDetail['Group']['id'];
						}
					}
					if (($arrayFeatureIndex == 'AUD') || ($arrayFeatureIndex == 'BLF'))
					{
						
						$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = 	$keyFeatureMap[$arrayKeyIndex][$arrayFeatureIndex];
					
						#$keyFeatures[$arrayKeyIndex]['Feature']['label'] =  'kk';
						
						
					}
					else {
						#$keyFeatures[$arrayKeyIndex]['Feature']['primary_value'] = $arrayKeyPrimary;
					}
					
				}
				
			}
		}
		
		
	
		#--------------------------------------------------------------------------------------------#
		#							Create an array containing station features							 #
		#--------------------------------------------------------------------------------------------#
		
		$stationFeatures = $this->Feature->find('all', array (
		
				'conditions' => array (
						'Feature.id like' => '%' . $station_id . '%'
				)
				,'order' => array (
						'Feature.id',
				),
		));
		
		$stationDisplayFeature = array('MSBEnable','LNR', 'COM', 'SIMRING', 'CFRA','CWT', 'CTI', 'DCPU', 'SCS','AUTODISP');
		
		$this->set('stationDisplayFeature', $stationDisplayFeature);
		
		
		
		
		
		#Loop throught the features and foreach stationeky determine a type for that key
		foreach($stationFeatures as $stationfeature)
		{
			$shortName = $stationfeature['Feature']['short_name'];
			#$stationKey = $stationfeature['Feature']['stationkey_id'];
			$primaryValue = $stationfeature['Feature']['primary_value'];
				
			$stationFeaturesMap[$shortName] = $primaryValue;
				
		}
		
		$results_array=print_r($stationFeaturesMap, true);
		#$this->log("Station controller : station featuresarray : $results_array", LOG_DEBUG);
		#Need to change this to be free analogue ports only
		$portslist = $this->Port->find('list');
		foreach ($portslist as $port_id)
		{
			$ports[$port_id] = $port_id;
		}
		$this->set('ports', $ports);
		
		/*
		$phoneTypes['CICM']['1120'] = '1120';
		$phoneTypes['CICM']['1140'] = '1140';
		$phoneTypes['CICM']['11xx'] = '11xx';
		$phoneTypes['ANLG']['FAX'] = 'FAX';
		$phoneTypes['ANLG']['Other'] = 'Other';
		
		*/
		$phoneTypes = array();
		$this->Station->recursive=-1;
		$stationDetails1 = $this->Station->find('all',array('conditions'=>array('Station.phone_type >'=>0, 'Station.type !='=>''), 'fields'=>array('Distinct Station.phone_type,Station.type'),'limit' => 50));
		
		
		foreach($stationDetails1 as $value)	{
		  #$phonetype = strtoupper($value['Station']['phone_type']);
		  $phonetype = $value['Station']['phone_type'];
		  $type = $value['Station']['type'];	
		  
		  $phoneTypes[$type][$phonetype] = $phonetype;
		  
		  #$results_array=print_r($phoneTypes, true);
		  #$this->log("Station controller : PHone Type Array : $results_array", LOG_DEBUG);
		}		
		
		$this->set('phoneTypes',$phoneTypes);
		
		#$this->log("Station controller : feature results : $results_array", LOG_DEBUG);
		#$results_array=print_r($stationFeaturesSource, true);
		#$this->log("Station controller : feature results : $results_array", LOG_DEBUG);
		$this->set('keyFeatures', $keyFeatures);
		$this->set('stationFeatures', $stationFeaturesMap);
		$this->set('stationDetails', $stationDetails);
		$this->set('stationDetails1', $stationDetails1);
		$this->set('statId', $station_id);
		$this->set('customer_id', $customer_id);
		
		//echo "<pre>";print_r($keyFeatures);
		
		
		// Make sure translation has entered for create scenario button		
		$selectedLanguage = $_SESSION['Config']['language'];
		
		$audlang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'AUD')));
		$blflang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'BLF')));
		$cnflang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'CNF')));
		$prklang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'PRK')));
		$raglang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'RAG')));
		$cpulang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'CPU')));
		$cxrlang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'CXR')));
		$cfuiflang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'CFUIF')));
		$dnlang = $this->Transentry->find('all',array('conditions'=>array('Transentry.language LIKE'=>"%".$selectedLanguage."%",'Tag.tag'=>'DN_INDIVIDUAL')));
        
		$this->set('audlang',$audlang);
		$this->set('blflang',$blflang);
		$this->set('cnflang',$cnflang);
		$this->set('prklang',$prklang);
		$this->set('raglang',$raglang);
		$this->set('cpulang',$cpulang);
		$this->set('cxrlang',$cxrlang);
		$this->set('cfuiflang',$cfuiflang);
		$this->set('dnlang',$dnlang);
		
		
		
		
		
		if (isset ($_SESSION['success']))
			$this->set('success', $_SESSION['success']);
		$_SESSION['success'] = '';
		
		if (isset ($_SESSION['error']))
			$this->set('error', $_SESSION['error']);
		$_SESSION['error'] = '';
		
		if ($stationDetails[0]['Station']['status'] == '5')
		{
			$this->set('inProgress', 'TRUE');
		}
		
		#Log data for hsitory
		
		#Now send logs
		$cond =array('Log.affected_obj'=>$station_id,'Log.customer_id'=>$customer_id);
	
		$this->paginate['Paginate']	= $this->AutoPaginate->setPaginate();
		#$this->paginate['limit'] = 5;
		$this->paginate = array('limit' => $this->paginate['limit'],'conditions'=>$cond, 'order'=>'Log.id desc');
		$loginfo = $this->paginate('Log');
		$this->set('loginfo',$loginfo);
		
		
		$locationpro = $this->Location->find('all',array('conditions'=>array('Location.customer_id'=>$customer_id)));
		
		
		$this->set('pr_nr',$locationpro);

	}

	
	/**
	 * function for getting the station major features
	 *
	 */
	function station_features($station_id = null) {
	
		
		#if($this->RequestHandler->isAjax()==true)
		#{
		#	echo "<pre/>"; $result = $_REQUEST["table-3"]; print_r($this->params);  die;
		#}
		$this->Session->write('sel_customer', '');
		$this->pageTitle = 'Station Details';
	
		if (!$station_id) {
			$this->redirect('/customers');
			exit ();
		}
	
		$stationDetails = $this->Station->find('all', array (
				'conditions' => array (
						'Station.id' => $station_id
				)
		));
	
		/**these for getting the current customer name*/
		if (isset ($stationDetails[0]['Customer']['name']))
			$this->set('SELECTED_CUSTOMER_NAME', $stationDetails[0]['Customer']['name']);
		$customer_id = $stationDetails[0]['Customer']['id'];
		$this->set('SELECTED_CNN', $stationDetails[0]['Customer']['id']);
	
			
	
		#--------------------------------------------------------------------------------------------#
		#							Create an array containing station features							 #
		#--------------------------------------------------------------------------------------------#
	
#		#$stationFeatures = $this->Feature->find('all', array (
		
#		'conditions' => array (
#		'Feature.short_name' =>
#		array(
#		'SIMRING','SIMRINGMEMBER1','SIMRINGMEMBER2','SIMRINGMEMBER3','SIMRINGMEMBER4',
#		'PASSWORD', 'COMBOX',
#		'MOH', 'CFRA', 'CWT', 'CTI', 'M522', 'RAG', 'PRK', 'CNF', 'MSB', 'UCDLG', 'UCD',
#		'MSBEnable'
#	),
#	'Feature.id like' => '%' . $station_id . '%'
#				)
#				,'order' => array (
#					'Feature.id',
#							),
#		));
		
		#	Changed the station feature query to get ALL
		
		$cpuGroupDetails = $this->Group->find('all', array (
		
				'conditions' => array (
						'Group.type' => 'CPU',
						'Group.customer_id' => $stationDetails[0]['Customer']['id']
				)
		));
		$cpuGroups[''] = ''; 		
		foreach($cpuGroupDetails as $value)	{
			$group_id = $value['Group']['id'];
			$group_name = $value['Group']['name'];
			$cpuGroups[$group_id] = $group_name;

		
			#$results_array=print_r($phoneTypes, true);
			#$this->log("Station controller : PHone Type Array : $results_array", LOG_DEBUG);
		}
		ksort($cpuGroups);
		$this->set('cpuGroups', $cpuGroups);
		
		$stationFeatures = $this->Feature->find('all', array (
		
				'conditions' => array (
						'Feature.id like' => '%' . $station_id . '%'
				)
				,'order' => array (
						'Feature.id',
				),
		));
	
	
		#Loop throught the features and foreach stationeky determine a type for that key
		foreach($stationFeatures as $stationfeature)
		{
			$shortName = $stationfeature['Feature']['short_name'];
			#$stationKey = $stationfeature['Feature']['stationkey_id'];
					$primaryValue = $stationfeature['Feature']['primary_value'];
	
					$stationFeaturesMap[$shortName] = $primaryValue;
	
	}
	
	$results_array=print_r($stationFeaturesMap, true);
	$this->log("Station controller : station featuresarray : $results_array", LOG_DEBUG);
			#Need to change this to be free analogue ports only
			$portslist = $this->Port->find('list');
			foreach ($portslist as $port_id)
			{
			$ports[$port_id] = $port_id;
	}
	$this->set('ports', $ports);
			$extensions['0'] = '0';
			$extensions['1'] = '1';
			$extensions['2'] = '2';
	
	
			$this->set('extensions',$extensions);
	
			#$this->log("Station controller : feature results : $results_array", LOG_DEBUG);
		#$results_array=print_r($stationFeaturesSource, true);
			#$this->log("Station controller : feature results : $results_array", LOG_DEBUG);
	
			$this->set('stationFeatures', $stationFeaturesMap);
			$this->set('stationDetails', $stationDetails);
			$this->set('statId', $station_id);
			$this->set('customer_id', $customer_id);
			if($stationDetails[0]['Station']['type'] == 'ANLG'){
				#$this->layout ='ajax';
				#Configure::write('debug',0);
				$this->render('/stations/anlg_station_features');
			}
			else 
			{
				$this->render('/stations/cicm_station_features');
			}
	
	}
	/**
	 * function for getting the list
	 *	
	 */
	function edit($station_id = null) {

		$this->Session->write('sel_customer', '');
		
		$toBe = $this->CStation->find('all', array (
				'conditions' => array (
						'id' => $station_id
				)
		));

		if (empty ($toBe)) {
		$this->pageTitle = 'Station Details';
		}
		else 
		{
			$this->pageTitle = 'Station Details (TO BE)';
		}
		
		if (!$station_id) {
			$this->redirect('/customers');
			exit ();
		}
		#Accept DN passed as argument will lookup station and redirect to correct station.
		//preg_match("/^DN-([0-9]+)/", $station_id, $matches);
		preg_match("/^([0-9]+)/", $station_id, $matches);	
		
		if ($matches[0]) {
			$DN_ID = $matches[1];
			#print "looking for station with DN -> $matches[1]";
			$record = $this->Stationkey->find('all', array (
				'conditions' => array (
					'Stationkey.dn' => $DN_ID
				)
			));

			if (empty ($record)) {

				print "NO STATIONKEY FOUND $record[0]['Stationkey]['station_id']";
				#exit ();

				$this->cakeError('accessDenied');
			} else {
				#if more than one record the treat as group
				
				if (count($record) > 1) {

					$pilotStation = $this->Station->getPilotFromDn($DN_ID);
					#print_r($pilotStation);
					#exit ();
					$this->redirect('/stations/edit/' . $pilotStation[0]['stationkeys']['station_id']);

				} else {
					#print_r($record);
					
					#print "FOUND $record[0]['Stationkey]['station_id']"; exit;
                   
				   
				  # $this->redirect('/stations/edit/' . $record[0]['Stationkey']['station_id']);
					#exit ();

				}
				//exit();
			}
		}

		#Accept KEY Id of format KEY@STATION passed as argument will lookup station and redirect to correct station.
		preg_match("/[0-9]+@([0-9]+)/", $station_id, $matches);
		if ($matches[0]) {
			#$this->redirect('/stations/edit/'.$matches[1]);
			print "STATION KEY DETECTED";
			exit ();
		}

		$location = $this->Station->find('all', array (
			'conditions' => array (
				"Station.status" => Configure :: read('status'),
				'Station.id' => $station_id
			)
		));

		/**these for getting the current customer name*/
		if (isset ($location[0]['Customer']['name']))
			$this->set('SELECTED_CUSTOMER_NAME', $location[0]['Customer']['name']);
		$customer_id = $location[0]['Customer']['id'];
		$this->set('SELECTED_CNN', $location[0]['Customer']['id']);
		/**end for getting the current customer name*/

		// for checking the correct user access
		if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {
			$id = $this->Session->read('SELECTED_CUSTOMER');
			if ($location[0]['Customer']['bsk'] != $id) {
				$this->layout = 'ajax';
				$this->cakeError('accessDenied');
			}
		}

		/**************** for single user accesss**********************/
		$this->_singleUserAccess($station_id);
		/**************** end of single user accesss**********************/

		$this->Stationkey->bindModel(array (
			'hasMany' => array (
				'Feature' => array (
					'conditions' => array (
						'Feature.stationkey_id' => 'Stationkey.id',
						'Feature.status' => Configure :: read('status')
					),
					'order' => array (
						'Feature.stationkey_id',
						'Feature.ord'
					)
				)
			)
		));

		$stationinfo = $this->Stationkey->find('all', array (
			'conditions' => array (
				"Stationkey.status" => Configure :: read('status'),
				'Stationkey.station_id' => $station_id
			),
			'order' => 'Stationkey.keynumber'
		));

		#print_r($stationinfo);
		#die();

		//echo "<pre>";print_r($stationinfo);	die();								
		/*-------------------for checking that the stationkeyidfor blf observer is exist------------------------*/
		$prim_val = '';
		$st_val = '';
		$blf_val = array ();
		$blf_exist = array ();
		$statID = array ();
		#$grp_exist		=array();
		$grp_members = array ();
		foreach ($stationinfo as $val) {
            
			foreach ($val['Feature'] as $feat_val) {
                 
				if ($feat_val['primary_value'] && ($feat_val['short_name'] == 'DN' || $feat_val['short_name'] == 'BLF')) {
					#$prim_val contains all of the DN's that are assigned to keys that have either DN or BLF features.
					$prim_val .= $feat_val['primary_value'] . ',';

				}
				#Set the group member for DN keys.
				if ($feat_val['primary_value'] && $feat_val['short_name'] == 'DN') {
					$grpStationKeyId = $val['Stationkey']['id'];
					#Contains all of the keys that point to DN
					$grp_members[$grpStationKeyId] = $this->Station->getGroupMembersFromDn($feat_val['primary_value']);
					#Contains only the pilot keys that point to DN
					$grp_pilots[$grpStationKeyId] = $this->Station->getPilotFromDn($feat_val['primary_value']);

					#$grp_members[$grpStationKeyId]	=	'TEST';

				}
			}

		}

		if (!empty ($prim_val)) {
			#blf_val contains the stationkeys that actually have BLF enabled.		
			$blf_val = $this->Feature->checkStationkeyId(trim($prim_val, ','));

			if (!empty ($blf_val)) {
				foreach ($blf_val as $blf) {
					$blf_exist[] = $blf['Feature']['primary_value'];
					$st_val .= $blf['Feature']['primary_value'] . ',';
				}

				$statid_val = $this->Feature->stationIdList(trim($st_val, ',')); //echo "<pre>";print_r($statid_val);die();
				foreach ($blf_exist as $val) {
					$statID[$val] = '';
					foreach ($statid_val as $val1) {

						if ($val == $val1['Feature']['primary_value']) {
							$statID[$val] .= $val1['Stationkey']['id'] . ' , ';
						}

					}
				}

			}

		}

		//print_r($statID);	

		/*-------------------end for checking that the blf is exist and this $blf_exist is checked as inarray in the view page------------------------*/

		//echo "<pre>";print_r($stationinfo);die();						

		$this->set('stationinfo', $stationinfo);
		
		if ($stationinfo[0]['Station']['status'] == '5')
		{
			$this->set('inProgress', 'TRUE');
		}
		
		$this->set('blf_exist', $blf_exist);
		$this->set('grp_members', $grp_members);
		$this->set('grp_pilots', $grp_pilots);
		$this->set('statID', $statID);
		if (isset ($location[0]))
			$this->set('location', $location[0]);
		else
			$this->set('location', array ());

		if (isset ($_SESSION['success']))
			$this->set('success', $_SESSION['success']);
		$_SESSION['success'] = '';

		if (isset ($_SESSION['error']))
			$this->set('error', $_SESSION['error']);
		$_SESSION['error'] = '';

		$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));
        
		/*CBM Added*/

		$customerInfo = $this->Customer->findById($stationinfo[0]['Station']['customer_id']);

		if (isset ($customerInfo['Customer']['name'])) {
			$this->set('selected_customer', $customerInfo['Customer']['name']);
		} else {
			$this->set('selected_customer', 'UNDEF');
		}

	}
	/**
	 * function for saving the station details
	 *
	 */
	function update($station_id = null) {

		$this->blfPrimKey = array ();
		$this->station_id = $station_id;
		$this->Stationkey->bindModel(array (
			'hasMany' => array (
				'Feature' => array (
					'conditions' => array (
						'Feature.stationkey_id' => 'Stationkey.id'
					)
				)
			)
		));

		$stationinfo = $this->Stationkey->find('all', array (
			'conditions' => array (
				"Stationkey.status" => Configure :: read('status'),
				'Stationkey.station_id' => $station_id
			)
		));
		$this->dbsave = 1;

		$this->customerID = $stationinfo[0]['Station']['customer_id'];
		

		/**********for case of internal/external users********/
		if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {

			$id = $this->Session->read('SELECTED_CUSTOMER');

			//if (!$this->Customer->validCustomer($id, $this->customerID)) {
			//	$this->redirect('/customers');
			//	exit ();
			//}

		}
		/**********************END*************************/

		/**************activity log*****************/

		#$log_string	= date('Y-m-d H:i:s') .' Activity :'.$this->customerID.' | '.$station_id.' | '.$this->Session->read('USERNAME').' | configuration change in  station ||'	;
		$log_string = $this->customerID . ' | ' . $station_id . ' | ' . $this->Session->read('USERNAME') . ' | configuration change in  station ||';

		$this->log($log_string, 'activity');
		//$this->log('configuration change in  station '. $station_id.' by the user '.$this->Session->read('USERNAME').' whose id is '.$this->Session->read('SELECTED_CUSTOMER'), 'activity');	
		/**************activity log*****************/

		$this->_changed_values();

		if (isset ($_POST['data_sel']))
			$dat_sel = $_POST['data_sel'];
		else
			$dat_sel = array ();
		if (isset ($_POST['data_txt']))
			$dat_txt = $_POST['data_txt'];
		else
			$dat_txt = array ();

		if (isset ($_POST['data_new']))
			$dat_val = $_POST['data_new'];
		else
			$dat_val = array ();

		if (isset ($_POST['data_label'])) //getting the value of label 
			$dat_label = $_POST['data_label'];
		else
			$dat_label = array ();

		if (isset ($_POST['dataLabel'])) //getting the value of label 
			$datalabel = $_POST['dataLabel'];
		else
			$datalabel = array ();

		$_SESSION['success'] = __('Saved Successfully', true);
		$this->redirect('/stations/edit/' . $station_id);
	}
	/**
	 * function for getting the changed values of station and show it in model box for confirmation
	 *
	 */
	function confirm_change() {
		$this->layout = 'ajax';
		$this->dbsave = 0;
		$this->station_id = $this->params['form']['stationname'];
		$this->validateErrors = array ();
		$this->blfPrimKey = array ();
		$this->blfDetail = array ();
		$this->confirm_change = 1;

		/**************** for single user accesss**********************/

		$val = $this->_singleUserAccess($this->station_id);

		/**************** end of single user accesss**********************/

		if (!$val) {
			$this->_changed_values(); // for showing the changed values 
			$this->action = 'confirm_change';
			if (!empty ($this->validateErrors)) {
				$this->set('blfValidate', $this->validateErrors);
			}
			elseif ($this->upadte_occur) $this->set('display', $this->update);
		} else {
			$this->set('userAcessDetail', $this->userAccess);
			$this->set('singleAcess', 1);
		}
	}
	/**
	 * function for showing the changed values and also for keeping in the log after confirmation
	 *
	 */

	function _changed_values() {
		/*************declaration******************/
		$this->upadte_occur = 0;
		$this->update = array ();
		$log_entry = '';
		$this->success = 1;
		$dat_sel = array ();
		$dat_txt = array ();
		$dat_label = array ();
		$dat_val = array ();
		/******************end*********************/

		/**************** for single user accesss**********************/
		$this->_singleUserAccess($this->station_id);
		/*************************** end ******************************/

		/****************the below code which is for getting the stationkey details for checking any modification done in the form******************/
		$this->Stationkey->bindModel(array (
			'hasMany' => array (
				'Feature' => array (
					'conditions' => array (
						'Feature.stationkey_id' => 'Stationkey.id',
						'Feature.status' => Configure :: read('status')
					)
				)
			)
		));

		$stationinfo = $this->Stationkey->find('all', array (
			'conditions' => array (
				"Stationkey.status" => Configure :: read('status'),
				'Stationkey.station_id' => $_POST['stationname']
			)
		));
		$i = 1; //echo "<pre>";print_r($stationinfo);die();
		$this->customerID = $stationinfo[0]['Station']['customer_id'];
		foreach ($stationinfo as $val_filter) {
			foreach ($val_filter['Feature'] as $getfeature) {
				$filter[$i]['Feature'] = $getfeature;
				$i++;
			}
		}
		$feat = $filter;
		$fet = array ();
		foreach ($this->data as $i => $val) {
			foreach ($feat as $j => $val1) {
				if ($val1['Feature']['id'] == $i) {
					$fet[$i]['id'] = $val1['Feature']['id'];
					$fet[$i]['short_name'] = $val1['Feature']['short_name'];
					if ($val1['Feature']['short_name'] == 'LANG')
						$fet[$i]['values'] = strtoupper(trim($val1['Feature']['primary_value']));
					else
						$fet[$i]['values'] = trim($val1['Feature']['primary_value']);
					$fet[$i]['stationkey_id'] = $val1['Feature']['stationkey_id'];
					$fet[$i]['secondary'] = trim($val1['Feature']['label']);
				}
			}
		}
		$this->oldervalue = $fet;
		/*******************************************end**********************************************************************/
		/************************************** getting the value from the form**********************************************/
		if (isset ($_POST['data_sel']))
			$dat_sel = $_POST['data_sel']; //getting the value of feature select if it has station key and feature short_name

		if (isset ($_POST['data_txt']))
			$dat_txt = $_POST['data_txt']; //getting the value of primary value (past it has no primary value)

		if (isset ($_POST['data_new']))
			$dat_val = $_POST['data_new']; //getting the value of feature value (past it has no short_name ie no BLF/AUD)

		if (isset ($_POST['data_label'])) //getting the value of label 
			$dat_label = $_POST['data_label'];

		/***********************************************end*************************************************************************/
		/*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
			implementation is for getting the value of newly changed ie from empty..
			
			USED IN THE XML REQUEST
			
			<object action="$this->action" name="$this->short_name">
		     <message station="$_POST['stationport']" key="key12">
		            <var value="LACURd" name="attribute1"/>
		            <var value="3225921" name="station_id"/>
		     </message>
			</object >
			
			$this->short_name 					is the value  for tag "name"
			$this->action     					is the value for  tag  "action"
			$this->key       					 is the value for  tag  "key"
			$this->newvalue['attribute1']   &&   $this->newvalue['station_id'] && $this->newvalue['cnn_id']  for var messages in the xml
			
		@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@*/
		$j = 1;
		foreach ($dat_txt as $k => $txt) {
			/*************for checking the new feature  modified from empty short_name   to a non empty short_name(AUD/BLF)*************/
			if (isset ($dat_txt[$k][$j]) && isset ($dat_val[$k][$j]) && $dat_val[$k][$j]) {
				$this->upadte_occur = 1;
				$this->newvalue = array ();
				/**********************function for xml request based on the change*********************/
				$this->station_id = $_POST['stationname'];
				$this->key = $k;
				$this->action = 'add';

				if ($dat_val[$k][$j] == 'AUD') { //if the the short_name is Aud then have different xml format like AUD_FEATURE

					$this->short_name = $dat_val[$k][$j] . '_FEATURE';
					//$this->newvalue['attribute1']				=	'';	

					$this->_trace_changed_values(); // for xml processing

					//database saving
					if ($this->dbsave == 1) {
						$insert = array (
							'Feature' => array (
								'id' => $k . '-' . $dat_val[$k][$j],
								'stationkey_id' => $k,
								'short_name' => $dat_val[$k][$j],
								'created' => date('Y-m-d H:i:s'),
								'modified' => '0000-00-00 00:00:00',
								'status' => 1
							)
						);
						$this->_save2Db($insert);
					}

					if ($dat_txt[$k][$j]) {
						$this->short_name = $dat_val[$k][$j] . '_NUMBER';
						$this->newvalue['attribute1'] = $dat_txt[$k][$j];
						$this->_trace_changed_values(); // for xml processing	

						//database updation
						if ($this->dbsave == 1) {
							$update['Feature']['primary_value'] = $dat_txt[$k][$j];
							$update['Feature']['id'] = $k . '-' . $dat_val[$k][$j];
							$this->_update2Db($update, array (
								'id',
								'primary_value'
							));
						}
					}

				} else { //for blf

					if ($dat_txt[$k][$j]) {
						$this->short_name = $dat_val[$k][$j];
						$this->newvalue['attribute1'] = $dat_txt[$k][$j];
						$this->_trace_changed_values(); // for xml processing	

						//database saving
						if ($this->dbsave == 1) {
							$insert = array (
								'Feature' => array (
									'id' => $k . '-' . $dat_val[$k][$j],
									'stationkey_id' => $k,
									'short_name' => $dat_val[$k][$j],
									'created' => date('Y-m-d H:i:s'),
									'modified' => '0000-00-00 00:00:00',
									'status' => 1,
									'primary_value' => $dat_txt[$k][$j]
								)
							);
							$this->_save2Db($insert);
						}

					}
				}
				// sending label for both AUD and BLF
				if (isset ($dat_label[$k][$j]) && $dat_label[$k][$j]) {
					$this->action = 'update';

					if ($this->dbsave == 1)
						$this->newvalue['attribute1'] = $dat_label[$k][$j]; #CBM
					else
						$this->newvalue['attribute1'] = $dat_label[$k][$j];
					#$this->newvalue['attribute1']				=	utf8_decode($dat_label[$k][$j]);
					$this->newvalue['station_id'] = $this->station_id;

					$this->short_name = 'LABEL';
					$this->_trace_changed_values(); // for xml processing

					//database updation
					if ($this->dbsave == 1) {
						$update['Feature']['label'] = $dat_label[$k][$j];
						$update['Feature']['id'] = $k . '-' . $dat_val[$k][$j];
						$this->_update2Db($update, array (
							'id',
							'label'
						));
					}
				}

				/*******************************END**********************************************/

				//cheking whether this blf value can have moere than 8 blf values
				$key_num = explode('@', $k);
				if ($dat_val[$k][$j] == 'BLF') {

					$this->_validateBlfCount($dat_txt[$k][$j], $key_num);

				}
			}
			/*******************************************************end***********************************************/
			#CBM Code
			$j++;
		}

		/*************************all other changes with aud/blf updations ******************************************************/
		/*	getting the values from data (where these have already values that values may have modify /not)*/
		/*  $fet contains the values from the database*/

		if (isset ($_POST['dataLabel']))
			$secondary = $_POST['dataLabel'];
		else
			$secondary = array ();
		$this->secondary = $secondary;

		$this->key1 = 0;

		foreach ($this->data as $i => $val) {
			if (isset ($this->secondary[$i]) && $this->secondary[$i]) {
				if ($this->dbsave == 1)
					$this->secondary[$i] = $this->secondary[$i];
				else
					$this->secondary[$i] = utf8_decode($this->secondary[$i]);
				#$this->secondary[$i]		=	$this->secondary[$i];
			}

			if (isset ($fet[$i])) {
				/*******************************checking whether the value is modified***********************************/
				if ($this->data[$i] !== $fet[$i]['values'] || ((isset ($dat_sel[$i])) && $dat_sel[$i] != $fet[$i]['short_name']) || (isset ($this->secondary[$i])) && $this->secondary[$i] !== $fet[$i]['secondary']) {
					$blfValidateCheckExclude = 0; # Used to determine which features generate a BLF observer Check

					$this->upadte_occur = 1;
					$isem = 0;
					$del = 0;

					/**********************this is for just getting the changed short_name ie AUD/BLF (checked whether it is deleted or changed to another short_name or only changing the value of short name)**************************/
					if (strtoupper($fet[$i]['short_name']) == 'AUD' || strtoupper($fet[$i]['short_name']) == 'BLF') {
						//echo $fet[$i]['short_name'] ."!=".$dat_sel[$i];die();
						if ($fet[$i]['short_name'] != $dat_sel[$i]) {

							$del = 1;

							if ($fet[$i]['short_name'] == '')
								$old_shortname = 'NO FEATURE';
							else
								$old_shortname = $fet[$i]['short_name'];

							if ($dat_sel[$i] == '')
								$new_shortname = 'NO FEATURE';
							else
								$new_shortname = $dat_sel[$i];

							$log_shortname = $old_shortname . "->" . $new_shortname;
							#orig RE1 $short_name_sel = '<span style="color:orange;">' . $old_shortname . '</span> changed to <span style="color:red;">' . $new_shortname . '</span> and its';
							$short_name_sel = $old_shortname . 'changed to ' . $new_shortname . ' and its';
						} else {

							if ($dat_sel[$i] == '')
								$new_shortname = 'NO FEATURE';
							else
								$new_shortname = $dat_sel[$i];

							#orig RE1 $short_name_sel = '<span style="color:red;">' . $dat_sel[$i] . '</span>';
							$short_name_sel = $dat_sel[$i];
							$log_shortname = $new_shortname;

						}

						$this->short_name = $dat_sel[$i];
						$isem = 1;

					}
					/************************************END*************************************/
					else {
						$log_shortname = $fet[$i]['short_name'];
						# orig RE1 $short_name_sel = '<span style="color:red;">' . $fet[$i]['short_name'] . '</span>';
						$short_name_sel = $fet[$i]['short_name'];
						$this->short_name = $fet[$i]['short_name'];
					}

					/**********************function for xml request based on the change*********************/

					$this->station_id = $_POST['stationname'];
					$this->key = $fet[$i]['stationkey_id'];

					/************xml process for ncos calculation*****************/
					if ($this->key1 != $this->key && (strtolower($this->short_name) == 'lang' || strtolower($this->short_name) == 'barringset')) {
						$this->key1 = $this->key;
						$this->_ncoscalculation(); // for ncos calculation
						if ($this->dbsave == 1) {
							$this->_update2Db($this->ncos_baringupdate, array (
								'id',
								'primary_value'
							));
							$this->ncos_baringupdate = array ();

							$this->_update2Db($this->ncos_langupdate, array (
								'id',
								'primary_value'
							));
							$this->ncos_langupdate = array ();
						}

					}

					/************END*****************/

					if ((strtolower($this->short_name) == 'cfb') || (strtolower($this->short_name) == 'cfbstatus') || (strtolower($this->short_name) == 'cfu') || (strtolower($this->short_name) == 'cfustatus') || (strtolower($this->short_name) == 'cfk') || (strtolower($this->short_name) == 'cfkstatus') || (strtolower($this->short_name) == 'cfna') || (strtolower($this->short_name) == 'cfnastatus') || (strtolower($this->short_name) == 'cfdvt') || (strtolower($this->short_name) == 'displayname') || (strtolower($this->short_name) == 'aud') || (strtolower($this->short_name) == 'blf') || ($this->short_name == '')) {

						$this->short_name1 = $this->short_name;
						$this->newvalue = array ();

						/***********if feature(AUD/BLF) is empty****************/
						if ($isem && empty ($this->short_name1)) {

							$this->action = 'delete';
							if ($fet[$i]['short_name'] == 'AUD')
								$this->short_name = $fet[$i]['short_name'] . '_FEATURE';
							else
								$this->short_name = $fet[$i]['short_name'];

							$this->_trace_changed_values(); // xml request process

							//database deletion
							if ($this->dbsave == 1) {
								$delete = array (
									'Feature.id' => $i
								);
								$this->Feature->deleteAll($delete);
							}

							/*	if($fet[$i]['short_name']=='AUD'){	
									if((isset($fet[$i]['values'])) && $fet[$i]['values'] ){
											
											$this->action								=	'delete';
											$this->short_name							=	$fet[$i]['short_name'].'_NUMBER';
											$this->_trace_changed_values ();// xml request process
										}
								}*/

							if ((isset ($fet[$i]['secondary'])) && $fet[$i]['secondary']) {
								$this->newvalue['station_id'] = $this->station_id;
								$this->action = 'update';
								$this->newvalue['attribute1'] = "";
								$this->short_name = 'LABEL';
								$this->_trace_changed_values(); // xml request process
							}

						}
						/*******************END*********************************/
						/*******************if short name is changed eg:-changed from AUD to BLF***********************/
						elseif ($isem && $del && $this->short_name1) {

							if ($this->short_name1 == 'BLF') { // if changed from AUD to BLF

								$this->action = 'delete';
								$this->short_name = $fet[$i]['short_name'] . "_FEATURE";

								$this->_trace_changed_values(); // xml request process

								//database deletion
								if ($this->dbsave == 1) {

									$delete = array (
										'Feature.id' => $i
									);
									$this->Feature->deleteAll($delete);
								}

								/*if((isset($fet[$i]['values'])) && $fet[$i]['values'] ){
									
									$this->action								=	'delete';
									$this->short_name							=	$fet[$i]['short_name'].'_NUMBER';
									$this->_trace_changed_values ();// xml request process
								}*/

								/*if((isset($fet[$i]['secondary'])) && $fet[$i]['secondary'] ){
									$this->newvalue['station_id']				=	$this->station_id;
									$this->action								=	'update';
									$this->newvalue['attribute1']				=	$fet[$i]['secondary'];
									$this->short_name							=	'LABEL';
									$this->_trace_changed_values ();// xml request process
								}*/
							}
							if ($this->short_name1 == 'AUD') { // if changed from BLF to AUD

								$this->action = 'delete';
								$this->short_name = $fet[$i]['short_name'];
								$this->_trace_changed_values(); // xml request process

								//database deletion
								if ($this->dbsave == 1) {

									$delete = array (
										'Feature.id' => $i
									);
									$this->Feature->deleteAll($delete);
								}

								/*if((isset($fet[$i]['secondary'])) && $fet[$i]['secondary'] ){
										// xml request process
									$this->newvalue['station_id']			=	$this->station_id;
									$this->action							=	'update';
									$this->newvalue['attribute1']			=	$fet[$i]['secondary'];
									$this->short_name						=	'LABEL';
									$this->_trace_changed_values ();// xml request process
								}*/
							}
							$this->newvalue = array ();
							if ($this->short_name1 == 'AUD') { //if new value is AUD

								$this->action = 'add';
								$this->short_name = $this->short_name1 . '_FEATURE';
								$this->_trace_changed_values(); // xml request process

								//database insertion
								if ($this->dbsave == 1) {
									$insert = array (
										'Feature' => array (
											'id' => $this->key . '-' . $this->short_name1,
											'stationkey_id' => $this->key,
											'short_name' => $this->short_name1,
											'created' => date('Y-m-d H:i:s'),
											'modified' => '0000-00-00 00:00:00',
											'status' => 1
										)
									);
									$this->_save2Db($insert);
								}

								if ($this->data[$i]) {
									$this->newvalue['attribute1'] = $this->data[$i];
									$this->short_name = $this->short_name1 . '_NUMBER';
									$this->_trace_changed_values(); // xml request process

									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}

								}

							}
							if ($this->short_name1 == 'BLF') { //if new value is AUD

								$this->action = 'add';
								$this->newvalue['attribute1'] = $this->data[$i];
								$this->short_name = $this->short_name1;
								$this->_trace_changed_values(); // xml request process

								//database updation
								if ($this->dbsave == 1) {
									$insert = array (
										'Feature' => array (
											'id' => $this->key . '-' . $this->short_name1,
											'stationkey_id' => $this->key,
											'short_name' => $this->short_name1,
											'created' => date('Y-m-d H:i:s'),
											'modified' => '0000-00-00 00:00:00',
											'status' => 1,
											'primary_value' => $this->data[$i]
										)
									);
									$this->_save2Db($insert);
								}

							}

							if (isset ($this->secondary[$i]) && $this->secondary[$i]) {
								$this->newvalue['station_id'] = $this->station_id;
								$this->action = 'update';
								$this->newvalue['attribute1'] = $this->secondary[$i];
								$this->short_name = 'LABEL';
								$this->_trace_changed_values(); // xml request process

								//database updation
								if ($this->dbsave == 1) {
									$update['Feature']['label'] = $this->secondary[$i];
									$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
									$this->_update2Db($update, array (
										'id',
										'label'
									));
								}

							} else {
								if (isset ($fet[$i]['secondary']) && $fet[$i]['secondary']) {
									$this->newvalue['station_id'] = $this->station_id;
									$this->action = 'update';
									$this->newvalue['attribute1'] = '';
									$this->short_name = 'LABEL';
									$this->_trace_changed_values(); // xml request process
								}

							}
						}
						/**************************END****************************/
						elseif ($isem && $this->short_name1) { // only modified the primary_value & label of shortname

							$this->newvalue = array ();
							if ($this->short_name1 == 'AUD') {

								/*$this->action							=	'update';
								$this->short_name						=	$this->short_name1.'_FEATURE';
								$this->_trace_changed_values ();// xml request process*/

								if ((isset ($fet[$i]['values'])) && $fet[$i]['values'] == '' && $this->data[$i]) { // if primary_value is updated from empty to a nonempty value

									$this->action = 'add';
									$this->short_name = $this->short_name1 . '_NUMBER';
									$this->newvalue['attribute1'] = $this->data[$i];

									$this->_trace_changed_values(); // xml request process
									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}

								}
								elseif ((isset ($fet[$i]['values'])) && $fet[$i]['values'] && empty ($this->data[$i])) { // if primary_value is updated from empty to a nonempty value

									$this->action = 'delete';
									$this->short_name = $this->short_name1 . '_NUMBER';

									$this->_trace_changed_values(); // xml request process

									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}

								}
								#elseif((isset($fet[$i]['values'])) && $fet[$i]['values'] && $fet[$i]['values']!==$this->data[$i]){// if primary_value is updated value # CBM COmparison and leading 0
								elseif ((isset ($fet[$i]['values'])) && $fet[$i]['values'] && $fet[$i]['values'] !== $this->data[$i]) { // if primary_value is updated value

									$this->action = 'update';
									$this->short_name = $this->short_name1 . '_NUMBER';
									$this->newvalue['attribute1'] = $this->data[$i];
									$this->_trace_changed_values(); // xml request process

									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}
								}

							} else { // in the case of blf

								/*$this->action							=	'update';
								$this->short_name						=	$this->short_name1.'_FEATURE';
								$this->_trace_changed_values ();// xml request process*/

								if ((isset ($fet[$i]['values'])) && $fet[$i]['values'] == '' && $this->data[$i]) { // if primary_value is updated from empty to a nonempty value
									$blfValidateCheckExclude = 2; # Ensures BlfValidate Check

									$this->action = 'add';
									$this->short_name = $this->short_name1;
									$this->newvalue['attribute1'] = $this->data[$i];

									$this->_trace_changed_values(); // xml request process
									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}
								}
								elseif ((isset ($fet[$i]['values'])) && $fet[$i]['values'] && empty ($this->data[$i])) { // if primary_value is updated from empty to a nonempty value
									$blfValidateCheckExclude = 2; # Ensures BlfValidate Check

									$this->action = 'delete';
									$this->short_name = $this->short_name1;

									$this->_trace_changed_values(); // xml request process

									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}
								}
								elseif ((isset ($fet[$i]['values'])) && $fet[$i]['values'] && $fet[$i]['values'] != $this->data[$i]) { // if primary_value is updated value

									$blfValidateCheckExclude = 2; # Ensures BlfValidate Check

									$this->action = 'update';
									$this->short_name = $this->short_name1;
									$this->newvalue['attribute1'] = $this->data[$i];
									$this->_trace_changed_values(); // xml request process

									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = $this->data[$i];
										$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));
									}
								}

							}
							if (isset ($this->secondary[$i]) && $this->secondary[$i] !== $fet[$i]['secondary']) {

								if ($blfValidateCheckExclude != 2) { # If this is only a label update on its own, i.e not updates set already.
									$blfValidateCheckExclude = 1; # Stops BlfValidate Check
								}

								$this->newvalue['station_id'] = $this->station_id;
								$this->action = 'update';
								$this->newvalue['attribute1'] = $this->secondary[$i];

								$this->short_name = 'LABEL';

								$this->_trace_changed_values(); // xml request process

								//database updation
								if ($this->dbsave == 1) {

									$update['Feature']['label'] = $this->secondary[$i];
									$update['Feature']['id'] = $this->key . '-' . $this->short_name1;
									$this->_update2Db($update, array (
										'id',
										'label'
									));
								}
							}
						}
						elseif ((preg_match("/^(CFU)/", $fet[$i]['short_name'], $cf_matches)) || (preg_match("/^(CFK)/", $fet[$i]['short_name'], $cf_matches)) || (preg_match("/^(CFB)/", $fet[$i]['short_name'], $cf_matches)) || (preg_match("/^(CFNA)/", $fet[$i]['short_name'], $cf_matches))) {
							
							#Check that not run before.
							
							$cf_type = $cf_matches[1];
							if (!(preg_match("/(.*)Status/", $i, $matches))) {
								if (!empty ($this->data[$i])) {
									$this->newvalue['number'] = $this->data[$i];
								} else {
									$this->newvalue['number'] = '$';
								}
								$numberVar = $i;
								$statusVar = $i . 'Status';
								$this->newvalue['status'] = $this->data[$statusVar];

								$this->action = 'update';
								$this->short_name = strtolower($cf_type);
								
								$this->_trace_changed_values();
								
								#Delete a corresponding Status value to ensure XML is not sent twice/
								#unset ($this->data[$statusVar]);
								#unset ($this->data[$numberVar]);

							}
							elseif (preg_match("/(.*)Status/", $i, $matches)) {
								preg_match("/(.*)Status/", $i, $matches);
								if ($matches[0]) {

									$this->newvalue['status'] = $this->data[$i];
									$numberVar = $matches[1];
									$statusVar = $i;
									if (!empty ($this->data[$numberVar])) {
										$this->newvalue['number'] = $this->data[$numberVar];
									} else {
										$this->newvalue['number'] = '$';
									}

									$this->action = 'update';
									$this->short_name = strtolower($cf_type);
									
									$this->_trace_changed_values();
									
									#Delete a corresponding Status value to ensure XML is not sent twice/
									#unset ($this->data[$statusVar]);
									#unset ($this->data[$numberVar]);

								}
							}

							
							//database updation
							if ($this->dbsave == 1) {
									
								#Save number value
								$update['Feature']['primary_value'] = $this->data[$numberVar];
								$update['Feature']['id'] = $numberVar;
								$this->_update2Db($update, array (
									'id',
									'primary_value'
								));
								
								$this->log("STATION CONTROLLER : Saving to DB CFx Number Value =>" . "$numberVar" . "$this->data[$numberVar]", LOG_DEBUG);
								

								#Update The status value as well.
								$update['Feature']['primary_value'] = $this->data[$statusVar];
								$update['Feature']['id'] = $statusVar;
								$this->_update2Db($update, array (
									'id',
									'primary_value'
								));
								$this->log("STATION CONTROLLER : Saving to DB Cfx Status Value =>" . "$statusVar" . "$this->data[$statusVar]", LOG_DEBUG);
						
							}
							
							#Delete a corresponding Status value to ensure XML is not sent twice/
							unset ($this->data[$statusVar]);
							unset ($this->data[$numberVar]);
							
							$this->log("STATION CONTROLLER : Deleting values to ensure not sent twice =>" . "$numberVar" . "$this->data[$numberVar]", LOG_DEBUG);

						}
						elseif (preg_match("/^CFDVT/", $fet[$i]['short_name'])) {

							$this->newvalue['attribute1'] = $this->data[$i];

							if (isset ($_POST['stationport']) && $_POST['stationport']) {
								#Logic to determin ALNG and CICM to set the PRGRING VAR
								if (preg_match("/\bCICM\b/i", $_POST['stationport'])) {
									$this->newvalue['prgring'] = '';
								} else {
									$this->newvalue['prgring'] = 'PRGRING';

								}
							} else {
								#Logic to determin ALNG and CICM to set the PRGRING var.
								if (preg_match("/\bCICM\b/i", $this->stationPort)) {
									$this->newvalue['prgring'] = '';
								} else {
									$this->newvalue['prgring'] = 'PRGRING';
								}
							}

							$this->action = 'update';
							$this->short_name = 'cfdvt';

							$this->_trace_changed_values();

							//database updation
							if ($this->dbsave == 1) {
								$update['Feature']['primary_value'] = $this->data[$i];
								$update['Feature']['id'] = $i;
								$this->_update2Db($update, array (
									'id',
									'primary_value'
								));
								#$this->log("!!!!!!!!!!!UPDATING DB =>" . "$i" . "$this->data[$i]", LOG_DEBUG);

							}

						} else { // for all other form fields eg:- DisplayName
						
								$this->newvalue = array ();
								//To hanldlw when lower case value (but the same value is entered e.g sMALL SMALL)
								if (strtoupper($this->data[$i]) !== $fet[$i]['values'])
								{
								
									if ($fet[$i]['short_name'] == 'DISPLAYNAME') {
								

										#First look to see if there is a presejtation group defined for the customer.
										#IF so use that else revert to defaault logic.

										/**these for getting the current customer PG*/
										
										$stationPG = $this->Station->findById($this->station_id);
										if (isset ($stationPG['Customer']['presentation_group']))
										{
											$this->newvalue['cnn_id'] = $stationPG['Customer']['presentation_group'];
										
										}
										else
										{
											$this->newvalue['cnn_id'] = $this->customerID . 'PG';
										}
										
										$this->log("STATION CONTROLLER => PG IS" . $stationPG['Customer']['presentation_group'], LOG_DEBUG);
										/**end for getting the current customer PG*/
										if (!empty ($this->data[$i]))
											$this->newvalue['attribute1'] = strtoupper($this->data[$i]);
										else
											$this->newvalue['attribute1'] = '_';
									} 
									else 
									{
										$this->newvalue['attribute1'] = $this->data[$i];
									}

									$this->action = 'update';
									$this->short_name = $fet[$i]['short_name'];

									$this->_trace_changed_values();
	
									//database updation
									if ($this->dbsave == 1) {
										$update['Feature']['primary_value'] = strtoupper($this->data[$i]);
										$update['Feature']['id'] = $i;
										$this->_update2Db($update, array (
											'id',
											'primary_value'
										));

										//Workaround for RE2

                                                                                $DnsDisplay = $update['Feature']['primary_value'];
                                                                                $DispFeatureKey = $fet[$i]['stationkey_id'];
                                                                                //not using label
                                                                                $sql    =       "select primary_value from features where stationkey_id = \"$DispFeatureKey\" and short_name = 'DN';";
                                                                                $results = $this->Feature->query($sql);
                                                                                $DnsId = $results[0]['features']['primary_value'];
                                                                                //$results_array=print_r($results, true);
                                                                                //$this->log("1Station controller : results : $results_array", LOG_DEBUG);


                                                                                //using label
                                                                                //$DnsId = $fet[$i]['secondary'];
                                                                                $this->log("STATION CONTROLLER => DISPLAYNAME" . $DnsDisplay . ' AND ' . $DnsId , LOG_DEBUG);
                                                                                $sql    =       "update dns set display=\"$DnsDisplay\" where id = $DnsId;";
                                                                                $results = $this->Dns->query($sql);

                                                                                //End workaround RE2

									}

								}
								else
								{
									unset($this->upadte_occur);
								}
						}

						//for label in the aud/BLF
						/*if((isset($this->secondary[$i])) && $this->secondary[$i]!=$fet[$i]['secondary'] ){
							$this->newvalue									= 	array();
							$this->action									=	'update';
								
							$this->newvalue['attribute1']					=	$this->secondary[$i];
							$this->newvalue['station_id']					=	$this->station_id;
							
							$this->short_name								=	'LABEL';
							
							if($fet[$i]['short_name']!=$this->short_name){
								if(!empty($this->secondary[$i]))
									$this->_trace_changed_values ();
							}else{
									$this->_trace_changed_values ();
							}
								
						}*/
						/*************for keeping in the log table******************/
						$key_num = explode('@', $fet[$i]['stationkey_id']);

						if ($this->data[$i] != $fet[$i]['values'])
							$log_entry .= 'key ' . $key_num[0] . " " . $log_shortname . ":" . (($fet[$i]['values']) ? $fet[$i]['values'] : 'empy value') . "->" . (($this->data[$i]) ? $this->data[$i] : 'empty value') . ',';
						if ((isset ($this->secondary[$i])) && $this->secondary[$i] != $fet[$i]['secondary']) {
							$log_entry .= 'key ' . $key_num[0] . " " . $log_shortname . "_LABEL:" . (($fet[$i]['values']) ? $fet[$i]['values'] : 'empy value') . "->" . (($this->secondary[$i]) ? $this->secondary[$i] : 'empty value') . ',';
						}
						/*************for keeping in the log table******************/
					}

					$key_num = explode('@', $fet[$i]['stationkey_id']);

					//cheking whether this blf value can have moere than 8 blf values
					if (isset ($new_shortname) && trim($new_shortname) == 'BLF' && $blfValidateCheckExclude != 1) {

						$this->_validateBlfCount($this->data[$i], $key_num);
					}

				}
				/**************************END*************************/
			}
		}
		/*******************************END***************************************************/
		if ($this->dbsave == 1) {

			// xml sending if passord changed
			if ($_POST['password'] !== $stationinfo[0]['Station']['password'] && $stationinfo[0]['Station']['type'] != 'ANLG') {
				#if($_POST['password']!=$stationinfo[0]['Station']['password']  && $stationinfo[0]['Station']['type']!='ANLG'){ #CBM Changes for leading 0 problem.

				$this->action = 'update';

				$this->newvalue['attribute1'] = $_POST['password'];
				$this->key = 0;
				$this->short_name = 'password';
				$this->_trace_changed_values();

				//database updation
				if ($this->dbsave == 1) {
					$update['Station']['password'] = $_POST['password'];
					$update['Station']['id'] = $this->station_id;
					$field = array (
						'id',
						'password'
					);
					$this->Station->save($update, false, $field);
				}

			} //end
		} else {

			// to show in dialog box if passord changed 
			#if($_POST['password']!=$stationinfo[0]['Station']['password'] && $stationinfo[0]['Station']['type']!='ANLG' ){ #CBM Changes for leading 0 problem.
			if ($_POST['password'] !== $stationinfo[0]['Station']['password'] && $stationinfo[0]['Station']['type'] != 'ANLG') {
				$this->upadte_occur = 1;
				#orig RE1 $this->update[]		=' <span style="color:black;">'.__('key',true).' 0 </span> <span style="color:red">'.__('Password',true).'</span> '.__('value changed',true).' '.__('to',true). ' <b style="color:blue">'.$_POST['password'].'</b> </span><br>';
				$this->update[] = __('key', true) . ' 0 ' . __('Password', true) . ' ' . __('value changed', true) . ' ' . __('to', true) . ' ' . $_POST['password'];
			}
		}
	}

	/**
	 * function for handling xml requests & responses
	 *
	 */

	function _trace_changed_values() {

			if ($this->dbsave == 0) {
				$this->_errorValidate();

			} 
			else 
			{
				$this->_message_resp_xml();

				$response = $this->_read('res');
				//$acknowledge	= $this->_read('ack');
				$this->_keeplog($response);
				if ($response != 'empty' && $response['id'] && $response['status'] == 1) {

					if ($response['response'] != 'action_complete') {
						$this->success = 0;
						$_SESSION['error'] = __('Error from modification', true) . ' : ' . $response['response'];
						$this->redirect('/stations/edit/' . $this->station_id);
					}

				} else {
					$this->success = 0;
					$_SESSION['error'] = 'Error from modification ' . ($response['response']) ? $response['response'] : '';
					$this->redirect('/stations/edit/' . $this->station_id);
				}
			}
		
	}
	function _save2Db($insert) {

		$this->Feature->create();
		$this->Feature->save($insert);

	}
	function _update2Db($update, $field) {

		$this->Feature->save($update, false, $field);

	}
	function _errorValidate() {
		$key_num = explode('@', $this->key);
		$value = '';
		if (isset ($this->newvalue['attribute1']) && $this->newvalue['attribute1'])
			$value = $this->newvalue['attribute1'];
		elseif  (((isset ($this->newvalue['number']) && $this->newvalue['number'])) || 
				((isset ($this->newvalue['status']) && $this->newvalue['status'])))
			$value = $this->newvalue['number'] . __(" with status " . $this->newvalue['status'], true);
			#$value = $value . __($this->newvalue['status'], true);
			$this->update[] = __('key', true) . ' ' . $key_num[0] . ' ' . __(strtolower($this->short_name), true) . ' ' . __($this->action, true) . ' ' . __($value,true);
	}
	function _keeplog($response) {
		$key_num = explode('@', $this->key);
		$value = '';
		if (isset ($this->newvalue['attribute1']) && $this->newvalue['attribute1'])
			$value = $this->newvalue['attribute1'];

		if ($response == 'empty') {
			$response = array ();
			$response['status'] = 0;
			$response['response'] = 'Xml Server is not responding';

		}

		# orig RE1 $log = '<span style="color:black;"> Key ' . $key_num[0] . ' </span> <span style="color:red">' . strtolower($this->short_name) . ' </span><span style="color:blue;">' . $this->action . ' </span>  <span style="color:orange;">' . $value . '</span><br>';
		#WOrking 20121126 $log = __('key', true) . ' ' . $key_num[0] . ' ' . __(strtolower($this->short_name), true) . ' ' . __($this->action, true) . ' ' . __($value,true);;
		$log = 'Station Update : key' . ' ' . $key_num[0] . ' ' . strtolower($this->short_name) . ' ' . $this->action . ' ' . $value;
		
		$insert = array (
			'Log' => array (
				'affected_obj' => $this->station_id,
				'log_entry' => $log,
				'created' => date('Y-m-d H:i:s'),
				'status' => 1,
				'customer_id' => $this->customerID,
				'bsk' => $this->Session->read('BSK'),
				'user' => $this->Session->read('ACCOUNTNAME'),
				'app_type' => $this->Session->read('APPNAME'),
				'modified' => '0000-00-00 00:00:00',
				'modification_status' => $response['status'],
				'modification_response' => $response['response']
			)
		);

		$this->Log->create();
		$this->Log->save($insert, false);

	}

	/**
	 * function for the Ncos calculation
	 *
	 */
	function _ncoscalculation() {

		$bar_ncos = Configure :: read('NCOS-BARRINGSET');
		$lang_ncos = Configure :: read('NCOS-LANGUAGE');
		$lead_ncos = Configure :: read('NCOS-LEADING');
		$lang = '';
		$barset = '';
		$lead = '';

		$feat = $this->Feature->find('all', array (
			'conditions' => array (
				"Feature.stationkey_id" => $this->key
			)
		));

		foreach ($feat as $val) {

			$id = $val['Feature']['id'];
			if ($val['Feature']['short_name'] == 'LANG') {

				if ($this->dbsave == 0) {
					if (strtolower($this->data[$id]) != strtolower($val['Feature']['primary_value'])) {
						$this->action = 'update to';
						$this->short_name = 'LANG';
						$this->newvalue['attribute1'] = $this->data[$id];
						$this->_errorValidate();
					}

				} else {

					if ((isset ($this->data[$id])) && $this->data[$id]) {
						$lang = $lang_ncos[strtoupper($this->data[$id])];

						//database updation
						if ($this->dbsave == 1) {
							$update['Feature']['primary_value'] = $this->data[$id];
							$update['Feature']['id'] = $id;

							$this->ncos_langupdate = array ();
							$this->ncos_langupdate = $update;

							//$this->_update2Db($update,array('id','primary_value'));
						}

					} else {
						$lang = $lang_ncos[strtoupper($val['Feature']['primary_value'])];

						//database updation
						if ($this->dbsave == 1) {
							$update['Feature']['primary_value'] = $val['Feature']['primary_value'];
							$update['Feature']['id'] = $id;

							$this->ncos_langupdate = array ();
							$this->ncos_langupdate = $update;
							//$this->_update2Db($update,array('id','primary_value'));
						}
					}
				}

			}
			if ($val['Feature']['short_name'] == 'BARRINGSET') {

				if ($this->dbsave == 0) {
					if (strtolower($this->data[$id]) != strtolower($val['Feature']['primary_value'])) {
						$this->action = 'update to';
						$this->short_name = 'BARRINGSET';
						$this->newvalue['attribute1'] = $this->data[$id];
						$this->_errorValidate();
					}

				} else {

					if ((isset ($this->data[$id])) && $this->data[$id]) {
						$barset = $bar_ncos[$this->data[$id]];

						//database updation
						if ($this->dbsave == 1) {
							$update['Feature']['primary_value'] = $this->data[$id];
							$update['Feature']['id'] = $id;

							$this->ncos_baringupdate = array ();
							$this->ncos_baringupdate = $update;

							//$this->_update2Db($update,array('id','primary_value'));
						}

					} else {
						$barset = $bar_ncos[$val['Feature']['primary_value']];

						//database updation
						if ($this->dbsave == 1) {
							$update['Feature']['primary_value'] = $val['Feature']['primary_value'];
							$update['Feature']['id'] = $id;

							$this->ncos_baringupdate = array ();
							$this->ncos_baringupdate = $update;

							//$this->_update2Db($update,array('id','primary_value'));
						}
					}
				}
			}
			if ($val['Feature']['short_name'] == 'LEADINGZERO') {
				$lead = $lead_ncos[$val['Feature']['primary_value']];
			}
		}
		$lang = $lang_ncos[strtoupper($val['Feature']['primary_value'])];
		$barset = $bar_ncos[$val['Feature']['primary_value']];
		$lead = $lead_ncos[$val['Feature']['primary_value']];
		if ($lead == '') {
			$lead = $lead_ncos['0'];
		}

		$ncos =  $lang + $barset + $lead;
		return($ncos);
	}

	/**
	 * function for viewing the log file
	 *
	 * @param int  $station_id
	 */

	function viewlog() {
		$this->pageTitle = 'Station Logs';
		$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));
		$station_id = isset ($this->params['url']['station_id']) ? $this->params['url']['station_id'] : (isset ($this->params['named']['station_id']) ? $this->params['named']['station_id'] : "");
		if ($station_id != '') {
			$this->set('station_id', $station_id);
			$id = '';
			if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {
				$location = $this->Station->find('all', array (
					'conditions' => array (
						"Station.status" => Configure :: read('status'),
						'Station.id' => $station_id
					)
				));
				$id = $this->Session->read('SELECTED_CUSTOMER');
				if ($location[0]['Location']['customer_id'] != $id) {
					$this->layout = 'ajax';
					$this->cakeError('accessDenied');
				}
			}

			$this->paginate['Paginate'] = $this->AutoPaginate->setPaginate();
			$cond = array (
				'Log.status' => '1',
				'Log.station_id' => $station_id
			);
			$user = isset ($this->params['url']['user']) ? $this->params['url']['user'] : (isset ($this->params['named']['user']) ? $this->params['named']['user'] : "");
			if ($user != '') {
				$cond = array_merge($cond, array (
					'Log.user LIKE' => '%' . $user . '%'
				));
			}
			$desc = isset ($this->params['url']['log_entry']) ? $this->params['url']['log_entry'] : (isset ($this->params['named']['log_entry']) ? $this->params['named']['log_entry'] : "");
			if ($desc != '') {
				$cond = array_merge($cond, array (
					'Log.log_entry LIKE' => '%' . $desc . '%'
				));
			}
			$status = isset ($this->params['url']['status']) ? $this->params['url']['status'] : (isset ($this->params['named']['status']) ? $this->params['named']['status'] : "");
			if ($status != '') {
				$cond = array_merge($cond, array (
					'Log.modification_status' => $status
				));
			}

			if ($id) {
				$this->paginate = array (
					'limit' => $this->paginate['limit'],
					'conditions' => $cond
				);
			} else {
				$this->paginate = array (
					'limit' => $this->paginate['limit'],
					'conditions' => $cond
				);
			}
			$station = $this->Station->findById($station_id);

			/**these for getting the current customer name*/
			if (isset ($station['Customer']['name']))
				$this->set('SELECTED_CUSTOMER_NAME', $station['Customer']['name']);
			/**end for getting the current customer name*/

			//pr($loginfo);
			//$this->paginate = $loginfo;
			$loginfo = $this->paginate('Log');
			$this->set('loginfo', $loginfo);
			$this->set('station', '');
			$this->set('customerid', $station['Station']['customer_id']);

			$customerInfo = $this->Customer->findById($station['Station']['customer_id']);
			if (isset ($customerInfo['Customer']['name'])) {
				$this->set('selected_customer', $customerInfo['Customer']['name']);
			} else {
				$this->set('selected_customer', 'UNDEF');

			}

		} else {

			//$this->redirect('/stations');
			$this->pageTitle = 'Logs';
			$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));

			$this->set('station_id', $station_id);
			$id = '';
			if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {
				$location = $this->Station->find('all', array (
					'conditions' => array (
						"Station.status" => Configure :: read('status'),
						'Station.id' => $station_id
					)
				));
				$id = $this->Session->read('SELECTED_CUSTOMER');
				if ($location[0]['Location']['customer_id'] != $id) {
					$this->layout = 'ajax';
					$this->cakeError('accessDenied');
				}
			}

			$this->paginate['Paginate'] = $this->AutoPaginate->setPaginate();

			if ($this->Session->read('APPNAME') != 'Phone') {
				$cond = array (
					'Log.status' => '1'
				);
			} else {
				$cond = array (
					'Log.status' => '1',
					'Log.type' => 'onDemand'
				);
			}
			$user = isset ($this->params['url']['user']) ? $this->params['url']['user'] : (isset ($this->params['named']['user']) ? $this->params['named']['user'] : "");
			if ($user != '') {
				$cond = array_merge($cond, array (
					'Log.user LIKE' => '%' . $user . '%'
				));
			}
			$desc = isset ($this->params['url']['log_entry']) ? $this->params['url']['log_entry'] : (isset ($this->params['named']['log_entry']) ? $this->params['named']['log_entry'] : "");
			if ($desc != '') {
				$cond = array_merge($cond, array (
					'Log.log_entry LIKE' => '%' . $desc . '%'
				));
			}
			$status = isset ($this->params['url']['status']) ? $this->params['url']['status'] : (isset ($this->params['named']['status']) ? $this->params['named']['status'] : "");
			if ($status != '') {
				$cond = array_merge($cond, array (
					'Log.modification_status' => $status
				));
			}

			if ($id) {
				$this->paginate = array (
					'limit' => $this->paginate['limit'],
					'conditions' => $cond
				);
			} else {
				$this->paginate = array (
					'limit' => $this->paginate['limit'],
					'conditions' => $cond
				);
			}
			$station = $this->Station->findById($station_id);

			/**these for getting the current customer name*/
			if (isset ($station['Customer']['name']))
				$this->set('SELECTED_CUSTOMER_NAME', $station['Customer']['name']);
			/**end for getting the current customer name*/

			//pr($loginfo);
			//$this->paginate = $loginfo;
			$loginfo = $this->paginate('Log');
			$this->set('loginfo', $loginfo);
			$this->set('station', '');
			$this->set('customerid', $station['Station']['customer_id']);

			$customerInfo = $this->Customer->findById($station['Station']['customer_id']);
			if (isset ($customerInfo['Customer']['name'])) {
				$this->set('selected_customer', $customerInfo['Customer']['name']);
			} else {
				$this->set('selected_customer', 'UNDEF');

			}
		}

	}
	/**
	 * function for getting the changed values from the log
	 *
	 * @param int $log_id
	 */
	function logdetails($log_id = null) {
		$log = $this->Log->findById($log_id);
		$loginfo = $log['Log'];

		$this->update = $log['Log'];
		$this->layout = 'ajax';

		$this->set('display', $this->update);

	}
	/**
	 * function for storing the changed values in the xml
	 *
	 */

	function _message_resp_xml() {
		$xml_string = '<?xml version="1.0" encoding="ISO-8859-1" ?>';
		$key_num = explode('@', $this->key);
		$xml_string .= '<object action="' . $this->action . '" name="' . strtolower($this->short_name) . '">';

		if (isset ($_POST['stationport']) && $_POST['stationport']) {
			#Logic to determin ALNG and CICM to leave ANLG Keys blank.
			if (preg_match("/\bCICM\b/i", $_POST['stationport'])) {
				$xml_string .= '<message station="' . $_POST['stationport'] . '" key="' . $key_num[0] . '">';
			} else {
				$xml_string .= '<message station="' . $_POST['stationport'] . '" key="">';

			}
		} else {
			#Logic to determin ALNG and CICM to leave ANLG Keys blank.
			if (preg_match("/\bCICM\b/i", $this->stationPort)) {
				$xml_string .= '<message station="' . $this->stationPort . '" key="' . $this->key . '">';
			} else {
				$xml_string .= '<message station="' . $this->stationPort . '" key="">';
			}
		}

		if ($this->short_name == 'LABEL') {

			// echo $this->newvalue['attribute1']	;die();	
		}
		foreach ($this->newvalue as $key => $val) {
			$xml_string .= '<var value="' . $val . '" name="' . $key . '"/>';
		}

		$xml_string .= '</message>';
		$xml_string .= '</object >';

		$path = Configure :: read('upload_url') . 'rough.xml';
		file_put_contents($path, $xml_string, FILE_APPEND);

		$path = Configure :: read('upload_url') . 'update.xml';
		file_put_contents($path, $xml_string); //  die();
		
		if(Configure :: read('activate_mode') != 'STUB')
		{
			#Send an XML message to the CALG
			$res = $this->Authentication->socket();
		}
		else
		{
			$record['id'] = '123456789';
			$record['response'] = 'RAN IN STUB MODE';
			$record['status'] = '1';
		}

		if ($res == 'not_respond') {
			$_SESSION['error'] = 'xml_not_respond';
			$this->redirect('/stations/edit/' . $this->station_id);
			exit ();
		}
	}

	/* start for xml read     */
	function _read($action) {

		$path = Configure :: read('upload_url') . $action . '.xml';

		$xml = @ simplexml_load_file($path);
		if (empty ($xml)) {
			return 'empty';
		}
		$res = $this->_xml2array($xml);

		if ($action == 'res') {
			$record['id'] = $res['children']['transaction']['attr']['id'];
			$record['response'] = $res['children']['transaction']['attr']['response'];
			$record['status'] = $res['children']['transaction']['attr']['status'];
			return $record;
		} else
			return $res['children']['transaction']['attr']['id'];
	}
	function _xml2array($xml) {

		$arXML = array ();
		$arXML['name'] = trim($xml->getName());
		$arXML['value'] = trim((string) $xml);
		$t = array ();
		foreach ($xml->attributes() as $name => $value)
			$t[$name] = trim($value);
		$arXML['attr'] = $t;
		$t = array ();
		foreach ($xml->children() as $name => $xmlchild)
			$t[$name] = $this->_xml2array($xmlchild);
		$arXML['children'] = $t;
		return ($arXML);
	}
	/*end of xml read*/

	function ajax_blf_list() {
		$name = $this->data;
		$this->layout = 'ajax';
		//$blf_list		=	 $this->Blf->find ('all',array('conditions'=>array('Blf.observed'=>$name)));;

		$blf_list = $this->Feature->getStationkeyId($name);

		$this->set('blf_list', $blf_list);

	}

	/**
	 * default action
	 *
	 */
	function index1($number = null) {

		if ($this->Session->read('SELECTED_CUSTOMER') != Configure :: read('access_id')) {

			$id = $this->Session->read('SELECTED_CUSTOMER');
			$cnt = count($this->_Filter);
			//$this->_Filter[$cnt]	=	"Location.customer_id = $id";
		}
		$this->paginate['Paginate'] = $this->AutoPaginate->setPaginate();
		$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));

		$cnt = count($this->_Filter);

		// save the formats in a variable for the view
		$this->_Filter[$cnt] = "Station.customer_id = '$number'";
		$sel_location = 0;

		$sel_customer = $this->Session->read('sel_customer');
		if ($number != $sel_customer) {
			$this->Session->write('sel_customer', $number);

		} else {
			if (isset ($_POST['location']) && $_POST['location']) {

				$sel_location = $_POST['location'];
				$this->Session->write('sel_location', $sel_location);

			}
			elseif (isset ($_POST['location']) && $_POST['location'] == 0) {
				$this->Session->write('sel_location', '');
				$sel_location = '';
			}
			elseif ($this->Session->read('sel_location')) {
				$sel_location = $this->Session->read('sel_location');
			}
		}

		if ($sel_location) { // filter for location

			$count_val = $this->Station->station_count($number, $sel_location);
			$count = $count_val[0][0]['count'];

			$this->paginate = array (
				'joins' => array (
					array (
						'table' => 'stationkeys',
						'alias' => 'Stationkey',
						'type' => 'LEFT',
						'foreignKey' => false,
						'conditions' => array (
							'Station.id = Stationkey.Station_id'
						)
					)
				)
			);

			$cnt = count($this->_Filter);
			if ($sel_location == 'NULL')
				$this->_Filter[$cnt] = "Stationkey.location_id is NULL  group by Stationkey.station_id";
			else
				$this->_Filter[$cnt] = "Stationkey.location_id = '$sel_location'  group by Stationkey.station_id";

			$station_details = $this->paginate('Station', $this->_Filter);
			$this->params['paging']['Station']['count'] = $count;

		} else {

			$station_details = $this->paginate('Station', $this->_Filter);
		}

		$station_list = $this->Station->find('all', array (
			'conditions' => array (
				'Station.customer_id' => $number
			)
		));

		//for showing the location
		$station_list = $this->Station->find('all', array (
			'conditions' => array (
				'Station.customer_id' => $number
			)
		));
		$location = array ();
		foreach ($station_list as $details) {
			$location_details = $this->Stationkey->find('all', array (
				'conditions' => array (
					'Stationkey.station_id' => $details['Station']['id']
				)
			));

			foreach ($location_details as $loc) {
				if ($loc['Location']['id'])
					$location[$loc['Location']['id']] = $loc['Location']['plz'] . " , " . $loc['Location']['name'] . " ,  " . $loc['Location']['address'];
			}
		}

		$this->set('location', $location);
		$this->set('sel_location', $sel_location);

		$this->set('stations', $station_details);
		//$this->set('stations', $this->paginate('Station', $station_details)); 
		$this->set('cust_id', $number);
	}

	/**
	 * function for uploading file
	 *
	 */
	function upload() {
		#echo "<pre>";
		#print_r($_FILES["file"]);
		#die();

		/**************activity log*****************/

		#$log_string	= date('Y-m-d H:i:s') .' Activity :'.$_POST['customerID'].' || '.$this->Session->read('USERNAME').' | MoH File Upload ||'	;
		$log_string = $_POST['customerID'] . ' || ' . $this->Session->read('USERNAME') . ' | MoH File Upload ||';

		$this->log($log_string, 'activity');
		$log = 'MoH File Update : ';
		
		$insert = array (
			'Log' => array (
				'affected_obj' => '',
				'log_entry' => $log,
				'created' => date('Y-m-d H:i:s'),
				'status' => 1,
				'customer_id' => $_POST['customerID'] ,
				'bsk' => $this->Session->read('BSK'),
				'user' => $this->Session->read('ACCOUNTNAME'),
				'app_type' => $this->Session->read('APPNAME'),
				'modified' => '0000-00-00 00:00:00',
				'modification_status' => '1',
				'modification_response' => 'na'
			)
		);

		$this->Log->create();
		$this->Log->save($insert, false);

		/**************activity log*****************/

		$this->set('status', 0);
		if ($_FILES["file"]["error"] > 0) {
			//CBM $this->set('msg' ,'Error in upload');
			$this->set('msg', __('Error in upload', true));
		} else {
			#if($_FILES["file"]["type"]=='audio/x-wav'){// ALLOW ONLY WAV FILE
			if (($_FILES["file"]["type"] == 'audio/x-wav') || ($_FILES["file"]["type"] == 'audio/wav') || ($_FILES["file"]["type"] == 'audio/mpeg')) { // ALLOW ONLY WAV OR MP3 FILE
				#Check file does not exceed the maximum
				if ($_FILES["file"]["size"] < 10240000) {
					//Get Music on hold ID from DB	
					$mohId = $this->Customer->field('moh_id', array (
						'id =' => $_POST['customerID']
					));

					// call webserver
					//$result	=	$this->TransferMoh->uploadMoH($_FILES["file"]["tmp_name"],$this->Session->read('SELECTED_CUSTOMER'));

					move_uploaded_file($_FILES["file"]["tmp_name"], Configure :: read('upload_url') . str_replace(' ', '-', strtolower($_FILES["file"]["name"])));
					// call webserver
					//$result	=	$this->TransferMoh->uploadMoH(Configure::read('upload_url').$_FILES["file"]["name"],$this->Session->read('SELECTED_CUSTOMER'));
					$result = $this->TransferMoh->uploadMoH(Configure :: read('upload_url') . str_replace(' ', '-', strtolower($_FILES["file"]["name"])), $mohId);
					$this->set('status', 1);

					if ($result == 1) {
						$this->set('msg', __('File Transferred Successfully', true));
					} else {
						$this->set('msg', __($result, true));
					}
				} else {
					$this->set('msg', __('Maximum file size => 10M', true));
				}

			} else {
				#$this->set('msg' ,'only Wav file is allowed, you attempted to upload of file type : ' . $_FILES["file"]["type"]);
				#$this->set('msg' ,'FILE : ' . $_FILES["file"]["name"] . ','  . "__('only Wav file is allowed, you attempted to upload of file type') :" . ' . $_FILES["file"]["type"]);

				$this->set('msg', __('only .wav and .mp3 files are allowed', true));
			}

			#delete file after upload

			unlink(Configure :: read('upload_url') . str_replace(' ', '-', strtolower($_FILES["file"]["name"])));
		}

		$this->layout = 'ajax';
		$this->set('title_header', __('Swisscom Extranet Corporate Business - Voiphone Selfcare', true));
	}

	/**
	 * single user access for edit process
	 *
	 * @param int $station_id
	 */
	function _singleUserAccess($station_id) {

		return; # default behaviour is not to check single user access.

		$time_delete = time() - 600;
		$this->Userlog->deleteAll('Userlog.time <=' . $time_delete);

		$time = time() - 600;
		$condition = array (
			'conditions' => array (
				'Userlog.station_id' => $station_id,
				'Userlog.time >' => $time,
				'Userlog.user_id !=' => $this->Session->read('ACCOUNTID')
			)
		);

		$useStation = $this->Userlog->find('all', $condition);

		if (!empty ($useStation)) {
			if (isset ($this->confirm_change) && $this->confirm_change) {
				$this->userAccess = $useStation;
				return true;

			} else {
				#$this->Session->setFlash('Page in use by user : '.$useStation[0]['Userlog']['user_name'],'default', array('class' =>  'flash_class')); #CBM MOD 0212
				$this->Session->setFlash(__('Page in use by user : ', true) . $useStation[0]['Userlog']['user_name'], 'default', array (
					'class' => 'flash_class'
				));
				$this->redirect('/stations/index'); #CBM MOD
			}
		}
		$conditn = array (
			'Userlog.user_id' => $this->Session->read('ACCOUNTID')
		);
		$this->Userlog->deleteAll($conditn);
		$option['time'] = time();
		$option['station_id'] = $station_id;
		$option['user_id'] = $this->Session->read('ACCOUNTID');
		$option['user_name'] = $this->Session->read('USERNAME') . ' ' . $this->Session->read('USERFIRSTNAME');
		$this->Userlog->save($option);

	}
	/**
	 * function for checking the blf can have more than 8 blf values
	 *
	 * @param unknown_type $primary_key
	 */
	function _validateBlfCount($primary_key = '', $key = '') {
		if ($primary_key) {

			if (in_array($primary_key, $this->blfPrimKey)) {
				$this->blfDetail[$primary_key]['count'] = $this->blfDetail[$primary_key]['count'] + 1;

				$this->blfDetail[$primary_key]['key'] = $this->blfDetail[$primary_key]['key'] . ' , key' . $key[0];

				if ($this->blfDetail[$primary_key]['tot_count'] + $this->blfDetail[$primary_key]['count'] > 8) {
					if (isset ($this->blfDetail[$primary_key]['validateKeyCount'])) {
						$this->validateErrors[$this->blfDetail[$primary_key]['validateKeyCount']] = '<span style="color:green;font-size:1.1em"> Key' . $this->blfDetail[$primary_key]['key'] . ' </span> <span style="color:red;font-size:1.1em">' . $primary_key . ' produce more 8 BLF Values </span>';
					} else {
						$this->validateErrors[] = '<span style="color:green;font-size:1.1em"> Key' . $this->blfDetail[$primary_key]['key'] . ' </span> <span style="color:red;font-size:1.1em">' . $primary_key . ' produce more 8 BLF Values </span>';
						$this->blfDetail[$primary_key]['validateKeyCount'] = count($this->validateErrors) - 1;
					}
				}

			} else {
				$count_blf = $this->Feature->getStationkeyIdCount($primary_key);

				if ($count_blf[0][0]['count'] >= 8) {

					#$this->validateErrors[]	=	'<span style="color:green;font-size:1.1em"> Key'.$key[0].' </span> <span style="color:red;font-size:1.1em">'.$primary_key.' have 8 BLF Values </span>';
					$this->validateErrors[] = '<span style="color:green;font-size:1.1em"> Key' . $key[0] . ' </span> <span style="color:red;font-size:1.1em">' . $primary_key . ' ' . __("Limit of observers exceeded", true) . ' </span>';
				} else {

					$this->blfPrimKey[] = $primary_key;
					$this->blfDetail[$primary_key]['key'] = $key[0];
					$this->blfDetail[$primary_key]['count'] = 1;
					$this->blfDetail[$primary_key]['tot_count'] = $count_blf[0][0]['count'];
				}

			}

		}
	}
	function upload_xml($station_id = null) {

		$stationinfo = $this->Stationkey->find('all', array (
			'conditions' => array (
				"Stationkey.status" => Configure :: read('status'),
				'Stationkey.station_id' => $station_id
			)
		));

		$this->customerID = $stationinfo[0]['Station']['customer_id'];

		$this->station_id = $station_id;

		$this->action = 'query';
		$this->short_name = 'cacheRefresh';

		$this->newvalue['cnn_id'] = $this->customerID;
		$this->newvalue['station_id'] = $station_id;
		$this->stationPort = $stationinfo[0]['Station']['port'];
		$this->key = 3;

		$this->_message_resp_xml();

		$response = $this->_read('res');

		if ($response != 'empty' && $response['id'] && $response['status'] == 1) {

			if ($response['response'] != 'action_complete') {
				$this->success = 0;
				$_SESSION['error'] = 'Error from modification : ' . $response['response'];
				$this->redirect('/stations/edit/' . $this->station_id);
			} else {

				$_SESSION['success'] = 'Operation Successful';
				$this->redirect('/stations/edit/' . $this->station_id);
			}

		} else {
			$this->success = 0;
			$_SESSION['error'] = 'Error from modification ' . ($response['response']) ? $response['response'] : '';
			$this->redirect('/stations/edit/' . $this->station_id);

		}

	}

	//function for export station data in csv format.
	function export() {

		$this->layout = "";
		$conds = unserialize($this->Session->read('cond'));
		$filename = "export_station_" . date("Y.m.d") . ".csv";
		$csv_file = fopen('php://output', 'w');
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="' . $filename . '"');

		$results = $this->Station->find('all', array (
			'joins' => array (
				array (
					'table' => 'stationkeys',
					'alias' => 'Stationkey',
					'type' => 'INNER',
					'foreignKey' => false,
					'conditions' => array (
						'Station.id = Stationkey.Station_id'
					)
				),
				array (
					'table' => 'features',
					'alias' => 'Feature',
					'type' => 'INNER',
					'foreignKey' => false,
					'conditions' => array (
						'Feature.stationkey_id = Stationkey.id'
					)
				)
			),
			'conditions' => $conds,
			'fields' => array (
				'Station.id',
				'Stationkey.location_id',
				'Feature.primary_value',
				'Station.extensions',
				'Station.type',
				'Station.port'
			),
			'recursive' => -1,
			'order' => 'Station.created DESC'
		));

		$header_row = array (
			__("S.No.", true),
			__("Number", true),
			__("Location", true),
			__("DISPLAYNAME", true),
			__("Exp", true),
			__("Type", true),
			__("Port", true)
		);
		fputcsv($csv_file, $header_row, ';', '"');

		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		$i = 1;
		foreach ($results as $result) {
			
			#echo "<pre>";print_r($result);
			$locationName=$this->Location->getgroupLocation($result['Stationkey']['location_id']);
			
			
			// Array indexes correspond to the field names in your db table(s)
			$row = array (
				$result['Customer']['Sno'] = $i,
				$result['Station']['id'],
				$locationName['Location']['name'],
				$result['Feature']['primary_value'],
				$result['Station']['extensions'],
				$result['Station']['type'],
				$result['Station']['port']
			);
			$i++;
			fputcsv($csv_file, $row, ';', '"');
		}

		fclose($csv_file);
		exit ();
	}
	
	// new function
	function  minor_delete($feature_id = null){
		
		
		
		$this->autoRender = false;
		$feature_id=isset($this->params['url']['feature_id'])?$this->params['url']['feature_id']:(isset($this->params['named']['feature_id'])?$this->params['named']['feature_id']:"");
		#sourcepage
		$spg=isset($this->params['url']['spg'])?$this->params['url']['spg']:(isset($this->params['named']['spg'])?$this->params['named']['spg']:"");
		
		
		$this->log('STATION CONTROLLER ' . 'minorDelete feature: ' . $feature_id, LOG_DEBUG);
		
		#Place the delete instruction on the key
		preg_match("/^([0-9]+)\@([0-9]+)\-(.*)/", $feature_id, $featmatches);
			
		if(isset($feature_id) && isset($featmatches[1]))
		{
			$delKey = $featmatches[1] . '@' . $featmatches[2];
			$station_id = $featmatches[2];
		}
		$keynumber = $featmatches[1];
		$short_name = $featmatches[3];

		
		$stationInfo = $this->Station->find('first', array (
				'conditions' => array (
						'Station.id' => $station_id,
		
				),
		
		));
		
		#Used for Group ID
		$featureInfo = $this->Feature->find('first', array (
		'fields'=>'Feature.primary_value',
		'conditions' => array (
		'Feature.id' => $feature_id
		)
		));
		
		//First Create an as-is version.
		if(($station_id != '') && ($stationInfo['Station']['status'] != 5))
		{
			$this->log('STATION CONTROLLER ' . 'minor Delete creatign ASIS for: ' . $station_id, LOG_DEBUG);
			$createAsis = $this->Station->createAsisStation($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisStationKeys($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->deleteAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
		}
		else
		{
			$this->log('STATION CONTROLLER ' . 'minorDelete staiton already status 5 ' . $station_id, LOG_DEBUG);
		}
		
				
		
		$keysave['Stationkey']['id'] = $delKey;	
		$keysave['Stationkey']['status'] = 7;
		$this->log('STATION CONTROLLER ' . 'Deleteing Key ' .   $delKey, LOG_DEBUG);
		$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','status'));
		
		
		#delete feature from key.
		
		$msg=$this->Feature->delete($feature_id);
		
		
		#if CPU (or others with keylist members) then delete the keylist members as well.
		if ($short_name == 'MSB')
		{
			$this->Station->updateAll(array('Station.status' =>5), array('Station.id' => $station_id));
				
			#Delete Members ???
			$MEMBER = '%@' . $station_id . '-' . $short_name . 'MEMBER';
			$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
					#Change the status fon th mathcing keys
			$this->Feature->updateAll(array('Stationkey.status' =>7), array('Feature.id like' => $Member));
		}
		if ($short_name == 'CPU')
		{
		
			$groupId = $featureInfo['Feature']['primary_value'];
		
			$this->Station->updateAll(array('Station.status' =>5), array('Station.id' => $station_id));
			$this->Group->updateAll(array('Group.status' =>4), array('Group.id' => $groupId));
			
		
			#Delete Members ???
			$MEMBER = '%@' . $station_id . '-' . $short_name . 'MEMBER';
			$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
			#Change the status fon th mathcing keys
			$this->Feature->updateAll(array('Stationkey.status' =>7), array('Feature.id like' => $Member));
			/*
			if($featurecount==1) {
				
				$this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member and group deleted.</div></div></div>');
				$redirect2 = '/groups/index/customer_id:'.$customer_id;
				$this->redirect($redirect2);
								
			}else {
				
				$this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member Deleted.</div></div></div>');
				$redirect2 = '/groups/edit/group_id:' . $groupId;
				$this->redirect($redirect2);
			}
			*/
			
			#spg is source page
			if($spg == 'edit_cpu')
			{
				$redirect = '/groups/edit/group_id:' . $groupId;
			}
			else
			{
				$redirect = '/stations/editstation/' . $station_id;
				
			}
		
		}
		if (($short_name == 'DN_MADN') || ($short_name == 'DN_MADN_PILOT'))
		{
		
			$lookup_feature = $delKey . '-DN';
			#Used for Group ID
			$MADNfeatureInfo = $this->Feature->find('first', array (
			'fields'=>'Feature.primary_value',
			'conditions' => array (
			'Feature.id' => $lookup_feature
			)
			));
			
			
			$groupId = $MADNfeatureInfo['Feature']['primary_value'];
		
			$this->Station->updateAll(array('Station.status' =>5), array('Station.id' => $station_id));
			$this->Group->updateAll(array('Group.status' =>4), array('Group.id' => $groupId));
			
			$this->Feature->deleteAll(array('Feature.id like' => $delKey . '%'), false);
					#Change the status fon th mathcing keys
			
			/*
			if($featurecount==1) {
		
			$this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member and group deleted.</div></div></div>');
			$redirect2 = '/groups/index/customer_id:'.$customer_id;
			$this->redirect($redirect2);
		
			}else {
		
			$this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member Deleted.</div></div></div>');
			$redirect2 = '/groups/edit/group_id:' . $groupId;
			$this->redirect($redirect2);
			}
			*/
				
			#spg is source page
			if($spg == 'edit_madn')
			{
				$redirect = '/groups/edit/group_id:' . $groupId;
			}
			else
			{
				$redirect = '/stations/editstation/' . $station_id;
		
			}
		
		}
		
		$this->log('STATION CONTROLLER : MINOR DELETE : CALLING APPLY', LOG_DEBUG);
		
		
		$activationResponse = $this->apply($station_id, $tsId);
		
		
		
		
		#should not return here.
		
		#Set for the page reload.
		#$_SESSION['success'] = $deleteString ;
		
		
		
		if(!($redirect))
		{
			$redirect = '/stations/editstation/' . $station_id;
		}
		$this->log('STATION CONTROLLER : MINOR DELETE : REDIRECTING TO: ' . $redirect, LOG_DEBUG);
		
		$this->redirect($redirect);
		
		
	}



	
	function  major_cfeature_change($station_id = null){
		
		$this->autoRender = false;
				
		$delete_feature=isset($this->params['url']['delete_feature'])?$this->params['url']['delete_feature']:(isset($this->params['named']['delete_feature'])?$this->params['named']['delete_feature']:"");
		
		$customer_id=isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:"");
		
				
		preg_match("/^([0-9]+)\@([0-9]+)\-(.*)/", $delete_feature, $featmatches);
			
		if(isset($delete_feature) && isset($featmatches[1]))
		{
			
			#Place the delete instruction on the key
			$delKey = $featmatches[1] . '@' . $featmatches[2];
			$keynumber = $featmatches[1];
			
			$keysave['Stationkey']['id'] = $delKey;
			$keysave['Stationkey']['status'] = 7;
		 	$this->log('STATION CONTROLLER ' . 'Applying Delete flag to key ' .   $delKey, LOG_DEBUG);
			$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','status'));
			
			
			if (substr($featmatches[3], 0, 3) == 'DN_')
			{
				 $delete_feature = $featmatches[1] . '@' . $featmatches[2] . '-DN';
				 $delete_feature1 = $featmatches[1] . '@' . $featmatches[2];				 
			}
				
			#Used for Group ID
			$featureInfo = $this->Feature->find('first', array (
					'fields'=>'Feature.primary_value',
					'conditions' => array (
							'Feature.id' => $delete_feature
					)
			));
			
			$featureInfoMADN = $this->Feature->find('first', array (
					'fields'=>'Feature.primary_value',
					'conditions' => array (
							'Feature.stationkey_id' => $delete_feature1,
							'Feature.short_name' => 'MADN'
					)
			));
						
			
			$groupId = $featureInfo['Feature']['primary_value'];
			$groupIdMADN = $featureInfoMADN['Feature']['primary_value'];
			
			$featurecount = $this->Feature->find('count', array (					
					'conditions' => array (
							'Feature.primary_value' => $groupId
					)
			));
			
			$featurecountMADN = $this->Feature->find('count', array (					
					'conditions' => array (
							'Feature.primary_value' => $groupIdMADN,
							'Feature.short_name' => 'MADN',
					)
			));
				
			$redirect = '/stations/editstation/' . $station_id;			

			if (substr($featmatches[3], 0, 3) == 'DN_')
			{				
				#If deleting a group member, may have come from a group page, in that case redirect to station editstation
				
				if($customer_id!=""){
																
				if (($featmatches[3] == 'DN_MADN') || ($featmatches[3] == 'DN_MADN_PILOT') || ($featmatches[3] == 'DN_MLH'))
				{
				
				$this->Station->updateAll(array('Station.status' =>5), array('Station.id' => $station_id));
				$this->Group->updateAll(array('Group.status' =>4), array('Group.id' => $groupId));		
				
				#Delete Members ???
			    $Member = $featmatches[1] . '@' . $featmatches[2];
				$this->Feature->deleteAll(array('Feature.stationkey_id like' => $Member,'Feature.short_name' => 'MADN'), false);
				#$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
				if($featurecountMADN==1) {				   										
					 $this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member and group deleted.</div></div></div>');
					$redirect2 = '/groups/index/customer_id:'.$customer_id;	
					$this->redirect($redirect2);				
					
				  }else {	
				  				
					$this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member Deleted.</div></div></div>');					
					$redirect2 = '/groups/edit/group_id:' . $groupIdMADN;
					$this->redirect($redirect2);					 
				 }		
									
				}
				else {
					#For DN_INDIVIDUAL
					$deleteString = 'dnDeleted:';
				}
			}
			else{
				
				if (($featmatches[3] == 'DN_MADN') || ($featmatches[3] == 'DN_MADN_PILOT') || ($featmatches[3] == 'DN_MLH') || ($featmatches[3] == 'CPU'))
				{									
					$redirect = '/stations/editstation/' . $featmatches[2];				
				}
				else {
					#For DN_INDIVIDUAL
					$deleteString = 'dnDeleted:';
				}
				
			}					
				#$delete_feature = $featmatches[1] . '@' . $featmatches[2] . '-DN';				
				#Delete Members ???
			    # $Member = $featmatches[1] . '@' . $featmatches[2];				
				#$this->Feature->deleteAll(array('Feature.stationkey_id like' => $Member), false);				
			}	
			
			$this->log('STATION CONTROLLER ' . 'Deleting Feature for station' . $station_id . ' feat id ' . $delete_feature, LOG_DEBUG);
			#$this->feature->delete($delete_feature);			
			
			if ($featmatches[3] == 'CPU')
			{				
				$groupId = $featureInfo['Feature']['primary_value'];			
				
				$this->Station->updateAll(array('Station.status' =>5), array('Station.id' => $station_id));
				$this->Group->updateAll(array('Group.status' =>4), array('Group.id' => $groupId));	
				
				#Delete Members ???
			    $MEMBER = '%' . $featmatches[2] . '-' . $featmatches[3] . 'MEMBER';
				$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
				
				if($featurecount==1) {					
					
					 $this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member and group deleted.</div></div></div>');
					$redirect2 = '/groups/index/customer_id:'.$customer_id;	
					$this->redirect($redirect2);
					
				}else {
					
					 $this->Session->setFlash('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">Member Deleted.</div></div></div>');
					$redirect2 = '/groups/edit/group_id:' . $groupId;	
					$this->redirect($redirect2);
				}		
				
			}
						
			$msg=$this->Feature->delete($delete_feature);			
			#Set for the page reload.
			$_SESSION['success'] = $deleteString ;
			
		}
		else 
		{
			$this->log('STATION CONTROLLER ' . 'Not Deleting' . $station_id . ' feat id ' . $delete_feature, LOG_DEBUG);
		}
		#die();
				
		#$stationInfo = $this->Station->findById($station_id);
		 $stationInfo = $this->Station->find('first', array (
                                'conditions' => array (
                                        'Station.id' => $station_id,

                                ),
								
                        ));

		 $statArray = print_r($stationInfo, true);
		#$output_array=print_r($output, true);
		#$this->log('editstation page ' . 'station Info ' . $statArray, LOG_DEBUG);
		
		#Determine stationtype
		$layoutFile = $stationInfo['Station']['type'] . 'config.xml';
		
		//First Create an as-is version.
		if(($station_id != '') && ($stationInfo['Station']['status'] != 5))
		{
			$createAsis = $this->Station->createAsisStation($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisStationKeys($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->deleteAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
		}
		
		
		 if($this->RequestHandler->isAjax()==true){ 
			//echo "<pre>"; print_r($this->params); die;
			$featureNameArray = $this->params['form']['featurename'];
			$featureValuesArray = $this->params['form']['featurevalue'];
			$newPositionArray = $this->params['form']['featureNewPosition'];
			$newAddedFeature = explode(",",trim($this->params['form']['newaddedFeatues'],","));  
			//echo "<pre>"; print_r($featureValuesArray); die;
			$featureFinalArray = array();
			
			foreach($newPositionArray as $key=>$val){
				
				if(isset($featureNameArray[$key]) && !empty($featureNameArray[$key])){
					$featureFinalArray[$val]['featureName'] = $featureNameArray[$key];
					$featureFinalArray[$val]['featureValue'] =  $featureValuesArray[$key];
					
					if(in_array($featureValuesArray[$key], $newAddedFeature)){
						$featureFinalArray[$val]['originalposition'] = "";
						$featureFinalArray[$val]['status'] = "99";
					}else{
						$featureFinalArray[$val]['originalposition'] = $key;
						$featureFinalArray[$val]['status'] = "1";
					} 
					if($featureFinalArray[$val]['originalposition'] != $newPositionArray[$key])
					{
						$featureFinalArray[$val]['status'] = 66;
					}
					
					#Update records where there has been changed (99)
					if($featureFinalArray[$val]['status'] == 99)
					{
						$featureStationKeyId = $newPositionArray[$key] . '@' . $station_id;
						$featureFeatureId = $key . '@' .$station_id . '-' . $featureFinalArray[$val]['featureName'];
						$insert = array (
							'Feature' => array (
									'id' => $featureFeatureId,
									'stationkey_id' => $featureStationKeyId,
									'short_name' => $featureFinalArray[$val]['featureName'],
									'primary_value' => $featureFinalArray[$val]['featureValue'],
									'created' => date('Y-m-d H:i:s'),
									'modified' => 'NOW()',
									'status' => $featureFinalArray[$val]['status']
							)
						);
						$msg=$this->_save2Db($insert);
						
					}
					#If feature has moved (66) then add record with 66 and delete the original DN.
					if($featureFinalArray[$val]['status'] == 66)
					{
							
						$featureStationKeyId = $newPositionArray[$key] . '@' . $station_id;
						$featureFeatureId = $key . '@' .$station_id . '-' . $featureFinalArray[$val]['featureName'];
					    $delete_orig_dn = $key . '@' .$station_id;
						//echo $delete_orig_dn;
						 $this->Feature->deleteAll(array('Feature.stationkey_id' => $delete_orig_dn), false);
						
						#Then inser new one.
						$insert = array (
								'Feature' => array (
										'id' => $featureFeatureId,
										'stationkey_id' => $featureStationKeyId,
										'short_name' => $featureFinalArray[$val]['featureName'],
										'primary_value' => $featureFinalArray[$val]['featureValue'],
										'created' => date('Y-m-d H:i:s'),
										'modified' => 'NOW()',
										'status' => $featureFinalArray[$val]['status']
								)
						);
						
						# print_r($insert);
						
						$this->_save2Db($insert);
					}
					
				}

			} 	
		} 
		
		$retval = $this->calculateLayout($station_id, $layoutFile);
		
		$this->log('STATION CONTROLLER : RESPONSE FROM caclLayout : ' . $retval, LOG_DEBUG);
		
		
		#echo $redirect; exit;
	    if(isset($redirect))
	    {
	    	$this->redirect($redirect);
	    	if($_SESSION['success'])
	    	{
	    		
	    	}
	    	else 
	    	{	
	    	 	#Set for the page reload.
	    		$_SESSION['success'] = 'Station Updated';
	    	}
	    }
	    else 
	    {
	    	exit();
	    }
		
	}
	
	function  deleteStation($station_id = null){
		
		if($station_id != '')
		{
			
			$stations = $this->Station->find('all',array('conditions'=>array('Station.id'=>$station_id)));
			$customer_id = $stations[0]['Station']['customer_id'];
			$this->log('STATION CONTROLLER ' . 'Deleting ' . $station_id . $cusotmer_id, LOG_DEBUG);
			
			$this->Station->delete($station_id)	;
			
			$stationinfo = $this->Stationkey->find('list', array (
					'conditions' => array (
							'Stationkey.station_id' => $station_id
					),
					'fields' => array ('id')
			));
			foreach ($stationinfo as $key=>$val)
			{
				$statkey_id = $stationinfo[$key];
				$this->log('STATION CONTROLLER ' . 'Deleting ' . $statkey_id, LOG_DEBUG);
				$this->Stationkey->delete($statkey_id);
				
				#Now delete features
				
				$featureinfo = $this->Feature->find('list', array (
						'conditions' => array (
								'Feature.stationkey_id' => $statkey_id
						),
						'fields' => array ('id')
				));
				foreach ($featureinfo as $fkey=>$fval)
				{
					$featkey_id = $featureinfo[$fkey];
					$this->log('STATION CONTROLLER ' . 'Deleting ' . $featkey_id, LOG_DEBUG);
					$this->Feature->delete($featkey_id);
				
				}
				
				#Finally delete active_dn
				
			}
			
			$dnUpdate = $this->Dns->deleteActiveDn($station_id);
			#$this->Stationkey->deleteAll(array('station_id'=>$station_id));
			#$this->Feature->deleteall($station_id)	;
		}	
		$this->redirect('/dns/viewdns/customer_id:' . $customer_id);
	}
	function create($station_id = null){
		
		$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
		$port_id=isset($this->params['url']['port_id'])?$this->params['url']['port_id']:(isset($this->params['named']['port_id'])?$this->params['named']['port_id']:"");
		$customer_id=isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:"");
		
		
		#$output_array=print_r($output, true);
		$this->log('STATION CONTROLLER ' . 'Create Function ' . $station_id, LOG_DEBUG);
	
		# Create a Base DN Feature.
		$featuresave['Feature']['status'] = '5';
		$featuresave['Feature']['id'] = "01@".$station_id."-DN";
		$featuresave['Feature']['stationkey_id'] = "01@".$station_id ;
		#$featuresave['Feature']['stationkey_id'] = "";
		$featuresave['Feature']['short_name'] = 'DN' ;
		$featuresave['Feature']['primary_value'] = $station_id ;
		$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
	
		$keysave['Stationkey']['dn'] = $station_id;
		$keysave['Stationkey']['id'] = '01@'.$station_id;
		$keysave['Stationkey']['station_id'] = $station_id;
		 $this->log('STATION CONTROLLER ' . 'Create Function creating key ' .   $keyNum, LOG_DEBUG);
		$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn','station_id'));
		# Then Create 54 Base key Feature. ?? Need to change logic
		for ($i = 2; $i <= 14; $i++) {
			$keyNum = str_pad((int) $i,2,"0",STR_PAD_LEFT);	
			#$keyNum = $i;	
			$keysave['Stationkey']['dn'] = '';
			$keysave['Stationkey']['id'] = $keyNum.'@'.$station_id;
			$keysave['Stationkey']['station_id'] = $station_id;
			 #$this->log('STATION CONTROLLER ' . 'Create Function creating key ' .   $keyNum, LOG_DEBUG);
			$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn','station_id'));
		}
			
		# Then update the DN record with function
		$dnsave['Dns']['function'] = 'INDIVIDUAL';
		$dnsave['Dns']['id'] = $station_id;
		#$dnUpdate = $this->Dns->save($dnsave, false,  array('function'));
		
		$dnUpdate = $this->Dns->createActiveDn($station_id, 'INDIVIDUAL');
	
				#Then Create a station.
			
				if($keyUpdate['Stationkey']){
					$stationsave['Station']['status'] = '6';
					$stationsave['Station']['id'] = $station_id;
					$stationsave['Station']['4voip_id'] = '';
					$stationsave['Station']['customer_id'] = $customer_id;
					$stationsave['Station']['p	ort'] = '';
					$stationsave['Station']['phone_type'] = '';
					$stationsave['Station']['type'] = '';
					$stationsave['Station']['password'] = '';
					$stationsave['Station']['CWT'] = '';
					$stationsave['Station']['CFRA'] = '';
					$stationsave['Station']['SIMRING'] = '';
					$stationsave['Station']['COM'] = '';
					$stationsave['Station']['MOH'] = '';
					$stationsave['Station']['CTI'] = '';
					$stationsave['Station']['extensions'] = '';
					$stationsave['Station']['slug'] = '';
					$stationsave['Station']['desc'] = '';
					$stationsave['Station']['created'] = '';
					$stationsave['Station']['modified'] = '';
					
		
					$stationUpdate = $this->Station->save($stationsave, false);
		
				}
			
				$this->log('STATION CONTROLLER ' . 'Add Station Function feature, key, station saved',LOG_DEBUG);
				$this->redirect('/stations/editstation/' . $station_id);
			//$this->redirect('/stations/editstation/' . $station_id);
			//$this->redirect(Configure::read('base_url').'stations/design/' . $station_id);
			#echo $station_id;
			#exit();
		
	}
	
	function  updateBase($station_id = null){
	
		#used to add certain madatories in the create station process (like phone_type)
		#if ($this->request->data['Station']['station_id'])
			$station_id = $this->data['Station']['station_id'];
		#else{
		#	$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
		#}
		#if ($this->request->data['Station']['phone_type'])
			$phone_type = $this->data['Station']['phone_type'];
		#else{
		#	$phone_type=isset($this->params['url']['phone_type'])?$this->params['url']['phone_type']:(isset($this->params['named']['phone_type'])?$this->params['named']['phone_type']:"");
		#}
		#if ($this->request->data['Station']['port'])
			$port = $this->data['Station']['port'];
			$password = $this->data['Station']['PhonePassword'];
		#else{
		#	$port=isset($this->params['url']['port'])?$this->params['url']['port']:(isset($this->params['named']['port'])?$this->params['named']['port']:"");
		#}
		
		if($phone_type == 'FAX')
		{
			$stationsave['Station']['type'] = 'ANLG';
			$stationsave['Station']['extensions'] = '1';
			if(isset($port) && $port != '')
			{
				$stationsave['Station']['port'] = $port;
				$stationsave['Station']['status'] = '5';
			}
		}
		else
		{
			$stationsave['Station']['type'] = 'CICM';
			$stationsave['Station']['port'] = 'Calculated CICM';

			if(isset($password) && $password != '')
			{
				$stationsave['Station']['status'] = '5';
				$stationsave['Station']['password'] = $password;
			}

		}
		
		
		#$output_array=print_r($output, true);
		$this->log('STATION CONTROLLER ' . 'Create Function ' . $station_id, LOG_DEBUG);
	
		# Create a Base DN Feature.
		$featuresave['Feature']['status'] = '99';
		$featuresave['Feature']['id'] = "01@".$station_id."-DN";
		$featuresave['Feature']['stationkey_id'] = "01@".$station_id ;
		#$featuresave['Feature']['stationkey_id'] = "";
		$featuresave['Feature']['short_name'] = 'DN' ;
		$featuresave['Feature']['primary_value'] = $station_id ;
			$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
	
		# Then Create a Base key Feature.
			
		$keysave['Stationkey']['dn'] = $group_identifier;
		$keysave['Stationkey']['id'] = "01@".$station_id;
		
		$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn'));
			
		#Then Create a station.
			
		if($keyUpdate['Stationkey']){
		
			$stationsave['Station']['id'] = $station_id;
			$stationsave['Station']['phone_type'] = $phone_type;
			$stationUpdate = $this->Station->save($stationsave, false);
	
		}
		
		if(($stationUpdate['Station']) && ($stationsave['Station']['status'] == '5'))
		{
			$this->log('STATION CONTROLLER : Update Fucntion' . 'CAlling Feature calculation',LOG_DEBUG);
			// USe a New Station Profile
			$layoutFile = 'create' . $stationsave['Station']['type'] . 'config.xml';
			$retval = $this->calculateLayout($station_id, $layoutFile);
		}
			
		$this->log('STATION CONTROLLER ' . 'Update Base Station Function feature, key, station saved',LOG_DEBUG);
		$this->redirect('/stations/editstation/' . $station_id);
	
	}
	
	function updateStationFeatures($station_id = null){
		
		$stationInfo = $this->Station->find('first', array (
                       'conditions' => array (
                        'Station.id' => $station_id,

        ),
								
        ));//First Create an as-is version.
		if(($station_id != '') && ($stationInfo['Station']['status'] != 5))
		{
			$createAsis = $this->Station->createAsisStation($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisStationKeys($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->deleteAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
		}
		
		#There are 3 types of update possible :
		#Type 1 : DB Only, This does not cause a refresh of the station editstation page.
		#Type 2 : Causes page refresh (i.e extensions will mean more keys)
		#Type 3 : Requires layout to be calculated.
	
		#Get the form variables.
		#$station_id = $this->data['Station']['station_id'];
		$type = $this->data['Station']['phone_type'];
		#$CTI = $this->data['Station']['CTI'];
		#$CWT = $this->data['Station']['CWT'];
		$extensions = $this->data['Station']['extensions'];
		$password = $this->data['Station']['PhonePassword'];
		$rag = $this->data['Station']['rag'];
		$prk = $this->data['Station']['prk'];
		$MSBEnable = $this->data['Station']['MSBEnable'];
		#$SIMRING = $this->data['Station']['SIMRING'];
		
		# determine if values have changed.
		
		#??TBD - either modified values are identified in POST or alternatively compared with existing DB
		
		#First Check the station model
		
		$stationDetails = $this->Station->find('all', array (
				'conditions' => array (
						'Station.id' => $station_id
				)
		));

		$stationsave['Station']['id'] = $station_id;
		$stationsave['Station']['status'] = '5';
		##
		
		if($extensions != $stationDetails[0]['Station']['extensions'])
		{
			$this->log('STATION CONTROLLER ' . 'Update Station Changing Extensions, not equal ' . $extensions . '->' . $stationDetails[0]['Station']['extensions'], LOG_DEBUG);
				$stationsave['Station']['extensions'] = $extensions;
				$stationUpdate = $this->Station->save($stationsave, false,  array('extensions','status'));
				
				# Then Create 54 Base key Feature. ?? Need to change logic
				for ($i = 2; $i <= 14; $i++) {
					$keyNum = str_pad((int) $i,2,"0",STR_PAD_LEFT);
					#$keyNum = $i;
					$keysave['Stationkey']['dn'] = '';
					$keysave['Stationkey']['id'] = $keyNum.'@'.$station_id;
					$keysave['Stationkey']['station_id'] = $station_id;
					#$this->log('STATION CONTROLLER ' . 'Create Function creating key ' .   $keyNum, LOG_DEBUG);
					$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn','station_id'));
				}
				$pageRefresh = 1;		
		}
		if($password != $stationDetails[0]['Station']['password'])
		{
			$this->log('STATION CONTROLLER ' . 'Update Station Changing Password, not equal ' . $password . '->' . $stationDetails[0]['Station']['password'], LOG_DEBUG);
			$stationsave['Station']['password'] = $password;
			$stationUpdate = $this->Station->save($stationsave, false,  array('password', 'status'));
			$pageRefresh = 1;
		}
				
		
		#Next Check the key features
		

		#--------------------------------------------------------------------------------------------#
		#Create an array containing key features							 #
		#--------------------------------------------------------------------------------------------#
		$keyFeaturesSource = $this->Feature->find('all', array (
		'fields' => array (
		'Feature.id', 'Feature.short_name', 'Feature.stationkey_id', 'Feature.primary_value', 'Feature.label', 'Feature.status'
				),
				'conditions' => array (
						'Feature.id like' => '%' . $station_id . '%'
								)
								,'order' => array (
								'Feature.id',
								),
		));
		
		$keyFeatureDefinition = array('DN','MADN','MLH', 'CPU','CWT', 'UCDLG', 'CWT', 
									'UCDLG', 'MSB', 'MWT', 'PRK', 'RAG', 'CNF','AUD', 'BLF', 'MSB');
		#Need to have a view of ALL features - THis can repalce the query above - ??
		
		
		
		#Loop throught the features and foreach stationeky determine a type for that key
		foreach($keyFeaturesSource as $keyfeature)
		{
			$shortName = $keyfeature['Feature']['short_name'];
			#$stationKey = $keyfeature['Feature']['stationkey_id'];
			$primaryValue = $keyfeature['Feature']['primary_value'];
		
			$allFeatureMap[$shortName] = $primaryValue;
			if (in_array($shortName, $keyFeatureDefinition))
			{
				$keyFeatureMap[$shortName] = $primaryValue;
				$IdFeatureMap[$shortName] = $keyfeature['Feature']['id'];
			}
								
		}
		
				
		#-----------------------
		#Now process Station feaures
		# The following only affact a page refresh
		# The feature is not deleted only the primary_value is 0 or 1.
		# As there is no expected child behaviour only attribute is controlled.
		#------------------------
		$stationFormArray = array('CTI', 'CWT', 'CFRA', 'MOH', 'SIMRING','SIMRINGMEMBER1', 'SIMRINGMEMBER2', 'SIMRINGMEMBER3','SIMRINGMEMBER4');
		$stationLayoutFormArray = array('SIMRING'); # These features requirelayoutChange
		
		foreach ($stationFormArray as $stationFeat)
		{
			$this->log('STATION CONTROLLER ' . 'looping station features' . $stationFeat . ' ' . $$stationFeat, LOG_DEBUG);
				
			if ($this->data['Station'][$stationFeat] != $allFeatureMap[$stationFeat])
			#if($cti != $keyFeatureMap['CTI'])
			{
				$this->log('STATION CONTROLLER ' . 'Update Station Changing ' . $stationFeat . ', not equal :' . $this->data['Station'][$stationFeat] . '->' . $allFeatureMap[$stationFeat], LOG_DEBUG);
				$featuresave['Feature']['status'] = '5';
				$featuresave['Feature']['id'] = "01@".$station_id."-" . $stationFeat;
				$featuresave['Feature']['stationkey_id'] = "01@".$station_id ;
				#$featuresave['Feature']['stationkey_id'] = "";
				$featuresave['Feature']['short_name'] = $stationFeat;
				$featuresave['Feature']['primary_value'] = $this->data['Station'][$stationFeat];
				$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
			
			
				if($featureres['Feature']){
					if(in_array($stationFeat, $stationLayoutFormArray))
					{
						$this->log('STATION CONTROLLER : STATION FEATURES LAYOUT REFRESH SET (1):' .$stationFeat, LOG_DEBUG);
						$layoutRefresh = 1;
					}
					else {
						$this->log('STATION CONTROLLER ' . 'Update Station Changing' . $this->data['Station'][$stationFeat], LOG_DEBUG);
						$pageRefresh = 1;
					}

				}
			}
		}
		
		#-----------------------
		#Now process Station feaures that have layout change behavoiur
		# This feature is deleted.
		# 
		#------------------------
		$stationLayoutFormArray = array();
		
		foreach ($stationLayoutFormArray as $stationFeat)
		{
			$this->log('STATION CONTROLLER ' . 'looping station features' . $stationFeat . ' ' . $$stationFeat, LOG_DEBUG);
		
			if ($this->data['Station'][$stationFeat] != $allFeatureMap[$stationFeat])
				#if($cti != $keyFeatureMap['CTI'])
			{
				if($this->data['Station'][$stationFeat] == 1)
				{
					$this->log('STATION CONTROLLER ' . 'Update Station Changing ' . $stationFeat . ', not equal :' . $this->data['Station'][$stationFeat] . '->' . $allFeatureMap[$stationFeat], LOG_DEBUG);
					$featuresave['Feature']['status'] = '5';
					$featuresave['Feature']['id'] = "01@".$station_id."-" . $stationFeat;
					$featuresave['Feature']['stationkey_id'] = "01@".$station_id ;
					#$featuresave['Feature']['stationkey_id'] = "";
					$featuresave['Feature']['short_name'] = $stationFeat;
					$featuresave['Feature']['primary_value'] = $this->data['Station'][$stationFeat];
					$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
				}
				else 
				{
					#Delete PRK on any key??
					$featureId = '%' . $station_id."-" . $stationFeat;
					$delete = array (
							'Feature.id like' => $featureId
					);
					$this->log('STATION CONTROLLER : Update Station Deleting :' .$featureId, LOG_DEBUG);
						
					$this->Feature->deleteAll($delete);
				}	
				$this->log('STATION CONTROLLER : STATION FEATURES LAYOUT REFRESH SET (1):' .$featureId, LOG_DEBUG);
				$layoutRefresh = 1;
			}
		}
			
		
		if(isset($this->data['Station']['MSBEnable']) && $this->data['Station']['MSBEnable'] != $allFeatureMap['MSBEnable'])
		{
			#if ($msbenable == 1)
			#{
			$this->log('STATION CONTROLLER ' . 'Update Station Changing msbenable, not equal : ' . $this->data['Station']['MSBEnable'] . '->' . $allFeatureMap['MSBEnable'], LOG_DEBUG);
				
			$featuresave['Feature']['status'] = '5';
			$featuresave['Feature']['id'] = "01@".$station_id."-MSBEnable";
			$featuresave['Feature']['stationkey_id'] = "01@".$station_id ;
			#$featuresave['Feature']['stationkey_id'] = "";
			$featuresave['Feature']['short_name'] = 'MSBEnable' ;
			$featuresave['Feature']['primary_value'] = $this->data['Station']['MSBEnable'] ;
			$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
					
			#Check for deletes
			if ($this->data['Station']['MSBEnable'] == 0)
			{
				#Delete All MSB Features including control and Members??
				$featureId = '%' . $station_id."-MSB";
				$delete = array (
				'Feature.id like' => $featureId
				);
				$this->Feature->deleteAll($delete);
				#Delete All MSB Features including control and Members??
				$featureId = '%' . $station_id."-MSBMEMBER";
				$delete = array (
				'Feature.id like' => $featureId
				);
				
				$this->Feature->deleteAll($delete);
				$this->log('STATION CONTROLLER : Update Station Deleting all MSB Features :' .$featureId, LOG_DEBUG);
				}
		
		
				if($featureres['Feature']){
					$this->log('STATION CONTROLLER ' . 'Update Station Changing MSB Saved', LOG_DEBUG);
					$pageRefresh = 1;
				}
		}
		
		#-----------------------
		#Now process Key feaures. These exist only once on a station.
		#Feature keys are always shown in UI.
		#
		#------------------------
		$stationKeyFormArray = array('RAG', 'PRK', 'CNF', 'MSB');
		
		foreach ($stationKeyFormArray as $stationFeat)
		{
			$this->log('STATION CONTROLLER ' . 'Update Station Comparing' . $stationFeat . ', value : ' . $this->data['Station'][$stationFeat] . '->' . $keyFeatureMap[$stationFeat], LOG_DEBUG);
				
			#use of intval to catch when feature does nto exist in DB.
			if(isset($this->data['Station'][$stationFeat]) &&  $this->data['Station'][$stationFeat] != intval($keyFeatureMap[$stationFeat]))
			{
				$this->log('STATION CONTROLLER ' . 'Update Station Changing' . $stationFeat . ', not equal ' . $this->data['Station'][$stationFeat] . '->' . $keyFeatureMap[$stationFeat], LOG_DEBUG);
					
				if ($this->data['Station'][$stationFeat] == 1)
				{
					#For adds?
					$featuresave['Feature']['status'] = '99';
					$featuresave['Feature']['id'] = "99@".$station_id."-". $stationFeat;
					$featuresave['Feature']['stationkey_id'] = "99@".$station_id ;
					#$featuresave['Feature']['stationkey_id'] = "";
					$featuresave['Feature']['short_name'] = $stationFeat;
					$featuresave['Feature']['primary_value'] = $this->data['Station'][$stationFeat] ;
					$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
				}
				else 
				{
					#Delete station key feature on any key??
					$featureId = '%' . $station_id."-" . $stationFeat;
					$delete = array (
							'Feature.id like' => $featureId
					);
					$this->log('STATION CONTROLLER : Update Station Deleting :' .$featureId, LOG_DEBUG);
										
					$this->Feature->deleteAll($delete);
					
					
					if($stationFeat == 'MSB')
					{
						#Delete Members ???
						$MEMBER = '%@' . $station_id . '-' . $stationFeat . 'MEMBER';
						$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
					
					
					}
					
					#Change the status fon th mathcing keys so that they are deleted by activation.
					$this->Feature->updateAll(array('Stationkey.status' =>7), array('Feature.id like' => $Member));
					
									
				}
		
				if($featureres['Feature']){
					$this->log('STATION CONTROLLER ' . 'Update Station Saved' . $stationFeat, LOG_DEBUG);
					$pageRefresh = 1;
					$this->log('STATION CONTROLLER : STATION FEATURES LAYOUT REFRESH SET (2):' .$stationFeat, LOG_DEBUG);
					$layoutRefresh = 1;
				}
			}
		
#		
		}
#
		#$stationFeat = 'CPU';
		if(isset($this->data['Station']['CPU']) &&  $this->data['Station']['CPU'] != $keyFeatureMap['CPU'])
		{
			$stationFeat = 'CPU';
			$this->log('STATION CONTROLLER ' . 'Update Station Changing CPU not equal %' . $this->data['Station'][$stationFeat] . '%->%' . $keyFeatureMap['CPU'] . '%', LOG_DEBUG);
		
			if(($keyFeatureMap['CPU'] != '') && ($this->data['Station'][$stationFeat] != ''))
			{
				#For updates?
				$this->log('STATION CONTROLLER ' . 'Update CPU ONLY ', LOG_DEBUG);
				
				$featuresave['Feature']['status'] = '4';
				$featuresave['Feature']['id'] = $IdFeatureMap[$stationFeat];
				
				$featuresave['Feature']['primary_value'] = $this->data['Station'][$stationFeat] ;
				$featureres = $this->Feature->save($featuresave, false,  array('id','status','primary_value'));
				$pageRefresh = 1;
			
			}
			elseif ($this->data['Station'][$stationFeat])
			
			{
				#For adds?
				$this->log('STATION CONTROLLER ' . 'ADD CPU ', LOG_DEBUG);
				
				$featuresave['Feature']['status'] = '99';
				$featuresave['Feature']['id'] = "99@".$station_id."-". $stationFeat;
				$featuresave['Feature']['stationkey_id'] = "99@".$station_id ;
				#$featuresave['Feature']['stationkey_id'] = "";
				$featuresave['Feature']['short_name'] = $stationFeat;
				$featuresave['Feature']['primary_value'] = $this->data['Station'][$stationFeat] ;
				$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
				$layoutRefresh = 1;
			}
			else
			{
					$this->log('STATION CONTROLLER ' . 'DELETE CPU ', LOG_DEBUG);
					#Delete station key feature on any key??
				$featureId = '%' . $station_id."-" . $stationFeat;
				$delete = array (
				'Feature.id like' => $featureId
				);
					$this->log('STATION CONTROLLER : Update Station Deleting :' .$featureId, LOG_DEBUG);
		
					$this->Feature->deleteAll($delete);
					
					#Delete Members ??? REview if should add to COnfig behaviour
					$MEMBER = '%' . $featureId . 'MEMBER';
					$this->Feature->deleteAll(array('Feature.id like' => $Member), false);
					
					$layoutRefresh = 1;
					
			}
		
			if($featureres['Feature']){
			$this->log('STATION CONTROLLER ' . 'Update Station Saved' . $stationFeat, LOG_DEBUG);
					$pageRefresh = 1;
					$this->log('STATION CONTROLLER : STATION FEATURES LAYOUT REFRESH SET (2):' .$stationFeat, LOG_DEBUG);
					#$layoutRefresh = 1;
			}
		}	
		
		#--------------------------------------
		# Now call the appropriate action refresh or layout change
		#-----------------------------------------
		
		
		$type = $stationDetails[0]['Station']['type'];
		
		if ($layoutRefresh == 1)
		{
			#Need to know station type
			$layoutFile = $type . 'config.xml';
			$retval = $this->calculateLayout($station_id, $layoutFile);
		}
		elseif ($pageRefresh == 1)
		{
			#$this->log('STATION CONTROLLER ' . 'Update Base Station Function feature, key, station saved',LOG_DEBUG);
			$this->redirect('/stations/editstation/' . $station_id);
		}
		else 
		{
			$this->redirect('/stations/editstation/' . $station_id);
			
		}
		
		#echo json_encode(array("Relodeme"));
		echo "Relodeme";
		exit();						
	}
	
	
	function change_password($station_id = null){
				
				$this->set('statId', $station_id);
				$stationInfo = $this->Station->find('first', array (
				'conditions' => array (
						'Station.id' => $station_id,
	
				),
	
					));
				
				$this->log('STATION CONTROLLER ' . 'CHANGE PASSWORD METHOS' . $station_id , LOG_DEBUG);
				
				if(isset($this->data))
				{
			
					$password = $this->data['Station']['password'];
					
					#First Check the station model
		
		
					#$stationsave['Station']['id'] = $station_id;
					#$stationsave['Station']['status'] = '5';
					##
					
					$this->log('STATION CONTROLLER ' . 'Update Station Changing password' . $password , LOG_DEBUG);
					
					#Build transaction manually.
					$transId = time();
					$fullTransaction = '<algRequest><object action="update" name="PASSWORD"><message station="' . $stationInfo['Station']['port'] . '" key="00"><var value="' . $password . '" name="attribute1"/></message></object></algRequest>';
						
					#Save transaction
					$insert = array (
							'Transaction' => array (
									'id' => $transId,
									'log_id' => '',
									'transaction' => $fullTransaction,
									'status' => 1,
									'created' => 'NOW()'
							)
					);
					
					$this->Transaction->create();
					$this->Transaction->save($insert, false);
					
					#$this->log('STATION CONTROLLER ' . 'UALGREQUEST' . $password , LOG_DEBUG);
					$transResponse = $this->AlgInterface->processTransaction($fullTransaction);
		
					#Now Create the Log entry with status and associate the transaction.
					preg_match("/action_complete/", $transResponse, $matches);
					if ($matches[0])
					{
						$transStatus = 1;
						$_SESSION['success'] = __('passwordChanged', true) ;
					}
					else
					{
						$transStatus = 0;
						$_SESSION['error'] = __('passwordChangedFailed', true) ;
						
						
					}
					
								
					$log = 'Station Update : Password Change';
								
					$insert = array (
					'Log' => array (
					'affected_obj' => $station_id,
					'log_entry' => $log,
					'created' => date('Y-m-d H:i:s'),
					'status' => 1,
					'customer_id' => $stationInfo['Station']['customer_id'],
					'bsk' => $this->Session->read('BSK'),
					'user' => $this->Session->read('ACCOUNTNAME'),
					'app_type' => $this->Session->read('APPNAME'),
					'modified' => '0000-00-00 00:00:00',
					'modification_status' => $transStatus,
					'modification_response' => $transResponse,
					'transaction_id' => $transId
					)
					);
						
					$this->Log->create();
					$this->Log->save($insert, false);
						
					$log_id = $this->Log->id;
		
					$transUpdate = array (
							'Transaction' => array (
							'id' => $transId,
							'log_id' => $log_id,
								
					)
					);
	
					$transResponse = $this->Transaction->save($transUpdate, false);
					#???Add resopnse check
					#if($transResponse == '99')
					#{				
						
					#}
				
					if($transStatus == 1)
					{
						$link = '<a class="fancybox fancybox.ajax" href="' . Configure::read('base_url') . '/logs/logdetails/' . $log_id . '">' . __("LogEntry", true) . '</a>';
						$_SESSION['success'] .= $link;
					}
					else
					{
						$link = '<a class="fancybox fancybox.ajax" href="' . Configure::read('base_url') . '/logs/logdetails/' . $log_id . '">' . __("LogEntry", true) . '</a>';
						$_SESSION['error'] .= $link;
					}
					#echo json_encode(array("Relodeme"));
					echo "Relodeme";
					exit();
				}
		}
	
	
	function  addMember($station_id = null){
		$this->autoRender = false;
		if($this->RequestHandler->isAjax()==true){   
			$station_id = $this->params['pass'][0]; 
		}
		
		
		
		#$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
		$group_id=isset($this->params['url']['group_id'])?$this->params['url']['group_id']:(isset($this->params['named']['group_id'])?$this->params['named']['group_id']:"");
		$groupInfo = $this->Group->find('first', array (
				'conditions' => array (
						'Group.id' => $group_id
				)
		));
		
		$group_type=isset($this->params['url']['group_type'])?$this->params['url']['group_type']:(isset($this->params['named']['group_type'])?$this->params['named']['group_type']:"");
		$group_identifier=$groupInfo['Group']['identifier'];
		
		$this->log('STATION CONTROLLER ' . 'Add Member Function stat ID' . $station_id . ' grp id ' . $group_identifier, LOG_DEBUG);
		#die();
   
		#$stationInfo = $this->Station->findById($station_id);
		if($this->RequestHandler->isAjax()==true){   
			$station_id = $this->params['pass'][0]; 
		}
		$stationInfo = $this->Station->find('first', array (
		'conditions' => array (
		'Station.id' => $station_id
		)
		, 'fields' => array (
		'Station.type',
		'Station.port'
		)
		));
		#Determine stationtype
		$layoutFile = $stationInfo['Station']['type'] . 'config.xml';
		
		//First Create an as-is version.
		if(($station_id != '') && ($stationInfo['Station']['status'] != 5))
		{
			$createAsis = $this->Station->createAsisStation($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisStationKeys($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->deleteAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
			$createAsis = $this->Station->createAsisFeatures($station_id);
			$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
		}
	
		$statArray = print_r($stationInfo, true);
		#$output_array=print_r($output, true);	
		$this->log('STATION CONTROLLER ' . 'Add Group Member Function : ' . $group_type . ' : ' . $station_id, LOG_DEBUG);
		
		if ($group_type == 'CPU')
		{
				/*
			#Check is not lowest LEN and then
			$GRPLENConverted = preg_replace("/[A-Za-z ]/", '', $group_identifier);
			$STATIONLENConverted = preg_replace("/[A-Za-z ]/", '', $stationInfo['Station']['port']);
			
			#If this is a new group then the identifier will be an int
			if(($STATIONLENConverted < $GRPLENConverted) || (is_int($group_identifier)))
			{
				$this->log('STATION CONTROLLER ' . 'Add Group CPU : Station LEN lower than Group LEN Updating : ' . $STATIONLENConverted . ' < ' . $GRPLENConverted, LOG_DEBUG);
				$string_port = "'" . $stationInfo['Station']['port'] . "'" ;
				if($this->Feature->updateAll(array('Feature.primary_value' => $string_port), array('Feature.short_name' => 'CPU', 'Feature.primary_value' => $group_identifier)))
				{
					$this->Group->updateAll(array('Group.identifier' => $string_port), array('Group.identifier' => $group_identifier));
				}
				$group_identifier = $stationInfo['Station']['port'];
			
			}
			else
			{
				$this->log('STATION CONTROLLER ' . 'Add Group CPU : Station LEN higher than Group LEN NOT updating : ' . $STATIONLENConverted . ' > ' . $GRPLENConverted, LOG_DEBUG);
					
			}
			#exit; # ?? FOR TESTING
			*/
			$group_identifier = $group_id;
		
		}
		else
		{
			$group_type = 'DN_' . $group_type;
		}
		
		if($group_type == 'DN_MADN')
		{
			#Code to check if Pilot or not
			$groupMemberCount = $this->Feature->find('all',
				array(
						'fields' => array(
								'Stationkey.dn',
						'count(Feature.id)'),
						'group' => 'Stationkey.dn',
						'conditions'=>array('Feature.short_name'=> array('MADN', 'HNTID')))
			);
			foreach($groupMemberCount as $groupMemKey => $groupMemVal)
			{
				$groupMemCount[$groupMemVal['Stationkey']['dn']] = $groupMemVal[0]['count(`Feature`.`id`)'];
			}
			if ($groupMemCount[$group_identifier] == 0)
			{
				$this->log('STATION CONTROLLER ' . 'Add Member ADDING PILOT',LOG_DEBUG);
				$group_type = 'DN_MADN_PILOT';
			}
		}
		
		# updating in feature table
		$featuresave['Feature']['status'] = '99';
		#$featuresave['Feature']['id'] = "99@".$station_id."-DN_MADN";
		$featuresave['Feature']['id'] = "99@".$station_id."-" .$group_type;
		$featuresave['Feature']['stationkey_id'] = "99@".$station_id ;
		#$featuresave['Feature']['stationkey_id'] = "";
		$featuresave['Feature']['short_name'] = $group_type ;
		$featuresave['Feature']['primary_value'] = $group_identifier ;
		$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
	
	 
		if($featureres['Feature']){
              
			$keysave['Stationkey']['dn'] = $group_identifier;
			$keysave['Stationkey']['id'] = "99@".$station_id;

			$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn'));
			if($keyupdate['Stationkey']){
			 
				$stationsave['Station']['status'] = '5';
				$stationsave['Station']['id'] = $station_id;

				$stationUpdate = $this->Station->save($stationsave, false,  array('id','status'));
				 
				
			}
			$this->log('STATION CONTROLLER ' . 'Add Member Function feature saved',LOG_DEBUG);
			
			$retval = $this->calculateLayout($station_id, $layoutFile);
			
			if($retval == 0)
			{
				
				
				//WORKAROUND FOR MADN HANDLING ???
				if(($group_type == 'DN_MADN') || ($group_type == 'DN_MADN_PILOT'))
				{
					#Find Key that has DN on with the identifier.
					$MADNInfo = $this->Feature->find('first', array (
							'conditions' => array (
									'Feature.short_name' => 'DN',
									'Feature.primary_value' => $group_identifier,
									'Feature.stationkey_id like ' => '%'.$station_id.'%'
							)

					));
					$statArray = print_r($MADNInfo, true);
					#$output_array=print_r($output, true);
					$this->log('STATION CONTROLLER ' . 'Add Group MADN DETAILS: ' . $statArray, LOG_DEBUG);
					
					#update 'MADN' feature with the identifier.
					$mfeaturesave['Feature']['id'] = $MADNInfo['Feature']['stationkey_id'] . '-MADN';
					#$mfeaturesave['Feature']['short_name'] = 'MADN';
					$mfeaturesave['Feature']['primary_value'] = $group_identifier;
					$featureres = $this->Feature->save($mfeaturesave, false,  array('id','primary_value'));
					
					
				}
				
				//END WORKAROUND FOR MADN HANDLING ???
				
				$_POST['message']='success'; 
				#$_SESSION['success'] = __('Member Added', true);
				$this->log('STATION CONTROLLER ' . 'Add Member Function posted success',LOG_DEBUG);
			}
			else
			{
				$_POST['message']='failure';

				$this->log('STATION CONTROLLER ' . 'Add Member Function posted fail',LOG_DEBUG);
			}
			 
		}
		#exit(json_encode($_POST));
		#exit($_POST);
		#exit;
		echo $_POST['message'];
		#exit();
		

	}

	
	function  addDN($dn_id = null){
		if($this->RequestHandler->isAjax()==true){
			$dn_id = $this->params['pass'][0];
		}
	
	
	
		#$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
		$station_id=isset($this->params['url']['station_id'])?$this->params['url']['station_id']:(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:"");
				$this->log('STATION CONTROLLER ' . 'Add DN Function stat ID' . $station_id . ' DN id ' . $dn_id, LOG_DEBUG);
				#die();
				 
				#$stationInfo = $this->Station->findById($station_id);

				$stationInfo = $this->Station->find('first', array (
						'conditions' => array (
								'Station.id' => $station_id
						)
		
				));
				#Determine stationtype
				$layoutFile = $stationInfo['Station']['type'] . 'config.xml';
				$this->log('STATION CONTROLLER ' . 'Add DN Function using layoutfile' . $layoutFile , LOG_DEBUG);
				
				//First Create an as-is version.
				if(($station_id != '') && ($stationInfo['Station']['status'] != 5))
				{
					$createAsis = $this->Station->createAsisStation($station_id);
					$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
					$createAsis = $this->Station->createAsisStationKeys($station_id);
					$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
					$createAsis = $this->Station->deleteAsisFeatures($station_id);
					$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
					$createAsis = $this->Station->createAsisFeatures($station_id);
					$this->log('editstation page ' . 'Attempting top create asis ' . $createAsis, LOG_DEBUG);
				}
					
		$statArray = print_r($stationInfo, true);
		#$output_array=print_r($output, true);
		$this->log('STATION CONTROLLER ' . 'Add DN Function ' . $dn_id . $station_id, LOG_DEBUG);
	
		# updating in feature table
		$featuresave['Feature']['status'] = '99';
		$featuresave['Feature']['id'] = "99@".$station_id."-DN_INDIVIDUAL";
		$featuresave['Feature']['stationkey_id'] = "99@".$station_id ;
		#$featuresave['Feature']['stationkey_id'] = "";
		$featuresave['Feature']['short_name'] = 'DN_INDIVIDUAL' ;
		$featuresave['Feature']['primary_value'] = $dn_id ;
		$featureres = $this->Feature->save($featuresave, false,  array('id','status','stationkey_id','short_name','primary_value'));
	
	
		if($featureres['Feature']){
	
			$keysave['Stationkey']['dn'] = $dn_id;
			$keysave['Stationkey']['id'] = "99@".$station_id;
			$keysave['Stationkey']['station_id'] = $station_id;
			
			#now update the DN function
			#$dnsave['Dns']['function'] = 'INDIVIDUAL';
			#$dnsave['Dns']['id'] = $dn_id;
			#$dnUpdate = $this->Dns->save($dnsave, false,  array('function'));
			
			$dnUpdate = $this->Dns->createActiveDn($dn_id, 'INDIVIDUAL');
	
			$keyUpdate = $this->Stationkey->save($keysave, false,  array('id','dn'));
			if($keyupdate['Stationkey']){
				$stationsave['Station']['status'] = '5';
				$stationsave['Station']['id'] = $station_id;
	
				$stationUpdate = $this->Station->save($stationsave, false,  array('id','status'));
	
			}
			$this->log('STATION CONTROLLER ' . 'Add DN Function feature saved',LOG_DEBUG);
			$retval = $this->calculateLayout($station_id, $layoutFile);
			$this->log('STATION CONTROLLER : ADD DN : RETURNED FROM caclLayout',LOG_DEBUG);
			if($retval == 0)
			{
				$_POST['message']='success';
				$_SESSION['success'] = __('Feature Added', true);
				$this->log('STATION CONTROLLER ' . 'Add DN Function posted success',LOG_DEBUG);
			}else{
				$_POST['message']='failure';
	
				$this->log('STATION CONTROLLER ' . 'Add DN Function posted fail',LOG_DEBUG);
			}
		}
		#exit(json_encode($_POST));
		exit($_POST['message']);
	}
function  calculateLayout($station_id = null, $layoutFile = null, $mode = null){
	

		$this->log('STATION CONTROLLER : featureLayout function' . 'station Info ' . $station_id, LOG_DEBUG);
		
		$update['Station']['status'] = '5';
		$update['Station']['id'] = $station_id ;
		$updateRes = $this->Station->save($update, false,  array('id','status'));
		
		if(($mode == 'ASIS') || ($mode == 'TOBE'))
		{
			$this->log('STATION CONTROLLER : calculateLayout function : ACTIVATION MODE', LOG_DEBUG);
			#If this is Activation mode (not features then allow all KEys to in the XML
			$filterCond = '.*';
			
			 
			
		}
		else
		{
			#If this is feature Calcualtion mode then only keys 1-14
			
			$this->log('STATION CONTROLLER : calculateLayout function : FEATURE MODE', LOG_DEBUG);
			
			$filterCond ='^(01|02|03|04|05|06|07|08|09|10|11|12|13|14|99)@+';

		}
		
		if($updateRes['Station']){
	
			#Get all features again for station and generate the output file
			
			if($mode == 'ASIS')
			{
				$featureModel = 'CFeature';
				$this->log('featureLayout working in ASIS mode ' . $station_id, LOG_DEBUG);
				$stationFeaturesSource = $this->CFeature->find('all', array (
						'fields' => array (
								'CFeature.id', 'CFeature.short_name', 'CFeature.stationkey_id', 'CFeature.primary_value', 'CFeature.label', 'CFeature.status'
						),
						'conditions' => array (
							'CFeature.id like' => '%' . $station_id . '%',
							'CFeature.id REGEXP' => $filterCond
						)						
						,'order' => array (
								'CFeature.id',
						),
				));
				
			}
			else 
			{
				$featureModel = 'Feature';
				$stationFeaturesSource = $this->Feature->find('all', array (
					'fields' => array (
							'Feature.id', 'Feature.short_name', 'Feature.stationkey_id', 'Feature.primary_value', 'Feature.label', 'Feature.status'
					),
					'conditions' => array (
							'Feature.id like' => '%' . $station_id . '%',
							'Feature.id REGEXP' => $filterCond
					)
					,'order' => array (
							'Feature.id',
					),
				));
			}
			
			# Get customer ID
				
			$stationDetails = $this->Station->find('all', array (
			'conditions' => array (
			'Station.id' => $station_id
			)
			));
			$customerDetails = $this->Location->find('all', array (
					'conditions' => array (
							'Location.customer_id' => $stationDetails[0]['Customer']['id']
					)
			));
			
			#$f_array=print_r($stationFeaturesSource, true);
			#$this->log("Station controller : FEATURE ARRAY" .  $f_array, LOG_DEBUG);
			
			$this->log("Station controller : caclculateLayout : building feature Array", LOG_DEBUG);
			#Loop throught the features and foreach stationeky determine a type for that key
			foreach($stationFeaturesSource as $keyfeature)
			{
				$featureId = $keyfeature[$featureModel]['id'];
				$shortName = $keyfeature[$featureModel]['short_name'];
				$stationKey = $keyfeature[$featureModel]['stationkey_id'];
				$primaryValue = $keyfeature[$featureModel]['primary_value'];
				$label = utf8_encode($keyfeature[$featureModel]['label']);
				#$this->log("Station controller : CHECK LABEL" . $stationKey . ':' .  $label, LOG_DEBUG);
				#StaitonFeatureMap is used as a source keyed on the stationkey to find the real type
				$stationFeatureMap[$stationKey][$shortName] = $primaryValue;
							
				preg_match("/^([0-9]+)\@([0-9]+)/", $stationKey, $matches);
				if ($matches[1]) {
					$keynumber = $matches[1];
					$station_id = $matches[2];
					$keyfeature[$featureModel]['key'] = $keynumber;
					$keyfeature[$featureModel]['zkey'] = ltrim($keynumber, '0');
				}
				else{
					$station_id = 'unset';
				}

				#$this->log("Station controller : caclculateLayout : CHECKING FEATURE" . $shortName . ':' . $primaryValue . ':', LOG_DEBUG);
				#DOn't Output blank AUD if this is feature mode.
				if(($mode != 'ASIS') && ($mode != 'TOBE') && ($shortName == 'AUD') && ($primaryValue == ''))
				{
					#$this->log("Station controller : caclculateLayout : Excluding blank AUD" . $featureId, LOG_DEBUG);
				}
				else 
				{
				
					$stationFeatureXML['Station'][$featureId] = $keyfeature;
					$stationFeatureXML['Station']['id'] = $station_id;
					#$stationFeatureXML['Station']['port'] = $stationDetails[0]['Station']['port'];
					$stationFeatureXML['Station']['status'] = '1';
				
				}
				if($mode == 'TOBE')
				{
					#Special code to generate additional data as required by different features.
				
				
					if($shortName == 'CPU')
					{
						#find the cpuLen.
						
						$cpuLen = $this->calculateCPULen($primaryValue);
						
						$stationFeatureXML['Station'][$featureId]['Feature']['cpuLen'] = $cpuLen;
						#$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['primary_value'] = $arrayKeyPrimary;
					}
					/* CHANGED TO BE ONLY ON DN_MADN
					 * 
					 if($shortName == 'MADN')
					{
					#find the cpuLen.
					
						#$cpuLen = $this->calculateCPULen($primaryValue);
						$madnPilotLen = $this->Station->getPilotFromKey($stationKey);
						
						$f_array=print_r($madnPilotLen, true);
						$this->log("Station controller : MADN_PILOT ARRAY" .  $f_array, LOG_DEBUG);
					
						$stationFeatureXML['Station'][$featureId]['Feature']['madnPilotLen'] = $madnPilotLen[0]['stations']['port'];
						#$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['primary_value'] = $arrayKeyPrimary;
					}
					*/
				}

			}
			
			$this->log("Station controller : caclculateLayout : END building feature Array", LOG_DEBUG);
			
			#Check If there are groups, if so
			
			#$stationFeatureXML['Group']['cpu']['id'] = '1234321';
			#$stationFeatureXML['Group']['cpu']['cpuLen'] = 'testLEN';
			
			
			/**these for getting the current customer name*/
			# Add the station and customer level flags to the station
			
			$stationFeatureXML['Station']['custCTI'] = $customerDetails[0]['Customer']['CTI'];
			#$stationFeatureXML['Station']['custCFRA'] = $customerDetails[0]['Customer']['CFRA'];
			
			if(($mode == 'ASIS') || ($mode == 'TOBE'))
			{
				$stationFeatureXML['Station']['port'] = $stationDetails[0]['Station']['port']; #???Check if needed in feature mode
				$stationFeatureXML['Station']['custGrp'] = $customerDetails[0]['Customer']['id'];
				$stationFeatureXML['Station']['custPresGrp'] = $customerDetails[0]['Customer']['presentation_group'];
				$stationFeatureXML['Station']['custSubGrp'] = $customerDetails[0]['Customer']['id'];
				$stationFeatureXML['Station']['locAcc'] = $customerDetails[0]['Location']['id'];
			}
			
			#$this->log("Station controller : EDIT FEATURE READY FOR XML : $xml_array", LOG_DEBUG);

			foreach($stationFeatureMap as $arrayKeyIndex=>$arrayKey)
			{
				#$this->log("Station controller : Feature : $arrayKeyIndex => $arrayKey", LOG_DEBUG);
			
				foreach($arrayKey as $arrayFeatureIndex=>$arrayKeyPrimary)
				{
					#$this->log("Station controller : Feature : --> $arrayFeatureIndex => $arrayKeyPrimary", LOG_DEBUG);
						
					if($arrayFeatureIndex == 'DN')
					{

						$dNfeatureType = $this->check_feature_type($arrayKey);
						#$this->log("Station controller : Feature : is $dNfeatureType DN", LOG_DEBUG);
						
						$newId = $arrayKeyIndex . '-' . $dNfeatureType;
						$origDnId = $arrayKeyIndex . '-DN';
						
						if($mode == 'TOBE')
						{
						#Special code to generate additional data (MADN PILOT LEN) as required by different features.
						
						

							if($dNfeatureType == 'DN_MADN')
							{
							#find the cpuLen.
								
								#$cpuLen = $this->calculateCPULen($primaryValue);
									$madnPilotLen = $this->Station->getPilotFromKey($arrayKeyIndex);
						
									$f_array=print_r($madnPilotLen, true);
									$this->log("Station controller : MADN_PILOT ARRAY" .  $f_array, LOG_DEBUG);
										
									$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['madnPilotLen'] = $madnPilotLen[0]['stations']['port'];
									#$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['primary_value'] = $arrayKeyPrimary;
								}
						}
						
					
						
						#Add a check to see if this is a move then don't output as it will already be a record for the moved??
						
						#create array in format@
						#stationFeatureXML['Station'][01@34343243-DN_INDIVIDUAL][01@44324334]['Feature']['key] = '05']
						$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['id'] = $newId;
						$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['short_name'] = $dNfeatureType;
						$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['stationkey_id'] = $arrayKeyIndex;
						$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['primary_value'] = $arrayKeyPrimary;
						$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['label'] = '';
						preg_match("/^([0-9]+)\@([0-9]+)/", $arrayKeyIndex, $matches);
						if ($matches[1]) {
							$keynumber = $matches[1];
							#$keyfeature['Feature']['key'] = $keynumber;
							$stationFeatureXML['Station'][$newId][$arrayKeyIndex]['Feature']['key'] = $keynumber;
						}
						else{
							#$station_id = 'unset';
						}
								
						#Get rid of original DN
						unset($stationFeatureXML['Station'][$origDnId]);
						$this->log("Station controller : Adding Array Element : $newId", LOG_DEBUG);
					
					}
					else
					{
						#$this->log("Station controller : Feature : $arrayFeatureIndex IS NOT DN", LOG_DEBUG);
					}
				}
			}
			
			
		
			
			#if this is  for FEATURE mode then apply
			if(($mode != 'ASIS') && ($mode != 'TOBE'))
			{
				
				$xml_student_info = new SimpleXMLElement("<?xml version=\"1.0\"?><Configuration></Configuration>");
				
				$this->array_to_xml($stationFeatureXML,$xml_student_info);
				//saving generated xml file
				$base_path = Configure :: read('base_path');
				
				$tsId = time();
				
				$this->log("Station controller : caclulateLAyout : creating transaction ID :" . $tsId , LOG_DEBUG);
				$fileName = 'feature.' . $tsId . '.input.xml';
				$path = Configure :: read('base_path') . '/XMLEngine/transactions/' . $fileName;
				
				#$xml_student_info->asXML( $base_path . '/XSLTWork/POC2/merged_scripts/input.xml'); # orignal
				
				#Write the XML to file
				
				$xml_student_info->asXML($path);
				
				
				$backEndMode = Configure :: read('backEndMode');
					
				if($backEndMode == 'REMOTE')
				{
				
					$this->log('STATIONS CONTROLLER : WORKING IN REMOTE BACKEND MODE', LOG_DEBUG);
					
					$dbXmlString = $xml_student_info->asXML();
				
				
					#store files in DB
				
					#station status update
					$update['Xmlengine']['transaction_id'] = $tsId;
					$update['Xmlengine']['layoutFile'] = 'CICMconfig.xml';
					$update['Xmlengine']['mode'] = 'feature';
					$update['Xmlengine']['data'] = $dbXmlString;
					$this->Xmlengine->save($update);
					$xmlid = $this->Xmlengine->id;
				
				
				
					#Call function remotely to export to file system and run command.
				
				
					#$host = 'http://91.250.116.95:8080/activiti-rest/service/runtime/tasks?assignee=kermit';
					$host =  Configure :: read('xmlengine_url') . '/xmlengines/process?xmlid=' . $xmlid;
				
					$this->log('STATION CONTROLLER : CALLING BACKEND => ' .  $host, LOG_DEBUG);
				
					#exit;
				
					$process = curl_init($host);
				
					curl_setopt($process, CURLOPT_TIMEOUT, 10);
					curl_setopt($process, CURLOPT_HEADER, 0);
					$return = curl_exec($process);
					curl_close($process);
				
					$this->log('STATION CONTROLLER : CALCULATELAYOUT : GOT RESPONSE  => ' .  $return, LOG_DEBUG);

				}
				
				else{
					
					$this->log('STATION CONTROLLER : calcualteLaout : LOCAL MODE : CAlling perl script ' . $execPath , LOG_DEBUG);
						
					
					$retval = 0;
	
					#ORIG $execPath = 'sudo /usr/bin/perl ' . $base_path . '/XSLTWork/POC2/featureProcessor.pl ' . $layoutFile . ' 2>&1';
					
					$mode = 'feature';
	
						
					$execPath = 'sudo /usr/bin/perl ' . $base_path . '/XMLEngine/processor.pl ' . ' ' . $fileName . ' ' . $layoutFile . ' 2>&1';
	
					
					$output = exec($execPath, $output, $retval);
					
					$this->log('STATION CONTROLLER : calculateLAyout : SCRIPT FINISHED ' .  $output . ' retval ' . $retval, LOG_DEBUG);

				}
				
				
				
				#$this->redirect('/stations/edit/' . $station_id);
				
				#####################----------------------------#######################
				###                         CALL APPLY AUTOMATICALLY                 ###
				########################################################################
				
				#Call with timestamp used for feature calcualtion
				$this->log('STATION CONTROLLER : CALCULATELAYOUT : CALLING APPLY FUNCTION ', LOG_DEBUG);
				
				$activationResponse = $this->apply($station_id, $tsId);
				
				$this->log('STATION CONTROLLER : CALCULATELAYOUT : APPLY RETURNED ' . $activationResponse, LOG_DEBUG);
				return($activationResponse);
				
			}
			else
			{
				#This is only feature layout. 
				$xmlHeader = '<' . $mode . 'Configuration' . '></' . $mode . 'Configuration' . '>';
				$xml_student_info = new SimpleXMLElement($xmlHeader);
				
				$this->array_to_xml($stationFeatureXML,$xml_student_info);
				#This is not for featureLayout, then send back from concatenation.
				$this->log('STATION CONTROLLER : calculate Layout : FEATURE MODE : RETURNING XML ARRAY ', LOG_DEBUG);
				
				return($xml_student_info);
			}
		
		}
		else
		{
			return 1;
		}
	}
	
	
	function check_feature_type($stationKeyFeatureMap){
		#receive array of features on a single key in format
		#$array[stationkey_id][short_name] = "primary_value"
		
		#$f_array=print_r($stationKeyFeatureMap, true);
		#$this->log("Station controller : FEATURE CHECK" .  $f_array, LOG_DEBUG);
		
		if(( (array_key_exists('madn', $stationKeyFeatureMap)) || (array_key_exists('MADN', $stationKeyFeatureMap))) && array_key_exists('PILOT', $stationKeyFeatureMap))
		{
			return "DN_MADN_PILOT";
			
		}
		elseif((array_key_exists('madn', $stationKeyFeatureMap)) || (array_key_exists('MADN', $stationKeyFeatureMap)))
		{
			return "DN_MADN";
		}
		elseif((array_key_exists('HNTID', $stationKeyFeatureMap)))
		{
			return "DN_XLH";
		}
		elseif((array_key_exists('cpu', $stationKeyFeatureMap)))
		{
			return "DN_CPU";
		}
		else
		{
			return "DN_INDIVIDUAL";
		}
	}
	
	// function defination to convert array to xml
	function array_to_xml($student_info, &$xml_student_info) {
		
		
		ksort($student_info);
		$f_array=print_r($student_info, true);
		#$this->log("Station controller : CHECKING CFEATURE ARRAY" .  $f_array, LOG_DEBUG);
		foreach($student_info as $key => $value) {
			
			if(is_array($value)) {
				#The follwoing excludes the array keys that are stationkey ID's "o199999"
				if(! preg_match("/^([0-9]+)\@/", $key))
				#if(!is_numeric($key)){
				{
					if(($key == 'Feature') || ($key == 'CFeature'))
					{
						$key = 'feature';
					}
					#$this->log("Station controller : ==> ADDING CHILD" .  $key, LOG_DEBUG);
				
					$subnode = $xml_student_info->addChild("$key");
					$this->array_to_xml($value, $subnode);
				}
				else{
					$subnode = $xml_student_info;
					$this->array_to_xml($value, $subnode);
				}
			}
			else {
					#if(array_key_exists($key, array('id', 'keynumber', 'status')))
					if(in_array($key, array('id', 'key', 'zkey', 'status', 'custCTI', 'custGrp', 'custPresGrp', 'custSubGrp', 'locAcc', 'port')))
					{
						#Add as an attribute
						#Temporary hack to only add status of 99 until can be fixed???
						if(($key == 'status') && ($value != '99' && $value != '66'))
						{
						}
						else
						{
								#$this->log("Station controller : ==> ADDING ATTRBIUTE" .  $key, LOG_DEBUG);
								$xml_student_info->addAttribute("$key","$value");
						}
					}
					else
					{
						$xml_student_info->addChild("$key","$value");
					}
			}
		}
	}
	function calculateCPULen($groupId) {
		$this->log('STATIONS CONTROLLER :CALCULATE CPULEN ' . $groupId, LOG_DEBUG);
			
		#Find all LEN's for members of group.
		
		#$groupMemberStations = $this->Feature->find('all',array('fields'=>array('Stationkey.station_id','Stationkey.id', 'Feature.primary_value'),'conditions'=>array('Feature.short_name'=> array('cpu'), 'Feature.primary_value'=>$groupDetails['Group']['id'])));

		$groupMembers = $this->Group->find('all',
				array(
						'fields' => array(
								'Group.id',
								'Station.id',
								'Station.port'
						),
						'joins' => array(
								array(
										'table' => 'features',
										'type' => 'LEFT',
										'alias' => 'Feature',
										'conditions' => array('Group.id = Feature.primary_value')
								),
								array(
										'table' => 'stationkeys',
										'type' => 'LEFT',
										'alias' => 'Stationkey',
										'conditions' => array('Feature.stationkey_id = Stationkey.id')
								),
								array(
										'table' => 'stations',
										'type' => 'LEFT',
										'alias' => 'Station',
										'conditions' => array('Stationkey.station_id = Station.id')
								)
						),
						'conditions' => array('Feature.primary_value'=>$groupId, 'Feature.short_name'=> array('CPU'))
						
				)
		);
		
		
		
		
		
		foreach ($groupMembers as $groupMemberStation)
		{
			$this->log('STATIONS CONTROLLER :CPULEN ' . $groupMemberStation['Station']['id'] . ':' . $groupMemberStation['Station']['port'], LOG_DEBUG);
			
			#store in a hash with LEN and stripped LEN.
			$STATIONLENConverted = preg_replace("/[A-Za-z ]/", '', $groupMemberStation['Station']['port']);
			$lenArray[$STATIONLENConverted] = $groupMemberStation['Station']['port'];
			
		}
				
		
		#sort by stripped LEN''s
		ksort($lenArray);
		
		#return last in array
	
		#$cpuLen = $lenArray[key($lenArray)];
		$cpuLen = reset($lenArray);
		
		$this->log('STATIONS CONTROLLER :CPULEN : LOWEST LEN ' . $cpuLen, LOG_DEBUG);
			
		return $cpuLen;
	}
}
?>

