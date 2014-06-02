 <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
        <![endif]-->  
<?php 
 App::import('Model','Location');
 $this->Location=new Location();
//echo $javascript->link('/js/jquery-1.10.1.min');
echo $javascript->link('/js/jquery.fancybox');
//echo $this->element('editable');
?>

<style>
#mcTooltipWrapper {
	display:none;
}
.t_Tooltip{
	display:none !important;
}

</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
	
	
	function submenuactivity(action) {
		 var p = action;
		jQuery('input[type="checkbox"]').each(function() {
        if (action == p) {
            $('#table-menu-popup').show();
        } else {
            $('#table-menu-popup').hide();
        }
	 });
    }
	
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


	validation = {
	    // Specify the validation rules
	    'rules': {                     
	        'GroupGroupName':{
	            'required': true,
	            'max': '50'
	            //'max': '30'
	        },  
	        'GroupGroupDesc':{
	        	'required' : true,
	            'max': '50'
	        },                       
	    },                  
	    // Specify the validation error messages
	    'messages': {  
	        'GroupGroupName': {
	             'required': "<?php __('GroupNameNotempty')  ?>",
	             'max': "<?php __('max50')  ?>"
	         },  
	         'GroupGroupDesc': {
	             'required': "<?php __('GroupDescNotEmpty')?>",
	             'max': "50"
	         },    	         
	    },
	  };
	
	function submi_form(form_id)
	{	
		if (inValidate(validation)) {  	
		    return false;
		} else {	
			$('#'+form_id).submit();
		}
	} 


         function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#button').attr("class", "showhighlight_buttonleft");
				  jQuery('#updateGroup').removeAttr("class");
				  jQuery('#updateGroup').attr("class", "button-right-hover");

			  });
		  }



</script>
<div class="block top">
	<div id="overlay-error" class="notification first hide" style="width: 100%" >
	
		<div class="error">
			<div class="message">
				
			</div>
		</div>
	</div>

<?php 


