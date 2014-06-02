

<?php 

//echo $javascript->link('/js/jquery-1.10.1.min');
echo $javascript->link('/js/jquery.fancybox');
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
</script>

<!--  SCM additional style -->
<link rel="stylesheet" type="text/css" href="https://extranet-acc.swisscom.ch/portal/css/portal.css" media="screen" />

<link rel="stylesheet" href="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.css" type="text/css"/>
<script type="text/javascript" src="//google-code-prettify.googlecode.com/svn/trunk/src/prettify.js"></script>



<script type="text/javascript"> 
    $(document).ready(function() { //alert("ret");
	        
	
	
        $('#dragdroptbl').tableDnD({ 
            onDragStart: function(table, row) { 
                //$(table).parent().find('.result').text('');
            }, 
             onDrop: function(table, row) { //alert("ssd");
                $('#AjaxResult').load(base_url+"groups/edit?"+$.tableDnD.serialize());
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
		
	});
	function submitForm(){
		$('.filtersForm').attr('action',base_url+'groups/group_change/');
		$('.filtersForm').attr('method','POST');
		$.ajax({
				type: "POST",
				async : false,
				dataType: 'json',
				url: $('.filtersForm').attr('action'),
				data: $('.filtersForm').serialize(),
				success: function(data){ 
					// do nothing
				}
		});
	}
	function reloadme(){
		location.reload();
	}
</script>


<!--  -->

<style>
.call-to-action{
	
	background: url("images/assets/bg-actionbox.gif") repeat-x scroll 0 0 #E6E6E6;
    margin-bottom: 0;
    margin-top: 0;
    padding-bottom: 0;
    padding-top: 11px;
}
</style>

<div class="block-eservices top">


<?php if($userpermission==Configure::read('access_id'))	{ ?>


<h4><?php __("Cockpit Info");?></h4>

<div>
	<h3><?php echo __('News & Warnings',true); ?></h3>
	<?php echo __('NewsInfo',true); ?>
</div>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
      <div class="call-to-action">    
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png"  />
	</td>
	<td class="doku-right">
		<h3><?php echo $html->link(__('DN List', true), array('controller'=>'dns', 'action'=>'viewdns',"customer_id:$SELECTED_CNN"), array('class'=> $selected['DN'])); ?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('DNListInfo',true); ?></td>
	  </tr>
	</table>
	</div>
    </div>
    <div  class="eservice-row-top-right ">
     
    <div class="call-to-action">    
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		<h3><?php echo $html->link(__('Location List', true), array('controller'=>'locations', 'action'=>'index',$SELECTED_CNN), array('class'=> $selected['Location']));?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('LocationInfo',true); ?></td>
	  </tr>
	</table>
	</div>
  </div>
  </div> 
</div>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
     
      <div class="call-to-action">
     
     <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right" style="margin-top: -10px;">
		<h3 style="vertical-align: top"><?php echo $html->link(__('Scenarios', true), array('controller'=>'scenarios', 'action'=>'index', "customer_id:$SELECTED_CNN"), array('class'=> $selected['Scenario'])); ?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('ScenariosInfo',true); ?></td>
	  </tr>
	</table>
	</div>
    </div>
    <div class="eservice-row-top-right">
     
      <div class="call-to-action">
     
       <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		<h3><?php echo $html->link(__('Stations', true), array('controller'=>'stations', 'action'=>'index',$SELECTED_CNN), array('class'=> $selected['Station']));?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('StationsInfo',true); ?></td>
	  </tr>
	</table>
	</div>
  </div>

  </div>
  
</div>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
     
      <div class="call-to-action">
     
       <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		<h3><?php echo $html->link(__('Trunk', true), array('controller'=>'trunks', 'action'=>'index/'.$SELECTED_CNN), array('class'=> $selected['Trunk'])); ?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('TrunkInfo',true); ?></td>
	  </tr>
	</table>
	</div>
    </div>
    <div class="eservice-row-top-right">
    
      <div class="call-to-action">
     
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		 <h3><?php echo $html->link(__('Reports', true), array('controller'=>'customers', 'action'=>'reports'), array('class'=> $selected['Reports']));?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('ReportsInfo',true); ?></td>
	  </tr>
	</table>
	</div>
  </div>

  </div>
  
</div>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
      
      <div class="call-to-action">
     
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		 <h3><?php echo $html->link(__('Mediatrix', true), array('controller'=>'mediatrixes', 'action'=>'index', "customer_id:$SELECTED_CNN"), array('class'=> $selected['Mediatrix'])); ?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('MediatrixInfo',true); ?></td>
	  </tr>
	</table>
	</div>
    </div>
    <div class="eservice-row-top-right">
     
      <div class="call-to-action">
     
     <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<img src="<?php echo Configure::read('base_url');?>images/001_network_08_rgb.png" />
	</td>
	<td class="doku-right">
		 <h3><?php echo $html->link(__('Group List', true), array('controller'=>'groups', 'action'=>'index',"customer_id:$SELECTED_CNN"), array('class'=> $selected['Group']));?></h3>
	</td>
	</tr>
	<tr>
	  
	  <td class="doku-middle">&nbsp;
	    
	    </td>
	  <td class="doku-right"><?php echo __('GroupListInfo',true); ?></td>
	  </tr>
	</table>
	</div>
  </div>

  </div>
  
</div>

<?php } else { ?>



<h4><?php __("Options");?></h4>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
      <h3><a href="/voipphone" ><?php __("GateStatistics");?><br>(<?php __("GStatsDesc");?>)</a></h3>
      <p>
     
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("stations");?></a>
	</td>
	<td class="doku-right">
		<a href="">17232</a>
	</td>
	</tr>
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("Used DNS");?></a>
	</td>
	<td class="doku-right">
		<a href="">999</a>
	</td>
	</tr>
	<tr>
	<td class="doku-middle">
		<a href=""><?php __("Free DNS");?></a>
	</td>
	<td class="doku-right">
		<a href="">888</a>
	</td>
	</tr>
	<tr>	
		<td class="doku-middle">
		<a href=""><?php __("otherStat");?></a>
	</td>
	<td class="doku-right">
		<a href="">676</a>
	</td>
	</tr>
	</table>
	</p>
    </div>
    <div class="eservice-row-top-right">
     <h3><a href="/voipphone" ><?php __("PhoneStatistics");?><br>(<?php __("PStatsDesc");?>)</a></h3>
      <p>
     
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("Scenarios");?></a>
	</td>
	<td class="doku-right">
		<a href="">17232</a>
	</td>
	</tr>
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("PBXDNs");?></a>
	</td>
	<td class="doku-right">
		<a href="">999</a>
	</td>
	</tr>
	
	<tr>	
		<td class="doku-middle">
		<a href=""><?php __("otherStat");?></a>
	</td>
	<td class="doku-right">
		<a href="">676</a>
	</td>
	</tr>
	</table>
	</p>
  </div>
  </div>
  <div class="eservice-row-bottom">
    <div class="eservice-row-bottom-left">
      <div class="button-right">
        <a href="/scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER ?>"  onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)">Starten</a>
      </div>
      <div class="clear-both"></div>
    </div>
    <div class="eservice-row-bottom-right">
      <div class="button-right">
        <a href="/scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER ?>"  onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)">Starten</a>
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
</div>

<div class="eservice-row">
  <div class="eservice-row-top">
    <div class="eservice-row-top-left">
      <h3><a href="/portal/index/alleeservices/voip/voip-phone/form-voip-phone-change.htm" ><?php __("Options");?><br>(<?php __("OptionDesc");?>)</a></h3>
      <ul>
      <li>ODS</li>
      <li>CTI</li>
      <li>MOH</li>
      <li>PPP</li>
      <li>GGG</li>
      </ul>
    </div>
    <div class="eservice-row-top-right">
      <h3><a href="/portal/index/alleeservices/voip/voip-phone/form-voip-phone-gruppe.htm" ><?php __("Usage");?><br>(<?php __("UsagenDesc");?>)</a></h3>
      <p>
     
      <table class="doku">
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("Scenarios Activated");?></a>
	</td>
	<td class="doku-right">
		<a href="">17232</a>
	</td>
	</tr>
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("Station modifications");?></a>
	</td>
	<td class="doku-right">
		<a href="">17232</a>
	</td>
	</tr>
	<tr>
	
	<td class="doku-middle">
		<a href=""><?php __("Logons");?></a>
	</td>
	<td class="doku-right">
		<a href="">999</a>
	</td>
	</tr>
	
	<tr>	
		<td class="doku-middle">
		<a href=""><?php __("otherStat");?></a>
	</td>
	<td class="doku-right">
		<a href="">676</a>
	</td>
	</tr>
	</table>
	</p>
   </div>
  </div>
  <div class="eservice-row-bottom">
    <div class="eservice-row-bottom-left">
      <div class="button-right">
        <a href="/scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER ?>"  onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)">Starten</a>
      </div>
      <div class="clear-both"></div>
    </div>
    <div class="eservice-row-bottom-right">
      <div class="button-right">
        <a href="/scenarios/index/customer_id:<?php echo $SELECTED_CUSTOMER ?>"  onmouseover="hoverButtonRight(this)" onmouseout="outButtonRight(this)">Starten</a>
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
</div>

<?php } ?>
<h4><?php __("Recent Activity");?></h4>

