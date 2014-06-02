<?php
/**
 * file: app/model/scenario.php
 *
 * Scenario Model
 */
class Scenario extends AppModel {
    // good practice to include the name variable
    var $name = 'Scenario';
    // setup the has many relationships
    	var $hasMany = array(
        	'Execution'=>array(
            	'className'=>'Execution'
        	)
    	);
	var $belongsTo = array(
        	'Customer'=>array(
			    'className'=>'Customer'
			)
    	);

}
?>