if((isset($success)) && $success){?>
	
		<div class="notification first" style="width: 534px" >
		
			<div class="ok">
				<div class="message">
					<?php //echo $success;
					echo __($success);
					
					?>
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
		
	<?php }?>
	<br>
	
	
	    <?php 
		echo $form->create('Group',array('action'=>'edit/group_id:' . $groupDetails['Group']['id'],'id'=>'edit','type'=>'POST', 'invalidate' => 'invalidate'));
		$stationStatus = Configure :: read('stationStatus');
	    //echo $form->create('Station',array('action'=>'editstation','id'=>'filters','class'=>'filtersForm','type'=>'GET'));
	   ?>

             <h4><?php echo __("Group Detail") ?><a data-title="Enter Group Name" data-placement="right" data-type="text" id="group_name" href="#" class="editable editable-click" data-original-title="" title="" style="display: inline;"><?php echo trim($groupDetails['Group']['name']);?> <span style="padding-left:45px;"></span></a></h4>


	    <div class="cb">
					<div class="form-box">
			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupType', true). '</div>';
					echo	'<p>' . $groupDetails['Group']['type'] . '</p>'?>			
					
			</div>
			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupId', true). '</div>';
					echo	'<p>' . $groupDetails['Group']['identifier'] . '</p>';
					echo $form->input('identifier', array('type'=>'hidden','value'=>$groupDetails['Group']['identifier'])); 
								?>
					
			</div>
			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupName', true). '</div>';
					if($groupDetails['Group']['name']!=""){
					echo	$form->input('groupName', array('label' => false,'value'=>$groupDetails['Group']['name'],'style'=>'width:132px;','onkeyup'=>'chngbkcolor(this)','placeholder'=>'Please enter Name'));
					} else {
					echo	$form->input('groupName', array('label' => false,'value'=>'Please enter Name','style'=>'width:132px;','onkeyup'=>'chngbkcolor(this)','onfocus'=>'(this.value == "Please enter Name") && (this.value = "")','onblur'=>'(this.value == "") && (this.value = "Please enter Name")'));
					}
					
					
						?>		
					
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupDesc', true). '</div>';
					echo	$form->input('groupDesc', array('label' => false,'value'=>$groupDetails['Group']['desc'],'style'=>'width:100px;','onkeyup'=>'chngbkcolor(this)'));	?>		
					
			</div>
		</div>
			<div class="block" style="margin: 0px;">
			<?php if($groupDetails['Group']['name']!="") { ?>
				<div class="button-right" id="updateGroup">
					<a id="button" href="javascript:void(null)"  onclick="javascript:submi_form('edit');" name="submitForm" value="submitForm" onmouseover='javascript:hoverButtonRight(this);',  onmouseout="outButtonRight(this)"><?php __("save");?></a>
				</div>
				<?php } else { ?>
				<div class="button-right-hover" id="updateGroup">
					<a id="button" class="showhighlight_arrow" href="javascript:void(null)"  onclick="javascript:submi_form('edit');" name="submitForm" value="submitForm" ><?php __("save");?></a>
				</div>
				<?php } ?>
				<?php if($groupDetails['Group']['name']!="") { ?>
				<div class="button-left-hover">
					  <?php echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id .'&location_id='.$stationLocationid. '&type=single'),array('class'=>'fancybox fancybox.ajax , showhighlight_buttonright')); ?>
				</div>
				<?php }  ?>
			
				<!--<div class="button-left">
					<?php echo $html->link( __("save", true),'javascript:void(0);',array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','class'=>'reset')); ?>
                </div>-->
            </div>
	
	    <?php
		// check $stationFeatures variable exists and is not empty
		if(isset($groupMembers) && !empty($groupMembers)) :
		#if(1) :
		
		#echo "<pre>";print_r($groupMembers);
		
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
					
$LocationArray =array();
					foreach ($groupMembers as $groupMember)
					{				
						
						$matches = explode('@', $groupMember['Feature']['stationkey_id']);
						$stationkey_id = $matches[0];
						$station_id = $matches[1];

						$LocationArray[$station_id] = $station_id;
					}
					
					$NumLoop = count($LocationArray)+1;					
					
					
					
					for($i=0;$i<$NumLoop;$i++){ //echo "<pre/>"; print_r($stationFeatures[$i]); 
						$memberAry = $groupMembers[$i];
						$count=0;
					#foreach($groupMembers as $groupMember):
						// stripes the table by adding a class to every other row
						$class = ( ($i % 2) ? " class='altrow'": '' );
						// increment count
						
					?>
				<tr style="height:23px;">
					<td  style="width: 20px;"> <?php echo $i; ?></td>
				</tr>
				<?php }//$count++; endforeach; // ?>
		</table>
		<table class="phonekey stationtb2" id="dragdroptbl">
		<thead>
			<tr class="table-top">
				 
				 <th class="table-column" align="left" ><?php echo __('memberStation')?></th>
				 <th class="table-column" align="left"><?php echo __('key')?></th>
                 <th class="table-column filter-select filter-exact" data-placeholder="State" align="left"><?php echo __('memberLocation')?></th>
				 <th class="table-column filter-select filter-exact" data-placeholder="State" align="left"><?php echo __('memberState')?></th>
				 <th class="table-column" align="left"><?php //echo __('menu')?></th>
		
			 </tr>
		</thead>
				 <tbody>
				   <?php
					// initialise a counter for striping the table
					$memberArray = array(); 	echo $form->input("newaddedFeatues", array('type'=>'hidden','value'=>'','id'=>"newaddedFeatues"));
					$x = 0; $LocationArray =array();
					foreach ($groupMembers as $groupMember)
					{
						
						
						$matches = explode('@', $groupMember['Feature']['stationkey_id']);
						$stationkey_id = $matches[0];
						$station_id = $matches[1];
						if(array_key_exists($station_id, $stationMatched))
						{
							
							 $stationArray[$stationMatched[$station_id]]['keylist'] = $stationArray[$stationMatched[$station_id]]['keylist'] . ',' . $stationkey_id;
							 
							 
						}
						else
						{
							
							$stationMatched[$station_id] = $x;
							$stationArray[$stationMatched[$station_id]]['station_id'] = $station_id;
							$stationArray[$stationMatched[$station_id]]['status'] = $groupMember['Feature']['status'];
							$stationArray[$stationMatched[$station_id]]['keylist'] = $stationArray[$stationMatched[$station_id]]['keylist'] . ',' . $stationkey_id;
							$stationArray[$stationMatched[$station_id]]['location_id'] = $groupMember['Stationkey']['location_id'];
							$x++;
						}
						
						$stationArray[$station_id]['station_id'] = $station_id;
						$LocationArray[$station_id] = $station_id;
						
					}
					$countNumStation = count($LocationArray);
					$NumLoop = count($LocationArray)+1;
					for($j=0;$j<$NumLoop;$j++){
					  	$groupArray = $groupMembers[$j]; //$setHeight = "";
						#echo "<pre>";print_r($groupArray);
					    $matches = explode('@', $groupArray['Feature']['stationkey_id']);
					    //$stationkey_id = $matches[0];
					    //$station_id = $matches[1];
					    $station_id = $stationArray[$j]['station_id'];
						
					    $stationkey_id = $stationArray[$j]['keylist'];
					    $status = $stationArray[$j]['status'];
					    $station_id = $stationArray[$station_id]['station_id'];
						
												
						#echo "<pre>";print_r(count($station_id));
						
						//foreach($stationFeatures as $station):
						// stripes the table by adding a class to every other row
						$class = ( ($j % 2) ? " class='altrow'": '' );
						if(isset($memberArray) && !empty($memberArray)) {
										$sta_id = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
						}else{
										$sta_id = str_pad($sta_id+1, 2, '0', STR_PAD_LEFT);			
                                       // $setHeight  = 'height:21px';										
						}
					//}
					?>
					
			       <!-- <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">-->
			        <tr style="cursor:move;height:23px;" onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false); " id="<?php echo $sta_id; ?>" >
					<td>
						<?php 
							//$DNID = $groupArray['Feature']['primary_value'];
							$DNID = $groupArray['Feature']['stationkey_id'];
							echo $form->input("featurevalue[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['stationkey_id'])); 
							echo $form->input("featureNewPosition[$sta_id]", array('type'=>'hidden','value'=>$sta_id)); 
							echo $html->link($station_id,array('controller'=>'stations', 'action'=>'editstation',$station_id)); 
							
							#$DNID = $groupMember['Feature']['stationkey_id'];
							#echo $form->input("featurevalue[$station_id]", array('type'=>'hidden','value'=>$groupMember['Feature']['stationkey_id'])); 
							#echo $form->input("featureNewPosition[$station_id]", array('type'=>'hidden','value'=>$station_id)); 
							#echo $html->link($station_id,array('controller'=>'stations', 'action'=>'editstation',$station_id)); 
							
	                		
	                		
	                		?>
					</td>
	                <td>
	                		<?php 
							//$DNID = $groupArray['Feature']['primary_value'];
							$DNID = $groupArray['Feature']['stationkey_id'];
							echo $form->input("featurevalue[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['stationkey_id'])); 
							echo $form->input("featureNewPosition[$sta_id]", array('type'=>'hidden','value'=>$sta_id)); 
							#echo $html->link($stid,array('controller'=>'stations', 'action'=>'editstation',$station_id));
	                        echo $stid =  trim($stationkey_id,",");  		
	                		 
							
							#$DNID = $groupMember['Feature']['stationkey_id'];
							#echo $form->input("featurevalue[$station_id]", array('type'=>'hidden','value'=>$groupMember['Feature']['stationkey_id'])); 
							#echo $form->input("featureNewPosition[$station_id]", array('type'=>'hidden','value'=>$station_id)); 
							#echo $html->link($stationkey_id,array('controller'=>'stations', 'action'=>'editstation',$station_id)); 
	                		?>
	                </td>
                    <td>
	                		<?php 
							#echo __($groupArray['Feature']['Station']['status'],true);
	                		#echo __($stationStatus[$stationStates[$groupArray['Stationkey']['station_id']]],true);
							if($groupArray['Stationkey']['location_id']!="") {
							 $grouplocationName=$this->Location->getgroupLocation($stationArray[$stationMatched[$station_id]]['location_id']);
							 echo $grouplocationName['Location']['name'];
							} else if(!empty($DNID)){
								#echo "Unknown Location";
								$grouplocationName=$this->Location->getgroupLocation($stationLocation[$stationArray[$stationMatched[$station_id]]['station_id']]);
							    echo $grouplocationName['Location']['name'];
								
								 }
							#echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
	                		?>
					</td>
					<td>
	                		<?php 
							echo $stationStatus[$status];
							echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
							#$status=$groupMember['Feature']['status'];
							#echo $stationStatus[$status];
							#echo $form->input("featurestatus[$station_id]", array('type'=>'hidden','value'=>$groupMember['Feature']['status'])); 
	                		?>
					</td>
					<td class="table-right" style="background: url(<?php
        	echo $this->webroot;
			?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-right: 1px solid #D1D1D1!important;" onclick="submenuactivity(<?php echo $station_id; ?>)" onmouseout="this.className='table-right';" id="<?php
        	echo $sta_id;
			?>tdlast">
            
			<div class="table-menu">
            <div class="table-menu-popup"  style="z-index: 1">
            <ul >
			<?php if(empty($station_id))
			{ ?>
				<!--<li class="script">
				<?php
        		echo $html->link(__('No Options', true), ''
        		);
				?>
				</li>--> 
                <li class="script">
				<?php #echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id . '&type=single'),array('class'=>'fancybox fancybox.ajax')); ?>
				<?php echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id .'&location_id='.$stationLocationid. '&type=single'),array('class'=>'fancybox fancybox.ajax')); ?>
				
				</li>
				<?php 
			}
			else
			{

			 if($station_id !='') {
				?>
				
				<li class="script">
				<?php
				echo $html->link(__('StationEdit', true), array(
						'controller' => 'stations',
						'action' => 'editstation',
						$station_id
				));
				?>
				</li> 
				<?php 
				if($countNumStation==1) {										
					$confirmmsg ='If you will delete last member of this group, group will also be deleted \n Are you sure you want to delete this Group Member ?';		
				
				}
				else {
					$confirmmsg = "Are you sure you want to delete this Group Member ?";					
				}				
				?>
				
				<li class="script">
				<?php
				#echo $html->link(__('memberDelete', true), '');
				#echo $html->link(__('memberDelete', true), array(
				#		'controller' => 'stations',
				#		'action' => 'major_cfeature_change',
				#		$station_id . '&delete_feature=' . $cpuKeyFeatures[$station_id] . '-CPU&customer_id='.$SELECTED_CNN
				#),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('.$confirmmsg.');"));
				echo $html->link(__('memberDelete', true), array(
						'controller' => 'stations',
						'action' => 'minor_delete?feature_id=' . $cpuKeyFeatures[$station_id] . '-CPU&customer_id='.$SELECTED_CNN.'&spg=edit_cpu'
				),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('.$confirmmsg.');"));
				
				
				?>
				</li>	
				<?php  
			   }
			} 
			?>
            </ul>
            </div>
			</div>
		</td>
	            	<?php  }  //endforeach; ?>
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
			__("No Members available in this Group");
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
        <div class="box">
        	 <h3><?php __('groupCpuEdit') ?></h3>
                 <p>
                  <?php __('groupCpuEdit_blurb') ?>
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
                <p><?php __("customerName");?><?php echo $selected_customer; ?></p>
                <p><?php __("customerId");?><?php echo $SELECTED_CNN; ?></p>

                </div>
	<?php } ?>

		</div>
<!--right hand side  ends here-->

