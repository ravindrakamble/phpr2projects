<?php $this->load->view('include/admin_header');?>
<style>
table td, table th{
	/*padding: 3px 10px !important;*/
}
</style>
<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';?>
<?php
$i = 1;
$id = 0;
$CAR_TYPES = '';
$MODEL_NAME = '';
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
$car_model_id=0;
$disable = '';
$readonly = '';
if(isset($info) && !empty($info))
{
	foreach($info as $in)
	{
		$id = $info->ID;
		$CAR_TYPES = $info->CAR_TYPE;
		$CAR_NAME = $info->CAR_NAME;
		$MODEL_NAME = $info->MODEL_NAME;
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
	}
}?>

	<h3>Inventory Details</h3>
		<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
		<?php 
		$type = array();
			$type['0']='--';
			    foreach($car_type as $c){
				  $type[$c->ID]=$c->TYPE_NAME;
			}
		$features = array();
			    foreach($feature as $f){
				  $features[$f->FEATURE_NAME]=$f->FEATURE_NAME;
			}
		?>
			<table width="100%">
				<tr>																												<td style="padding-left: 15%">
						<table>
						<tr>
							<td>Car Type</td>
							<?php $js ='id="car_type" '.$disable.' onChange="get_car_name(this.value);" '; ?>
							<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$js);?></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Car Details</h5></th>
						</tr>
						<tr>
							<td>Car Name</td>
							
							<td>
							<?php if(isset($edtyp))
							{
								echo "<input type='text' readonly='true' value='".$MODEL_NAME."'>";
								echo "<input type='hidden' value='".$CAR_NAME."' name='car_name'>";
							}
							else
							{
								$js ='id="car_name" '.$readonly.' ';
								echo form_dropdown('car_name',array(0=>'--'),$car_model_id,$js);
								/*<!--<input <?php echo $readonly ?> value="<?php echo $CAR_NAME?>" type="text" 
								name="car_name" maxlength="20"/>-->*/
							}
							?>
							</td>
						</tr>
						<tr>
							<td>Car Number</td>
							<td><input <?php echo $readonly ?>  required type="text" value="<?php echo $CAR_NUMBER ?>" 
							name="car_no"  maxlength="20"/></td>
						</tr>
						<tr>
							<td>Purchase year</td>
							<td><input <?php echo $readonly ?> required type="text" value="<?php echo $PURCHASE_YEAR?>"
							name="year"  maxlength="4"/></td>
						</tr>
						<tr>
							<td>Car Features</td>
							<td><?php echo form_multiselect('car_features[]',$features,$CAR_FEATURES,$disable);?></td>
						</tr>
					</table>
					</td>
					<td>
						<table>
						<tr>
							<th colspan="2"><h5>Owner Details</h5></th>
						</tr>
						<tr>
							<td>Owner Name</td>
							<td><input type="text" required name="owner_name" value="<?php echo $OWNER_NAME?>" 
							maxlength="30"/></td>
						</tr>
						<tr>
							<td>Owner Number</td>
							<td><input type="text" required name="owner_no" value="<?php echo $OWNER_NUMBER?>"
							 maxlength="12"/></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Agreement Details</h5></th>
						</tr>
						<tr>
							<td>Agreement start date</td>
							<td>
							<input type="text" name="agg_start" required value="<?php echo $AGREEMEST_START_DATE?>" id="start"/>
							</td>
						</tr>
						<tr>
							<td>Agreement end date</td>
							<td>
							<input type="text" name="agg_end" required value="<?php echo $AGREEMEST_END_DATE?>" id="end"/>
							</td>
						</tr>
						<tr>
							<td><input required <?php if($AC == '1') echo 'checked= "checked"'?> type="radio" 
								name="ac_nonac" value="1"/> AC</td>
							<td><input <?php if($NON_AC == '1') echo 'checked= "checked"'?> type="radio" 
							name="ac_nonac" value="0"/> Non-AC</td>
						</tr>
						<tr>
							<td><input required <?php if($LOCAL == '1') echo 'checked= "checked"'?>  type="radio"
								 name="local_out" value="1"/> Local</td>
							<td><input <?php if($OUTSTATION == '1') echo 'checked= "checked"'?> type="radio" 
								name="local_out" value="0"/> Outstation</td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="<?php echo $butlabel;?>" class="btn btn-info"/> </td>
					<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
				</tr>
			</table>
		</form>  
		<div id="collapse4" class="body">	
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Car type</th>
					<th>Car name</th>
					<th>Car number</th>
					<th>Purchase year</th>
					<th>Agreement start date</th>
					<th>Agreement end date</th>
					<th>Status</th>
					<th width="13%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php $numbers = 1;
			foreach($result as $row){?>
				<TR>
				<td><?php echo $numbers;?></td>
				<td><?php echo $row->TYPE_NAME ?></td>
				<td><?php echo $row->MODEL_NAME ?></td>
				<td><?php echo $row->CAR_NUMBER ?></td>
				<td><?php echo $row->PURCHASE_YEAR ?></td>
				<td><?php echo $row->AGREEMEST_START_DATE ?></td>
				<td><?php echo $row->AGREEMEST_END_DATE ?></td>
			<?php  if($row->ISEXPIRED == '0')  $status ='Active';  else $status ='Inactive';?>
				<td>
				<?php 
				if($row->ISEXPIRED == '0')
				echo '<label class="label label-success">Active</label>';
				else
				echo '<label class="label label-danger">Inactive</label>';
				?>
				</td>
				<td><a href="<?php echo base_url().'inventory/edit/'.$row->ID ?>" 
					class="btn btn-warning btn-small">Edit</a>&nbsp;&nbsp;
					
					<a class="btn btn-success btn-small" 
						href="javascript:void(0)" onclick="viewdetails(<?php echo $row->ID ?>);"> View</a>
				</td>
				<?php $numbers++ ; ?>
				</tr>	
			<?php } ?>
			</tbody>
		</table>
		</div>
<script type="text/javascript">
function get_car_name(car_type)
{
	jQuery.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/get_car_name/"+car_type,
		data: car_type,
		success: function(response) {
			if(response == ""){
				$('#car_name').empty();
			}else{
				$('#car_name').empty();
				$('#car_name').html(response);
			}
			
		}
	});
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
	dateFormat: 'dd/mm/yy',
		minDate: 0,
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
	dateFormat: 'dd/mm/yy',
		minDate: 0,
	onRender: function(date)
	{
		return date.valueOf() <= start.date.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev)
{
	end.hide();
}).data('datepicker');
</script>

<script type="text/javascript">
var frmvalidator = new Validator("inventory");
frmvalidator.addValidation("car_type","dontselect=0","Please select your car type");
frmvalidator.addValidation("car_name","req","Please enter your Car Name");
frmvalidator.addValidation("car_no","req","Please enter your Car Number");
frmvalidator.addValidation("year","req","Please enter your Purchase year");
frmvalidator.addValidation("year","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("car_features[]","req",'Please select your Car Features');

frmvalidator.addValidation("owner_name","req","Please enter your Name");
frmvalidator.addValidation("owner_no","req","Please enter owner number");
frmvalidator.addValidation("owner_no","numeric",'Please Enter Numeric Value');

frmvalidator.addValidation("agg_start","req","Please enter Agreement start date");
frmvalidator.addValidation("agg_end","req","Please enter Agreement end date");
frmvalidator.addValidation("ac_nonac","req","Please select one option");
frmvalidator.addValidation("local_out","req","Please select one option");
</script>
<?php $this->load->view('include/admin_footer');?>