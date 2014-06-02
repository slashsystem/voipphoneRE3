<?php 
echo $javascript->link('/js/jquery.fancybox');
echo $this->element('editable');
?>
    
<?php
  $ScenarioStatus=$scenarioDetails[0]['Scenario']['status'];
  $PerformDisable =0;
if($ScenarioStatus==5 || $ScenarioStatus==6 || $ScenarioStatus==7){
	$readonlytextbox="readonly='true'";
	$PerformDisable =1;
	$class = "button-left-readonly";
} else {
    $readonlytextbox ='';
	$class = "button-left";
}

?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
		
	//Disable the buttons if scenario is completed i.e. status=6
	<?php
	if($PerformDisable==1){
	?> 
	    // Disable Add Number buttons
		jQuery('#add_numbers').removeAttr("onmouseout");
		jQuery('#add_numbers').removeAttr("href");	
		jQuery('#add_numbers').removeAttr("onmouseover");	
		jQuery('#add_numbers').attr("class","pointer");
		
		//Disable edit selected and hide pop up over menu
		jQuery('#edit_selected_scenario_popupmenu').hide();		
		jQuery('#edit_selected_scenario').removeAttr("onmouseout");
		jQuery('#edit_selected_scenario').removeAttr("href");	
		jQuery('#edit_selected_scenario').removeAttr("onmouseover");	
		jQuery('#edit_selected_scenario').attr("class","pointer");		
		
		// Disable All Checkboxes
		jQuery('#reloadwholdpagedata input[type="checkbox"]').each(function() { 
			jQuery(this).attr("disabled", true);	
		});		

        //Disable Delete options
		jQuery('.deleteOdsentry').removeAttr("href");
		jQuery('.deleteOdsentry').attr("class","deleteOdsentry pointer");
				

	<?php } ?>			
		
	});

	function submenuactivity(obj, action){	
		if(action==1){
			$('.table-menu-popup').show();
		} else if(action==0){
			$('.table-menu-popup').hide();
		}	
	}	
</script>
<script type="text/javascript">
	$(document).ready(function() {
	
	$('#minus').hide();
	$('#mbtn').hide();
	
	$('#minus').click(function(){
	$('#pbtn').show();
	$('#minus').hide();
	$('#mbtn').hide();
	$('#plus').show();
   });
   
	$('#minus_schedule').hide();
	$('#mbtn_schedule').hide();
	
	$('#minus_schedule').click(function(){
	$('#pbtn_schedule').show();
	$('#minus_schedule').hide();
	$('#mbtn_schedule').hide();
	$('#plus_schedule').show();
   }); 

   $('#plus_schedule').click(function(){
	$('#pbtn_schedule').hide();
	$('#minus_schedule').show();
	$('#mbtn_schedule').show();
	$('#plus_schedule').hide();
   }); 

   $('#minus_ods').hide();
	$('#mbtn_ods').hide();
	
	$('#minus_ods').click(function(){
	$('#pbtn_ods').show();
	$('#minus_ods').hide();
	$('#mbtn_ods').hide();
	$('#plus_ods').show();
  }); 

  $('#plus_ods').click(function(){
	$('#pbtn_ods').hide();
	$('#minus_ods').show();
	$('#mbtn_ods').show();
	$('#plus_ods').hide();
  });    
});  
	
</script>

<script type="text/javascript">
function chngbkcolor(obj){
$(document).ready(function(){

var valueToFind = jQuery(this).val(); 
		var CurrId = jQuery(obj).attr('id'); 
			jQuery('#save'+CurrId).show(); 
		    jQuery('#trick'+CurrId).hide();        
		
			var val = jQuery('#'+CurrId).val();									
			var RowId = CurrId.substring(1,CurrId.length); 	

			jQuery('#chk'+RowId).removeAttr("class");	
			jQuery('#chk'+RowId).attr("class","changedodsentry");
			
			if(val!=''){									
				jQuery('.sc_state_medium'+RowId).html('Edited');	
			}			
		
		
		jQuery('#savedestinations').attr("onclick","javascript:saveOdsentry(this);");
		jQuery('#savedestinations').attr("class","showhighlight_arrow");	
		
		jQuery('#updateOdsentry').removeAttr("class");	
	    jQuery('#updateOdsentry').attr("class","button-right-hover");
});

}
$(document).ready(function(){
$('.counter').hide();
	$('#savescenariotitle').click(function(){
		var scenario_name = jQuery('.scenarios').val();
		var scenario_id = '<?php echo $scenario_id; ?>';
		var customer_id = '<?php echo $customer_id; ?>';		
			var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/update_scname/scenario_id:"+scenario_id+"/customer_id:"+customer_id+"/scenario_name:"+scenario_name;
			jQuery.post( TargetURL, function( data ) {					
					//jQuery('.scenarios').val(data);
					var msgd=data.trim();
					
						window.location.href = "<?php echo Configure::read('base_url');?>scenarios/edit/scenario_id:"+msgd;
				
						//jQuery('#scenariossuccess').html('<font class="scenarioupdatemsg">Scenario updated successfully!</font>');
					
			});
			//window.location.href = "<?php echo Configure::read('base_url');?>scenarios/edit/customer_id:sv13";
    });	
	
	$('#crm_comment_option').val('');
	
});

