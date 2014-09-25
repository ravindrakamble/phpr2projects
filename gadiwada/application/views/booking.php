<?php $this->load->view('include/admin_header');?>


<div id="collapse4" class="body">	
	<h3>Booking</h3>
	<form name='agtbook' method="POST" action="<?php echo base_url()?>booking">
	<table width="100%" frame="box">
		<tr>
			<td>From Date :</td>
			<td><input name="fromdate" value="<?php echo $from ?>" required="true" type="text" id="fromdate" /></td>
			<td>To Date :</td>
			<td><input name="todate" value="<?php echo $to ?>" required="true" type="text" id="todate" /></td>
			<td style="width: 30%; vertical-align: top;">
			<input type="submit" name="btnSubmit" value="SHOW" class="btn btn-success" id="btnSubmit" />
			</td>
		</tr>
	</table>
	</form>
	<table  id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Car Type</th>
				<th>Car Name</th>
				<th>Car Number</th>
				<th>Purchase Year</th>
				<th>Agreement End Date</th>
				<TH></TH>
				<TH></TH>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($booking_info as $b){ ?>
		<TR>
			<td><?php echo $b['RECEIPT_DATE']?></td>
			<td><?php echo $b['TYPE_NAME']?></td>
			<td><?php echo $b['MODEL_NAME']?></td>
			<td><?php echo $b['CAR_NUMBER']?></td>
			<td><?php echo $b['PURCHASE_YEAR']?></td>
			<td><?php echo $b['AGREEMEST_END_DATE']?></td>
			<?php if($b['BOOKED_BY'] == 'agent' && $b['INV_ID'] != NULL):?>
			<td><label class="badge badge-success">BOOKED</label></td>
			<td><label class="label label-cancel">Cancel</label></td>
			<?php elseif($b['BOOKED_BY'] == 'customer' && $b['INV_ID'] != NULL):?>
			<td><label class="badge badge-warning">Booked By Travelder</label></td>
			<td><label class="label label-danger">Cancel</label></td>
			<?php else: ?>
			<td colspan="2"><label class="badge badge-info"> Book </label></td>
			<?php endif;?>
		<?php $numbers ++; 
		ECHO "</TR>";
		} ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
//Date Select From Datepicker start
var fromdate = $('#fromdate').datepicker(
{
	dateFormat: 'dd/mm/yy',
	minDate: 0
});
var todate = $('#todate').datepicker(
{
	dateFormat: 'dd/mm/yy', maxDate: '+7d',
		minDate: 0
});
//Date Select From Datepicker end
</script>
<?php $this->load->view('include/admin_footer');?>