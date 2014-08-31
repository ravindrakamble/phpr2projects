<?php $this->load->view('include/header');?>
<script type="text/javascript">
var TSort_Data = new Array ('localflxtable', 's', 's', 's','i','d','d','');
</script>
<!-- content -->
<div class="content-boxs">
<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';?>
<?php
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

$lid = 0;
$lcar_type_id = '';
$lcar_model_id = '';
$lac_nonac = '';
$lpackage = '';
$extra_per_km = '';
$extra_per_hr = '';
$lbase0 = '';
$lbase1 = '';
$lbase2='';
$lbase3='';
$lbase4='';
$lprice_for='';
if(isset($localFlexi) && !empty($localFlexi))
{
	foreach($localFlexi as $info){
	$id = $info->ID;
	$priceFor = $info->price_for;
	$car_type_id = $info->car_type_id;
	$car_model_id = $info->car_model_id;
	$ac_nonac = $info->ac_nonac;
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
if(isset($localPack) && !empty($localPack))
{
	foreach($localPack as $info){
	$lid = $info->ID;
	$lprice_for = $info->price_for;
	$lcar_type_id = $info->car_type_id;
	$lcar_model_id = $info->car_model_id;
	$lpackage = $info->package;
	$lac_nonac = $info->ac_nonac;
	$extra_per_km = $info->extra_per_km;
	$extra_per_hr = $info->extra_per_hr;
	$lbase0 = $info->base_operating_area_0;
	$lbase1 = $info->base_operating_area_1;
	$lbase2 = $info->base_operating_area_2;
	$lbase3 = $info->base_operating_area_3;
	$lbase4 = $info->base_operating_area_4;
	}
}?>

<!--Outstation Data-->
<?php 
$oid = 0;
$ocar_type_id = '';
$ocar_model_id = '';
$oac_nonac = '';
$min_time_hr = '';
$price_per_min_booking_time = '';
$extra_price_per_hr = '';
$price_per_km = '';
$obase0 = '';
$obase1 = '';
$obase2='';
$obase3='';
$obase4='';
$oprice_for='';
if(isset($outFlexi) && !empty($outFlexi))
{
	foreach($outFlexi as $info){
	$oid = $info->ID;
	$oprice_for = $info->price_for;
	$ocar_type_id = $info->car_type_id;
	$ocar_model_id = $info->car_model_id;
	$oac_nonac = $info->ac_nonac;
	$min_time_hr = $info->min_time_hr;
	$price_per_min_booking_time = $info->price_per_min_booking_time;
	$extra_price_per_hr = $info->extra_price_per_hr;
	$price_per_km = $info->price_per_km;
	$obase0 = $info->base_operating_area_0;
	$obase1 = $info->base_operating_area_1;
	$obase2 = $info->base_operating_area_2;
	$obase3 = $info->base_operating_area_3;
	$obase4 = $info->base_operating_area_4;
	}
}

$ooid = 0;
$oocar_type_id = '';
$oocar_model_id = '';
$ooac_nonac = '';
$opackage = '';
$ooprice_per_km = '';
$ooextra_price_per_hr = '';
$oobase0 = '';
$oobase1 = '';
$oobase2='';
$oobase3='';
$oobase4='';
$ooprice_for='';
if(isset($outFlexi) && !empty($outFlexi))
{
	foreach($outFlexi as $info){
	$ooid = $info->ID;
	$ooprice_for = $info->price_for;
	$oocar_type_id = $info->car_type_id;
	$oocar_model_id = $info->car_model_id;
	$ooac_nonac = $info->ac_nonac;
	$opackage = $info->package;
	$ooprice_per_km = $info->price_per_km;
	$$ooextra_price_per_hr = $info->extra_price_per_hr;
	$oobase0 = $info->base_operating_area_0;
	$oobase1 = $info->base_operating_area_1;
	$oobase2 = $info->base_operating_area_2;
	$oobase3 = $info->base_operating_area_3;
	$oobase4 = $info->base_operating_area_4;
	}
}?>
	<ul class="nav nav-tabs" id="myTab">
		<?php $outstationactive ='-'; $localactive='-';
			if($active == 'outstation') 
			$outstationactive ='active'; 
			else $localactive = 'active';
		?>
		 <li class='<?php echo $localactive?>'><a href="#local" role="tab" data-toggle="tab">Local</a></li>
		 <li class='<?php echo $outstationactive?>'><a href="#outstation" role="tab" data-toggle="tab">Outstation</a></li>
	</ul>
		
	<div class="tab-content">
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
	$outstations= array();
	foreach($outstation as $f){
		$outstations[$f->ID]=$f->OUTSTATION_NAME;
	}
	?>
		<div id="question" style="display:none; cursor: default; padding:10px;"> 
			<h6>Are you sure to delete ?</h6> 
			<br />
			<input type="button" id="yes" value="Yes" /> 
			<input type="button" id="no" value="No" /> 
		</div>
		<!--Local Div Start-->
		<div id='local' class="tab-pane fade  active in" >
			<div id="localFlexibledata" style="display: none">
				<div id='LocalFlexible'>
					<h3 align="center">Local Flexible Details</h3>
					<form name="localflexibleForm" id="localflexibleForm" method="POST" 
					  action="<?php echo base_url()?>pricing/localFlexible/<?php echo $action?>/flexible" >
					<input type="hidden" name="localflxid" value="<?php echo $id; ?>"/>
					<?php 
   					   $price_for = array('Flexible' =>'Flexible','Package' =>'Package');
					   $js ='id="localselbox" onChange="localsel(this.value);" ';
					   echo form_dropdown('price_for',$price_for,$price_type,$js);?>
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
									<td>Minimum halt time in min/hr</td>
									<td><input  type="text" value="<?php echo $min_halt_time?>"
									name="min_halt_time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per minimum booking time</td>
									<td><input  type="text" value="<?php echo $price_per_min_booking_time?>"
									name="price"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per kilometer</td>
									<td><input  type="text" value="<?php echo $price_per_km?>"
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
							<input type="submit" name="localFlexibleSubmit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
				</div>
				<div id='LocalFlexibleView'>
					<table id="localflxtable" class="table table-bordered table-striped table-condensed">
					<tr>
						<th>Car type</th>
						<th>Car Name</th>
						<th>Ac/ Non AC</th>
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
						<th>Edit</th><th>Delete</th>
					</tr>
					
					<?php if(!empty($localFlexiData) && isset($localFlexiData))
					{
						foreach($localFlexiData as $row): ?>
						<TR>
						<td><?php echo $row->TYPE_NAME ?></td>
						<td><?php echo $row->MODEL_NAME ?></td>
						<td><?php echo $row->ac_nonac ?></td>
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
						<td>
						<a href="<?php echo base_url().'pricing/edit/'.$row->ID ?>" >
							<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
							
						<td>
						<a
							href="javascript: removelocalflexprice(<?php echo $row->ID ?>)">
							<img src='<?php echo base_url()?>img/mono-icons/minus32.png' 
							title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
						</a>
						</td>
						</TR>	
						<?php endforeach;
					} else { echo "</tr><td colspan='16'>No Result Found</td></tr>"; } ?>
				</table>
				</div>
			</div>
			<div id="localPackagedata" style="display: none">
				<div id='LocalPackage'>
					<h3 align="center">Local Package Details</h3>
					<form name="localpackageForm" id="localpackageForm" method="POST" 
					  action="<?php echo base_url()?>pricing/localFlexible/<?php echo $action?>/package" >
					  <input type="hidden" name="localflxid" value="<?php echo $lid; ?>"/>
					<?php 
					   $price_for = array('Package' =>'Package','Flexible' =>'Flexible');
					   $js ='id="localselbox" onChange="localsel(this.value);" ';
					   echo form_dropdown('price_for',$price_for,$price_type,$js);?>
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
								   echo form_dropdown('car_type',$type,$lcar_type_id,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$lcar_model_id,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC',$lac_nonac));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Package</td>
									<td><?php echo form_dropdown('package',array(),$lpackage);?></td>
								</tr>
								
								<tr>
									<td>Extra Rs/km</td>
									<td><input  type="text" value="<?php echo $extra_per_km?>"
									name="extra_per_km"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/hr</td>
									<td><input  type="text" value="<?php echo $extra_per_hr?>"
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
									<td><input type="text" name="area0" value="<?php echo $lbase0?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $lbase1?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $lbase2?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $lbase3?>" 
									maxlength="5"/></td>
								</tr>
									<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $lbase4?>" 
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
							<td style="padding-left: 20%"><input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
				</div>
				<div id='LocalPackageView'>
					<table id="inventory_table" class="table table-bordered table-striped table-condensed">
						<tr>
							<th>Car type</th>
							<th>Car Name</th>
							<th>Ac/ Non AC</th>
							<th>Package Name</th>
							<th>Extra Rs/km</th>
							<th>Extra Rs/hr</th>
							<th>Base operating area 0</th>
							<th>Base operating area 1</th>
							<th>Base operating area 2</th>
							<th>Base operating area 3</th>
							<th>Base operating area 4</th>
							<th>(Commission by admin)Fixed</th>
							<th>(Commission by admin)Percentage</th>
							<th>Edit</th><th>Delete</th>
						</tr>
						<?php if(!empty($localPackData) && isset($localPackData))
						{
							foreach($localPackData as $row): ?>
							<TR>
							<td><?php echo $row->TYPE_NAME ?></td>
							<td><?php echo $row->MODEL_NAME ?></td>
							<td><?php echo $row->ac_nonac ?></td>
							<td><?php echo $row->package ?></td>
							<td><?php echo $row->extra_per_km ?></td>
							<td><?php echo $row->extra_per_hr ?></td>
							<td><?php echo $row->base_operating_area_0 ?></td>
							<td><?php echo $row->base_operating_area_1 ?></td>
							<td><?php echo $row->base_operating_area_2 ?></td>
							<td><?php echo $row->base_operating_area_3 ?></td>
							<td><?php echo $row->base_operating_area_4 ?></td>
							<td><?php echo $row->commision_fixed ?></td>
							<td><?php echo $row->commision_percentage ?></td>
							
							<td>
							<a href="<?php echo base_url().'pricing/edit/'.$row->ID ?>/Package">
								<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
							</td>
							<td>
							<a
								href="javascript: removelocalflexprice(<?php echo $row->ID ?>)">
								<img src='<?php echo base_url()?>img/mono-icons/minus32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
							</td>
							</TR>	
							<?php endforeach;
						} else { echo "</tr><td colspan='16'>No Result Found</td></tr>"; } ?>
					</table>
				</div>
			</div>		
		</div>
		<!--Outstation Div Start-->
		<div id='outstation' class="tab-pane" >
			<div id="outstationFlexibledata" style="display: none">
				<div id='outstationFlexible'>
				<h3 align="center">Outstation Flexible Details</h3>
				<form name="outstationflexibleForm" id="outstationflexibleForm" method="POST" 
					action="<?php echo base_url()?>pricing/outstationFlexible/<?php echo $action?>/flexible">					<input type="hidden" name="outflxid" value="<?php echo $oid;?>"/>
					<?php 
   					   $out_price = array('Flexible' =>'Flexible','Package' =>'Package');
					   $js ='id="outstationselbox" onChange="outstationsel(this.value);" ';
					   echo form_dropdown('price_for',$out_price,$out_price_type,$js);?>
					<table width="100%">
						<tr>																											<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php 
								   $js ='id="car_type" onChange="get_car_name(this.value);" ';
								   echo form_dropdown('car_type',$type,$ocar_type_id,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$ocar_model_id,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC',$oac_nonac));?></td>
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
									<td><input type="text" name="area0" value="<?php echo $obase0?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $obase1?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $obase2?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $obase3?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $obase4?>" 
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
							<td style="padding-left: 30%">
							<input type="submit" name="outstationFlexibleSubmit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='OutstationFlexibleView'>
				<table id="inventory_table" class="table table-bordered table-striped table-condensed">
					<tr>
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
						<th>Edit</th><th>Delete</th>
					</tr>
					
					<?php if(!empty($outFlexiData) && isset($outFlexiData))
					{
						foreach($outFlexiData as $row): ?>
						<TR>
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
						<a href="<?php echo base_url().'pricing/update/'.$row->ID.'/Flexible' ?>" >
							<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
						<td>
						<a
							href="javascript: removeoutprice(<?php echo $row->ID ?>)">
							<img src='<?php echo base_url()?>img/mono-icons/minus32.png' 
							title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
						</a>
						</td>
						</TR>	
						<?php endforeach;
					} else { echo "</tr><td colspan='17'>No Result Found</td></tr>"; } ?>
				</table>
				</div>
			</div>
			<div id="outstationPackagedata" style="display: none">
				<div id='outstationPackage'>
				<h3 align="center">Outstation Package Details</h3>
				<form name="outstationPackageForm" id="outstationPackageForm" method="POST" 
					  action="<?php echo base_url()?>pricing/outstationFlexible/<?php echo $action?>/package">
					  <input type="hidden" name="outflxid" value="<?php echo $ooid;?>"/>
					<?php 
   					   $out_price = array('Package' =>'Package','Flexible' =>'Flexible');
					   $js ='id="outstationselbox" onChange="outstationsel(this.value);" ';
					   echo form_dropdown('price_for',$out_price,$out_price_type,$js);?>
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
								   echo form_dropdown('car_type',$type,$oocar_type_id,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$oocar_model_id,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC',$ooac_nonac));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Package Name</td>
									<td><?php echo form_dropdown('package',$outstations,$opackage);?></td>
								</tr>
								<tr>
									<td>Extra Rs/km</td>
									<td><input  type="text" value="<?php echo $ooprice_per_km?>"
									name="kilometerprice"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/hr</td>
									<td><input  type="text" value="<?php echo $ooextra_price_per_hr?>"
									name="hourprice"  maxlength="5"/></td>
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
									<td><input type="text" name="area0" value="<?php echo $oobase0?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $oobase1?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $oobase2?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $oobase3?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $oobase4?>" 
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
							<td style="padding-left: 30%">
								<input type="submit" name="outstationPackageSubmit" 
								value="<?php echo $butlabel;?>" class="btn btn-info"/> 
							</td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='outstationPackageView'>
					<table id="inventory_table" class="table table-bordered table-striped table-condensed">
					<tr>
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
						<th>(Commission by admin)Fixed</th>
						<th>(Commission by admin)Percentage</th>
						<th>Edit</th><th>Delete</th>
					</tr>
					
					<?php if(!empty($outPackData) && isset($outPackData))
					{
						foreach($outPackData as $row): ?>
						<TR>
						<td><?php echo $row->car_type ?></td>
						<td><?php echo $row->car_name ?></td>
						<td><?php echo $row->ac_nonac ?></td>
						<td><?php echo $row->time ?></td>
						<td><?php echo $row->price ?></td>
						<td><?php echo $row->extraprice ?></td>
						<td><?php echo $row->kilometerprice ?></td>
						<td><?php echo $row->area0 ?></td>
						<td><?php echo $row->area1 ?></td>
						<td><?php echo $row->area2 ?></td>
						<td><?php echo $row->area3 ?></td>
						<td><?php echo $row->area4 ?></td>
						<td><?php echo $row->comm_fixed ?></td>
						<td><?php echo $row->comm_percentage ?></td>
						<td>
						<a href="<?php echo base_url().'pricing/update/'.$row->ID.'/Package' ?>" >
							<img src='<?php echo base_url()?>"img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
							
						<td>
						<a>
							href="javascript: removeoutprice(<?php echo $row->ID ?>)">
							<img src='<?php echo base_url()?>"img/mono-icons/minus32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
						</TR>	
						<?php endforeach;
					} else { echo "</tr><td colspan='17'>No Result Found</td></tr>"; } ?>
				</table>
				</div>
			</div>
		</div>
			
	</div>
	</div>
	
<div id='viewdetails' style="display:none">

</div>
<script type="text/javascript">
$(document).ready(function() {
	var val = document.getElementById('car_type').value;
	get_car_name(val);
	
	$.calculator.setDefaults({showOn: 'both', buttonImageOnly: true, buttonImage: '<?php echo base_url()?>calculator/calculator.png'});
	$('.basicCalculator').calculator();
	$('#sciCalculator').calculator({layout: $.calculator.scientificLayout});
	var localval = document.getElementById('localselbox').value;
	var outval = document.getElementById('outstationselbox').value;
	localsel(localval);
	outstationsel(outval);
	
});


function localsel(val)
{
	if(val == 'Flexible')
	{
		$("#localFlexibledata").show();
		$("#localPackagedata").hide();
	}
	else{
		$("#localPackagedata").show();
		$("#localFlexibledata").hide();
	}
}
function outstationsel(val)
{
	if(val == 'Flexible')
	{
		$("#outstationFlexibledata").show();
		$("#outstationPackagedata").hide();
	}
	else{
		$("#outstationPackagedata").show();
		$("#outstationFlexibledata").hide();
	}
}
function viewdetails(id)
{
 $.ajax({ 
    type    : "POST", 
    url     : "<?php echo base_url()?>inventory/view/"+id, 
    success : function(data) { 
            $.fancybox(data); 
	} 
}); 
return false; 
}
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var start = $('#start').datepicker(
{
	format:'dd/mm/yyyy',
	onRender: function(date)
	{
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev)
{
	if (ev.date.valueOf() > end.date.valueOf())
	{
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		end.setValue(newDate);
	}
	start.hide();
	$('#end')[0].focus();
}).data('datepicker');
var end = $('#end').datepicker(
{
	format:'dd/mm/yyyy',
	onRender: function(date)
	{
		return date.valueOf() <= start.date.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev)
{
	end.hide();
}).data('datepicker');

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

function removelocalflexprice(val)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_localFlexiblePrice/"+val,
			success: function(data) {
				$("#LocalFlexibleView").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
function removeoutprice(val){
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_outstation_price/"+val,
			success: function(data) {
				$("#OutstationFlexibleView").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}

</script>
<!--<script type="text/javascript">
var frmvalidator = new Validator("inventory");
frmvalidator.addValidation("car_type","dontselect=0","Please select your car type");
frmvalidator.addValidation("car_name","req","Please enter your Car Name");
frmvalidator.addValidation("car_name","alpha","Alphabetic chars only");
frmvalidator.addValidation("car_no","req","Please enter your Car Number");
frmvalidator.addValidation("year","req","Please enter your Purchase year");
frmvalidator.addValidation("year","numeric");
//frmvalidator.addValidation("car_features","dontselect=0",'Please select your Car Features');

frmvalidator.addValidation("owner_name","req","Please enter your Name");
frmvalidator.addValidation("owner_name","alpha","Please enter valid name");
frmvalidator.addValidation("owner_no","req","Please enter owner number");
frmvalidator.addValidation("owner_no","numeric");

frmvalidator.addValidation("agg_start","req","Please enter Agreement start date");
frmvalidator.addValidation("agg_end","req","Please enter Agreement end date");
</script>-->
<?php $this->load->view('include/footer');?>