function saveOdsentry(id){
 
 
 var senddata = []; 
 jQuery('.changedodsentry').each(function() { 		
    
		var style = jQuery('.saveOdsentry').attr('style'); 			
			var rowid = jQuery(this).attr('id'); 
			var attrlen = rowid.length;
			var Orowid = rowid.substring(2,attrlen); 
			var Dbrowid = rowid.substring(3,attrlen);
			var Destval =jQuery('#d'+Dbrowid).val();	
			senddata.push(Dbrowid+"="+Destval);		
		 
	 });
	
	 var serialized = senddata.join("&") 
	
     
	var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/updatemultipleodsentry/";
	
				var ScenarioId = $('#scenario_id').val();
				$('.black_overlay').show();
				jQuery.post( TargetURL,{ 'odsdata':serialized, 'scenario_id':ScenarioId}, function( data ) {	
			
			    
			          jQuery('.saveOdsentry').attr("style","display:none");	
		             jQuery(' .trickOdsentry').attr("style","display:inline");
					 jQuery('#updateOdsentry').removeAttr("class");			
					 jQuery('#savedestinations').removeAttr("class");	
					 jQuery('#updateOdsentry').attr("class"," button-right-disabled");	
                      jQuery('#savedestinations').removeAttr("onclick");
					// Update Scenario Status
					var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/ScenarioCompletedOrNot/scenario_id:"+ScenarioId;
					
					jQuery.post( TargetURL, function( response ) {
						jQuery('#Status').val(response);
						jQuery('#sts').html('Status :'+response);	
						  var msgd=response.trim();
						if(msgd!="Incomplete"){ 
						   jQuery('#request_validation').show();
						   jQuery('#request_validationdiv').show();
						   //Hide buttons
						   jQuery('#crm_comment_div').hide();
						   jQuery('#activationdiv').hide();
						   jQuery('#deactivationdiv').hide();
						   
						   //Hide Workflow messages
						    jQuery('#crm_comment_workflow').hide();
							jQuery('#complete_workflow').show();
							jQuery('#reject_workflow').hide();
							jQuery('#activate_workflow').hide();
							jQuery('#invalid_workflow').hide();
							
						 } else {						 
						 // Hide buttons
						  jQuery('#request_validation').hide();
						  jQuery('#request_validationdiv').hide();
						  jQuery('#crm_comment_div').hide();
						  jQuery('#activationdiv').hide();
						  jQuery('#deactivationdiv').hide();	

						   //Hide Workflow messages
						    jQuery('#crm_comment_workflow').hide();
							jQuery('#complete_workflow').hide();
							jQuery('#reject_workflow').hide();
							jQuery('#activate_workflow').hide();
							jQuery('#invalid_workflow').show();							
                        }					 
						
					});	
					
					// Change Odsentry state
						jQuery('#reloadme input[type="text"]').each(function() {
									var sid = jQuery(this).attr('id');
									var val = jQuery('#'+sid).val();									
									var RowId = sid.substring(1,sid.length); 									
									if(val!=''){
										jQuery('.sc_state_medium'+RowId).html('Valid');	
									}									
						 });				
								
				setTimeout(function(){
					$('.black_overlay').hide();
				  },500);		 
				
			});		
}
function toggleAdvanceSearch(){
	//$("#advancesearch").show
	if(document.getElementById('advancesearch').style.display=='none'){
		document.getElementById('advancesearch').style.display='block';
	}else{
		document.getElementById('advancesearch').style.display='none';
	}

}
function toggleShowHistory(){
	//$("#advancesearch").show
	if(document.getElementById('showhistory').style.display=='none'){
		document.getElementById('showhistory').style.display='block';
	}else{
		document.getElementById('showhistory').style.display='none';
	}
}
function toggleexecutionschedule(){
	//$("#advancesearch").show
	if(document.getElementById('showexecution').style.display=='none'){
		document.getElementById('showexecution').style.display='block';
	}else{
		document.getElementById('showexecution').style.display='none';
	}

}
function toggleodsentries(){
	//$("#advancesearch").show
	if(document.getElementById('showods').style.display=='none'){
		document.getElementById('showods').style.display='block';
	}else{
		document.getElementById('showods').style.display='none';
	}

}
</script>

<style>
.tablesorter-filter
{
	width:100% !important;
}
.space_check
{
	width:91%;
	height:auto !important;
	margin-bottom:0 !important;
}
.table th, .table td
{
	padding: 1px 6px;  /* 4px 6px;  */
	border:none;
	background-color:#fff !important;
}
.tablesorter-bootstrap .tablesorter-pager select
{
	width:64px;
	margin:0 20px;
}
.table-top th, .table-right-ohne th
{
	height:35px;
}
#example colgroup col:nth-child(3)
{
	width:40% !important;
}
#example colgroup col:nth-child(4)
{
	width:30% !important;
}

.table-bordered {
    border-collapse: separate;
    border-image: none;
    border-radius: 0px !important;
    border-style: none !important;
    border-width: 0px !important;
	border-top-right-radius:0px !important;
	border-top-left-radius:0px !important;
}

.withdatatablecss {
/*border-bottom:#CCCCCC 1px solid !important;*/ border-right: 1px solid #CCCCCC !important;border-top:#CCCCCC 1px solid !important; border-radius:0px !important;	
}



</style>
<script type="text/javascript">
function deleteOdsentry(record_id,elem){
	$.post(base_url+'odsentries/index/'+record_id,{},function(data){
		if(data=="success"){
		    $('#'+record_id).closest('tr').remove();
			alert('Record is deleted successfully');
		}
	});
}
function submit_form(action){
	//alert(action);
	$('.filtersForm').attr('action',base_url+'odsentries/index/'+action);
	$('.filtersForm').attr('method','POST');
	$.ajax({
				type: "POST",
				async : false,
				dataType: 'json',
				url: $('.filtersForm').attr('action'),
				data: $('.filtersForm').serialize(),
				success: function(data){  //alert(data);
					if(data.message=="updated"){
						alert(data.affectedRows+'Record(s) updated successfully')
					}else{
						alert('Some error occured, Please try again');
					} 
				}
	});

}

