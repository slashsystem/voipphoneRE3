
<style>
.dropped {
	background:#F00 !important;
}
.t_Tooltip{
	display:none !important;
	}
span
{
white-space:nowrap;
}
</style>
<script type="text/javascript">


    $(document).ready(function() { //alert("ret");
		//Set default button display for collapsable
		

    	$('#minus').hide();
     	$('#mbtn').hide();
     	$('#expmbtn').hide();

     	$('#minus').click(function(){
     	$('#pbtn').show();
     	$('#minus').hide();
     	$('#mbtn').hide();
     	$('#plus').show();
        });

        $('#dragdroptbl').tableDnD({
            onDragStart: function(table, row) {
                //$(table).parent().find('.result').text('');
				//$('#dragdroptbl tbody tr').removeAttr("class");
				//$('#dragdroptbl tbody tr').attr("style","background:#000 !important");
            },
            onDrop: function(table, row) {

			var tblstr = decodeURI($.tableDnD.serialize());

			// Code to show dropped row in the list.. It goes hide when it drops
			  var selectedrow = row.id;
			  $('#'+selectedrow).removeAttr( "style" );
			  $('#'+selectedrow).prop( "style","background-color: rgba(0, 0, 0, 0);cursor: move;display: table-row;height: 23px;opacity: 100;");
			//  $('#'+selectedrow).css('background-color','#F00');


			// End of section to show dropped row

                    var tmparray = new Array();
                    var x = 0;
                    tmparray = tblstr.split("&dragdroptbl[]=");

                    while (x < tmparray.length) {
                        if (tmparray[x] != "dragdroptbl[]=") {

						   pos=x+1;
						   pos = (pos.toString().length==1)? '0'+pos : pos;
						   original_position = tmparray[x].replace("dragdroptbl[]=", "");

						var pooo=$("input[name^='featureNewPosition["+original_position+"]']").val();
					  // alert(pooo);
						 $("input[name^='featureNewPosition["+original_position+"]']").val(pos);
					   var pooo=$("input[name^='featureNewPosition["+original_position+"]']").val();
                      // alert(pooo);
					  sts ='<span style="margin-left:150px;"> <img src="<?php echo Configure::read('base_url');?>/images/fancybox_loading.gif"></span>';
		     			   $('.spinresult').html(sts);
						  // $('#'+selectedrow).css('background-color','#F00');
						   $('#'+selectedrow).addClass("dropped");
                        }

                        x++;
                    }

				$('.filtersForm').attr('action',base_url+'stations/major_cfeature_change/<?php
				echo $statId;
				?>');
						$('.filtersForm').attr('method','POST');
						$.ajax({
								type: "POST",
								async : false,
								dataType: 'html',
								url: $('.filtersForm').attr('action'),
								data: $('.filtersForm').serialize(),
								success: function(data){
									//alert("hi");
								}
						});
                /*sts ='';
		        $('.spinresult').html(sts); */
			     window.location.reload();
            }

        });

		$('#13tdlast').removeAttr( "class" );
		$('#13tdlast').removeAttr( "onmouseout" );
		$('#13tdlast').removeAttr( "style" );

		$('#14tdlast').removeAttr( "class" );
		$('#14tdlast').removeAttr( "onmouseout" );
		$('#14tdlast').removeAttr( "style" );
		
		
		$('#33tdlast').removeAttr( "class" );
		$('#33tdlast').removeAttr( "onmouseout" );
		$('#33tdlast').removeAttr( "style" );

		$('#34tdlast').removeAttr( "class" );
		$('#34tdlast').removeAttr( "onmouseout" );
		$('#34tdlast').removeAttr( "style" );
		
		
		$('#35tdlast').removeAttr( "class" );
		$('#35tdlast').removeAttr( "onmouseout" );
		$('#35tdlast').removeAttr( "style" );

		$('#36tdlast').removeAttr( "class" );
		$('#36tdlast').removeAttr( "onmouseout" );
		$('#36tdlast').removeAttr( "style" );
		
		
		
		$('#55tdlast').removeAttr( "class" );
		$('#55tdlast').removeAttr( "onmouseout" );
		$('#55tdlast').removeAttr( "style" );

		$('#56tdlast').removeAttr( "class" );
		$('#56tdlast').removeAttr( "onmouseout" );
		$('#56tdlast').removeAttr( "style" );
		
		
		$('#57tdlast').removeAttr( "class" );
		$('#57tdlast').removeAttr( "onmouseout" );
		$('#57tdlast').removeAttr( "style" );

		$('#58tdlast').removeAttr( "class" );
		$('#58tdlast').removeAttr( "onmouseout" );
		$('#58tdlast').removeAttr( "style" );
		
		

		$('#14').addClass( "graybg" );
		$('#13').addClass( "graybg" );
		
		    $('#33').addClass( "graybg" );
			$('#34').addClass( "graybg" );
			$('#35').addClass( "graybg" );
			$('#36').addClass( "graybg" );
			
			$('#55').addClass( "graybg" );
			$('#56').addClass( "graybg" );
			$('#57').addClass( "graybg" );
			$('#58').addClass( "graybg" );
			
			

       $("#phone_type").change(function(){
		  var t=$("#phone_type").val();
		  if(t=="1140")
		  {
			document.getElementById('1140_image').style.display='block';
			document.getElementById('1120_image').style.display='none';


		    $('#13').removeAttr('class');
			$('#13tdlast').attr( "style","cursor:move;");
		    $('#13tdlast').attr( "class","table-right" );
			$('#13tdlast').attr( "onmouseout", "this.className='table-right';" );
			$('#13tdlast').attr( "style","background: url(/voipphoneRE3.1/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat;");

			$('#14').removeAttr('class');
			$('#14tdlast').attr( "style","cursor:move;");
		    $('#14tdlast').attr( "class","table-right" );
			$('#14tdlast').attr( "onmouseout", "this.className='table-right';" );
			$('#14tdlast').attr( "style","background: url(/voipphoneRE3.1//images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border:none;");
			$('#14').addClass( "graybg" );
			$('#13').addClass( "graybg" );
			$('#09').removeClass( "graybg" );
			$('#10').removeClass( "graybg" );
			$('#11').removeClass( "graybg" );
			$('#12').removeClass( "graybg" );
			
			
			
			
			
		  }
		  else{
			document.getElementById('1120_image').style.display='block';
			document.getElementById('1140_image').style.display='none';
			$('#13tdlast').removeAttr( "class" );
			$('#13tdlast').removeAttr( "onmouseout" );
			$('#13tdlast').removeAttr( "style" );

			$('#14tdlast').removeAttr( "class" );
			$('#14tdlast').removeAttr( "onmouseout" );
			$('#14tdlast').removeAttr( "style" );

			$('#09').addClass( "graybg" );
			$('#10').addClass( "graybg" );
			$('#11').addClass( "graybg" );
			$('#12').addClass( "graybg" );
			$('#13').addClass( "graybg" );
			$('#14').addClass( "graybg" );
	     }

});

	});


        function toggleShowHistory(){
         	//$("#advancesearch").show
         	if(document.getElementById('showhistory').style.display=='none'){
         		document.getElementById('showhistory').style.display='block';
         	}else{
         		document.getElementById('showhistory').style.display='none';
         	}
         }

        function toggleShowExpansion(){
         	//$("#advancesearch").show
         	if(document.getElementById('showexp').style.display=='none'){
         		document.getElementById('showexp').style.display='block';

             	$('#expplus').hide();
             	$('#expminus').show();

         	}else{
         		document.getElementById('showexp').style.display='none';
         	}
         }
        function submitForm(){
		$('.filtersForm').attr('action',base_url+'stations/major_cfeature_change/<?php
echo $statId;
?>');
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
	function del_feature(delFeat){
		$('.filtersForm').attr('action',base_url+'stations/major_cfeature_change/<?php echo $statId;?>&delete_feature='+delFeat);
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

	function del_dn(addabove){
		alert(addabove);
		 var l = addabove.split("@"); var old_DNID = l[0]; var old_trID = l[1]; //alert(old_trID);
		//alert(window.parent.$('#dragdroptbl tr#'+old_trID).find("td:nth-child(2) a").text());
		var newposval = $('#dragdroptbl tr:last').find("td:nth-child(2) input[name^='featureNewPosition']").val();
		//var deletedtr = $('#dragdroptbl tr#'+old_trID);
		var elem = $('#dragdroptbl tr#'+old_trID).nextAll();
		 $(elem).each(function () {
			var new_pos = $(this).find("td:nth-child(2) input[name^='featureNewPosition']").val();
			new_pos = Number(new_pos)-Number(1);
			new_pos = (new_pos.toString().length==1)? '0'+new_pos : new_pos; // check lengh and make it 2 if not e.g. 1 to 01
			 $(this).find("td:nth-child(2) input[name^='featureNewPosition']").val(new_pos);
		  });
		$('#dragdroptbl tr#'+old_trID).remove();
		$('#dragdroptbl tr:last').after('<tr id="'+old_trID+'" onmouseout="hoverRow(this,false); " onmouseover="hoverRow(this,true);" style="cursor: move; height: 23px; background-color: transparent;"><td><input id="StationFeaturename['+old_trID+']" type="hidden" value="" name="featurename['+old_trID+']"></td><td><input id="StationFeaturevalue['+old_trID+']" type="hidden" value="" name="featurevalue['+old_trID+']"><input id="StationFeatureNewPosition['+old_trID+']" type="hidden" value="'+newposval+'" name="featureNewPosition['+old_trID+']"><a class="opencolorbox cboxElement" href="/voipphoneRE3/dns/selectdns/customer_id:" . <?php echo $customer_id ?> . "&type=single&update="></a></td><td class="table-right" onmouseout="this.className=\'table-right\';" style="background:url(/voipphoneRE3/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-style: none;"><div class="table-menu"><div class="table-menu-popup" style="z-index: 1; display: none;"><ul><li class="script"><a class="opencolorbox cboxElement" href="/voipphoneRE3/dns/selectdns/customer_id:" . <?php echo $customer_id ?> . "&type=single&add=\''+old_trID+'\'">Add DN</a></li></ul></div></div></td></tr>');

		        $('#dragdroptbl').tableDnD({
            onDragStart: function(table, row) {
                //$(table).parent().find('.result').text('');
            },
            onDrop: function(table, row) {
			alert("ssd");
                $('#AjaxResult').load(base_url+"stations/editStation?"+$.tableDnD.serialize());
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
						   alert(pos+"=="+original_position);
						  // alert($('#'+original_position).find($("input[name^='featureNewPosition']")).attr('id'));
						 //  alert($('#'+original_position).find($(".opencolorbox")).attr('href'));
						 $('#'+original_position).find("td:nth-child(2) input[name^='featureNewPosition']").val(pos);
						alert( $('#'+original_position).find("td:nth-child(2) input[name^='featureNewPosition']").val());
                          // $(apriority).val(tmparray[x]);
                        }
                        x++;
                    }


            }
        });
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

<?php

//echo $javascript->link('/js/jquery-1.10.1.min');
echo $javascript->link('/js/jquery.fancybox');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});

		function submenuactivity(obj, action) {
        if (action == 1) {
            $('#table-menu-popup').show();
        } else if (action == 0) {
            $('#table-menu-popup').hide();
        }
    }

	function submenuactivity2(obj, action) {
        if (action == 1) {
            $('#table-menu-popup2').show();
        } else if (action == 0) {
            $('#table-menu-popup3').hide();
        }
    }

	function submenuactivity3(obj, action) {
        if (action == 1) {
            $('#table-menu-popup3').show();
        } else if (action == 0) {
            $('#table-menu-popup3').hide();
        }
    }

</script>
<style>
#table-menu-popup {
    margin-left: 130px !important;
    margin-top: -10px;
    padding: 0;
    position: absolute;
}

