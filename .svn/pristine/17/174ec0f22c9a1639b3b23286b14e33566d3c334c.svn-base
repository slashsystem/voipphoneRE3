
<?php //echo $this->element('editable'); ?>


<?php echo $javascript->link('/js/jquery.fancybox'); ?>

<?php  $selectnumber = Configure :: read('selectnumber'); 
       $checkboxselect =  $selectnumber[0];?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#update').hide();
        $('#selectzip').show();
		
    });
    function zipvalidate()
    {
        $(document).ready(function() {

            var location_zip = $('#LocationPlz').val();
            var name = $('#LocationName').val();
			var address = $('#LocationAddress').val();
			var ort = $('#LocationOrt').val();
			 
			
            if (name == '') {
                
				
				$('#overlay-error .error .message').text("<?php __('Please enter location title') ?>");
		        $('#overlay-error').removeClass('hide');
				$('#overlay-sucess').addClass('hide');
                $('#LocationName').focus();
                return false;
            }
			if (address == '') {
                
				
				$('#overlay-error .error .message').text("<?php __('Please enter location address') ?>");
		        $('#overlay-error').removeClass('hide');
				$('#overlay-sucess').addClass('hide');
                $('#LocationAddress').focus();
                return false;
            }
			if (ort == '') {
                $('#overlay-error .error .message').text("<?php __('Please enter Ort') ?>");
		        $('#overlay-error').removeClass('hide');
				$('#overlay-sucess').addClass('hide');
                $('#LocationOrt').focus();
                return false;
            }

            if (location_zip == '') {
                
				$('#overlay-error .error .message').text("<?php __('Please enter zip code') ?>");
		        $('#overlay-error').removeClass('hide');
				$('#overlay-sucess').addClass('hide');
                $('#LocationPlz').focus();
                return false;
            }

            if (isNaN(location_zip)) {
                
				$('#overlay-error .error .message').text("<?php __('Please enter a valid zip code') ?>");
		        $('#overlay-error').removeClass('hide');
				$('#overlay-sucess').addClass('hide');
				
                return false;
            }
			
			

            var location_id = "<?php echo $location_id; ?>";
            var TargetURL = "<?php echo Configure::read('base_url'); ?>locations/validatezip/location_zip:" + location_zip;

            jQuery.post(TargetURL, function(data) {
						

                if(data == 2)
                {
                  
					$('#slect_zip').attr('href', "<?php echo Configure::read('base_url'); ?>locations/selectzip/location_zip:" + location_zip + '&showlist:1');
                    $("#slect_zip").trigger("click");
                } else {

                    if(data == 0) {
                        
						$('#overlay-error .error .message').text("<?php __('invalid ZIP, edit and try again') ?>");
		                $('#overlay-error').removeClass('hide');
						$('#overlay-sucess').addClass('hide');
                        return false;
                    } else {
						
                        var datasplit = data.split('****');
						
                        var emerval = datasplit[1];
						//var datadisp = datasplit[0]
						//if(datadisp==1){
							//alert('location added succesfully');
						//}
						$('#overlay-sucess .ok .message').text("<?php __('please add location details') ?>");
		                $('#overlay-sucess').removeClass('hide');
						$('#overlay-error').addClass('hide');
						
                        $('#LocationEmer').val(emerval);
                        $('#LocationEditForm').submit();                       						  
                        $('#selectzip').hide();
                        $('#update').show();
						//jQuery('#create').trigger("click");
                        jQuery('#create').attr("class", "showhighlight_buttonleft");
                        jQuery('#update').attr("class", "button-right-hover");
						
						
						

                    }

                }
            });
        });
    }

</script>


