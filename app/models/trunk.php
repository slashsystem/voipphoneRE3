<?php
class Trunk extends AppModel {
	var $name = 'Trunk';
    var $actsAs = 'Containable';	

	var $belongsTo = array(
        	'Location'=>array(
			    'className'=>'Location'
			)
    	);
	
}
?>