</style>


<?php
// Set COnstants
 $featureStatus = Configure :: read('featureStatus');
 $stationStatus = Configure :: read('stationStatus');
?>
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
							__($error);
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



<div id="newEdit">
		<div class="form-body">

<?php

#-----------------------------------------------------------------------------#
#                If Base Station only show some dialgoue                      #
#-----------------------------------------------------------------------------#

if($stationDetails[0]['Station']['status'] == 6){


	echo $form->create('Station',array('action'=>'updateBase','id'=>'updateBase','type'=>'POST'));
	echo $form->input('Station.id', array('type'=>'hidden','value'=>$stationDetails[0]['Station'])); ?>


		<!--CBM ADDED BUTTONS TO TOP-->

	<h4><?php echo __('Station Details');?></h4>
			<div class="form-box">
				<div class="form-left">
					<?php #echo $form->input('station_id', array('value'=>$stationDetails[0]['Station']['id'], 'style'=>'width:200px;')); ?>
					<?php
					echo '<div style="width:100px; float: left">' . __('stationId', true). '</div>';
					echo $form->input('station_id', array('type'=>'text','label' => false,'value'=>$stationDetails[0]['Station']['id'],'style'=>'width:100px;','readonly'=>$readonly));
					?>
				</div>
				<div class="form-right">
					<?php #echo $form->input('status', array('value'=>$stationDetails[0]['Station']['status'], 'style'=>'width:200px;')); ?>
					<?php
					echo '<div style="width:100px; float: left">' . __('stationStatus', true). '</div>';
					echo $form->input('stationStatus', array('type'=>'text','label' => false,'value'=>$stationStatus[$stationDetails[0]['Station']['status']],'style'=>'width:100px;','readonly'=>$readonly));
					?>
				</div>
				<div class="form-left">
						<?php
								#$phoneTypesAll = array_merge($phoneTypes['CICM'], $phoneTypes['ANLG']);
								$phoneTypesAll = $phoneTypes['CICM'] + $phoneTypes['ANLG'];
								#echo $form->select('phone_type', $phoneTypesAll,$stationDetails1[0]['Station']['phone_type'],array('style'=>'width:200px;','id'=>'drp','onchange'=>"javascript:submi_form('updateBase');"));
								echo '<div style="width:100px; float: left">' . __('phoneType', true). '</div>';
								echo $form->select('phone_type', $phoneTypesAll,$stationDetails[0]['Station']['phone_type'],array('label'=>false, 'style'=>'width:100px;','id'=>'drp','onchange'=>"javascript:submi_form('updateBase');"));
							?>
				</div>
				<div class="form-right">
					<?php
						# Show the selectableport if the station is ANLG and status -== 6
							if ($stationDetails[0]['Station']['type'] == 'CICM')
							{

								echo '<div style="width:100px; float: left">' . __('PhonePassword', true). '</div>';
								echo $form->input('PhonePassword', array('type'=>'text','label' => false,'value'=>'','style'=>'width:100px;', 'onchange'=>"javascript:submi_form('updateBase')"));
								#echo $form->input('PhonePassword', array('value'=>'', 'style'=>'width:200px;', 'onchange'=>"javascript:submi_form('updateBase')"));
							}
							elseif($stationDetails[0]['Station']['type'] == 'ANLG')
							{
								echo '<div style="width:100px; float: left">' . __('phoneType', true). '</div>';
								echo $form->select('phone_type', $phoneTypes[$stationDetails[0]['Station']['type']],$stationDetails[0]['Station']['phone_type'],array('label'=>false, 'style'=>'width:100px;','onchange'=>"javascript:submi_form('layoutchange');"));

								#echo $form->select('port', $ports,$stationDetails[0]['Station']['port'],array('style'=>'width:200px;','onchange'=>"javascript:submi_form('updateBase');"));
							}


						?>
				</div>
			</div>
			<div class="button-right">
					<a href="javascript:submi_form('updateBase')"  onclick="" name="submitForm" value="submitForm" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php
__("add");
					?></a>

		</div>


	<?php

}
else { # Else The station is not status 6
	 ?>

	 <h4><?php echo __('Station Details') . $stationDetails[0]['Station']['id'] ; ?>
       	 	<span style="display: inline; float:right;" id="sts"><?php echo __('stationStatus') . $stationStatus[$stationDetails[0]['Station']['status']]; ?></span>
			 	<div style="padding-left: 5px; display: inline">
                   <!-- <a href="javascript:void(null)" id="edit_stat"  onmouseover="submenuactivity(this, 1)" onmouseout="submenuactivity(this, 0)" <?php echo $readonly; ?>><?php __("Options"); ?> </a>-->
					 <a href="javascript:void(null)" id="edit_stat" onclick="set_visimenu('dispmenu')"  <?php echo $readonly; ?>><?php __("Options"); ?> </a>
                   <!-- <div class="table-menu" id="edit_stat_popupmenu">
                        <div class="table-menu-popup" id="table-menu-popup" style="z-index: 1">-->
					 <div id="edit_stat_popupmenu" style="display: none">
                        <div  style="z-index: 1">
                           <ul>
                                <li class="inactive">
   								 <?php
   								 #WORKING echo $html->link(__("resetFeatures", true), array('controller'=> 'stations', 'action'=>'resetFeature',$statId));
   								 #echo $html->link(__("resetFeatures", true), '');
   								 ?>
                                </li>
								<?php if($stationDetails[0]['Station']['id'] != 'ANLG'){?>
                                <li class="schedule">
   								 <?php #echo $html->link(__("changePassword", true), array('controller'=> 'stations', 'action'=>'change_password',$statId), array('class' => "fancybox fancybox.ajax")); ?>
								 <a href="<?php echo Configure::read('base_url');?>stations/change_password/<?php echo $statId ?>" class="fancybox fancybox.ajax"><?php echo __("changePassword", true); ?></a>
                                 </li>
                                 <?php }?>
								  <li class="schedule">
                                <?php /*echo $html->link(__('stationFeatures', true), array(
    							'controller' => 'stations',
    							'action' => 'station_features',
    							$statId
								), array(
								'class' => 'fancybox fancybox.ajax'
								));*/
								?>
								 <a href="<?php echo Configure::read('base_url');?>stations/station_features/<?php echo $statId ?>"  class="fancybox fancybox.ajax"><?php echo __("stationFeatures", true); ?></a>
                                </li>
								<li class="schedule" style="background-color:lightyellow">
                                <?php #echo $html->link(__('addCombox', true),'');?>
								 <a href="" onclick="return false" onMouseOver="Tip('<?php echo __('add Combox in Work') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); " ><?php echo __("addCombox", true); ?></a>
                                </li>
								<li class="schedule">
   								 <?php
   								 #echo $html->link(__("Add DN", true), array('controller'=>'dns','action'=>'selectdns','station_id:'.$statId . '&type=singleLogic'), array('class' => "fancybox fancybox.ajax"));
   								 #echo $html->link(__("resetFeatures", true), '');
   								 ?>
								 
								  <a href="<?php echo Configure::read('base_url');?>dns/selectdns/station_id:<?php echo $statId ?>&type=singleLogic" class="fancybox fancybox.ajax"><?php echo __("Add DN", true); ?></a>
								 
                                </li>
                                <li class="inactive" style="background-color:lightyellow">
   								 <?php
   								 # WORKING echo $html->link(__("deleteStation", true), array('controller'=> 'stations', 'action'=>'deleteStation',$statId));
   								# echo $html->link(__("deleteStation", true), '');
   								 ?>
								 
								 <a href="" onclick="return false" onMouseOver="Tip('<?php echo __('delete Station in Work') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); " ><?php echo __("deleteStation", true); ?></a>

                                </li>
                                <?php 
                                if($stationDetails[0]['Station']['status'] == 7){?>
                                <li class="schedule">
                                <?php #echo $html->link(__('addCombox', true),'');?>
								 <a href="<?php echo Configure::read('base_url');?>stations/overrideException/station_id:<?php echo $statId?>" onMouseOver="Tip('<?php echo __('overrideException') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); " ><?php echo __("overrideException", true); ?></a>
                                
                                </li>
                               <?php } ?>
                            </ul>
                        </div>
                    </div>
			</div>


    </h4>

	 <!--
	 <h4><span style="float:left;><?php echo __('Station Details') . $stationDetails[0]['Station']['id'] ?>
	 			<div style="padding-left: 5px; display: inline">
                    <a href="javascript:void(null)" id="edit_stat"  onmouseover="submenuactivity(this, 1)" onmouseout="submenuactivity(this, 0)" <?php echo $readonly; ?>><?php __("Options"); ?> </a>
                    <div class="table-menu" id="edit_stat_popupmenu">
                        <div class="table-menu-popup" id="table-menu-popup" style="z-index: 1">
                            <ul>
                                <li class="schedule">
   								 <?php echo $html->link(__("resetFeatures", true), array('controller'=> 'stations', 'action'=>'resetFeature',$statId), array('class' => "fancybox fancybox.ajax")); ?>
                                </li>
                                <li class="schedule">
   								 <?php echo $html->link(__("deleteStation", true), array('controller'=> 'stations', 'action'=>'deleteStation',$statId)); ?>
                                </li>
                                <li class="schedule">
   								 <?php echo $html->link(__("changePassword", true), array('controller'=> 'stations', 'action'=>'change_password',$statId), array('class' => "fancybox fancybox.ajax")); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
			</div>
			</span>
			<span style="float:right;" id="sts"><?php echo __('stationStatus') . $stationStatus[$stationDetails[0]['Station']['status']]; ?> </span>
     </h4>
	-->

	<!--CBM ADDED BUTTONS TO TOP-->


			<div class="form-box">
				<div class="form-left">
					<?php
						#echo $form->select('phone_type', $phoneTypes[$stationDetails[0]['Station']['type']],$stationDetails[0]['Station']['phone_type'],array('style'=>'width:200px;','onchange'=>"javascript:submi_form('filters');"));
						#echo $form->input('phone_type', array('type'=>'select', 'options'=>$phoneTypes[$stationDetails[0]['Station']['type']], 'default'=>$stationDetails[0]['Station']['phone_type'],array('style'=>'width:200px;','onchange'=>"javascript:submi_form('layoutchange');")));
						#echo $form->input('phone_type', array('value'=>$stationDetails[0]['Station']['phone_type'], 'style'=>'width:200px;'));
					?>
					<?php
						echo '<div style="width:100px; float: left">' . __('phoneType', true). '</div>';
						echo $form->select('phone_type', $phoneTypes[$stationDetails[0]['Station']['type']],$stationDetails[0]['Station']['phone_type'],array('label'=>false, 'style'=>'width:100px;','onchange'=>"javascript:submi_form('layoutchange');"));
					?>
				</div>
				<div class="form-right">
					<?php
					# Show the selectableport if the station is ANLG and status -== 6

								#echo $form->input('port', array('value'=>$stationDetails[0]['Station']['port'], 'style'=>'width:200px;'));

						?>
						<?php
					echo '<div style="width:100px; float: left">' . __('Port', true). '</div>';
					echo $form->input('port', array('type'=>'text','label' => false,'value'=>$stationDetails[0]['Station']['port'],'style'=>'width:100px;','readonly'=>'true'));
					?>
				</div>
			</div>

<?php
} #end of status != 6

