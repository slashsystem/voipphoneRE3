<?php 

//echo $javascript->link('/js/jquery-1.10.1.min');
echo $javascript->link('/js/jquery.fancybox');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>


<link rel="stylesheet" href="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css"/>
<script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>

<script type="text/javascript"> 
    $(document).ready(function() { //alert("ret");
        $('#dragdroptbl').tableDnD({ 
            onDragStart: function(table, row) { 
                //$(table).parent().find('.result').text('');
            }, 
            onDrop: function(table, row) { //alert("ssd");
                $('#AjaxResult').load(base_url+"groups/edit?"+$.tableDnD.serialize());
               // prettyPrint();
			  // var newPositionedAry = decodeURI($.tableDnD.serialize()); alert(newPositionedAry);
				    var tblstr = decodeURI($.tableDnD.serialize());
                    var tmparray = new Array();
                    var x = 0;
                    tmparray = tblstr.split("&dragdroptbl[]="); 
                    while (x < tmparray.length) {
                        if (tmparray[x] != "dragdroptbl[]=") { 
						   pos=x+1; 
						   pos = (pos.toString().length==1)? '0'+pos : pos;
						   original_position = tmparray[x].replace("dragdroptbl[]=", ""); 
						  //  alert(pos+"=="+original_position);
						  // alert($('#'+original_position).find($("input[name^='featureNewPosition']")).attr('id'));
						 //  alert($('#'+original_position).find($(".opencolorbox")).attr('href'));
						 $('#'+original_position).find("td:nth-child(2) input[name^='featureNewPosition']").val(pos);
						 // alert( $('#'+original_position).find("td:nth-child(2) input[name^='featureNewPosition']").val());
                          // $(apriority).val(tmparray[x]);
                        }
                        x++;
                    }
                
			   
            }
        });
	});
	function submitForm(){
		$('.filtersForm').attr('action',base_url+'groups/group_change/');
		$('.filtersForm').attr('method','POST');
		$.ajax({
				type: "POST",
				async : false,
				dataType: 'json',
				url: $('.filtersForm').attr('action'),
				data: $('.filtersForm').serialize(),
				success: function(data){ 
					// do nothing
				}
		});
	}
	function reloadme(){
		location.reload();
	}
	
	
	         function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#button').attr("class", "showhighlight_arrow");
				  jQuery('#updateGroup').removeAttr("class");
				  jQuery('#updateGroup').attr("class", "button-right-hover");

			  });
		  }

