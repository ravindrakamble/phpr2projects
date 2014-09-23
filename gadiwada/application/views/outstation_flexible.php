<?php $this->load->view('include/admin_header');?>
<style>
table td, table th{
	padding: 3px 10px !important;
}
</style>
<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';
$i = 1;
$id = 0;
$car_type_id = '';
$car_model_id = '';
$ac_nonac = '';
$min_time_hr = '';
$price_per_min_booking_time = '';
$extra_price_per_hr = '';
$price_per_km = '';
$base0 = '';
$base1 = '';
$base2='';
$base3='';
$base4='';
$priceFor='';
if(isset($outFlexi) && !empty($outFlexi))
{
	foreach($outFlexi as $info){
	$id = $info->ID;
	$priceFor = $info->price_for;
	$car_type_id = $info->car_type_id;
	$car_model_id = $info->car_model_id;
	$ac_nonac = $info->ac_nonac;
	$min_time_hr = $info->min_time_hr;
	$price_per_min_booking_time = $info->price_per_min_booking_time;
	$extra_price_per_hr = $info->extra_price_per_hr;
	$price_per_km = $info->price_per_km;
	$base0 = $info->base_operating_area_0;
	$base1 = $info->base_operating_area_1;
	$base2 = $info->base_operating_area_2;
	$base3 = $info->base_operating_area_3;
	$base4 = $info->base_operating_area_4;
	$i++;
	}
}
?>
	<?php
	$flash = $this->session->flashdata('omsg');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
	?>
	<?php 
	$type = array();
	$type['0']='--';
	    foreach($car_type as $c){
		  $type[$c->ID]=$c->TYPE_NAME;
	}
	$features = array();
	    foreach($feature as $f){
		  $features[$f->ID]=$f->FEATURE_NAME;
	}
	$outstations= array();
	foreach($outstation as $f){
		$outstations[$f->ID]=$f->OUTSTATION_NAME;
	}
	?>
	<h3 align="center">Outstation Flexible Details</h3>
	<form name="outstationflexibleForm" id="outstationflexibleForm" method="POST" 
		action="<?php echo base_url()?>pricing/outstationFlexible/<?php echo $action?>/flexible">					<input type="hidden" name="outflxid" value="<?php echo $id;?>"/>
		<input type="hidden" name="price_for" value="Flexible"/>
	<table width="100%">
		<tr>																												<td style="padding-left: 15%">
				<table>
				<tr>
					<th colspan="2"><h5>Car Details</h5></th>
				</tr>
				<tr>
					<td>Car Type</td>
					<td><?php 
				   $js ='id="car_type" onChange="get_car_name(this.value);" ';
				   echo form_dropdown('car_type',$type,$car_type_id,$js);?></td>
				</tr>
				<tr>
					<td>Car Name</td>
					<td>
				<?php echo form_dropdown('car_name',array(0=>'--'),$car_model_id,"class='car_type'");?>
					</td>
				</tr>
				<tr>
					<td>Ac/Non Ac</td>
					<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'),$ac_nonac);?></td>
				</tr>
				<tr>
					<th colspan="2"><h5>Price Details</h5></th>
				</tr>
				<tr>
					<td>Minimum booking time in hrs</td>
					<td><input  type="text" value="<?php echo $min_time_hr?>"
					name="min_time_hr"  maxlength="4"/></td>
				</tr>
				<tr>
					<td>Price per minimum booking time</td>
					<td><input  type="text" value="<?php echo $price_per_min_booking_time?>"
					name="booking_time"  maxlength="4"/></td>
				</tr>
				<tr>
					<td>Extra price in 1 hr</td>
					<td><input  type="text" value="<?php echo $extra_price_per_hr?>"
					name="extra_price_per_hr"  maxlength="4"/></td>
				</tr>
				<tr>
					<td>Price per kilometer</td>
					<td><input  type="text" value="<?php echo $price_per_km?>"
					name="kilometerprice"  maxlength="5"/></td>
				</tr>
			</table>
			</td>
			<td>
				<table>
				<tr>
					<th colspan="2"><h5>Mark up</h5></th>
				</tr>
				<tr>
					<td>Base operating area 0&nbsp;&nbsp; </td>
					<td><input type="text" name="area0" value="<?php echo $base0?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 1 &nbsp;&nbsp;</td>
					<td><input type="text" name="area1" value="<?php echo $base1?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 2 &nbsp;&nbsp;</td>
					<td><input type="text" name="area2" value="<?php echo $base2?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 3 &nbsp;&nbsp;</td>
					<td><input type="text" name="area3" value="<?php echo $base3?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 4 &nbsp;&nbsp;</td>
					<td><input type="text" name="area4" value="<?php echo $base4?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Local calculator </td>
					<td>
					<input type="text" name="calculator" readonly="true" class="basicCalculator">
					</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td style="padding-left: 20%">
			<input type="submit" name="outstationFlexibleSubmit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
			<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
		</tr>
	</table>
	</form>  
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
	<div id="question" style="display:none; cursor: default; padding:10px;"> 
		<h6>Are you sure to delete ?</h6> 
		<br />
		<input type="button" id="yes" value="Yes" /> 
		<input type="button" id="no" value="No" /> 
	</div>
		<thead>
			<tr>
				<th>ID</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
				<th>Minmum booking time in hrs</th>
				<th>Price per minimum booking time</th>
				<th>Extra price in 1 hr</th>
				<th>Price per kilometer</th>
				<th>Base operating area 0</th>
				<th>Base operating area 1</th>
				<th>Base operating area 2</th>
				<th>Base operating area 3</th>
				<th>Base operating area 4</th>
				<th>(Commission by admin) Fixed</th>
				<th>(Commission by admin) Percentage</th>
				<th>OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($outFlexiData as $row){ ?>
			<TR>
				<td><?php echo $numbers ?></td>
				<td><?php echo $row->TYPE_NAME ?></td>
				<td><?php echo $row->MODEL_NAME ?></td>
				<td><?php echo $row->ac_nonac ?></td>
				<td><?php echo $row->min_time_hr ?></td>
				<td><?php echo $row->price_per_min_booking_time ?></td>
				<td><?php echo $row->extra_price_per_hr ?></td>
				<td><?php echo $row->price_per_km ?></td>
				<td><?php echo $row->base_operating_area_0 ?></td>
				<td><?php echo $row->base_operating_area_1 ?></td>
				<td><?php echo $row->base_operating_area_2 ?></td>
				<td><?php echo $row->base_operating_area_3 ?></td>
				<td><?php echo $row->base_operating_area_4 ?></td>
				<td><?php echo $row->commision_fixed ?></td>
				<td><?php echo $row->commision_percentage ?></td>
				<td>
					<a href="<?php echo base_url().'pricing/outstation_edit/'.$row->ID ?>/flexible" >
						<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
						title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
					</a>
					&nbsp;&nbsp;
					<a href="javascript: removeoutprice(<?php echo $row->ID ?>)">
						<img src='<?php echo base_url()?>img/mono-icons/minus32.png' 
						title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
					</a>
				</td>
			</TR>	
			<?php $numbers ++ ; } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var val = document.getElementById('car_type').value;
	get_car_name(val);
	
 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    });
	 
	$.calculator.setDefaults({showOn: 'both', buttonImageOnly: true, buttonImage: '<?php echo base_url()?>calculator/calculator.png'});
	$('.basicCalculator').calculator();	
});
function get_car_name(car_type)
{
	jQuery.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/get_car_name/"+car_type,
		data: car_type,
		success: function(response) {
			if(response == ""){
				$('.car_type').empty();
			}else{
				$('.car_type').html(response);
			}
			
		}
	});
}
function removeoutprice(val)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_outstation_price/"+val,
			success: function(data) {
				$.growlUI('Sucessfully<br> Deleted !');
				setTimeout(function(){window.location = "<?php echo base_url() ?>pricing/outstation/flexible"; },50);
			}
		});
	});
	jQuery('#no').click(function() {
		val =0;  
        $.unblockUI(); 
       return false; 
    }); 
}

var frmvalidator = new Validator("outstationflexibleForm");
frmvalidator.addValidation("car_type","dontselect=0","Please select your car type");
frmvalidator.addValidation("car_name","req","Please select your car name");
frmvalidator.addValidation("min_time_hr","req","Please Enter Minimum Booking Hour");
frmvalidator.addValidation("min_time_hr","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("booking_time","req","Please Enter Booking time");
frmvalidator.addValidation("booking_time","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("extra_price_per_hr","req","Please Enter  Extra price per hour");
frmvalidator.addValidation("extra_price_per_hr","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("kilometerprice","req","Please Enter Kilometer Price");
frmvalidator.addValidation("kilometerprice","numeric",'Please Enter Numeric Value');
</script>
<?php  $this->load->view('include/admin_footer'); ?>