jQuery(function() { 
	jQuery.extend(jQuery.tablesorter.themes.bootstrap, {
		// these classes are added to the table. To see other table classes available,
		// look here: http://twitter.github.com/bootstrap/base-css.html#tables	
	});
	
	// call the tablesorter plugin and apply the uitheme widget
	jQuery(".dataTable").tablesorter({
		// this will apply the bootstrap theme if "uitheme" widget is included
		// the widgetOptions.uitheme is no longer required to be set
		theme : "bootstrap",
		widthFixed: true,
		bFilter: false,
		bInfo: false,
		emptyTo: 'none',
		link           : '<a href="#">{page}</a>',

		headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

		// widget code contained in the jquery.tablesorter.widgets.js file
		// use the zebra stripe widget if you plan on hiding any rows (filter widget)
		widgets : [ "uitheme", "filter", "zebra" ],

		widgetOptions : {
			// using the default zebra striping class name, so it actually isn't included in the theme variable above
			// this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
			zebra : ["even", "odd"],

			// reset filters button
			filter_reset : ".reset"

			// set the uitheme widget to use the bootstrap theme class names
			// this is no longer required, if theme is set
			// ,uitheme : "bootstrap"
		},
		
		headers: { 
		0: {sorter: false,filter: false},
		2: {sorter: 'digit'},
		4: {sorter: false,filter: false},
		5: {sorter: false,filter: false},
		6: {sorter: false,filter: false}		
		
		} 
	})
	.tablesorterPager({
		// target the pager markup - see the HTML block below
		container: jQuery(".pagerscenarioedit"),

		// target the pager page select dropdown - choose a page
		cssGoto  : ".pagenum",
		
		initWidgets      : true,

		// remove rows from the table to speed up the sort of large tables.
		// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		removeRows: false,

		// output string - default is '{page}/{totalPages}';
		// possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
		output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
		//output: 'Page <input type="text" name="currpage" value="{page}" class="pagination_text" maxlength="3"> Of {totalPages}'

	});

     jQuery(".smallwidth").focus(function () {
		var valueToFind = jQuery(this).val(); 
		 if(valueToFind=='DN From' || valueToFind=='DN To'){
			jQuery(this).val(''); 
		 } else {
			jQuery(this).val(valueToFind); 
		 }
    });

     jQuery(".smallwidth").focusout(function () {
		var valueToFind = jQuery(this).val(); 
		 if(valueToFind=='' || valueToFind==''){
			 var id= jQuery(this).attr('id');
			 if(id=='min')
			     jQuery(this).val('DN From'); 
			 else if(id=='max')	 
				jQuery(this).val('DN To'); 
		 } 
    });
	
	
	jQuery("#filter_now").click(function () {	
		var MinVal = jQuery('#rangeMinMinval').val();		
		var MaxVal = jQuery('#rangeMaxMaxval').val();	
	
		if((MinVal.length <9 || MinVal.length >9) && (MaxVal.length <9 || MaxVal.length >9)){
			alert('Filter Range From and To Must Be 9 digits!');
			return false;
		} else {
		
			if (isNaN(MinVal) || isNaN(MaxVal)){
				alert('Filter Range must be numeric only!');
				return false;
			} else {		
				jQuery("#form").submit();
			}
		}
	});

	jQuery("#reset_filter").click(function () {
	
		jQuery('#rangeMinMinval').val('');
		jQuery('#rangeMaxMaxval').val('');
		jQuery("#form").submit();
	});
	
     jQuery(".deldest").click(function () {
	    jQuery('input[type="checkbox"]:checked').each(function() { 
			var Odsentryid = jQuery(this).val();
	
			var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/deletedest/dest_id:"+Odsentryid;
			
			jQuery.post( TargetURL, function( data ) {			
				jQuery("#firstchild"+data).parents("tr").hide();
			});	

			jQuery("#firstchild"+Odsentryid).parents("tr").hide();			
		});		

	    jQuery('input[type="checkbox"]:checked').each(function() { 
			jQuery(this).attr("checked", false);				
		});	

	setTimeout(function(){
		 window.location.reload();
	  },1000);		
    });

	/*Check All / Uncheck All functionality*/
    jQuery("#checkAll").click(function () {
        if (jQuery("#checkAll").is(':checked')) {		
           	
			$('.counter').show();
			 var noofrecord=0;	
			jQuery('input[type="checkbox"]').each(function() { 	
			     
				var CClass = jQuery(this).parents("tr").attr('class');	
				if (CClass.indexOf("filtered") ==-1) { 
					var attrid = jQuery(this).attr('id');	
					
						jQuery('#'+attrid).removeAttr('class');
						jQuery('#'+attrid).prop("checked", true);
					noofrecord++;
			  	}
		   });
		   $('.counter').text(noofrecord-1+": records are selected");
	
        } else {
			jQuery('input[type="checkbox"]').each(function() {
				jQuery(this).removeAttr("checked");
				 $('.counter').text("0"+": records are selected");
				 $('.counter').hide();
			});
        }
		
		
    });
	
	jQuery('.odsentchk').click(function () {	 
        	var noofrecord=0;		
			jQuery("#checkAll").removeAttr("checked");
			$('.counter').show();
			jQuery('input[type="checkbox"]').each(function() { 	
	
				if ($(this).is(':checked')) {	
			     noofrecord++;			
				}
				
	        });
			if(noofrecord<1)
			{
			$('.counter').hide();
			}
	   $('.counter').text(noofrecord+": records are selected");
        
    });
	
	
	jQuery('.dosorting').click(function(){
			jQuery('input[type="checkbox"]').each(function() {
				jQuery(this).removeAttr("checked");
			});	
	});
	
 });
 
function saveToLog(action){
	var comment = $('#crm_comment_option').val();
	var scenario_id = '<?php echo $scenario_id; ?>';
	var cust_id = '<?php echo $SELECTED_CUSTOMER; ?>';
	$.post(base_url+"scenarios/validates/"+scenario_id,{'log_entry':action,'comment':comment,'cust_id':cust_id},function(data){ //alert(data);
		if(data){ 
			//alert("Scenario "+action);
			if(data=="scenario_accepted"){
				$('#sc_state').text('5');
			}else if(data=="scenario_rejected"){
				$('#sc_state').text('6');
		
			}else if(data=="scenario_validate_requested"){
				$('#sc_state').text('6');
			}
			
			window.location.reload();
		}
	}); 

 }

