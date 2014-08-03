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
$CAR_TYPES = '';
$CAR_NAME = '';
$CAR_NUMBER = '';
$PURCHASE_YEAR = '';
$CAR_FEATURES = array();
$OWNER_NAME = '';
$OWNER_NUMBER = '';
$AGREEMEST_START_DATE = '';
$AGREEMEST_END_DATE='';
$AC = 0;
$NON_AC = 0;
$LOCAL = 0;
$OUTSTATION = 0;
$disable = '';
$readonly = '';
if(isset($info) && !empty($info))
{
	$id = $info->ID;
	$CAR_TYPES = $info->CAR_TYPE;
	$CAR_NAME = $info->CAR_NAME;
	$CAR_NUMBER = $info->CAR_NUMBER;
	$PURCHASE_YEAR = $info->PURCHASE_YEAR;
	$CAR_FEATURES =explode(',',$info->CAR_FEATURES);
	$OWNER_NAME = $info->OWNER_NAME;
	$OWNER_NUMBER = $info->OWNER_NUMBER;
	$AGREEMEST_START_DATE = $info->AGREEMEST_START_DATE;
	$AGREEMEST_END_DATE = $info->AGREEMEST_END_DATE;
	$AC = $info->AC;
	$NON_AC = $info->NON_AC;
	$LOCAL = $info->LOCAL;
	$OUTSTATION = $info->OUTSTATION;
	$disable = 'disabled';
	$readonly = 'readonly';
	$i++;
}?>

	<ul class="nav nav-tabs" id="myTab">
		 <li class="active"><a href="#local" role="tab" data-toggle="tab">Local</a></li>
		 <li><a href="#outstation" role="tab" data-toggle="tab">Outstation</a></li>
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
		<!--Local Div Start-->
		<div id='local' class="tab-pane fade  active in" >
			<select id="localselbox" onchange="localsel(this.value);">
				<option value="Flexible">Flexible</option>
				<option value="Package">Package</option>
			</select>
			<div id="localFlexibledata" style="display: none">
				<div id='LocalFlexible'>
				<h3 align="center">Local Flexible Details</h3>
				<form name="localflexibleForm" id="localflexibleForm" method="POST" 
					  action="<?php echo base_url()?>pricing/localFlexible" >
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
								   echo form_dropdown('car_type',$type,$CAR_TYPES,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$CAR_NAME,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Minimum halt time in min/hr</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="min_halt_time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per minimum booking time</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="price"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per kilometer</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
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
									<td><input type="text" name="area0" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $OWNER_NAME?>" 
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
						<th>(Commission by admin)Fixed</th>
						<th>(Commission by admin)Percentage</th>
						<th>Edit</th><th>Delete</th>
					</tr>
					
					<?php if(!empty($localflxprice) && isset($localflxprice))
					{
						foreach($localflxprice as $row): ?>
						<TR>
						<td><?php echo $row->car_type ?></td>
						<td><?php echo $row->car_name ?></td>
						<td><?php echo $row->ac_nonac ?></td>
						<td><?php echo $row->min_halt_time ?></td>
						<td><?php echo $row->price ?></td>
						<td><?php echo $row->per_km_price ?></td>
						<td><?php echo $row->area0 ?></td>
						<td><?php echo $row->area1 ?></td>
						<td><?php echo $row->area2 ?></td>
						<td><?php echo $row->area3 ?></td>
						<td><?php echo $row->area4 ?></td>
						<td><?php echo $row->comm_fixed ?></td>
						<td><?php echo $row->comm_percentage ?></td>
						<td>
						<a href="javascript: editlocalflexprice(<?php echo $c->ID ?>)">
							<img src='<?php echo base_url()?>"img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
							
						<td>
						<a>
							href="javascript: removelocalflexprice(<?php echo $c->ID ?>)">
							<img src='<?php echo base_url()?>"img/mono-icons/minus32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
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
					  action="<?php echo base_url()?>pricing/localPackage" >
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
								   echo form_dropdown('car_type',$type,$CAR_TYPES,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$CAR_NAME,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Package</td>
									<td><?php echo form_dropdown('package',$locals);?></td>
								</tr>
								<tr>
									<td>4hr/40km</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="extraprice"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Extra Rs/km</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="kilometerprice"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/hr</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
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
									<td><input type="text" name="area0" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
									<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $OWNER_NAME?>" 
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
							<th>4hr/40km</th>
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
						
						<?php if(!empty($localpackprice) && isset($localpackprice))
						{
							foreach($localpackprice as $row): ?>
							<TR>
							<td><?php echo $row->car_type ?></td>
							<td><?php echo $row->car_name ?></td>
							<td><?php echo $row->ac_nonac ?></td>
							<td><?php echo $row->package ?></td>
							<td><?php echo $row->extraprice ?></td>
							<td><?php echo $row->kilometerprice ?></td>
							<td><?php echo $row->hourprice ?></td>
							<td><?php echo $row->area0 ?></td>
							<td><?php echo $row->area1 ?></td>
							<td><?php echo $row->area2 ?></td>
							<td><?php echo $row->area3 ?></td>
							<td><?php echo $row->area4 ?></td>
							<td><?php echo $row->comm_fixed ?></td>
							<td><?php echo $row->comm_percentage ?></td>
							
							<td>
							<a href="javascript: editlocalflexprice(<?php echo $c->ID ?>)">
								<img src='<?php echo base_url()?>"img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
							</td>
							<td>
							<a>
								href="javascript: removelocalflexprice(<?php echo $c->ID ?>)">
								<img src='<?php echo base_url()?>"img/mono-icons/minus32.png' 
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
			<select id="outstationselbox" onchange="outstationsel(this.value);">
				<option value="Flexible">Flexible</option>
				<option value="Package">Package</option>
			</select>
			<div id="outstationFlexibledata" style="display: none">
				<div id='outstationFlexible'>
				<h3 align="center">Outstation Flexible Details</h3>
				<form name="outstationflexibleForm" id="outstationflexibleForm" method="POST" 
					  action="<?php echo base_url()?>pricing/outstationFlexible" >
				<table width="100%">
						<tr>																													<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php 
								   $js ='id="car_type" onChange="get_car_name(this.value);" ';
								   echo form_dropdown('car_type',$type,$CAR_TYPES,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$CAR_NAME,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Minmum booking time in hrs</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per minimum booking time</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="price"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Extra price in 1 hr</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="extraprice"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per kilometer</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
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
									<td><input type="text" name="area0" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $OWNER_NAME?>" 
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
						<th>(Commission by admin)Fixed</th>
						<th>(Commission by admin)Percentage</th>
						<th>Edit</th><th>Delete</th>
					</tr>
					
					<?php if(!empty($outflxprice) && isset($outflxprice))
					{
						foreach($outflxprice as $row): ?>
						<TR>
						<<td><?php echo $row->car_type ?></td>
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
						<a href="javascript: editoutstationflexprice(<?php echo $c->ID ?>)">
							<img src='<?php echo base_url()?>"img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
							
						<td>
						<a>
							href="javascript: removeoutstationflexprice(<?php echo $c->ID ?>)">
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
			<div id="outstationPackagedata" style="display: none">
				<div id='outstationPackage'>
				<h3 align="center">Outstation Package Details</h3>
				<form name="outstationPackageForm" id="outstationPackageForm" method="POST" 
					  action="<?php echo base_url()?>pricing/outstationPackage" >
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
								   echo form_dropdown('car_type',$type,$CAR_TYPES,$js);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td>
								<?php echo form_dropdown('car_name',array(0=>'--'),$CAR_NAME,"class='car_type'");?>
									</td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Package Name</td>
									<td><?php echo form_dropdown('package',$outstations);?></td>
								</tr>
								<tr>
									<td>10hr/100km	</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="extraprice"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Extra Rs/km</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="kilometerprice"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/hr</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
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
									<td><input type="text" name="area0" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 1 &nbsp;&nbsp;</td>
									<td><input type="text" name="area1" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 2 &nbsp;&nbsp;</td>
									<td><input type="text" name="area2" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 3 &nbsp;&nbsp;</td>
									<td><input type="text" name="area3" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Base operating area 4 &nbsp;&nbsp;</td>
									<td><input type="text" name="area4" value="<?php echo $OWNER_NAME?>" 
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
					
					<?php if(!empty($outflxprice) && isset($outflxprice))
					{
						foreach($outflxprice as $row): ?>
						<TR>
						<<td><?php echo $row->car_type ?></td>
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
						<a href="javascript: editoutstationpackprice(<?php echo $c->ID ?>)">
							<img src='<?php echo base_url()?>"img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
						</td>
							
						<td>
						<a>
							href="javascript: removeoutstationpackprice(<?php echo $c->ID ?>)">
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
	$.calculator.setDefaults({showOn: 'both', buttonImageOnly: true, buttonImage: '<?php echo base_url()?>calculator/calculator.png'});
	$('.basicCalculator').calculator();
	$('#sciCalculator').calculator({layout: $.calculator.scientificLayout});
	
	var localval = document.getElementById('localselbox').value;
	var outval = document.getElementById('outstationselbox').value;
	localsel(localval);
	outstationsel(outval);
	
	
	//Local Flexible Form Submit
	var localflexibleForm = { 
		target:        '#LocalFlexibleView', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	//Local Package Form Submit
	var localpackageForm = { 
		target:        '#LocalPackageView', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	//Outstation Flexible Form Submit
	var outstationflexibleForm = { 
		target:        '#OutstationFlexibleView', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	//Outstation Package Form Submit
	var outstationPackageForm = { 
		target:        '#outstationPackageView', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	$('#localflexibleForm').ajaxForm(localflexibleForm);
	$('#localpackageForm').ajaxForm(localpackageForm);
	
	$('#outstationflexibleForm').ajaxForm(outstationflexibleForm);
	$('#outstationPackageForm').ajaxForm(outstationPackageForm);
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