<script type="text/javascript">
    $(document).ready(function() {
		
		$('#drp').change(function(){
			
		location.reload(true);	
		}
		);
		
		
		
		
	$('#plus').trigger("click");	
    $('#button').removeAttr("onclick","");
    $('#button').attr("onclick","noinfo()");
	
        jQuery('.odsentchk').removeAttr("checked");
		jQuery('#rangeMinMinval').val("");
		jQuery('#rangeMaxMaxval').val("");
	   
	    $('#minus').hide();
        $('#mbtn').hide();
        $('#logmbtn').hide();

        $('#minus').click(function() {
            $('#pbtn').show();
            $('#minus').hide();
            $('#mbtn').hide();
            $('#plus').show();
        });

        $('#minus').hide();
        $('#mbtn').hide();

        $('#plus').click(function() {
            $('#pbtn').hide();
            $('#minus').show();
            $('#mbtn').show();
            $('#plus').hide();
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
<script>
	function noinfo(){
				
		$('#overlay-error .error .message').text("<?php __('no changes entered') ?>");
		$('#overlay-error').removeClass('hide');
	}
</script>
<script language="javascript">
    $(document).ready(function() {
        validation = {
            // Specify the validation rules
            'rules': {                     
                'LocationName':{
                    'required': true,
                    'max': '50'
                    //'max': '30'
                },  
                'LocationDesc':{
                    'required' : true,
                    'max': '150'
                },                       
            },                  
            // Specify the validation error messages
            'messages': {  
                'LocationName': {
                     'required': "<?php __('LocationNameNotempty')  ?>",
                     'max': "<?php __('max50')  ?>"
                 }, 
				
	    	         'LocationDesc': {
	    	             'required': "<?php __('LocationDescNotempty')  ?>",
                         'max': "<?php __('max150')  ?>"
	    	            
	    	         } 
            },
          };
        });
       // $('#button').click(function() { 
		function submitlocationForm(){ 
            if (inValidate(validation)) {   
                //return false;
            }else{
				
			         
            var location_name = jQuery('#LocationName').val();
            var location_remark = jQuery('#LocationDesc').val();
			var location_address = jQuery('#LocationAddress').val();
			var CustomerLocType = jQuery('#drp').val();
			var location_ort = jQuery('#LocationOrt').val();
            var location_id = '<?php echo $location_id; ?>';

            var TargetURL = "<?php echo Configure::read('base_url'); ?>locations/editlocation/location_id:" + location_id + "/location_name:" + location_name + "/location_remark:" + location_remark+ "/location_address:" + location_address+ "/loctype:" + CustomerLocType+ "/location_ort:" + location_ort;
            jQuery.post(TargetURL, function(data) {
                
                $("#msg").html(data);
				$('#overlay-sucess .ok .message').text("<?php __('changes added successfully') ?>");
		        $('#overlay-sucess').removeClass('hide');
                jQuery('#updateOdsentry').removeAttr("class");
                jQuery('#updateOdsentry').attr("class", "button-right-disabled");
                jQuery('#button').removeAttr("class");

            });
			}
        //});
		}

    

    function toggleShowHistory() {
        //$("#advancesearch").show
        if (document.getElementById('showhistory').style.display == 'none') {
            document.getElementById('showhistory').style.display = 'block';
        } else {
            document.getElementById('showhistory').style.display = 'none';
        }
    }
    function toggleLogs() {
        //$("#advancesearch").show
        if (document.getElementById('showLogs').style.display == 'none') {
            document.getElementById('showLogs').style.display = 'block';

         	$('#logplus').hide();
         	$('#logminus').show();
        } else {
            document.getElementById('showLogs').style.display = 'none';
        }
    }
    
</script>
<script type="text/javascript"> 
    $(document).ready(function() { //alert("ret");

    	$(document).keypress(function(e) {
    		if (e.which == 13) {
    			$("a#filter_now").trigger('click');
    			return false;    			
    		}
    	});

        
	});
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
    .table th, .table td
    {
        padding: 1px 6px;  
        border:none;
    }
    .tablesorter-bootstrap .tablesorter-pager select
    {
        width:64px;
        margin:0 20px;
    }
    .table-top th, .table-right-ohne th
    {
        height:40px;
        border-top:#CCC 1px solid;

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
	}
    .tablesorter-icon {
        background-image: url("../../images/assets/table-sort-default.gif");
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
  

/*.tablesorter-bootstrap .tablesorter-filter-row .tablesorter-filter {
  
    margin: 0 -2px !important;
    padding: 4px 1px !important;
   
}*/
</style>
<script>
$(document).ready(function(){
		
        $(".readtext").click(function(){
            $(this).blur();
			return false;
        });
    });
</script>


<script type="text/javascript">
    function deleteOdsentry(record_id, elem) {
        $.post(base_url + 'odsentries/index/' + record_id, {}, function(data) {
            if (data == "success") {
                $('#' + record_id).closest('tr').remove();
                alert('Record is deleted successfully');
            }
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
	//$(".cntchk_updatemsg").hide();
	 $('.cntchk_updatemsg2').hide();
	//$('#reset_check').hide();
	
        paginationStyle();
        $('.pagerlocationedit a').click(function() {
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
				


                var pageDisplay = $(".pagedisplay").text();
                temp = pageDisplay.split(" -");
				
                //console.log(temp);
				page2 = temp[1].split("/");
				page3=page2[1].split("(");
				var showrecord = page3[0];
			

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
                newStyle += "<span style='font-family: Trebuchet MS,Arial,Helvetica,sans-serif;font-size:12px;font-weight: normal;'> <?php __('Of') ?> " + totalPage + "</span>";
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

            }, 5);
        }//
    });


    jQuery(function() {
        jQuery.extend(jQuery.tablesorter.themes.bootstrap, {
            // these classes are added to the table. To see other table classes available,
            // look here: http://twitter.github.com/bootstrap/base-css.html#tables	
        });

        // call the tablesorter plugin and apply the uitheme widget
        jQuery(".dataTable").tablesorter({
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
                1: {sorter: true, filter: true },
                2: {sorter: true, filter: true},
                3: {sorter: true, filter: true},
                4: {sorter: true, filter: true},
                5: {sorter: true, filter: true},
				7: {sorter: false, filter: false}

             }




        })
                .tablesorterPager({
                    // target the pager markup - see the HTML block below
                    container: jQuery(".pagerlocationedit"),
                    // target the pager page select dropdown - choose a page
                    cssGoto: ".pagenum",
					initWidgets: true,
                    // remove rows from the table to speed up the sort of large tables.
                    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
                    removeRows: false,
                    // output string - default is '{page}/{totalPages}';
                    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
                    //output: '{startRow} - {endRow} [{page}] {filteredRows} ({totalRows})'
                    //output: 'Page <input type="text" name="currpage" value="{page}" class="pagination_text" maxlength="3"> Of {totalPages}'
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
                    //jQuery("#form").submit();

                    var TargetURL = "<?php echo Configure::read('base_url'); ?>locations/filterdnslocation/location_id:<?php echo $location_id; ?>" + "/MinVal:" + MinVal + "/MaxVal:" + MaxVal;
                                        jQuery.post(TargetURL, function(response) {
                                            $('#ajax_load').html(response);
                                        });

                                    }
                                }
                            });

                            jQuery("#reset_filter").click(function() {

                                jQuery('#rangeMinMinval').val('');
                                jQuery('#rangeMaxMaxval').val('');
                                //jQuery("#form").submit();
                            });
							
							
							/*jQuery("#reset_check").click(function() {

                               jQuery('input[type="checkbox"]:checked').each(function() {
                                    jQuery(this).removeAttr("checked", false);
                                });
								$('.cnt').text("");
								   //$('.cntchk_updatemsg').hide();
								    $('.cntchk_updatemsg2').hide();
								   $('#reset_check').hide();
                            });*/
							

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
                            });

                            jQuery('.odsentchk').click(function() {
                                var noofrecord = 0;
								 var  selnum = $("#chknumber").val();
									  var chknum = selnum-1;
                                jQuery('input[type="checkbox"]').each(function() {
                                    if ($(this).is(':checked')) {
										
                                     
										if(noofrecord<=chknum){
											noofrecord++;
											
										}
										else{
											var attrid = jQuery(this).attr('id');
                                            jQuery('#' + attrid).removeAttr("checked", "");
											return false;
										}
                                        
                                    }
                                });

                                //$('.cnt').text("<?php echo __('dnOfLocationSelected'); ?> :" + noofrecord);	
								$('.cnt').text("<?php echo __('Update Selected'); ?> :" + noofrecord);	
								
							
								
								if(noofrecord==0){
								//$('#reset_check').hide();	
								//$('.cntchk_updatemsg').hide();
								 $('.cntchk_updatemsg2').hide();
								}else{
									//$('#reset_check').show();
									//$('.cntchk_updatemsg').show();
									 $('.cntchk_updatemsg2').show();
								}
								

                            });


                            /*Check All / Uncheck All functionality*/
                            jQuery("#checkAll").click(function() {
                                if (jQuery("#checkAll").is(':checked')) {

                                    jQuery('#content input[type="checkbox"]').each(function() {
                                        var attrid = jQuery(this).attr('id');
                                        jQuery('#' + attrid).removeAttr("checked");
                                    });

                                    var noofrecord = 0;
                                    jQuery('input[type="checkbox"]').each(function() {
                                        var CStyle = jQuery(this).parents("tr").attr('style');
                                        var CClass = jQuery(this).parents("tr").attr('class');
                                   		var  selnum = $("#chknumber").val();
										//alert(selnum);
                                        //if (CStyle.indexOf("display: none") == -1 ) {
											
											if(noofrecord<=selnum){
																							
                                            var attrid = jQuery(this).attr('id');
                                            jQuery('#' + attrid).prop("checked", "checked");
											
                                            noofrecord++;						
											}
											else{
												var attrid = jQuery(this).attr('id');
	                                            jQuery('#' + attrid).removeAttr("checked", "");
												return false;
										     }					
                                           // $('.cnt').text("<?php echo __('dnOfLocationSelected'); ?> : " + (noofrecord - 1 ));
											$('.cnt').text("<?php echo __('Update Selected'); ?> : " + (noofrecord - 1 ));
											$('#checkAll').removeAttr("data-value","");																					
											//$('.cntchk_updatemsg').show();
											 $('.cntchk_updatemsg2').show();
											 $('#reset_check').show();
											 
											// $('#seldns').attr("class", "showhighlight_buttonright");
											 //$('#updateselected').removeAttr("class");
		                    				// $('#updateselected').attr("class", "button-right-hover");
											 
											
                                        //}
										  /*if (CClass.indexOf("filtered") == -1) {
										  	if(noofrecord<=selnum){
                                            var attrid = jQuery(this).attr('id');
                                            jQuery('#' + attrid).prop("checked", "checked");
											
                                            noofrecord++;						
											}
											else{
												var attrid = jQuery(this).attr('id');
	                                            jQuery('#' + attrid).removeAttr("checked", "");
												return false;
										     }						
                                            $('.cnt').text("<?php echo __('dnOfLocationSelected'); ?> : " + (noofrecord - 1 ));
																																
											$('.cntchk_updatemsg').show();
											 $('.cntchk_updatemsg2').show();
											 $('#reset_check').show();
                                        }*/
										
                                    });
									//alert(noofrecord);
                                   // $('.cnt').text("<?php echo __('dnOfLocationSelected'); ?> :" + noofrecord - 1);
											

                                } else {
                                    jQuery('input[type="checkbox"]').each(function() {
                                        jQuery(this).removeAttr("checked");
                                    });
                                   // $('.cnt').text("0" + ": <?php echo __('dnOfLocationSelected'); ?>");
								   $('.cnt').text("");
								   //$('.cntchk_updatemsg').hide();
								    $('.cntchk_updatemsg2').hide();
								    $('#reset_check').hide();
								  
                                }
                            });

                            jQuery('.dosorting').click(function() {
                                jQuery('.dosorting').addClass("tablesorter-icon");
                                jQuery('input[type="checkbox"]').each(function() {
                                    jQuery(this).removeAttr("checked");
                                });
                            });

                        });

                        function saveToLog(action) {
                            var comment = $('#LogAfterdate').val();
                            var scenario_id = '<?php echo $scenario_id; ?>';
                            var cust_id = '<?php echo $SELECTED_CUSTOMER_NAME; ?>';
                            $.post(base_url + "scenarios/validates/" + scenario_id, {'log_entry': action, 'comment': comment, 'cust_id': cust_id}, function(data) { //alert(data);
                                if (data) {
                                    alert("Scenario " + action);
                                    if (data == "scenario_accepted") {
                                        $('#sc_state').text('5');
                                    } else if (data == "scenario_rejected") {
                                        $('#sc_state').text('6');

                                    } else if (data == "scenario_validate_requested") {
                                        $('#sc_state').text('6');
                                    }
                                }
                            });
                        }

                        function chngbkcolor(obj) {
                            $(document).ready(function() {
                                jQuery('#button').attr("class", "showhighlight_buttonleft");

                                jQuery('#updateOdsentry').removeAttr("class");
                                jQuery('#updateOdsentry').attr("class", "button-right-hover");
								$('#button').attr("onclick","submitlocationForm()");

                            });
                        }


