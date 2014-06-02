<?php

$user_agent = $_SERVER['HTTP_USER_AGENT']; 

if (preg_match('/MSIE/i', $user_agent)) { ?>
<!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
        <![endif]--> 
<?php
#echo $javascript->link('/js/jquery.1-4-2.min');

?>
<?php

#echo $javascript->link('/js/jquery-1.10.1.min'); 
echo $javascript->link('/js/jquery.fancybox');
?>

<!--[if lt IE 9]>
	<script>
		$(function() {
		
			var el;
			
			$("select#fixed-select-no-css").each(function() {
					el = $(this);
					
					el.data("origWidth", el.outerWidth()) // IE 8 will take padding on selects
				})
			  .mouseenter(function(){
			    $(this).css("width", "auto");
			  })
			 
			  
			  .bind("blur change", function(){
			  	el = $(this);
			    el.css("width", el.data("origWidth"));
			  });
		
		});
	</script>
	<![endif]-->
	
	
	

<script type="text/javascript">

	$(document).ready(function() {
		$('.fancybox').fancybox();
		
  	}); 
  
	
</script>



<?php } else {
?>
<?php

echo $javascript->link('/js/jquery.fancybox');
?>

<script type="text/javascript">

	$(document).ready(function() {
		$('.fancybox').fancybox();
		
  	}); 
  
	
</script>
<?php } ?>
<?php #echo $javascript->link('/js/jquery.1-4-2.min'); ?>

<!--<script type="text/javascript" src="<?php echo Configure::read('base_url');?>js/jquery.ie-select-width.js"></script>
<script type="text/javascript">
$(function ($){
    // Set the width via the plugin.
    $('select#fixed-select-no-css').ieSelectWidth
    ({
        width : 100,
        containerClassName : 'select-container',
        overlayClassName : 'select-overlay'
    });
	$('select#fixed-select-no-css-func').ieSelectWidth
    ({
        width : 100,
        containerClassName : 'select-container',
        overlayClassName : 'select-overlay'
    });	
});	
</script>-->
	

	<div class="block top">
	
	<?php if((isset($success)) && $success){?>
	
		<div class="notification first" style="width: 534px" >
		
			<div class="ok">
				<div class="message">
					<?php echo $success;?>
				</div>
			</div>
		</div>
		
	<?php }elseif(isset($error) && $error){?>
		<div class="notification first" >
		
			<div class="error">
				<div class="message">
					<?php 
						#echo $error;
						
						if($error=='xml_not_respond')
							__("Xml Server is not responding");
						else
							__("There was a problem in applying the changes.");
					?>
				</div>
			</div>
		</div>
		
	<?php }
		else
		{
			echo '<br>';
		}