echo $form->end();

if($stationDetails[0]['Station']['status'] != 6){


echo $form->create('Station', array(
				'action' => 'editStation',
				'id' => 'filters',
				'class' => 'filtersForm',
				'type' => 'GET'
));
?>
<div class="cb">



        <div class="form-box">

					<?php
					foreach ($stationDisplayFeature as $stationDFeature)
					{
						if($stationFeatures[$stationDFeature] == '1')
						{
							echo $stationDFeature . ' ';
						}
					}

					?>

			</div>
<!--
<div class="block" style="margin: 0px;">
			<div class="button-right">
					<a href="javascript:submitForm()"  onclick="" name="submitForm" value="submitForm" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php
__("Submit");
					?></a>
			</div>

			<div class="button-right">
				<?php echo $html->link( __('deleteStation', true),  array('controller'=> 'stations', 'action'=>'deleteStation',$statId),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
			</div>
			<div class="button-right">
						<?php echo $html->link( __('resetFeatures', true),  array('controller'=> 'stations', 'action'=>'resetFeature',$statId),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
            </div>

        	<div class="button-right">
						<?php
				echo $html->link(__('station features', true), array(
    			'controller' => 'stations',
    			'action' => 'station_features',
    			$statId
				), array(
  		 	 	'onmouseover' => 'javascript:hoverButtonRight(this);',
    			'onmouseout' => 'javascript:outButtonRight(this);',
				'class' => 'fancybox fancybox.ajax'
				));
				?>
        	</div>

        	<div class="button-right">
				 <?php echo $html->link( __("Add DN", true),array('controller'=>'dns','action'=>'selectdns','station_id:'.$statId . '&type=singleLogic'),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);','class'=>'fancybox fancybox.ajax')); ?>
			</div>

      </div>
      -->
      <?php 
      /*
      if($stationDetails[0]['Station']['status'] == 5){
    	?>
    <div class="button-right">
    		<?php echo $html->link( __('apply', true),  array('controller'=> 'stations', 'action'=>'apply',$statId),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
    </div>
    <?php } 
    
    	*/?>
       <h4><?php echo __('Key Features')?>
	   
	 <!--  <div style="padding-left: 5px; display: inline">
                    <a href="javascript:void(null)" id="edit_keyfeatures"  onmouseover="submenuactivity3(this, 1)" onmouseout="submenuactivity3(this, 0)" <?php echo $readonly; ?>><?php __("Options"); ?> </a>
                    <div class="table-menu" id="edit_keyfeatures_popupmenu">
                        <div class="table-menu-popup" id="table-menu-popup3" style="z-index: 1">
                            <ul>
                                <li class="schedule">
   								 <?php
   								 echo $html->link(__("Add DN", true), array('controller'=>'dns','action'=>'selectdns','station_id:'.$statId . '&type=singleLogic'), array('class' => "fancybox fancybox.ajax"));
   								 #echo $html->link(__("resetFeatures", true), '');
   								 ?>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>-->

     </h4>


      <?php




	// check $stationFeatures variable exists and is not empty
	if (isset($keyFeatures) && !empty($keyFeatures)):

	#echo "<pre>";print_r($keyFeatures);
	?>


	    <div id="" class="table-content main_table_content" style="height: auto!important">
		<div id="AjaxResult" style="display:none; float: right; width: 250px; border: 1px solid silver; padding: 4px; font-size: 90%">
		</div>


		<!--  BASE STATION -->
		<h5><?php echo __('BaseKeys', true)?></h5>
		<table class="phonekey stationtbl">
		<thead>
			<tr class="table-top">
				 <th class="table-column">&nbsp;<?php echo __('Key'); ?>&nbsp;&nbsp;</th>
			 </tr>
		</thead>
        <div class="spinresult"></div>
			  <?php
   		 // initialise a counter for striping the table
   		 // This is the keys of the table.
    	$stationAry = array(); //echo "<pre/>"; print_r($stationFeatures); die;
    	for ($i = 0; $i < 14; $i++) { //echo "<pre/>"; print_r($stationFeatures[$i]);
        	$stationAry = $keyFeatures[$i];
        	$class      = (($i % 2) ? " class='altrow'" : '');

			?>
			<tr style="height:23px;">
				<td  style="width: 20px;"> <?php
				$sta_id = str_pad($i+1, 2, '0', STR_PAD_LEFT);
        		echo $form->input("key['$sta_id']", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        		));
        		echo $sta_id;

        		if ($stationkeystate[$i+1] == 5){ echo 'R';}
        		elseif ($stationkeystate[$i+1] == 6){ echo '+';}
        		elseif ($stationkeystate[$i+1] == 7){ echo '-';}
        		else{echo ' ';}
				?></td>
			</tr>
		<?php
    	} //endforeach;
		?>
		</table>



		<!--  This is the actual data in the table -->
		<table class="phonekey stationtb2" id="dragdroptbl">

		<thead>
			<tr class="table-top">

				 <th class="table-column" style='width:90px' align="left" >&nbsp;<?php echo __('Label'); ?>&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:150px' align="left">&nbsp;<?php echo __('Feature'); ?>&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:80px' align="left">&nbsp;<?php echo __('Value'); ?>&nbsp;&nbsp;</th>
				   <!--<th class="table-column" style='width:50px'>&nbsp;&nbsp;<?php echo __('Status'); ?> &nbsp;&nbsp;</th>-->
				   <!-- <th class="table-column" style='width:20px'>&nbsp;&nbsp;<?php echo __('info'); ?>&nbsp;&nbsp;</th>-->
				 <th class="table-columnt"  align="left" style="border-right: 1px solid #D1D1D1!important;">&nbsp;&nbsp;<?php echo (''); ?>&nbsp;&nbsp;</th>
 			 </tr>
		</thead>
 		 <tbody>
		 <?php
    	// initialise a counter for striping the table
    	$stationArray = array();
    	echo $form->input("newaddedFeatues", array(
        	'type' => 'hidden',
        	'value' => '',
        	'id' => "newaddedFeatues"
    	));
		$finalAry = array();
		#echo "<pre>";print_r($keyFeatures);
		foreach($keyFeatures as $k=>$v){
			$station_id = explode('@', $v['Feature']['id']);
			$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
			$finalAry[$sta_id_key] = $v;

		}

		// Loop through the 14 keys of the station
    	for ($j = 0; $j < 14; $j++)
		{
        	$stationArray = $keyFeatures[$j]; //$setHeight = "";
			$sta_id = str_pad($j+1, 2, '0', STR_PAD_LEFT);
        	$class        = (($j % 2) ? " class='altrow'" : '');
      		if (isset($finalAry) && !empty($finalAry[$sta_id]['Feature']['id'])) {
            	$station_id = explode('@', $finalAry[$sta_id]['Feature']['id']);
            	$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
        	}
        	$fullKey = $sta_id  . '@' . $statId ;
            // $setHeight  = 'height:21px';
 			?>
 			<!-- <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">-->
			<tr style="cursor:move;height:23px;" onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false); " id="<?php
        	echo $sta_id;
			?>" >
 			<td class="tooltip">
			<div>
				<div class="fl"><span style="cursor:default" >
	        <?php
				if($sta_id_key==$sta_id)
				 {
					$statKey = $sta_id  . '@' . $statId;
					if($sta_id_key==$sta_id){ $shortName = $finalAry[$sta_id]['Feature']['short_name'];}
 				 		$label = $finalAry[$sta_id]['Feature']['label'];
						$link = $finalAry[$sta_id]['Feature']['link'];
					if(strlen($label)> 15) {
						#echo substr($label, 0, 15) . '..';
					}
					else{
						if($shortName!='CPU'){
							 echo $html->link($label, array('controller' => 'features','action' => 'edit',	"stationkey_id:$statKey&featureType=$shortName"), array('class' => $selected['DN List'] . " fancybox fancybox.ajax"));
						}
						else {
							echo $html->link($label, array('controller' => 'groups','action' => 'edit/group_id:' .$link));
						}
 					}
 				}
			?>
			</div>
				</div>
			</td>

			<td  class="table-menu" >
	        <?php

			$shortName = "";
			$tool_tipname	=__($shortName.'_desc',true);

			if($sta_id_key==$sta_id){
				$shortName = $finalAry[$sta_id]['Feature']['short_name'];
			}
        	echo $form->input("featurename[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $shortName
        	));
			//echo $sta_id."$$".$sta_id_key;

			if($sta_id_key==$sta_id){ //echo "<pre>"; print_r($stationArray['Feature']['id']);
				#echo __($shortName, true);
				$statKey = $sta_id  . '@' . $statId;
				//echo $html->link($shortName,'');

				/*if($shortName=='AUD'){$locshortName =  $audlang[0]['Transentry']['translation'];}
				if($shortName=='BLF'){$locshortName =  $blflang[0]['Transentry']['translation'];}
				if($shortName=='CNF'){$locshortName =  $cnflang[0]['Transentry']['translation'];}
				if($shortName=='PRK'){$locshortName =  $prklang[0]['Transentry']['translation'];}
				if($shortName=='RAG'){$locshortName =  $raglang[0]['Transentry']['translation'];}
				if($shortName=='CPU'){$locshortName =  $cpulang[0]['Transentry']['translation'];}
				if($shortName=='CXR'){locshortName =  $cxrlang[0]['Transentry']['translation'];}
				if($shortName=='CFUIF'){$locshortName =  $cfuiflang[0]['Transentry']['translation'];}
				if($shortName=='DN_INDIVIDUAL'){$locshortName =  $dnlang[0]['Transentry']['translation'];}
				if($locshortName=="") {$locshortName = $shortName;}*/

				$tooltipname = $shortName . '_desc';
				$locshortName = __($shortName,true);

				?>

				<span>
					<span style="margin-left: 10px;"><?php echo substr($locshortName, 0, 35);?> </span><?php //if(strlen($locshortName)>20) { ?>
					<div class="table-popup"  style="z-index: 1;display:none;position: absolute;margin-top:-10px;">
					 <ul style="margin-top:-10px;margin-left:-4px;" >
						<li >
							 <a href="javascript:;" onclick="Tip('<?php echo __($tooltipname) ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a>
					 	</li>
					 </ul>
					</div>
					 <?php //} ?>
				</span>
				<?php
				}
				?>
			</td>

	        <td>
	        <?php
			$DNID = "";
			if($sta_id_key==$sta_id){$DNID = $finalAry[$sta_id]['Feature']['primary_value'];}
       		  // $DNID = $stationArray['Feature']['primary_value'];
        	echo $form->input("featurevalue[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $DNID
        	    ));
        	echo $form->input("featureNewPosition[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        	    ));
			if($sta_id_key==$sta_id){
        		/* echo $html->link($finalAry[$sta_id]['Feature']['primary_value'], array(
            	'controller' => 'dns',
            	'action' => 'selectdns',
            	"customer_id:$customer_id&type=single&update=$DNID"
        		), array(
            	'class' => $selected['DN List'] . " opencolorbox"
        		)); */
			  echo trim($finalAry[$sta_id]['Feature']['primary_value'],",");
			  }
			?>
	        </td>
	        <!-- <td> <?php #echo  $featureStatus[$finalAry[$sta_id]['Feature']['status']];?></td>-->
			<?php #if(!empty($shortName)){ ?>
			<!--<td class="table-right	 tooltip" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/16px/045_information_02_cmyk.gif) no-repeat 2px 2px;">
						<div>
							<div class="fl"><span><?php echo $html->link('', '',array('onclick'=>'')) ?></span>
								<p><?php
								$tooltipname = $shortName . '_desc';
								echo __($tooltipname);?></p>
							</div>
						</div>
	          </td>-->
					 <?php #} else { ?>
					 <!--<td class="table-right-ohne" >&nbsp;</td>-->
					 <?php #} ?>

