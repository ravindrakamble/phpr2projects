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
	/*foreach($info as $in)
	{*/
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
	/*}*/
}?>
	<div id='inventory_data'>
		<h3 align="center">Inventory Details</h3>
		<form name="inventory" id="inventory" method="POST" action="<?php echo base_url()?>inventory/show/<?php echo $action.'/'.$id; ?>">
		<?php 
		$type = array();
			$type['0']='--';
			    foreach($car_type as $c){
				  $type[$c->TYPE_NAME]=$c->TYPE_NAME;
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
							<td><?php echo form_dropdown('car_type',$type,$CAR_TYPES,$disable);?></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Car Details</h5></th>
						</tr>
						<tr>
							<td>Car Name</td>
							<td><input <?php echo $readonly ?> value="<?php echo $CAR_NAME?>" type="text" 
							name="car_name" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Car Number</td>
							<td><input <?php echo $readonly ?> type="text" value="<?php echo $CAR_NUMBER ?>" 
							name="car_no"  maxlength="20"/></td>
						</tr>
						<tr>
							<td>Purchase year</td>
							<td><input <?php echo $readonly ?> type="text" value="<?php echo $PURCHASE_YEAR?>"
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
							<td><input type="text" name="owner_name" value="<?php echo $OWNER_NAME?>" 
							maxlength="30"/></td>
						</tr>
						<tr>
							<td>Owner Number</td>
							<td><input type="text" name="owner_no" value="<?php echo $OWNER_NUMBER?>"
							 maxlength="12"/></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Agreement Details</h5></th>
						</tr>
						<tr>
							<td>Agreement start date</td>
							<td>
							<input type="text" name="agg_start" value="<?php echo $AGREEMEST_START_DATE?>" id="start"/>
							</td>
						</tr>
						<tr>
							<td>Agreement end date</td>
							<td>
							<input type="text" name="agg_end" value="<?php echo $AGREEMEST_END_DATE?>" id="end"/>
							</td>
						</tr>
						<tr>
							<td><input <?php if($AC == '1') echo 'checked= "checked"'?> type="checkbox" 
								name="ac" value="1"/> AC</td>
							<td><input <?php if($NON_AC == '1') echo 'checked= "checked"'?> type="checkbox" 
							name="nonac" value="1"/> Non-AC</td>
						</tr>
						<tr>
							<td><input <?php if($LOCAL == '1') echo 'checked= "checked"'?>  type="checkbox"
								 name="local" value="1"/> Local</td>
							<td><input <?php if($OUTSTATION == '1') echo 'checked= "checked"'?> type="checkbox" 
								name="outstation" value="1"/> Outstation</td>
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
	<div id='inventory_view'>
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
<div id='viewdetails' style="display:none">

</div>
<script type="text/javascript">
$(document).ready(function() {
	/*var inventory = { 
		target:        '#inventory_view', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){
			$("a.fancybox").fancybox({ 
					'overlayColor':	'#000'
				});
			$('#inventory').ajaxForm(inventory);			 
			jQuery.unblockUI();
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	$('#inventory').ajaxForm(inventory);*/
});

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
<script type="text/javascript">
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
</script>
<?php $this->load->view('include/footer');?>