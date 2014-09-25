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
			<?php if($b['BOOKED_BY'] == 'agent'):?>
			<td><label class="label label-success">BOOKED</label></td>
			<?php else: ?>
			<td><label class="label label-success">Booked By Travelder</label></td>
			<?php endif;?>
			<td><label class="label label-danger">Cancel</label></td>
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
	dateFormat: 'dd/mm/yy'
});
var todate = $('#todate').datepicker(
{
	dateFormat: 'dd/mm/yy'
});
//Date Select From Datepicker end
</script>
<?php $this->load->view('include/admin_footer');?>