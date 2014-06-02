<?php 

echo $javascript->link('/js/jquery.fancybox');

?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>
	<div class="block top">
	<br>
	
	    <?php 
	    echo $form->create('Trunk',array('action'=>'index/'.$customer_id,'id'=>'filters','type'=>'GET'));
	   ?>
	    <div class="cb">
			<div id="" class="table-content">
				    <table class="table-content phonekey dataTable tablesorter" >
						<thead>
							    <tr class="table-top">
									<th class="table-column table-left-ohne" style="width:20px;">&nbsp;</th>
									<th  class="table-column"style="width:152px;text-align: left;"><?php __("trunkName");?></th>
									<th  class="table-column"style="width:102px;text-align: left;"><?php __("location");?></th>
									<th  class="table-column  "style="width:64px;text-align: left;" data-placeholder="Gate Type"><?php __("gateType");?></th>
									<th  class="table-column"style="width:102px;text-align: left;"><?php __("pbxType");?></th>
									<th  class="table-column"style="width:72px;text-align: left;"><?php __("trunkRemark");?></th>
									<th class="table-right-ohne">&nbsp;</th>
							    </tr>
							    <tr>
									<td class="table-column table-left-ohne">&nbsp;</td>
									<td><?php echo $form->input('name', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:140px;', 'value'=>(isset($this->params['named']['name'])?$this->params['named']['name']:(isset($this->params['url']['name'])?$this->params['url']['name']:'')))); ?></td>
									<td><?php echo $form->input('location_name', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:87px;', 'value'=>(isset($this->params['named']['location_name'])?$this->params['named']['location_name']:(isset($this->params['url']['location_name'])?$this->params['url']['location_name']:'')))); ?></td>
									<td><?php echo $form->select('gate_type',$gate_type_list,(isset($this->params['named']['gate_type'])?$this->params['named']['gate_type']:(isset($this->params['url']['gate_type'])?$this->params['url']['gate_type']:'')),array('style'=>'width:46px;')); ?></td>
									<td><?php echo $form->input('pbx_type', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:88px;', 'value'=>(isset($this->params['named']['pbx_type'])?$this->params['named']['pbx_type']:(isset($this->params['url']['pbx_type'])?$this->params['url']['pbx_type']:'')))); ?></td>
									<td><?php echo $form->input('remark', array('label' => false, 'type'=>'text','class' => 'filter-class onclick','style'=>'width:60px;', 'value'=>(isset($this->params['named']['remark'])?$this->params['named']['remark']:(isset($this->params['url']['remark'])?$this->params['url']['remark']:'')))); ?></td>
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
					<?php echo $html->link( __("reset", true),  array('controller'=> 'trunks', 'action'=>'index', 'customer_id:'.$customer_id),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); ?>
                </div>
				
            </div>
	
	    <?php	
		
		// check $locations variable exists and is not empty
		if(isset($trunks) && !empty($trunks)) :
		?>
		<!--Showing Page <?php //echo $paginator->counter(); ?>-->  
		
		<?php echo $this->element('pagination/top'); ?>
	    <div id="" class="table-content">
		<table class="phonekey">
	    	<?php
			  //echo $this->element('pagination/newpaging');
			?>
	    	<thead>
	        	<tr class="table-top">
					<th class="table-left-ohne" style="width:20px;">&nbsp;</th>  
					<th class="table-column <?php if(in_array('sort:name',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:name',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:152px;text-align: left;"><?php echo $paginator->sort(__("trunkName",true), 'name', $filter_options);?></th>
					<th class="table-column <?php if(in_array('sort:location_id',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:location_id',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:102px;text-align: left;"><?php echo $paginator->sort(__("location",true), 'location_id', $filter_options);?></th>
					<th class="table-column <?php if(in_array('sort:gate_type',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:gate_type',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:64px;text-align: left;"><?php echo $paginator->sort(__("gateType",true), 'gate_type', $filter_options);?></th>
					<th class="table-column <?php if(in_array('sort:pbx_type',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:pbx_type',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:102px;text-align: left;"><?php echo $paginator->sort(__("pbxType",true), 'pbx_type', $filter_options);?></th>
					<th class="table-column <?php if(in_array('sort:remark',$filter_sort) && in_array('direction:asc',$filter_sort)) echo  'sortlink_asc';elseif((in_array('sort:remark',$filter_sort) && in_array('direction:desc',$filter_sort))) echo 'sortlink_desc';else echo 'sortlink';?> "style="width:72px;text-align: left;"><?php echo $paginator->sort(__("trunkRemark",true), 'remark', $filter_options);?></th>
					<th  class="table-right-ohne"></th>
	            </tr>
	        </thead>
		<?php //echo $this->element('pagination/top'); ?>
	        <tbody>
	        	<?php
				// initialise a counter for striping the table
				$count = 0;
	
				// loop through and display format
				foreach($trunks as $trunk):
					// stripes the table by adding a class to every other row
					$class = ( ($count % 2) ? " class='altrow'": '' );
					// increment count
					$count++;
				?>
	              <tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<td class="table-left">&nbsp;</td>		
	            	   <td> 
						    <?php 
							    echo $html->link( __($trunk['Trunk']['name'], true),array('controller'=>'trunks', 'action'=>'edit/trunk_id:'.$trunk['Trunk']['id'])); 
	            			?>
	            			</td>
	            			<td> 
						    <?php 
	            			  echo $trunk['Location']['name']; 
	            			?>
	            			</td>
							<td>
							<?php 
	            			  echo $trunk['Trunk']['gate_type']; 
	            			?>
					      </td>
	                		<td>
							<?php 
							  echo $trunk['Trunk']['pbx_type']; 
							?>
	                		</td>
                           
	                		<?php if ($trunk['Trunk']['remark'] != '')
	                		{
	                		
	                		?><td class="sublist-align wid-217px tooltip">
							<div>
								<div class="fl"><span style="cursor:default" ><?php echo substr($trunk['Trunk']['remark'], 0, 10) . '...' ?></span>
								<p><?php echo $trunk['Trunk']['remark']?></p>
								</div>
							</div>
						</td>
						<?php 
	                		}
	                		else
	                		{
	                		echo '<td></td>';
	                		}?>
							
					 <td class="table-right-ohne" style="background: url(<?php echo $this->webroot; ?>/images/assets/icons/9px/198_angleright_06_cmyk.gif) no-repeat 3px 5px;border-style: none;"   onmouseover="this.className='table-right-over';" onmouseout="this.className='table-right';">
                        <div class="table-menu">
                          <div class="table-menu-popup" style="z-index: 1; display: none;">
                            <ul>
                            <li class="last log">
                              <?php echo $html->link( __('Edit', true),array('controller'=>'trunks', 'action'=>'edit/trunk_id:'.$trunk['Trunk']['id'])); 
	           			?>
                            </li>
                            </ul>
                          </div>
                        </div>
							
							
							
							
							
							
							
								                		
	            			<?php
	    
	            		endforeach; ?>
	            	</tr>
	        		</tbody>

	    </table>
	    <?php echo $form->end(); ?>
	<?php echo $this->element('pagination/bottom'); ?>
	</div>
	    </div>
	   
	    <?php
		else:
			__("No Dns available in DB");
			echo '</div>';
		endif;
		?>
	 
                <div class="button-left">
                	<?php if($userpermission==Configure::read('access_id'))
                	{
						#echo $html->link(__('Back', true),  array('controller'=> 'trunks', 'action'=>'index'),array('onmouseover'=>'javascript:hoverButtonLeft(this);','onmouseout'=>'javascript:outButtonLeft(this);')); 
	
                        	#echo $html->link('back',  array('controller'=> 'stations', 'action'=>'edit', $station_number));
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
        <div class="box">
        	 <h3><?php __('trunkList') ?></h3>
                 <p>
                  <?php __('trunkList_blurb') ?>
                 </p>
			<div id="shortcont">
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('fullcont')"  title=""><?php echo __('moreStart') ?></a>             
            </div>
            <div style="display:none;" id="fullcont_type"  >
               <p  ><?php echo __('trunkList_helpText') ?></p>
               <a href="javascript:;" style="cursor:pointer" onclick="set_visi('shortcont')"  title=""><?php echo __('moreEnd') ?></a>      
			</div>	 
        </div>

<!--INTERNAL USER OPTIONS -->
        <?php if($userpermission==Configure::read('access_id'))
        {?>
                <div class="box info">
                <h3><?php __("Internal User");?></h3>
                <p><?php __("Customer View:");?><?php echo $SELECTED_CNN; ?></p>
                <p><?php echo $selected_customer; ?></p>

                </div>
	<?php } ?>

		</div>
<!--ight hand side  ends here-->