</script>

<script type="text/javascript">
	function selectAll(x) {
	for(var i=0,l=x.form.length; i<l; i++)
	if(x.form[i].type == 'checkbox' && x.form[i].name != 'sAll')
	x.form[i].checked=x.form[i].checked?false:true
	}
</script>
<script>
function dispinput(val) {
	if(val=="nm") {
		jQuery('#inpt').fadeIn();
		jQuery('#nm').fadeOut();
	}
}
</script>
<script>
	jQuery(document).ready(function(){
		jQuery('input#inpt').keypress(function(e) {
          if (e.which == '13') {

		var scenerio_name = jQuery('#inpt').val();
		var scenerio_id = '<?php echo $scenario_id; ?>';
		var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/edittitles/scenerio_id:"+scenerio_id+"/scenerio_name:"+scenerio_name;
					
			jQuery.post( TargetURL, function( data ) {					
					
					 jQuery("#nm").html(data);	
					 jQuery('#nm').fadeIn();
		             jQuery('#inpt').fadeOut();				
					 jQuery('#Id').val(data);
					
			});  
		  }
		  
		}); 

		
    });	
	

</script>

<?php 
if(empty($scenarioDetails)){		
?>
<h4>Scenario Details : <?php echo $scenarioDetails[0]['Scenario']['Name']?></h4>
		<p><?php echo __('createText', true)?>
		<form id="form" class="filtersForm" action="<?php echo Configure::read('base_url');?>scenarios/edit/scenario_id:<?php echo $scenario_id;?>" enctype="multipart/form-data" method="POST">    
		<input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id;?>" />
		<br>
		<div class="form-box">
			<div class="form-left">
				
			<?php 
					echo '<div style="width:100px; float: left">' . __('name', true). '</div>';
					echo	$form->input('Id', array('label' => false,'value'=>$scenarioDetails[0]['Scenario']['Name'],'class'=>'scenarios','style'=>'width:150px;'));	?>		
					<div id="scenariossuccess"></div>					
			</div>
			<div class="form-box" >
				<div class="button-right">
					<a id="savescenariotitle" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)" href="javascript:void(0);">Save</a>
				</div>
			</div>	
			</div>
			</div>
