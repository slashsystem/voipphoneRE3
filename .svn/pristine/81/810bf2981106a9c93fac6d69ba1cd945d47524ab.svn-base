<?php 

echo $javascript->link('/js/jquery.fancybox');
?>
	
<script type="text/javascript">
	$(document).ready(function () {    
    $("#secondfancybox").fancybox({
        helpers: {
            overlay: null        
        },
        'afterClose': function() { 
            $(".fancybox").fancybox().trigger("click");
        }
    });
});
	
	
</script>
<script>
jQuery(function() { 
 jQuery('.status'+<?php echo $dns_id; ?>).html('Edited');	  
 });	
 
  function setlocation(){
  		  
	   var SelectedLocation = $('select.location_drp option:selected').val();
	   var SelectedCaption = $('select.location_drp option:selected').text();
	   var customer_id_data = $('#cust_id').val();
	   		if(SelectedLocation!=""){
			
			$('.black_overlay').css('display', 'block');	
			$.fancybox.showLoading()  ;		
			 var TargetURL = "<?php echo Configure::read('base_url');?>locations/update_location/dns_id:<?php echo $dns_id;?>"+"/location_id:"+SelectedLocation+"/customer_id:"+customer_id_data+"/hitdirect:1"+"/loc_id:<?php echo $loc_id; ?>";
			 
			   jQuery.post( TargetURL, function(response) {	
							  
						// $('#ajax_load').html(response);			 
						   $('#loc'+<?php echo $dns_id;?>).html(SelectedCaption);
						  // var msg = $(response).find('input[type=hidden]:first').val();
						  // var status = msg.split(',');
						 //  if(status[0]>0){
						   //	 $('#smsg').html('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="ok"><div class="message">'+status[1]+'</div></div></div>');
						//   }
						//  else{
						   //	$('#smsg').html('<div class="notification first" style="width: 534px; margin-left:10px; margin-top:10px;"><div class="error"><div class="message">'+status[1]+'</div></div></div>');
						 //  }
						   
					  window.location.reload();	
						});
			 
		  // setTimeout( function() {     
			//$('.fancybox-overlay').trigger('click');
		// },200);
		
		 }
		 else {
		 	//alert('Please Select Location');
			$('#overlay-error3 .error .message').text("<?php __('Please Select Location') ?>");
		    $('#overlay-error3').removeClass('hide');
		 }		   

   } 
   
   function chngbkcolor(obj) {
			  $(document).ready(function() {
				  jQuery('#buttonlocation').attr("class", "showhighlight_buttonleft");
				 // jQuery('#updatelocation').removeAttr("class");
				  jQuery('#updatelocation').attr("class", "button-right-hover");

			  });
		  }
 
</script>
<style>
	#black_overlay_loading {
    left: 150px!important;
    position: absolute !important;
    top: 50px!important;
    z-index: 1002;
}
</style>
	 
	<div class="black_overlay" >
        <!--<div id="black_overlay_loading" >
            <img alt="" src="<?php echo Configure::read('base_url');?>img/assets/ajax-loader.gif">
        </div>-->
    </div>	
	<div id="overlay-error3" class="notification first hide" style="width: 100%" >
	    <div class="error">
	        <div class="message">  </div>
	    </div>
    </div>
	<div id="content" class="cb" style="height: 160px;">
		
	
	  <!--<span id="success"></span>-->	  
	  <h4 ><?php __('Update Location for DN')?>  <?php echo $dns_id; ?> 
	  
	  	<div class='demonstrations'>
           <div ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick="setTimeout( function() { 	$('.fancybox-overlay').trigger('click'); },5); UnTip();">X</a></div>
	        <div ><a href="javascript:;"  style="cursor:pointer" onMouseOver="Tip('<b><?php echo __('selectLocation_helpTitel') ?></b><br/><?php echo __('selectLocation_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>		
    		
 		</div>
	  
	  </h4>
	 
	  <div class="form-box">
		<div class="form-left">
			<?php 
						echo '<div class="form-label">';
						echo __('SelectLocation');
						echo '</div>';
						$default = __('Please Select Location',true);
						echo $form->input('d'.$res['Dns']['id'], array('label' => false,'class'=>'location_drp','type'=>'select','onchange'=>'chngbkcolor(this)', 'options'=>array($locations),'empty' => $default));	
					
			?>
		          <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $customer_id ?>" />
				  
				  <?php 
				  #echo $html->link(__('Change Location', true),array('controller'=>'features', 'action'=>'edit/dn_id:'. $dns_id . '&featureType=DN_INDIVIDUAL'), array('class' => 'fancybox fancybox.ajax','id'=>'secondfancybox'));
				  
				   ?>
	      <!-- <a href="javascript:;" onclick='window.open("<?php echo Configure::read('base_url');?>locations/create_location/customer_id:<?php echo $customer_id .  '/dns_id:' . $dns_id . '/location_id:' . $location_id . '/loc_id:' . $location_id ?>","MsgWindow","width=200,height=100");'  id="secondfancybox">Second Fancy Box</a>-->
        </div>
			
		<div class="form-right" >
		
			<p><?php echo __('selectLocation_blurb')?></p>
		</div>
	 
		
     </div>
	
	 <div class="form-right">
		 <div class="button-right" id="updatelocation">
			<a id="buttonlocation" href="javascript:;" onclick="setlocation();" name="submitForm" value="submitForm" ><?php __("apply");?></a>		
     	 </div>  
        </div>	
	</div>
 
	