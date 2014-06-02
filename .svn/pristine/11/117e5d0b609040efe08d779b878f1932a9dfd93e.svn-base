<!--$Rev:: 22            $:  Revision of last commit--> 
<script type="text/javascript">
$.ajaxSetup({ cache: false });
</script>
<h1 style="width: 535px; text-align: left"><?php  __("Script Details")?></h1>
<hr style="width: 535px" >


<div style="color:#888784;padding:10px 10px 10px 10px;height:300px;">
	<div style="height:20px;">&nbsp;</div>
	<?php 
	if(isset($display)){?>
	
		<div class="fl" style="width:100px;"><?php __('_scenarioName') ?></div>
		<div class="fl" style="width:10px;">&nbsp;</div>
		<div class="fl" style="font-weight:bold"><?php echo $display['Name']?></div>	
		<br>
		<!--
		<div class="cb">&nbsp;</div>
		-->
		
		<div class="fl" style="width:100px;"><?php __('Last Modified') ?></div>
		<div class="fl" style="width:10px;">&nbsp;</div>
		
		<div class="fl" style="font-weight:bold"><?php echo  date('d.m.Y H:i:s',strtotime($display['modified']))?></div>
		
		<br>
		<br>
		
		<?php echo $display['Summary']?>
		
		

	<?php }else{
		
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
