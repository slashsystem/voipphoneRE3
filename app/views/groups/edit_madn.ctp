<!--<link rel="stylesheet" href="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css"/>
<script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>-->

<?php 
 App::import('Model','Location');
 $this->Location=new Location(); 
 #echo "<pre>";print_r($groupMembers); 
 #App::import('Model','Station');
 # $this->Station=new Station(); 
 //echo $javascript->link('/js/jquery-1.10.1.min');
echo $this->element('editable');
?>
<style>
.tooltip p {
    background: url("../images/assets/bg-actionbox.gif") repeat-x scroll 0 0 #E6E6E6;
    border: 1px solid #666666;
    color: #000000;
    display: none;
    margin-left: -130px;
    min-width: 150px !important;
}
#mcTooltipWrapper {
	display:none;
}
.t_Tooltip{
	display:none !important;
}
.showhighlight_arrow {
    background: url("../../images/assets/btn-hov-right-arrow.gif") no-repeat scroll right center rgba(0, 0, 0, 0) !important;
    color: #FFFFFF !important;
   
    height: 18px !important;
    padding: 0 20px 0 15px !important;
    text-decoration: none !important;
    width: 76% !important;
}

.showhighlight_arrow4 {
    background: url("../../images/assets/btn-hov-right-arrow.gif") no-repeat scroll right center rgba(0, 0, 0, 0) !important;
    color: #FFFFFF !important;
   
    height: 18px !important;
    padding: 0 20px 0 15px !important;
    text-decoration: none !important;
    width: 60px !important;
}
</style>
<?php echo $javascript->link('/js/jquery.fancybox'); ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
	
		function submenuactivity(obj, action){	
		if(action==1){
			$('#table-popup').show();
		} else if(action==0){
			$('#table-popup').hide();
		}
	}
</script>


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
    	             'max': "<?php __('max50')  ?>"
    	         },    	         
    	    },
    	  };
	
	function submi_form(form_id)
	{
		//if (inValidate(validation)) {  	
		//    return false;
		//} else {	
			$('#'+form_id).submit();
		//}
	} 

	function reloadme(){
		location.reload();
	}
</script>
<script>
function chngbkcolor(obj){
$(document).ready(function(){
		jQuery('#button').attr("class","showhighlight_arrow4");	

		jQuery('#updateOdsentry').removeAttr("class");	
	    jQuery('#updateOdsentry').attr("class","button-right-hover");
});

}
</script>

<!--######## Start  Save Leave Page Event #################-->
<?php $leaveStatus = Configure :: read('leaveStatus'); ?>
 <?php if($leaveStatus[0]=="on") { ?>

<script language="JavaScript">
  var ids = new Array('GroupGroupName', 'GroupGroupDesc');
  var values = new Array('', '');
  
  function populateArrays()
  {
    // assign the default values to the items in the values array
    for (var i = 0; i < ids.length; i++)
    {
      var elem = document.getElementById(ids[i]);
      if (elem)
        if (elem.type == 'checkbox' || elem.type == 'radio')
          values[i] = elem.checked;
        else
          values[i] = elem.value;
    }      
  }



  var needToConfirm = true;
  
  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    if (needToConfirm)
    {
      // check to see if any changes to the data entry fields have been made
      for (var i = 0; i < values.length; i++)
      {
        var elem = document.getElementById(ids[i]);
        if (elem)
          if ((elem.type == 'checkbox' || elem.type == 'radio')
                  && values[i] != elem.checked)
            return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
          else if (!(elem.type == 'checkbox' || elem.type == 'radio') &&
                  elem.value != values[i])
            return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
      }

      // no changes - return nothing      
    }
  }
</script>
<?php } ?>

<div class="block top">
	<div id="overlay-error" class="notification first hide" style="width: 100%" >
	
		<div class="error">
			<div class="message">
				
			</div>
		</div>
	</div>
