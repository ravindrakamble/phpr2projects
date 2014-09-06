<?php $this->load->view('include/header');?>
			<!-- content -->
<style>th, td{ padding: 5px;}table{margin-left:20%;}</style>
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
			  $local_Package[$c->LOCAL_NAME]=$c->LOCAL_NAME;
		}
		$out_Package = array();
		$out_Package['0']='--';
		    foreach($outstation as $c){
			  $out_Package[$c->OUTSTATION_NAME]=$c->OUTSTATION_NAME;
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
	                <td> <input class="dt" name='journeydate' id='journeydate1' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('city',$city,'',"class='city'");?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('area',array(),'',"class='area'");?></td>
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
			           <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="OUTSTATION SEARCH"/></td></tr>
			        </table>
        		</div>
		       	<div id="packageDiv" style="display: none" >
		        	<table style="width: 40%">
			            <tr>
			                <td>Choose Package : </td>
			                <td><?php echo form_dropdown('package',$out_Package);?></td>
			            </tr>
			             <tr>
			                <td>Car Type :   </td>
			                <td><?php echo form_dropdown('CarTypePackage',$type);?></td>
			            </tr>
			             <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="OUTSTATION SEARCH"/></tr>
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
	                <td> <input class="dt" name='journeydate' id='journeydate2' /></td>
	            </tr>
	             <tr>
	                <td>From City :   </td>
	                <td><?php echo form_dropdown('city',$city,'',"class='city'");?></td>
	            </tr>
	            <tr>
	                <td>From Area :   </td>
	                <td><?php echo form_dropdown('area',array(),'',"class='area'");?></td>
	            </tr>
	             <tr>
	                <td align="left" colspan="2">
	                	<input type="radio" name="option" onclick="localoptions(this.value)" value='Flexible'/>Flexible
	                	<input type="radio" name="option" onclick="localoptions(this.value)"value='Package'/>Package
	                </td>
	            </tr>
	        </table>
	        <div id="localflexibleDiv" style="display: none">
		        <table style="width: 40%">
		            <tr>
		                <td>Estimated total km of journey : </td>
		                <td> <input name='estimationjourney' id='estimationjourney' /> </td>
		            </tr>
		            <tr>
		                <td>Estimated total time of hire : </td>
		                <td> <input name='estimationtime' id=estimationtime' />  </td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('car_type',$type);?></td>
		            </tr>
		            <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="LOCAL SEARCH"/></td></tr>
		        </table>
       		</div>
	        <div id="localpackageDiv" style="display: none" >
	        	<table style="width: 40%">
		            <tr>
		                <td>Choose Package : </td>
		                <td><?php echo form_dropdown('package',$local_Package);?></td>
		            </tr>
		             <tr>
		                <td>Car Type :   </td>
		                <td><?php echo form_dropdown('CarTypePackage',$type);?></td>
		            </tr>
		             <tr> <td colspan="2"><input type="submit" class="btn btn-info" name="search" value="LOCAL SEARCH"/></td></tr>
		        </table>
        	</div>
			</form>
		</div>
			<!--Local Div End -->
		</div>
	</div>
	<!--content end-->
<script type="text/javascript">
$(function() {
	$('#journeydate1').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0
	});
	$('#journeydate2').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: 0
	});
	/*$(".dt").datepicker(
	{ 
		startDate: '-0m',
		format: 'dd/mm/yyyy'
	}).on('changeDate', function(e){
    $(this).datepicker('hide');
	});*/
	
	if($(".city").val() != "--" && $(".city").val() != "0"){
		sendrequest($(".city").val());
	}else{
		$('.area').empty();
	}
	$(".city").change(function(){
    	var selectedValue = this.value;
    	//Display 'loading' status in the target select list
    	if(selectedValue != "0" && selectedValue != "--"){
			sendrequest(selectedValue);
		}else{
			$('.area').empty();
		}
	});
	//Outstation validation
	var frmvalidator = new Validator("outsearch");
	frmvalidator.addValidation("journeydate","req","Please select your journey date");
	frmvalidator.addValidation("city","dontselect=0","Please select city");
	frmvalidator.addValidation("area","req","Please select area");
	frmvalidator.addValidation("estimationjourney","numeric");
	frmvalidator.addValidation("estimationjourney","req","Please enter estimated total KM");
	frmvalidator.addValidation("estimationtime","numeric","Please enter only in numbers");
	frmvalidator.addValidation("estimationtime","req","Please enter estimated total time in hours");
});

function sendrequest(city){
	jQuery.ajax({
			type:"POST",
			url: "<?php echo base_url();?>search/get_areas/"+city,
			data: city,
			success: function(response) {
				if(response == ""){
					$('.area').empty();
				}else{
					$('.area').empty();
					$('.area').append(response);
				}
				
			}
		});
	
}

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

function clearCityAndArea(){
	$('.area').empty();
	$('.city').empty();
}
</script>
<?php $this->load->view('include/footer');?>