?>
	<span id="msg">
	</span>
	    <?php 
	    echo $form->create('Dns',array('action'=>'viewdns/customer_id:'.$custId,'id'=>'filters','type'=>'GET'));
	    echo $form->input('Location.customer_id', array('type'=>'hidden','value'=>$custId)); 
	    $paginator->options(array('url' => $this->passedArgs));
		if(($custType=='Gate') || ($custType=='Gate +')){
			 $ctype = 1;
		}
		else{
			 $ctype = 2;
		}
		$selectedLanguage = $_SESSION['Config']['language'];
		if($selectedLanguage=='de'){
		if($custType=='Phone'){
			$did = "102";$locid = "150";	$funid = "133";	$dispid = "143";
			$didtable = "130";	$locidtable = "200";	$funidtable = "155";	$dispidtable = "146"; $trunidtable = "604";	$odsidtable = "102";
			$didfield = "86";	$locidfield = "145";	$funidfield = "128";	$dispidfield = "110";$trunidfield = "60";	$odsidfield = "60";
		  }
		if($custType=='Gate'){ 
		if($onDemand==1){
		$did = "99" ;$locid = "179";	$funid = "102";	$trunid = "133";$odsid = "115";	 
		$didtable = "248";	$locidtable = "600";	$funidtable = "351";	$dispidtable = "272";$trunidtable = "223";	$odsidtable = "102";
		$didfield = "90";	$locidfield = "174";	$funidfield = "97";	$dispidfield = "71";$trunidfield = "128";	$odsidfield = "110";
		}else{
			#$did = "100" ;$locid = "177";	$funid = "139";	$trunid = "173";$odsid = "102";
			$did = "120" ;$locid = "250";	$funid = "139";	$trunid = "173";$odsid = "102";
		$didtable = "248";	$locidtable = "600";	$funidtable = "351";	$dispidtable = "272";$trunidtable = "223";	$odsidtable = "102";
		$didfield = "86";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		}
		 }
		 if($custType=='Gate +') {
		if($onDemand==1){
		 	
		$did = "99" ;$locid = "179";	$funid = "102";	$trunid = "133";$odsid = "115";	 
		$didtable = "248";	$locidtable = "600";	$funidtable = "351";	$dispidtable = "272";$trunidtable = "223";	$odsidtable = "102";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		
		}else{
			$did = "126" ;$locid = "216";	$funid = "139";	$trunid = "186";$odsid = "102";
		$didtable = "157";	$locidtable = "277";	$funidtable = "351";	$dispidtable = "272";$trunidtable = "223";	$odsidtable = "102";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		}
		}		
		if($custType == 'Hybrid') {
		if($onDemand==1){
		$did = "101";	$locid = "139";	$funid = "217";	$dispid = "107";$trunid = "107";	$odsid = "240";
		$didtable = "256";	$locidtable = "601";	$funidtable = "102";	$dispidtable = "146";$trunidtable = "604";	$odsidtable = "102";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		}else{
			$did = "80";	$locid = "131";	$funid = "102";	$dispid = "105";$trunid = "118";	$odsid = "240";
		$didtable = "256";	$locidtable = "601";	$funidtable = "329";	$dispidtable = "299";$trunidtable = "604";	$odsidtable = "102";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		}		
			
			
		
		}								
	}
		else{
		if($custType=='Phone'){$did = "99";$locid = "156";	$funid = "133";	$dispid = "143";
		$didtable = "113";	$locidtable = "191";	$funidtable = "157";	$dispidtable = "133"; $trunidtable = "604";	$odsidtable = "102";
		$didfield = "86";	$locidfield = "152";	$funidfield = "128";	$dispidfield = "110";$trunidfield = "60";	$odsidfield = "60";
		}
		if($custType=='Gate'){
		if($onDemand==1){
		 	
		 //$did = "74" ;$locid = "112";	$funid = "102";	$trunid = "132";$odsid = "102";
		 $did = "99" ;$locid = "169";	$funid = "102";	$trunid = "151";$odsid = "107";
		#$didtable = "173";	$locidtable = "400";	$funidtable = "335";	$trunidtable = "300";	$odsidtable = "408";
		$didtable = "264";	$locidtable = "606";	$funidtable = "542";	$trunidtable = "315";	$odsidtable = "88";
		$didfield = "60";	$locidfield = "105";	$funidfield = "95";	$dispidfield = "97";$trunidfield = "60";	$odsidfield = "60";
		
		}else{
			//$did = "86" ;$locid = "142";	$funid = "126";	$trunid = "173";$odsid = "102";
			 $did = "105" ;$locid = "213";	$funid = "102";	$trunid = "208";$odsid = "102";
		$didtable = "173";	$locidtable = "400";	$funidtable = "335";	$trunidtable = "300";	$odsidtable = "408";
		$didfield = "60";	$locidfield = "105";	$funidfield = "95";	$dispidfield = "97";$trunidfield = "60";	$odsidfield = "60";
		}	
			
			
		 }
		 if($custType=='Gate +') {
			if($onDemand==1){
		 	
		 //$did = "74" ;$locid = "112";	$funid = "102";	$trunid = "132";$odsid = "102";
		 $did = "99" ;$locid = "169";	$funid = "102";	$trunid = "151";$odsid = "107";
		#$didtable = "173";	$locidtable = "400";	$funidtable = "335";	$trunidtable = "300";	$odsidtable = "408";
		$didtable = "264";	$locidtable = "606";	$funidtable = "542";	$trunidtable = "315";	$odsidtable = "88";
		$didfield = "60";	$locidfield = "105";	$funidfield = "95";	$dispidfield = "97";$trunidfield = "60";	$odsidfield = "60";
		
		}else{
			 $did = "105" ;$locid = "213";	$funid = "102";	$trunid = "208";$odsid = "102";
		//$didtable = "173";	$locidtable = "400";	$funidtable = "335";	$trunidtable = "300";	$odsidtable = "408";
		$didtable = "140";	$locidtable = "313";	$funidtable = "542";	$trunidtable = "300";	$odsidtable = "88";
		$didfield = "60";	$locidfield = "105";	$funidfield = "95";	$dispidfield = "97";$trunidfield = "60";	$odsidfield = "60";
		}	
		}	
		if($custType == 'Hybrid') {
			if($onDemand==1){
		 	
		$did = "107";	$locid = "250";	$funid = "208";	$dispid = "109";$trunid = "118";	$odsid = "242";
		$didtable = "145";	$locidtable = "342";	$funidtable = "300";	$dispidtable = "282"; $trunidtable = "270";	$odsidtable = "300";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		
		}else{
			$did = "80";	$locid = "139";	$funid = "120";	$dispid = "109";$trunid = "118";	$odsid = "242";
		$didtable = "145";	$locidtable = "342";	$funidtable = "300";	$dispidtable = "282"; $trunidtable = "270";	$odsidtable = "300";
		$didfield = "60";	$locidfield = "85";	$funidfield = "85";	$dispidfield = "71";$trunidfield = "60";	$odsidfield = "60";
		}	
		}	
	}
	   ?>
   <div class="cb">
	 <div id="" class="table-content" style="width: 100%">
		<table class="table-content phonekey">
			<thead>
				<tr class="table-top">
					<!--<th class="table-column table-left-ohne" style="width:20px;">&nbsp;</th>-->
						<th  class="table-column" style="width:<?php echo $did; ?>px;text-align: left;">&nbsp;<?php __("dnId");?></th>
						<th  class="table-column" style="width:<?php echo $locid; ?>px;text-align: left;">&nbsp;<?php __("Location");?></th>
						<?php if ($ctype == 2){?>
						<th  class="table-column" style="width:<?php echo $funid; ?>px;text-align: left;">&nbsp;<?php __("Function");?></th>
						
						<th  class="table-column" style="width:<?php echo $dispid; ?>px;text-align: left;">&nbsp;<?php __("DISPLAYNAME");?></th>
						<?php }
						else 
						{?>
						<th  class="table-column" style="width:<?php echo $trunid; ?>px;text-align: left;">&nbsp;<?php __("trunk");?></th>
						<?php if($onDemand==1){ ?>
						<th  class="table-column" style="width:<?php echo $odsid; ?>px;text-align: left;">&nbsp;<?php __("ODS");?></th>
						<?php } }?>
						<?php //if ($custType == 'Gate +' || $custType == 'Hybrid'){?>
						<?php if ($custType == 'Hybrid'){?>
						<th  class="table-column" style="width:<?php echo $trunid; ?>px;text-align: left;">&nbsp;<?php __("trunk");?></th>
						<?php if($onDemand==1){ ?>
						<th  class="table-column" style="width:<?php echo $odsid; ?>px;text-align: left;">&nbsp;<?php __("ODS");?></th>
						<?php } } ?>
						<!--<th class="table-right-ohne" style="border-right: 1px solid #D1D1D1!important;">&nbsp;</th>-->
				</tr>
				<tr>
						<!--<td class="table-column table-left-ohne">&nbsp;</td>-->
						<td><?php echo $form->input('id', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:'.$didfield.'px;', 'value'=>(isset($this->params['named']['id'])?$this->params['named']['id']:(isset($this->params['url']['id'])?$this->params['url']['id']:'')))); ?></td>
						<td><?php echo $form->select('location_id', $locations,(isset($this->params['named']['location_id'])?$this->params['named']['location_id']:(isset($this->params['url']['location_id'])?$this->params['url']['location_id']:'')),array('style'=>'width:'.$locidfield.'px;','onchange'=>"javascript:submi_form('filters');",'id'=>'fixed-select-no-css')); ?></td>
						<?php if ($ctype == 2){?>
						<td><?php echo $form->select('function',$func_list,(isset($this->params['named']['function'])?$this->params['named']['function']:(isset($this->params['url']['function'])?$this->params['url']['function']:'')),array('style'=>'width:'.$funidfield.'px;','onchange'=>"javascript:submi_form('filters');",'id'=>'fixed-select-no-css-func')); ?></td>
						
						
						<td><?php echo $form->input('display', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:'.$dispidfield.'px;', 'value'=>(isset($this->params['named']['display'])?$this->params['named']['display']:(isset($this->params['url']['display'])?$this->params['url']['display']:'')))); ?></td>
						<?php }
						else 
						{?>
									
						<td><?php echo $form->select('trunk_id',$TrunkDataData,(isset($this->params['named']['trunk_id'])?$this->params['named']['trunk_id']:(isset($this->params['url']['trunk_id'])?$this->params['url']['trunk_id']:'')),array('style'=>'width:'.$trunidfield.'px;','onchange'=>"javascript:submi_form('filters');")); ?></td>
						<?php if($onDemand==1){ ?>
						<td><?php echo $form->select('odsscenario_id',$scenarioData,(isset($this->params['named']['odsscenario_id'])?$this->params['named']['odsscenario_id']:(isset($this->params['url']['odsscenario_id'])?$this->params['url']['odsscenario_id']:'')),array('style'=>'width:'.$odsidfield.'px;','onchange'=>"javascript:submi_form('filters');")); ?></td>
									
						<?php } }?>
						<?php //if ($custType == 'Gate +' || $custType == 'Hybrid'){?>
						<?php if ($custType == 'Hybrid'){?>
						<td><?php echo $form->select('trunk_id',$TrunkDataData,(isset($this->params['named']['trunk_id'])?$this->params['named']['trunk_id']:(isset($this->params['url']['trunk_id'])?$this->params['url']['trunk_id']:'')),array('style'=>'width:'.$trunidfield.'px;','onchange'=>"javascript:submi_form('filters');")); ?></td>
						<?php if($onDemand==1){ ?>
						<td><?php echo $form->select('odsscenario_id',$scenarioData,(isset($this->params['named']['odsscenario_id'])?$this->params['named']['odsscenario_id']:(isset($this->params['url']['odsscenario_id'])?$this->params['url']['odsscenario_id']:'')),array('style'=>'width:'.$odsidfield.'px;','onchange'=>"javascript:submi_form('filters');")); ?></td>
						<?php }	}	?>
						<!--<td class="table-right-ohne" style="border-right: 1px solid #D1D1D1!important;">&nbsp;</td>-->
				</tr>
			</thead>
		</table>
	 </div>
			<div class="block" style="margin: 0px;">
				<div class="button-right">
				  <?php echo $html->link( __("Export Csv", true),  array('controller'=> 'dns', 'action'=>'export'),array('onmouseover'=>'hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
				</div>
				<div class="button-right">
					<a href="javascript:void(null)"  onclick="javascript:submi_form('filters');" name="data[filter]" value="filter" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __("filter");?></a>
					<!--<div  ><button type="submit" style="width: 0px;height: 0px; "  ></button></div>-->
				</div>
				<div class="button-left">
					<?php echo $html->link( __("reset", true),  array('controller'=> 'dns', 'action'=>'viewdns', 'customer_id:'.$custId),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); ?>
                </div>
                  
            </div>
	    <?php
		// check $locations variable exists and is not empty
		if(isset($dns) && !empty($dns)) :
		?>
		<!--Showing Page <?php //echo $paginator->counter(); ?>-->  
		    <?php //echo $this->element('pagination/top'); ?>
	    <div id="" class="table-content">
		    <table class="table-content phonekey">
			<?php echo $this->element('pagination/top'); ?>
	    	<thead>
	          <tr class="table-top">
	        	<!--<th class="table-column table-left-ohne">&nbsp;</th>   -->  
				<?php
		          $url = $this->params['named']['direction'];
		   		  $url2 = $this->params['url']['url'];		   
			if($url=="" && strlen($url2)>6 ){ 
				
				 $urlfilter="dns/viewdns/page:1/customer_id:$SELECTED_CNN/sort:id/direction:desc";
			     ?>
				<th class="table-column <?php echo 'sortlink_asc';?>" style="width:<?php echo $didtable ?>px;text-align: left;"> <a id="sortlink" href="<?php echo Configure::read('base_url').$urlfilter; ?>"><?php echo __("dnId",true); ?></a></th>				
			<?php }else{ ?>
			    <th class="table-column <?php if(in_array('sort:id',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:id',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:<?php echo $didtable ?>px;text-align: left;"><?php echo $paginator->sort(__("dnId",true), 'id', $filter_options);?></th>
			<?php } ?>
				<th class="table-column <?php if(in_array('sort:location_id',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:location_id',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:<?php echo $locidtable ?>px;text-align: left;"><?php echo $paginator->sort(__("Location",true), 'location_id', $filter_options);?></th>
				
				<?php if ($ctype == 2){?>
				<th class="table-column <?php if(in_array('sort:function',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:function',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:<?php echo $funidtable ?>px;text-align: left;"><?php echo $paginator->sort(__("Function",true), 'function', $filter_options);?></th>
				
				
				<th class="table-column <?php if(in_array('sort:display',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:display',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:<?php echo $dispidtable ?>px;text-align: left;"><?php echo $paginator->sort(__("DISPLAYNAME",true), 'display', $filter_options);?></th>
				<?php }
				else 
				{?>
				<th class="table-column "style="width:<?php echo $trunidtable ?>px;text-align: left;"><?php echo __("trunk",true);?></th>
				<?php if($onDemand==1){ ?>
				<th class="table-column "style="width:<?php echo $odsidtable; ?>px;text-align: left;"><?php echo __("ODS",true);?></th>
				<?php } }?>
				<?php //if ($custType == 'Gate +' || $custType == 'Hybrid'){?>
				<?php if ($custType == 'Hybrid'){?>
				<th class="table-column "style="width:<?php echo $trunidtable ?>px;text-align: left;"><?php echo __("trunk",true);?></th>
				<?php if($onDemand==1){ ?>
				<th class="table-column "style="width:<?php echo $odsidtable; ?>px;text-align: left;"><?php echo __("ODS",true);?></th>
				<?php } }?>
				<th class="table-right-ohne" style="border-right: 1px solid #D1D1D1!important;">&nbsp;</th>
	          </tr>
	        </thead>
		<?php //echo $this->element('pagination/top'); ?>
	        <tbody>
	        	<?php
				// initialise a counter for striping the table
				$count = 0;
				// loop through and display format
				foreach($dns as $dn):
				//echo "<pre>";print_r($dn);
					// stripes the table by adding a class to every other row
					$class = ( ($count % 2) ? " class='altrow'": '' );
					// increment count
					$count++;
				?>
	            <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);" id="view_<?php echo $dn['Dns']['id']; ?>">
	             	<!--<td class="table-left">&nbsp;</td>-->
	            	
	            	<?php 
	            	$dnLink = 'DN-'. $dn['Dns']['id'];
	            		if(($dn['Dns']['function'] != '') && ($dn['Dns']['function'] != 'CFRA') && ($dn['Dns']['function'] != 'UCD') && ($dn['Dns']['function'] != 'INTERNAL') && ($dn['Dns']['function'] != 'PBX'))
	            		{
							if(($dn['Dns']['function']=="INDIVIDUAL") || ($dn['Dns']['function'] == 'MLH') || ($dn['Dns']['function'] == 'DLH') || ($dn['Dns']['function'] == 'MADN') ||  ($dn['Dns']['function']=="DNH")) {
							if($dn['Dns']['status'] == 4)
							{
								#$style_colour = 'red';
								#$dnLink = $dn['Dns']['id'];
								?>
								<td class="tooltip">
								<div>
								<div class="fl"><span style="cursor:default" >
								<?php
								 
								 echo $html->link($dn['Dns']['id'],array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_'.$dn['Dns']['function'].'&spg=viewdns'), array('class' => 'fancybox fancybox.ajax'));
								 ?></span>
								<p><?php echo __('In Work DN'); ?></p>
								</div>
								</div>
							</td>
							<?php }
							else
							{?>
						<td class="tooltip">
					       <div>
								<div class="fl">
								<span style="cursor:default" >
								 <?php #echo $html->link($dn['Dns']['id'],array('controller'=>'stations', 'action'=>'editstation', $dnLink),array('style'=>'color:' .$style_colour));
								  echo $html->link($dn['Dns']['id'],array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_'.$dn['Dns']['function'].'&spg=viewdns'), array('class' => 'fancybox fancybox.ajax'));	?>
								</span>
									<p><?php echo __('dnId_tooltip'); ?></p>
								</div>
							</div>
						</td>
							<?php }					
	            			} else {							
							
	            			?>
							<td><?php echo $dn['Dns']['id']; ?></td>
							<?php } ?>
							<td class="table-right-ohne table-content column-width-100 wid-217px tooltip" style="width:125px;">                		
							  <div>
								<div class="fl"><span style="cursor:default" ><?php 
	                		 		#echo $html->link($dn['Location']['scm_name'],array('controller'=>'locations', 'action'=>'edit', $dn['Location']['id']));
									if($info1==0){ echo $html->link(__($dn['Location']['name'], true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id']));} 
							 		else { echo	__($dn['Location']['name'], true);}						
	                				?></span>
									<p><?php echo __('dnLocation_tooltip'); ?></p>
								</div>
							  </div>
							</td>
	                		<td class="table-right-ohne table-content column-width-100 wid-217px tooltip" style="width:125px;">
							<div>
							  <div class="fl">
							   <span style="cursor:default" >
								<?php 
								if($dn['Dns']['function']=="INDIVIDUAL")
								  {echo $html->link(__($dn['Dns']['function'], true),array('controller'=>'stations', 'action'=>'editstation', $dnLink),array('style'=>'color:' .$style_colour));}
								if(($dn['Dns']['function'] == 'MLH') || ($dn['Dns']['function'] == 'DLH') || ($dn['Dns']['function'] == 'MADN')|| ($dn['Dns']['function'] == 'UCD'))
								  {echo $html->link(__($dn['Dns']['function'], true),  array('controller'=> 'groups', 'action'=>'edit', 'group_id:'.$dn['Dns']['id']));}
								if(($dn['Dns']['function'] == 'PBX') || ($dn['Dns']['function'] == 'CFRA') || ($dn['Dns']['function'] == 'free'))
								  {echo __($dn['Dns']['function'], true);
								   #echo $html->link(__($dn['Dns']['function'], true),array('controller'=>'stations', 'action'=>'editstation', $dnLink)); 
								  }
	                		    ?>
							   </span>
							  <p><?php echo __('dnFunction_tooltip'); ?></p>
							  </div>
							</div>
	                		</td>
							<?php if ($custType == 'Phone'){?>
	                		<td>
								 <?php 
								 echo $dn['Dns']['display'];
								  
								#echo $html->link($dn['Dns']['display'],array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax'));
							?>
	                		</td>
	                		<?php }
							else 
							{?>
							<td class="table-right-ohne wid-217px tooltip">
	                		  <?php 
	                		  
	                		  $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);
																
									foreach($AllTrunksForThisDns as $trunk_id){
										#$trunk_id = $trunk['trunk_id'];
										$Trunkname = $TrunkDataData[$trunk_id];
								?>	
										<div>
	<div class="fl"><span style="cursor:default" ><?php echo '<li style="list-style:none;">' . $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id)) . '</li>'; ?></span>
		<p><?php echo __('dnTrunk_tooltip'); ?></p>
	</div>
</div>
								<?php		
									}
								?>
	                		</td>
	                		
	            
	                		<?php }?>
							<?php if ($custType == 'Gate +' || $custType == 'Hybrid'){?>
	                		    <td class="table-right-ohne wid-217px tooltip">
	                		  <?php 	                		  
	                		  $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);																
									foreach($AllTrunksForThisDns as $trunk_id){										
										$Trunkname = $TrunkDataData[$trunk_id];
								?>	
						<div>
						  <div class="fl"><span style="cursor:default" ><?php echo '<li style="list-style:none;">' . $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id)) . '</li>'; ?></span>
							<?php if(!empty($Trunkname)){ ?>
							<p><?php echo __('dnTrunk_tooltip'); ?></p>
							<?php } ?>
						  </div>
						</div>								
								<?php
									}
								?>
	                		</td>
	                		    <td class="table-right-ohne wid-217px tooltip">
	                		  <?php 
	                		  $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
	
									?>
																
									<div id="scenario_tip<?php echo $DnsId;?>">
											<?php
												foreach($AllScenariosForThisDns As $scenarioId)
												{				
												
													$linkName = $scenarioData[$scenarioId];
													?>
													
													<div>
	                                               	  <div class="fl"><span style="cursor:default" ><?php echo "<li style='list-style:none;'>". $html->link($linkName,array('controller'=>'scenarios', 'action'=>'edit/scenario_id:'.$scenarioId, $scenarioId)); 
												  		   echo "</li>";?></span>
														   <?php if(!empty($linkName)){ ?>
		                                               <p><?php echo __('dnOds_tooltip'); ?></p>
													   <?php } ?>
	                                                	 </div>
                                                	</div> 
													<?php											  
												}							 									
										?>
									</div>

	                		</td>
					
	                		<?php } ?>
	                		<td class="table-right-ohne" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px; border-right: 1px solid #D1D1D1!important;"   onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';">
                    			<div class="table-menu">
                    			<div class="table-menu-popup" style="z-index: 1">
                    				<ul>
                    				
                    			<?php if($dn['Dns']['function'] == 'INDIVIDUAL'){ ?>
										<li class="last log">
										<?php echo $html->link(__('Station Edit', true),  array('controller'=> 'stations', 'action'=>'editstation', $dnLink));?>
										</li>
										<?php if($info1==0){ ?>
										<li class="last log">
										<?php echo $html->link(__('Location Edit', true),  array('controller'=> 'locations', 'action'=>'edit', $dn['Location']['id']));?>
										</li>
										<li class="last log">
										<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id'])); ?>
										</li>
										<?php } ?>
											<?php if($dn['Dns']['display']!="") 
											{ ?>
												<li class="last log">
												<?php	echo $html->link(__('DN Edit', true), array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax')); ?>
												</li>
											  <?php 
											} ?>
											
									<?php 
                    			 } ?>
									<?php if(($dn['Dns']['function'] == 'MLH') || ($dn['Dns']['function'] == 'DLH') || ($dn['Dns']['function'] == 'MADN')) { ?>
									<li class="last log">
									<?php echo $html->link(__('Group Edit', true),  array('controller'=> 'groups', 'action'=>'edit', 'group_id:'.$dn['Dns']['id']));?>
									</li>
									<li class="last log">
									<?php echo $html->link(__('Station Edit', true),  array('controller'=> 'stations', 'action'=>'editstation', $dnLink));?>
									</li>
									<?php if($info1==0){ ?>
									<li class="last log">
									<?php echo $html->link(__('Location Edit', true),  array('controller'=> 'locations', 'action'=>'edit', $dn['Location']['id']));?>
									</li>
									<li class="last log">
										<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id'])); ?>
									</li>
									<?php } ?>
									<?php if($dn['Dns']['display']!="") { ?>
										<li class="last log">
										<?php	echo $html->link(__('DN Edit', true), array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax')); ?>
									</li>
									<?php } ?>
									<?php } ?>
									<?php if($dn['Dns']['function'] == 'PBX') { ?>
									<li class="last log">
									<?php echo $html->link(__('Location Edit', true),  array('controller'=> 'locations', 'action'=>'edit', $dn['Location']['id']));?>
									</li>
									<?php if($info1==0){ ?>
									<li class="last log">
										<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id'])); ?>
									</li>
									<?php } ?>
									<?php if($dn['Dns']['display']!="") { ?>
										<li class="last log">
										<?php	echo $html->link(__('DN Edit', true), array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax')); ?>
									</li>
									<?php } ?>
									
									
									<?php } ?>
									<?php if($dn['Dns']['function'] == 'madn') { ?>
									<?php if($info1){ ?>
									<li class="last log">
									<?php echo $html->link(__('Location Edit', true),  array('controller'=> 'locations', 'action'=>'edit', $dn['Location']['id']));?>
									</li>
									<li class="last log">
										<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id'])); ?>
									</li>
									<?php } ?>
									
									
									<?php if($dn['Dns']['display']!="") { ?>
										<li class="last log">
										<?php	echo $html->link(__('DN Edit', true), array('controller'=>'features', 'action'=>'edit/dn_id:'. $dn['Dns']['id'] . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax')); ?>
									</li>
									<?php } ?>
									
									
									<?php } ?>
								
                    				</ul>
                    			</div>
             					</div>
							</td>
			
	            		
	            			<?php
	            		}
	            		else
	            		{ 
						?>
	            			<td >
	            			<?php echo  $dn['Dns']['id'];?>
							
							
	            			
	            			</td>
							<td class="table-content column-width-100 wid-217px tooltip" style="width:125px;">
	                		
							 
							 <div>
								<div class="fl"><span style="cursor:default" ><?php 	
								if($info1==0){
													
							 echo $html->link(__($dn['Location']['name'], true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id']));	
							}else{
							echo __($dn['Location']['name'], true);	
							}
							 ?></span>
								<p><?php echo __('dnLocation_tooltip'); ?></p>
								</div>
							</div>
							 
							</td>
	                		<?php
							
							 if ($ctype == 2){?>
	                		<td><?php 
	                			if($dn['Dns']['function'] == '')
								{
									echo __('free', true);
								}
								else 
								{
									echo __($dn['Dns']['function'], true);
	                			}
	                			?>
	                			</td>
	                		
	                		<td><?php  if($dn['Dns']['display']=='10261'){ echo ""; } else { echo $dn['Dns']['display']; } ?></td>
	                		<?php }
							else 
							{?>
							<td>
	                		  <?php 
	                		  
	                		  $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);
								#echo $dn['Dns']['display']; 
								#echo $html->link($dn['Dns']['trunk'],array('controller'=>'stations', 'action'=>'editstation', $dnLink));
								
									foreach($AllTrunksForThisDns as $trunk_id){
										#$trunk_id = $trunk['trunk_id'];
										$Trunkname = $TrunkDataData[$trunk_id];								
										#echo '<li style="list-style:none;">' . $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id)) . '</li>';
								
									 echo "<li style='list-style:none;' class='sublist-align wid-217px tooltip'>";?><div>
	                                            <div class="fl"><span style="cursor:default" ><?php echo $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id));  
												?></span>
												<?php if(!empty($Trunkname)){ ?>
												<p><?php echo __('dnTrunk_tooltip'); ?></p>
												<?php } ?>
												 </div>
                                                </div> 
												<?php
												 echo "</li>";?>
												<?php
									}
								
								?>
	                		</td>
							<?php if($onDemand==1){ ?>
							<td >
							<?php
							  $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
	                		 
								
								#$AllScenariosForThisDns=$scenarioMap[$dn['Dns']['id']];
								
								 //print_r($AllScenariosForThisDns);
									?>
									<div id="scenario_tip<?php echo $DnsId;?>">
											<?php
												foreach($AllScenariosForThisDns As $scenarioId)
												{				
												
													$linkName = $scenarioData[$scenarioId];
												   # echo "<li style='list-style:none;'>". $html->link($linkName,array('controller'=>'scenarios', 'action'=>'edit/scenario_id:'.$scenarioId, $scenarioId)); 
												    # echo "</li>";
													 
												?>
												<?php echo "<li style='list-style:none;' class='sublist-align wid-217px tooltip'>";?><div>
	                                            <div class="fl"><span style="cursor:default" ><?php echo $html->link($linkName,array('controller'=>'scenarios', 'action'=>'edit/scenario_id:'.$scenarioId, $scenarioId));  
												?></span>
												<p><?php echo __('dnOds_tooltip'); ?></p>
												 </div>
                                                </div> 
												<?php
												 echo "</li>";?>
													 
												<?php	 
												}
											#echo $html->link( __('TEST', true),array('controller'=>'scenarios','action' => 'edit/scenario_id:'.$scenarioId));
																			 									
										?>
										
										
									</div>
															
								</td>
							
							<?php }} ?>
							
							
							<?php //if ($custType == 'Gate +' || $custType == 'Hybrid'){ ?>
							<?php if ($custType == 'Hybrid'){ ?>
	                		    <td class="wid-217px tooltip">
	                		  <?php 
	                		  
	                		  $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);
								#echo $dn['Dns']['display']; 
								#echo $html->link($dn['Dns']['trunk'],array('controller'=>'stations', 'action'=>'editstation', $dnLink));
										foreach($AllTrunksForThisDns as $trunk_id){
										#$trunk_id = $trunk['trunk_id'];
										$Trunkname = $TrunkDataData[$trunk_id];
								?>
									
							<div>
	<div class="fl"><span style="cursor:default" ><?php echo '<li style="list-style:none;">' . $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id)) . '</li>'; ?></span>
	<?php if(!empty($Trunkname)){ ?>
		<p><?php echo __('dnTrunk_tooltip'); ?></p>
		<?php } ?>
	</div>
</div>										
								<?php								
									}
																
								?>
	                		</td>
							<?php if($onDemand==1){ ?>
	                		    <td class="wid-217px tooltip">
	                		  <?php 
	                		  $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
	
									?>
									<div id="scenario_tip<?php echo $DnsId;?>">
											<?php
												foreach($AllScenariosForThisDns As $scenarioId)
												{				
													$linkName = $scenarioData[$scenarioId];
													?>
													<div>
	                                               	  <div class="fl"><span style="cursor:default" ><?php echo "<li style='list-style:none;'>". $html->link($linkName,array('controller'=>'scenarios', 'action'=>'edit/scenario_id:'.$scenarioId, $scenarioId)); 
												  		   echo "</li>";?></span>
														   <?php if(!empty($linkName)){ ?>
		                                               <p><?php echo __('dnOds_tooltip'); ?></p>
													   <?php } ?>
	                                                	 </div>
                                                	</div> 
													<?php											  
												 }							 									
										?>
									</div>
	                		</td>
	                		<?php } } ?>
		    				<td class="table-right-ohne" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px; border-right: 1px solid #D1D1D1!important;"   onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';">
                    			<div class="table-menu">
                    			<div class="table-menu-popup" style="z-index: 1">
                    				<ul>
									<li class="inactive">
									<?php 
									#??? echo $html->link(__('Create Station From DN', true),  array('controller'=> 'stations', 'action'=>'create', 'station_id:'.$dn['Dns']['id'] . '&' . 'customer_id=' . $custId));
									#echo $html->link(__('Create Station From DN', true),  '');?>
									</li>
									<?php if($info1==0){ ?>
									<li class="last log">
									<?php echo $html->link(__('Location Edit', true),  array('controller'=> 'locations', 'action'=>'edit', $dn['Location']['id']));?>
									</li>
									<li class="last log">
									<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CNN . '/dns_id:' . $dn['Dns']['id'] . '/location_id:' . $dn['Location']['id'] . '/loc_id:' . $dn['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => 'loc'.$dn['Dns']['id'])); ?>
									</li>
									<?php } ?>
									<?php if(!empty($Trunkname)){ ?>
									<li class="last log">
									<?php
									echo $html->link(__('Trunk edit', true),array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id));
									 ?>
									</li>
									<?php } ?>
									<?php 
	                		         $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
										?>
										<?php
												foreach($AllScenariosForThisDns As $scenarioId)
												{				
													$linkName = $scenarioData[$scenarioId];
													
													if(!empty($linkName)){
													?>											
													<li class="last log">
										<?php echo	$html->link(__('Scenario Edit',true),array('controller'=>'scenarios', 'action'=>'edit/scenario_id:'.$scenarioId, $scenarioId)); ?>
									</li>		
									<?php											  
										} }							 									
										?>
                    				</ul>
                    			</div>
             					</div>
							</td>
	            			<?php 
	            		}
	            		endforeach; ?>
	            	</tr>
	        		</tbody>

	    </table>
	    <?php echo $form->end(); ?>
	<?php echo $this->element('pagination/bottom'); ?>
	</div>
	    </div>
	   
	    <?php
		else:
			__("No Dns available in DB");
			echo '</div>';
		endif;
		?>
	 
                <div class="button-left">
                	<?php if($userpermission==Configure::read('access_id'))
                	{
						#echo $html->link(__('Back', true),  array('controller'=> 'customers', 'action'=>'index'),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); 
                       	#echo $html->link('back',  array('controller'=> 'stations', 'action'=>'edit', $station_number));
                	}
                	?>
                </div>
	</div>
</div>
<!--right hand side starts from here-->
<div id="related-content">
        <div class="box start link">
               	<a href="http://www.swisscom.ch/<?php __('corporatebusiness') ?>" target="_blank">
		    	<?php __('Home Swisscom') ?>
                </a>
        </div>
        <div class="box">
        	   <h3><?php __('DN List') ?></h3>
        	   <p><?php __('DNList_blurb') ?></p>
        	<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('dnList_helpText') ?></p>
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>      
			</div>
        </div>
     	

<!--INTERNAL USER OPTIONS -->
        <?php if($userpermission==Configure::read('access_id'))
        {?>
                <div class="box info">
                <h3><?php __("Internal User");?></h3>
                <p><?php __("Customer View:");?><?php echo $SELECTED_CNN; ?></p>
                <p><?php echo $selected_customer; ?></p>

                </div>
	<?php } ?>

</div>
<!--ight hand side  ends here-->

