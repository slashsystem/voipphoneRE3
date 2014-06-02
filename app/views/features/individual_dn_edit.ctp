<!--<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="expires" content="0">-->


<style>

.table-menu-popup {
    display: none;
    float: left !important;
    margin-left: -24px;
    margin-top: 3px;
    padding: 0;
    position: absolute;
}
.table-menu-popup li {
    position: relative;
    text-align: left;
    margin: 0;
    padding: 0;
    width: 13px;
}
.fancybox-inner{
	height: auto !important;
    overflow: auto;
   
}
.table-menu-popup li a, .table-menu-popup li a:link, .table-menu-popup li a:visited, .table-menu-popup li a:active {
    border-left: 0px solid #001155!important;
    border-right: 0px solid #001155!important;
    border-top: 0px solid #001155!important;
    padding: 2px 0 0 25px;
}
.table-menu-popup ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 80px!important;
}
.greyed {
    background-color: #FF0000!important;
}
</style>
<script>
$(document).ready(function(){
$('#button').removeAttr("onclick","");
$('#button').attr("onclick","noinfo()");
	
	
});
</script>

<script>
	function noinfo(){
				
		$('#overlay-error .error .message').text("<?php __('no changes entered') ?>");
		$('#overlay-error').removeClass('hide');
	}
</script>
<script type="text/javascript"> 
    $(document).ready(function() { //alert("ret");

    	$(document).keypress(function(e) {
    		if (e.which == 13) {
    			$("a#button").trigger('click');
    			return false;
    			//alert("dfdf");
    		}
    	});

        
	});
    validation = {
    	    // Specify the validation rules
    	    'rules': {                     
    	    	'StationSDNA':{
    	            'spclChar': true,
    	            'max': '9'
    	            //'max': '30'
    	        },  
    	        'StationDISPLAYNAME':{
    	            'spclChar': true,
    	            'max': '12'
    	            //'max': '30'
    	        },  
    	        'StationCFBNUMBER':{
    	            'max': '30'
    	        },
    	        'StationCFUNUMBER':{
    	            'max': '30'
    	        },
    	        'StationCFNANUMBER':{
    	            'max': '30'
    	        },     
    	        'StationCFBSTATUS' : {
    	        	'beforeCheck' : 'StationCFBNUMBER'
    	        },     
    	        'StationCFUSTATUS' : {
    	        	'beforeCheck' : 'StationCFUNUMBER'
    	        },     
    	        'StationCFNASTATUS' : {
    	        	'beforeCheck' : 'StationCFNANUMBER'
    	        }                              
    	    },                  
    	    // Specify the validation error messages
    	    'messages': {  
    	    	'StationSDNA': {
   	             'spclChar': "<?php __('Special characters are not allowed')  ?>",
   	             'max': "<?php __('max9')  ?>"
   	         	},  
   	         	'StationDISPLAYNAME': {
    	             'spclChar': "<?php __('Special characters are not allowed')  ?>",
    	             'max': "<?php __('max12')  ?>"
    	         },  
    	         'StationCFBNUMBER': {
    	             'required': "<?php __('Please enter CFB')?>",
    	             'max': "CBF Number length must not be greater than 30 digits"
    	         },
    	         'StationCFUNUMBER': {
    	             'required': "<?php __('Please enter CFU')?>",
    	             'max': "CBF Number length must not be greater than 30 digits"
    	         },
    	         'StationCFNANUMBER': {
    	             'required': "<?php __('Please enter CFNA')?>",
    	             'max': "CBF Number length must not be greater than 30 digits"
    	         },
    	         'StationCFBSTATUS': {
    	             'beforeCheck': "<?php __('__CFBcannotActivateBlank')?>"           
    	         },
    	         'StationCFUSTATUS': {
    	             'beforeCheck': "<?php __('__CFUcannotActivateBlank')?>"           
    	         },
    	         'StationCFNASTATUS': {
    	             'beforeCheck': "<?php __('__CFNAcannotActivateBlank')?>"           
    	         }        
    	    },
    	  };
</script>
<script>


