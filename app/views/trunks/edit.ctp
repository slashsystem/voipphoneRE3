<?php echo $this->element('editable'); ?>
<script>
function chngbkcolor(obj){
$(document).ready(function(){
		jQuery('#button').attr("class","showhighlight_buttonleft");	

		jQuery('#updateOdsentry').removeAttr("class");	
	    jQuery('#updateOdsentry').attr("class","button-right-hover");
});

}

</script>
<!--######## Start  Save Leave Page Event #################-->
<?php $leaveStatus = Configure :: read('leaveStatus'); ?>
 <?php if($leaveStatus[0]=="on") { ?>
<script language="JavaScript">
  var ids = new Array('TrunkName', 'TrunkRemark');
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
<h4>Trunk Details :<?php echo trim($trunkDetails[0]['Trunk']['name']);?></h4>
<!--<h4>Trunk Details :<a data-title="Enter Trunk Name" data-placement="right" data-type="text" id="trunk_name" href="#" class="editable editable-click" data-original-title="" title="" style="display: inline;"><?php echo trim($trunkDetails[0]['Trunk']['name']);?> <span style="padding-left:45px;"></span></a></h4>-->
		<form id="form" name="trunkform" class="filtersForm" action="<?php echo Configure::read('base_url');?>trunks/edit/trunk_id:<?php echo $trunk_id;?>" enctype="multipart/form-data" method="POST">    

		<?php echo	$form->input('Trunk.id', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['id'],'style'=>'width:150px;','type'=>'hidden')); ?>
         <input type="hidden" name="trunk_id" id="trunk_id" value="<?php echo $trunkDetails[0]['Trunk']['id'];?>" />

		<div id="cb" >
		<div class="form-box">
			<div class="form-left">				
			  <?php 
					echo '<div style="width:100px; float: left">' . __('trunkName', true). '</div>';
					echo $form->input('Trunk.name', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['name'],'style'=>'width:150px;','onkeyup'=>"chngbkcolor(this);"));		
					echo '<div style="width:100px; float: left">' . __('trunkRemark', true). '</div>';
					echo $form->input('Trunk.remark', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['remark'],'style'=>'width:150px;','onkeyup'=>"chngbkcolor(this);"));
			  ?>
			</div>
			<div class="form-right">				
			  <?php 
					echo '<div style="width:100px; float: left">' . __('location', true). '</div>';
					echo	$form->input('Location.name', array('label' => false,'value'=>$trunkDetails[0]['Location']['name'],'style'=>'width:150px;','readonly'=>'true'));	?>
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('pbxType', true). '</div>';
					echo	$form->input('Trunk.pbx_type', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['pbx_type'],'style'=>'width:150px;','readonly'=>'true'));	?>	
			</div>	
			<div class="form-left">
				<?php 
					echo '<div style="width:100px; float: left">' . __('gateType', true). '</div>';
					echo	$form->input('Trunk.gate_type', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['gate_type'],'style'=>'width:150px;','readonly'=>'true'));	?>	
					</div>
			<!-- 
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('Pbx Type', true). '</div>';
					echo	$form->input('Trunk.pbx_type', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['pbx_type'],'style'=>'width:150px;','readonly'=>'true'));	?>	
					
			</div>		
		    -->
		<div class="form-left">				
			 <?php 
					echo '<div style="width:100px; float: left">' . __('channels', true). '</div>';
					echo	$form->input('Trunk.channel', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['channel'],'style'=>'width:150px;','readonly'=>'true'));
			  ?>					
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('redundancy', true). '</div>';
					echo	$form->input('Trunk.redundancy', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['redundancy'],'style'=>'width:150px;','readonly'=>'true'));	?>	
			</div>
			
			<div class="form-left">	&nbsp;	
										
			 </div>
			<div class="form-right" >		
					
				<div class="button-right" id="updateOdsentry" >
						<?php echo $html->link( __("Save", true),'javascript:void(0);',array('onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)', 'onclick'=>'needToConfirm = false; document.trunkform.submit();','id'=>'button')); ?>				 
				</div>					
			 </div>
			 
		
		</div>
		
		
		<br>
		<h5>technical</h5>
		<div class="form-box">
			<div class="form-left">
				<?php 
					echo '<div style="width:100px; float: left">' . __('scm_name', true). '</div>';
					echo	$form->input('Trunk.scm_name', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['scm_name'],'style'=>'width:150px;','readonly'=>'true'));	?>	
					</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('Call Scenario', true). '</div>';
					echo	$form->input('Trunk.call_scenario', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['call_scenario'],'style'=>'width:150px;','readonly'=>'true'));
					?>
			</div>		
		</div>
		
		<div class="form-box">
			<div class="form-left">				
			 <?php 
					echo '<div style="width:100px; float: left">' . __('scm_remark', true). '</div>';
					echo	$form->input('Trunk.scm_remark', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['scm_remark'],'style'=>'width:150px;','readonly'=>'true'));	?>	
										
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('SBC', true). '</div>';
					echo	$form->input('Trunk.sbc', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['sbc'],'style'=>'width:150px;','readonly'=>'true'));	?>		
					
			</div>
			<div class="form-left">				
			 <?php 
					echo '<div style="width:100px; float: left">' . __('channels', true). '</div>';
					echo	$form->input('Trunk.channel', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['channel'],'style'=>'width:150px;','readonly'=>'true'));
			  ?>					
			</div><div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('redundancy', true). '</div>';
					echo	$form->input('Trunk.redundancy', array('label' => false,'value'=>$trunkDetails[0]['Trunk']['redundancy'],'style'=>'width:150px;','readonly'=>'true'));	?>	
			</div>
			
		</div>		
		</div>
		
				<h4><?php echo __('DN Summary', true);?></h4>
	

	
			<div id="" class="table-content">
				
				<table class="table-content phonekey" style="width: 400px">

					<tbody>

					<!-- TOTAL -->
										
					<tr>
					<td class="table-left">&nbsp;</td>
					<td class= "table-right-ohne" style="width:300px"><?php echo __('totalCustomer', true); ?></td>
					<td class="table-left-ohne" style="width:50px;"><?php echo $dnsCount?></td>
					<td class="table-right-ohne" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 2px 2px;" onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';"> 
                    	<div class="table-menu">
                       <div class="table-menu-popup">
                        <ul>
                           <li class="dial" ><?php echo $html->link( __("View DN List", true), array('controller'=> 'dns', 'action'=>'viewdns', 'customer_id:'.$selected_customer)); ?></li>
                           
                         </ul>
                      </div>
                     </div>
                   	</td>		
					</tr>
					<tr>
					<td class="table-left">&nbsp;</td>
					<td class= "table-right-ohne" style="width:300px"><?php echo __('totalTrunk', true); ?></td>
					<td class="table-left-ohne" style="width:50px;"><?php echo $dnsCount_trunk	?></td>
					<td class="table-right-ohne" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 2px 2px;" onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';"> 
                    	<div class="table-menu">
                       <div class="table-menu-popup">
                        <ul>
                           <li class="dial" ><?php echo $html->link( __("View DN List", true), array('controller'=> 'dns', 'action'=>'viewdns', 'customer_id:'.$selected_customer)); ?></li>
                           
                         </ul>
                      </div>
                     </div>
                   	</td>		
					</tr>
				
					</tbody>
					</table>
					</div>
				
				</form>
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
        	 <h3><?php __('trunkEdit') ?></h3>
                 <p>
                  <?php __('trunkEdit_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('trunkEdit_helpText') ?></p>
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
<script language="JavaScript">
  populateArrays();
</script>
