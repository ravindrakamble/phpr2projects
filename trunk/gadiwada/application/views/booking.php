<?php $this->load->view('include/header');?>
<script type="text/javascript" src="<?php echo base_url();?>js/gs_sortable.js"></script>
<script type="text/javascript">
var TSort_Data = new Array ('mytable', 'd', 's', 's','s','i','d','');
/*tsRegister();*/
</script>
<!-- content -->
<div class="content-boxs">
	<table width="70%" frame="box">
		<tr>
			<td style="border: none" align="center" width="100%" colspan="6"><h3>Booking</h3></td>
		</tr>
		<tr>
			<td>From Date :</td>
			<td><input name="fromdate" type="text" id="fromdate" /></td>
			<td>To Date :</td>
			<td><input name="todate" type="text" id="todate" /></td>
			<td><input type="submit" name="btnSubmit" value="SHOW" id="btnSubmit" />	</td>
		</tr>
	</table>
	<table width="100%" class="table table-bordered table-striped table-condensed" id="mytable">
		<tr>
			<th>Date</th>
			<th>Car Type</th>
			<th>Car Name</th>
			<th>Car Number</th>
			<th>Purchase Year</th>
			<th>Agreement End Date</th>
			<th></th>
		</tr>
		<tr>
			<td>12/03/2014</td>
			<td>4 seater</td>
			<td>Indica</td>
			<td>OR-05-AB-1990</td>
			<td>2012</td>
			<td>31/01/2014</td>
			<td><font color="green">BOOK</font></td>
		</tr>
		<tr>
			<td>14/03/2014</td>
			<td>10 seater</td>
			<td>Tavera</td>
			<td>OR-05-AB-1992</td>
			<td>2015</td>
			<td>31/06/2014</td>
			<td><font color="red">CANCEL</font></td>
		</tr>
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
<?php $this->load->view('include/footer');?>