function submitForm(){
	
  //$(".loading").html('<img alt="" src="<?php echo Configure::read('base_url');?>img/assets/ajax-loader.gif">');
					 
  if (inValidate(validation)) {  	
    return false;
  } else {
  
  $('.black_overlay').css('display','block');
  $.fancybox.showLoading()  ;
   setTimeout(function() {
	 // $('.black_overlay').css('display','block');
      $('.dnForm').attr('action',base_url+'features/updateDN/<?php echo $stationkey_id;?>');
      $('.dnForm').attr('method','POST');
	  $.fancybox.showLoading()  ;
      $.ajax({
          type: "POST",
          async : false,
          
          dataType: 'json',
          url: $('.dnForm').attr('action'),
          data: $('.dnForm').serialize(),
          success: function(result){         
 			
          }
      });
	  location.reload(false);
      //window.location.reload();
	 //document.location.reload();
	},6000);  
  }   
              //jQuery('#cboxClose').click();
        //location.reload();
}//end submitForm
		
		  function chngbkcolor(obj) {
			  $(document).ready(function() {
				  $('#button').attr("class", "showhighlight_buttonleft");
				  $('#updateStation').removeAttr("class");
				  $('#button').removeAttr("onmouseover");
				  $('#button').removeAttr("onmouseout");
				  $('#updateStation').attr("class", "button-right-hover");
				  $('#button').attr("onclick","submitForm()");
			  });

			//called when key is pressed in textbox
			    $("input.numeric_check").keypress(function(e) {	
			      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57) && e.which!=13)
			      {        
			        $('#overlay-error .error .message').text("<?php __('digitsOnly') ?>");
			        $('#overlay-error').removeClass('hide');
			        return false;
			      } else {
			      		//$("input").keydown(function() {
				          inValidate(validation, 'keyup');                    
				        //});		
			      }
			    });
		  }
	
	//By creating tooltips after DOM load we make sure that referenced elements are available.
		
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
	
	
    $(document).ready(function() {

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
            $	('#pbtn_ods').hide();
            $('#minus_ods').show();
            $('#mbtn_ods').show();
            $('#plus_ods').hide();
        });
    });

</script>

<?php 

$featStat['4'] = '!';

