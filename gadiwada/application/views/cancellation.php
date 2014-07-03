<?php $this->load->view('include/header');?>
<!-- content -->
<div class="content-boxs">
	<table width="100%" frame="box">
		<tr>
			<td style="border: none" align="center" width="100%" colspan="6"><h3>Booking Cancellation</h3></td>
		</tr>
		<tr>
			<td style="width: 30%"></td>
			<td>Booking Id :</td>
			<td><input name="txtBookingId" type="text" id="txtBookingId" /></td>
			<td>Phone Number :</td>
			<td><input name="txtPhn" type="text" id="txtPhn" /></td>
			<td style="width: 30%"><input type="submit" name="btnSubmit" value="Submit" id="btnSubmit" />	</td>
		</tr>
	</table>
</div>
<?php $this->load->view('include/footer');?>