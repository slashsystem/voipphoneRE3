<?php
//f (($userpermission) || ($_SESSION['APPNAME'] == 'EXTERNAL'))
//{
	
//}


echo $javascript->link('/js/jquery.fancybox');
#echo $javascript->link('/js/modalPopLite1');
#echo $html->css('modalPopLite');
echo $this->element('editable');
?>

<?php
$ScenarioStatus = $scenarioDetails[0]['Scenario']['status'];
$PerformDisable = 0;
if ($ScenarioStatus == 5 || $ScenarioStatus == 6 || $ScenarioStatus == 7) {
    $readonlytextbox = "readonly='true'";
    $PerformDisable = 1;
    $class = "button-left-readonly";
} else {
    $readonlytextbox = '';
    $class = "button-left";
}

 $odscount = count($odsEntryList);

?>
<style type="text/css">
		/* CSS for modelpopup */
		     
		#clicker
		{
			
			cursor:pointer;
		}
		
		#popup-wrapper
		{
			width:400px;
			height:200px;
			background-color:#fff;
			padding:10px;
		
		}
		#clicker2
		{
			
			cursor:pointer;
		}
		#popup-wrapper2
		{
			width:400px;
			height:200px;
			background-color:#fff;
			padding:10px;
		
		}
		#clicker3
		{
			
			cursor:pointer;
		}
		#popup-wrapper3
		{
			width:400px;
			height:200px;
			background-color:#fff;
			padding:10px;
		
		}
		body
		{
		    padding:10px;
		}
	</style>
<script type="text/javascript">
//script for modelpopup
		$(function () {

		    $('#popup-wrapper').modalPopLite({ openButton: '.clicker', closeButton: '#close-btn', isModal: true });			
			$('#popup-wrapper2').modalPopLite({ openButton: '.clicker2', closeButton: '#close-btn2', isModal: true });
			$('#popup-wrapper3').modalPopLite({ openButton: '.clicker3', closeButton: '#close-btn3', isModal: true });

		});
	</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
		// Check if Ods value is Zero(0) open SelectDNS Overlay
		var odscount = $("#odscount").val();
		
		if(odscount==0){
			$('#add_numbers').click();
		}

       

        //Disable the buttons if scenario is completed i.e. status=6
<?php
if ($PerformDisable == 1) {
    ?>
            // Disable Add Number buttons
            jQuery('#add_numbers').removeAttr("onmouseout");
            jQuery('#add_numbers').removeAttr("href");
            jQuery('#add_numbers').removeAttr("onmouseover");
            jQuery('#add_numbers').attr("class", "pointer");

            //Disable edit selected and hide pop up over menu
            jQuery('#edit_selected_scenario_popupmenu').hide();
            jQuery('#edit_selected_scenario').removeAttr("onmouseout");
            jQuery('#edit_selected_scenario').removeAttr("href");
            jQuery('#edit_selected_scenario').removeAttr("onmouseover");
            jQuery('#edit_selected_scenario').attr("class", "pointer");

            // Disable All Checkboxes
            jQuery('#reloadwholdpagedata input[type="checkbox"]').each(function() {
                jQuery(this).attr("disabled", true);
            });

            //Disable Delete options
            jQuery('.deleteOdsentry').removeAttr("href");
            jQuery('.deleteOdsentry').attr("class", "deleteOdsentry pointer");


<?php } ?>

    });

    function submenuactivity(obj, action) {
        if (action == 1) {
            //$('.table-menu-popup').show();
			$('#table-popup').show();
        } else if (action == 0) {
           // $('.table-menu-popup').hide();
			$('#table-popup').hide();
        }
    }

    
</script>

<script type="text/javascript">
    $(document).ready(function() {
		
				
		/**
		* make desttextbox heighlighted with blue color
		*/
		
		var numeric_text=$("input.numeric_check").each(function() {

			var num_val=$(this).val();

			if(num_val=="")
			{
				$(this).addClass("hightlightbox");
				$('#overlay-sucess .ok .message').text("<?php __('Destination should not be empty!') ?>");
		        $('#overlay-sucess').removeClass('hide');
				
				
			}

		});     

		});



</script>

<script>
function set_visimenu(val)
{
	
	if(val=='dispmenu') {
			$("#edit_stat_popupmenu").slideToggle("slow");
	}
}

</script>
<?php
/**
* @ Delete function
*/
?>

<script>
  	function deletesource(val){
		//alert(val);		
		var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/deleteScenario/scenario_id:"+val;	
 		jQuery.post( TargetURL,  function( data ) {  //alert(data);
			//window.location.reload();
			window.location.href = "<?php echo Configure::read('base_url'); ?>scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER; ?>";
	});
	//window.location.reload();
}

function delete_allschedule(val){
	
	 var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/delete_allschedule/"+val;
	 jQuery.post( TargetURL, function(data){
	 	$('#close-btn3').click();
	 	$('#add_numbers').click();
	 });
}

  </script>
<script type="text/javascript">
    $(document).ready(function() {
		jQuery('#updateOdsentry').hide();		            
        $('#minus').hide();
        $('#mbtn').hide();

        $('#minus').click(function() {
            $('#pbtn').show();
            $('#minus').hide();
            $('#mbtn').hide();
            $('#plus').show();
        });

        $('#minus_schedule').hide();
        $('#mbtn_schedule').hide();

        $('#minus_schedule').click(function() {
            $('#pbtn_schedule').show();
            $('#minus_schedule').hide();
            $('#mbtn_schedule').hide();
            $('#plus_schedule').show();
        });

        $('#plus_schedule').click(function() {
			
            $('#pbtn_schedule').hide();
            $('#minus_schedule').show();
            $('#mbtn_schedule').show();
            $('#plus_schedule').hide();
        });

        $('#minus_ods').hide();
        $('#mbtn_ods').hide();

        $('#minus_ods').click(function() {
            $('#pbtn_ods').show();
            $('#minus_ods').hide();
            $('#mbtn_ods').hide();
            $('#plus_ods').show();
        });

        $('#plus_ods').click(function() {
            $('#pbtn_ods').hide();
            $('#minus_ods').show();
            $('#mbtn_ods').show();
            $('#plus_ods').hide();
        });
    });

</script>

