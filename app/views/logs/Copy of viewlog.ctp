<?php
#-----------------------------------------------------------------#
# $Rev:: 22            $:  Revision of last commit                #
#-----------------------------------------------------------------#
?>
<div class="block top">
				<br />
				<?php echo $form->create('Log',array('action'=>'viewlog','id'=>'filters','type'=>'GET')); 
				#echo $form->input('Log.station_id', array('type'=>'hidden','value'=>$station_id)); ?>
				<div class="cb">
				<div id="" class="table-content">
				    <table class="table-content phonekey">
						<thead> 
							    <tr class="table-top">
								
									<th class="table-column table-left-ohne" style="width:20px;">&nbsp;</th>
									<?php if($userpermission==Configure::read('access_id'))	{?>
									<th  class="table-column" style="width:68px;text-align: left;"><span><?php __("Customer");?></span></th>
									<?php }	?>
									<th  class="table-column"style="width:68px;text-align: left;">
									<?php if($_SESSION['APPNAME']=='Gate'){echo __("Scenario");}else{ echo __("Station");}?></th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("User");?></th>
									<th  class="table-column"style="width:108px;text-align: left;"><?php __("Description");?></th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("Status");?></th>
									
									<th class="table-right-ohne">&nbsp;</th>
							    </tr>
							    <tr>
									<td class="table-column table-left-ohne">&nbsp;</td>
									
									<?php 
									if($userpermission==Configure::read('access_id')){
										echo '<td>';
										echo $form->select('Log.customer_id', $customer,(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:(isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:'')),array('onchange'=>"javascript:submi_form('filters');", 'style'=>'width:100px;'));
										echo '</td>';
									}
									?>
									<td><?php echo $form->input('Log.affected_obj', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:93px;', 'value'=>(isset($this->params['named']['affected_obj'])?$this->params['named']['affected_obj']:(isset($this->params['url']['affected_obj'])?$this->params['url']['affected_obj']:'')))); ?></td>
									<td><?php echo $form->input('Log.user', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:93px;', 'value'=>(isset($this->params['named']['user'])?$this->params['named']['user']:(isset($this->params['url']['user'])?$this->params['url']['user']:'')))); ?></td>
									<td><?php echo $form->input('Log.log_entry', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:93px;', 'value'=>(isset($this->params['named']['log_entry'])?$this->params['named']['log_entry']:(isset($this->params['url']['log_entry'])?$this->params['url']['log_entry']:''))));?></td>
									<td><?php echo $form->select('Log.status', array('1'=>'Success', '0'=>'Failed'),(isset($this->params['named']['status'])?$this->params['named']['status']:(isset($this->params['url']['status'])?$this->params['url']['status']:'')),array('onchange'=>"javascript:submi_form('filters');",'style'=>'width:100px;')); ?></td>
							
									<td class="table-right-ohne">&nbsp;</td>
							    </tr>
						</thead>
				    </table>
				</div>
				<div style="margin:10px;">
					<a class="maintopRelatedContentButton" id="maintopContentButton" onclick="return toggleAdvanceSearch();" href="javascript:void(0)">Advance Filter</a>
					</div>
				
			    	<div id="advancesearch" class="table-content" style="display:none">
				    <table class="table-content phonekey">
						<thead>
							    <tr class="table-top">
									<th class="table-right-ohne">&nbsp;</th>	
									<th class="table-column" style="width:68px;text-align: left;">After Date</th>		
									<th class="table-column" style="width:68px;text-align: left;">Before Date</th>		
									<th class="table-right-ohne">&nbsp;</th>											
							    </tr>
							    <tr>
									<td class="table-column table-left-ohne">&nbsp;</td>
									<td width="300px;">
									<?php echo $form->input('Log.afterdate', array('type'=>'text','readonly'=>'readonly', 'style'=>'margin:4px 0px 5px 22px;', 'label'=>false, 'div'=>false));
									echo $html->image('calendar.gif', array('onclick'=>'advacesearchpop();', 'style'=>'margin:4px 0px 2px 2px;'));
									echo $form->input('Log.aftertime', array('type'=>'text','readonly'=>'readonly', 'style'=>'margin:4px 0px 5px 22px;', 'label'=>false, 'div'=>false));
									?>
									</td>
									<td width="300px;">
									<?php
									echo $form->input('Log.beforedate', array('type'=>'text','readonly'=>'readonly', 'style'=>'margin:4px 0px 5px 22px;', 'label'=>false, 'div'=>false));?>
									<?php echo $html->image('calendar.gif', array('onclick'=>'advacesearchpopforbefore();', 'style'=>'margin:4px 0px 2px 2px;'));
									echo $form->input('Log.beforetime', array('type'=>'text','readonly'=>'readonly', 'style'=>'margin:4px 0px 5px 22px;', 'label'=>false, 'div'=>false));
									?>
									
									</td>
									<th class="table-right-ohne">&nbsp;</th>
							    </tr>
							   
						</thead>
				    </table>
			</div>
			
			<div id="advancedatetime" style="display:none;">
			<div id="error_dt1"></div>
				<div>
				<label for="beforedate">After Date</label>
				<?php
					echo $form->input('Log.afterDatef', array('type'=>'text','class'=>'date-pick','readonly'=>'readonly', 'style'=>'margin:10px 0px 5px 0px;','label'=>false, 'div'=>false));
								
				?>
				</div>
				<div>
				<label for="afterdate">After Time</label>
				<?php
					echo $form->input('Log.aftertimef', array('type'=>'text','class'=>'filter-class timepicker', 'style'=>'margin:10px 0px 10px -2px;', 'readonly'=>'readonly', 'div'=>false,'label'=>false));
				?>
				</div>
				<div style="float:right;margin-top: 20px;margin-right:40px"><a href="javascript:;" onclick="setdateandtime();">Submit</a> </div>
			</div>
			
			<div id="advancedatetimeforbefore" style="display:none;">
			<div id="error_dt2"></div>
				<div>
				<label for="beforedate">Before Date</label>
				<?php
					echo $form->input('Log.BeforeDateb', array('type'=>'text','class'=>'date-pick','readonly'=>'readonly', 'style'=>'margin:10px 0px 5px 0px;','label'=>false, 'div'=>false));
								
				?>
				</div>
				<div>
				<label for="afterdate">Before Time</label>
				<?php
					echo $form->input('Log.timeb', array('type'=>'text','class'=>'filter-class timepicker', 'style'=>'margin:10px 0px 10px -2px;', 'readonly'=>'readonly', 'div'=>false,'label'=>false));
				?>
				</div>
				<div><a href="javascript:void(0)" onclick="setdateandtimebefore();" style="float:right;margin-top: 20px;margin-right:40px;">Submit</a> </div>
			</div>
			<!-- ---------------------------------------------------------------------------------------------- -->
		<div class="block" style="margin: 0px;">
				<div class="button-right">
				<a href="javascript:void(null)"  onclick="javascript:submi_form('filters');" name="data[filter]" value="filter" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __("filter");?></a> 
				</div>
				<div class="button-right">
				<?php echo $html->link( __("Export Csv", true),  array('controller'=> 'logs', 'action'=>'export'),array('onmouseover'=>'hoverButtonRight(this);','onmouseout'=>'javascript:outButtonRight(this);')); ?>
				</div>
				<div class="button-left">
				<?php echo $html->link( __("Reset", true),  array('controller'=> 'logs', 'action'=>'viewlog', 'customer_id:' . $SELECTED_CNN ),array('onmouseover'=>'hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); ?>
				</div>
			</div>
	    <?php
		//check $locations variable exists and is not empty
		if(isset($loginfo) && !empty($loginfo)): ?>
		<div id="" class="table-content">
		<?php echo $this->element('pagination/top'); ?>
	    <table class="phonekey">
	    	
			<thead>
						<tr class="table-top">
							<th class="table-column table-left-ohne" style="width:20px;">&nbsp;</th>
							<th class="table-column table-left-ohne sortlink" style="width:50px;text-align: left;">
								<?php echo $paginator->sort("Customer","customer_id",array('id'=>'sortlink'));?>
							</th>
							<th class="table-column table-left-ohne sortlink" style="width:60px;text-align: left;">
								<?php echo $paginator->sort("BSK","bsk",array('id'=>'sortlink'));?>
							</th>
							<th class="table-column table-left-ohne sortlink" style="width:70px;text-align: left;">
								<?php echo $paginator->sort("Created","created",array('id'=>'sortlink'));?>
							</th>
							<th class="table-column table-left-ohne sortlink" style="width:60px;text-align: left;">
								<?php echo $paginator->sort("User","user",array('id'=>'sortlink'));?>
							</th>
							<th class="table-column table-left-ohne sortlink" style="width:180px;text-align: left;">
								<?php echo $paginator->sort("Description","log_entry",array('id'=>'sortlink'));?>
							</th>
							<th class="table-column table-left-ohne sortlink" style="width:40px;text-align: left;">
								<?php echo $paginator->sort("Status","status",array('id'=>'sortlink'));?>
							</th>
							
							<th></th>
						</tr>
						
			</thead>
		<?php //echo $this->element('pagination/top'); ?>
	        <tbody>
	        	<?php
				// initialise a counter for striping the table
				$count = 0;
	
				// loop through and display format
				foreach($loginfo as $log):
				// stripes the table by adding a class to every other row
				$class = ( ($count % 2) ? " class='altrow'": '' );
				// increment count
				$count++;
				if($userpermission==Configure::read('access_id'))	
				{
				?>
	            	<tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<td class="table-left">&nbsp;</td>
	            	<td> <?php echo $html->link($log['Log']['customer_id'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['customer_id'])) ?></td>
	            	<td> <?php echo $html->link($log['Log']['affected_obj'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['affected_obj'])) ?></td>
	                <td style="width:70px;">
	                <?php 
	                preg_match("/^(.*) (.*)/", $log['Log']['created'], $matches);
					if ($matches[0]) 
					{
	               	 	#$datetime2line = $matches[1] . '<br>' . $matches[2];
	               	 	echo $html->link($matches[1], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['created'])) ;
	               	 	echo $html->link($matches[2], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['created'])) ;
					}
	                else
	                {
	                	echo $html->link($log['Log']['created'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['created'])) ;
	                }
	                ?>
	               </td>
	                <td style="width:50px;">
	                <?php echo $html->link($log['Log']['user'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['user'])) ?>
	           		</td>
	                 <td><a style="cursor:pointer;" href="javascript:void(null);" onclick="javascript:return logview('<?php echo $log['Log']['id']?>');"><?php echo $log['Log']['log_entry']; ?></a></td>
	                 <td><?php echo $html->link(($log['Log']['modification_status'])?'success':'Failed', '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['modification_response'])) ?></td>
	          		 <td class="table-right-ohne">&nbsp;</td>
	           </tr>
	           <?php 
				}
				else
				{
				?>
					<tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<td class="table-left">&nbsp;</td>
	            	<td> <?php echo $log['Log']['affected_obj'];?></td>
	            	<td class="table-content column-width-100" style="width:115px;"> <?php echo $log['Log']['created'];?></td>
	                <td style="width:50px;"><?php echo $log['Log']['created'];?></td>
	                <td><?php echo $log['Log']['log_entry']; ?></td>
	                <td><?php echo $log['Log']['modification_status']?></td>
	          		<td class="table-right-ohne">&nbsp;</td>
					
				<?php
				}
				endforeach;
				?>
	        </tbody>
			</table>
	    <?php echo $this->element('pagination/newpaging');?>
			</div>
		
				<?php
				else:
					__("No modifications in DB");
				endif;
				?>
	 
                
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

<!--INTERNAL USER OPTIONS -->
        <?php if($userpermission==Configure::read('access_id'))
        {?>
                <div class="box info">
                <h3><?php __("Internal User");?></h3>
                <p><?php __("Customer View:");?></p>
                <p><?php echo $selected_customer; ?></p>

                </div>
	<?php } ?>

	</div>
</div>
</div>
<script type="text/javascript">
	function toggleAdvanceSearch(){
		//$("#advancesearch").show
		if(document.getElementById('advancesearch').style.display=='none'){
			document.getElementById('advancesearch').style.display='block';
		}else{
			document.getElementById('advancesearch').style.display='none';
		}

	}
	$(function()
	{
		 $( ".date-pick" ).datepicker({"showOn":"button"});
		 $(".timepicker").timepicker({ampm: true, timeFormat:'hh:mm'});
	});
	
	function advacesearchpop()
	{
		$("#advancedatetime").show();
		//$("#advancedatetimeforbefore").hide();
		$.fn.colorbox({overlayClose:false,opacity:'0.3',inline:true,width:'320px',height:'220px', href:"#advancedatetime",oncloseprocess:""});
		$("#cboxClose").hide();
        return false;
	}
	
	function advacesearchpopforbefore()
	{
		$("#advancedatetimeforbefore").show();
		$("#advancedatetime").hide();
		$.fn.colorbox({overlayClose:false,opacity:'0.3',inline:true,width:'320px',height:'250px', href:"#advancedatetimeforbefore",oncloseprocess:""});
		$("#cboxClose").hide();
        return false;
	}
	
	function setdateandtime()
	{
		var afterdate = $("#LogAfterDatef").val();
		var aftertime = $("#LogAftertimef").val();
		if(afterdate==''){
			$("#error_dt1").html('Please select a date!');
		}else{
			$("#LogAfterdate").val(afterdate);
			$("#LogAftertime").val(aftertime);
			$("#cboxOverlay").hide();
			$("#colorbox").hide();
		}
		
	}
	function setdateandtimebefore()
	{
		var beforedate = $("#LogBeforeDateb").val();
		var beforetime = $("#LogTimeb").val();
		if(beforedate==''){
			$("#error_dt2").html('Please select a date!');
		}else{
		
			$("#LogBeforedate").val(beforedate);
			$("#LogBeforetime").val(beforetime);
			$("#cboxOverlay").hide();
			$("#colorbox").hide();
		}
		
	}
	
</script>
<style>
.ui-datepicker-trigger{float: right !important;
    margin-left: 0px;
    margin-right: 43px;
    margin-top:9px;
}
</style>

<!--right hand side  ends here-->