<?php if((isset($success)) && $success){?>
	
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
	    echo $form->create('Group',array('action'=>'edit/group_id:' . $groupDetails['Group']['id'],'id'=>'edit','type'=>'POST', 'invalidate' => 'invalidate'));	   ?>
             <h4><?php echo __("Group Detail") ?><a data-title="Enter Group Name" data-placement="right" data-type="text" id="group_name" href="#" class="none" data-original-title="" title="" style="display: inline;"><?php echo $groupname?> <span style="padding-left:45px;"></span></a>
               <span style="float:right;" id="sts"><?php echo __('groupDn') . '' . $groupDetails['Group']['identifier']; ?></span>
            </h4>



 	    <div class="cb">
		<input type="hidden" name="group_id" id="group_id" value="<?php echo $groupDetails['Group']['id'];?>" />
		<div class="form-box">
 			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupType', true). '</div>';
					echo	'<p>' . $groupDetails['Group']['type'] . '</p>'?>			
					
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupId', true). '</div>';
					echo $form->input("identifier", array('type'=>'hidden','value'=>$groupDetails['Group']['identifier']));
                                                                #echo $dn['Dns']['display'];
                                                                echo $html->link( $groupDetails['Group']['identifier'],array('div'=>false, 'controller'=>'features', 'action'=>'edit/dn_id:'.  $groupDetails['Group']['identifier'] . '&featureType=DN_MADN&spg=edit_madn'), array('class' => 'fancybox fancybox.ajax'));

					?>

			</div>

		</div>
		<div class="form-box">


			<!-- 
			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupName', true). '</div>';
                                        /*
                                         * 
                                         if($groupDetails['Group']['name']!="") {
					echo	$form->input('groupName', array('label' => false,'value'=>$groupDetails['Group']['name'],'style'=>'width:132px;','onkeyup'=>"chngbkcolor(this);"));
                                        }else {
					
					echo	$form->input('groupName', array('label' => false,'value'=>'Please enter Name','style'=>'width:132px;','onkeyup'=>"chngbkcolor(this);",'onfocus'=>'(this.value == "Please enter Name") && (this.value = "")','onblur'=>'(this.value == "") && (this.value = "Please enter Name")'));
                                        }
                                        */
                                        
                                        echo	'<p>' . $groupname. '</p>'?>
						?>		
			</div>
			-->
			<div class="form-left">
					<?php 
					echo '<div style="width:100px; float: left">' . __('groupDesc', true). '</div>';
					echo	$form->input('groupDesc', array('label' => false,'value'=>$groupDetails['Group']['desc'],'style'=>'width:120px;','onkeyup'=>"chngbkcolor(this);"));	?>		
			</div>
		</div>
			<div class="block" style="margin: 0px;">
            <?php
            if($groupMemberscount>=16) {
?>
            
				<div class="button-left-readonly" >
					  <a href="javascript:;" onclick="submenuactivity(this,1)" ><?php __('Add Member'); ?></a>
                      <div class="table-menu">
                    			<div class="table-menu-popup" id="table-popup" style="z-index: 1">
                    				<ul>
                    				<li class="schedule">										
									<?php echo $html->link( __("No Members", true)); ?>											
									</li>
									
                    				</ul>
                    			</div>
             			</div>
               </div>
                <?php } else { 
				$grouplocationName=$this->Location->getgroupLocation($stationLocationid);
				$stationLocationName = $grouplocationName['Location']['name'];
				$stationLocationName = $groupArray['Location']['name'];
				?>
				<?php if($groupDetails['Group']['name']!="") { ?>
                <div class="button-left-hover">
					  <?php #echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id .'&location_id='.$stationLocationName. '&type=single'),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','class'=>'fancybox fancybox.ajax')); ?>
						<?php echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id .'&location_id='.$stationLocationid. '&type=single'),array('class'=>'fancybox fancybox.ajax , showhighlight_buttonright')); ?>
				</div>
				
                <?php } } ?>
				
				<?php if($groupDetails['Group']['name']!="") { ?>
				
				<div class="button-right-disabled"  id="updateOdsentry">
					<a id="button" href="javascript:void(null)"  onclick="submi_form('edit');" name="data[filter]" value="filter" ><?php __("save");?></a>
				</div>
				<?php } else { ?>
				<div class="button-right-hover"  id="updateOdsentry">
					<a id="button" class="showhighlight_arrow4" href="javascript:void(null)"  onclick="submi_form('edit');" name="data[filter]" value="filter" ><?php __("save");?></a>
				</div>
				<?php } ?>		
				
				
			</div>
        
		
		
		
	    <?php
		// check $stationFeatures variable exists and is not empty
		#echo "<pre>";print_r($stationLocation);
		//if(isset($groupMembers) && !empty($groupMembers)) : 
		
	    #???Added for testing. need to understand why this was added.
		if(1) :
		
		#echo "<pre>";print_r($groupMembers);
		$stationStatus = Configure :: read('stationStatus');
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
					$k=0;
					for($i=0;$i<=15;$i++){ //echo "<pre/>"; print_r($stationFeatures[$i]); 

						$memberAry = $groupMembers[$i];
					//foreach($stationFeatures as $station):
						// stripes the table by adding a class to every other row
						$class = ( ($i % 2) ? " class='altrow'": '' );
						// increment count
						//$count++;
						$k++;
						
					?>
				<tr style="height:23px;">
					<td  style="width: 20px;"> <?php echo $k; 
					
					
					?></td>
				</tr>
				<?php } //endforeach; ?>
		</table>
		<!--  Group Specific Section -->
		
		<table class="phonekey stationtb2" id="NOTdragdroptbl">
		<thead>
			<tr class="table-top">
				 <th class="table-column" align="left" ><?php echo __('memberStation')?></th>
				 <th class="table-column" align="left"><?php echo __('key')?></th>
				 <th class="table-column" align="left"><?php echo __('memberPilot')?></th>
                 <th class="table-column filter-select filter-exact" data-placeholder="State" align="left"><?php echo __('memberLocation')?></th>
				 <th class="table-column filter-select filter-exact" data-placeholder="State" align="left"><?php echo __('memberState')?></th>
				 <th class="table-column" align="left"><?php //echo __('menu')?></th>
			 </tr>
		</thead>
				 <tbody>
				   <?php
					// initialise a counter for striping the table
					$memberArray = array(); 	echo $form->input("newaddedFeatues", array('type'=>'hidden','value'=>'','id'=>"newaddedFeatues"));
					$LocationArray =array();
					for($j=0;$j<=15;$j++){

					  	$groupArray = $groupMembers[$j]; //$setHeight = "";
						#echo "<pre>";print_r($groupArray);
						
					    $matches = explode('@', $groupArray['Feature']['stationkey_id']);
					    $stationkey_id = $matches[0];
					    $station_id = $matches[1];
						//foreach($stationFeatures as $station):
						// stripes the table by adding a class to every other row
						$class = ( ($j % 2) ? " class='altrow'": '' );
						if(isset($memberArray) && !empty($memberArray)) {
										$sta_id = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
						}else{
										$sta_id = str_pad($sta_id+1, 2, '0', STR_PAD_LEFT);			
                                       // $setHeight  = 'height:21px';										
						}
					#echo	$LocationArray[$station_id] = $station_id;
					#echo $station_id;
					 //$countNumStation = count($station_id)+1;
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
	                		#echo $station_id; 
	                		?>
					</td>
	                <td>
	                		<?php 
							//$DNID = $groupArray['Feature']['primary_value'];
							$DNID = $groupArray['Feature']['stationkey_id'];
							echo $form->input("featurevalue[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['stationkey_id'])); 
							echo $form->input("featureNewPosition[$sta_id]", array('type'=>'hidden','value'=>$sta_id)); 
	                		
	                		#echo $html->link($stationkey_id,array('controller'=>'stations', 'action'=>'editstation',$station_id)); 
	                		echo $stationkey_id;
	                		?>
	                </td>
	                <td>
	                		<?php 
	                		if ($grp_pilot[0]['stationkeys']['id'] == $groupArray['Feature']['stationkey_id'] && $groupArray['Feature']['stationkey_id'] != '')
	                		echo "P";
							#echo __($groupArray['Feature']['pilot'],true);
							echo $form->input("featurepilot[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['PILOT'])); 
	                		?>
					</td>
                    <td>
	                		<?php 
							/*
							
							if($groupArray['Stationkey']['location_id']!=""){
							 $grouplocationName=$this->Location->getgroupLocation($groupArray['Stationkey']['location_id']);
							 echo $grouplocationName['Location']['name'];
							} else if(!empty($DNID)) {
								#echo "Unknown Location";
								#echo $station_id;
								#$grouplocationId=$this->Station->getgroupLocationid($station_id);
								
								#echo "<pre>";print_r($stationLocation);
								
								
								$grouplocationName=$this->Location->getgroupLocation($stationLocation[$groupArray['Stationkey']['station_id']]);
							    echo $grouplocationName['Location']['name'];
							    
								
							}
							
							*/
							#$grouplocationName = $groupModel[$groupArray['Station']['location_id']];
							$grouplocationName = $groupArray['Location']['name'];
							echo $grouplocationName;
							
							#echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
	                		?>
					</td>
					<td>
	                		<?php 
							#echo __($groupArray['Feature']['Station']['status'],true);
	                		echo __($stationStatus[$stationStates[$groupArray['Stationkey']['station_id']]],true);
							
							echo $form->input("featurestatus[$sta_id]", array('type'=>'hidden','value'=>$groupArray['Feature']['status'])); 
	                		?>
					</td>
					<td class="table-right" style="background: url(<?php
        	echo $this->webroot;
			?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-right: 1px solid #D1D1D1!important;" onmouseout="this.className='table-right';" id="<?php
        	echo $sta_id;
			?>tdlast">
			<div class="table-menu">
            <div class="table-menu-popup" style="z-index: 1">
            <ul>
			<?php if(empty($DNID))
			{ ?>
				<li class="script">
				<?php
        		#echo $html->link(__('No Options', true), '');
				
				?>
				</li> 
				<li class="script">
				<?php echo $html->link( __("Add Member", true),array('controller'=>'stations','action'=>'selectstation','group_id:'.$group_id .'&location_id='.$stationLocationid. '&type=single'),array('class'=>'fancybox fancybox.ajax ')); ?>
				</li>
				<?php 
			}
			else
			{
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
               
                <?php if($station_id !='') { ?>
				<?php 
				 $groupMemberscount;
				if($groupMemberscount==1) {
					$confirmmsg ='If you will delete last member of this group, group will also be deleted \n Are you sure you want to delete this Group Member ?';			
				}
				else {
					$confirmmsg = "Are you sure you want to delete this Group Member ?";					
				}				
				?>
				<li class="script">
				<?php
				#echo $html->link(__('memberDelete', true), '');

				 /*???Correct major change
				  */
				  echo $html->link(__('memberDelete', true), array(
						'controller' => 'stations',
						'action' => 'major_cfeature_change',
						$station_id . '&delete_feature=' . $groupArray['Feature']['stationkey_id'] . '-DN_MADN&customer_id='.$SELECTED_CNN
				),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('.$confirmmsg.');"));
				 
				 
				/* */
				/* Option to use minor delete */
				/*
				
				 echo $html->link(__('memberDelete', true), array(
				 		'controller' => 'stations',
				 		'action' => 'minor_delete?feature_id=' . $groupArray['Feature']['stationkey_id'] . '-DN_MADN&customer_id='.$SELECTED_CNN.'&spg=edit_madn'
				 ),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('.$confirmmsg.');"));
				
				*/
		
				
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
	            	<?php } //endforeach; ?>
	            	</tr>
				 </tbody>	 
		</table>
		
		<!--  End Group specific section -->
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
        	 <h3><?php __('groupMadnEdit') ?></h3>
                 <p><?php __('groupMadnEdit_blurb') ?></p>

                 <div class="table-right  tooltip" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/16px/045_information_02_cmyk.gif) no-repeat 2px 2px;">
                      <div>
                          <div class="fl"><span><?php echo $html->link('', '', array('onclick' => '')) ?></span>
                              <p><?php echo __('groupList') ?><br/><?php echo __('groupList_blurb') ?></p>
                          </div>
                      </div>
                  </div>
				
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
</script>
<?php if($leaveStatus[0]=="on") { ?>
<script language="JavaScript">
  populateArrays();
</script>
<?php } ?>
