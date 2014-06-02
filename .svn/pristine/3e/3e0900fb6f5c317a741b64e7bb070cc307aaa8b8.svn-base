<?php

#-----------------------------------------------------------------#
# $Rev:: 23            $:  Revision of last commit                #
#-----------------------------------------------------------------#

/**
 * Feature class
 *
 * @uses          AppModel
 * @package       mi-base
 * @subpackage    mi-base.app.models
 */
class Feature extends AppModel {
/**
 * name property
 *
 * @var string 'Station'
 * @access public
 */
	var $name = 'Feature';


	// var $validate = array(		
 // 		'primary_value' => array(
 // 			'notempty' => array(
 //                'rule' => 'notempty',              
 //                'message' => 'true',
 //                'last' => true
 //            ),
 // 		),		
 // 	);

/**
 * belongsTo property
 *
 * @var array
 * @access public
 */
	var $belongsTo = array('Stationkeys.Stationkey');
	
	function getStationkeyId($VAR){
		
		$sql	=	"SELECT `Stationkey`.`id` FROM `stationkeys` AS `Stationkey` LEFT JOIN `features` as `Feature` ON (`Feature`.`stationkey_id` = `Stationkey`.`id`) WHERE `Feature`.`short_name` = 'BLF' AND  `Feature`.`primary_value` = '$VAR' ";
		return $this->query($sql);
	}
	function returnObservers($VAR){
		
		$sql	=	"SELECT `Stationkey`.`id`,`Stationkey`.`keynumber`,`Stationkey`.`station_id`,`Feature`.`primary_value`,`Feature`.`label` FROM `stationkeys` AS `Stationkey` LEFT JOIN `features` as `Feature` ON (`Feature`.`stationkey_id` = `Stationkey`.`id`) WHERE `Feature`.`short_name` = 'BLF' AND  `Feature`.`primary_value` IN ( $VAR)";
		return $this->query($sql);
	}
	function getStationkeyIdCount($VAR){
		
		$sql	=	"SELECT COUNT(`Stationkey`.`id`) as count FROM `stationkeys` AS `Stationkey` LEFT JOIN `features` as `Feature` ON (`Feature`.`stationkey_id` = `Stationkey`.`id`) WHERE `Feature`.`short_name` = 'BLF' AND  `Feature`.`primary_value` = '$VAR' ";
		return $this->query($sql);
	}
	 function stationIdList($VAR){
		
		$sql	=	"SELECT `Stationkey`.`id`,`Feature`.`primary_value` FROM `stationkeys` AS `Stationkey` LEFT JOIN `features` as `Feature` ON (`Feature`.`stationkey_id` = `Stationkey`.`id`) WHERE `Feature`.`short_name` = 'BLF'  AND  `Feature`.`primary_value` IN ($VAR)";
		return $this->query($sql);
	}
}
?>