<?php 
}
else
{
?>


<?php $scenarioStatus = Configure :: read('scenarioStatus'); ?>

<!--   <div id="content"> -->
	<h4>Scenario Details : 
    <a data-title="Enter Scenario Name" data-placement="right" data-type="text" id="scenerio_name" href="#" class="editable editable-click" data-original-title="" title="" style="display: inline;"><?php echo trim($scenarioDetails[0]['Scenario']['Name']);?> <span style="padding-left:45px;"></span></a>
        
   <?php /* ?> <span style="color:darkblue;" id="nm" onclick="dispinput('nm');"><?php echo $scenarioDetails[0]['Scenario']['Name']?></span>
    <input type="text" id="inpt" name="title" value="<?php echo $scenarioDetails[0]['Scenario']['Name']?>" style="display:none; width:150px;"/>
     <span style="float:right;" id="sts"><?php echo __('status') . ' :'  . $scenarioStatus[$scenarioDetails[0]['Scenario']['status']];	?>		
	</span> <?php */ ?>
                    
    </h4>
   
		<form id="form" class="filtersForm" action="<?php echo Configure::read('base_url');?>scenarios/edit/scenario_id:<?php echo $scenario_id;?>" enctype="multipart/form-data" method="POST">    
		<input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id;?>" />
		<br>
		 <!-- 
		 <div class="form-box">
			<div class="form-left">
				
			<?php 
					echo '<div style="width:100px; float: left">' . __('name', true). '</div>';
					echo	$form->input('Id', array('label' => false,'value'=>$scenarioDetails[0]['Scenario']['Name'],'class'=>'scenarios','style'=>'width:150px;'));	?>		
					<div id="scenariossuccess"></div>					
			</div>
			<div class="form-right">
					<?php 
					echo '<div style="width:100px; float: left">' . __('Status', true). '</div>';
					echo  $form->input('Status', array('label' => false,'value'=>$scenarioStatus[$scenarioDetails[0]['Scenario']['status']],'style'=>'width:150px;','readonly'=>'true'));	?>		
					
			</div>				
		</div>
		
		-->
  
					
			<!-- Display buttons for actions -->
					<?php
					
					 $ActivateButtonDisplay = ($scenarioDetails[0]['Scenario']['status'] == 4) ? 'display:block;' : 'display:none;';
					 $DeActivateButtonDisplay = ($scenarioDetails[0]['Scenario']['status'] == 6) ? 'display:block;' : 'display:none;';
					 $CRMCommentDisplay = ($scenarioDetails[0]['Scenario']['status'] == 3) ? 'height:120px;display:block;' : 'height:120px;display:none;';
					 $RequestForValidateButtonDisplay = (($scenarioDetails[0]['Scenario']['status'] == 2) || ( $scenarioDetails[0]['Scenario']['status'] == 8)) ? 'display:block;' : 'display:none;';					 
					?>					
						<div class="form-box" style="<?php echo $CRMCommentDisplay;?>" id="crm_comment_div">
							<?php if($userpermission==Configure::read('access_id'))
        					{?>
        					<div class="form-left">

							<?php echo '<div style="width:100px; float: left">' . __('SCM Comment', true). '</div>';
							echo $form->input('Log.modification_response', array('type'=>'textarea','class'=>'date-pick', 'style'=>'margin:4px 4px 5px 8px;width:350px;', 'label'=>false, 'div'=>false, 'id'=>'crm_comment_option', 'value'=>'','default'=>''));?>
							</div>
                            <div class="form-right">
                            	<div class="button-right">
						    		 <?php echo $html->link( __("Accept", true), 'javascript:saveToLog("accepted")', array('onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)')); ?>
                                </div>
               
                            	<div class="button-right">
						    		 <?php echo $html->link( __("Reject", true), 'javascript:saveToLog("rejected")', array('onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)')); ?>
                                </div>
                            </div>
                            <?php 
        					}?>
                        </div>   
					
						<div id="request_validationdiv" class="form-box" style="<?php echo $RequestForValidateButtonDisplay;?>" >
							<div class="form-left">
							 	<div class="button-right">
							 		<?php echo '' ?>
							 			</div>
							 </div>
							 <div class="form-right">
							 	<div class="button-right">
										<?php echo $html->link( __("Request Validation", true), 'javascript:saveToLog("validate_request")',array('onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)','id'=>'request_validation')); ?>	
							 
							 	</div>
							 </div>
					  	</div>					  	
                  
						<div class="form-box" style="<?php echo $ActivateButtonDisplay;?>" id="activationdiv">
							<div class="form-left">
								<p></p>	
							 </div>
							 <div class="form-right">
							 	<div class="button-right">
										<?php echo $html->link( __("Activate", true), array('controller'=>'scenarios', 'action'=>'create_schedule/'.$scenario_id.'/create/'.$SELECTED_CUSTOMER.'/0/activate'), array('class'=>"fancybox fancybox.ajax",'onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)')); ?>	
							 			
							 	</div>
							 	<div class="button-right">
										<?php echo $html->link( __("View Script", true),array('controller'=>'scenarios', 'action'=>'scriptdetails/'.$scenarioDetails[0]['Scenario']['id']), array('class'=>"fancybox fancybox.ajax")); ?>									  
							   </div>	
							   
							 </div>
					  	</div>
		             
						<div class="form-box" style="<?php echo $DeActivateButtonDisplay;?>" id="deactivationdiv">
							<div class="form-left">
								<p></p>	
							 </div>
							 <div class="form-right">
							 	<div class="button-right">
									<?php echo $html->link( __("De-activate", true), array('controller'=>'scenarios', 'action'=>'create_schedule/'.$scenario_id.'/create/'.$SELECTED_CUSTOMER.'/0/deactivate'),array('class'=>"fancybox fancybox.ajax", 'onmouseover'=>'hoverButtonRight(this)', 'onmouseout'=>'outButtonRight(this)')); ?>	
							 	</div>
							 </div>
					  	</div>	
						
						<!-- <div class="form-box" >
						<div class="button-right">
							<a id="savescenariotitle" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)" href="javascript:void(0);">Save</a>
						</div>
					</div>	
					-->	
			<!-- End of Display buttons for actions -->
      
       	
       	<div style="display:block"> <h4>Manage ODS Entries <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleodsentries();" href="javascript:void(0)" style="float:right;">
				<div style="width:20px;background:#eee; height:20px;" id="pbtn_ods">
					<div id="plus_ods"></div>
					</div>
					<div style="width:20px;background:#eee; height:20px;" id="mbtn_ods">
					<div id="minus_ods"></div>
					</div>
					</a>
					</h4> 					
					
				</div>	 	       	
       	<?php 
       	#Check to see whether can edit ODS entries or not.
       	#if(($scenarioDetails[0]['Scenario']['status'] == 3) || ($scenarioDetails[0]['Scenario']['status'] == 6) || ($scenarioDetails[0]['Scenario']['status'] == 7)){
       	$show='none';
		if(($scenarioDetails[0]['Scenario']['status'] == 1) || ($scenarioDetails[0]['Scenario']['status'] == 2) || ($scenarioDetails[0]['Scenario']['status'] == 3)){
       			
       			$show='block';
       	}if(($scenarioDetails[0]['Scenario']['status'] == 5) || ($scenarioDetails[0]['Scenario']['status'] == 6) || ($scenarioDetails[0]['Scenario']['status'] == 7)){
       			$readonly='true';
       			
       	}
       	
       	
       	
       	
       	?>		<!--   -->
       	
       	<div id="showods" style="display:<?php echo $show;?>">
					<div style="margin:10px;">
					<a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleAdvanceSearch();" href="javascript:void(0)"><?php __('Advanced Filter') ?></a>
					</div>
				
			    	<?php
			    	if (isset($advancedFlag))
			    	{
			    		?>	
			    		<div class="form-box" style="display:block">
			    		<?php
			    	
			    	}
			    	else
			    	{
			    		?>
			    		<div id="advancesearch" class="form-box" style="display:none">
			    		<?php
			    	}?>
					
					
					
						<div class="form-left">
						<?php 
						echo '<div style="width:100px; float: left">' . __('rangeMin', true). '</div>';
						echo $form->input('rangeMin.minval', array( 'style'=>'margin:4px 4px 5px 8px;', 'label'=>false,'class'=>'filter_range_textbox', 'div'=>false, 'maxlength'=>'9', 'value'=>$rangeMinval));	?>		
							
					
						</div>						
						<div class="form-right">
						<?php 
						echo '<div style="width:100px; float: left">' . __('rangeMax', true). '</div>';
						echo $form->input('rangeMax.maxval', array( 'style'=>'margin:4px 4px 5px 8px;', 'label'=>false,'class'=>'filter_range_textbox', 'div'=>false, 'maxlength'=>'9', 'value'=>$rangeMaxval));	?>		
					
						</div>
				
						<div class="button-right" id="filter_now">
								<a id="filter_now" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)">Filter</a>
						</div>												
						<div class="button-right" id="reset_filter">
								<a id="reset_filter" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)">Clear</a>
						</div>	
		
					</div>
					<!--   -->
					
			<div class="block" style="margin: 0px;">
			<?php $scenario_name=$scenarioDetails[0]['Scenario']['Name']; ?>
			
				<div class="<?php echo $class; ?>">
						<?php echo $html->link( __("Add Numbers", true),array('controller'=>'dns', 'action'=>'selectdns',"scenario_id:$scenario_id/scenario_name:$scenario_name"), array('onmouseover'=>'hoverButtonLeft(this)', 'onmouseout'=>'outButtonLeft(this)','class'=> $selected['DN List']." fancybox fancybox.ajax",'escape'=>$readonly, 'id'=>'add_numbers' )); ?>		
					</div>			
				
				<div class="button-right">
				<a href="javascript:void(null)" id="edit_selected_scenario"  onmouseover="submenuactivity(this,1)" onmouseout="submenuactivity(this,0)" <?php echo $readonly; ?>><?php __("Edit Selected");?> </a>					
						<div class="table-menu" id="edit_selected_scenario_popupmenu">
                    			<div class="table-menu-popup" style="z-index: 1">
                    				<ul>
                    				<li class="schedule">										
									<?php echo $html->link( __("Update Selected", true),array('controller'=>'scenarios','action' => 'opendestupdateview/scenario_id:'.$scenario_id), array('class'=>"fancybox fancybox.ajax")); ?>
									</li>
									<li class="activate">																	
									<a class="deldest" href="javascript:void(0);">Delete Selected</a>										
									</li>
									
		
                    				</ul>
                    			</div>
             			</div>				
				
				</div>
				
				
				<div class="button-right-disabled" id="updateOdsentry">
						<a id="savedestinations" href="javascript:void(0);">Save</a>										
				</div>	
				
      		</div>		
			<div class="clear"></div>
				<ul class="search_btn_area">
				</ul>
				<div class="clear"></div>	
                <div class="counter" style="font-weight:bold">0: records are selected</div>	
                			
				<?php #echo $this->element('pagination/newtop'); ?>
				<div id="reloadwholdpagedata">
                <div class="clear"></div>
				<table id="example dnslistdata" class="dataTable  tablesorter" cellpadding="0" cellspacing="0" style="width:98%; margin-left:5px; border-top-color:#CCC">
				<thead>
				<tr class="table-top"  style="border-bottom:#CCCCCC 1px solid; border-right: 1px solid #CCCCCC;border-top:#CCCCCC 1px solid;">
				 <th class="table-column table-left-ohne withdatatablecss">&nbsp;</th>
				 <th class="table-column dosorting withdatatablecss">&nbsp;&nbsp;Source&nbsp;&nbsp;</th>
				 <th class="table-column dosorting withdatatablecss">&nbsp;&nbsp;Dest&nbsp;&nbsp;</th>
				 <th class="table-column filter-select filter-exact dosorting withdatatablecss" data-placeholder="State">&nbsp;&nbsp;State&nbsp;&nbsp;</th>
				 

				 <th class="table-column dosorting withdatatablecss"><input type="checkbox" name="sAll" id="checkAll" class="showselect"></th>
                 <th class="table-column dosorting withdatatablecss"></th>
                 <th class="table-column table-right-ohne withdatatablecss">&nbsp;</th>
				 </tr>
				</thead>
				<tfoot>
				<th colspan="8" class="pagerscenarioedit form-horizontal">
				<button type="button" class="btn first"><i class="icon-step-backward"></i></button>
				<button type="button" class="btn prev"><i class="icon-arrow-left"></i></button>
				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
				<button type="button" class="btn next"><i class="icon-arrow-right"></i></button>
				<button type="button" class="btn last"><i class="icon-step-forward"></i></button>
				</th>
				</tr>
				</tfoot>
				 <tbody id="reloadme" >
				 <?php foreach ($odsEntryList as $res)  {  ?>

				 <tr style="background-color:#FFF; border-bottom:#CCCCCC 1px solid; border-right: 1px solid #CCCCCC;">
				  <td class="table-left withdatatablecss" id="firstchild<?php echo $res['Odsentry']['id']; ?>">&nbsp;</td>
				 <td class="withdatatablecss"><?php echo $res['Odsentry']['source']; ?></td>
			 	 <td class="withdatatablecss">
					<!--<div class="input text">-->
					<?php echo $html->link(__($res['Odsentry']['dest'], true),'#',array('style'=>'display:none;','class'=>'getVal')); ?>
					
					 <?php if($PerformDisable==1){ ?>					
                     <input class="space_check"  AUTOCOMPLETE=OFF id="d<?php echo $res['Odsentry']['id']; ?>" name="<?php echo $res['Odsentry']['source']; ?>" type="text" value="<?php echo trim($res['Odsentry']['dest']); ?>" size="13" <?php echo $readonlytextbox; ?> >
					 <?php } else { ?>
					  <input class="space_check" onkeyup="chngbkcolor(this);"  AUTOCOMPLETE=OFF id="d<?php echo $res['Odsentry']['id']; ?>" name="<?php echo $res['Odsentry']['source']; ?>" type="text" value="<?php echo trim($res['Odsentry']['dest']); ?>" size="13" <?php echo $readonlytextbox; ?> >
					 <?php } ?>
                   <!--</div>-->
				 </td>
				 <td id="sc_state_medium " class="withdatatablecss sc_state_medium<?php echo $res['Odsentry']['id']; ?>" align="center"><?php echo ($res['Odsentry']['dest']) ? 'Valid' : 'Invalid'; ?></td>
				 

				  <td class="table-right-ohne withdatatablecss"><div style="width:20px;"> <input type="checkbox" class="odsentchk" name="a<?php echo $res['Odsentry']['id']; ?>" value="<?php echo $res['Odsentry']['id']; ?>" id="chk<?php echo $res['Odsentry']['id']; ?>" /></div> </td>
                  <td class="table-right-ohne withdatatablecss"><div style="width:20px;"> <?php echo $html->link( __("", true),'javascript:deleteOdsentry('.$res['Odsentry']['source'].',this);',array('id'=>$res['Odsentry']['source'],'class'=>'deleteOdsentry'));  ?></div> </td>
                  <td class="withdatatablecss">&nbsp;</td>
				 </tr>
				<?php } ?>
				 </tbody>
				 
				</table>
			   </div>	
				 <?php //} ?>
                 
			</div>
				  <!--  -->
				  
		<?php		  
		$show='none';
       	if(($scenarioDetails[0]['Scenario']['status'] == 4) || ($scenarioDetails[0]['Scenario']['status'] == 5) || ($scenarioDetails[0]['Scenario']['status'] == 6) || ($scenarioDetails[0]['Scenario']['status'] == 7)){
       			$readonly='true';
       			$show='block';
       	}
       	?>
					 
			<div style="display:block"> <h4>executionSchedules <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleexecutionschedule();" href="javascript:void(0)" style="float:right;">
					<div style="width:20px;background:#eee; height:20px;" id="pbtn_schedule">
					<div id="plus_schedule"></div>
					</div>
					<div style="width:20px;background:#eee; height:20px;" id="mbtn_schedule">
					<div id="minus_schedule"></div>
					</div>
					</a>
					</h4> 	
				
					
				</div>		     
			 
		  <div id="showexecution" style="display:<?php echo $show;?>">	
			<table class="table-content phonekey">
				    <thead>
						<tr class="table-top">
							<th class="table-column table-left-ohne">&nbsp;</th>
							<th class="table-column"> <?php echo __('Operation');?></th>
							<th class="table-column"> <?php echo __('Date');?></th>
							<th class="table-column"> <?php echo __('createdBy');?></th>
							<th class="table-column"> <?php echo __('createdDate');?></th>
							<th class="table-column table-right-ohne"> <?php echo __('option');?></th>
							
							
					
							
						</tr>
						
					</thead>
	  			      <tbody>
							<?php 
						
							#$execRecords = count($scenario['Execution'])-1;
							$executions = $scenarioDetails[0]['Execution'];
							
							#print_r($executions);
							$dates = array();
							foreach ($executions as $key => $row)
							{
								$dates[$key] = $row['targetDate'];
								
							}
							array_multisort($dates, SORT_ASC,  $executions);
							#print_r($executions);
							$counter = 1;
							foreach ($executions as $execution)
							{
				
								#if($scenario['Execution'][$iterateExecutions]['status'] =='SCHEDULED' || 
								#$scenario['Execution'][$iterateExecutions]['status'] =='INPROGRESS' || 
								#($scenario['Execution'][$iterateExecutions]['status'] == 'WARNING' &&  (strtotime("-5 day") <= strtotime($scenario['Execution'][$iterateExecutions]['modified'])))) 
								
								if($execution['status'] =='SCHEDULED' || 
								$execution['status'] =='INPROGRESS') 
								{
								
									?>
									<tr  onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
									<td>
									<td style="width:70px;text-align: left;">
									<?php echo $execution['operation']; ?>
									</td>
									<td style="width:100px;text-align: left;">
									<?php echo date('d.m.Y H:i',strtotime($execution['targetDate']));?>
									</td>
									<td style="width:100px;text-align: left;">
									<?php echo date('d.m.Y H:i',$execution['user_id']);?>
									</td>
									<td style="width:100px;text-align: left;">
									<?php echo date('d.m.Y H:i',strtotime($execution['created']));?>
									</td>
								
									<?php if($execution['status'] =='WARNING')
									{
										echo '<td style="width:70px;text-align: left; color: red;">';
									 	echo $execution['status'];
									 	echo '</td>';
									}
									else
									{
									#	echo '<td style="width:70px;text-align: left;">';
									 #	echo $execution['status'];
									 #	echo '</td>';
									}
								 	?>
								
									<?php
									if($execution['status'] =='SCHEDULED')
									{
									?>
										<td class="table-right"  onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';" style="background: url(<?php echo $this->webroot ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 2px 2px;" >
                     					<div class="table-menu">
                       					<div class="table-menu-popup">
										<ul>
                           					<li class="last cancel">
											<?php 
											if($execution['status']=='SCHEDULED'){
																					
											#echo $html->link( __("Delete Schedule", true),array('controller'=>'scenarios', 'action'=>'create_schedule/'.$scenario['Scenario']['id'].'/delete/'.$SELECTED_CUSTOMER_NAME.'/'.$execution['id']), array('class'=>"fancybox fancybox.ajax"));  											
											echo $html->link( __("Delete Schedule", true),array('controller'=>'scenarios', 'action'=>'/delete_schedule/'.$scenarioDetails[0]['Scenario']['id'].'/'.$execution['id']));  											
										#echo $html->link( __("Delete Scenario", true),array('controller'=>'scenarios', 'action'=>'deleteScenario/scenario_id:'.$scenario['Scenario']['id'])); 
																				
											
											}else{?>
											<a onclick="alert('You can not delete a schedule after it has been applied.')" href="javascript:void(0)">Delete Schedule</a>
											<?php } ?>
											</li>
                        	 			</ul>
                      					</div>
                      					</div>
                   						</td>
                   						<?php
									}
									else
									{
										
										#echo '<td class="table-right-ohne">' . $html->link('Log',  array('controller'=> 'logs', 'action'=>'viewlog', 'customer_id:'.$SELECTED_CUSTOMER_NAME . '&' . 'affected_obj=' . $scenario['Scenario']['id'])) . '</td>';
										?>
										<td class="table-right-ohne" style="background: url(<?php echo $this->webroot ?>/images/assets/icons/9px/148_arrowdown_02_cmyk.gif) no-repeat 3px 5px;border-style: none;"></td>
										<?php
									}
									?>
									</tr>
									</tbody>
									<?php
							
								}
								
						
							
							}
							?>
						
						</table>
						<div style="display:block">
				<div class="button-right">
					<?php echo $html->link( __("Create Schedule", true),array('controller'=>'scenarios', 'action'=>'create_schedule/'.$scenarioDetails[0]['Scenario']['id'].'/create/'.$SELECTED_CUSTOMER), array('class'=>"fancybox fancybox.ajax")); ?>											
				 </div>
				 </div>	
					</div>	
					
					
					<!--  -->
					
										<!-- -->	
								 
					
				  <div style="display:block">					
					<h4 style="display:block;float:left;width: 100%;">Scenario History <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleShowHistory();" href="javascript:void(0)" style="float:right;">
					<div style="width:20px;background:#eee; height:20px;" id="pbtn">
					<div id="plus"></div>
					</div>
					<div style="width:20px;background:#eee; height:20px;" id="mbtn">
					<div id="minus"></div>
					</div>
					</a></h4> 
					</div>
				
			    	<?php
			    	if (isset($showHistory))
			    	{
			    		?>	
			    		<div class="table-content" style="display:block">
			    		<?php
			    	
			    	}
			    	else
			    	{
			    		?>
			    		<div id="showhistory" class="table-content" style="display:none">
			    		<?php
			    	}?>
				    <table class="table-content phonekey">
				    <thead>
						<tr class="table-top">
							<th class="table-column"> <?php echo __('Created');?></th>
							<th class="table-column"> <?php echo __('User');?></th>
							<th class="table-column"> <?php echo __('log_entry');?></th>
							<th class="table-column"> <?php echo __('Detail');?></th>
							
						</tr>
						
					</thead>
	  			      <tbody>
		        	<?php

	
					// loop through and display format
					foreach($loginfo as $log):

				
					?>
	            	<tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	                <td style="width:70px;">
	                <?php 
	                $formatted_date = date('d.m.Y H:i:s',strtotime($log['Log']['created']));
	                preg_match("/^(.*) (.*)/", $formatted_date, $matches);
					if ($matches[0]) 
					{
	               	 	#$datetime2line = $matches[1] . '<br>' . $matches[2];
	               	 	echo $matches[1] ;
	               	 	echo $matches[2] ;
					}else{
	                	echo $log['Log']['created'] ;
	                }
	                ?>
	               </td>
	                <td style="width:50px;">
	                <?php echo $log['Log']['user'] ?>
	           		</td>
	                 <td> <?php echo $log['Log']['log_entry'] ?></td>
	                 <td><?php echo $log['Log']['modification_response']?></td>
	          		 
	         	  </tr>
	         		<?php 
					endforeach;
					?>
	       	 	</tbody>
				</table>
				    
				  </div>
				  
					
					<!--  -->
					
					
				</div>
