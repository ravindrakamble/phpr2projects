<?php $this->load->view('include/admin_header');?>
<style>
table td, table th{
	padding: 3px 10px !important;
}

.none {
    display:none;
}
</style>
<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';
$i = 1;
$id = 0;
$car_type_id = '';
$car_model_id = '';
$ac_nonac = '';
$min_halt_time = '';
$price_per_min_booking_time = '';
$price_per_km = '';
$base0 = '';
$base1 = '';
$base2='';
$base3='';
$base4='';
$priceFor='';
$model = '';
$car ='';
$acnon = '';
$package = '';
$inv_id =0;
if(isset($local_price_edit) && !empty($local_price_edit))
{
	foreach($local_price_edit as $info){
	if($info->AC == 1)
	$acnon = 'AC';
	else
	$acnon ='NON AC';
	$id = $info->ID;
	$inv_id = $info->inventory_id;
	$priceFor = $info->price_for;
	$package = $info->package;
	$car = $info->TYPE_NAME;
	$model = $info->MODEL_NAME;
	$min_halt_time = $info->min_halt_time;
	$price_per_min_booking_time = $info->price_per_min_booking_time;
	$price_per_km = $info->price_per_km;
	$base0 = $info->base_operating_area_0;
	$base1 = $info->base_operating_area_1;
	$base2 = $info->base_operating_area_2;
	$base3 = $info->base_operating_area_3;
	$base4 = $info->base_operating_area_4;
	$i++;
	}
}
	$flash = $this->session->flashdata('lpmsg');
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
	$locals= array();
	foreach($local as $f){
		$locals[$f->ID]=$f->LOCAL_NAME;
	}
	?>
	<h3 align="center">Local Pricing Details</h3>
	<div id="form_div" <?php if($butlabel == 'Update')
		echo "style='display: block'"; 
		else 
		echo "style='display: none'";?>
	>
	<form name="localflexibleForm" id="localflexibleForm" method="POST" 
	  action="<?php echo base_url()?>pricing/localPricing" >
	<table width="100%">
		<input type="hidden" value="<?php echo $inv_id;?>" name="inv_id"/>
		<tr>																												<td style="padding-left: 15%">
				<table>
				<tr>
					<th colspan="2"><h5>Car Details</h5></th>
				</tr>
				<tr>
					<td>Car Type</td>
					<td><input readonly="true"  type="text" value="<?php echo $car?>"
					name="car_type" /></td>
				</tr>
				<tr>
					<td>Car Name</td>
					<td>
				<input  type="text" readonly="true" value="<?php echo $model?>"
					name="car_name" />
					</td>
				</tr>
				<tr>
					<td>AC - NonAC</td>
					<td>
				<input  type="text" readonly="true" value="<?php echo $acnon?>"
					name="car_name" />
					</td>
				</tr>
				<tr>
					<td>Price For (Flexible / Outstation)</td>
					<td>
						&nbsp;&nbsp;<input  <?php if($priceFor == 'Flexible') echo 'checked= "checked"'?> onclick="package_show(this.value);" style="vertical-align: top" type="radio" required value="Flexible" name="price_for" />&nbsp;&nbsp;Flexible&nbsp;&nbsp;
					&nbsp;&nbsp;	<input <?php if($priceFor == 'Package') echo 'checked= "checked"'?> onclick="package_show(this.value);" style="vertical-align: top" type="radio" value="Package" name="price_for" />&nbsp;&nbsp;Package
					</td>
				</tr>
				<tr id="Package" class="none">
					<td>Package</td>
					<td><?php echo form_dropdown('package',$locals,$package);?></td>
				</tr>
				<tr>
					<th colspan="2"><h5>Price Details</h5></th>
				</tr>
				<tr>
					<td>Minimum halt time in min/hr</td>
					<td><input  type="number" value="<?php echo $min_halt_time?>"
					name="min_halt_time"  maxlength="4"/></td>
				</tr>
				<tr>
					<td>Price per minimum booking time</td>
					<td><input  type="number" value="<?php echo $price_per_min_booking_time?>"
					name="price"  maxlength="4"/></td>
				</tr>
				<tr>
					<td>Price per kilometer</td>
					<td><input  type="number" value="<?php echo $price_per_km?>"
					name="per_km_price"  maxlength="4"/></td>
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
					<td><input type="number" name="area0" value="<?php echo $base0?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 1 &nbsp;&nbsp;</td>
					<td><input type="number" name="area1" value="<?php echo $base1?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 2 &nbsp;&nbsp;</td>
					<td><input type="number" name="area2" value="<?php echo $base2?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 3 &nbsp;&nbsp;</td>
					<td><input type="number" name="area3" value="<?php echo $base3?>" 
					maxlength="5"/></td>
				</tr>
				<tr>
					<td>Base operating area 4 &nbsp;&nbsp;</td>
					<td><input type="number" name="area4" value="<?php echo $base4?>" 
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
			<input type="submit" name="localFlexibleSubmit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
			<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
		</tr>
	</table>
	</form>  
	</div>
