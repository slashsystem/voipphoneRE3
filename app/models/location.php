<?php
/**
 * file: app/model/location.php
 *
 * Location Model
 */
class Location extends AppModel {
    // good practice to include the name variable
    var $name = 'Location';
    var $actsAs = 'Containable';
    // setup the has many relationships
    	var $hasMany = array(
        	'Stationkey'=>array(
            	'className'=>'Stationkey'
        	),
    		'Mediatrix'=>array(
    					'className'=>'Mediatrix'
    		),
			'Dns'=>array(
				'className'=>'Dns'
			)
    	);
	var $belongsTo = array(
        	'Customer'=>array(
			    'className'=>'Customer'
			)
    	);
		
	function getgroupLocation($key)
	{
		
		$record = $this->find('first', array('fields' => array('Location.name'),'conditions' => array('Location.id' =>$key), 'recursive' => -1));
		return  $record;			
	}	


}
?>