<script type="text/javascript">
    function chngbkcolor(obj) {
        $(document).ready(function() {

            var valueToFind = jQuery(this).val();
            var CurrId = jQuery(obj).attr('id');

            CurrId = (typeof CurrId == 'undefined') ? '' : CurrId;

            jQuery('#save' + CurrId).show();
            jQuery('#trick' + CurrId).hide();

            var val = jQuery('#' + CurrId).val();
            var RowId = CurrId.substring(1, CurrId.length);

            //jQuery('#chk' + RowId).removeAttr("class");
            jQuery('#chk' + RowId).attr("class", "changedodsentry");

            if (val != '') {
                jQuery('.sc_state_medium' + RowId).html('Edited');
            }
           jQuery('#destid').val(CurrId);

// Jquery Validation
           var arr = CurrId.split('d');
		   $("#d"+arr[1]).attr("class","space_check  numeric_check form-change");
		   
		     jQuery('#updateOdsentry').show();
            	jQuery('#savedestinations').attr("class", "showhighlight_buttonleft");
            	

            	jQuery('#updateOdsentry').removeAttr("class");
            	jQuery('#updateOdsentry').attr("class", "button-right-hover");
		   
		   /*var rowdata = 'd'+arr[1];
		  	   
		   alert(rowdata);
		   validation = {
	    	    // Specify the validation rules
	    	    'rules': {
	    	        rowdata:{
	    	            'min': '9',
	    	            'max': '15',
	    	        }                 
	    	    },                  
	    	    // Specify the validation error messages
	    	    'messages': {  
	    	         rowdata: {
	    	             'min': "<?php __('min9Chars')?>",
	    	             'max': "<?php __('max15Chars')?>",
	    	         }
	    	    },
	    	  };
			
			if (inValidate(validation)) {
	    	$("#d"+arr[1]).attr("class","space_check  numeric_check form-change");
			$('#savedestinations').removeAttr("onclick","");
			$('#updateOdsentry').removeAttr("class");
		    $('#savedestinations').removeAttr("class", "showhighlight_buttonleft");
		    $('#updateOdsentry').attr("class", "button-right-disabled");
	    	    return false;
	    	  } 
			  else{
			  	jQuery('#savedestinations').attr("onclick", "javascript:saveOdsentry(this);");
				jQuery('#savedestination').attr("class", "showhighlight_buttonleft");
            	jQuery('#savedestinations').attr("class", "showhighlight_buttonleft");
            	jQuery('#destid').val(CurrId);

            	jQuery('#updateOdsentry').removeAttr("class");
            	jQuery('#updateOdsentry').attr("class", "button-right-hover");
			  }*/
		   

			 $("input.numeric_check").focus(function(e) {	
			 //make button heightlighted when there is unsaved destination
			 	$('#savedestinations').addClass('showhighlight_buttonleft');
				$('#updateOdsentry').removeClass('button-right-disabled');
				$('#updateOdsentry').addClass('button-right-hover');
			 
			 
			 
			 
			 
	 //  if ($("#d"+arr[1]).val().length < 3) {
  //            $('#overlay-error .error .message').text("<?php __('min3Chars') ?>");
  //            $('#overlay-error').removeClass('hide');
             
		// 	$("#d"+arr[1]).addClass("form-changeinvalidate");
		// 	$('#savedestinations').removeAttr("onclick","");
		// 	$('#updateOdsentry').removeAttr("class");
		//     $('#savedestinations').removeAttr("class", "showhighlight_buttonleft");
		//     $('#updateOdsentry').attr("class", "button-right-disabled");
			
		// 	$('#overlay-sucess').addClass('hide');	
			       
  //            return false;  
                   
  //         }
		// else if ($("#d"+arr[1]).val().length > 15) {
  //            $('#overlay-error .error .message').text("<?php __('max15Chars') ?>");
  //            $('#overlay-error').removeClass('hide');     
			 
		// 	 $("#d"+arr[1]).addClass("form-changeinvalidate");
		// 	 $('#savedestinations').removeAttr("onclick","");
		// 	 $('#updateOdsentry').removeAttr("class");
		//      $('#savedestinations').removeAttr("class", "showhighlight_buttonleft");
		//      $('#updateOdsentry').attr("class", "button-right-disabled");        
             
  //           return false;        
  //         }
		  
		
		  
		 //  else{
		 //  	jQuery('#savedestinations').attr("onclick", "javascript:saveOdsentry(this);");
   //          jQuery('#savedestinations').attr("class", "showhighlight_buttonleft");
   //          //jQuery('#destid').val(CurrId);

   //          jQuery('#updateOdsentry').removeAttr("class");
   //          jQuery('#updateOdsentry').attr("class", "button-right-hover");
			// $('#overlay-sucess').addClass('hide');
		 //  }
		  
	  
    });
			
			
			
			
        });
	//called when key is pressed in textbox
    $("input.numeric_check").keypress(function(e) {	
	//alert("kk");
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57) && e.which!=13)
      {        
        
		$('#overlay-error .error .message').text("<?php __('digitsOnly') ?>");
        $('#overlay-error').removeClass('hide');
		$('#savedestinations').removeAttr("onclick","");
			
        return false;
		
      }
	  
	   else {	      	
      		//$("input").keydown(function() {
	          //inValidate(validation, 'keyup');                    
	        //});
            jQuery('#savedestinations').attr("onclick", "javascript:saveOdsentry(this);");
            jQuery('#savedestinations').attr("class", "showhighlight_buttonleft");
            //jQuery('#destid').val(CurrId);

            jQuery('#updateOdsentry').removeAttr("class");
            jQuery('#updateOdsentry').attr("class", "button-right-hover");
      }
        });

    }
    $(document).ready(function() {
		
		// validation = {
  //   	    // Specify the validation rules
  //   	    'rules': {                     
  //   	        'Id':{
		// 			'required': true,
  //   	            'max': '30',
  //   	        }
                                  
  //   	    },                  
  //   	    // Specify the validation error messages
  //   	    'messages': {  
  //   	        'Id': {
		// 			'required': "<?php __('ScenarioNameNotempty')  ?>",
  //   	             'max': "<?php __('max30Chars')?>",
  //   	         }
    	         
  //   	    },
  //   	  };
		
        $('.counter').hide();
		
		$('.deldest').hide();
		$('.cntchk_updatemsg2').hide();
        $('#savescenariotitle').click(function() {
            var scenario_name = jQuery('.scenarios').val();
			 //if (inValidate(validation)) { 
				
				//in$('#overlay-sucess').addClass('hide');
			//	return false;
			//}else{
							
            var scenario_id = '<?php echo $scenario_id; ?>';
            var customer_id = '<?php echo $customer_id; ?>';
            var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/update_scname/scenario_id:" + scenario_id + "/customer_id:" + customer_id + "/scenario_name:" + scenario_name;
            jQuery.post(TargetURL, function(data) {
                var msgd = data;

               
                
                window.location.href = "<?php echo Configure::read('base_url'); ?>scenarios/edit/scenario_id:" + msgd;

				$('#overlay-sucess .ok .message').text("<?php __('Scenario succesfully added') ?>");
		        $('#overlay-sucess').removeClass('hide');
             

		       //$('#add_numbers').click();	
			   
				url = '<?php echo Configure::read('base_url');?>dns/selectdns/scenario_id:' + msgd;

                //alert(url);
			   //$('#add_numbers').attr('href', url);
			   //$('#add_numbers').click();
			   //$("#add_numbers").trigger("click");
               //jQuery('#scenariossuccess').html('<font class="scenarioupdatemsg">Scenario updated successfully!</font>');

            });
           
			//}
        });

        $('#crm_comment_option').val('');
    });


	validation = {
                // Specify the validation rules
        'rules': {                     
          
            'destname':{
            	'leading': '0',
                'min': '9',
                'max': '15',
                'excludeStr': ['084', '0800', '090', '00870','00881', '00882', '00883', '0039310']
                
              }  
                              
        },                  
        // Specify the validation error messages
        'messages': {            
            'destname': {
             	'leading' : "<?php __('leadingZeroOds')?>",
                'min': "<?php __('min9Chars')?>",
                'max': "<?php __('max15Chars')?>",
                'excludeStr' : "<?php __('excludeNumber')?>"
            }
        }
    };


    $("body").on('keyup', 'input, textarea', function() {  
  
	    var form = $(this).parents('form:first');
//	    var invalidate = form.attr("invalidate");
	    var classinvalidate = form.attr("classinvalidate");

	    var oldVal = $(this).val();   
	    
	    var priorVal = $(this).attr('data-value'); 
	    
	    if (priorVal != '' && oldVal != priorVal) {
	        $(this).addClass('form-change');
			$('#overlay-sucess').addClass('hide');
	    }   
		

		if (typeof classinvalidate != "undefined") {       

	      $("input, textarea").keyup(function() { 
	     
	        classInValidate(validation, 'keyup', $(this)); 
			$('#overlay-sucess').addClass('hide');      

	      });                 

	    } else {
	      console.log("no validation");
		  $('#overlay-sucess').removeClass('hide');
	    }
	});

	
    function saveOdsentry(id) {
        //alert(id);
    
        if (classInValidate(validation)) {        
          return false;
        } else {
        
                    
        var senddata = [];
		var rowdata = [];
		var dstname = [];
        jQuery('.changedodsentry').each(function() {

            var style = jQuery('.saveOdsentry').attr('style');
            var rowid = jQuery(this).attr('id');
            var attrlen = rowid.length;
            var Orowid = rowid.substring(2, attrlen);
            var Dbrowid = rowid.substring(3, attrlen);
            var Destval = jQuery('#d' + Dbrowid).val();
            senddata.push(Dbrowid + "=" + Destval);
			rowdata.push(Dbrowid);

        });

        var serialized = senddata.join("&")
		
		//var dstname="'d"+rowdata+"'";
		//alert(rowdata);
		
		
		
		/*validation = {
	    	    // Specify the validation rules
	    	    'rules': {
	    	        rowdata:{
	    	            'min': '9',
	    	            'max': '15',
	    	        }  
	                                  
	    	    },                  
	    	    // Specify the validation error messages
	    	    'messages': {  
	    	         rowdata: {
	    	             'min': "<?php __('min9Chars')?>",
	    	             'max': "<?php __('max15Chars')?>",
	    	         }
	    	    },
	    	  };
			
			if (inValidate(validation)) {
	    		  
	    	   // return false;
	    	  } else {*/
		
		
		
		
		
		
        var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/updatemultipleodsentry/";
        var ScenarioId = $('#scenario_id').val();
        $('.black_overlay').show();
        jQuery.post(TargetURL, {'odsdata': serialized, 'scenario_id': ScenarioId}, function(data) {
        	$(".form-change").removeClass("form-change");
        	$(".hightlightbox").removeClass("hightlightbox");        	
            jQuery('#destid').val('');
            jQuery('.saveOdsentry').attr("style", "display:none");
            jQuery(' .trickOdsentry').attr("style", "display:inline");
            jQuery('#updateOdsentry').removeAttr("class");
            jQuery('#savedestinations').removeAttr("class");
            jQuery('#updateOdsentry').attr("class", " button-right-disabled");
            jQuery('#savedestinations').removeAttr("onclick");
			
			//make destination field heighlighted
			
			var numeric_text=$("input.numeric_check").each(function() {

			var num_val=$(this).val();

			if(num_val!="")
			{
				$('#overlay-sucess').addClass('hide');
			}
			

		});     
						
			
            // Update Scenario Status
            var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/ScenarioCompletedOrNot/scenario_id:" + ScenarioId;

            jQuery.post(TargetURL, function(response) {
				
				
                jQuery('#Status').val(response);
                jQuery('#sts').html('ScenarioStatus ' + response);
                var msgd = response.trim();
                if (msgd != "Incomplete") {
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
                var val = jQuery('#' + sid).val();
                var RowId = sid.substring(1, sid.length);
                if (val != '') {
                    jQuery('.sc_state_medium' + RowId).html('Valid');
                }
            });

            setTimeout(function() {
                $('.black_overlay').hide();
            }, 500);

        });
        }//end validation check else
		
    }
    function toggleAdvanceSearch() {
        //$("#advancesearch").show
        if (document.getElementById('advancesearch').style.display == 'none') {
            document.getElementById('advancesearch').style.display = 'block';
        } else {
            document.getElementById('advancesearch').style.display = 'none';
        }

    }
    function toggleShowHistory() {
        //$("#advancesearch").show
        if (document.getElementById('showhistory').style.display == 'none') {
            document.getElementById('showhistory').style.display = 'block';
        } else {
            document.getElementById('showhistory').style.display = 'none';
        }
    }
    function toggleexecutionschedule() {
        //$("#advancesearch").show
        if (document.getElementById('showexecution').style.display == 'none') {
            document.getElementById('showexecution').style.display = 'block';
        } else {
            document.getElementById('showexecution').style.display = 'none';
        }

    }
    function toggleodsentries() {
        //$("#advancesearch").show
        if (document.getElementById('showods').style.display == 'none') {
            document.getElementById('showods').style.display = 'block';
        } else {
            document.getElementById('showods').style.display = 'none';
        }

    }
</script>



<style>
    .tablesorter-filter
    {
        width:100% !important;
		margin: 0 -2px !important;
    padding: 4px 1px !important;
    }
    .space_check
    {
        width:91%;
        height:auto !important;
        margin-bottom:0 !important;
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
        border-bottom:#D1D1D1 1px solid !important; border-right: 1px solid #D1D1D1 !important;border-top:#D1D1D1 1px solid !important; border-radius:0px !important;	border-left: 1px solid #D1D1D1!important;
    }
.tablesorter-filter-row td
	{
		 border-right: 1px solid #D1D1D1 !important;border-top:#D1D1D1 1px solid !important; border-radius:0px !important;border-left: 1px solid #D1D1D1!important;
		 padding: 4px 30px 4px 14px  !important;
	}
    .tablesorter-icon {
        background-image: url("../../images/assets/table-sort-default.gif");
    }
#mcTooltipWrapper {
	display:none;
}
.t_Tooltip{
	display:none !important;
}
.tablesorter-bootstrap .tablesorter-header i {
    background-repeat: no-repeat;
    display: inline-block;
    float: right!important;
    height: 14px;
    left: 6px;
    line-height: 14px;
    margin-top: 10px!important;
    position: absolute; 
    width: 12px;
}
.tablesorter-bootstrap .tablesorter-header-inner {
    font-size: 11px;
    padding: 0px 10px 4px 0!important;
    position: relative;
}
.counter {
    color:#555555;
    font-size: 11px;
    margin-left: 5px !important;
    margin-top: -34px !important;
    position: absolute;
}