<p>Table showing last 5 records from <?php echo $html->link(__('activitLog', true),  array('controller'=> 'logs', 'action'=>'viewlog', 'customer_id:'.$SELECTED_CUSTOMER_NAME));?> </p>
 				


	<table class="table-content phonekey">
		
		
	    	
			<thead>
						<tr class="table-top">
							<th class="table-column"> <?php echo __('affected_obj');?></th>
							<th class="table-column"> <?php echo __('Created');?></th>
							<th class="table-column"> <?php echo __('User');?></th>
							<th class="table-column"> <?php echo __('log_entry');?></th>
							<th class="table-column"> <?php echo __('status');?></th>
							
						</tr>
						
			</thead>
	        <tbody>
	        	<?php

	
				// loop through and display format
				foreach($loginfo as $log):

				
				?>
	            	<tr onmouseover="hoverRow(this,true);" onmouseout="hoverRow(this,false);">
	             	<td> <?php 
	             	if ( substr($log['Log']['log_entry'], 0, 8) == 'Scenario')
	             	{
	             		echo $html->link($log['Log']['affected_obj_name'],  array('controller'=> 'scenarios', 'action'=>'edit', 'scenario_id:'.$log['Log']['affected_obj']));
	             	}
	             	else
	             	{
	             		echo $log['Log']['affected_obj']; 
	             	}
	             	?>
	             	</td>
	                <td style="width:70px;">
	                <?php 
	                $formatted_date = date('d.m.Y H:i:s',strtotime($log['Log']['created']));
	                preg_match("/^(.*) (.*)/", $formatted_date, $matches);
					if ($matches[0]) 
					{
	               	 	#$datetime2line = $matches[1] . '<br>' . $matches[2];
	               	 	echo $matches[1] ;
	               	 	echo $matches[2] ;
					}else{
	                	echo $log['Log']['created'] ;
	                }
	                ?>
	               </td>
	                <td style="width:50px;">
	                <?php echo $log['Log']['user'] ?>
	           		</td>
	                 <td> <?php echo $log['Log']['log_entry'] ?></td>
	                 <td><?php echo $log['Log']['modification_status']?'Success':'Failed' ?></td>
	          		 
	           </tr>
	         	<?php 
				endforeach;
				?>
	        </tbody>
			</table>


		
