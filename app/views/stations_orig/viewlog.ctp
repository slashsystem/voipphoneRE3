<?php

#-----------------------------------------------------------------#
# $Rev:: 22            $:  Revision of last commit                #
#-----------------------------------------------------------------#

?>
	<div class="block top">
				<br />
				<?php 
				echo $form->create('Log',array('action'=>'viewlog','id'=>'filters','type'=>'GET')); 
				#echo $form->input('Log.station_id', array('type'=>'hidden','value'=>$station_id)); ?>
				<div class="cb">
				<div id="" class="table-content">
				    <table class="table-content phonekey">
						<thead>
							    <tr class="table-top">
									<th class="table-column table-left-ohne" style="width:20px;">&nbsp;</th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("Customer");?></th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("Station");?></th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("User");?></th>
									<th  class="table-column"style="width:108px;text-align: left;"><?php __("Description");?></th>
									<th  class="table-column"style="width:68px;text-align: left;"><?php __("Status");?></th>
									
									<th class="table-right-ohne">&nbsp;</th>
							    </tr>
						
							    <tr>
									<td class="table-column table-left-ohne">&nbsp;</td>
									<td><?php echo $form->input('Log.customer_id', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:62px;', 'value'=>(isset($this->params['named']['customer_id'])?$this->params['named']['customer_id']:(isset($this->params['url']['customer_id'])?$this->params['url']['customer_id']:'')))); ?></td>
									<td><?php echo $form->input('Log.station_id', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:62px;', 'value'=>(isset($this->params['named']['station_id'])?$this->params['named']['station_id']:(isset($this->params['url']['station_id'])?$this->params['url']['station_id']:'')))); ?></td>
									<td><?php echo $form->input('Log.user', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:62px;', 'value'=>(isset($this->params['named']['user'])?$this->params['named']['user']:(isset($this->params['url']['user'])?$this->params['url']['user']:'')))); ?></td>
									<td><?php echo $form->input('Log.log_entry', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:102px;', 'value'=>(isset($this->params['named']['log_entry'])?$this->params['named']['log_entry']:(isset($this->params['url']['log_entry'])?$this->params['url']['log_entry']:'')))); ?></td>
									<td><?php echo $form->select('Log.status', array('1'=>'Success', '0'=>'Failed'),(isset($this->params['named']['status'])?$this->params['named']['status']:(isset($this->params['url']['status'])?$this->params['url']['status']:'')),array('onchange'=>"javascript:submi_form('filters');")); ?></td>
									
									<td class="table-right-ohne">&nbsp;</td>
							    </tr>
						</thead>
				    </table>
			</div>
			
			<div class="block" style="margin: 0px;">
				<div class="button-right">
					<a href="javascript:void(null)"  onclick="javascript:submi_form('filters');" name="data[filter]" value="filter" onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)"><?php __("filter");?></a>
				</div>
				
				
				<div class="button-left">
					<a href="javascript:void(null)"  onclick="javascript:submi_reset('dns');" name="data[reset]" value="reset" onmouseover="hoverButtonLeft(this)" onmouseout="outButtonLeft(this)"><?php __("reset");?></a>
				</div>
				
                        </div>
	    <?php
	
		
		// check $locations variable exists and is not empty
		if(isset($loginfo) && !empty($loginfo)) :
		?>
		<!--Showing Page <?php //echo $paginator->counter(); ?>-->  
		
		<?php //echo $this->element('pagination/top'); ?>
		<div id="" class="table-content">
	    <table class="phonekey">
	    	<?php
echo $this->element('pagination/newpaging');
?>
	    	<thead>
	        	<tr class="table-top">
	        		<th class="table-column table-left-ohne">&nbsp;</th>
	            	<th class="table-column"><span><?php echo $paginator->sort("Station","station_id"); /*__("id")*/?></span></th>
	                <th class="table-column"><span><?php echo $paginator->sort("Date","date");//__("date") ?></span></th>
	                <th class="table-column"><span><?php echo $paginator->sort("User","user");//__("user")?></span></th>
	                <th class="table-column"><span><?php echo $paginator->sort("Description","description");//__("description")?></span></th>
	                <th class="table-column"><span><?php echo $paginator->sort("Status","status");//__("status")?></span></th>
	                 <th class="table-right-ohne">&nbsp;</th>
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
				?>
	            <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<td class="table-left">&nbsp;</td>
	            	<td> <?php echo $html->link($log['Log']['station_id'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['station_id'].'\');','title'=>$log['Log']['station_id'])) ?></td>
	                <td class="table-content column-width-100" style="width:115px;">
	                <?php echo $html->link($log['Log']['created'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['created'])) ?>
	               </td>
	                <td style="width:50px;">
	                <?php echo $html->link($log['Log']['user'], '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['user'])) ?>
	           		</td>
	                 <td><a style="cursor:pointer;" href="javascript:void(null);" onclick="javascript:return logview('<?php echo $log['Log']['id']?>');"><?php echo $log['Log']['log_entry']; ?></a></td>
	                 <td><?php echo $html->link(($log['Log']['modification_status'])?'success':'Failed', '',array('onclick'=>'javascript:return logview(\''.$log['Log']['id'].'\');','title'=>$log['Log']['modification_response'])) ?></td>
	          		 <td class="table-right-ohne">&nbsp;</td>
	           </tr>
	            <?php endforeach; ?>
	        </tbody>

	    </table>
	    <?php
echo $this->element('pagination/newpaging');
?>
	    </div>
				</div>
	    <?php
		else:
			__("No modifications in DB");
		endif;
		?>
	 
                <div class="button-left">
                	<?php if($userpermission==Configure::read('access_id'))
                	{
						echo $html->link(__('Back', true),  array('controller'=> 'stations', 'action'=>'edit',$station_id),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); 
	
                        	#echo $html->link('back',  array('controller'=> 'stations', 'action'=>'edit', $station_id));
                	}
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
<!--ight hand side  ends here-->