<?php
//echo $sta_id;

 if(($sta_id=='13' || $sta_id=='14')){ ?>
			<td class="table-right-ohne" style="background-color: #ffffff !important; border: none !important;"  id="<?php
        	echo $sta_id;
			?>">
			<?php }else { ?>
			<td class="table-right-ohne" style="background: url(<?php
        	echo $this->webroot;
			?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-right: 1px solid #D1D1D1!important; background-color: #ffffff;" onmouseout="this.className='table-right-ohne';" id="<?php
        	echo $sta_id;
			?>tdlast">
			<?php } ?>
			
			<?php if(($sta_id=='13' || $sta_id=='14')){ ?>
<?php } else { ?>
<div class="table-menu">
            <div class="table-menu-popup" style="z-index: 1">
            <ul>

			<?php if(($shortName == 'KEY1_DN') || ($shortName == 'DN_INDIVIDUAL') || ($shortName == 'DN_MADN') || ($shortName == 'DN_MADN_PILOT'))
				{  ?>
					<li class="script">
					<?php
					echo $html->link(__('dnEdit', true), array(
					'controller' => 'features',
					'action' => 'edit',
					"stationkey_id:$statKey&featureType=$shortName"
					), array(
					'class' => $selected['DN List'] . " fancybox fancybox.ajax"
					))
					?>
					</li>

					<li class="script">
						<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $customer_id . '/dns_id:' . $finalAry[$sta_id]['Feature']['primary_value'] . '/location_id:' . $stationkeylocation . '/loc_id:' . $stationkeylocation), array('class' => "fancybox fancybox.ajax")); ?>

					</li>
					<?php if(($shortName == 'MLH') || ($shortName == 'DLH')){ ?>
						<li class="script">
						<?php	echo $html->link(__('Change Location', true), array('controller' => 'locations', 'action' => 'create_location/customer_id:' . $customer_id . '/dns_id:' . $finalAry[$sta_id]['Feature']['primary_value'] . '/location_id:' . $stationkeylocation . '/loc_id:' . $stationkeylocation), array('class' => "fancybox fancybox.ajax")); ?>

					</li>
					<?php } ?>
					<?php

					if (($sta_id_key != 1) && ($shortName == 'DN_INDIVIDUAL'))
					{
						?>
						<li class="last log">
						<?php
						$featureId = $statKey . '-' . $shortName;
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_dn("' . $DNID . '@' . $sta_id . '")');
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_feature("' . $featureId . '	")');
						echo $html->link(__('Delete', true), array(
						'controller' => 'stations',
						'action' => 'major_cfeature_change',
						"$statId&delete_feature=$featureId"
						),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))?>
						
						
						
						
						</li>


					<?php
					}
					if(($shortName == 'DN_MADN') || ($shortName == 'DN_MADN_PILOT'))
					{
						?>
								<li class="last log">
								<?php
								$featureId = $statKey . '-' . $shortName;

								echo $html->link(__('editGroup', true), array(
								'controller' => 'groups',
								'action' => 'edit/group_id:' .
								$link
								))?>
								</li>
								
								<li class="last log">
								<?php
								$featureId = $statKey . '-' . $shortName;

								echo $html->link(__('MajorDelete', true), array(
								'controller' => 'stations',
								'action' => 'major_cfeature_change',
								"$statId&delete_feature=$featureId"
								),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))
								
								?>
								</li>
								
								<li class="last log">
								<?php
								$featureId = $statKey . '-' . $shortName;

								echo $html->link(__('MinorDelete', true), array(
										'controller' => 'stations',
										'action' => 'minor_delete?feature_id=' . $featureId.'&customer_id='.$SELECTED_CNN
								),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('re you sure want to delete this ?');"));
								
								
								?>
								</li>
								
								<?php
					}
			}
			elseif(($shortName == 'AUD') || ($shortName == 'BLF'))
			{  ?>
						
						<?php if($shortName == 'BLF'){
							#$finalAry[$sta_id]['Feature']['primary_value'];
							 ?>
						<li class="script">
						<?php
						echo $html->link(__('ufForm', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$statKey&featureType=$shortName"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>	
						<?php } ?>
						
						
						<li class="script">
						<?php
						echo $html->link(__('ufEdit', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$statKey&featureType=$shortName"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						<li class="last log">
						<?php
						$featureId = $statKey . '-' . $shortName;
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_dn("' . $DNID . '@' . $sta_id . '")');
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_feature("' . $featureId . '	")');
						echo $html->link(__('Delete', true), array(
						'controller' => 'stations',
						'action' => 'minor_delete/feature_id:'.
						"$featureId"
						),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))?>
						</li>
				<?php
				}				
				elseif(($shortName == 'CPU'))
				{  ?>
							<li class="last log">
							<?php
							$featureId = $statKey . '-' . $shortName;

							/*echo $html->link(__('Delete', true), array(
							'controller' => 'stations',
							'action' => 'major_cfeature_change',
							"$statId&delete_feature=$featureId"
							),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))
							*/
							echo $html->link(__('Delete', true), array(
							'controller' => 'stations',
							'action' => 'minor_delete/feature_id:'.
							"$featureId"
							),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))?>
							
							
						    </li>
						    <li class="last log">
							<?php
							$featureId = $statKey . '-' . $shortName;

							echo $html->link(__('groupEdit', true), array(
							'controller' => 'groups',
							'action' => 'edit/group_id:'.$link
							))?>
						    </li>

							<?php

			}
			elseif(($shortName == 'MSB'))
									{  ?>
										<li class="last log">
										<?php
										$featureId = $statKey . '-' . $shortName;
			

										echo $html->link(__('Delete', true), array(
										'controller' => 'stations',
										'action' => 'minor_delete/feature_id:'.
										"$featureId"
										),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))?>
										
										
									    </li>
									 
										<?php
			
			
			}
			elseif(empty($shortName))
			{
					if($shortName == '')
					{?>
						<li class="script">
						<?php
						echo $html->link(__('Add UF', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$fullKey&featureType=AUD"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						<?php
					}
					else
					{
						?>
						<li class="script">
						<?php
	        			echo $html->link(__('No Options', true), ''
	        			);
						?>
						</li>
						<?php
					}
			}
			else
			{
			?>
				<li class="script">
				<?php	echo $html->link(__('No Options', true), ''	);	?>
				</li>
				<?php
			}
			?>
            </ul>
            </div>
			</div>
<?php } ?>

		</td>
	    <?php
    } //endfor 1- 14;

	?>
	            	</tr>
				 </tbody>
		</table>
		<!--  END BASE STATION -->
		<!--  Extension 1  -->
		<br>

		<?php if ($stationDetails[0]['Station']['extensions'] > 0)
		{?>
		
		
		<h4 style="display:block;float:left;width: 100%;"><?php echo __('expansions')?>
			<a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleShowExpansion();" href="javascript:void(0)" style="float:right;">
					<div style="width:20px;background:#eee; height:20px;" id="exppbtn">
					<div id="plus"></div>
					</div>
					<div style="width:20px;background:#eee; height:20px;" id="expmbtn">
					<div id="minus"></div>
					</div>
			</a>
		</h4>


			    	<?php
			    	if (((isset($success)) && $success))
			    	{
			    		?>
			    		<div id="showexp" class="table-content" style="display:block">
			    		<?php

			    	}
			    	else
			    	{
			    		?>
			    		<div id="showexp" class="table-content" style="display:none">
			    		<?php
			    	}?>


		<h5><?php echo __('Expansion1', true)?></h5>
		<table class="phonekey stationtbl">
		<thead>
			<tr class="table-top">
				 <th class="table-column">&nbsp;&nbsp;Key&nbsp;&nbsp;</th>
			 </tr>
		</thead>
			  <?php
   		 // initialise a counter for striping the table
   		 // This is the keys of the table.
    	$stationAry = array(); //echo "<pre/>"; print_r($stationFeatures); die;
    	for ($i = 14; $i < 36; $i++) { //echo "<pre/>"; print_r($stationFeatures[$i]);
        	$stationAry = $keyFeatures[$i];
        	$class      = (($i % 2) ? " class='altrow'" : '');

			?>
			<tr style="height:23px;">
				<td  style="width: 20px;"> <?php
				$sta_id = str_pad($i+1, 2, '0', STR_PAD_LEFT);
        		echo $form->input("key['$sta_id']", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        		));
        		echo $sta_id;
				?></td>
			</tr>
		<?php
    	} //endforeach;
		?>
		</table>



		<!--  This is the actual data in the table -->
		<table class="phonekey stationtb2" id="dragdroptbl">

		<thead>
			<tr class="table-top">
				<th class="table-column" style='width:90px' align="left" >&nbsp;&nbsp;Label&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:150px' align="left">&nbsp;&nbsp;Feature&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:80px' align="left">&nbsp;&nbsp;Value&nbsp;&nbsp;</th>
				 <!--<th class="table-column" style='width:50px' align="left">&nbsp;&nbsp;Status&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:20px' align="left">&nbsp;&nbsp;info&nbsp;&nbsp;</th>-->

				 <th class="table-column" align="left" style="border-right: 1px solid #D1D1D1!important;"><!--&nbsp;&nbsp;Options&nbsp;&nbsp;--></th>


			 </tr>
		</thead>


		 <tbody>
		 <?php
    	// initialise a counter for striping the table
    	$stationArray = array();
    	echo $form->input("newaddedFeatues", array(
        	'type' => 'hidden',
        	'value' => '',
        	'id' => "newaddedFeatues"
    	));
		$finalAry = array();
		foreach($keyFeatures as $k=>$v){
			$station_id = explode('@', $v['Feature']['id']);
			$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
			$finalAry[$sta_id_key] = $v;

		}

		// Loop through the 14 keys of the station
    	for ($j = 14; $j < 36; $j++)
		{
        	$stationArray = $keyFeatures[$j]; //$setHeight = "";
			$sta_id = str_pad($j+1, 2, '0', STR_PAD_LEFT);
        	$class        = (($j % 2) ? " class='altrow'" : '');
      		if (isset($finalAry) && !empty($finalAry[$sta_id]['Feature']['id'])) {
            	$station_id = explode('@', $finalAry[$sta_id]['Feature']['id']);
            	$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
        	}
        	$fullKey = $sta_id  . '@' . $statId ;
            // $setHeight  = 'height:21px';


			?>

			<!-- <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">-->
			<tr style="cursor:move;height:23px;" onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false); " id="<?php
        	echo $sta_id;
			?>" >

			<td>
	        <?php

				if($sta_id_key==$sta_id)
				{
					$label = $finalAry[$sta_id]['Feature']['label'];
					$shortName = $finalAry[$sta_id]['Feature']['short_name'];
					$statKey = $sta_id  . '@' . $statId;
					
						echo $html->link(__($label, true), array('controller' => 'features','action' => 'edit',"stationkey_id:$statKey&featureType=$shortName"), array('class' => $selected['DN List'] . " fancybox fancybox.ajax"));
						
				}
			?>
			</td>

			<td nowrap >
	        <?php
			$shortName = "";
			if($sta_id_key==$sta_id){
				$shortName = $finalAry[$sta_id]['Feature']['short_name'];
			}
        	echo $form->input("featurename[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $shortName
        	));
			//echo $sta_id."$$".$sta_id_key;

			if($sta_id_key==$sta_id){ //echo "<pre>"; print_r($stationArray['Feature']['id']);
				#echo __($shortName, true);
				$statKey = $sta_id  . '@' . $statId;
				//echo $html->link($shortName,'');
				echo __($shortName);
			}
			?>
			</td>

	        <td>
	        <?php
			$DNID = "";
			if($sta_id_key==$sta_id){
				$DNID = $finalAry[$sta_id]['Feature']['primary_value'];
			}
       		// $DNID = $stationArray['Feature']['primary_value'];
        	echo $form->input("featurevalue[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $DNID
        	));


        	echo $form->input("featureNewPosition[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        	));



			if($sta_id_key==$sta_id){
        		/* echo $html->link($finalAry[$sta_id]['Feature']['primary_value'], array(
            	'controller' => 'dns',
            	'action' => 'selectdns',
            	"customer_id:$customer_id&type=single&update=$DNID"
        		), array(
            	'class' => $selected['DN List'] . " opencolorbox"
        		)); */

				echo $finalAry[$sta_id]['Feature']['primary_value'];
			}
			?>
	        </td>
	        <!-- <td>
	        <?php
			#echo  $featureStatus[$finalAry[$sta_id]['Feature']['status']];
			?>
	        </td>-->
	      <!--  <td class="table-right	 tooltip" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/16px/045_information_02_cmyk.gif) no-repeat 2px 2px;">
	          		 	<div>
							<div class="fl"><span><?php echo $html->link('', '',array('onclick'=>'')) ?></span>
								<p><?php
								$tooltipname = $shortName . '_desc';
								echo __($tooltipname);?></p>
							</div>
						</div>
	          		 </td>-->

