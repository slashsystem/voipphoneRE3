<link rel="stylesheet" href="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css"/>
<script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>
<script type="text/javascript"> 
    $(document).ready(function() { //alert("ret");
        $('#dragdroptbl').tableDnD({ 
            onDragStart: function(table, row) { 
                //$(table).parent().find('.result').text('');
            }, 
            onDrop: function(table, row) {
				var rows = table.tBodies[0].rows; alert(rows);
                $('#AjaxResult').load(base_url+"stations/editstation?"+$.tableDnD.serialize());
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
						  // alert(pos+"=="+original_position);
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
		$('.filtersForm').attr('action',base_url+'stations/updateStationFeatures/<?php
echo $statId;
?>');
		$('.black_overlay').css('display','block');
		$('.filtersForm').attr('method','POST');
		$.ajax({
				type: "POST",
				async : false,
				url: $('.filtersForm').attr('action'),
				data: $('.filtersForm').serialize(),
				success: function(data){ 					 
						//jQuery('#fancybox').click();
						location.reload(); 					
				}
		});
		jQuery('#cboxClose').click();
	}
	function del_dn(addabove){
		//alert(addabove);
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
		$('#dragdroptbl tr:last').after('<tr id="'+old_trID+'" onmouseout="hoverRow(this,false); " onmouseover="hoverRow(this,true);" style="cursor: move; height: 23px; background-color: transparent;"><td><input id="StationFeaturename['+old_trID+']" type="hidden" value="" name="featurename['+old_trID+']"></td><td><input id="StationFeaturevalue['+old_trID+']" type="hidden" value="" name="featurevalue['+old_trID+']"><input id="StationFeatureNewPosition['+old_trID+']" type="hidden" value="'+newposval+'" name="featureNewPosition['+old_trID+']"><a class="opencolorbox cboxElement" href="/voipphoneRE3/dns/selectdns/customer_id:" . <?php echo $customer_id ?> . "&type=single&update="></a></td><td class="table-right" onmouseout="this.className=\'table-right\';" onmouseover="this.className=\'table-right-over\';" style="background:url(/voipphoneRE3/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-style: none;"><div class="table-menu"><div class="table-menu-popup" style="z-index: 1; display: none;"><ul><li class="script"><a class="opencolorbox cboxElement" href="/voipphoneRE3/dns/selectdns/customer_id:" . <?php echo $customer_id ?> . "&type=single&add=\''+old_trID+'\'">Add DN</a></li></ul></div></div></td></tr>');	
		
		        $('#dragdroptbl').tableDnD({ 
            onDragStart: function(table, row) { 
                //$(table).parent().find('.result').text('');
            }, 
            onDrop: function(table, row) { //alert("ssd");
                $('#AjaxResult').load(base_url+"stations/editstation?"+$.tableDnD.serialize());
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
	}
</script>
<script type="text/javascript">
//function toggleSimring(){
                //$("#advancesearch").show
               // if(document.getElementById('simring').style.display=='none'){
                 //       document.getElementById('simring').style.display='block';
                //}else{
                  //      document.getElementById('simring').style.display='none';
                //}

jQuery(function() {

    		jQuery(document).ready(function(){
        		$('#simid').change(function(){
					jQuery('#button').attr("class", "showhighlight_buttonleft");
        			jQuery('#updateStation').attr("class","button-right-hover");
            		if($(this).is(":checked"))
            		{
            			document.getElementById('simring').style.display='block';
            		}
            		else
            		{
            			document.getElementById('simring').style.display='none';
            		}

            	});

    			
    	    });
});

         function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#button').attr("class", "showhighlight_buttonleft");
				  jQuery('#updateStation').removeAttr("class");
				  jQuery('#updateStation').attr("class", "button-right-hover");

			  });
		  }

</script>

<div class="black_overlay" style="height: 100%; width: 100%; display: none;">
				<div id="black_overlay_loading">
				<img alt="" src="../../img/assets/ajax-loader.gif">
				</div>
			</div>

<div class="block top">



		
<div id="newEdit">
		<div class="form-body">

<?php 

		
if($stationDetails[0]['Station']['status'] != 6){ 


echo $form->create('Station', array(
				'action' => 'updateStationFeatures',
				'id' => 'updateStationFeatures',
				'class' => 'filtersForm',
				'type' => 'POST'
));

echo $form->input('Station.id', array('type'=>'hidden','value'=>$stationDetails[0]['Station'])); 
?>
<div class="cb">

<div style="height: 55px">
<div id="overlay-error" class="notification first hide" style="width: 100%" >
		
			<div class="error">
				<div class="message">
					
				</div>
			</div>
		</div>
</div>


<h4><?php echo __('station features') .' '. $statId;?>
	<div class='demonstrations'>
            <div  ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="setTimeout( function() { $('.fancybox-overlay').trigger('click'); },5); UnTip();">X</a></div>
	        <div ><a href="javascript:;"  style="cursor:pointer" onclick="Tip('<b><?php echo __('stationfeatures_helpTitle') ?></b><br/><?php echo __('stationfeatures_hlepText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>		
 		</div>
	
</h4>
        
        <div class="form-box">
       	 
				<div class="form-left">
					<?php if(array_key_exists('COM', $stationFeatures))
					{
						#echo 'COMBOX';
						echo '<div class="form-label">';
						echo __('COMBOX');
						echo '</div>';
						echo $form->input('COM', array('label' => false, 'value'=>$stationFeatures['COM'], 'type'=>'checkbox', 'checked'=>($stationFeatures['COM'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));			
					}
					else
					{
						echo '<p></p>';
					}
					?>
				</div>
				<div class="form-right">
				<?php if(array_key_exists('MOH', $stationFeatures))
					{
						echo '<div class="form-label">';
						echo __('MOH');
						echo '</div>';
						echo $form->input('MOH', array('label' => false,'value'=>$stationFeatures['MOH'], 'type'=>'checkbox', 'checked'=>($stationFeatures['MOH'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));		
					}
					else
					{
						echo '<p></p>';
					}
					?>
				</div>
		</div>
		<div class="form-box">
				<div class="form-left">
					<?php 	
					echo '<div class="form-label">';
					echo __('SIMRING');
					echo '</div>';
						echo $form->input('SIMRING', array('label' => false,'value'=>$stationFeatures['SIMRING'], 'id'=>'simid', 'type'=>'checkbox','checked'=>($stationFeatures['SIMRING'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					?>
				</div>
				<div class="form-right">
					<?php if(array_key_exists('CFRA', $stationFeatures))
					{
						echo '<div class="form-label">';
						echo __('CFRA');
						echo '</div>';
						echo $form->input('CFRA', array('label' => false,'value'=>$stationFeatures['CFRA'], 'type'=>'checkbox', 'checked'=>($stationFeatures['CFRA'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					}
					else
					{
						echo '<p></p>';
					}
					?>
				</div>
		</div>
		<div class="form-box">
				<div class="form-left">
					<?php if(array_key_exists('CWT', $stationFeatures))
					{
						echo '<div class="form-label">';
						echo __('CWT');
						echo '</div>';
						echo $form->input('CWT', array('label' => false,'value'=>$stationFeatures['CWT'], 'type'=>'checkbox', 'checked'=>($stationFeatures['CWT'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					}
					else
					{
						echo '<p></p>';
					}
					?>
				</div>
				<div class="form-right">
					<?php if(array_key_exists('CTI', $stationFeatures))
					{
						echo '<div class="form-label">';
						echo __('CTI');
						echo '</div>';
						echo $form->input('CTI', array('label' => false,'value'=>$stationFeatures['CTI'], 'type'=>'checkbox', 'checked'=>($stationFeatures['CTI'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));			
					}
					else
					{
						echo '<p></p>';
					}
					?>
				</div>
		</div>
		
		<div class="form-box">
				<div class="form-left">
					<?php 
					echo '<div class="form-label">';
						echo __('RAG');
						echo '</div>';
					echo $form->input('RAG', array('label' => false,'value'=>$stationFeatures['RAG'], 'type'=>'checkbox', 'checked'=>($stationFeatures['RAG'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					?>
				</div>
				<div class="form-right">
					<?php 
					echo '<div class="form-label">';
						echo __('PRK');
						echo '</div>';
					echo $form->input('PRK', array('label' => false,'value'=>$stationFeatures['PRK'], 'type'=>'checkbox', 'checked'=>($stationFeatures['PRK'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));			
					?>
				</div>
				<div class="form-left">
					<?php 
					echo '<div class="form-label">';
						echo __('CNF');
						echo '</div>';
					echo $form->input('CNF', array('label' => false,'value'=>$stationFeatures['CNF'], 'type'=>'checkbox', 'checked'=>($stationFeatures['CNF'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					?>
				</div>
				
					<?php 
					# If DN_MADN, DN_XLH exists then show
					# IF MSBEnable feature exists and is unset then
					#if(array_key_exists('MADN', $stationFeatures))
					#{
						echo '<div class="form-left">';
						echo '<div class="form-label">';
						echo __('MSB');
						echo '</div>';
						echo $form->input('MSB', array('label' => false,'value'=>$stationFeatures['MSB'], 'type'=>'checkbox', 'checked'=>($stationFeatures['MSB'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));			
						echo '</div>';
						echo '<div class="form-right">';
						echo '</div>';
						
					#echo $form->input('msbenable', array('label' => false,'value'=>$stationFeatures['MSB'], 'type'=>'checkbox', 'checked'=>($stationFeatures['MSB'] == '1' ? TRUE : FALSE),'style'=>'width:20px;'));			
					#}
					#else 
					#{
					#	echo '<p></p>';
						#Not shown on form but keep the value sent back to controller.
						#echo $form->input('MSBEnable', array('type'=>'hidden','value'=>$stationFeatures['MSBEnable']));
					#}
					?>
				
				<div class="form-left">
					<?php 
					echo '<div class="form-label">';
						echo __('UCDLG');
						echo '</div>';
					echo	$form->input('ucdlg', array('label' => false,'value'=>$stationFeatures['UCDLG'], 'type'=>'checkbox', 'checked'=>($stationFeatures['UCDLG'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));				
					?>
				</div>
				<div class="form-right">
					<?php 
					echo '<div class="form-label">';
						echo __('UCD');
						echo '</div>';
					echo $form->input('ucd', array('label' => false,'value'=>$stationFeatures['UCD'], 'type'=>'checkbox', 'checked'=>($stationFeatures['UCD'] == '1' ? TRUE : FALSE),'style'=>'width:20px;','onclick'=>'chngbkcolor(this)'));			
					?>
				</div>
		</div>
		<div class="form-box">
				<div class="form-left">
					<?php 
					echo '<div class="form-label">';
						echo __('CPU');
						echo '</div>';
					echo $form->input('CPU', array('label' => false,'type'=>'select', 'options'=>$cpuGroups, 'default'=>$stationFeatures['CPU'],array('style'=>'width:200px;'),'style'=>'width:100px;','onchange'=>'chngbkcolor(this)')); ?>
						
				</div>
				<div class="form-right">
					<?php 
				
					echo '<div class="form-label">';
						echo __('Extensions');
						echo '</div>';
					echo $form->input('extensions', array('label' => false,'type'=>'select', 'options'=>$extensions, 'default'=>$stationDetails[0]['Station']['extensions'],array('style'=>'width:200px;'),'style'=>'width:100px;','onchange'=>'chngbkcolor(this)')); ?>
					
				</div>
		</div>
		
			
<h4>Station Parameters</h4>
					
       		
        	<?php
			    	if ($stationFeatures['SIMRING'] == 1)
			    	{
			    		?>	
			    		<div id="simring" class="form-box" style="display:block">
			    		<?php
			    	
			    	}
			    	else
			    	{
			    		?>
			    		<div id="simring" class="form-box" style="display:none">
			    		<?php
			    	}?>
        	<!--  <div style="display:<?php echo $showSimRing?>" class="form-box"> -->
				<div class="form-left">
					<?php 
				
					echo '<div class="form-label">' . __('Member1', true). '</div>';
					
					echo $form->input('SIMRINGMEMBER1', array('type'=>'text','label' => false,'value'=>$stationFeatures['SIMRINGMEMBER1'],'style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));
					
					?>
		
				</div>
				<div class="form-right">
					<?php 
					echo '<div class="form-label">' . __('Member2', true). '</div>';
					echo $form->input('SIMRINGMEMBER2', array('type'=>'text','label' => false,'value'=>$stationFeatures['SIMRINGMEMBER2'],'style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));
					
					?></div>
				<div class="form-left">
					<?php 
				
					echo '<div class="form-label">' . __('Member3', true). '</div>';
					echo $form->input('SIMRINGMEMBER3', array('type'=>'text','label' => false,'value'=>$stationFeatures['SIMRINGMEMBER3'],'style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));
					
					?></div>
				<div class="form-right">
	
						<?php 
				
					echo '<div class="form-label">' . __('Member4', true). '</div>';
					echo $form->input('SIMRINGMEMBER4', array('type'=>'text','label' => false,'value'=>$stationFeatures['SIMRINGMEMBER4'],'style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));
					
					?></div>
			</div>


	<div class="button-right-disabled" id="updateStation">
					<a id="button" href="javascript:submitForm()" onclick="" name="submitForm" value="submitForm" ><?php
__("Submit");
					?></a>
			
						
      </div>
      
      	
      <?php
		   
	
} # End of key features, station != 6
?>
</div>
<div class="form-box">
	<div class="form-right-inactive">
		<p><?php echo __('inactiveFeature')?></p>
	</div>		
</div>
</div>
</div>
