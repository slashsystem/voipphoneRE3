<!--$Rev:: 22            $:  Revision of last commit--> 

<div style="color:#888784;padding:10px 10px 10px 10px;height:300px;">

<h4><?php echo __('logDetails') .'&nbsp;'. $display['id']; ?>
		
		 <div class='demonstrations'>
           <div  ><a href="javascript:;"  style="cursor:pointer;" onMouseOver="Tip('<?php echo __('close_window') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" onclick=" setTimeout( function() {     
					$('.fancybox-overlay').trigger('click');
					 },5); UnTip();">X</a></div>
	        <div ><a href="javascript:;"  style="cursor:pointer" onclick="Tip('<b><?php echo __('logDetailsForm_helpTitel') ?></b><br/><?php echo __('logDetailsForm_helpText') ?>', BALLOON, true, ABOVE, false)" onMouseOut="UnTip()" >?</a></div>		
    		
 		</div>
		
		 </h4>

	
	<h5><?php echo __('UI Request')?></h5>
	<?php 
	if(isset($display)){?>
	 <div class="form-body">
            <div class="form-box">
                 <div class="form-left">
                 <?php
                 echo '<div style="width:100px; float: left">' . __('User', true) . '</div>';
                 echo $form->input('User', array('label' => false, 'type' => 'text', 'value' => $display['user'], 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));

                 ?>
                </div>

                <div class="form-right">
                 <?php
          
                 echo '<div style="width:100px; float: left">' . __('status', true) . '</div>';
                 echo $form->input('status', array('label' => false, 'type' => 'text', 'value' => $display['modification_status']?'Success':'Failed', 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));

                 ?>	

                 </div>
                 <div class="form-left">
                 <?php
                 echo '<div style="width:100px; float: left">' . __('affectedObj', true) . '</div>';
                 echo $form->input('affectedObj', array('label' => false, 'type' => 'text', 'value' => $display['affected_obj'], 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));
                  
                 
                 ?>
                </div>

                
                  <div class="form-right">
                 <?php
                 echo '<div style="width:100px; float: left">' . __('date', true) . '</div>';
                 echo $form->input('Location.name', array('label' => false, 'type' => 'text', 'value' => date('d.m.Y H:i:s',strtotime($display['created'])), 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));
                                 
                 ?>
                </div>
                <div class="form-left">
                 <?php
                 echo '<div style="width:100px; float: left">' . __('affectedObjName', true) . '</div>';
                 echo $form->input('affectedObj', array('label' => false, 'type' => 'text', 'value' => $display['affected_obj_name'], 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));
                  
                 
                 ?>
                </div>
                <div class="form-left">
                 <?php
                 echo '<div style="width:100px; float: left">' . __('affectedObjType', true) . '</div>';
                 echo $form->input('affectedObj', array('label' => false, 'type' => 'text', 'value' => $display['affected_obj_type'], 'style' => 'width:100px;', 'onkeyup' => "chngbkcolor(this);", 'readonly' => 'true'));
                  
                 
                 ?>
                </div>

                
            </div>
            <h6><?php echo __('Request')?></h6>
                                 <p><?php 
                 #$transdetails = preg_replace("/<algRequest/", "<br><algRequest", $transaction['transaction']);
                	#$printable = preg_replace("/>\s*</", ">\n<", $display['log_entry']); 
                	#echo htmlspecialchars($printable);
                	#echo htmlspecialchars($display['log_entry']);
                	#echo $display['log_entry'];
                	
                     if(substr($display['log_entry'], 0, 9) == '<actions>')
                     {     
                      	      
                 		   $element = simplexml_load_string($display['log_entry']);
		                	#$element->asXML($display['log_entry']);
		                	#echo $element;
		                	
		                	foreach ($element->key as  $a)
		                	{
		                		#$action = $keyElement
		                		echo $a . ' => ';
		                			$atts = $a->attributes();
		
		                			echo ' Key ' . $atts['id'];
		                			echo ' Feature ' . $atts['featureId'];
		                			echo '<br>';
		                	}
                      }
                      else
                      {
                      	echo $display['log_entry'];
                      }
                	#foreach ($element->Activations->actions as  $node)
                	#{
                	#	echo "TEST";
                	#$action = $keyElement
                	#	$atts = $node->attributes();
                	#	echo $node;
                	#	echo $atts['id'];
                	#	echo $atts['featureId'];
                	#}
                	
                	
                 #echo $display['log_entry'];
                 #echo $transdetails?></p>
                 
                 
             
          <h5><?php echo __('Transaction') . ':' . $transaction['id']?></h5>
          <?php 
          
          
          #echo htmlspecialchars($transaction['transaction']); 
          
          $element = simplexml_load_string($transaction['transaction']);
          
          #echo $element->asXML();
          #$element->asXML($display['log_entry']);
          #echo $element;
           
          #For Full Transactions.
            
           foreach ($element->subtransaction as  $sub)
          {
          #$action = $keyElement

          	$subatts = $sub->attributes();
          
          	#echo $subatts['id'];
          	#echo ' => ';
          	$objatts = $sub->algRequest->object->attributes();
          	echo $objatts['action'] . ' '  . $objatts['name'] ;
          	echo $sub->algRequest->object->message->attributes('station');
          	$msgatts = $sub->algRequest->object->message->attributes();
          	echo ' 	[' . $msgatts['station'];
          	echo ' (' . $msgatts['key'] . ')] : Vars: ';
          	foreach ($sub->algRequest->object->message->var as  $vars)
          	{
          		$varatts = $vars->attributes();
          		echo $varatts['name'] . '=' . $varatts['value'] . ';';
          	}
          	echo '<br>';
          }
          
          
          ?>
          <h5><?php echo __('Response')?></h5>
          <br>
          <h6><?php echo __('Details')?></h6>
          <p>
          
                    <?php 

          
          $element = simplexml_load_string($display['modification_response']);
          print_r($element);
   
           foreach ($element->success as  $sub)
          {


          	$subatts = $sub->attributes();
          
          	#echo $subatts['id'];
          	#echo ' => ';
          	$objatts = $sub->object->attributes();
          	echo $objatts['action'] . ' '  . $objatts['name'] ;
          	echo $sub->algRequest->object->message->attributes('station');
          	$msgatts = $sub->algRequest->object->message->attributes();
          	echo ' 	[' . $msgatts['station'];
          	echo ' (' . $msgatts['key'] . ')] : Vars: ';
          	foreach ($sub->algRequest->object->message->var as  $vars)
          	{
          		$varatts = $vars->attributes();
          		echo $varatts['name'] . '=' . $varatts['value'] . ';';
          	}
          	echo '<br>';
          }
          	foreach ($element->error as  $sub)
          	{
          	
          	
          		$subatts = $sub->attributes();
          	
          		#echo $subatts['id'];
          		#echo ' => ';
          		$objatts = $sub->object->attributes();
          		echo $objatts['action'] . ' '  . $objatts['name'] ;
          		echo $sub->algRequest->object->message->attributes('station');
          		$msgatts = $sub->algRequest->object->message->attributes();
          		echo ' 	[' . $msgatts['station'];
          		echo ' (' . $msgatts['key'] . ')] : Vars: ';
          		foreach ($sub->algRequest->object->message->var as  $vars)
          		{
          		$varatts = $vars->attributes();
          		echo $varatts['name'] . '=' . $varatts['value'] . ';';
          	}
          	
          	
          	echo '<br>';
          }
          
          
          ?>
          <?php echo htmlspecialchars($display['modification_response'])?>
 		</p>
          </div>

	<?php	
	 
	}else{
		
		echo "Sorry not available";
		
	}?>
	<!--	
	<div class="block">
		<div class="button-right">
			<a href="javascript:void(null);"  onclick="javascript:return validate_cancel();" name="validate" value="validate" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)">Cancel</a>
		</div>
	</div>
	-->
	
	
	
</div>
