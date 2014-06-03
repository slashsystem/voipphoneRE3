
<script>
jQuery(function() { 
		
		setTimeout("jQuery('#destname').focus();", 500);
	    jQuery("#savedestination").click(function () {
				
			validation = {
	    	    // Specify the validation rules
	    	    'rules': {                     
	    	      
	    	        'destname':{
	    	        	'leading': '0',	    	            
	    	            'excludeStr': ['084', '0800', '090', '00870', '00881', '00882', '00883', '0039310'],
	    	            'min': '9',
	    	            'max': '15'	    	           
	    	        }  
	                                  
	    	    },                  
	    	    // Specify the validation error messages
	    	    'messages': {  
	    	        
	    	        'destname': {
	    	         	'leading' : "<?php __('leadingZeroOds')?>",
	    	         	'excludeStr' : "<?php __('excludeNumber')?>",
	    	            'min': "<?php __('min9Chars')?>",
	    	            'max': "<?php __('max15Chars')?>"             
	    	        }
	    	    }
	    	  };
			
			if (inValidate(validation)) {
	    		  
	    	    //return false;
	    	  } else {
			
				/*var destval=$('#destname').val();
				if(destval!='')
				{
				if($.isNumeric(destval))
				{*/
				var senddata = []; 
				 $('#checkAll').removeAttr('checked');
				jQuery('input[type="checkbox"]:checked').each(function() { 
				
				  
					var enteredDest = jQuery('#destname').val();
					
					var Odsentryid = jQuery(this).val();
					jQuery(this).removeAttr('checked');
				
					jQuery('#d'+Odsentryid).val(enteredDest);
					jQuery('.sc_state_medium'+Odsentryid).html('Valid');	

					senddata.push(Odsentryid+"="+enteredDest);				
			
				});	 
				
				var serialized = senddata.join("&") 
				
				
				var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/updatescenarioviajquery/";
				var ScenarioId = $('#scenario_id').val();
				$('.black_overlay').show();
				
				jQuery.post( TargetURL,{ 'odsdata': serialized, 'scenario_id':ScenarioId}, function( data ) {
									 
					 
					 jQuery(".update_message").html(data);
					 jQuery('#overlay-sucess').addClass('hide');
					 				  
	                 //jQuery(".message").html(data+":record updated susscessfully");
					  jQuery('#updateOdsentry').removeAttr("class");	
					  jQuery('.saveOdsentry').attr("style","display:none");	
			          jQuery(' .trickOdsentry').attr("style","display:inline");
					 
					   jQuery('#savedestinations').removeAttr("class");	
					  jQuery('#updateOdsentry').attr("class"," button-right-disabled");	
	                   jQuery('#savedestinations').removeAttr("onclick");				  
	                				 
					$('.black_overlay').hide();
					$('.cntchk_updatemsg2').hide();
					$('.counter').hide();
					$('.deldest').hide();
				});				
			     //Updated the Scenario status i.e. Complete or Incomplete
				var ScenarioId = $('#scenario_id').val();
				var TargetURL = "<?php echo Configure::read('base_url');?>scenarios/ScenarioCompletedOrNot/scenario_id:"+ScenarioId;
				
				jQuery.post( TargetURL, function( response ) {
					
					//alert(response);
					jQuery('#Status').val(response);
					
				
	                jQuery('#sts').html('ScenarioStatus ' + response);	
					
							 var msgd=response.trim();
							if(msgd=="Complete"){ 
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
				
				jQuery('input[type="checkbox"]:checked').each(function() { 
					jQuery(this).attr("checked", false);				
				});				
			
			jQuery('#success').html('Dest. Number Added Successfully!');
			
			
			setTimeout( function() {     
				$('.fancybox-overlay').trigger('click');
			 },200);
		 }
		 
		 /*else{
		    $('#validate').text('Dest. Number should be only numeric');
		 
		 }
		    }
			else
			{
			$('#validate').text('Dest. Number should not be empty');
			}*/
       });		
	
	
 });
 
 function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#savedestination').attr("class", "showhighlight_buttonleft");
				  jQuery('#updateStation').removeAttr("class");
				  jQuery('#updateStation').attr("class", "button-right-hover");

			  });
			  //called when key is pressed in textbox
    $("#destname").keydown(function(e) {
        
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57) && e.which!=13)
      {
        $('#overlay-error2 .error .message').text("<?php __('digitsOnly') ?>");
        $('#overlay-error2').removeClass('hide');
        return false;
      } else {
          var len = ($(this).val()).length;
            if(len == 0 && e.which !=48)
            {
                e.preventDefault();
                $('#overlay-error2 .error .message').text("<?php __('leadingZeroOds') ?>");
                return false;
            }
            else
          if(e.which!=8 && e.which!=13)
          {
              var len = $(this).val();
              len = len.length;
              if(len >= 15)
              {
                  $('#overlay-error2 .error .message').text("<?php __('max15Chars') ?>");
                  $('#overlay-error2').removeClass('hide');
                  e.preventDefault();
              }
          }
      		//$("input").keydown(function() {
	          inValidate(validation, 'keydown');
	        //});	       
      }
    });
		  }	