</div>







		
		</div>


		<div id="related-content">
		<div class="box start link">
				<a href="http://www.swisscom.ch/grossunternehmen" target="_blank">Home Swisscom</a>
		</div>
		<div class="box call-to-action">
			<h3><?php __("notifications");?></h3>
			<p><?php __("InWork Objects");?>.</p>
			<div>
			<ul>
					
					<?php echo $this->element('right_notifications',array('SELECT_CUSTOMER' => $SELECTED_CNN)); ?>
             </ul>	
			</div>
			<div class="button-right-grey">
				<a href="/portal/index/produkteberatung.htm?thema=2&produkt=15" onmouseover="hoverButtonRightGrey(this)" onmouseout="outButtonRightGrey(this)">Weiter</a>
		</div>
		</div>
		<div class="box">
			<h3><?php __("miniStatistic");?></h3>
			<p><?php __("Totals");?></p>
			<p><table class="doku">
			<tr>
	
			<td class="doku-middle">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank"><?php __("stations");?></a>
			</td>
			<td class="doku-right">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank">17232</a>
			</td>
			<td class="doku-middle">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank"><?php __("Used DNS");?></a>
			</td>
			<td class="doku-right">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank">999</a>
			</td>
			<td class="doku-middle">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank"><?php __("Free DNS");?></a>
			</td>
			<td class="doku-right">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank">888</a>
			</td>
			<td class="doku-middle">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank"><?php __("otherStat");?></a>
			</td>
			<td class="doku-right">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank">676</a>
			</td>
			</td>
			<td class="doku-middle">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank"><?php __("otherStat");?></a>
			</td>
			<td class="doku-right">
				<a href="Inbetriebnahme_IP-Phone.pdf" target="_blank">676</a>
			</td>
		</tr>
  

		</table></p>
		<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
</div>

</div>





<!--  -->





<script>
<!--ight hand side  ends here-->
function submi_formsss(form_id)
{	
	$('#'+form_id).submit();
} 

<!--right hand side  ends here-->
</script>