<?php 
} # End of new sceanrio filter
?>
			
			<div class="black_overlay" style="height:1220px; width: 1366px; display: none;">
			<div id="black_overlay_loading">
			<img alt="" src="../../img/assets/ajax-loader.gif">
			</div>
		</div>
<div id="related-content">
        <div class="box start link">
                <a href="#">
                <?php __('Home Swisscom') ?>
                </a>
        </div>
        <div class="box info">
                 <h3><?php __('Scenario Edit') ?></h3>
                 <p>
                  <?php __('This page is a Scenario Edit page allowing users to edit specific scenarios') ?>
                 </p>
        </div>

                        <div class="box">
                                <h3 class="red"><?php # __("_infoBox");?></h3>
                                <div class="red">
                                <?php # __('_UpdateInfo');?>
                                </div>
                 		<h3><?php __('Workflow') ?></h3>

					<?php
					
					   $ActivateWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 4) ? 'display:block;' : 'display:none;';
					   $DeActivateworkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 6) ? 'display:block;' : 'display:none;';
					   $CRMCommentWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 3) ? 'height:120px;display:block;' : 'height:120px;display:none;';
					   $CompleteWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 2) ? 'display:block;' : 'display:none;';	
					   
					   $RejectWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 8) ? 'display:block;' : 'display:none;';	
                       $InvalidWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 1) ? 'display:block;' : 'display:none;';	
					
					?>				
						<p id="crm_comment_workflow" style="<?php echo $CRMCommentWorkflowDisplay; ?>">This Scenario has been submitted by user in order to request acceptance from SCM. After review of the scenario configuration press accept or reject to make the scenario available for deploy or reconfiguration respecively</p>                           
					
						<p id="complete_workflow" style="<?php echo $CompleteWorkflowDisplay; ?>">This Scenario is configured completely and is ready for a request  of acceptance from SCM. To make this scenario available for activation the scenario must be reviewed by SCM. Click request validaiton option.</p>
                   			
						<p id="reject_workflow" style="<?php echo $RejectWorkflowDisplay; ?>">This Scenario is configured completely but has been rejected by SCM. To make this scenario available for activation the scenario must be reviewed by SCM. Update the scenario with the required changes and click request validaiton below.</p>
                   			
						<p id="activate_workflow" style="<?php echo $ActivateWorkflowDisplay; ?>">This Scenario is configured completely and has been accepted by Swisscom. The scenario is available for activation/deactivation using the functions</p>
		            
						<p id="invalid_workflow" style="<?php echo $InvalidWorkflowDisplay; ?>">This Scenario is in Invalid state (most likely due to invalid destination numbers with some odsentries. The scenario needs to be resolved before it can be authorized by SCM and made available for activation/deactivation</p>	            

			</div>
        <?php if($userpermission==Configure::read('access_id'))
        {?>
                <div class="box info">
                <h3><?php __("Internal User");?></h3>
                <p><?php __("Customer View:");?></p>
                <p><?php echo $selected_customer; ?></p>

                </div>
        <?php } ?>

                </div>				
		</div>
		
		<!--right hand side starts from here-->
<!--ight hand side  ends here-->
<script type="text/javascript">
function toggleAdvanceSearch(){
                //$("#advancesearch").show
                if(document.getElementById('advancesearch').style.display=='none'){
                        document.getElementById('advancesearch').style.display='block';
                }else{
                        document.getElementById('advancesearch').style.display='none';
                }

        }
</script>