<?php if(($sta_id=='33' || $sta_id=='34' || $sta_id=='35' || $sta_id=='36')){ ?>
			<td class="table-right-ohne" style="background-color: #ffffff;border: none;" id="<?php
        	echo $sta_id;
			?>">
		<?php }else { ?>	
			<td class="table-right-ohne" style="background: url(<?php
        	echo $this->webroot;
			?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-right: 1px solid #D1D1D1!important; background-color: #ffffff;" onmouseout="this.className='table-right-ohne';" id="<?php
        	echo $sta_id;
			?>tdlast">
		<?php } ?>	
		
		<?php if(($sta_id=='33' || $sta_id=='34' || $sta_id=='35' || $sta_id=='36')){ ?>
		
		<?php } else { ?>	
			<div class="table-menu">
            <div class="table-menu-popup" style="z-index: 1">
            <ul>

			<?php if(($shortName == 'KEY1_DN') || ($shortName == 'DN_INDIVIDUAL') || ($shortName == 'DN_MADN') || ($shortName == 'DN_MADN_PILOT'))
				{  ?>
					<li class="script">
					<?php
					echo $html->link(__('Edit', true), array(
					'controller' => 'features',
					'action' => 'edit',
					"stationkey_id:$statKey&featureType=$shortName"
					), array(
					'class' => $selected['DN List'] . " fancybox fancybox.ajax"
					))
					?>
					</li>
					<?php


			}
			elseif(($shortName == 'AUD') || ($shortName == 'BLF'))
			{  ?>
						<li class="script">
						<?php
						echo $html->link(__('Edit', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$statKey&featureType=$shortName"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						<li class="last log">
						<?php
						$featureId = $statKey . '-' . $shortName;
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_dn("' . $DNID . '@' . $sta_id . '")');
        				#echo $html->link(__('Delete - not working', true), 'javascript:del_feature("' . $featureId . '	")');
						echo $html->link(__('Delete', true), array(
						'controller' => 'stations',
						'action' => 'minor_delete/feature_id:'.
						"$featureId"
						),array('escape'=>false,'title'=>'Delete','onclick'=>"return confirm('Are you sure want to delete this ?');"))?>
						</li>
						<?php


			}
			elseif(($shortName == 'UCDLG')){ ?>
				<li class="script">
						<?php
	        			echo $html->link(__('No Options', true), ''
	        			);
						?>
						</li>
			<?php }
			elseif(empty($DNID))
						{ ?>
						<li class="script">
						<?php
						echo $html->link(__('Add UF', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$fullKey&featureType=AUD"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						
						<?php
			}
			?>
            </ul>
            </div>
			</div>
			<?php } ?>
		</td>
	    <?php
    } //endfor 1- 14;

	?>
	            	</tr>
				 </tbody>
		</table>
		<!--  END BASE STATION -->
		
		<!--  End extension 1 -->

		<!--  Extension 2  -->

		<?php if ($stationDetails[0]['Station']['extensions'] > 1)
		{?>

		
		
		<h5><?php echo __('Expansion2', true)?></h5>
		<table class="phonekey stationtbl">
		<thead>
			<tr class="table-top">
				 <th class="table-column">&nbsp;&nbsp;Key&nbsp;&nbsp;</th>
			 </tr>
		</thead>
			  <?php
   		 // initialise a counter for striping the table
   		 // This is the keys of the table.
    	$stationAry = array(); //echo "<pre/>"; print_r($stationFeatures); die;
    	for ($i = 36; $i < 58; $i++) { //echo "<pre/>"; print_r($stationFeatures[$i]);
        	$stationAry = $keyFeatures[$i];
        	$class      = (($i % 2) ? " class='altrow'" : '');

			?>
			<tr style="height:23px;">
				<td  style="width: 20px;"> <?php
				$sta_id = str_pad($i+1, 2, '0', STR_PAD_LEFT);
        		echo $form->input("key['$sta_id']", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        		));
        		echo $sta_id;
				?></td>
			</tr>
		<?php
    	} //endforeach;
		?>
		</table>



		<!--  This is the actual data in the table -->
		<table class="phonekey stationtb2" id="dragdroptbl">

		<thead>
			<tr class="table-top">
				<th class="table-column" style='width:90px' >&nbsp;&nbsp;Label&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:150px'>&nbsp;&nbsp;Feature&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:80px'>&nbsp;&nbsp;Value&nbsp;&nbsp;</th>
				 <!--<th class="table-column" style='width:50px'>&nbsp;&nbsp;Status&nbsp;&nbsp;</th>
				 <th class="table-column" style='width:20px'>&nbsp;&nbsp;info&nbsp;&nbsp;</th>-->

				 <th class="table-column" align="left" style="border-right: 1px solid #D1D1D1!important;" ><!--&nbsp;&nbsp;Options&nbsp;&nbsp;--></th>


			 </tr>
		</thead>


		 <tbody>
		 <?php
    	// initialise a counter for striping the table
    	$stationArray = array();
    	echo $form->input("newaddedFeatues", array(
        	'type' => 'hidden',
        	'value' => '',
        	'id' => "newaddedFeatues"
    	));
		$finalAry = array();
		foreach($keyFeatures as $k=>$v){
			$station_id = explode('@', $v['Feature']['id']);
			$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
			$finalAry[$sta_id_key] = $v;

		}

		// Loop through the 14 keys of the station
    	for ($j = 36; $j < 58; $j++)
		{
        	$stationArray = $keyFeatures[$j]; //$setHeight = "";
			$sta_id = str_pad($j+1, 2, '0', STR_PAD_LEFT);
        	$class        = (($j % 2) ? " class='altrow'" : '');
      		if (isset($finalAry) && !empty($finalAry[$sta_id]['Feature']['id'])) {
            	$station_id = explode('@', $finalAry[$sta_id]['Feature']['id']);
            	$sta_id_key    = str_pad($station_id[0], 2, '0', STR_PAD_LEFT);
        	}
        	$fullKey = $sta_id  . '@' . $statId ;
            // $setHeight  = 'height:21px';


			?>

			<!-- <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">-->
			<tr style="cursor:move;height:23px;" onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false); " id="<?php
        	echo $sta_id;
			?>" >

			<td>
	        <?php

				if($sta_id_key==$sta_id)
				{
					$label = $finalAry[$sta_id]['Feature']['label'];
					echo $label;
				}
			?>
			</td>

			<td>
	        <?php
			$shortName = "";
			if($sta_id_key==$sta_id){
				$shortName = $finalAry[$sta_id]['Feature']['short_name'];
			}
        	echo $form->input("featurename[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $shortName
        	));
			//echo $sta_id."$$".$sta_id_key;

			if($sta_id_key==$sta_id){ //echo "<pre>"; print_r($stationArray['Feature']['id']);
				#echo __($shortName, true);
				$statKey = $sta_id  . '@' . $statId;
				//echo $html->link($shortName,'');
				echo $shortName;
			}
			?>
			</td>

	        <td>
	        <?php
			$DNID = "";
			if($sta_id_key==$sta_id){
				$DNID = $finalAry[$sta_id]['Feature']['primary_value'];
			}
       		// $DNID = $stationArray['Feature']['primary_value'];
        	echo $form->input("featurevalue[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $DNID
        	));


        	echo $form->input("featureNewPosition[$sta_id]", array(
            	'type' => 'hidden',
            	'value' => $sta_id
        	));



			if($sta_id_key==$sta_id){
        		/* echo $html->link($finalAry[$sta_id]['Feature']['primary_value'], array(
            	'controller' => 'dns',
            	'action' => 'selectdns',
            	"customer_id:$customer_id&type=single&update=$DNID"
        		), array(
            	'class' => $selected['DN List'] . " opencolorbox"
        		)); */

				echo $finalAry[$sta_id]['Feature']['primary_value'];
			}
			?>
	        </td>
	        <!-- <td>
	        <?php
			#echo  $featureStatus[$finalAry[$sta_id]['Feature']['status']];
			?>
	        </td>-->
	      <!--  <td class="table-right	 tooltip" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/16px/045_information_02_cmyk.gif) no-repeat 2px 2px;">
	          		 	<div>
							<div class="fl"><span><?php echo $html->link('', '',array('onclick'=>'')) ?></span>
								<p><?php
								$tooltipname = $shortName . '_desc';
								echo __($tooltipname);?></p>
							</div>
						</div>
	        </td>-->