if(!empty($features)){
	echo $form->create('Station', array(
                                'action' => 'updateDNFeatures',
                                'id' => 'updateDNFeatures',
                                'class' => 'dnForm',
                                'type' => 'POST',
								'invalidate' => 'invalidate',
								'autocomplete'=>'off'
));
#echo $form->input("returnDNList", array(
#		'type' => 'hidden',
#		'value' => $returnDNList,
#		'id' => "returnDNList"
#));


	#echo $form->create(null, array('id' => 'featureEditForm', 'url' => '/features/update/'.$features[0]['Feature']['id'],'accept-charset'=>'ISO-8859-1'));
	?>	
	<div class="black_overlay"  style="display: none;">
				<!--<div id="black_overlay_loading" class="loading">
				<img alt="" src="<?php echo Configure::read('base_url');?>img/assets/ajax-loader.gif">
				</div>-->
				
				
	</div>
	
	<div class="block top">
		  	
		<div style="height: 55px">
		<div id="overlay-error" class="notification first hide" style="width: 100%" >
		
			<div class="error">
				<div class="message">
					
				</div>
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
		
	<?php 
	#CBM TEST
	} ?>
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
		}?>
		
 <!--CBM ADDED BUTTONS TO TOP-->
	<div id="newEdit">
		<?php  $d=explode('@',$stationkey_id);
			$key = $d[0];
			$dnno = $d[1];
			echo $form->input('DN', array('type'=>'hidden','value'=>$features['DN']['primary_value']));
			
			#If source page is not edit_madn don't sho key options. this is because should only available when launched from ediststaiotn.

			if(($featureType=="DN_MADN") && (isset($spg)))
			{
				?>
				
				<h4><?php echo __('GroupDNDetails') .'&nbsp;'. $features['DN']['primary_value']; ?>
		 <div class='demonstrations'>
           <div  ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick=" setTimeout( function() {     
					$('.fancybox-overlay').trigger('click');
					 },5); UnTip();">X</a></div>
	        <div ><a href="javascript:;"  style="cursor:pointer" onclick="Tip('<b><?php echo __('groudnForm_helpTitel') ?></b><br/><?php echo __('groupForm_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>		
 		  </div>
		</h4>
				<?php 
			}
			else {
		 ?>
		 
		<h4><?php echo __('DN Details') .'&nbsp;'. $features['DN']['primary_value']; ?>
		 <div class='demonstrations'>
           <div  ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick=" setTimeout( function() {     
					$('.fancybox-overlay').trigger('click');
					 },5); UnTip();">X</a></div>
	        <div ><a href="javascript:;"  style="cursor:pointer" onclick="Tip('<b><?php echo __('dnForm_helpTitel') ?></b><br/><?php echo __('dnForm_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>		
 		  </div>
		</h4>
		<div class="form-body">
			<div class="form-box">
			    <div class="form-left">
					<?php 
					echo '<div class="form-label">'; 
					echo __('Station Id'); 
					echo '</div>';
					#echo	$form->input('IGNORE_STATIONID', array('label' => false,'value'=>$dnno,'style'=>'width:100px;', 'readonly'=>'true'));
					echo $dnno;
					?>		
				</div>
				<div class="form-right">
					<?php 
					#echo '<div style="width:100px; float: left">' . __('KEY') . '</div>';
					echo '<div class="form-label">';
					echo __('DN Type');
					echo '</div>';
					#echo	$form->input('', array('label' => false,'value'=>$featureType,'style'=>'width:100px;', 'readonly'=>'true'));
					echo $featureType;
					?>		
				</div>
				<div class="form-left">
					<?php 
					#echo '<div style="width:100px; float: left">' . __('KEY') . '</div>';
					echo '<div class="form-label">';
					echo __('key');
					echo '</div>';
					#echo	$form->input('IGNORE_KEY', array('label' => false,'value'=>$key,'style'=>'width:100px;', 'readonly'=>'true'));	
					echo $key;
					?>	
			     </div>
				   
				<div class="form-right">
					<?php 
					echo '<div class="form-label">';  
					echo __('Port Type'); 
					echo '</div>';
					#echo '<div style="width:100px; float: left">' . __('Leading0') . '</div>';
					#echo	$form->input('LEADINGZERO', array('label' => false,'value'=>$features['LEADINGZERO']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['LEADINGZERO']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));	
					echo $porttype;
					echo $featStat[$features['LEADINGZERO']['status']] ;?>	
  			    </div>
	         </div>
			 <div class="form-box">    
				<div class="form-left">
					<?php 
					echo '<div class="form-label">';  
					echo __('Locations'); 
					echo '</div>';
					#echo '<div style="width:100px; float: left">' . __('Locations') . '</div>';
					//echo $form->input('location_id', array('label' => false,'type'=>'select', 'options'=>$locations, 'default'=>$location_id,'style'=>'width:106px;','onchange'=>'chngbkcolor(this)')); 
					echo $location_name['Location']['name'];
					echo $featStat[$features['location_id']['status']] ;?>
				</div>
				<div class="form-right">
					<?php echo '<div class="form-label">';
					echo __('emer'); 
					echo '</div>';
					#echo $form->input('IGNORE_emer', array('label' => false,'value'=>$dnDetails['Location']['emer'], 'style'=>'width:100px;', 'readonly'=>'true','onkeyup'=>'chngbkcolor(this)'));
					echo $dnDetails['Location']['emer']; 
					?>
				</div>
			</div><br/>
			
			
			<h4><?php echo __('DN Option');?>			</h4>
			
            <div class="form-box">			    
				<div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('LANGUAGE'); 
					echo '</div>';
					?>
					  <div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('LANG_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                      </div>
             		<?php
					echo $form->input('LANG', array('label' => false,'type'=>'select', 'options'=>$languageOptions, 'default'=>$features['LANG']['primary_value'],'style'=>'width:106px;','onchange'=>'chngbkcolor(this)')); 
					echo $featStat[$features['LANG']['status']] ;?>
					<?php
					# $onclick = "<span onclick=Tip(\'echo__(LANG_desc)\') >...</span>"; ?>						
			     </div>
				 <div class="form-right table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('LEADINGZERO'); 
					echo '</div>';
					?>
				      <div class="table-menu-popup" style="z-index: 1">
                        <ul><li><a href="javascript:;" onclick="Tip('<?php echo __('LEAD_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
               	      </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('Leading0') . '</div>';
					echo	$form->input('LEADINGZERO', array('label' => false,'value'=>$features['LEADINGZERO']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['LEADINGZERO']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','readonly'=>'true','onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['LEADINGZERO']['status']] ;?>	
			    </div>
     		 <div class="form-box">
				 <div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('BARRINGSET'); 
					echo '</div>';
					?>
					  <div class="table-menu-popup" style="z-index: 1">
                    	<ul>									
							<li ><a href="javascript:;" onclick="Tip('<?php echo __('BARRINGSET_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li>						
             			</ul>
                      </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('Barring') . '</div>';
					#echo $form->input('Language', array('value'=>$features['LANG']['primary_value'], 'style'=>'width:200px;','onchange'=>"javascript:submi_form('filters');")); 	
					#echo $form->input('Language', array('label' => false,'type'=>'select', 'options'=>$languageOptions, 'default'=>'somegroup',array('style'=>'width:200px;'),'style'=>'width:20px;')); 
					echo $form->input('BARRINGSET', array('label' => false,'type'=>'select', 'options'=>$barringOptions, 'default'=>$features['BARRINGSET']['primary_value'],'style'=>'width:106px;','onchange'=>'chngbkcolor(this)')); 
					echo $featStat[$features['BARRINGSET']['status']] ;?>
					
				</div>
				<div class="form-right table-menu">
					<?php 
					#echo '<div style="float:left !important;">'; 
					echo '<div class="form-label">';  
					echo __('SUPPRESS'); 
					echo '</div>';
					?>
					  <div class="table-menu-popup" style="z-index: 1">
                    	<ul>									
						  <li ><a href="javascript:;" onclick="Tip('<?php echo __('SUPPRESS_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li>						
                    	</ul>
                      </div>
					<?php
					#echo "</div>";
					#echo '<div style="width:100px; float: left">' . __('Suppress') . '</div>';
					echo	$form->input('SUPPRESS', array('label' => false,'value'=>$features['SUPPRESS']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['SUPPRESS']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['SUPPRESS']['status']] ;?>	
					
			    </div>
			</div>

			<div class="form-box">
				<div class="form-left table-menu">
					<p></p>
					
				</div>
				<div class="form-right table-menu">
					<?php 
					#if(1)
					if(array_key_exists('CPU', $stationfeatures))
					{
						echo '<div class="form-label">';  
						echo __('cpuMember'); 
						echo '</div>';
						?>
						<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('cpuMember_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    	</div>
						<?php
						#echo '<div style="width:100px; float: left">' . __('cpuMember') . '</div>';
						#echo $form->input('Language', array('value'=>$features['LANG']['primary_value'], 'style'=>'width:200px;','onchange'=>"javascript:submi_form('filters');")); 	
						#echo $form->input('Language', array('label' => false,'type'=>'select', 'options'=>$languageOptions, 'default'=>'somegroup',array('style'=>'width:200px;'),'style'=>'width:20px;')); 
					
						if($key == 01)
						{
						echo	$form->input('CPUMEMBER', array('label' => false,'value'=>$features['CPUMEMBER']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['CPUMEMBER']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','readonly'=>'true','onclick'=>'chngbkcolor(this)'));	
						}
						else
						{
							echo	$form->input('CPUMEMBER', array('label' => false,'value'=>$features['CPUMEMBER']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['CPUMEMBER']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));	
					
						}
						echo $featStat[$features['CPUMEMBER']['status']] ;
					
					}
					?>		
				</div>
			</div>	
			  <div class="form-box">

				<div class="form-left table-menu">
					<p>	</p>
				</div>
				<div class="form-right table-menu">
					<?php 
					if(array_key_exists('MSB', $stationfeatures))
					{
					echo '<div class="form-label">';  
					echo __('MSB'); 
					echo '</div>';
					?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('MSB_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('MSB') . '</div>';
					#echo $form->input('Language', array('value'=>$features['LANG']['primary_value'], 'style'=>'width:200px;','onchange'=>"javascript:submi_form('filters');")); 	
					#echo $form->input('Language', array('label' => false,'type'=>'select', 'options'=>$languageOptions, 'default'=>'somegroup',array('style'=>'width:200px;'),'style'=>'width:20px;')); 
					echo	$form->input('MSBMEMBER', array('label' => false,'value'=>$features['MSBMEMBER']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['MSBMEMBER']['primary_value'] == '1' ? TRUE : FALSE),'style'=>'width:15px;','onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['MSBMEMBER']['status']] ;
					}
					?>		
				</div>
			</div>
            <br/>
			<?php 
			} # End SPG check
			#If this is DN_INDIVIDUAL or DN_MADN_PILOT or came from DN form or Group edit form.
			if(($featureType!="DN_MADN") || (isset($spg)))
			  {?>
			  
			  <div class="form-box">
				<div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('DISPLAYNAME'); 
					
					echo '</div>';
					?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('DISPLAYNAME_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('DISP') . '</div>';
					echo	$form->input('DISPLAYNAME', array( 'label' => false,'value'=>$features['DISPLAYNAME']['primary_value'],'style'=>'width:100px','onkeyup'=>'chngbkcolor(this)'));	
					echo $featStat[$features['DISPLAYNAME']['status']] ;
					?>		
					
				</div>
			  
			  <div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('SDNA'); 
					echo '</div>'; ?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('SDNA_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    </div>
					<?php
					echo	$form->input('SDNA', array('label' => false,'value'=>$features['SDNA']['primary_value'],'class'=>'numeric_check','style'=>'width:100px;','onkeyup'=>'chngbkcolor(this)'));	
					echo $featStat[$features['SDNA']['status']] ;?>		
				</div>
			  
			  </div>
			    <h4><?php echo __('Forwarding');?></h4>

			   <div class="form-box">   
				 <div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">'; 
					echo __('CFU'); 
					echo '</div>';
					?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('CFU_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                	</div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('CFU Number') . '</div>';
					echo	$form->input('CFUNUMBER', array('label' => false,'value'=>$features['CFUNUMBER']['primary_value'],'class'=>'numeric_check','style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFUNUMBER']['status']] ;?>
				 </div>
				 <div class="form-right table-menu">
					<?php 
					echo '<div class="form-label">'; 
					echo __('CFUEnable'); 
					echo '</div>';
					?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('CFB_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('CFUSTATUS') . '</div>';
					echo	$form->input('CFUSTATUS', array('label' => false,'value'=>$features['CFUSTATUS']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['CFUSTATUS']['primary_value'] == 'A' ? TRUE : FALSE),'style'=>'width:15px;','readonly'=>$readonly,'onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFUSTATUS']['status']] ;?>
				 </div>
           	   </div>
             <div class="form-box">   
			   <div class="form-left table-menu">
				 <div class="form-label" onclick="Tip('<?php echo __('CFB_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()"> 
					<?php echo __('CFB'); ?> 
				 </div>
				 <div class="table-menu-popup" style="z-index: 1">
                    <ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('CFB_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                 </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('CFB Number') . '</div>';
					echo	$form->input('CFBNUMBER', array('label' => false,'value'=>$features['CFBNUMBER']['primary_value'],'class'=>'numeric_check', 'style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFBNUMBER']['status']] ;?>	
				</div>
				<div class="form-right table-menu">
					<?php 
					echo '<div class="form-label">'; 
					echo __('CFBEnable'); 
					echo '</div>'; ?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul><li ><a href="javascript:;" onclick="Tip('<?php echo __('CFBEnable_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li></ul>
                    </div>
					<?php
					#echo '<div style="width:100px; float: left">' . __('CFBSTATUS') . '</div>';
					echo	$form->input('CFBSTATUS', array('label' => false,'value'=>$features['CFBSTATUS']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['CFBSTATUS']['primary_value'] == 'A' ? TRUE : FALSE),'style'=>'width:15px;','readonly'=>$readonly,'onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFBSTATUS']['status']] ;?>	
				</div>
            </div> 
		     <div class="form-box">     
				<div class="form-left table-menu">
					<?php 
					echo '<div class="form-label">';  
					echo __('CFNA'); 
					echo '</div>'; ?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul>									
							<li ><a href="javascript:;" onclick="Tip('<?php echo __('CFNA_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li>						
                    	</ul>
                    </div>
					<?php #echo '<div style="width:100px; float: left">' . __('CFNA Number') . '</div>';
					echo	$form->input('CFNANUMBER', array('label' => false,'value'=>$features['CFNANUMBER']['primary_value'],'class'=>'numeric_check','style'=>'width:100px;','readonly'=>$readonly,'onkeyup'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFNANUMBER']['status']] ;?>	
				</div>
				<div class="form-right">
				<div class="table-menu">
					<?php 
					echo '<div class="form-label">';
					echo __('CFNAEnable'); 
					echo '</div>'; ?>
					<?php
				        $CFNAEnable_desc = __('CFNAEnable_desc',true);
						$CFNAEnable_desclen = strlen($CFNAEnable_desc);
						if($CFNAEnable_desc != "*empty*"){
					?>
					<div class="table-menu-popup" style="z-index: 1">
                    	<ul style="width:100px;">									
							<li ><a href="javascript:;" onclick="Tip('<?php echo __('CFNAEnable_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a></li>
                    	</ul>
                    </div>
					<?php } ?>
					<?php #echo '<div style="width:100px; float: left">' . __('CFNASTATUS') . '</div>';
					echo	$form->input('CFNASTATUS', array('label' => false,'value'=>$features['CFNASTATUS']['primary_value'], 'type'=>'checkbox', 'checked'=>($features['CFNASTATUS']['primary_value'] == 'A' ? TRUE : FALSE),'style'=>'width:15px;','readonly'=>$readonly,'onclick'=>'chngbkcolor(this)'));	
					echo $featStat[$features['CFNASTATUS']['status']] ;?>
						
				</div>
			<!--CFDVT-->
				 <div class="table-menu">
                       <?php
                       echo '<div class="form-label table-menu"  style="width:30px;">';
                       echo __('nach');
                       echo '</div>'; ?>
					   <?php
				         $CFDVT_desc = __('CFDVT_desc',true);
						$CFDVT_desclen = strlen($CFDVT_desc);
						if($CFDVT_desc != "*empty*"){
						 ?>
					   <div class="table-menu-popup" style="z-index: 1;">
                    	<ul style="margin-top:0px;margin-left:145px;">									
							<li ><a href="javascript:;" onclick="Tip('<?php echo __('CFDVT_desc') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()">...</a>	</li>
                    	</ul>
                      </div>
					   <?php } ?>
                       <?php echo $form->input('CFDVT', array('label' => false,'type'=>'select', 'options'=>$cfdvtOptions, 'default'=>$features['CFDVT']['primary_value'],'style'=>'width:56px;','readonly'=>$readonly,'onclick'=>'chngbkcolor(this)')); 
                       echo $featStat[$features['CFDVT']['status']] ;?><?php echo __('sec'); ?>
				</div>	
			</div>
            </div>	
       <?php }
       else {

		?>
			<h4><?php echo __('ForwardingDisabledGrpMember');?>     
            </h4>
            <div class="form-box">     
				<div class="form-left">
					
					<a href="<?php echo Configure::read('base_url');?>groups/edit/group_id:<?php echo $features['DN']['primary_value']?>" onMouseOver="Tip('<?php echo __('groupLink') ?>', BALLOON, true, ABOVE, false);" onMouseOut="UnTip(); " ><?php echo __("groupLink", true); ?></a>	
				</div>
				<div class="form-right">
					<p><?php echo __('groupForwarding_blurb');?> </p>
				</div>
			</div>
            
 		<?php } ?>
	</div>
	<?php }?>
    <div class="form-box">
	<div class="form-right-inactive">
		<p><?php echo __('inactiveFeature')?></p>
	</div>		
	</div>
	 <br/>
		 <fieldset>
           <fieldset style="display:none;">
              <input type="hidden" name="_method" value="PUT" />
            </fieldset>
            <?php if(!(isset($error) && $error)){?>
     		<div class="button-right-disabled" id="updateStation">
              <a id="button" href="javascript:;"  onclick="submitForm();" name="submitForm" value="submitForm" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __("Submit"); ?></a>
            </div>
            <?php }?>
          </fieldset>
     </div>          
  </div>

   <!--ight hand side  ends here-->

</form>
<h3><span class="alert alert-error overlay-error hide"></span></h3>