<div id="collapse4" class="body">
	<div id="question" style="display:none; cursor: default; padding:10px;"> 
		<h6>Are you sure to delete ?</h6> 
		<br />
		<input type="button" id="yes" value="Yes" /> 
		<input type="button" id="no" value="No" /> 
	</div>
	<div id="questions" style="display:none; cursor: default; padding:10px;"> 
		<h6>Are you sure to restore this price ?</h6> 
		<br />
		<input type="button" id="yess" value="Yes" /> 
		<input type="button" id="nos" value="No" /> 
	</div>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Minmum halt time in min/hr</th>
				<th>Price per minimum booking time</th>
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
			foreach($localData as $row){ ?>
			<TR>
				<td><?php echo $numbers ?></td>
				<td><?php echo $row->TYPE_NAME ?></td>
				<td><?php echo $row->MODEL_NAME ?></td>
				<td><?php echo $row->min_halt_time ?></td>
				<td><?php echo $row->price_per_min_booking_time ?></td>
				<td><?php echo $row->price_per_km ?></td>
				<td><?php echo $row->base_operating_area_0 ?></td>
				<td><?php echo $row->base_operating_area_1 ?></td>
				<td><?php echo $row->base_operating_area_2 ?></td>
				<td><?php echo $row->base_operating_area_3 ?></td>
				<td><?php echo $row->base_operating_area_4 ?></td>
				<td><?php echo $row->commision_fixed ?></td>
				<td><?php echo $row->commision_percentage ?></td>
				<?php if($row->status == 1){?>
				<td>
				<a href="<?php echo base_url().'pricing/edit/'.$row->inventory_id ?>" >
					<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
					title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
				</a>
				&nbsp;
				<a
					href="javascript: removelocalflexprice(<?php echo $row->inventory_id ?>)">
					<img src='<?php echo base_url()?>img/mono-icons/minus32.png' 
					title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
				</a>
				</td>
				<?php } if($row->status == 0){ ?>
				<td style="background-color: orange">
				<a title="Deleted Record" href="javascript: restore(<?php echo $row->inventory_id ?>)">
				<label class="badge badge-info">Restore</label>
				</a>
				</td>
				<?php } ?>
			</TR>	
			<?php $numbers ++ ; } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
//var count = 0;
$(document).ready(function() {
	var val = "<?php echo $priceFor ?>";
	package_show(val);
});

 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    });
	 
	$.calculator.setDefaults({showOn: 'both', buttonImageOnly: true, buttonImage: '<?php echo base_url()?>calculator/calculator.png'});
	$('.basicCalculator').calculator();	
//});
/*
function get_car_name(car_type)
{
	jQuery.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/get_unique_carname/"+car_type+'/Flexible',
		data: car_type,
		success: function(response) {
			if(response == ""){
				$('.car_type').empty();
			}else{
				$('.car_type').html(response);
			}
		}
	});
}*/
function removelocalflexprice(val)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_localFlexiblePrice/"+val,
			success: function(data) {
				$.growlUI('Sucessfully<br> Deleted !');
				setTimeout(function(){window.location = "<?php echo base_url() ?>pricing/local/flexible"; },50);
			}
		});
	});
	jQuery('#no').click(function() { 
		val =0; 
        $.unblockUI(); 
       return false; 
    }); 
}
function restore(val)
{
	
	$.blockUI({ message: jQuery('#questions'), css: { width: '275px' } }); 
    jQuery('#yess').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/restore_price/"+val,
			success: function(data) {
				$.growlUI('Sucessfully<br> Restored !');
				setTimeout(function(){window.location = "<?php echo base_url() ?>pricing/local/flexible"; },50);
			}
		});
	});
	jQuery('#nos').click(function() { 
		val =0; 
        $.unblockUI(); 
       return false; 
    });
}
function package_show(val)
{
	///alert(val);
	if(val == 'Package')
	 $('.none').toggle();
	 //$('#' + val).addClass('none').siblings().removeClass('none');
	else
	$('.none').hide();
}
var frmvalidator = new Validator("localflexibleForm");
/*frmvalidator.addValidation("car_type","dontselect=0","Please select your car type");
frmvalidator.addValidation("car_name","req","Please select your car name");*/
frmvalidator.addValidation("min_halt_time","req","Please Enter Minimum halt time");
frmvalidator.addValidation("min_halt_time","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("price","req","Please Enter Price");
frmvalidator.addValidation("price","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("per_km_price","req","Please Enter Price Per KM");
frmvalidator.addValidation("per_km_price","numeric",'Please Enter Numeric Value');
</script>
<?php  $this->load->view('include/admin_footer'); ?>