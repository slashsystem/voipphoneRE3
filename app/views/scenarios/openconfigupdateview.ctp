
<script>
jQuery(function() { 
		
		setTimeout("jQuery('#destname').focus();", 500);
	    jQuery("#savedestination").click(function () {
		
			
			validation = {
	    	    // Specify the validation rules
	    	    'rules': {                     
	    	      
	    	        'destname':{
	    	            'min': '3',
	    	            'max': '15',
	    	            'excludeStr': ['084', '0800', '090', '870', '87078', '8703', '87077','87039', '8706', '87060', '87076', '39310', '88228', '8822830', '88238', '881', '88234', '0088(12)/(13)', '0088(18)/(19)', '88241', '0088(16)/(17)', '88232', '88298', '88233', '88242', '883120', '88216', '8835100', '882']
	    	        }  
	                                  
	    	    },                  
	    	    // Specify the validation error messages
	    	    'messages': {  
	    	        
	    	         'destname': {
	    	             'min': "<?php __('min3Chars')?>",
	    	             'max': "<?php __('max15Chars')?>",
	    	             'excludeStr' : "<?php __('excludeNumber')?>"
	    	         }
	    	    },
	    	  };


			
			/*var destval=$('#destname').val();
			if(destval!='')
			{
			if($.isNumeric(destval))
			{*/
			var senddata = []; 
			 $('#checkAll').removeAttr('checked');
			jQuery('input[type="checkbox"]:checked').each(function() { 
			
			  
				//var enteredDest = jQuery('#destname').val();
				var selectedConfig = jQuery('#config').val();
				var Odsentryid = jQuery(this).val();
				jQuery(this).removeAttr('checked');
			
				//jQuery('#d'+Odsentryid).val(selectedConfig);
				jQuery('.sc_state_medium'+Odsentryid).html(selectedConfig);	

				senddata.push(Odsentryid+"="+selectedConfig);				
		
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
       );		
	
	
 });
 
 function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#savedestination').attr("class", "showhighlight_buttonleft");
				  jQuery('#updateStation').removeAttr("class");
				  jQuery('#updateStation').attr("class", "button-right-hover");

			  });
			  //called when key is pressed in textbox
    $("input.numeric_check").keypress(function(e) {	
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57) && e.which!=13)
      {        
        $('#overlay-error2 .error .message').text("<?php __('digitsOnly') ?>");
        $('#overlay-error2').removeClass('hide');
        return false;
      } else {	      	
      		//$("input").keydown(function() {
	          inValidate(validation, 'keyup');                    
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
<div id="overlay-error2" class="notification first hide" style="width: 100%" >
		
			<div class="error">
				<div class="message">
					
				</div>
			</div>
		</div>
	<div id="content" style="width:500px;height:200px;">
	  <!--<span id="success"></span>-->
	  
	  <h4 style="border-bottom: 1px solid #333; ">Update Dest. Number for Selected ODS Entries : 
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
	  <ul style="width:120px;">	 
	  

			
						<li><?php __('selectConfigType')?></li>	   
		   <li>

		     <table style="width:450px">
			  <tr>
			 <td> 
			 		<?php 
			 			$oflocOptions = array('OFLOC' => 'OFLOC', 'OFLOC2' => 'OFLOC2');
			 			echo $form->select('phone_type', $oflocOptions,1,array('label'=>false, 'style'=>'width:100px;','id'=>'config')); ?>
						
			  </td>
			  <td  style="padding-left: 60px;" ><?php   echo __('updateOfloc_blurb') ?></td>
			  </tr>
			  </table>

			</li>			
			 <li style="padding-left: 260px;">
											
			</li>
		
		</ul>
       <div class="button-right-hover" id="updateStation">
					<a  href="javascript:void(0);" id="savedestination" class="showhighlight_buttonleft"><?php __('save')?></a>
				</div>	
	</div>
	
	<input type="hidden" name="scenario_id" id="scenario_id" value="<?php echo $scenario_id;?>" />
	
			<div class="black_overlay" style="height: 622px; width: 1366px; display: none;">
			<div id="black_overlay_loading">
			<img alt="" src="../../img/assets/ajax-loader.gif">
			</div>
		</div>
		
</form>
		
		 
		
		
		