<style>
.fancybox-inner{
	height: auto !important;
    overflow: auto;
    width: 650px!important;
}

.tablesorter-bootstrap .tablesorter-header-inner {
    padding: 1px 10px 4px 0 !important;
}


</style>
<script type="text/javascript">
    $(document).ready(function() {

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

    });

</script>
<script>
function set_visifilterdns(val)
{	
	if(val=='shortcontdns') {	
		
			$(".scontdns").slideToggle("slow");
			
	}	
}

</script>


<script type="text/javascript">

    jQuery(document).ready(function() {
		$('.cntdns').hide();
        /** code to select all filteres records : start **/
        $('.reset').click(function() {
            var checkboxes = $(this).closest('form').find(':checkbox');
            checkboxes.removeAttr('checked');
        });

<?php if (isset($scenario_name)) { ?>

        jQuery('.selectdnsCheckbox').click(function() {
            var noofrecord = 0;
			$('.cntdns').show();
            jQuery('input[type="checkbox"]').each(function() {
				var  selnum = $("#chknumber").val();
				var  chknum = selnum-1;
                if ($(this).is(':checked')) {
										
					 jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
                      jQuery('#updatedns').removeAttr("class");
                      jQuery('#updatedns').attr("class", "button-right-hover");
					  					  
                    noofrecord++;
					
                }
            });

           if (noofrecord < 1)
            {
                $('.cntdns').hide();
            }
            //$('.cntdns').text(noofrecord + ": records are selected");
			$('.cntdns').text("<?php echo __('dnOfLocationSelected'); ?> : " + noofrecord);
        });

        $(document).on('click', '#checkAllDn', function(event) {
            var noofrecord = 0;
            if (jQuery("#checkAllDn").is(':checked')) {
				
				$('.cntdns').show();
                jQuery('.dnlist input[type="checkbox"]').each(function() {
					var CCStyle = jQuery(this).parent().parent().attr('style');
                    var CClass = jQuery(this).parents("tr").attr('class');
					//CStyle.indexOf("display: none") == -1
					var  selnum = $("#chknumber").val();
				    var  chknum = selnum-1;		
					
					/*   commented for multiselect                */		
					
                 if (CClass.indexOf("filtered") == -1) {						
						
					
																		
                        var attrid = jQuery(this).attr('id');						
                        jQuery('#' + attrid).prop("checked","checked");
						jQuery(this).attr("checked", true);
						jQuery(this).prop("checked", true);						
                     
						
					  jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
					  jQuery('#updatedns').removeAttr("class");
                      jQuery('#updatedns').attr("class", "button-right-hover");
						
                        noofrecord++;
                        //alert("kk"+noofrecord);

                    }
					
					
					/*else if (CClass.indexOf("filtered") == -1) {
																		
                       
					    var attrid = jQuery(this).attr('id');
						
	                        jQuery('#' + attrid).prop("checked","checked");
							jQuery(this).attr("checked", true);
                        						
							jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
							jQuery('#updatedns').removeAttr("class");
		                    jQuery('#updatedns').attr("class", "button-right-hover");	
						
                        noofrecord++;
                        //alert("kk"+noofrecord);
						

                    }*/
					// noofrecord++;
					
                });
               // $('.cntdns').text(noofrecord - 1 + ": records are selected");
				 $('.cntdns').text("<?php echo __('dnOfLocationSelected'); ?> : " + (noofrecord - 1 ));

            } else {
                jQuery('.dnlist input[type="checkbox"]').each(function() {
                    jQuery(this).removeAttr("checked");
                });
               // $('.cntdns').text("0" + ": records are selected");
				$('.cntdns').hide();
            }
        });

<?php } else { ?>

jQuery('.selectdnsCheckbox').click(function() {
            var noofrecord = 0;
			$('.cntdns').show();
            jQuery('input[type="checkbox"]').each(function() {
				var  selnum = $("#chknumber").val();
				var  chknum = selnum-1;
                if ($(this).is(':checked')) {
					if(noofrecord<=chknum){
										
					 jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
                      jQuery('#updatedns').removeAttr("class");
                      jQuery('#updatedns').attr("class", "button-right-hover");
					  					  
                    noofrecord++;
					}
					else{
						var attrid = jQuery(this).attr('id');
                        jQuery('#' + attrid).removeAttr("checked", "");
						return false;
					}
                }
            });

           if (noofrecord < 1)
            {
                $('.cntdns').hide();
            }
            //$('.cntdns').text(noofrecord + ": records are selected");
			$('.cntdns').text("<?php echo __('dnOfLocationSelected'); ?> : " + noofrecord);
        });

        $(document).on('click', '#checkAllDn', function(event) {
            var noofrecord = 0;
            if (jQuery("#checkAllDn").is(':checked')) {
				
				$('.cntdns').show();
                jQuery('.dnlist input[type="checkbox"]').each(function() {
					var CCStyle = jQuery(this).parent().parent().attr('style');
                    var CClass = jQuery(this).parents("tr").attr('class');
					//CStyle.indexOf("display: none") == -1
					var  selnum = $("#chknumber").val();
				    var  chknum = selnum-1;				
					
                  if (CCStyle.indexOf("display: none") == -1) {						
						
					if(noofrecord<=selnum) {
																		
                        var attrid = jQuery(this).attr('id');						
                        jQuery('#' + attrid).prop("checked","checked");
						jQuery(this).attr("checked", true);
						jQuery(this).prop("checked", true);						
                     }
					 else{
					 	var attrid = jQuery(this).attr('id');
                        jQuery('#' + attrid).removeAttr("checked", "");
						return false;
					 }   
						
					  jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
					  jQuery('#updatedns').removeAttr("class");
                      jQuery('#updatedns').attr("class", "button-right-hover");
						
                        noofrecord++;
                        //alert("kk"+noofrecord);

                    }
					
					/* commented for multiselect  */
					
					/* if (CClass.indexOf("filtered") == -1) {
																		
                       if(noofrecord<=selnum) {
					    var attrid = jQuery(this).attr('id');
						
	                        jQuery('#' + attrid).prop("checked","checked");
							jQuery(this).attr("checked", true);
                        						
							jQuery('#dnsbutton').attr("class", "showhighlight_buttonleft");
							jQuery('#updatedns').removeAttr("class");
		                    jQuery('#updatedns').attr("class", "button-right-hover");	
						
                        noofrecord++;
                        //alert("kk"+noofrecord);
						}
						else{
							var attrid = jQuery(this).attr('id');
	                        jQuery('#' + attrid).removeAttr("checked", "");
							return false;
						}

                    }
					*/
					
					 noofrecord++;
                });
               // $('.cntdns').text(noofrecord - 1 + ": records are selected");
				 $('.cntdns').text("<?php echo __('dnOfLocationSelected'); ?> : " + (noofrecord - 1 ));

            } else {
                jQuery('.dnlist input[type="checkbox"]').each(function() {
                    jQuery(this).removeAttr("checked");
                });
               // $('.cntdns').text("0" + ": records are selected");
				$('.cntdns').hide();
            }
        });
		
<?php } ?>
        $('#addChecked').on("click", function() {
            var count = 0;
            $('form input[type="search"]').each(function() {
                if ($(this).val() != "") {
                    count++;
                }
            });
            if (count == 0) {
                //var checkboxes = $(this).closest('form').find(':checkbox'); 
                var checkboxes = $(this).closest('form').find('input[type=checkbox]:not(:disabled)');
                //checkboxes.attr('checked', 'checked');
            } else {
                /** add script to check all checkbox who does not fall under hidden tr **/
                var checkboxes = $("table.dataTable tr:visible").find('input[type=checkbox]:not(:disabled)');
                //var checkboxes1 = jQuery( tr:(.filtered)).find(':checkbox');
                //checkboxes.attr('checked', 'checked');
            }
        });
        /** code to select all filteres records : ends **/
        jQuery("#filter_now_overlay").click(function() {
            var MinVal = jQuery('#rangeMin_overlayMinval').val();
            var MaxVal = jQuery('#rangeMax_overlayMaxval').val();
			var customerid="<?php echo $cst_id; ?>";    

            if ((MinVal.length < 9 || MinVal.length > 9) && (MaxVal.length < 9 || MaxVal.length > 9)) {
                alert('Filter Range From and To Must Be 9 digits!');
                return false;
            } else {

                if (isNaN(MinVal) || isNaN(MaxVal)) {
                    alert('Filter Range must be numeric only!');
                    return false;
                } else {

                   // var TargetURL = "<?php echo Configure::read('base_url'); ?>dns/filterdns/scenario_id:<?php echo $scenario_id; ?>" + "/MinVal:" + MinVal + "/MaxVal:" + MaxVal;
					 var TargetURL = "<?php echo Configure::read('base_url'); ?>dns/filterdns/scenario_id:<?php echo $scenario_id; ?>/location_id:<?php echo $location_id; ?>" + "/MinVal:" + MinVal + "/MaxVal:" + MaxVal+"/customer_id:"+customerid;

                                        jQuery.post(TargetURL, function(response) {

                                            $('#ajax_load_ajax').html(response);


                                        });
                                    }
                                }
                            });
						 jQuery("#reset_filter").click(function() {
							
                                jQuery('#rangeMin_overlayMinval').val('');
                                jQuery('#rangeMax_overlayMaxval').val('');
                                //jQuery("#form").submit();
                            });

                            $('#removeChecked').on("click", function() {
                                var count = 0;
                                $('form input[type="search"]').each(function() {
                                    if ($(this).val() != "") {
                                        count++;
                                    }
                                });
                                if (count > 0) {
                                    var checkboxes = $("table.dataTable tr:visible").find(':checkbox');
                                    checkboxes.removeAttr('checked');
                                }
                            });

                        });

                        function submit_odsentries(id) {
                            //var trainindIdArray;
                            if ($('input.selectdnsCheckbox').filter(":checked").length > 0) {
                                $('.filtersForm').attr('action', base_url + 'odsentries/index/scenario_id:<?php echo $scenario_id ?>');
                                $('.filtersForm').attr('method', 'POST');
                                //$('#filters').submit();
								
                                $.ajax({
                                    type: "POST",
                                    url: $('.filtersForm').attr('action'),
                                    data: $('.filtersForm').serialize(),
                                    success: function(data) {
										
										

                                        if (data.message == "Success") {
                                            $.each(data.selectdnsCheckbox, function(index, key) {
                                                $("." + key).closest("tr").addClass("insertedDNStyle"); // add class to change tr background color 
                                                $("." + key).closest("tr").find('.entryStatus').text("Added"); // add class to change tr background color 
                                                $("." + key).attr("disabled", true);  // disable checkboxes								
                                                //window.location.reload();
                                            });
                                            $('.reset').click();
                                        } else {
                                            //alert('Some error occured, Please try again');
                                        }

                                        var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/updatescenarioviajquery/";
                                        var ScenarioId = '<?php echo $scenario_id ?>';
                                        $('.black_overlay').show();

                                        jQuery.post(TargetURL, {'scenario_id': ScenarioId}, function(data) {
                                            $('#reloadwholdpagedata').html(data);
                                            jQuery('#updateOdsentry').removeAttr("class");
                                            jQuery('#savedestinations').removeAttr("class");
                                            jQuery('#updateOdsentry').attr("class", " button-right-disabled");
                                            jQuery('.black_overlay').hide();

                                            jQuery('.fancybox-close').click();
                                        });


                                        //Updated the Scenario status i.e. Complete or Incomplete
                                        var TargetURL = "<?php echo Configure::read('base_url'); ?>scenarios/ScenarioCompletedOrNot/scenario_id:" + ScenarioId;

                                        jQuery.post(TargetURL, function(response) {
                                            jQuery('#Status').val(response);
                                            jQuery('#sts').html('Status :' + response);

                                            var msgd = response.trim();
                                            if (msgd == "Complete") {
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
window.location.reload();
$('#overlay-sucess .ok .message').text("<?php __('Scenario succesfully added') ?>");

$('.update_message').html(data);
		        $('#overlay-sucess').removeClass('hide');
                                    }
                                });
                            } else {
                                alert("Please select DN's");
                            }
							 
                        }


                        /*function submit_locationentries2(id) {
                            
                            if ($('input.selectdnsCheckbox').filter(":checked").length > 0) {
                                $('.filtersForm').attr('action', base_url + 'locations/updatedns/location_id:<?php echo $location_id ?>');
                                $('.filtersForm').attr('method', 'POST');
                                $('.black_overlay').css('display', 'block');
                                //$('#filters').submit();
								
                                $.ajax({
                                    type: "POST",
                                    async: false,
                                    dataType: 'json',
                                    url: $('.filtersForm').attr('action'),
                                    data: $('.filtersForm').serialize(),
                                    
									success: function(data) {

                                        //if (data == "1") {
											//alert("success");
                                            jQuery('.black_overlay').removeAttr('style');
                                            jQuery('.black_overlay').attr("style", "display:none");
                                            
                                            $.each(data.selectdnsCheckbox, function(index, key) {
                                                $("." + key).closest("tr").addClass("insertedDNStyle"); // add class to change tr background color 
                                                $("." + key).closest("tr").find('.entryStatus').text("Added"); // add class to change tr background color 
                                                $("." + key).attr("disabled", true); // disable checkboxes

                                            });
                                            $('.reset').click();
											window.location.reload();
                                        //} else {
                                         //   alert("record can not be saved try again");
                                           // jQuery('.black_overlay').removeAttr('style');
                                            //jQuery('.black_overlay').attr("style", "display:none");
                                        //}
                                    }
                                });
                            } else {
                                alert("Please select at least one record");
                            }
                        }*/



		/*######################################### 8 May 2014 ######################################################################*/				

function submit_locationentries(id){
	var dnsids = '';
   var seldnids = '';
   if ($('input.selectdnsCheckbox').filter(":checked").length > 0) {
   jQuery('input.selectdnsCheckbox').each(function() { 
         
		if ($(this).is(':checked')) { 
					
			dn_id = $(this).val();
			
			dnsids += dn_id + '&';
			seldnids += dn_id + ',';
		}
   });
   
  // dnsids = dnsids.replace("on&", "");
   
 $('.black_overlay').css('display', 'block');
	$.fancybox.showLoading()  ;	
var TargetURL = "<?php echo Configure::read('base_url');?>locations/updatedns/";
	$('.black_overlay').css('display','block');
 		jQuery.post( TargetURL, {'location_id':'<?php echo $location_id ?>', 'dnsids':dnsids}, function( data ) {  //alert(data);
window.location.reload();
 //location.reload(false);
	});
	} else {
             alert("Please select at least one record");
           }		
}
						

	
	  

/*###########################################################################################################################*/	


    function paginationStyle(totPages,currPage) {
        // $("table").removeClass('table-striped');
        // $("table").removeClass('tablesorter-bootstrap');
        var pageDisplay = $(".cust_tab_pag .pagedisplay").text();
        temp = pageDisplay.split("-");
        temp[0] = $.trim(temp[0]);
        temp[1] = $.trim(temp[1]);
        if (typeof temp[1] != 'undefined') {
            page2 = temp[1].split("/");
            page2[0] = $.trim(page2[0]);
            page2[1] = $.trim(page2[1]);
            page3=page2[1].split("(");
            page3[0] = $.trim(page3[0]);
            page3[1] = $.trim(page3[1]);
            var showrecord = page3[0];
            totalPage = totPages;
        } else {
            return false;
        }
        if(typeof totalPage == "undefined")
        {
            return false;
        }
        $(".pagedisplay").text('');
        box = currPage+1;
        $('.countdisplay5').html(showrecord);
        var newStyle = "<input type='text' name='currpage' value='" + box + "' style='width:25px;text-align:center;float: inherit;' maxlength='3' class='GoOnTargetPage'>";
        newStyle += "<span style='font-weight:bold'> <?php echo __('Of') ?> " + totPages + "</span>";
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

    }//end paginationstyle
						
/*   
* change pagination style ends here 
*/			

jQuery(function() {

    jQuery.extend(jQuery.tablesorter.themes.bootstrap, {
        // these classes are added to the table. To see other table classes available,
        // look here: http://twitter.github.com/bootstrap/base-css.html#tables
    	table: 'table table-bordered',
    	header: 'bootstrap-header', // give the header a gradient background
    	footerRow: '',
    	footerCells: '',
    	icons: '', // add "icon-white" to make them white; this icon class is added to the <i> in the header
    	sortNone: 'bootstrap-icon-unsorted',
    	sortAsc: 'icon-chevron-up',
    	sortDesc: 'icon-chevron-down',
    	active: '', // applied when column is sorted
    	hover: '', // use custom css here - bootstrap class may not override it
    	filterRow: '', // filter row class
    	even: '', // odd row zebra striping
    	odd: '', // even row zebra striping
    	emptyTo: 'none',
    	link: '<a href="#">{page}</a>',
    	sPaginationType: "full_numbers",
    	sDom: "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
    });
    // call the tablesorter plugin and apply the uitheme widget
    jQuery(".tablesorterdns").tablesorter({
        // this will apply the bootstrap theme if "uitheme" widget is included
        // the widgetOptions.uitheme is no longer required to be set
        theme: "bootstrap",
        widthFixed: true,
    	
        headerTemplate: '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!

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
            7: {sorter: false, filter: false}


        }
    }).tablesorterPager({
        // target the pager markup - see the HTML block below
        container: jQuery(".selectdnspager"),
        // target the pager page select dropdown - choose a page
        cssGoto: ".pagenum",
        // remove rows from the table to speed up the sort of large tables.
        // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
        removeRows: false,
        // output string - default is '{page}/{totalPages}';
        // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
        output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
        pagerUpdate:function(totPages,currPage)
        {
            paginationStyle(totPages,currPage);
        }
        //output: '{startRow} - {endRow} [{page}] {filteredRows} ({totalRows})'
        //output: 'Page <input type="text" name="currpage" value="{page}" class="pagination_text" maxlength="3"> Of {totalPages}'
        //output: '<input type="text" name="currpage" value="{page}" class="pagination_text" maxlength="3"> <?php echo __('Of') ?> {totalPages}'

    });
});


</script>

<?php
/*
 * Css
*/
?>
<style>
    .tablesorter-filter
    {
        width:100% !important;
		float:left !important;
				
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
		background-color:#F9F9F9 !important;
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
	
    /*#example colgroup col:nth-child(3)
    {
        width:150px !important;
    }
    #example colgroup col:nth-child(4)
    {
        width:120px !important;
    }*/

    .selectdnsCheckbox {/*margin-left:24px !important;*/}

    .withdatatablecss {
        border-bottom:#D1D1D1 1px solid !important; border-right: 1px solid #D1D1D1 !important;border-top:#D1D1D1 1px solid !important; border-radius:0px !important;	border-left: 1px solid #D1D1D1!important;
    }
	.tablesorter-filter-row td
	{
		border-bottom:#D1D1D1 1px solid !important; border-right: 1px solid #D1D1D1 !important;border-top:#D1D1D1 1px solid !important; border-radius:0px !important;border-left: 1px solid #D1D1D1!important;
	}
	.table-bordered {
    border-image: none;
    border-radius: 0 !important;
    border-style: none !important;
    border-width: 0 !important;
    width: 630px ;
}
.form-box .form-left {
    float: left;
    margin: 0;
    padding: 0;
    width: 230px !important;
}
.form-box .form-right {
    float: left;
    margin: 0;
    padding: 0;
    width: 230px!important;
}
.fancybox-close {
    cursor: pointer;
    height: 0px!important;
    position: absolute;
    right: -30px;
    top: -20px;
    width: 36px;
    z-index: 8040;
}	


.tablesorter-bootstrap .tablesorter-header i {
    background-repeat: no-repeat;
    display: inline-block;
    float: right!important;
    height: 14px;
    left: 2px;
    line-height: 14px;
    margin-top: 10px!important;
    position: absolute; 
    width: 12px;
}
a{
	text-decoration: none!important;
}
.tablesorter-bootstrap .tablesorter-header, .tablesorter-bootstrap tfoot th, .tablesorter-bootstrap tfoot td {
    padding: 5px 8px!important;
}
.tablesorter-bootstrap .tablesorter-header-inner {
    font-size: 11px;
    padding: 0px 10px 4px 1px!important;
    position: relative;
	margin-left:-5px;
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
    
	padding-left:6px!important;
    text-align: left;
    vertical-align: top;
}	
#example tr td:nth-child(2) input[type="search"]{
    width: 90px !important;
}
#example tr td:nth-child(3) .dataTable select{
    width: 80px !important;
}
#example tr td:nth-child(4) input[type="search"], #example tr td:nth-child(5) input[type="search"] {
    width: 110px !important;
}



