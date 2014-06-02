<?php 

	/**	
		* Odsentries Controller class	
		* @date 05-Oct-2013	
		* @Purpose:	
		* @filesource	
		* @author  Divya Manocha
		* @revision	
		* @version 1.3.12	
	**/
App::import('Sanitize');
class OdsentriesController extends AppController {
	var $name       	=  "Odsentries";	   
	/**	
	* Specifies helpers classes used in the view pages	
	* @access public    
	*/    
	var $helpers    	=  array('Html', 'Form', 'Javascript', 'Session');
    /**	
	* Specifies components classes used	
	* @access public    
	*/
    var $components 	=  array('RequestHandler');   
	var $paginate		=  array('Paginate' => 15, 'page' => 1);
	var $uses       	=  array('Odsentry'); // For Default Model
	
	/**    
		* @Date: 05-Oct-2013	
		* @Method : index   
		* @Purpose: This function is the default function of the controller    
		* @Param: none    
		* @Return: none     
	**/
	
	function beforeFilter (){ 
		$this->log("Odsentries controller : Start of before_filter", LOG_DEBUG);
		$this->Session->write('sel_customer','');
		parent::beforeFilter();
		
		if(!$this->Session->read('SELECTED_CUSTOMER')){ 
			$this->layout='ajax';
			$this->cakeError('sessionExpired'); 
		}
		
	}
	
    /**    
		* @Date: 05-Oct-2013	
		* @Method : index   
		* @Purpose: This function is the default function of the controller    
		* @Param: none    
		* @Return: none     
	**/
	function index() {
		$this->layout=false;
	
		$scenario_id=isset($this->params['url']['scenario_id'])?$this->params['url']['scenario_id']:(isset($this->params['named']['scenario_id'])?$this->params['named']['scenario_id']:"");
		 
	    	if($this->RequestHandler->isAjax()==true){ 
				//echo "<pre>";  print_r($this->params); die;
				if(isset($this->params['form']['selectdnsCheckbox'])){
					$checkedfilter = $this->params['form']['selectdnsCheckbox']; $datatosave = array(); //echo "<pre/>"; print_r($checkedfilter); die;
					foreach($checkedfilter as $key=>$val){
						$datatosave = array();
						$datatosave['scenario_id'] = $scenario_id;
						$datatosave['source'] = $val;
						$datatosave['state'] = '1';
						$res = $this->Odsentry->save($datatosave);
						$this->Odsentry->id = null;
					}
					 if(isset($res['Odsentry'])){
							$_POST['message'] = "Success";
					}else{
							$_POST['message'] = "Error";
					}
					//exit(json_encode($_POST));
					
					//echo print_r($_POST);
					
									
					
					
				}elseif(isset($this->params['pass'][0]) && ($this->params['pass'][0]=="update")){
					$updateAry = array();
					$updateAry = array_filter($this->params['form']);
					foreach($updateAry as $k=>$v){
						//$resUpdate = $this->Odsentry->update(array('destd'=>$v), array('source'=>Sanitize::escape($k)));
					 $this->Odsentry->unbindModel(
						array('belongsTo' => array('Scenario'))
					);	
				//	$this->Odsentry->unBindModel(array(belongsTo => array('Scenario')));
					$resupdate =	$this->Odsentry->updateAll(
							array('Odsentry.dest' => "'".$v."'"),
							array('Odsentry.source' => Sanitize::escape($k))
						);
					   $affectedRows += $this->Odsentry->getAffectedRows();
					}
						$_POST['message']='updated';
						$_POST['affectedRows']=$affectedRows;
						exit(json_encode($_POST));
					
					//echo "Updated"; die;
					//foreach
				
				
				}elseif(isset($this->params['pass'])){
										
				   $record_id = $this->params['pass'][0]; 
				   $scenario_id = $this->params['pass'][1]; 
					$result = $this->Odsentry->deleteAll(array('Odsentry.source'=>$record_id)); 
					if($result){ 
					echo "success"; die;
					
					}
				}
			}
			echo "data inserted successfully!";
	  exit;
	}
	
	function delete() {
		if(isset($this->params['pass'])){
										
				   $record_id = $this->params['pass'][0]; 
				   $scenario_id = $this->params['pass'][1]; 
					$result = $this->Odsentry->deleteAll(array('Odsentry.source'=>$record_id)); 
					if($result){ 
					//echo "success"; die;
					$this->paginate['Paginate']	=	$this->AutoPaginate->setPaginate();
		            $this->paginate= array('conditions'=>array('scenario_id'=>$scenario_id),'limit' => $this->paginate['limit'], 'order' => array("dest"=>'ASC'));
		            $Odsentries = $this->Odsentry->find('all', array('conditions'=>array('scenario_id'=>$scenario_id), 'order' => array("dest"=>'ASC')));
		            $this->set('odsEntryList', $Odsentries);
					
					}
				}
		
	}
	
}
	
	
	
