<script>

validation = {
	// Specify the validation rules
	'rules': {                     
	    'MediatrixLocationDesc':{
	        'required': true,
	        'max': 50,
	        //'max': '30'
	    },
	},               
	// Specify the validation error messages
	'messages': {
	    'MediatrixLocationDesc': {
	         'required': "<?php __('Please enter Mediatrix Location Desc')?>",
	         'max': "<?php __('Description length should be upto 50 characters')  ?>"
	         //'min': "Cost should be atleast 0"
	     },          
	},
};
function submi_form(){
  
  if (inValidate(validation)) {
    return false;
  } else {
  	$("form").submit();
  }
}

</script>

<?php echo $this->element('editable'); ?>
<?php
#-----------------------------------------------------------------#
# $Rev:: 22            $:  Revision of last commit                #
#-----------------------------------------------------------------#



if(!empty($mediatrix)){
	#echo $form->create(null, array('id' => 'MediatrixEditForm', 'url' => '/mediatrixes/update/'.$mediatrix[0]['Mediatrix']['id'],'accept-charset'=>'ISO-8859-1'));
	echo $form->create('Mediatrix',array('action'=>'edit/mediatrix_id:' . $mediatrix[0]['Mediatrix']['id'],'id'=>'edit','type'=>'POST', 'invalidate' => 'invalidate'));	   ?>
	    
	
	<div class="block top">
		<div id="overlay-error" class="notification first hide" style="width: 534px" >
		
			<div class="error">
				<div class="message">
					
				</div>
			</div>
		</div>
	<?php if((isset($inProgress)) && $inProgress){?>
	
		<div class="notification first" style="width: 534px" >
		
			<div class="ok">
				<div class="message">
					IN WORK
				</div>
			</div>
		</div>
		
	<?php } ?>
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

		
echo $javascript->link('/js/jquery.fancybox');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
<script>
function chngbkcolor(obj){
$(document).ready(function(){
		jQuery('#button').attr("class","showhighlight_arrow");	

		jQuery('#updateOdsentry').removeAttr("class");	
	    jQuery('#updateOdsentry').attr("class","button-left-hover");
});

}

</script>

<style>
.stationtb2 {
    clear: inherit !important;
    float: left;
    margin-right: 20px;
    width: 520px !important;
}
</style>

<!--######## Start  Save Leave Page Event #################-->
<?php $leaveStatus = Configure :: read('leaveStatus'); ?>
 <?php 
 
 
 if($leaveStatus[0]=="on") { ?>
<script language="JavaScript">
  var ids = new Array('MediatrixLocationId', 'MediatrixLocationDesc');
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



			
	<div id="newEdit">
		<h4>Mediatrix Details :  <?php echo $mediatrix[0]['Mediatrix']['name']?></h4>
<div class="form-body">
			<div class="form-box">
				<div class="form-left">
						<?php 
						echo '<div style="width:100px; float: left">' . __('location', true). '</div>';
						echo $form->select('location_id', $locations,$location_id,array('label'=>false, 'style'=>'width:100px;','onchange'=>"javascript:submi_form('filters'); chngbkcolor(this);"));
					?>
				</div>
				<div class="form-right">
						<?php 
						echo '<div style="width:100px; float: left">' . __('ipaddress', true). '</div>';
						echo	$form->input('ipaddress', array('label' => false,'value'=>$mediatrix[0]['Mediatrix']['ipaddress'],'style'=>'width:100px;','readonly'=>'true'));	?>		
					
				</div>
                </div>
                <div class="form-box">
				<div class="form-left">
						<?php 
						echo '<div style="width:100px; float: left">' . __('mediatrixDesc', true). '</div>';
						echo	$form->input('location_desc', array('label' => false,'value'=>$mediatrix[0]['Mediatrix']['location_desc'],'style'=>'width:100px;','onkeyup'=>"chngbkcolor(this);"));	?>		
					
				</div>
				<div class="form-right">
						<?php 
						echo '<div style="width:100px; float: left">' . __('default_gw', true). '</div>';
						echo	$form->input('default_gw', array('label' => false,'value'=>$mediatrix[0]['Mediatrix']['default_gw'],'style'=>'width:100px;','readonly'=>'true'));	?>		
					
				</div>
				<div class="form-left">
						<?php 
						echo '<div style="width:100px; float: left">' . __('address', true). '</div>';
						echo	$form->input('address', array('label' => false,'value'=>$mediatrix[0]['Location']['address'],'style'=>'width:100px;','readonly'=>'true'));	?>		
					
				</div>
				<div class="form-right">
						<?php 
						echo '<div style="width:100px; float: left">' . __('mask', true). '</div>';
						echo	$form->input('mask', array('label' => false,'value'=>$mediatrix[0]['Mediatrix']['mask'],'style'=>'width:100px;','readonly'=>'true'));	?>		
					
				</div>
			</div>
				<!--CBM ADDED BUTTONS TO TOP-->
			
		</div>
		<fieldset>
                       <fieldset style="display:none;">
                        <input type="hidden" name="_method" value="PUT" />
                        </fieldset>


                        <div class="button-left"  id="updateOdsentry" style="float:right">
					<a id="button" href="javascript:void(null)"  onclick="javascript:submi_form('edit');" name="data[filter]" value="filter" onmouseover="hoverButtonLeft(this)" onmouseout="outButtonLeft(this)"><?php __("save");?></a>

                       </div>

           </fieldset>
		</div>
		<h4>Port Details </h4>	


		<?php //echo $this->element('pagination/top'); ?>
	        <div id="" class="table-content main_table_content">
	        <table class="phonekey stationtb2" id="NOTdragdroptbl" width="100%">
			<thead>
			<tr class="table-top">
				 
				 <!--<th class="table-column">&nbsp;</th>-->
				 <th class="table-column" style="width:20px;">&nbsp;&nbsp;<?php echo __('PORT')?>&nbsp;&nbsp;</th>
				 
				 <th class="table-column" style="width:50px;">&nbsp;&nbsp;<?php echo __('TYPE')?>&nbsp;&nbsp;</th>
				 <th class="table-column" style="width:90px;">&nbsp;&nbsp;<?php echo __('STATIONID')?>&nbsp;&nbsp;</th>
				 <th class="table-column filter-select filter-exact" data-placeholder="State" style="width:120px;">&nbsp;&nbsp;<?php echo __('PORTNAME')?>&nbsp;&nbsp;</th>
                 <th class="table-column filter-select filter-exact" data-placeholder="State" style="width:250px;">&nbsp;&nbsp;<?php echo __('ENDPOINT')?>&nbsp;&nbsp;</th>
				 <!--<th class="table-column" >&nbsp;&nbsp;Options&nbsp;&nbsp;</th>-->
				<th class="table-column" ></th>
		
			 </tr>
		</thead><tbody>
	        	<?php
				// initialise a counter for striping the table
				$count = 0;
	
				// loop through and display format
				foreach($mediatrix[0]['Port'] as $port):
				?>
	            <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<!--<td class="table-left">&nbsp;</td>-->
	               		<td><?php echo $port['port_nr']; ?></td>
	               		<td><?php echo $port['type']; ?></td>
	               		<td><?php echo $portMap[$port['name']]; ?></td>
	              		<td><?php echo $port['host'];?></td>
                        <td><?php echo $mediatrix[0]['Mediatrix']['name'];;?></td>
	               		
	               		<td class="table-right-ohne" style="background: url(<?php
    			    	echo $this->webroot;
						?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-right: 1px solid #D1D1D1!important;" onmouseout="this.className='table-right';" id="<?php
     				   	echo $sta_id;
						?>tdlast">
						<div class="table-menu">
         			   <div class="table-menu-popup" style="z-index: 1">
        			    <ul>
			<?php if(empty($portMap[$port['name']]))
			{ ?>
				<li class="inactive">
					<?php #echo $html->link(__('Create Station From DN', true),  array('controller'=> 'stations', 'action'=>'create', 'port_id:'.$port['id'] . '&' . 'customer_id=' . $mediatrix[0]['Location']['customer_id']));?>
					<?php 
					#WORKING echo $html->link( __("Create Station", true),array('controller'=>'dns','action'=>'selectdns','port_id:'. 'test' . '&' . 'customer_id=' . $mediatrix[0]['Location']['customer_id'] . '&type=singleLogic'),array('class'=>'fancybox fancybox.ajax')); 
					echo $html->link( __("Create Station", true),''); ?>
					?>
												
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
						$portMap[$port['name']]
				));
				?>
				</li> 

				<?php
			} 
			?>
            </ul>
            </div>
			</div>
		</td>
		    			
	           			<?php 
	            		
	            	endforeach; ?>
	            	</tr>
	        		</tbody>

	    </table>
	    </div>
		


	<?php }?>


		
	           
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
        	 <h3><?php __('mediatrixEdit') ?></h3>
                 <p>
                  <?php __('mediatrixEdit_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('mediatrixEdit_helpText') ?></p>
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
			<h3><?php __('Internal User') ?></h3>
            <p><?php __("Customer Name");?><?php echo $selected_customer; ?></p>
            <p><?php __("Customer ID");?><?php echo $SELECTED_CNN; ?></p>

                </div>

<!--COmment out upload functionality 
<fieldset>
<div class="block">
<div class="button-left">
<a href="javascript:void(null);"  onclick="javascript:return upload_xml();"  onmouseover="hoverButtonLeft(this)" onmouseout="outButtonLeft(this)">
<?php __("Upload");?>
</a>
</div>
</div>
</fieldset>
-->

	<?php }
	?>
    <?php echo $form->end(); ?>

</div>
                <!--ight hand side  ends here-->


</form>
<script>
<!--ight hand side  ends here-->
function submi_formsss(form_id)
{	
	$('#'+form_id).submit();
} 

<!--right hand side  ends here-->
</script>
<?php  if($leaveStatus[0]=="on") { ?>
<script language="JavaScript">
  populateArrays();
</script>
<?php } ?>