<?php if(($sta_id=='55' || $sta_id=='56' || $sta_id=='57' || $sta_id=='58')){ ?>

			<td class="table-right-ohne" style="background-color: #ffffff;border: none;"  id="<?php
        	echo $sta_id;
			?>">
	<?php } else { ?>		
			<td class="table-right-ohne" style="background: url(<?php
        	echo $this->webroot;
			?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-style: none;" onmouseout="this.className='table-right-ohne';" id="<?php
        	echo $sta_id;
			?>tdlast">
			
			<?php } ?>
			
			<?php if(($sta_id=='55' || $sta_id=='56' || $sta_id=='57' || $sta_id=='58')){ ?>
			
			
	    <?php
		
		} else { ?>
			
		<div class="table-menu">
            <div class="table-menu-popup" style="z-index: 1">
            <ul>

			<?php
			if(($shortName == 'KEY1_DN') || ($shortName == 'DN_INDIVIDUAL') || ($shortName == 'DN_MADN'))
			{  ?>
					<li class="script">
					<?php
					echo $html->link(__('Edit', true), array(
					'controller' => 'features',
					'action' => 'edit',
					"stationkey_id:$statKey&featureType=$shortName"
					), array(
					'class' => $selected['DN List'] . " fancybox fancybox.ajax"
					))
					?>
					</li>
					<?php


			}
			elseif(($shortName == 'AUD') || ($shortName == 'BLF'))
			{  ?>
						<li class="script">
						<?php
						echo $html->link(__('Edit', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$statKey&featureType=$shortName"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						<?php


			}
			elseif(empty($shortName))
			{
					if($shortName == '')
					{?>
						<li class="script">
						<?php
						echo $html->link(__('Add UF', true), array(
						'controller' => 'features',
						'action' => 'edit',
						"stationkey_id:$fullKey&featureType=AUD"
						), array(
						'class' => $selected['DN List'] . " fancybox fancybox.ajax"
						))
						?>
						</li>
						<?php
					}
					else
					{
						?>
						<li class="script">
						<?php
	        			echo $html->link(__('No Options', true), ''
	        			);
						?>
						</li>
						<?php
					}
					
					
			}
			else
			{
			?>
				<li class="script">
				<?php	echo $html->link(__('No Options', true), ''	);	?>
				</li>
				<?php
			}
			?>
            </ul>
            </div>
			</div>
			<?php } ?></td>
		</td>	
			
	<?php	
		
		
    } //endfor 1- 14;

	?>
	            	</tr>
				 </tbody>
		</table>
		<!--  END BASE STATION -->

		

			<?php
			}
			?>
			</div> <!-- END OF HID EXPANSIONS -->
		<?php 
		} # End of expansions section > 0
		?>
		
		
		<!--  End extension 2 -->
		    <div class="result"></div>
	    <?php
    echo $form->end();
    ?>

    <?php
    /* if($stationDetails[0]['Station']['status'] == 5){
    	?>
    <div class="button-right">
    		<?php echo $html->link( __('apply', true),  array('controller'=> 'stations', 'action'=>'apply',$statId),array('onmouseover'=>'javascript:hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
    </div>
    <?php } 
    */?>

	<?php //echo $this->element('pagination/newpaging');
	?>

					<h4 style="display:block;float:left;width: 100%;"><?php echo __('Station History'); ?> <a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleShowHistory();" href="javascript:void(0)" style="float:right;">
					
					<div style="width:20px;background:#eee; height:20px;" id="pbtn">
					<div id="plus"></div>
					</div>
					<div style="width:20px;background:#eee; height:20px;" id="mbtn">
					<div id="minus"></div>
					</div>
					</a></h4>
					</div>

			    	<?php
			    	if (isset($showHistory) || ((isset($success)) && $success))
			    	{
			    		?>
			    		<div id="showhistory" class="table-content" style="display:block">
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
							<th class="table-column" align="left"> <?php echo __('Created');?></th>
							<th class="table-column" align="left"> <?php echo __('User');?></th>
							<th class="table-column" align="left"> <?php echo __('log_entry');?></th>
							<th class="table-column" align="left"> <?php echo __('Detail');?></th>

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
	else:
    	__("No features available in DB");
    	echo '</div>';
	endif;
} # End of key features, station != 6
?>
 </div>