</style>

<script>
	function fancyboxclose(){
		setTimeout( function() { $('.fancybox-overlay').trigger('click'); },5);
		 //window.location.reload();
		 //If this is scenario context and the overlay is going to be closed and no numbers are in the scenario then delete.

	}
</script>
<?php $selnumber = Configure :: read('selectnumber');
$chknumber = $selnumber[0];
 ?>
 <input type="hidden" name="chknumber" id="chknumber" value="<?php echo $chknumber; ?>"/>

<form id="form_overlay" class="filtersForm" action="<?php echo Configure::read('base_url'); ?>dns/filterdns/scenario_id:<?php echo $scenario_id; ?>" enctype="multipart/form-data" method="POST" > 
    <div class="black_overlay" style="height: 622px; width: 1366px; display: none;">
        <!--<div id="black_overlay_loading">
            <img alt="" src="../../img/assets/ajax-loader.gif">
        </div>-->
    </div>
    <?php if (isset($scenario_name)) { ?>
        <h4> <?php echo __('selectDnsToScenario_prefix'); ?><?php echo $scenario_name; ?><?php echo __('selectDnsToScenario_postfix'); ?>
     

      <div class='demonstrations'>           
		   <div> <a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="return fancyboxclose(); UnTip();">X</a></div>		  
	        
			<div><a href="javascript:;"  style="cursor:pointer" onMouseOver="Tip('<b><?php echo __('selectDnsToScenario_helpTitel') ?></b><br/><?php echo __('selectDnsToScenario_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>				
    		
 	  </div>
     
        </h4> <br/>
             
             
    <?php } else { ?>
        <h4> <?php echo __('Adding number to Location'); ?>   <?php echo $location_name; ?> <?php echo __('dnsMove'); ?> 

   <div class='demonstrations'>           
			   <div><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="return fancyboxclose(); UnTip();">X</a></div>		  
	        
			<div><a href="javascript:;"  style="cursor:pointer" onMouseOver="Tip('<?php echo __('selectDnsToScenario_helpTitel') ?></b><br/><?php echo __('selectDnsToScenario_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>				
    		
 	  </div>

         </h4>
    <?php } ?>
	
	<?php  $selectedLanguage = $_SESSION['Config']['language'];
						if($selectedLanguage=='de'){
							 $width = 220;
							 $rangeminwidth = 200;
							 $rangemaxwidth = 200;
							 $filterwidth = 243;
							 
							 $dnidtablewidth = 80;
							 $locationtablewidth = 80;
							 $functiontablewidth = 80;
							 $odstablewidth = 80;
							 $trunktablewidth = 80;
							 
							 }
						else if($selectedLanguage=='fr') {
							 $width = 183;
							 $rangeminwidth = 200;
							 $rangemaxwidth = 200;
							 $filterwidth = 213;
							 
							 $dnidtablewidth = 80;
							 $locationtablewidth = 80;
							 $functiontablewidth = 80;
							 $odstablewidth = 80;
							 $trunktablewidth = 80;
							 }
						else if($selectedLanguage=='it'){
							$width = 146;
							 $rangeminwidth = 200;
							 $rangemaxwidth = 200;
							 $filterwidth = 213;
							 
							 $dnidtablewidth = 80;
							 $locationtablewidth = 80;
							 $functiontablewidth = 80;
							 $odstablewidth = 80;
							 $trunktablewidth = 80;
						}
						else if($selectedLanguage=='en'){
							 $width = 146;
							 $rangeminwidth = 200;
							 $rangemaxwidth = 200;
							 $filterwidth = 213;
							 
							 $dnidtablewidth = 80;
							 $locationtablewidth = 80;
							 $functiontablewidth = 80;
							 $odstablewidth = 80;
							 $trunktablewidth = 80;
						}
					?>
   <!--	<div style="max-width: <?php echo $width; ?>px;margin-left:15px;">
	<?php //echo __('DN Range Filter'); ?>
	  <a  href="javascript:;" style="cursor:pointer" onMouseOver="Tip('<?php echo __('advancedFilter_tooltip') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="set_visifilterdns('shortcontdns')"  title="">
	     <div style="width:20px;background:#eee; height:20px;float:right" id="pbtn_schedule"  >
             <div id="plus_schedule"></div>
         </div>
         <div style="width:20px;background:#eee; height:20px;display: none;float:right" id="mbtn_schedule" >
             <div id="minus_schedule"></div>
         </div>
	  
	   </a>   
	</div>  -->
		
	
    <div id="shortcontdns" class="scontdns" style="display: none;margin-left: 5px;">    
	<div class="form-box" >
	 
        <div class="form-left" style="margin-left: 0px;width:<?php echo $rangeminwidth; ?>px !important">
            <?php
            echo '<div style="width:102px; float: left;margin-left:0px;">' . __('rangeMin', true) . '</div>';
            echo $form->input('rangeMin_overlay.minval', array('style' => 'margin:2px 4px 5px 8px; width:70px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMinval));
            ?>		
        </div>
        <div class="form-right" style="margin-left: 5px;width:<?php echo $rangemaxwidth; ?>px !important;">
            <?php
            echo '<div style="width:102px; float: left;margin-left:8px;">' . __('rangeMax', true) . '</div>';
            echo $form->input('rangeMax_overlay.maxval', array('style' => 'margin:2px 4px 5px 8px;width:70px !important;', 'label' => false, 'class' => 'filter_range_textbox', 'div' => false, 'maxlength' => '9', 'value' => $rangeMaxval));
            ?>		
        </div>    
    </div>
	<div class="form-box" >	
	 
	   <div class="form-left" style="width: <?php echo $width; ?>px !important; margin-top: -4px!important;margin-left:107px;" >
            <div class="button-right" id="filter_now_overlay" style="float:left;">
                <a id="filter_now_overlay" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php echo __('Filter'); ?></a>
            </div>											
            <div class="button-right" id="reset_filter" style="float:left;">
            <a id="reset_filter" href="javascript:void(0);" onmouseout="outButtonRight(this)" onmouseover="hoverButtonRight(this)"><?php __('Clear'); ?></a>
            </div>	
      </div>
   </div>
</div>	
	
    <div class="block top">				
        
		
        <?php
       // echo $form->create('Dns', array('action' => 'selectdns', 'id' => 'filters', 'class' => 'filtersForm', 'type' => 'GET'));
        echo $form->input('Location.customer_id', array('type' => 'hidden', 'value' => $custId));
		$dnsInfo =  __('selectDnsInfo',true); 
		
		if(strlen($dnsInfo)>13 ){ 
		
			$width = 645;
		}
		else {
			$width = 300;
		}
		
        ?>
		<div  style="width:<?php echo $width; ?>px; text-align: justify;float: right;margin-top:-28px;"><?php echo __('selectDnsInfo',true); ?></div>
		
        <div class="cb dnlist">

            <?php
            // check $locations variable exists and is not empty
            if (isset($dns2) && !empty($dns2)) :
                ?>
                <!--Showing Page <?php //echo $paginator->counter();     ?>-->  

                <?php //echo $this->element('pagination/top'); ?>

                <div id="loadajax" class="table-content">

                    <input type="hidden" value="<?php echo $location_id ?>">
						
					
					<div class="selectdnspager form-horizontal" style="display: inline; margin-bottom:5px;" >
                 
               <?php echo __("totalEntries")?> <span class="countdisplay5"><?php echo $dnsTotalrecord;?></span> <?php echo __("entriesPerPage"); ?>: 
                    <select class="pagesize input-mini" title="Select page size">
                        <option selected="selected" value="10">10</option>						
                        <option selected="selected" value="25">25</option>
                        <option selected="selected" value="50">50</option>
                        <option selected="selected" value="100">100</option>
                       
                    </select>
					
                </div>
				
				
				
                    <div id="ajax_load_ajax">
                     
                    <div class="clear"></div>
                        <table id="example" class="dataTable cust_tab_pag tablesorterdns">
                            <thead> 	
                                <tr class="table-top withdatatablecss">
                                   <!-- <th class="table-column table-left-ohne withdatatablecss">&nbsp;</th>-->
								   <?php if (isset($scenario_name)) { ?>
                                    <th class="table-right-ohne withdatatablecss" style="width: 2%!important;padding-left:10px;"><?php //echo __('Select '); ?><input type="checkbox"  name="sAll" id="checkAllDn" style="margin-top: 0px !important;border-left: 1px solid #D1D1D1!important;padding-left: 12px !important;margin-left:10px;"></th> 
									<?php } else { ?>
									<th class="table-right-ohne withdatatablecss" style="width: 2%!important;padding-left:10px;"><?php //echo __('Select '); ?><input type="checkbox"  name="sAll" id="checkAllDn" style="margin-top: 0px !important;border-left: 1px solid #D1D1D1!important;padding-left: 12px !important;margin-left:10px;"></th>
									<?php } ?>
                                    <th style="width:<?php echo $dnidtablewidth ?>px!important; text-align: left;" class="table-column withdatatablecss <?php
                                    if (in_array('sort:id', $filter_sort) && in_array('direction:asc', $filter_sort))
                                        echo 'sortlink_asc';elseif ((in_array('sort:id', $filter_sort) && in_array('direction:desc', $filter_sort)))
                                        echo 'sortlink_desc';
                                    else
                                        echo 'sortlink';
                                    ?> ">
                                        <?php echo __("dnId", true); ?></th>                                   
									
									<th style="width:<?php echo $locationtablewidth ?>px!important; text-align: left;" class="table-column withdatatablecss filter-select filter-exact <?php
                                    if (in_array('sort:location_id', $filter_sort) && in_array('direction:asc', $filter_sort))
                                        echo 'sortlink_asc';elseif ((in_array('sort:location_id', $filter_sort) && in_array('direction:desc', $filter_sort)))                                        echo 'sortlink_desc';
                                    else
                                        echo 'sortlink';
                                    ?> ">
                                        <?php echo __("Location", true); ?></th>

                                     <?php if($cst_type!="Gate"){     ?>     
                                    <th style="width:<?php echo $functiontablewidth ?>pxpx;text-align: left;" class="table-column withdatatablecss filter-select filter-exact <?php
                                    if (in_array('sort:function', $filter_sort) && in_array('direction:asc', $filter_sort))
                                        echo 'sortlink_asc';elseif ((in_array('sort:function', $filter_sort) && in_array('direction:desc', $filter_sort)))
                                        echo 'sortlink_desc';
                                    else
                                        echo 'sortlink';
                                    ?> "><?php echo __("Function", true); ?></th>
                                  <?php   }   ?>
                                     <?php 
										   $odsflag=count($scenarioData);											  
											  if($odsflag!=0){     ?>
                                    <th class="table-column withdatatablecss" style="width:<?php echo $odstablewidth ?>px !important;"><?php echo __("ODS", true); ?></th>
									  <?php   }   ?>
									  <?php if($cst_type!="Phone"){     ?>     
                                    <th class="table-column withdatatablecss" style="width:<?php echo $trunktablewidth ?>px !important;"><?php echo __("trunk", true); ?></th>				                          <?php  }   ?>


                                    <!--<th class="table-right-ohne withdatatablecss" style="width:6% !important;">&nbsp;</th>-->
                                </tr>
                            </thead>
                            <tfoot>
                            <th colspan="8" class="selectdnspager form-horizontal" style="border-bottom:1px solid #F9F9F9 !important;border-left:1px solid #F9F9F9 !important;border-right: 1px solid #F9F9F9 !important;">                               

                                <span><a class="first" href="javascript:;">&lt;&lt;</a></span>
                                <span><a class="prev" href="javascript:;">&lt;</a></span>
                                <span><?php __('Page'); ?></span>
                                <select class="pagenum input-mini hide" title="Select page number"></select>
                                <span class="pagedisplay"></span> 	
                                <span><a class="next" href="javascript:;">&gt; </a></span>
                                <span><a class="last" href="javascript:;">&gt;&gt; </a></span>

                            </th>
							
                            
                            </tfoot>
							
                            <tbody >
                                <?php
                                // initialise a counter for striping the table
                                $count = 0;
                                //$options = $general->get_odsentries($scenario_id); //echo "<pre/>"; print_r($options); die;
                                //echo "<pre/>"; print_r($dns); die;
                                //echo "<pre/>"; print_r($scenarioMap);  print_r($scenarioData);
                                // loop through and display format
                                $dnsIdsArray = array();
								
								

                                foreach ($dns2 as $dn): $insertedDNStyle = "";
								
                                    $disableCheckbox = "";
                                    $entryStatus = "Available";
                                    // stripes the table by adding a class to every other row
                                    $class = ( ($count % 2) ? " class='altrow'" : '' );
                                    // increment count
                                    $count++;

                                    if (in_array($dn['Dns']['id'], $dnsIdsArray)) {
										
										
                                        //if (in_array($dn['Dns']['id'], $options)) {
                                        #If this DN exists already then don't show it here.

                                        $insertedDNStyle = 'class="insertedDNStyle"';
                                        $disableCheckbox = 'disabled';
                                        $entryStatus = "Added";
                                    } else {
                                        #Not already belonging to the 
                                        //$AllScenariosForThisDns = $scenarioMap[$dn['Dns']['id']];
                                        $dnsIdsArray[] = $dn['Dns']['id'];
                                        ?>

                                        <tr onmouseover="hoverRow(this, true);" onmouseout="hoverRow(this, false);
                                            " <?php echo $insertedDNStyle; ?> class="visb">
                                            <!--<td class="table-left withdatatablecss">&nbsp;</td>-->
                                            <td class="withdatatablecss" style="width: 20px !important ; border-left: 1px solid #D1D1D1!important;padding-left: 12px !important;">
                                            <input type="checkbox" class="selectdnsCheckbox"  id="<?php echo $dn['Dns']['id'] ?>" name="selectdnsCheckbox[]" value="<?php echo $dn['Dns']['id'] ?>" <?php echo $disableCheckbox; ?> /></td>	
                                            <td class="withdatatablecss"> 
                                                <?php
                                                if (($dn['Dns']['function'] != '') && ($dn['Dns']['function'] != 'CFRA') && ($dn['Dns']['function'] != 'UCD') && ($dn['Dns']['function'] != 'INTERNAL')) {
                                                    echo $dn['Dns']['id'];
                                                    ?>
                                                </td>
                                                <td class="table-content column-width-50 withdatatablecss " style="width:125px !important;">
												
                                                    <?php
                                                   // echo $dn['Location']['name'];   
													$locationName = __($dn['Location']['name'],true);  
													echo substr($locationName, 0, 20);    
													if(strlen($locationName)>20) { ?> <a href="javascript:;" onclick="Tip('<?php echo __($locationName) ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">..</a>                             
							     
                                      <?php }   ?>
                                                </td>
												
												
												<?php if($cst_type!="Gate" && $cst_type!="Gate+" ){     ?>
                                                <td class="withdatatablecss">
                                                    <?php
                                                    #echo $dn['Dns']['function'];
													
                                                    echo __($dn['Dns']['function'], true);
                                                    ?>
                                                </td>
                                              <?php  }   ?>
                                              
											  <?php 
											   $odsflag=count($scenarioData);
											  
											 if($odsflag!=0){     ?>
											  
                                                <td height="20px; " class="withdatatablecss">
												
	                		 					 <?php 
	                							  $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
												 ?>
																
													<div id="scenario_tip<?php echo $DnsId;?>">
													<?php
													foreach($AllScenariosForThisDns As $scenarioId)
													{
														
														$linkName = $scenarioData[$scenarioId];
														echo "<li style='list-style:none;'>". $linkName; 
													  	echo "</li>";						  
													}
																			 									
													?>
													</div>
		
	                							</td>
												 <?php  }   ?>
												
	                							<!-- 
	                							<td height="20px; " class="withdatatablecss">
                                                    <?php
                                                    $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
                                                    if (isset($AllScenariosForThisDns) && !empty($AllScenariosForThisDns)) {

                                                        foreach ($AllScenariosForThisDns As $key => $scenarioId) {
                                                            if (strpos($scenString, $scenarioData[$scenarioId]) === false) {
                                                                $scenString = $scenString . ',' . $scenarioData[$scenarioId];
                                                            }
                                                        }
                                                        ?>							

                                                        <div id="scenario_tip<?php echo $DnsId; ?>">
                                                            <?php
                                                            foreach ($AllScenariosForThisDns As $key => $scenarioId) {
                                                                echo "<li style='list-style:none;'>" . $scenarioData[$scenarioId];
                                                                echo "</li>";
                                                            }
                                                            #echo $html->link( __('TEST', true),array('controller'=>'scenarios','action' => 'edit/scenario_id:'.$scenarioId));
                                                            ?>
                                                        </div>

                                                    <?php } ?>
                                                </td>
                                                -->
                                                <!--        ORIG                                         
                                                <td class="withdatatablecss">

                                                    <?php
                                                    if (!empty($dn['Trunkentry'])) {
                                                        foreach ($dn['Trunkentry'] as $trunk) {
                                                            $trunk_id = $trunk['trunk_id'];
                                                            $Trunkname = $TrunkDataData[$trunk_id];

                                                            #echo $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id))."<br/>"; 
                                                            #echo "<li style='list-style:none;'>". $html->link($Trunkname,array('controller'=>'trunks','action' => 'edit/trunk_id:'.$trunk_id));
                                                            echo "<li style='list-style:none;'>" . $Trunkname;
                                                            echo "</li>";
                                                        }
                                                    }
                                                    ?>


                                                </td>
                                                -->
												
												<?php if($cst_type!="Phone"){     ?>  
                                                <td class="withdatatablecss">
	                		 					 <?php 
	                		  
	                		 						 $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);
								
													foreach($AllTrunksForThisDns as $trunk_id){
									
														$Trunkname = $TrunkDataData[$trunk_id];
														echo '<li style="list-style:none;">' . $Trunkname . '</li>'; 
											
														}
														?>
	                							</td>
                                                <?php }    ?>  

                                                <!--<td class="table-right-ohne withdatatablecss">&nbsp;</td>-->
                                                <?php
                                            } else {
                                                echo $dn['Dns']['id'];
                                                ?>
                                                </td>
                                                <td class="table-content column-width-100 withdatatablecss" style="width:125px;">
                                                    <?php echo $dn['Location']['name']; ?>
                                                </td>

                                                <td class="withdatatablecss"><?php echo __($dn['Dns']['function'], true); ?></td>

											<?php 
											   $odsflag=count($scenarioData);											  
											   if($odsflag!=0){     ?> 

												<td height="20px; " class="withdatatablecss">
												
	                		 					 <?php 
	                							  $AllScenariosForThisDns=explode(',',$dn[0]['scenlist']);
	
													?>
																
													<div id="scenario_tip<?php echo $DnsId;?>">
													<?php
													foreach($AllScenariosForThisDns As $scenarioId)
													{				
													
														$linkName = $scenarioData[$scenarioId];														
														
														echo "<li style='list-style:none;'>". $linkName; 
													  		   echo "</li>";
			                                               									  
													}							 									
													?>
													</div>
													
												

	                							</td>
												<?php } ?>
	                							<!-- 
                                                <td height="20px;" class="withdatatablecss">
                                                    <?php
                                                    if (isset($AllScenariosForThisDns) && !empty($AllScenariosForThisDns)) {
                                                        ?>							

                                                        <div id="scenario_tip<?php echo $DnsId; ?>">
                                                            <?php
                                                            foreach ($AllScenariosForThisDns As $key => $scenarioId) {
                                                                echo "<li style='list-style:none;'>" . $html->link($scenarioData[$scenarioId], array('controller' => 'scenarios', 'action' => 'edit/scenario_id:' . $scenarioId));
                                                                echo "</li>";
                                                            }
                                                            #echo $html->link( __('TEST', true),array('controller'=>'scenarios','action' => 'edit/scenario_id:'.$scenarioId));
                                                            ?>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                                -->
												<!-- 
                                                <td class="withdatatablecss">
                                                    <?php
                                                    if (!empty($dn['Trunkentry'])) {
                                                        foreach ($dn['Trunkentry'] as $trunk) {
                                                            $trunk_id = $trunk['trunk_id'];
                                                            $Trunkname = $TrunkDataData[$trunk_id];

                                                            echo $html->link($Trunkname, array('controller' => 'trunks', 'action' => 'edit/trunk_id:' . $trunk_id));
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                -->
												<?php if($cst_type!="Phone"){     ?>
                                                <td class="withdatatablecss">
	                		 					 <?php 
	                		  
	                		 						 $AllTrunksForThisDns=explode(',',$dn[0]['trunklist']);
								
													foreach($AllTrunksForThisDns as $trunk_id){
									
														$Trunkname = $TrunkDataData[$trunk_id];
														echo '<li style="list-style:none;">' . $Trunkname . '</li>'; 
											
														}
														?>
	                							</td>
												<?php } ?>
                                                <!--<td class="table-right-ohne withdatatablecss">&nbsp;</td>-->

                                                <?php
                                            }
                                        } # not already added
                                    endforeach;
                                    ?>
                                </tr>


                            </tbody>

                        </table>
						<div style="margin-left:3px; margin-top:-25px; " class="cntdns">0: records are selected </div>
                    </div>
                   
                        <?php if (isset($location_id)) { ?>
                            <div class="button-right-disabled" id="updatedns" style="margin-right: 15px;">
                                <a id="dnsbutton" href="javascript:void(0);"   onclick="javascript:submit_locationentries('filters');" name="submitForm" value="submitForm" ><?php echo __('dnsSubmit'); ?></a>
                            </div>
							
							
                        <?php } else { ?>
                            <div class="button-right-disabled" id="updatedns">
                                <a id="dnsbutton" href="javascript:void(0);"  onclick="javascript:submit_odsentries('filters');" name="submitForm" value="submitForm" ><?php __("dnsSubmit"); ?></a>
                            </div>
                        <?php } ?>
                  </div>
                    <?php //echo $form->end(); ?>
                    <?php //echo $this->element('pagination/newpaging');   ?>
               
            </div>

            <?php
        else:
            __("No Dns available in DB");
            echo '</div>';
        endif;
        ?>

       
        <!--right hand side starts from here-->
      
</form>

<!--ight hand side  ends here-->
<script type="text/javascript">
    function toggleAdvanceSearchDn() {
        if (document.getElementById('advancesearchdn').style.display == 'none') {
            document.getElementById('advancesearchdn').style.display = 'block';
        } else {
            document.getElementById('advancesearchdn').style.display = 'none';
        }

    }
</script>
