<?php $this->load->view('include/admin_header');?>
<style>
table td, table th{
	padding: 3px 10px !important;
}
</style>

<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';
	
	$flash = $this->session->flashdata('omsg');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
$i=1;
$id = 0;
$car_type_id = '';
$car_model_id = '';
$ac_nonac = '';
$package = '';
$price_per_km = '';
$extra_price_per_hr = '';
$base0 = '';
$base1 = '';
$base2='';
$base3='';
$base4='';
$price_for='';
if(isset($outPack) && !empty($outPack))
{
	foreach($outPack as $info){
	$id = $info->ID;
	$price_for = $info->price_for;
	$car_type_id = $info->car_type_id;
	$car_model_id = $info->car_model_id;
	$package = $info->package;
	$ac_nonac = $info->ac_nonac;
	$price_per_km = $info->price_per_km;
	$extra_price_per_hr = $info->extra_price_per_hr;
	$base0 = $info->base_operating_area_0;
	$base1 = $info->base_operating_area_1;
	$base2 = $info->base_operating_area_2;
	$base3 = $info->base_operating_area_3;
	$base4 = $info->base_operating_area_4;
	$i++;
	}
}

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
	foreach($outstations as $f){
		$outstations[$f->ID]=$f->OUTSTATION_NAME;
	}
	?>
	<h3 align="center">Outstation Package Details</h3>
	<form name="outstationPackageForm" id="outstationPackageForm" method="POST" 
	  action="<?php echo base_url()?>pricing/outstationFlexible/<?php echo $action?>/package">
		<input type="hidden" name="outflxid" value="<?php echo $id; ?>"/>
		<input type="hidden" name="price_for" value="Package"/>
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
					<td>Package Name</td>
					<td><?php echo form_dropdown('package',array(),$package);?></td>
				</tr>
				<tr>
					<td>Extra Rs/km</td>
					<td><input  type="text" value="<?php echo $price_per_km?>"
					name="extra_per_km"  maxlength="5"/></td>
				</tr>
				<tr>
					<td>Extra Rs/hr</td>
					<td><input  type="text" value="<?php echo $extra_price_per_hr?>"
					name="extra_per_hr"  maxlength="5"/></td>
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
			<td>
			<input type="submit" name="outstationPackageSubmit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
			<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
		</tr>
	</table>
	</form>  
<div id="collapse4" class="body">
	<div id="question" style="display:none; cursor: default; padding:10px;"> 
		<h6>Are you sure to delete ?</h6> 
		<br />
		<input type="button" id="yes" value="Yes" /> 
		<input type="button" id="no" value="No" /> 
	</div>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
				<th>Package</th>
				<th>Extra Rs/km</th>
				<th>Extra Rs/hr</th>
				<th>Base operating area 0</th>
				<th>Base operating area 1</th>
				<th>Base operating area 2</th>
				<th>Base operating area 3</th>
				<th>Base operating area 4</th>
				<th>(Commission by admin)Fixed</th>
				<th>(Commission by admin)Percentage</th>
				<th>OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($outPackData as $row){ ?>
			<TR>
				<td><?php echo $numbers ?></td>
				<td><?php echo $row->TYPE_NAME ?></td>
				<td><?php echo $row->MODEL_NAME ?></td>
				<td><?php echo $row->ac_nonac ?></td>
				<td><?php echo $row->package ?></td>
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
					<a href="<?php echo base_url().'pricing/outstation_edit/'.$row->ID ?>/package" >
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
				setTimeout(function(){window.location = "<?php echo base_url() ?>pricing/outstation/package"; },50);
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
</script>
<?php  $this->load->view('include/admin_footer'); ?>