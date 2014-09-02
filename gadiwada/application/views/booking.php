<?php $this->load->view('include/admin_header');?>


<div id="collapse4" class="body">	
	<h3>Booking</h3>
	<table width="100%" frame="box">
		<tr>
			<td>From Date :</td>
			<td><input name="fromdate" type="text" id="fromdate" /></td>
			<td>To Date :</td>
			<td><input name="todate" type="text" id="todate" /></td>
			<td style="width: 30%"><input type="submit" name="btnSubmit" value="SHOW" id="btnSubmit" />	</td>
		</tr>
	</table>
	<table  id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Car Type</th>
				<th>Car Name</th>
				<th>Car Number</th>
				<th>Purchase Year</th>
				<th>Agreement End Date</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($booking_info as $b){ ?>
		<!--DATA-->
		<?php $numbers ++; 
		 } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
//Date Select From Datepicker start
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var fromdate = $('#fromdate').datepicker(
{
	format:'dd/mm/yyyy',
	onRender: function(date)
	{
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev)
{
	if (ev.date.valueOf() > todate.date.valueOf())
	{
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		todate.setValue(newDate);
	}
	fromdate.hide();
	$('#todate')[0].focus();
}).data('datepicker');
var todate = $('#todate').datepicker(
{
	format:'dd/mm/yyyy',
	onRender: function(date)
	{
		return date.valueOf() <= fromdate.date.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function(ev)
{
	todate.hide();
}).data('datepicker');
//Date Select From Datepicker end
</script>
<?php $this->load->view('include/admin_footer');?>