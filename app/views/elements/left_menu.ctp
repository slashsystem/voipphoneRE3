<?php
$this->log('LEFTMENU ELEMENT :' . $SELECT_CUSTOMER . ' ' . $APP . ' ' . $PAGE_TITLE, LOG_DEBUG);
$selected = array('Customer List' => 'normal eservice',
		  'Station' => 'normal eservice',
		  'DN' => 'normal eservice',
		  'Group' => 'normal eservice',
		  'Location' => 'normal eservice',
		  'Reports' => 'normal eservice',
		  'Logs' => 'normal eservice',
		  'Scenario' => 'normal eservice',
		  'Mediatrix' => 'normal eservice',
		  'Trunk' => 'normal eservice',

);


preg_match("/^([\w]+) ([\w]+)/", $PAGE_TITLE, $matches);
if ($matches[0]) {
	$menuDomain = $matches[0];
	$selected[$matches[1]] = 'normal eservice selected';
}
#else {
#	$selected['Group'] = 'normal eservice selected';
	#$selected[$PAGE_TITLE] = 'normal eservice selected';
#}
#
if($userpermission==Configure::read('access_id'))
{
	echo '<li>';
	echo $html->link(__('Customers', true), array('controller'=>'customers', 'action'=>'index'), array('class'=> $selected['Customer List']));
	echo '</li>';
}

if($APP == 'Phone')
{
	if($userpermission==Configure::read('access_id'))
	{
		echo '<li>';
		echo $html->link(__('Reports', true), array('controller'=>'customers', 'action'=>'reports'), array('class'=> $selected['Reports']));
		echo '</li>';
		echo '<li>';
		echo $html->link(__('Change Log', true), array('controller'=>'logs', 'action'=>'viewlog', "customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Logs']));
		echo '</li>';
		
		
	}
	if(isset($SELECT_CUSTOMER))
	{
	
			#Call Customer Summary
			$counts = $this->requestAction('customers/updatedcounts/' . $SELECT_CUSTOMER);
			
			#Check the number of records.
			#and set the flag here for visibility
			
		 	#echo '<li>';
			#echo $html->link(__('Stations', true), array('controller'=>'stations', 'action'=>'index',$SELECT_CUSTOMER), array('class'=> $selected['Station']));
		 	#echo '</li>';
		 	if($counts['Stations'][$SELECT_CUSTOMER] > 0){
		 		#	if(1 > 0){
		 		echo '<li>';
		 		echo $html->link(__('Stations', true), array('controller'=>'stations', 'action'=>'index',$SELECT_CUSTOMER), array('class'=> $selected['Station']));
		 		echo '</li>';
		 	}
		 	if( $PAGE_TITLE == 'Station Edit') {
		 		echo '<li style="padding-left:14px">';
		 		echo $html->link(__('Station Edit', true), '', array('class'=>'normal eservice selected')); 
		 		echo '</li>';
		 	} 
		 	echo '<li>';
			echo $html->link(__('DN List', true), array('controller'=>'dns', 'action'=>'viewdns',"customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['DN']));
		 	echo '</li>';
		 	if( $PAGE_TITLE == 'DN Edit') {
		 		echo '<li style="padding-left:14px">';
		 		echo $html->link(__('DN Edit', true), '', array('class'=>'normal eservice selected'));
		 		echo '</li>';
		 	}
			
			if($counts['Groups'][$SELECT_CUSTOMER] > 0){
			#	if(1 > 0){
				echo '<li>';
				echo $html->link(__('Group List', true), array('controller'=>'groups', 'action'=>'index',"customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Group']));
				echo '</li>';
			}
			if( $PAGE_TITLE == 'Group Edit') {
				echo '<li style="padding-left:14px">';
				echo $html->link(__('Group Edit', true), '', array('class'=>'normal eservice selected'));
				echo '</li>';
			}
		 	
			echo '<li>';
			echo $html->link(__('Location List', true), array('controller'=>'locations', 'action'=>'index',$SELECT_CUSTOMER), array('class'=> $selected['Location']));
		 	echo '</li>';
		 	if( $PAGE_TITLE == 'Location Edit') {
		 		echo '<li style="padding-left:14px">';
		 		echo $html->link(__('Location Edit', true), '', array('class'=>'normal eservice selected'));
		 		echo '</li>';
		 	}
		 	if($counts['ODS'][$SELECT_CUSTOMER] > 0){
		 		echo '<li>';
				echo $html->link(__('Scenarios', true), array('controller'=>'scenarios', 'action'=>'index', "customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Scenario']));
				echo '</li>';
			}
			if( $PAGE_TITLE == 'Scenario Edit') {
				echo '<li style="padding-left:14px">';
				echo $html->link(__('Scenario Edit', true), '', array('class'=>'normal eservice selected'));
				echo '</li>';

			}
			if( $PAGE_TITLE == 'Scenario Operate') {

				echo '<li style="padding-left:14px">';
				echo $html->link(__('Scenario Operate', true), '', array('class'=>'normal eservice selected'));
				echo '</li>';
			}
			if($counts['Mediatrix'][$SELECT_CUSTOMER] > 0){
				echo '<li>';
				echo $html->link(__('Mediatrix', true), array('controller'=>'mediatrixes', 'action'=>'index', "customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Mediatrix']));
				echo '</li>';
			}
			if( $PAGE_TITLE == 'Mediatrix Edit') {
				echo '<li style="padding-left:14px">';
				echo $html->link(__('Mediatrix Edit', true), '', array('class'=>'normal eservice selected'));
				echo '</li>';
			}
			if($counts['Trunks'][$SELECT_CUSTOMER] > 0){
				echo '<li>';
				echo $html->link(__('Trunk', true), array('controller'=>'trunks', 'action'=>'index/'.$SELECT_CUSTOMER), array('class'=> $selected['Trunk']));
				echo '</li>';
			}
			if( $PAGE_TITLE == 'Trunk Edit') {
				echo '<li style="padding-left:14px">';
				echo $html->link(__('Trunk Edit', true), '', array('class'=>'normal eservice selected'));
				echo '</li>';
			}
			
			
	}
}
if($APP == 'Gate')
{
	echo '<li>';
	echo $html->link(__('Change Log', true), array('controller'=>'logs', 'action'=>'viewlog', "customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Logs']));
	echo '</li>';
	if(isset($SELECT_CUSTOMER))
	{
		echo '<li>';
		echo $html->link(__('Scenarios', true), array('controller'=>'scenarios', 'action'=>'index', "customer_id:$SELECT_CUSTOMER"), array('class'=> $selected['Scenario List']));
		echo '</li>';
	}
}
?>