.tablesorter-filter
    {
        width:100% !important;
		margin: 0 -2px !important;
        padding: 4px 1px !important;
		height:26px!important;
    }
	
	.tablesorter-bootstrap .tablesorter-filter-row td {
    background: none repeat scroll 0 0 #EEEEEE;
    line-height: normal;
    padding: 4px 3px;
    text-align: center;
    transition: line-height 0.1s ease 0s;
    vertical-align: middle;
}
.table th, .table td {
    border-top: 1px solid #DDDDDD;
    line-height: 20px;
	 padding: 1px 14px;  
        border:none;
        background-color:#fff !important;
    
	padding-left:3px!important;
    text-align: left;
    vertical-align: top;
}	

</style>

<script type="text/javascript">
    function deleteOdsentry(record_id, scid, elem) {
        $.post(base_url + 'odsentries/delete/' + record_id + '/' + scid, {}, function(data) {
            //$('#'+record_id).closest('tr').remove();
            alert('Record is deleted successfully');
            $('#reloadwholdpagedata').html(data);
            /*if(data=="success"){
             $('#'+record_id).closest('tr').remove();
             alert('Record is deleted successfully');
             }*/
        });
    }
    function submit_form(action) {
        //alert(action);
        $('.filtersForm').attr('action', base_url + 'odsentries/index/' + action);
        $('.filtersForm').attr('method', 'POST');
        $.ajax({
            type: "POST",
            async: false,
            dataType: 'json',
            url: $('.filtersForm').attr('action'),
            data: $('.filtersForm').serialize(),
            success: function(data) {  //alert(data);
                if (data.message == "updated") {
                    alert(data.affectedRows + 'Record(s) updated successfully')
                } else {
                    alert('Some error occured, Please try again');
                }
            }
        });
    }

    /* ### Change Pagination style Script ### */
    $(document).ready(function() {
		
		
        paginationStyle();
        $('.pagerscenarioedit a').click(function() {
            paginationStyle();
        });
        function paginationStyle() {
            setTimeout(function() {
                $(".tablesorter-filter").keypress(function() {
                    paginationStyle();
                });
				$(".tablesorter-filter").change(function() {
                    paginationStyle();
                });
				$(".tablesorter-header-inner").click(function() {
                    paginationStyle();
                });
               // $("table").removeClass('table-striped');
               // $("table").removeClass('tablesorter-bootstrap');
                var pageDisplay = $(".pagedisplay").text();
                temp = pageDisplay.split(" -");
				page2 = temp[1].split("/");
				page3=page2[1].split("(");
				var showrecord = page3[0];
                //console.log(temp);
                left = temp[0] / 10;
                box = left;
                if (temp[0] % 10 > 0) {
                    box = parseInt(left) + 1;
					
                }
                if (typeof temp[1] == 'undefined') {
                    return false;
                }

                right = temp[1].split("/ ");

                rightKey = right[1].split(" ");

                right = rightKey[0] / 10;

                if (rightKey[0] % 10 >= 0) {
                    totalPage = parseInt(right) + 1;

                }
				
				$('.countdisplay').html(showrecord);
				

               $(".pagedisplay").text('');
               var newStyle = "<input type='text' name='currpage' value='" + box + "' style='width:25px;text-align:center;float: inherit;' maxlength='3' class='GoOnTargetPage'>";
               newStyle += "<span style='font-weight:bold'> <?php __('Of') ?> " + totalPage + "</span>";
              $(".pagedisplay").html(newStyle);
                $('.GoOnTargetPage').keyup(function() {
                    //console.log($(this).val());
                    $("input[type='text']").keypress(function(e) {
                        if (e.which == 13) {
                            $('.pagenum').val($(this).val()).trigger('change');
                            paginationStyle();
                            //return false;
                        }
                    });
                });

            }, 1000);
        }//
    });

    jQuery(function() {
        jQuery.extend(jQuery.tablesorter.themes.bootstrap, {
            // these classes are added to the table. To see other table classes available,
            // look here: http://twitter.github.com/bootstrap/base-css.html#tables	
        });
        // call the tablesorter plugin and apply the uitheme widget
        jQuery(".tablesorterscenario").tablesorter({
            // this will apply the bootstrap theme if "uitheme" widget is included
            // the widgetOptions.uitheme is no longer required to be set
            theme: "bootstrap",
            widthFixed: true,
            bFilter: false,
            bInfo: false,
            icons: '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
            sortNone: 'bootstrap-icon-unsorted',
            sortAsc: 'icon-chevron-up',
            sortDesc: 'icon-chevron-down',
            headerTemplate: '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			sortList: [[0,1],[1,0]],
            // widget code contained in the jquery.tablesorter.widgets.js file
            // use the zebra stripe widget if you plan on hiding any rows (filter widget)
            widgets: ["uitheme", "filter", "zebra"],
            widgetOptions: {
                // using the default zebra striping class name, so it actually isn't included in the theme variable above
                // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
                zebra: ["even", "odd"],
                // reset filters button
                filter_reset: ".reset"

                        // set the uitheme widget to use the bootstrap theme class names
                        // this is no longer required, if theme is set
                        // ,uitheme : "bootstrap"
            },
            headers: {
                0: {sorter: false, filter: false},
                1: {sorter: true, filter: true},
                2: {sorter: 'digit'},
                4: {sorter: false, filter: false},
                6: {sorter: false, filter: false}

            }
        })
                .tablesorterPager({
                    // target the pager markup - see the HTML block below
                    container: jQuery(".pagerscenarioedit"),
                    // target the pager page select dropdown - choose a page
                    cssGoto: ".pagenum",
                    initWidgets: true,
                    // remove rows from the table to speed up the sort of large tables.
                    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
                    removeRows: false,
                    // output string - default is '{page}/{totalPages}';
                    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
                   // output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
                    //  output: 'Page <input type="text" name="currpage" value="{page}" class="pagination_text" maxlength="3"> Of {totalPages}'
					 output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'
                });

        jQuery(".smallwidth").focus(function() {
            var valueToFind = jQuery(this).val();
            if (valueToFind == 'DN From' || valueToFind == 'DN To') {
                jQuery(this).val('');
            } else {
                jQuery(this).val(valueToFind);
            }
        });

        jQuery(".smallwidth").focusout(function() {
            var valueToFind = jQuery(this).val();
            if (valueToFind == '' || valueToFind == '') {
                var id = jQuery(this).attr('id');
                if (id == 'min')
                    jQuery(this).val('DN From');
                else if (id == 'max')
                    jQuery(this).val('DN To');
            }
        });

        jQuery("#filter_now").click(function() {
            var MinVal = jQuery('#rangeMinMinval').val();
            var MaxVal = jQuery('#rangeMaxMaxval').val();

            if ((MinVal.length < 9 || MinVal.length > 9) && (MaxVal.length < 9 || MaxVal.length > 9)) {
                alert('Filter Range From and To Must Be 9 digits!');
                return false;
            } else {

                if (isNaN(MinVal) || isNaN(MaxVal)) {
                    alert('Filter Range must be numeric only!');
                    return false;
                } else {
                    jQuery("#form").submit();
                }
            }
        });

        jQuery("#reset_filter").click(function() {
            jQuery('#rangeMinMinval').val('');
            jQuery('#rangeMaxMaxval').val('');
            jQuery("#form").submit();
        });

        jQuery(".deldest").click(function() {
            jQuery('input[type="checkbox"]:checked').each(function() {
                var Odsentryid = jQuery(this).val();
                var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/deletedest/dest_id:" + Odsentryid;
                jQuery.post(TargetURL, function(data) {
                    jQuery("#firstchild" + data).parents("tr").hide();
                });
                jQuery("#firstchild" + Odsentryid).parents("tr").hide();
            });

            jQuery('input[type="checkbox"]:checked').each(function() {
                jQuery(this).attr("checked", false);
            });

            setTimeout(function() {
                window.location.reload();
            }, 1000);
        });

        /*Check All / Uncheck All functionality*/
        jQuery("#checkAll").click(function() {
            if (jQuery("#checkAll").is(':checked')) {

                $('.counter').show();
				$('.deldest').show();
				$('.cntchk_updatemsg2').show();
				
				// var arr = CurrId.split('d');
		   
                var noofrecord = 0;
                jQuery('input[type="checkbox"]').each(function() {

                    var CClass = jQuery(this).parents("tr").attr('class');
                    if (CClass.indexOf("filtered") == -1) {
                        var attrid = jQuery(this).attr('id');
						
						var dataattr = attrid.split('chk');
						
						$("#d"+dataattr[1]).attr("class","space_check  numeric_check form-change");

                        jQuery('#' + attrid).removeAttr('class');
                        jQuery('#' + attrid).prop("checked", true);
                        noofrecord++;
                    }
                });
                $('.counter').text(noofrecord - 1 + " <?php echo __('records are selected'); ?>");
				//$('.cnt').text("<?php echo __('Update scenario Selected'); ?> : " + (noofrecord - 1 ));

            } else {
                jQuery('input[type="checkbox"]').each(function() {
                    jQuery(this).removeAttr("checked");
                    $('.counter').text("0" + " <?php echo __('records are selected'); ?>");
					$('.cnt').text("");
					$('.cntchk_updatemsg2').hide();
                    $('.counter').hide();
					$('.deldest').hide();
					// when multiple update all dest fields are blue
					   var attrid = jQuery(this).attr('id');						
						var dataattr = attrid.split('chk');						
						$("#d"+dataattr[1]).attr("class","space_check  numeric_check ");
                });
            }
        });

        jQuery('.odsentchk').click(function() {
            var noofrecord = 0;
            jQuery("#checkAll").removeAttr("checked");
            $('.counter').show();
			
			$('.deldest').show();
			$('.cntchk_updatemsg2').show();
		
			
						
            jQuery('input[type="checkbox"]').each(function() {
			// when multiple update all dest fields are blue
					  var attrid = jQuery(this).attr('id');						
						var dataattr = attrid.split('chk'); 
                 if ($(this).is(':checked')) {
																
						$("#d"+dataattr[1]).attr("class","space_check  numeric_check form-change");
                    noofrecord++;
                }
				else{
					$("#d"+dataattr[1]).attr("class","space_check  numeric_check ");
				}
				
            });
			
			
            if (noofrecord < 1)
            {
                $('.counter').hide();
				$('.deldest').hide();
				$('.cntchk_updatemsg2').hide();
										
									
            }
            $('.counter').text(noofrecord + " <?php echo __('records are selected'); ?>");
			//$('.cnt').text("<?php echo __('Update  Selected'); ?> : " + (noofrecord ));

        });


        jQuery('.dosorting').click(function() {
            jQuery('input[type="checkbox"]').each(function() {
                jQuery(this).removeAttr("checked");
            });
        });

    });

    function saveToLog(action) {
			
        var comment = $('#crm_comment_option').val();
        var scenario_id = '<?php echo $scenario_id; ?>';
        var cust_id = '<?php echo $SELECTED_CUSTOMER; ?>';
        $.post(base_url + "scenarios/validates/" + scenario_id, {'log_entry': action, 'comment': comment, 'cust_id': cust_id}, function(data) { //alert(data);
            if (data) {
                //alert("Scenario "+action);
                if (data == "scenario_accepted") {
                    $('#sc_state').text('5');
                    //window.location.reload();
                } else if (data == "scenario_rejected") {
                    $('#sc_state').text('6');
                    //window.location.reload();

                } else if (data == "scenario_validate_requested") {
                    $('#sc_state').text('3');
                    //alert("scenario_validate_requested");
                    //window.location.href = base_url + "scenarios/index/" + cust_id;
                    //window.location.href = "<?php echo Configure::read('base_url'); ?>scenarios/index/<?php echo $SELECTED_CUSTOMER; ?>";
					window.location.href = "<?php echo Configure::read('base_url'); ?>scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER; ?>";
                    
                }
                url = "<?php echo Configure::read('base_url'); ?>scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER; ?>";
                //alert(url);
                window.location.href = url;
                
                //window.location.reload();
            }
        });

    }

