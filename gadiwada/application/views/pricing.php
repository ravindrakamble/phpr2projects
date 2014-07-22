<?php $this->load->view('include/header');?>
<script type="text/javascript">
var TSort_Data = new Array ('inventory_table', 's', 's', 's','i','d','d','');
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
				<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
				<table width="100%">
						<tr>																															<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$disable);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td><input  value="<?php echo $CAR_NAME?>" type="text" 
									name="car_name" maxlength="20"/></td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Minmum halt time in min/hr</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per minimum booking time</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="price"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Price per kilometer</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="extraprice"  maxlength="4"/></td>
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
									<input type="text" name="cal" readonly="true" class="basicCalculator">
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 30%">
							<input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='LocalFlexibleView'>
				<table id="inventory_table" class="table table-bordered table-striped table-condensed">
					<tr>
						<th>Car type</th>
						<th>Car name</th>
						<th>Car number</th>
						<th>Purchase year</th>
						<th>Agreement start date</th>
						<th>Agreement end date</th>
						<th colspan="3" width="10%">Action</th>
					</tr>
					
					<?php if(!empty($result) && isset($result))
					{
						foreach($result as $row): ?>
						<TR>
						<td><?php echo $row->CAR_TYPE ?></td>
						<td><?php echo $row->CAR_NAME ?></td>
						<td><?php echo $row->CAR_NUMBER ?></td>
						<td><?php echo $row->PURCHASE_YEAR ?></td>
						<td><?php echo $row->AGREEMEST_START_DATE ?></td>
						<td><?php echo $row->AGREEMEST_END_DATE ?></td>
					<?php  if($row->ISEXPIRED == '0')  $status ='Active';  else $status ='Inactive';?>
						<td><span class="btn-danger btn-small"><?php echo $status ?></span></td>
						<td><a href="<?php echo base_url().'inventory/edit/'.$row->ID ?>" 
							class="btn btn-warning btn-small">Edit</a></td>
							
						<td><a class="btn btn-success btn-small" 
								href="javascript:void(0)" onclick="viewdetails(<?php echo $row->ID ?>);"> View</a></td>
						</TR>	
						<?php endforeach;
					} else { echo "</tr><td colspan='8'>No Result Found</td></tr>"; } ?>
				</table>
				</div>
			</div>
			<div id="localPackagedata" style="display: none">
				<div id='LocalPackage'>
				<h3 align="center">Local Package Details</h3>
				<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
					<table width="100%">
						<tr>																												<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$disable);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td><input  value="<?php echo $CAR_NAME?>" type="text" 
									name="car_name" maxlength="20"/></td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Airport</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Railway Station</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="price"  maxlength="4"/></td>
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
									<input type="text" name="cal" readonly="true" class="basicCalculator">
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 40%"><input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='LocalPackageView'>
					<table id="inventory_table" class="table table-bordered table-striped table-condensed">
						<tr>
							<th>Car type</th>
							<th>Car name</th>
							<th>Car number</th>
							<th>Purchase year</th>
							<th>Agreement start date</th>
							<th>Agreement end date</th>
							<th colspan="3" width="10%">Action</th>
						</tr>
						
						<?php if(!empty($result) && isset($result))
						{
							foreach($result as $row): ?>
							<TR>
							<td><?php echo $row->CAR_TYPE ?></td>
							<td><?php echo $row->CAR_NAME ?></td>
							<td><?php echo $row->CAR_NUMBER ?></td>
							<td><?php echo $row->PURCHASE_YEAR ?></td>
							<td><?php echo $row->AGREEMEST_START_DATE ?></td>
							<td><?php echo $row->AGREEMEST_END_DATE ?></td>
						<?php  if($row->ISEXPIRED == '0')  $status ='Active';  else $status ='Inactive';?>
							<td><span class="btn-danger btn-small"><?php echo $status ?></span></td>
							<td><a href="<?php echo base_url().'inventory/edit/'.$row->ID ?>" 
								class="btn btn-warning btn-small">Edit</a></td>
								
							<td><a class="btn btn-success btn-small" 
									href="javascript:void(0)" onclick="viewdetails(<?php echo $row->ID ?>);"> View</a></td>
							</TR>	
							<?php endforeach;
						} else { echo "</tr><td colspan='8'>No Result Found</td></tr>"; } ?>
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
				<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
				<table width="100%">
						<tr>																															<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$disable);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td><input  value="<?php echo $CAR_NAME?>" type="text" 
									name="car_name" maxlength="20"/></td>
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
									<td>Local calculator </td>
									<td>
									<input type="text" name="cal" readonly="true" class="basicCalculator">
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 30%">
							<input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='outstationFlexibleView'>
				<table id="inventory_table" class="table table-bordered table-striped table-condensed">
					<tr>
						<th>Car type</th>
						<th>Car name</th>
						<th>Car number</th>
						<th>Purchase year</th>
						<th>Agreement start date</th>
						<th>Agreement end date</th>
						<th colspan="3" width="10%">Action</th>
					</tr>
					
					<?php if(!empty($result) && isset($result))
					{
						foreach($result as $row): ?>
						<TR>
						<td><?php echo $row->CAR_TYPE ?></td>
						<td><?php echo $row->CAR_NAME ?></td>
						<td><?php echo $row->CAR_NUMBER ?></td>
						<td><?php echo $row->PURCHASE_YEAR ?></td>
						<td><?php echo $row->AGREEMEST_START_DATE ?></td>
						<td><?php echo $row->AGREEMEST_END_DATE ?></td>
					<?php  if($row->ISEXPIRED == '0')  $status ='Active';  else $status ='Inactive';?>
						<td><span class="btn-danger btn-small"><?php echo $status ?></span></td>
						<td><a href="<?php echo base_url().'inventory/edit/'.$row->ID ?>" 
							class="btn btn-warning btn-small">Edit</a></td>
							
						<td><a class="btn btn-success btn-small" 
								href="javascript:void(0)" onclick="viewdetails(<?php echo $row->ID ?>);"> View</a></td>
						</TR>	
						<?php endforeach;
					} else { echo "</tr><td colspan='8'>No Result Found</td></tr>"; } ?>
				</table>
				</div>
			</div>
			<div id="outstationPackagedata" style="display: none">
				<div id='outstationPackage'>
				<h3 align="center">Outstation Package Details</h3>
				<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
					<table width="100%">
						<tr>																												<td style="padding-left: 15%">
								<table>
								<tr>
									<th colspan="2"><h5>Car Details</h5></th>
								</tr>
								<tr>
									<td>Car Type</td>
									<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$disable);?></td>
								</tr>
								<tr>
									<td>Car Name</td>
									<td><input  value="<?php echo $CAR_NAME?>" type="text" 
									name="car_name" maxlength="20"/></td>
								</tr>
								<tr>
									<td>Ac/Non Ac</td>
									<td><?php echo form_dropdown('ac_nonac',array('AC' =>'AC','NON AC'=>'NON AC'));?></td>
								</tr>
								<tr>
									<th colspan="2"><h5>Price Details</h5></th>
								</tr>
								<tr>
									<td>Puri</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="time"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Puri+ Konark</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="price"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>10hr/100km	</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="extraprice"  maxlength="4"/></td>
								</tr>
								<tr>
									<td>Package Name</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="kilometerprice"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/km</td>
									<td><input  type="text" value="<?php echo $PURCHASE_YEAR?>"
									name="kilometerprice"  maxlength="5"/></td>
								</tr>
								<tr>
									<td>Extra Rs/hr</td>
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
									<td><input type="text" name="area3" value="<?php echo $OWNER_NAME?>" 
									maxlength="5"/></td>
								</tr>
								<tr>
									<td>Local calculator </td>
									<td>
									<input type="text" name="cal" readonly="true" class="basicCalculator">
									</td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 30%"><input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
							<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
						</tr>
					</table>
				</form>  
			</div>
				<div id='outstationPackageView'>
					<table id="inventory_table" class="table table-bordered table-striped table-condensed">
						<tr>
							<th>Car type</th>
							<th>Car name</th>
							<th>Car number</th>
							<th>Purchase year</th>
							<th>Agreement start date</th>
							<th>Agreement end date</th>
							<th colspan="3" width="10%">Action</th>
						</tr>
						
						<?php if(!empty($result) && isset($result))
						{
							foreach($result as $row): ?>
							<TR>
							<td><?php echo $row->CAR_TYPE ?></td>
							<td><?php echo $row->CAR_NAME ?></td>
							<td><?php echo $row->CAR_NUMBER ?></td>
							<td><?php echo $row->PURCHASE_YEAR ?></td>
							<td><?php echo $row->AGREEMEST_START_DATE ?></td>
							<td><?php echo $row->AGREEMEST_END_DATE ?></td>
						<?php  if($row->ISEXPIRED == '0')  $status ='Active';  else $status ='Inactive';?>
							<td><span class="btn-danger btn-small"><?php echo $status ?></span></td>
							<td><a href="<?php echo base_url().'inventory/edit/'.$row->ID ?>" 
								class="btn btn-warning btn-small">Edit</a></td>
								
							<td><a class="btn btn-success btn-small" 
									href="javascript:void(0)" onclick="viewdetails(<?php echo $row->ID ?>);"> View</a></td>
							</TR>	
							<?php endforeach;
						} else { echo "</tr><td colspan='8'>No Result Found</td></tr>"; } ?>
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