</script>
<script>
function set_visifilterlocation(val)
{	
	if(val=='shortcontloc') {	
		$(".scontloc").slideToggle("slow");		
	}	
}

</script>
<script>
function set_visimenu(val)
{
	
	if(val=='dispmenu') {
			$("#edit_stat_popupmenu").slideToggle("slow");
	}
}

</script>
<?php $selnumber = Configure :: read('selectnumber');
$chknumber = $selnumber[0];
 ?>
 <input type="hidden" name="chknumber" id="chknumber" value="<?php echo $chknumber; ?>"/>
<?php $leaveStatus = Configure :: read('leaveStatus'); ?>
<?php if ($leaveStatus[0] == "on") { ?>
    <!--######## Start  Save Leave Page Event #################-->
   <script language="JavaScript">
        var ids = new Array('LocationName', 'LocationDesc');
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
<span id="smsg"></span>

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
		
		if (!empty($location)) { $readonly = 'true'; ?>
		 <h4><?php echo __('locationDetail'); ?>
		 <span id="msg"> <?php echo __($location['Location']['name'],true); ?></span>
		 </h4>
		    
	     	<?php } 
    	else { ?>
		<script>
			$(document).ready(function() {
				
       
		$('#overlay-sucess .ok .message').text("<?php __('please add location details') ?>");
		$('#overlay-sucess').removeClass('hide');
    });
		</script>
		
		 <h4><?php echo __('locationCreate'); ?></h4> <?php  }
		if (!empty($location)) { ?>	
    		<div id="myTable" class="phonekey table-content">
        	<?php echo $form->create(null, array('id' => 'LocationEditForm', 'url' => array('controller' => 'locations', 'action' => 'update/' . $location_id), 'accept-charset' => 'ISO-8859-1', 'invalidate' => 'invalidate')); ?>
        	<input type="hidden" value="" id="hid_blf"/>
        	<input type="hidden" name="location_id" id="location_id" value="<?php echo $location_id; ?>" />
           		<fieldset>
                	<fieldset style="display:none;">
                    	<input type="hidden" name="_method" value="PUT" />
                	</fieldset>
               <!--Start of location attributes section -->
                <input type="hidden" id="show_main_val" value="0"  />
                <div id="newEdit">
                   <div class="form-body">
                        <div class="form-box">
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('loc_name', true) . '</div>';
                                echo $form->input('Location.name', array('label' => false, 'type' => 'text', 'value' => $location['Location']['name'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);",''));
                                echo '<div style="width:100px; float: left">' . __('Remark', true) . '</div>';
                                echo $form->input('Location.desc', array('label' => false,'rows'=>'5','cols'=>'45', 'value' => $location['Location']['remark'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);"));
                                ?>
							
							<?php if ($userpermission == Configure::read('access_id')) { 
								$readonlyfield = 'false';
								$class = '';
							}else{
								$readonlyfield = 'false';
								$class = 'readtext';
							}
							  ?>	
                               <div style="width:100px; float: left"><?php echo __('locType', true) ?> </div>
 							<?php	
								$loc_type = __($loctype,true);								
								echo $form->select('loc_type', $loc_type,$location['Location']['loc_type'],array('label'=>false, 'style'=>'width:146px;margin-top:5px','id'=>'drp','onchange'=>'chngbkcolor(this)','readonly' => $readonlyfield,'class'=>$class));
 								?>	
                           	
								
                            </div>
                          <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Address', true) . '</div>';
                                echo $form->input('Location.address', array('type' => 'text', 'label' => false, 'value' => $location['Location']['address'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);"));
                                ?>			
                            </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Ort', true) . '</div>';
                                echo $form->input('Location.ort', array('type' => 'text', 'label' => false, 'value' => $location['Location']['ort'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);"));
                                ?>			
                            </div>
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('zip', true) . '</div>';
                                echo $form->input('Location.zip', array('type' => 'text', 'label' => false, 'value' => $location['Location']['plz'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);"));
                                ?>	
                           </div>
                           <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('emer', true) . '</div>';
                                echo $form->input('Location.emergency', array('type' => 'text', 'label' => false, 'value' => $location['Location']['emer'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Pro Nr', true) . '</div>';
                                echo $form->input('Location.pro_nr', array('type' => 'text', 'label' => false, 'value' => $location['Location']['pro_nr'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
							 <div class="form-right">
                                
                                <div style="width:100px; float: left"><?php echo __('locSource', true) ?> </div>
                              <?php
							  $locsource = __($location['Location']['loc_source'],true);
							    echo $form->input('Location.loc_source', array('type' => 'text', 'label' => false, 'value' => $locsource, 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
							<?php if (($userpermission == Configure::read('access_id')) || ($location['Location']['loc_type']!='Virtual')) {   ?>
							<?php if($location['Location']['loc_type']!='Virtual'){ ?>
                            <br><br><h5><?php  echo __('Technical', true) ?></h5>
 						    <div class="form-right">
                            <?php
                            echo '<div style="width:100px; float: left">' . __('Scm Name', true) . '</div>';
                            echo $form->input('Location.scm_name', array('type' => 'text', 'label' => false, 'value' => $location['Location']['scm_name'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                            ?>
                        </div>
                  		    <div class="form-right">
                            <?php
                            echo '<div style="width:100px; float: left">' . __('lbl', true) . '</div>';
                            echo $form->input('Location.lbl', array('type' => 'text', 'label' => false, 'value' => $location['Location']['lbl'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                            ?>
                        </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Type', true) . '</div>';
                                echo $form->input('Location.loctype', array('type' => 'text', 'label' => false, 'value' => $location['Location']['loctype'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-left ">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Middle Box Id', true) . '</div>';
                                echo $form->input('Location.middle_box', array('type' => 'text', 'label' => false, 'value' =>  $location['Location']['middle_box'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
								?>
                            </div>
                            <div class="form-right tooltip">
                                <?php
                                   echo '<div style="width:100px; float: left">' . __('CER Name', true) . '</div>';
								   $ident = $location['Location']['cer1'];
								   if(strlen($ident) > 25){ $link = substr($location['Location']['cer1'], 0, 25) . '..';}
								   else {	$link = $location['Location']['cer1'];	}
                                   echo $form->input('Location.cer1', array('type' => 'text', 'label' => false, 'value' => $link, 'style' => 'width:139px;', 'readonly' => $readonly,'class'=>'readtext'));
								 if(strlen($location['Location']['cer1'])>25) { ?>
                                  <div>
								   <div class="fl"><span style="cursor:default" >
								<p><?php  echo $location['Location']['cer1']; ?></p>
                                </div>
							</div>
                                <?php }  ?>
                            </div>
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('CER Name2', true) . '</div>';
                                echo $form->input('Location.cer2', array('type' => 'text', 'label' => false, 'value' => $location['Location']['cer2'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Srv code', true) . '</div>';
                               echo $form->input('Location.srv_code', array('type' => 'text', 'label' => false, 'value' => $location['Location']['srv_code'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Call Spliting', true) . '</div>';
                                echo $form->input('Location.call_splitting', array('type' => 'text', 'label' => false, 'value' => $location['Location']['call_splitting'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Bw', true) . '</div>';
                                echo $form->input('Location.bw', array('type' => 'text', 'label' => false, 'value' => $location['Location']['bw'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Technologies', true) . '</div>';
                                echo $form->input('Location.technology', array('type' => 'text', 'label' => false, 'value' => $location['Location']['technology'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
                           <!-- <div class="form-right">
                                
                                <div style="width:100px; float: left"><?php echo __('locSource', true) ?> </div>
                              <?php
							  $locsource = __($location['Location']['loc_source'],true);
							    echo $form->input('Location.loc_source', array('type' => 'text', 'label' => false, 'value' => $locsource, 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>-->
                            <div class="form-left">
								
                              <!-- <div style="width:100px; float: left"><?php echo __('locType', true) ?> </div>-->
 							<?php	
								#$loc_type = __($loctype,true);								
								#echo $form->select('loc_type', $loc_type,$location['Location']['loc_type'],array('label'=>false, 'style'=>'width:140px;','id'=>'drp','onchange'=>'chngbkcolor(this)'));
 								?>	
                            	<?php echo $form->input('Location.id', array('type' => 'hidden', 'value' => $location_id)); ?>		
                                <?php echo $form->end(); ?>
                            </div>	
							<?php }} ?>		  
									  
                        </div>	
                    </div>
                </div>
                <!--<div class="button-right">
                       <a href="javascript:void(null);"  onclick="document.getElementById('LocationEditForm').submit();" name="validate" value="validate"><?php __('Update') ?></a>
                </div>-->
                <div class="button-right-disabled"  id="updateOdsentry">
                    <!--<a href="javascript:void(null);" id="button"  name="validate" class="buttonvalid" onclick="needToConfirm = false;" value="validate" ><?php __('updateLocationEdit_button') ?></a>-->
					<a href="javascript:void(null);" id="button"  name="validate" class="buttonvalid" onclick="submitlocationForm();" value="validate" ><?php __('updateLocationEdit_button') ?></a>
					
					
                </div>
            </fieldset>
            </form>
            <div style="display:block">					
                <h4 style="display:block;float:left;width: 100%;"><?php echo __('DN_details_LocEdit', true); ?> <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleShowHistory();" href="javascript:void(0)" style="float:right;">
                        <div style="width:20px; height:20px;" id="pbtn">
                            <div id="plus"></div>
                        </div>
                        <div style="width:20px;background:#eee; height:20px;" id="mbtn">
                            <div id="minus"></div>
                        </div>
                    </a>
					<a style="font-weight: normal;font-size: 12px !important;margin-left: 5px;" href="javascript:;" id="edit_stat" onclick="set_visimenu('dispmenu')"  <?php echo $readonly; ?>><?php// __("Options"); ?> </a>
					</h4> 
            </div>

<?php 
if(($custtype=="Gate") || ($custtype=="Gate +")){
	$dispfunc = 1;
}
else{
	$dispfunc = 2;
}
?>

        
            <?php
            if (isset($showHistory)) { ?> <div class="table-content" style="display:none"> <?php } 
            else { ?> <div id="showhistory" class="table-content" style="display:block"> <?php } ?>

            <form id="form" class="filtersForm" action="<?php echo Configure::read('base_url'); ?>locations/edit/<?php echo $location['Location']['id']; ?>" enctype="multipart/form-data" method="POST">    
                <input type="hidden" name="location_id" id="location_id" value="<?php echo $location['Location']['id']; ?>" />
                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $SELECTED_CUSTOMER_NAME; ?>" />                 					
					<?php  $selectedLanguage = $_SESSION['Config']['language'];
						if($selectedLanguage=='de'){
							 $width = 200;
							 $rangeminwidth = 85;
							 $rangemaxwidth = 60;
							 $filterwidth = 243;
							 }
						else if($selectedLanguage=='fr') {
							 $width = 183;
							 $rangeminwidth = 75;
							 $rangemaxwidth = 75;
							 $filterwidth = 213;
							 }
						else if($selectedLanguage=='it'){
							$width = 146;
							 $rangeminwidth = 75;
							 $rangemaxwidth = 75;
							 $filterwidth = 213;
						}
						else if($selectedLanguage=='en'){
							 $width = 146;
							 $rangeminwidth = 75;
							 $rangemaxwidth = 75;
							 $filterwidth = 213;
						}
					?>
					
					 <?php
				    $dncount=count($dnsdetail);
			    	if ( $dncount==0) { ?><div>&nbsp;&nbsp;</div> <div  style="display:none"> <?php }
			    	else { ?> <div  style="display:block"> <?php }?>
					
				<div id="edit_stat_popupmenu" style="display:non ">
                      <div id="shortcontloc" class="scontloc" style="display: ;margin-left: 5px;">
					  <!-- <?php echo __('DN Range Filter'); ?> -->
					  
					  	<?php if(isset($blockOptions))
					  	{?>
					    <div class="form-box">
 							<div class="form-left">
                                <?php echo $form->input('block_id', array('label' => false,'type'=>'select', 'options'=>$blockOptions, 'default'=>$block,'style'=>'width:206px;','onchange'=>'chngbkcolor(this)')); ?>
					
                            </div>
                            <div class="form-right">
                                
                               <p><?php echo __('largeDataSet_blurb')?></p>	
                            </div>
 							
 							<!-- 
 							<div class="form-left" style="margin-left: 0px;width:<?php echo $rangeminwidth; ?>px !important">
                                <?php echo '<div style="width:80px; float: left;margin-left: 0px;">' . __('rangeMin', true) . '</div>'; ?>		
                            </div>
							<div class="form-right" style="margin-left: 1px;width:85px !important">
                                <?php echo $form->input('rangeMin.minval', array('style' => 'margin:1px 2px 3px 22px; width:65px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMinval));?>		
                            </div>
							<div class="form-left" style="margin-left: 1px;width:<?php echo $rangemaxwidth; ?>px !important;">
                                <?php echo '<div style="width:50px; float: left;margin-left: 40px;">' . __('rangeMax', true) . '</div>';?>		
                            </div>
                            <div class="form-right" style="margin-left: 5px;width:85px !important;">
                                <?php echo $form->input('rangeMax.maxval', array('style' => 'margin:1px 2px 3px 8px;width:65px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMaxval));?>		
                            </div>
							<div class="form-left" style="width: <?php echo $width; ?>px !important; margin-top: -9px!important" >
							<div class="button-right" id="reset_filter" >
                                <a id="reset_filter" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php __('Clear') ?></a>
                            </div>
							<div class="button-right" id="filter_now" >
                                <a id="filter_now" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php __('filter') ?></a>
                            </div>	
                            -->											
 						 </div>	
 						 <?php } # end large dataset?>
 						 
                        </div>
						
 					  </div>	                       
				</div>
                        <input type="hidden" id="customer_id_data" value="<?php echo $selected_customer; ?>">
                        <div class="clear"></div>
 				<span id="msg"></span>
				<!-- <div style="display: inline;margin-left:5px; margin-top: -20px;" class="cnt" > <?php #echo __('dnOfLocationSelected'); ?> </div> 
                   <?php echo $html->link(__("Update Selected", true), array('controller' => 'dns', 'action' => 'openlocationupdateview/customer_id:' . $SELECTED_CUSTOMER_NAME . '/loc_id:' . $location['Location']['id']), array('class' => $selected['DN List'] . " fancybox fancybox.ajax cntchk_updatemsg")); ?> 
                    <div class="button-right" style="float: right;margin: -4px 2px 11px !important;"><a href="javascript:;" id="reset_check"  onMouseOver="Tip('<?php echo __('Cleck here Reset all selected checkbox') ?>', BALLOON, true, ABOVE, false) , hoverButtonRight(this)" onMouseOut="UnTip() , outButtonRight(this)"><?php echo __('Reset'); ?></a></div> --> 
                 
                 <div class="pagerlocationedit form-horizontal" >                 
                   <?php echo __("totalEntries")?><span class="countdisplay"></span><?php echo __("entriesPerPage"); ?>: 
                    <select class="pagesize input-mini" title="Select page size" style="float: right; margin-right: <?php echo $filterwidth; ?>px;">
                        <option selected="selected" value="10">10</option>						
                        <option selected="selected" value="25">25</option>
                        <option selected="selected" value="50">50</option>
                        <option selected="selected" value="100">100</option>
                    </select>
 						<!--<div class="button-right" style="margin: -22px 2px 11px !important;">
                            <?php echo $html->link(__("Add Numbers", true), array('controller' => 'dns', 'action' => 'selectdns', "location_id:" . $location['Location']['id']), array('class' => $selected['DN List'] . " fancybox fancybox.ajax",'onmouseout'=>"outButtonRight(this)", 'onmouseover'=>"hoverButtonRight(this)")); ?>		
                        </div>--> 					
                </div> 
				 </div>
				
				    
				
				 <?php
				    $dncount=count($dnsdetail);
			    	if ( $dncount==0) { ?> <div  style="display:none"> <?php }
			    	else { ?> <div  style="display:block"> <?php }?>
				
				
				   
                        <div id="ajax_load">
                            <table id="example dnslistdata" class="dataTable tablesorter phonekey" cellpadding="0" cellspacing="0" style="width:98%; margin-left:5px; border-top-color:#CCC">
                                <thead>
                                    <tr class="table-top" style="border-bottom:#D1D1D1 1px solid; border-right: 1px solid #D1D1D1;border-top:#D1D1D1 1px solid;">
                                        <!--<th width="3%" class="table-column table-left-ohne withdatatablecss" >&nbsp;</th>-->
                                        <th align="left" width="80px !important;border-left: 1px solid #D1D1D1!important;" class="table-column table-left-ohne withdatatablecss" ><input type="checkbox"  name="sAll" id="checkAll" class="showselect" style="margin-top: 5px !important;"  ></th>
                                        <th align="left" width="90px !important" class="table-column dosorting withdatatablecss " style="margin-top: -2px;" ><?php echo __('dnLocation')?> </th>
                                        <th align="left" width="150px !important" class="table-column filter-select filter-parsed  dosorting withdatatablecss" data-placeholder=""><?php  echo __('location')?></th>
                                   <?php if($location['Location']['scm_name']=="UNKNOWN"){ ?>
                                        <th width="150px !important" class="table-column filter-select filter-exact dosorting withdatatablecss" data-placeholder=""> <?php echo __('emer')?></th><?php } ?>
										<?php if($dispfunc=='2') {?>
                                        <th align="left" width="150px !important" class="table-column filter-select filter-exact dosorting withdatatablecss" data-placeholder=""> <?php echo __('Function')?></th>
										<?php } ?>
                                        <!--<th align="left" width="17%" class="table-column filter-select filter-exact dosorting withdatatablecss" data-placeholder="State"> <?php echo __('state')?> </th>-->
                                        <!--<th align="left" width="3%" class="table-right-ohne" style="border-bottom:#CCCCCC 1px solid; border-top:#CCCCCC 1px solid;border-radius:0px !important;">&nbsp;</th>-->
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                       
                                        <th colspan="6" class="pagerlocationedit form-horizontal">
                                            <span><a class="first" href="javascript:;">&lt;&lt;</a></span>
                                            <span><a class="prev" href="javascript:;">&lt;</a></span>
                                            <span style="font-family: Trebuchet MS,Arial,Helvetica,sans-serif;font-size: 12px; font-weight: normal;"><?php __('Page') ?></span>
                                            <select class="pagenum input-mini hide" title="Select page number"></select>
                                            <span class="pagedisplay"></span> <!-- this can be any element, including an input -->			
                                            <span><a class="next" href="javascript:;">&gt; </a></span>
                                            <span><a class="last" href="javascript:;">&gt;&gt; </a></span>

                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $dnsStatus = Configure :: read('dnsStatus');
                                    foreach ($dnsdetail as $res) {
										//echo "<pre>";print_r($res);
										
                                        ?>
                                        <tr style="background-color:#FFF; border-bottom:#D1D1D1 1px solid; border-right: 1px solid #D1D1D1;" id="hh_<?php echo $res['Dns']['id']; ?>">
                                            <!--<td style="background-color:#FFF; border-bottom:#CCCCCC 1px solid;  border-right: 1px solid #CCCCCC;" class="table-left" id="firstchild<?php echo $res['Odsentry']['id']; ?>">&nbsp;</td>-->
                                            <td style="background-color:#FFF; border-bottom:#D1D1D1 1px solid; border-right: 1px solid #D1D1D1;border-left: 1px solid #D1D1D1!important; " class="table-left" align="center" > <input type="checkbox" class="odsentchk"  value="<?php echo $res['Dns']['id']; ?>" id="chk<?php echo $res['Dns']['id']; ?>" style="margin-left:8px;"/> </td>
                                            <td style="background-color:#FFF; border-bottom:#CCD1D1D1CCCC 1px solid;  border-right: 1px solid #D1D1D1;"><?php echo $res['Dns']['id']; ?></td>
                                            <td style="background-color:#FFF;border-bottom:#D1D1D1 1px solid;  border-right: 1px solid #D1D1D1;" id="lkname_<?php echo $res['Dns']['id']; ?>">
                                                <?php echo $html->link(__($res['Location']['name'], true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $SELECTED_CUSTOMER_NAME . '/dns_id:' . $res['Dns']['id'] . '/location_id:' . $res['Location']['id'] . '/loc_id:' . $location['Location']['id']), array('class' => "fancybox fancybox.ajax", 'id' => '')); ?>
                                                <?php //echo $res['Location']['name'];  ?>
                                                <input type="hidden" name="lokname_<?php echo $res['Dns']['id']; ?>" id="lokname_<?php echo $res['Dns']['id']; ?>" value="<?php echo $res['Location']['name']; ?>" />
                                                <input type="hidden" name="dnid_<?php echo $res['Dns']['id']; ?>" id="dnid_<?php echo $res['Dns']['id']; ?>" value="<?php echo $res['Dns']['name']; ?>" />
                                            </td> 
											<?php if($res['Location']['scm_name']=="UNKNOWN"){ ?>
											<td style="background-color:#FFF; border-bottom:#D1D1D1 1px solid;  border-right: 1px solid #D1D1D1;"><?php echo $res['Dns']['emer']; ?>

                                            </td>
											<?php } ?>
											<?php if($dispfunc=='2') {?>
                                            <td style="background-color:#FFF; border-bottom:#D1D1D1 1px solid;  border-right: 1px solid #D1D1D1;">
											
											<?php
												if($res['Dns']['function']!=''){echo __($res['Dns']['function'],true);}
												else { echo __('free',true);} 
											?>
                                            </td>
											<?php } ?>
                                            <!--<td style="background-color:#FFF;border-bottom:#CCCCCC 1px solid;  border-right: 1px solid #CCCCCC;"><div class="status<?php echo $res['Dns']['id']; ?>"> <?php echo __($dnsStatus[$res['Dns']['status']], true); ?></div></td>-->
                                            <!--<td style="background-color:#FFF;  border-bottom:#CCCCCC 1px solid;" align="center" >&nbsp;</td>-->
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div> 
						</div>
							<div class="button-right-hover" style="margin: -12px 2px 11px !important;">
 <?php echo $html->link(__("Add Numbers", true), array('controller' => 'dns',  'action' => 'selectdns', "location_id:" . $location['Location']['id']), array('class' => $selected['DN List'] . " fancybox fancybox.ajax showhighlight_buttonleft ",)); ?>		
                        </div> 	
                        <div class="" style="margin-top:-15px;" >
						<!--<div class="cnt" style="display: inline;margin-left:5px; margin-top: -20px;"></div>-->
						<div id="updateselected" class="button-left-hover" style="margin: -12px 2px 11px !important;">
                            <?php echo $html->link(__("Update Selected", true), array('controller' => 'dns', 'action' => 'openlocationupdateview/customer_id:' . $SELECTED_CUSTOMER_NAME . '/loc_id:' . $location['Location']['id']), array('class' => $selected['DN List'] . " fancybox fancybox.ajax cntchk_updatemsg2 cnt showhighlight_buttonright")); ?> 
							</div>
                             
                        </div><br/>
                    </form>		    
                </div>
                
      <!-- LOGS -->
				<h4 style="display:block;float:left;width: 100%;"><?php echo __('Logs')?> <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleLogs();" href="javascript:void(0)" style="float:right;">
					<div style="width:20px; height:20px;" id="logpbtn">
					<div id="plus"></div>
					</div>
					<div style="width:20px; height:20px;" id="logmbtn">
					<div id="minus"></div>
					</div>
					</a></h4>
					</div>
			    	<?php
			    	if (isset($showLogs) || ((isset($success)) && $success)) { ?> <div id="showLogs" class="table-content" style="display:none"> <?php }
			    	else { ?> <div id="showLogs" class="table-content" style="display:none"> <?php }?>
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
							foreach($loginfo as $log): ?>
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
	                 <td><?php
	                 $logstring = htmlspecialchars($log['Log']['log_entry']);
	                 echo substr($logstring, 0, 70);
	                 #echo $logstring;
	                 ?>...</td>
	          			<td> <?php echo $html->link(__("details", true), array('controller'=> 'logs', 'action'=>'logdetails',$log['Log']['id']), array('class' => "fancybox fancybox.ajax")); ?></td>
	         	  </tr>
	         		<?php
					endforeach;
					?>
	       	 	</tbody>
				</table>
			 </div>
	</div>
    <?php
} else {
    ?>
    <input type="hidden" value="" id="hid_blf"/>
    <div id="myTable" class="phonekey table-content">
        <fieldset>
           <fieldset>
                <fieldset style="display:none;">
                    <input type="hidden" name="_method" value="PUT" />
                </fieldset>
                <!-- CBM
                	<div class="button-right">
                      <a href="javascript:void(null);"  onclick="javascript:return validate_form();" name="validate" value="validate" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"> <?php __('Validate') ?></a>
                    </div>
                    <div class="button-left">
                		<?php echo $html->link(__('reset', true), array('controller' => 'stations', 'action' => 'edit', $location['Location']['id']), array('onmouseover' => 'javascript:hoverButtonLeft(this);', 'onmouseout' => 'javascript:outButtonLeft(this);')); ?>
                    </div>
                -->
            </fieldset>

     <!--Start of Create Location attributes section -->
            <?php echo $form->create(null, array('id' => 'LocationEditForm', 'url' => array('controller' => 'locations', 'action' => 'update/'), 'accept-charset' => 'ISO-8859-1')); ?>      
            <input type="hidden" id="show_main_val" value="0"  />
            <div id="newEdit">
               <div class="form-body">
                    <div class="form-box">
                             <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('loc_name', true) . '</div>';
                                echo $form->input('Location.name', array('label' => false, 'type' => 'text', 'value' => $location['Location']['name'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);",'class'=>'form-changevalidate'));
                                echo '<div style="width:100px; float: left">' . __('Remark', true) . '</div>';
                                echo $form->input('Location.desc', array('label' => false,'rows'=>'5','cols'=>'45', 'value' => $location['Location']['remark'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);"));
                                ?>
                            </div>
                          <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Address', true) . '</div>';
                                echo $form->input('Location.address', array('type' => 'text', 'label' => false, 'value' => $location['Location']['address'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);",'class'=>'form-changevalidate'));
                                ?>			
                            </div>
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Ort', true) . '</div>';
                                echo $form->input('Location.ort', array('type' => 'text', 'label' => false, 'value' => $location['Location']['ort'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);",'class'=>'form-changevalidate'));
                                ?>			
                            </div>
                            <div class="form-left">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('zip', true) . '</div>';
                                echo $form->input('Location.plz', array('type' => 'text', 'label' => false, 'value' => $location['Location']['plz'], 'style' => 'width:140px;', 'onkeyup' => "chngbkcolor(this);",'class'=>'form-changevalidate'));
                                ?>	
                           </div>
                           
                       <!--  
                             <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('emer', true) . '</div>';
                                echo $form->input('Location.emergency', array('type' => 'text', 'label' => false, 'value' => $location['Location']['emer'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
						-->

                       <div class="form-right">
                            <?php
                            echo '<div style="width:100px; float: left">' . __('Emrg String', true) . '</div>';
                            echo $form->input('Location.emer', array('type' => 'text', 'label' => false, 'value' => $location['Location']['emer'], 'style' => 'width:100px;', 'readonly' => 'true'));
                            echo $form->input('Location.customer_id', array('type' => 'hidden', 'label' => false, 'value' => $SELECTED_CNN));
                            echo $form->input('Location.slug', array('type' => 'hidden', 'label' => false, 'value' => ''));
							
                            ?>		

                        </div>
						<!--  
                            <div class="form-right">
                                <?php
                                echo '<div style="width:100px; float: left">' . __('Pro Nr', true) . '</div>';
                                echo $form->input('Location.pro_nr', array('type' => 'text', 'label' => false, 'value' => $location['Location']['pro_nr'], 'style' => 'width:140px;', 'readonly' => $readonly ,'class'=>'readtext'));
                                ?>		
                            </div>
						-->

                        <div class="button-right-hover" id="update" >
                          <!--  <a href="javascript:void(null);" id="create"  onclick="document.getElementById('LocationEditForm').submit();" name="update" value="validate" ><?php __('createLocation') ?></a> -->
                        </div>
                        <div class="button-right" id="selectzip">
                            <a href="javascript:void(null);"  onclick="zipvalidate();" name="validate" value="validate" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __('validateEmer') ?></a>
                        </div>
                        <div class="form-left">
                            <?php
                            echo $form->input('Location.status', array('type' => 'hidden', 'value' => 1));
                            echo $form->input('Location.customer_id', array('type' => 'hidden', 'value' => $SELECTED_CUSTOMER_NAME));
							$randgeneratedid = rand(0,time());
							echo $form->input('Location.id', array('type' => 'hidden', 'value' => $randgeneratedid));
							echo $form->input('Location.loc_type', array('type' => 'hidden', 'value' => 'Virtual'));
							
                            ?>		
                            <?php echo $form->end(); ?>
                        </div>	
                    </div>	
                </div>
            </div>	
            </form>
    </div>
    </div>
    <div style="visibility:hidden;" id="slelectzip_div" ><a id="slect_zip"  class="fancybox fancybox.ajax" >ADD zip</a></div>

    </fieldset>
<?php }
?>
</div>
<!--right hand side starts from here-->
<div id="related-content">
    <div class="box start link">
        <a href="http://www.swisscom.ch/grossunternehmen" target="_blank">
            <?php __('Home Swisscom') ?>
        </a>
    </div>
    <div class="box">
        	 <h3><?php __('locationEdit') ?></h3>
                 <p>
                  <?php __('locationEdit_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('dnlocationEdit_helpText') ?></p>
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>      
			</div>
    </div>
		
    <div class="box call-to-action">

        <div class="info info-error" style="z-index: 2">
            <a href="" id="warningNotification">&nbsp;</a></div><h3><?php __("notifications"); ?></h3>

        <p><?php __("InWork Objects"); ?>.</p>
        <div>
            <ul>
                <?php echo $this->element('right_notifications', array('SELECT_CUSTOMER' => $SELECTED_CNN)); ?>
            </ul>	
        </div>

    </div>


    <!--INTERNAL USER OPTIONS -->
    <?php if ($userpermission == Configure::read('access_id')) {
        ?>
        <div class="box info">
            <h3><?php __('Internal User') ?></h3>
            <p><?php echo $selected_customer . '('. $SELECTED_CNN. ')'; ?></p>
            <p><?php echo $location['Location']['pro_nr']; ?></p>
       </div>

        <!--COmment out upload functionality 
        <fieldset>
        <div class="block">
        <div class="button-left">
        <a href="javascript:void(null);"  onclick="javascript:return upload_xml();"  onmouseover="hoverButtonLeft(this)" onmouseout="outButtonLeft(this)">
        <?php __("Upload"); ?>
        </a>
        </div>
        </div>
        </fieldset>
        -->


    <?php }
    ?>
</div>
<!--right hand side  ends here-->


</div>



<!--<script language="JavaScript">
  populateArrays();
</script>-->