</script>

<script type="text/javascript">
    function selectAll(x) {
        for (var i = 0, l = x.form.length; i < l; i++)
            if (x.form[i].type == 'checkbox' && x.form[i].name != 'sAll')
                x.form[i].checked = x.form[i].checked ? false : true
    }
</script>
<script>
    function dispinput(val) {
        if (val == "nm") {
            jQuery('#inpt').fadeIn();
            jQuery('#nm').fadeOut();
        }
    }
</script>
<script>
    jQuery(document).ready(function() {
        jQuery('input#inpt').keypress(function(e) {
            if (e.which == '13') {

                var scenerio_name = jQuery('#inpt').val();
                var scenerio_id = '<?php echo $scenario_id; ?>';
                var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/edittitles/scenerio_id:" + scenerio_id + "/scenerio_name:" + scenerio_name;

                jQuery.post(TargetURL, function(data) {

                    jQuery("#nm").html(data);
                    jQuery('#nm').fadeIn();
                    jQuery('#inpt').fadeOut();
                    jQuery('#Id').val(data);

                });
            }
        });
    });

function chngbkcolor2(obj) {
			  $(document).ready(function() {
				  $('#savescenariotitle').attr("class", "showhighlight_buttonleft");
				  $('#updatescenario').removeAttr("class");
				  $('#updatescenario').attr("class", "button-right-hover");

			  });
		  }
</script>