</script>
<div class="block top">
	<br>
	    <?php 
	    echo $form->create('Station',array('action'=>'editstation','id'=>'filters','class'=>'filtersForm','type'=>'GET'));
	   ?>
	    <div class="cb">
			
			<div class="block" style="margin: 0px;">
				<div class="button-right" id="updateGroup">
					<a id="button" href="javascript:submitForm()"  id="sbm" onclick="" name="submitForm" value="submitForm" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __("Submit");?></a>
				</div>
				<div class="button-right">
					  <?php echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id . '&type=single'),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);','class'=>'fancybox fancybox.ajax')); ?>
				</div>
				<div class="button-left">
					<?php echo $html->link( __("reset", true),'javascript:void(0);',array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','class'=>'reset')); ?>
                </div>
            </div>
	
	    <?php
		// check $stationFeatures variable exists and is not empty
		if(isset($groupMembers) && !empty($groupMembers)) : 
		?>
	    <div id="" class="table-content main_table_content">
		<div id="AjaxResult" style="display:none; float: right; width: 250px; border: 1px solid silver; padding: 4px; font-size: 90%">
		</div>
		<table class="phonekey stationtbl">
				<thead>
				<tr class="table-top">
				 <th class="table-column">&nbsp;&nbsp;ID&nbsp;&nbsp;</th>
				 </tr>
		</thead>
			  <?php
					// initialise a counter for striping the table
					$memberAry = array(); //echo "<pre/>"; print_r($stationFeatures); die;
					for($i=0;$i<10;$i++){ //echo "<pre/>"; print_r($stationFeatures[$i]); 
						$memberAry = $groupMembers[$i];
					//foreach($stationFeatures as $station):
						// stripes the table by adding a class to every other row
						$class = ( ($i % 2) ? " class='altrow'": '' );
						// increment count
						//$count++;
					?>
				<tr style="height:23px;">
					<td  style="width: 20px;"> <?php echo $i ?></td>
				</tr>
				<?php } //endforeach; ?>
		</table>
		<table class="phonekey stationtb2" id="dragdroptbl">
		<thead>
			<tr class="table-top">
				 
				 <th class="table-column">&nbsp;&nbsp;STATION&nbsp;&nbsp;</th>
				 <th class="table-column">&nbsp;&nbsp;KEY&nbsp;&nbsp;</th>
				 <th class="table-column">&nbsp;&nbsp;PORT&nbsp;&nbsp;</th>
				 <th class="table-column">&nbsp;&nbsp;PREV&nbsp;&nbsp;</th>
				 <th class="table-column filter-select filter-exact" data-placeholder="State">&nbsp;&nbsp;State&nbsp;&nbsp;</th>

		
			 </tr>
		</thead>
				 <tbody>
				   <?php
					// initialise a counter for striping the table
					$memberArray = array(); 	echo $form->input("newaddedFeatues", array('type'=>'hidden','value'=>'','id'=>"newaddedFeatues"));
					for($j=0;$j<10;$j++){
					  	$groupArray = $groupMembers[$j]; //$setHeight = "";
					  	#$matches = explode('@', $groupArray['station]);
					  	#$stationkey_id = $groupArray['station]
					  	#$station_id = $matches[1];
						//foreach($stationFeatures as $station):
						// stripes the table by adding a class to every other row
						$class = ( ($j % 2) ? " class='altrow'": '' );
						if(isset($memberArray) && !empty($memberArray)) {
										$sta_id = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
						}else{
										$sta_id = str_pad($sta_id+1, 2, '0', STR_PAD_LEFT);			
                                       // $setHeight  = 'height:21px';										
						}
					
					?>
					
			       <!-- <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">-->
			        <tr style="cursor:move;height:23px;" onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false); " id="<?php echo $sta_id; ?>" >
					<td>
	                		<?php 
							echo $form->input("featurename[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['short_name'])); 
	                		
	                		echo $html->link($groupArray['station'],array('controller'=>'stations', 'action'=>'editstation',$groupArray['station']));
	                		?>
					</td>
	                <td>
	                		<?php 
							//$DNID = $groupArray['Feature']['primary_value'];
							$DNID = $groupArray['Feature']['stationkey_id'];
							echo $form->input("featurevalue[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['stationkey_id'])); 
							echo $form->input("featureNewPosition[$sta_id]", array('type'=>'hidden','value'=>$sta_id)); 
	                		$matches = explode('@', $groupArray['Feature']['stationkey_id']);
	                		echo $html->link($groupArray['keynumber'],array('controller'=>'stations', 'action'=>'editstation',$groupArray['station'])); 
	                		?>
	                </td>
	                
					<td>
	                		<?php 
							echo __($groupArray['port'],true);
							
							#echo $form->input("featurepilot[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['pilot'])); 
	                		?>
					</td>	
					<td>
	                		<?php 
							echo __($groupArray['group_premember'],true);
							echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
	                		?>
					</td>
					<td>
	                		<?php 
							echo __($groupArray['status'],true);
							echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
	                		?>
					</td>
	            	<?php } //endforeach; ?>
	            	</tr>
				 </tbody>	 
		</table>
		    <div class="result"></div>
	    <?php echo $form->end(); ?>
	<?php //echo $this->element('pagination/newpaging'); ?>
	</div>
	    </div>
	   
	    <?php
		else:
			__("No Members available in DB");
			echo '</div>';
		endif;
		?>
</div>
</div>
<!--right hand side starts from here-->
<div id="related-content">
        <div class="box start link">
                <a href="http://www.swisscom.ch/grossunternehmen" target="_blank">
                <?php __('Home Swisscom') ?>
                </a>
        </div>
        <div class="box info">
        	 <h3><?php __('Group List') ?></h3>
                 <p>
                  <?php __('DN_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('groupEdit_helpText') ?></p>
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>      
			</div>		 
        </div>
        <div class="box call-to-action">
						<div class="info info-error" style="z-index: 2">
				 	<a href="" id="warningNotification">&nbsp;</a></div><h3><?php __("notifications");?></h3>
			
				 	<p><?php __("InWork Objects");?>.</p>
			<div>
			<ul>
					<?php echo $this->element('right_notifications',array('SELECT_CUSTOMER' => $SELECTED_CNN)); ?>
             </ul>	
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
</div>