</div>

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
        	 <h3><?php __('stationEdit') ?></h3>
                 <p>
                  <?php __('stationEdit_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('stationEdit_helpText') ?></p>
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>
			</div>
        </div>


		<div><p></p></div>
		<?php

		$disp1140 = 'none';
		$disp1120 = 'none';
		if($stationDetails[0]['Station']['phone_type'] == '1120')
		{
			$disp1120 = 'block';
		}
		elseif($stationDetails[0]['Station']['phone_type'] == '1140')
		{
			$disp1140 = 'block';
		}?>
		<img id="1120_image" style="display:<?php echo $disp1120?>"  src="<?php echo Configure::read('base_url');?>images/1120.png">
		<img id="1140_image" style="display:<?php echo $disp1140?>" src="<?php echo Configure::read('base_url');?>images/1140.png">

<!--INTERNAL USER OPTIONS -->
        <?php if($userpermission==Configure::read('access_id'))
        {?>
                <div class="box info">
                <h3><?php __("Internal User");?></h3>
                <p><?php __("Customer View:");?><?php echo $customer_id; ?></p>
                <p><?php echo  $selected_customer; ?></p>
                </div>
				<?php echo $pr_nr[1]['Location']['pro_nr']; ?>
	<?php } ?>

		</div>
<!--ight hand side  ends here-->