<!--######## Start  Save Leave Page Event #################-->
<?php $leaveStatus = Configure :: read('leaveStatus'); ?>
<?php if ($leaveStatus[0] == "on") { ?>
    <script language="JavaScript">
        var ids = new Array('destid');
        var values = new Array('');

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
<input type="hidden" name="odscount" id="odscount" value="<?php echo $odscount; ?>">

<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>">

<div class="update_message"></div>



<div id="overlay-error" class="notification first hide" style="width: 100%" >
    
    <div class="error">
        <div class="message">
            
        </div>
    </div>
</div>

<div id="overlay-sucess" class="notification first hide" style="width: 100%" >
    
    <div class="ok">
        <div class="message">
            
        </div>
    </div>
</div>

<?php
#-----------------------------------------------------------------#
# $Rev:: 22            $:  Revision of last commit                #
#-----------------------------------------------------------------#
//echo $form->create(null, array('id' => 'LocationEditForm', 'url' => array('controller' => 'locations', 'action' => 'update/'.$location_id),'accept-charset'=>'ISO-8859-1'));


if((isset($success)) && $success){?>
	
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
							_("Xml Server is not responding");
						else
							__("There was a problem in applying the changes.");
					?>
				</div>
			</div>
		</div>
	<?php }
		else { echo '<br>'; }

/*
 * Add New Scenario Page
*/
if (empty($scenarioDetails)) {
    ?>
	<script>
		$(document).ready(function() {
		$('#overlay-sucess .ok .message').text("<?php __('please add Scenario details') ?>");
		$('#overlay-sucess').removeClass('hide');
      });
	</script>
    <h4 style="margin-left:5px;"><?php echo __('scenarioName'); ?><?php echo $scenarioDetails[0]['Scenario']['Name'] ?>
		
		
	</h4>
    <p style="margin-left:10px;"><?php echo __('createText', true) ?>
	
    <form id="form" invalidate='invalidate' class="filtersForm" action="<?php echo Configure::read('base_url'); ?>scenarios/edit/scenario_id:<?php echo $scenario_id; ?>" enctype="multipart/form-data" method="POST">    
        <input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id; ?>" />
        <br>
        <div class="form-box">
            <div class="form-left">
                <?php
                echo '<div style="width:100px; float: left;margin-left:10px;">' . __('scenarioName', true) . '</div>';
                echo $form->input('Id', array('label' => false, 'value' => $scenarioDetails[0]['Scenario']['Name'], 'class' => 'scenarios form-changevalidate', 'style' => 'width:150px;','onkeyup'=>'chngbkcolor2(this)'));
                ?>		
                <div id="scenariossuccess"></div>					
            </div>
            <div class="form-box" style="margin-right: 10px;" >
                <div class="button-right" id="updatescenario">
                    
                    <a id="savescenariotitle"  href="javascript:void(0);"  onclick="namevalidate();"><?php echo __('next1NewScenario') ?></a>
                </div>

            </div>	
					            				
                    		
        </div>
    </div>
    <?php
} else {
    ?>


    <?php $scenarioStatus = Configure :: read('scenarioStatus'); ?>

    <!--   <div id="content"> -->
    <h4><?php echo __('scenarioName'); ?>  <?php echo trim($scenarioDetails[0]['Scenario']['Name']); ?>
	
	
	<!--<a href="javascript:void(null)" id="edit_stat" style=" " onclick="set_visimenu('dispmenu')"  <?php echo $readonly; ?>><?php __("ScenarioEditOptions"); ?> </a>-->
	
       <!--<a data-title="Enter Scenario Name" data-placement="right" data-type="text" id="scenerio_name" href="#" class="editable editable-click" data-original-title="" title="" style="display: inline;"><?php echo trim($scenarioDetails[0]['Scenario']['Name']); ?> <span style="padding-left:45px;"></span></a>-->
       <?php /* ?> <span style="color:darkblue;" id="nm" onclick="dispinput('nm');"><?php echo $scenarioDetails[0]['Scenario']['Name']?></span>
         <input type="text" id="inpt" name="title" value="<?php echo $scenarioDetails[0]['Scenario']['Name']?>" style="display:none; width:150px;"/>

         <span style="float:right;" id="sts"><?php echo __('scenarioStatus') . ''  . $scenarioStatus[$scenarioDetails[0]['Scenario']['status']];	?>
         </span> 
        <?php */ ?>

        <span style="float:right;" id="sts"><?php echo __('ScenarioStatus') . ' ' . __($scenarioStatus[$scenarioDetails[0]['Scenario']['status']], true); ?>		
        </span>

    </h4>

    <form id="form" classinvalidate='classinvalidate' class="filtersForm" action="<?php echo Configure::read('base_url'); ?>scenarios/edit/scenario_id:<?php echo $scenario_id; ?>" enctype="multipart/form-data" method="POST">    
        <input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id; ?>" />
        <br>
        <!-- 
        <div class="form-box">
               <div class="form-left">
                       
    <?php
    echo '<div style="width:100px; float: left">' . __('scenarioName', true) . '</div>';
    echo $form->input('Id', array('label' => false, 'value' => $scenarioDetails[0]['Scenario']['Name'], 'class' => 'scenarios', 'style' => 'width:150px;'));
    ?>		
                               <div id="scenariossuccess"></div>					
               </div>
               <div class="form-right">
        <?php
        echo '<div style="width:100px; float: left">' . __('Status', true) . '</div>';
        echo $form->input('Status', array('label' => false, 'value' => $scenarioStatus[$scenarioDetails[0]['Scenario']['status']], 'style' => 'width:150px;', 'readonly' => 'true'));
        ?>		
                               
               </div>				
       </div>
       
        -->
	
        <div class="form-box">
		   
               
                <div class="form-left" id="edit_stat_popupmenu" style="display: block">
                
                <div>	<span  id="edit_stat" style="margin-left:15px; float:left;cursor:default;font-weight: bold;"   <?php echo $readonly; ?>><?php __("ScenarioEditOptions"); ?> </span></div>
				<br>
	      				   <ul style="margin: 0 0 0 14px">
      
                                <?php
                                if(($userpermission == Configure::read('access_id')) && ($_SESSION['VIEWMODE'] != 'EXTERNAL') && ($scenarioDetails[0]['Scenario']['status'] >3))
                                
                                {?>
								
								<?php 
                                if($scenarioDetails[0]['Scenario']['status'] == 4)#inactive
                                {?>	
                                <li class="schedule">
                                <?php #echo $html->link(__('addCombox', true),'');?>
                                <a href="<?php echo Configure::read('base_url');?>scenarios/edit/scenario_id:<?php echo $scenarioDetails[0]['Scenario']['id']?>&mode=operate" onMouseOver="Tip('<?php echo __('operate') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); "><?php echo __("operate", true); ?></a>    
                                </li>
                                <?php } ?>
								
                                <!--<li class="schedule">
                                
                                <a href="<?php echo Configure::read('base_url');?>scenarios/edit/scenario_id:<?php echo $scenarioDetails[0]['Scenario']['id']?>&mode=operate" onMouseOver="Tip('<?php echo __('operate') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); "><?php echo __("operate", true); ?></a>    
                                </li>-->
                                <li class="schedule">
                                <?php #echo $html->link(__('addCombox', true),'');?>
                                <a href="<?php echo Configure::read('base_url');?>scenarios/scriptdetails/<?php echo $scenarioDetails[0]['Scenario']['id']?>" onMouseOver="Tip('<?php echo __('viewScript') ?>', BALLOON, true, ABOVE, false);" class="fancybox fancybox.ajax" onMouseOut="UnTip(); " ><?php echo __("viewScript", true); ?></a>    
                                </li>
                                <li class="schedule">
                                <?php #echo $html->link(__('addCombox', true),'');?>
                                <a href="<?php echo Configure::read('base_url');?>scenarios/scriptsummary/<?php echo $scenarioDetails[0]['Scenario']['id']?>" onMouseOver="Tip('<?php echo __('viewSummary') ?>', BALLOON, true, ABOVE, false);" class="fancybox fancybox.ajax" onMouseOut="UnTip(); " ><?php echo __("viewSummary", true); ?></a>    
                                </li>
                                
                     			<?php 
                                }
                                
                                if(($scenarioDetails[0]['Scenario']['status'] == 1) ||
                                ($scenarioDetails[0]['Scenario']['status'] == 2)||
                                ($scenarioDetails[0]['Scenario']['status'] == 4)||
                                ($scenarioDetails[0]['Scenario']['status'] == 7))
                                {?>
                                <li class="schedule">
                                <?php #echo $html->link(__('addCombox', true),'');?>
									<a class="clicker2" href="<?php echo Configure::read('base_url');?>scenarios/deleteScenario/scenario_id:<?php echo $scenarioDetails[0]['Scenario']['id']?>" onMouseOver="Tip('<?php echo __('deleteScenarioToolTip') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); " ><?php echo __("deleteScenario", true); ?></a>    
                                </li>
                               <?php } ?>
							   
							   <li class="schedule">
							   	<div style="display: none;">
								<?php
								
								
 								echo $html->link(__("addSourceDns", true), array('controller' => 'dns', 'action' => 'selectdns', "scenario_id:$scenario_id/scenario_name:$scenario_name"), array('class' => $selected['DN List'] . " fancybox fancybox.ajax", 'escape' => $readonly, 'id' => 'add_numbers','onMouseOver'=>"Tip('addSourceDns_toolTip', BALLOON, true, ABOVE, false);",'onMouseOut'=>'UnTip()'));
													
								 ?>	</div>		
								 <?php if($scenarioDetails[0]['Scenario']['status'] == 4){ #inactive ?>
								 <a href="javascript:;" id="addSourceDns" class="clicker3" onMouseOver="Tip('addSourceDns_toolTip', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); "><?php echo __("addSourceDns", true); ?></a>
								 <?php } else { 
								 echo $html->link(__("addSourceDns", true), array('controller' => 'dns', 'action' => 'selectdns', "scenario_id:$scenario_id/scenario_name:$scenario_name"), array('class' => $selected['DN List'] . " fancybox fancybox.ajax", 'escape' => $readonly, 'id' => 'add_numbers','onMouseOver'=>"Tip('addSourceDns_toolTip', BALLOON, true, ABOVE, false);",'onMouseOut'=>'UnTip()'));
								 } ?>
							   </li>
                               <li>&nbsp;</li>
                            </ul>
							
<?php
/**
* 
* @Start addSourceDns Confirmation Overlay 
* 
*/
?>							
<div>		

	<div id="modalPopLite-mask" style="width:100%" class="modalPopLite-mask"></div>
	<div id="modalPopLite-wrapper" style="left: -10000px;" class="modalPopLite-wrapper">
		<div class="modalPopLite-child" id="popup-wrapper3">
			<div style="width:300px; height:150px;margin:50px auto;  ">
			<?php echo __('confirmToChangeScenarioTitle');?> <br><br><br>
				<div class="button-left">
				<?php echo $html->link(__("confirmToChangeScenarioInfo", true), 'javascript:void(null)', array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','onclick'=>'javascript:delete_allschedule('.$scenarioDetails[0]['Scenario']['id'].')', 'id' => 'addSourceDns','class'=>'clicker3')); ?>
				</div>
				<a href="#" id="close-btn">	</a>
					
				<div  class="button-right" >
				<?php echo $html->link( __("Cancle", true),'javascript:void(null)',array('onmouseover' => 'hoverButtonRight(this)','onmouseout' => 'outButtonRight(this)','id' => 'close-btn3')); ?>
				</div>
							
			</div>		
		</div>
			
	</div>

</div>
							
							
							
							
	<div>
					

	<div id="modalPopLite-mask" style="width:100%" class="modalPopLite-mask"></div>
	<div id="modalPopLite-wrapper" style="left: -10000px;" class="modalPopLite-wrapper">
<div class="modalPopLite-child" id="popup-wrapper2">
         <div style="width:230px; height:150px;margin:50px auto;  ">
		<?php echo __("ConfirmDeleteScenario")?> <br><br><br>
		 <div class="button-left">
		 
		 
		<?php echo $html->link(__("Ok", true), 'javascript:void(null)', array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','onclick'=>'javascript:deletesource('.$scenarioDetails[0]['Scenario']['id'].')', 'id' => 'request_validation','class'=>'clicker')); ?>
		</div>
		<a href="#" id="close-btn2">
		</a>
		
		<div  class="button-right" >
					<?php echo $html->link( __("Cancle", true),'javascript:void(null)',array('onmouseover' => 'hoverButtonRight(this)','onmouseout' => 'outButtonRight(this)','id' => 'close-btn2')); ?>
         </div>
				
		</div>		
	</div>
	
	
	</div>

	</div>
							
							
                </div>
				
                <div class="form-right" >
        
       		 <!--  <p><?php __('Workflow') ?></p> 
                <div>	<span  id="edit_stat" style="float:left;cursor:default;font-weight: bold;"   <?php echo $readonly; ?>><?php __("Workflow"); ?> </span></div>
				<br>
			-->
               <?php
                   $ActivateWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 4) ? 'display:block;' : 'display:none;';
                   $DeActivateworkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 6) ? 'display:block;' : 'display:none;';
                   $CRMCommentWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 3) ? 'height:40px;display:block;' : 'height:40px;display:none;';
                   $CompleteWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 2) ? 'display:block;' : 'display:none;';
                   $RejectWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 8) ? 'display:block;' : 'display:none;';
                   $InvalidWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 1) ? 'display:block;' : 'display:none;';
               ?>				
                   <p id="crm_comment_workflow" style="<?php echo $CRMCommentWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_3) ?> </p>                           
                   <p id="complete_workflow" style="<?php echo $CompleteWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_2) ?></p>
                   <p id="reject_workflow" style="<?php echo $RejectWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_8) ?></p>
                   <p id="activate_workflow" style="<?php echo $ActivateWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_4) ?></p>
                   <p id="deactivate_workflow" style="<?php echo $DeActivateworkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_6) ?></p>
                   <p id="invalid_workflow" style="<?php echo $InvalidWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_1) ?></p>	            
			</div>
				
				<?php /* ?>
                <div class="form-right">
        
       			 <!--  <p><?php __('Workflow') ?></p> -->

               <?php
                   $ActivateWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 4) ? 'display:block;' : 'display:none;';
                   $DeActivateworkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 6) ? 'display:block;' : 'display:none;';
                   $CRMCommentWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 3) ? 'height:120px;display:block;' : 'height:120px;display:none;';
                   $CompleteWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 2) ? 'display:block;' : 'display:none;';
                   $RejectWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 8) ? 'display:block;' : 'display:none;';
                   $InvalidWorkflowDisplay = ($scenarioDetails[0]['Scenario']['status'] == 1) ? 'display:block;' : 'display:none;';
               ?>				
                   <p id="crm_comment_workflow" style="<?php echo $CRMCommentWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_3) ?></p>                           
                   <p id="complete_workflow" style="<?php echo $CompleteWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_2) ?></p>
                   <p id="reject_workflow" style="<?php echo $RejectWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_8) ?></p>
                   <p id="activate_workflow" style="<?php echo $ActivateWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_4) ?></p>
                   <p id="deactivate_workflow" style="<?php echo $DeActivateworkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_6) ?></p>
                   <p id="invalid_workflow" style="<?php echo $InvalidWorkflowDisplay; ?>"><?php __(scenarioEditWorkflowText_1) ?></p>	            
			</div>
			<?php */ ?>
		</div>

        <!-- Display buttons for actions -->
        
        


        
        
        <?php
        #$ActivateButtonDisplay = ($scenarioDetails[0]['Scenario']['status'] == 4) ? 'display:block;' : 'display:none;';
        #$DeActivateButtonDisplay = ($scenarioDetails[0]['Scenario']['status'] == 6) ? 'display:block;' : 'display:none;';
        $ActivateButtonDisplay ='display:none;';
        $DeActivateButtonDisplay = 'display:none;';
        
        $CRMCommentDisplay = ($scenarioDetails[0]['Scenario']['status'] == 3) ? 'height:120px;display:block;' : 'height:120px;display:none;';
        $RequestForValidateButtonDisplay = (($scenarioDetails[0]['Scenario']['status'] == 2) || ( $scenarioDetails[0]['Scenario']['status'] == 8)) ? 'display:block;' : 'display:none;';
        ?>					
        <div class="form-box" style="<?php echo $CRMCommentDisplay; ?>" id="crm_comment_div">
            <?php if (($userpermission == Configure::read('access_id')) &&  ($_SESSION['VIEWMODE'] != 'EXTERNAL')) {
                ?>
                <div class="form-left">

                    <?php echo '<div style="width:200px; float: left; margin-left:15px;">' . __('SCM Comment', true) . '</div>';
                    echo $form->input('Log.modification_response', array('type' => 'textarea', 'class' => 'date-pick', 'style' => 'margin:4px 4px 5px 20px;width:220px;', 'label' => false, 'div' => false, 'id' => 'crm_comment_option', 'value' => '', 'default' => ''));
                    ?>
					
					<div style="float:left!important;margin-left:10px;">
					<div class="button-right" >
                        <?php echo $html->link(__("Accept", true), 'javascript:saveToLog("accepted")', array('onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); ?>
                    </div>

                    <div class="button-right">
                        <?php echo $html->link(__("Reject", true), 'javascript:saveToLog("rejected")', array('onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); ?>
                    </div>
					</div>
					
                </div>
               <!-- <div class="form-right">
                    <div class="button-right">
                        <?php echo $html->link(__("Accept", true), 'javascript:saveToLog("accepted")', array('onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); ?>
                    </div>

                    <div class="button-right">
                        <?php echo $html->link(__("Reject", true), 'javascript:saveToLog("rejected")', array('onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); ?>
                    </div>
                </div>-->
                <?php }
            ?>
        </div>   

        <div id="request_validationdiv" class="form-box" style="<?php echo $RequestForValidateButtonDisplay; ?>" >
            <div class="form-left">
                <div class="button-right">
                    <?php echo '' ?>
                </div>
            </div>
            <div class="form-right">
                <div class="button-right">
                    <?php //echo $html->link(__("Request Validation", true), 'javascript:saveToLog("validate_request")', array('onmouseover' => 'hoverButtonRight(this)', 'onclick'=>"return confirm('Are you sure want to request validation');",'onmouseout' => 'outButtonRight(this)', 'id' => 'request_validation')); ?>	

     <?php echo $html->link(__("Request Validation", true), 'javascript:void(null)', array('onmouseover' => 'hoverButtonRight(this)','onmouseout' => 'outButtonRight(this)','class'=>'clicker')); ?>	

                </div>
	<div>
					

	<div id="modalPopLite-mask" style="width:100%" class="modalPopLite-mask"></div>
	<div id="modalPopLite-wrapper" style="left: -10000px;" class="modalPopLite-wrapper">
<div class="modalPopLite-child" id="popup-wrapper">
         <div style="width:230px; height:150px;margin:50px auto;  ">
		<?php echo "Are you sure want to request validation ?";?> <br><br><br>
		 <div class="button-left">
		<?php echo $html->link(__("Ok", true), 'javascript:void(null)', array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);','onclick'=>'javascript:saveToLog("validate_request")', 'id' => 'request_validation','class'=>'clicker')); ?>
		</div>
		<a href="#" id="close-btn">
		</a>
		
		<div  class="button-right" >
					<?php echo $html->link( __("Cancle", true),'javascript:void(null)',array('onmouseover' => 'hoverButtonRight(this)','onmouseout' => 'outButtonRight(this)','id' => 'close-btn')); ?>
                </div>
				
		</div>		
	</div>
	
	
	</div>

				</div>
            </div>
        </div>					  	

        <div class="form-box" style="<?php echo $ActivateButtonDisplay; ?>" id="activationdiv">
            <div class="form-left">
                <p></p>	
            </div>
            <div class="form-right">
                <div class="button-right">
                    <?php 
                    #echo $html->link(__("Activate", true), array('controller' => 'scenarios', 'action' => 'create_schedule/' . $scenario_id . '/create/' . $SELECTED_CUSTOMER . '/0/activate'), array('class' => "fancybox fancybox.ajax", 'onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); 	
					echo $html->link( __("Activate", true),array('controller'=>'scenarios', 'action'=>'confirmapply?scenario_id='.$scenario['Scenario']['id'].'&operation=activate'), array('class'=>"fancybox fancybox.ajax",'id'=>'activateScenario'));
					?>		
                </div>
                <div class="button-right">
                    <?php 
                    echo $html->link(__("View Script", true), array('controller' => 'scenarios', 'action' => 'scriptdetails/' . $scenarioDetails[0]['Scenario']['id']), array('class' => "fancybox fancybox.ajax")); 
                    ?>									  
                </div>	

            </div>
        </div>

        <div class="form-box" style="<?php echo $DeActivateButtonDisplay; ?>" id="deactivationdiv">
            <div class="form-left">
                <p></p>	
            </div>
            <div class="form-right">
                <div class="button-right">
                    <?php 
                    #echo $html->link(__("De-activate", true), array('controller' => 'scenarios', 'action' => 'create_schedule/' . $scenario_id . '/create/' . $SELECTED_CUSTOMER . '/0/deactivate'), array('class' => "fancybox fancybox.ajax", 'onmouseover' => 'hoverButtonRight(this)', 'onmouseout' => 'outButtonRight(this)')); 
                    echo $html->link( __("De-activate", true),array('controller'=>'scenarios', 'action'=>'confirmapply?scenario_id='.$scenario['Scenario']['id'].'&operation=deactivate'), array('class'=>"fancybox fancybox.ajax",'id'=>'deactivateScenario'));
                
                    ?>	
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

          <div style="display:block">
            <h4> <?php echo __('scenarioDetail'); ?> <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleodsentries();" href="javascript:void(0)" style="float:right;">
                    <div style="width:20px;background:#eee; height:20px;" id="pbtn_ods">
                        <div id="plus_ods"></div>
                    </div>
                    <div style="width:20px;background:#eee; height:20px;" id="mbtn_ods">
                        <div id="minus_ods"></div>
                    </div>
                </a>	</h4> 					

        </div>	 	       	
        <?php
        #Check to see whether can edit ODS entries or not.
        #if(($scenarioDetails[0]['Scenario']['status'] == 3) || ($scenarioDetails[0]['Scenario']['status'] == 6) || ($scenarioDetails[0]['Scenario']['status'] == 7)){
        $show = 'block';
        #if (($scenarioDetails[0]['Scenario']['status'] == 1) || ($scenarioDetails[0]['Scenario']['status'] == 2) || ($scenarioDetails[0]['Scenario']['status'] == 3)) {

         #   $show = 'block';
        #}
        if (($scenarioDetails[0]['Scenario']['status'] == 5) || ($scenarioDetails[0]['Scenario']['status'] == 6) || ($scenarioDetails[0]['Scenario']['status'] == 7)) {
            $readonly = 'true';
        }
        ?>		<!--   -->

        <div id="showods" style="display:<?php echo $show; ?>">
            <div style="margin:10px;">
                <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleAdvanceSearch();" href="javascript:void(0)"><?php //__('Advanced Filter') ?></a>
            </div>


<?php $odscount = count($odsEntryList); 
		if($odscount >0){
	 ?>



    <?php
    if (isset($advancedFlag)) {
        ?>	
                <div class="form-box" style="display:block">
                <?php
            } else {
                ?>
                   <div id="advancesearch" class="form-box" style="display:non;margin-left:5px;">
                <?php }
            ?>
<?php  $selectedLanguage = $_SESSION['Config']['language'];
						if($selectedLanguage=='de'){
							 $width = 220;
							 $rangeminwidth = 181;
							 $rangemaxwidth = 145;
							 $filterwidth = 77;
							 
							 $tablewidth=70;
							 
							 }
						else if($selectedLanguage=='fr') {
							 $width = 183;
							 $rangeminwidth = 181;
							 $rangemaxwidth = 145;
							 $filterwidth = 77;
							 
							 $tablewidth=60;
							 }
						else if($selectedLanguage=='it'){
							$width = 146;
							 $rangeminwidth = 181;
							 $rangemaxwidth = 145;
							 $filterwidth = 77;
							 
							 $tablewidth=60;
							 
						}
						else if($selectedLanguage=='en'){
							 $width = 146;
							 $rangeminwidth = 181;
							 $rangemaxwidth = 145;
							 $filterwidth = 77;
							 
							 $tablewidth=60;
						}
					?>

			
			
			<!-- 
               <div class="form-left" style="margin-left: 0px;width:<?php echo $rangeminwidth;  ?>px !important">
                <?php
                echo '<div style="width:85px; float: left">' . __('rangeMin', true) . '</div>';
                echo $form->input('rangeMin.minval', array('style' => 'margin:1px 4px 5px 8px; width:70px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMinval));
                ?>		


                    </div>						
                    <div class="form-right" style="margin-left: 0px;width:<?php echo $rangemaxwidth; ?>px !important">
                        <?php
                        echo '<div style="width:56px; float: left">' . __('rangeMax', true) . '</div>';
                        echo $form->input('rangeMax.maxval', array('style' => 'margin:1px 4px 5px 8px; width:70px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMaxval));
                        ?>		

                    </div>
				<div class="form-left" style="width: <?php echo $width; ?>px !important; margin-top: -9px!important" >
                    <div class="button-right" id="reset_filter">
                        <a id="reset_filter" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php __('Clear') ?></a>
                    </div>	
					<div class="button-right" id="filter_now">
                        <a id="filter_now" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php echo __('filter'); ?></a>
                    </div>												
                    
				</div>
				
				-->
				
                </div>
                   

                <div class="block" style="margin: 0px;">
                 <?php $scenario_name = $scenarioDetails[0]['Scenario']['Name']; ?>
  
                </div>		
                <div class="clear"></div>
                <!-- <div class="button-left"> -->
                <!-- <div style="float:left"> -->
                <div style="padding-left: 5px">
                   <!-- <a href="javascript:void(null)" id="edit_selected_scenario"  onclick="submenuactivity(this, 1)"  <?php echo $readonly; ?>><?php __("editSelected"); ?> </a>	-->				
                    <div class="table-menu" id="edit_selected_scenario_popupmenu">
                        <div class="table-menu-popup" id="table-popup" style="z-index: 1">
                            <ul>
                                <li class="schedule">										
                                   <?php echo $html->link(__("Edit", true), array('controller' => 'scenarios', 'action' => 'opendestupdateview?scenario_id:' . $scenario_id), array('class' => "fancybox fancybox.ajax")); ?>
                                </li>
                                <li class="activate">												
                                    <a class="deldest" href="javascript:void(0);">Delete Selected</a>										
                                </li>
                            </ul>
                        </div>
                    </div>				

                </div>
                <ul class="search_btn_area">
                </ul>
                <div class="clear"></div>	
                <!--<div class="counter" style="font-weight:bold">0: records are selected</div>-->	<br/>

                 <div id="reloadwholdpagedata">
                <?php //echo $this->element('pagination/top');  ?>
                 <div class="pagerscenarioedit form-horizontal" >
                 
               <?php echo __("totalEntries")?><span class="countdisplay"><?php echo $odsTotalrecord;?></span><?php echo __("entriesPerPage"); ?>: 
                    <select class="pagesize input-mini" title="Select page size" style="margin-left:<?php echo $filterwidth;?>px">
                        <option selected="selected" value="10">10</option>
                        <option selected="selected" value="25">25</option>
                        <option selected="selected" value="50">50</option>
                        <option selected="selected" value="100">100</option>
                       
                    </select>
					<!-- <div class="button-right-disabled" id="updateOdsentry" style="margin: -1px 5px 10px !important;">
                        <a id="savedestinations" href="javascript:void(0);"><?php echo __('saveNewScenario'); ?></a>										
                    </div>	-->
					
                </div>
                  <div class="clear"></div>
                    <table id="example dnslistdata" class="dataTable  tablesorterscenario" cellpadding="0" cellspacing="0" style="width:98%!important; margin-left:5px; border-top-color:#CCC">
                      <thead>
                        <tr class="table-top"  >
                          <!--<th class="table-column table-left-ohne withdatatablecss">&nbsp;</th>-->
                          <th class="table-column table-left-ohne withdatatablecss" style="border-left: 1px solid #D1D1D1!important;width:20px !important;" ><input type="checkbox" name="sAll" id="checkAll" class="showselect" style="margin-left:10px !important; width: 20px!important"></th>
                          <th class="table-column dosorting withdatatablecss" style="width: <?php echo $tablewidth;?>px !important;margin:left:-5px!important;">&nbsp;&nbsp;<?php echo __('Source'); ?>&nbsp;&nbsp;</th>
                          <th class="table-column dosorting withdatatablecss" style="width: 120px !important;">&nbsp;&nbsp;<?php echo __('Dest'); ?>&nbsp;&nbsp;</th>
                            <?php
                           if ($scenarioDetails[0]['Scenario']['status'] == 3){?>
                          
                          
                          <th class="table-column filter-select filter-exact dosorting withdatatablecss"style="width:35px!important;" >&nbsp;&nbsp;<?php echo __('odsConfig'); ?>&nbsp;&nbsp;</th>
                             <?php }else{?>
                           <th class="table-column filter-select filter-exact dosorting withdatatablecss" style="width:35px!important;" >&nbsp;&nbsp;<?php echo __('State'); ?>&nbsp;&nbsp;</th>
                         <?php }?>
                         
                          
                          <th class="table-column table-right-ohne withdatatablecss" style="width:50px!important;">&nbsp;</th>
                          <!--<th class="table-column table-right-ohne" style="border-bottom:#CCCCCC 1px solid;border-top:#CCCCCC 1px solid;">&nbsp;</th>-->
                        </tr>
                      </thead>
                      <tfoot>
                        <th colspan="8" class="pagerscenarioedit form-horizontal">
                            <span><a class="first" href="javascript:;">&lt;&lt;</a></span>
                            <span><a class="prev" href="javascript:;">&lt;</a></span>
                            <span><?php __('Page'); ?></span>
                            <select class="pagenum input-mini hide" title="Select page number"></select>
                            <span class="pagedisplay"></span> <!-- this can be any element, including an input -->			
                            <span><a class="next" href="javascript:;">&gt; </a></span>
                            <span><a class="last" href="javascript:;">&gt;&gt; </a></span>
                   
                        </th>
                        </tr>
                        </tfoot>
                        <tbody id="reloadme" >
    					<?php foreach ($odsEntryList as $res) { ?>

                                <tr style="background-color:#FFF;">
                                   <!-- <td class="table-left withdatatablecss" id="firstchild<?php echo $res['Odsentry']['id']; ?>">&nbsp;</td>-->
                                   <td class="table-left-ohne withdatatablecss" style="border-left: 1px solid #D1D1D1!important;width:20px;!important;vertical-align: middle;"><input type="checkbox" class="odsentchk" name="a<?php echo $res['Odsentry']['id']; ?>" value="<?php echo $res['Odsentry']['id']; ?>" id="chk<?php echo $res['Odsentry']['id']; ?>" style="margin-left:10px !important;margin-bottom: 3px!important;" /></td>
                                    <td class="withdatatablecss" style="padding-top:3px!important;vertical-align: middle;"><?php echo $res['Odsentry']['source']; ?></td>
                                    <td class="withdatatablecss">
                                        <!--<div class="input text">-->
                                        
                                       <?php
                                       
  
       								 		echo $html->link($res['Odsentry']['dest'], '#', array('style' => 'display:none;', 'class' => 'getVal')); ?>

        								<?php if ($PerformDisable == 1) { ?>					
                                            <input class="space_check  numeric_check destname"  AUTOCOMPLETE=OFF id="d<?php echo $res['Odsentry']['id']; ?>" name="<?php echo $res['Odsentry']['source']; ?>" type="text" value="<?php echo trim($res['Odsentry']['dest']); ?>" style="vertical-align: middle;padding-bottom:3px; " size="13" <?php echo $readonlytextbox; ?> >
        								<?php } else { ?>
                                            <input class="space_check  numeric_check destname" onkeyup="chngbkcolor(this);"  AUTOCOMPLETE=OFF id="d<?php echo $res['Odsentry']['id']; ?>" name="<?php echo $res['Odsentry']['source']; ?>" style="vertical-align: middle;padding-bottom:3px;" type="text" value="<?php echo trim($res['Odsentry']['dest']); ?>" size="13" <?php echo $readonlytextbox; ?> >
                                        <?php } 
       								   
                                        $valid = __('Valid',true);
                                        $invalid = __('Invalid',true);
                                       ?>
                                        <!--</div>-->
                                    </td>
								<?php if ($scenarioDetails[0]['Scenario']['status'] == 3){?>
								<td id="sc_state_medium " style="padding-top:3px!important; vertical-align: middle;" class="withdatatablecss sc_state_medium<?php echo $res['Odsentry']['id']; ?>" align="center"><?php echo __($res['Odsentry']['config'],true); ?></td>
								
								<?php }else{?>
								<td id="sc_state_medium " style="padding-top:3px!important; vertical-align: middle;" class="withdatatablecss sc_state_medium<?php echo $res['Odsentry']['id']; ?>" align="center"><?php echo (__($res['Odsentry']['dest'],true)) ? $valid : $invalid; ?></td>
									<?php }?>
													
                                  
                                    <td style="padding-top:3px!important; vertical-align: middle;" class="table-right-ohne withdatatablecss"><div style="width:50px;"> <?php echo $html->link(__("", true), 'javascript:deleteOdsentry(' . $res['Odsentry']['source'] . ',' . $res['Odsentry']['scenario_id'] . ',this);', array('id' => $res['Odsentry']['source'], 'class' => 'deleteOdsentry')); ?></div> </td>
                                    <!--<td class="withdatatablecss">&nbsp;</td>-->
                                </tr>
    					<?php } ?>
                        <input type="hidden" name="destid" id="destid" value="" />
                        </tbody>

                    </table>
                </div>	
                            <?php }  ?>
							
							
							<?php 
							if($scenarioDetails[0]['Scenario']['status'] != 6)
							{
							?>
							<div class="button-right-hover" style="margin-top: 2px;!important;">
            				<?php
 								//echo $html->link(__("addSourceDns", true), array('controller' => 'dns', 'action' => 'selectdns', "scenario_id:$scenario_id/scenario_name:$scenario_name"), array('class' => $selected['DN List'] . " fancybox fancybox.ajax showhighlight_buttonleft", 'escape' => $readonly, 'id' => 'add_numbers')); ?>		
                    		</div>
                    		<?php 
							}
							?>
					
					<div class="" style="margin-top:35px;" >
						<!--<div class="cnt" style="display: inline;margin-left:5px; margin-top: -20px;"></div>-->
						<div class="counter" style="font-weight:normal">0: records are selected</div>
							<?php if ($scenarioDetails[0]['Scenario']['status'] == 3){?>
							<div id="updateselected" class="button-left-hover" style="margin: -12px 2px 11px !important;">
                            <?php echo $html->link(__("editConfigEntries", true), array('controller' => 'scenarios', 'action' => 'openconfigupdateview?scenario_id:' . $scenario_id), array('class' => $selected['DN List'] . " fancybox fancybox.ajax cntchk_updatemsg2 showhighlight_buttonright")); ?> 
							</div>
							<?php }  //if ($scenarioDetails[0]['Scenario']['status'] != 2){?> 
							<div id="updateselected" class="button-left-hover" style="margin: -12px 2px 11px !important;">
                            <?php echo $html->link(__("editSelectedOdsEntries", true), array('controller' => 'scenarios', 'action' => 'opendestupdateview?scenario_id:' . $scenario_id), array('class' => $selected['DN List'] . " fancybox fancybox.ajax cntchk_updatemsg2 showhighlight_buttonright")); ?> 
							</div>
                             <?php //} ?>
							 <div id="updateselected" class="button-left-hover" style="margin: -12px 2px 11px !important;">
                            <?php echo $html->link(__("deleteSelectedOdsEntries", true), 'javascript:void(0)', array('class' => $selected['DN List'] . "  deldest showhighlight_buttonright")); ?> 
							</div>
							 
							 <div class="button-right-disabled" id="updateOdsentry" style="margin: -11px 5px 10px !important;">
                        <a id="savedestinations" href="javascript:void(0);"><?php echo __('saveNewScenario'); ?></a>										
                    </div>
							 
							 
                        </div><br/>

            </div>
            <!-- START OPERATE SECTION  -->
            <!-- DELETED -->

   
                <!-- END COMMENTED OPERATE SECTION -->


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
            
            <!-- mgi 30.5. temp
            <div class="box info">
                <h3><?php __('Scenario Edit') ?></h3>
                <p><?php __('This page is a Scenario Edit page allowing users to edit specific scenarios') ?></p>
            </div>
            -->
            
            <div class="box">
        	   <h3><?php __('Scenario Edit'); ?></h3>
                 <p><?php __('This page is a Scenario Edit page allowing users to edit specific scenarios') ?></p>
			   <div id="shortcont"><a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a></div>
               <div style="display:none;" id="fullcont_type"  >
                 <p><?php echo __('scenarioEdit_helpText') ?></p>
                 <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>      
			  </div>
           </div>
            
            
            <h3><?php __('scenarioEditStates') ?></h3>
			<img id="statemodel"  src="<?php echo Configure::read('base_url');?>images/ODS_simple.png">
            <div class="box">
                <h3 class="red"><?php # __("_infoBox"); ?></h3>
                <div class="red">
                   <?php # __('_UpdateInfo'); ?>
                </div>
                
            </div>
            
                <?php if ($userpermission == Configure::read('access_id')) 
                {
                    ?>
                <div class="box info">
                    <h3><?php __("Internal User"); ?></h3>
                    <p><?php echo $selected_customer; ?></p>
                    <p><?php __("customerId"); ?><?php echo $SELECTED_CNN; ?></p>
                </div>
                <?php 
             	   if ($_SESSION['VIEWMODE'] == 'EXTERNAL')
             	   {
                		echo $html->link(__("scmView", true), array('controller' => 'scenarios', 'action' => 'toggleView?customer_id=' . $SELECTED_CNN . '&view=INTERNAL'));
                	}
                	else
                	{
                		echo $html->link(__("userView", true), array('controller' => 'scenarios', 'action' => 'toggleView?customer_id=' . $SELECTED_CNN . '&view=EXTERNAL'));
                		
                	}
                } 
            	
				
    	?>

        </div>				
    </div>

    <!--right hand side starts from here-->
    <!--ight hand side  ends here-->
	
	<script type="text/javascript">
    $(document).ready(function() {
		
		          var check_schedule="<?php echo $this->params['pass']['0'];  ?>";
				  if(check_schedule=="sch_edit")
				  {
				  	
					
				  	document.getElementById('showexecution').style.display = 'block';
					document.getElementById('showods').style.display = 'none';
					
					 
				  }
				 
				  }
				  );
				  
	 </script>			  
		
	
	
	
    <script type="text/javascript">
        function toggleAdvanceSearch() {
            //$("#advancesearch").show
            if (document.getElementById('advancesearch').style.display == 'none') {
                document.getElementById('advancesearch').style.display = 'block';
            } else {
                document.getElementById('advancesearch').style.display = 'none';
            }

        }
    </script>

<?php if ($leaveStatus[0] == "on") { ?>
    <script language="JavaScript">
        populateArrays();
    </script>
  <?php } ?>  