</script>
<?php
echo $form->create('Station', array(
                                'action' => 'updateDest',
                                'id' => 'Station',
                                'class' => 'ufForm',
                                'type' => 'POST',
								'invalidate' => 'invalidate'
));
?>

	<div id="content" style="width:500px;height:auto;">
	<div style="height: 55px">
		<div id="overlay-error2" class="notification first hide" style="width: 100%" >
		
			<div class="error">
				<div class="message">
					
				</div>
			</div>
		</div>
	</div>
		
	  <!--<span id="success"></span>-->
	  
	  <h4 style="border-bottom: 1px solid #333; "><?php __('scenarioDestUpdate_titel')?> 
	  	<div class='demonstrations'>
           <div ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="setTimeout( function() {     
					$('.fancybox-overlay').trigger('click');
					 },5); UnTip();">X</a></div>
	        <div >
			<!--<a href="javascript:;"  style="cursor:pointer" onMouseOver="Tip('<b><?php echo __('selectDnsToScenario_helpTitel') ?></b><br/><?php echo __('selectDnsToScenario_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a>-->
			
			
			<a href="javascript:;"  style="cursor:pointer" onMouseOver="Tip('<b><?php echo __('updateDestinationNumber_helpTitel') ?></b><br/><?php echo __('updateDestinationNumber_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a>
			
			</div>		
    		
 		</div>

	  </h4>
	  <h6 id='validate'> </h6>
	  <ul style="width:200px;">	 
	  
	  
	    
			<!--<li><?php echo __('updateDestination_title') ?></li>-->	   
		   <li>

		     <table style="width:450px">
				<tr>
				  <td ><?php echo __('updateDestination_title') ?></td>
				  <td width="145" rowspan="2" valign="top"  style="padding-left: 60px;" ><?php   echo __('updateDestination_blurb') ?></td>
  </tr>
				<tr>
		 			<td > <input   type="text" name="destname" style="width: 130px" id="destname" class="numeric_check destname" tabindex=1 value="" onKeyUp="chngbkcolor(this)";>
		 			</td>
				</tr>
			
			</table>

			</li>			
			 <li style="padding-left: 260px;">
											
			</li>
			
		</ul>
       <div class="button-right-hover" id="updateStation">
					<a  href="javascript:void(0);"  id="savedestination" class="showhighlight_buttonleft"><?php __('save')?></a>
				</div>	
	</div>
	
	<input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id;?>" />
	
			<div class="black_overlay" style="height: 622px; width: 1366px; display: none;">
			<div id="black_overlay_loading">
			<img alt="" src="../../img/assets/ajax-loader.gif">
			</div>
		</div>
		
</form>
		
		 
		
		
		