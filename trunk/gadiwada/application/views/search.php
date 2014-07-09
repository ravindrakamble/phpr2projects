<?php $this->load->view('include/header');?>
			<!-- content -->
	<div class="content-boxs">
		<?php 
		$city = array();
		$city['0']='--';
		    foreach($cities as $c){
			  $city[$c->CITY_NAME]=$c->CITY_NAME;
		}
		$type = array();
		$type['0']='--';
		    foreach($car_type as $c){
			  $type[$c->TYPE_NAME]=$c->TYPE_NAME;
		}
		$local_Package = array();
		$local_Package['0']='--';
		    foreach($local as $c){
			  $local_Package[$c->local_name]=$c->local_name;
		}
		$out_Package = array();
		$out_Package['0']='--';
		    foreach($outstation as $c){
			  $out_Package[$c->outstation_name]=$c->outstation_name;
		}
		?>
		<ul class="nav nav-tabs" id="myTab">
			 <li class="active"><a href="#local" role="tab" data-toggle="tab">Local</a></li>
			 <li><a href="#outstation" role="tab" data-toggle="tab">Outstation</a></li>
		</ul>
		<div class="tab-content">
			<!--Outstation Div Start-->
			<div id='outstation' class="tab-pane fade" >
			<form name="outsearch" method="POST" action="<?php echo base_url()?>search_result">
				<table style="width: 40%">
	            <tr>
	                <td>Journey Date : </td>
	                <td> <input class="dt" name='journeydate' id='journeydate' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('city',$city);?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('area',array());?></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input type="radio" name="option" onclick="options(this.value)" value='Flexible'/>Flexible
	                	<input type="radio" name="option" onclick="options(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
				<div id="flexibleDiv" style="display: none">
			        <table style="width: 40%">
			            <tr>
			                <td>Estimated total km of journey : </td>
			                <td> <input name='estimationjourney' id='estimationjourney' /> </td>
			            </tr>
			            <tr>
			                <td>Estimated total time of hire : </td>
			                <td> <input name='estimationtime' id='estimationtime' />  </td>
			            </tr>
			             <tr>
			                <td>Car Type :   </td>
			                <td><?php echo form_dropdown('car_type',$type);?></td>
			            </tr>
			           <tr> <td colspan="2"><input type="submit" name="outstation" value="SEARCH"/></td></tr>
			        </table>
        		</div>
		       	<div id="packageDiv" style="display: none" >
		        	<table style="width: 40%">
			            <tr>
			                <td>Choose Package : </td>
			                <td><?php echo form_dropdown('outpackage',$out_Package);?></td>
			            </tr>
			             <tr>
			                <td>Car Type :   </td>
			                <td><?php echo form_dropdown('outCarType',$type);?></td>
			            </tr>
			             <tr> <td colspan="2"><input type="submit" name="outstation" value="SEARCH"/></td></tr>
			        </table>
	       		</div>
				
	     	</form>
			</div>
			<!--Outstation Div End -->
			<!--Local Div Start -->
		<div id='local' class="tab-pane fade  active in">
			<form name="localsearch" method="POST" action="<?php echo base_url()?>search_result">
			<table style="width: 40%">
	            <tr>
	                <td>Journey Date : </td>
	                <td> <input class="dt" name='localjourneydate' id='localjourneydate' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('localcity',$city);?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('localarea',array());?></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input type="radio" name="localoption" onclick="localoptions(this.value)" value='Flexible'/>Flexible
	                	<input type="radio" name="localoption" onclick="localoptions(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
	        <div id="localflexibleDiv" style="display: none">
		        <table style="width: 40%">
		            <tr>
		                <td>Estimated total km of journey : </td>
		                <td> <input name='localestimationjourney' id='localestimationjourney' /> </td>
		            </tr>
		            <tr>
		                <td>Estimated total time of hire : </td>
		                <td> <input name='localestimationtime' id='localestimationtime' />  </td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('localCarType',$type);?></td>
		            </tr>
		            <tr> <td colspan="2"><input type="submit" name="local" value="SEARCH"/></td></tr>
		        </table>
       		</div>
	        <div id="localpackageDiv" style="display: none" >
	        	<table style="width: 40%">
		            <tr>
		                <td>Choose Package : </td>
		                <td><?php echo form_dropdown('localpackage',$local_Package);?></td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('localCarTypePackage',$type);?></td>
		            </tr>
		             <tr> <td colspan="2"><input type="submit" name="local" value="SEARCH"/></td></tr>
		        </table>
        	</div>
			</form>
		</div>
			<!--Local Div End -->
		</div>
	</div>
	<!--content end-->
<script type="text/javascript">
$(document).ready(function() {
	$('#myTab a:first').tab('show');

	$(".dt").datepicker(
	{
		format: 'dd/mm/yyyy'
	}).on('changeDate', function(e){
    $(this).datepicker('hide');
	});
});

function options(val){
	if(val == 'Flexible'){
		$('#flexibleDiv').show();
		$('#packageDiv').hide();
	}
	if(val == 'Package'){
		$('#packageDiv').show();
		$('#flexibleDiv').hide();
	}
}
function localoptions(val){
	if(val == 'Flexible'){
		$('#localflexibleDiv').show();
		$('#localpackageDiv').hide();
	}
	if(val == 'Package'){
		$('#localpackageDiv').show();
		$('#localflexibleDiv').hide();
	}
}
</script>
<?php $this->load->view('include/footer');?>