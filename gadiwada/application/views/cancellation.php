<?php $this->load->view('include/header');?>
<!--<script type="text/javascript">
var TSort_Data = new Array ('dataTable', 'd', 's', 's','s','s','s','i','');
</script>-->
<!-- content -->
<div class="content-boxs">
	<form name="cancel" method="POST">
		<table align="center" width="70%" frame="box">
			<tr>
				<td style="border: none" align="center" width="100%" colspan="6"><h3>Booking Cancellation</h3></td>
			</tr>
			<tr>
				<td>Booking Id (Bill Number):</td>
				<td><input name="txtBookingId" maxlength="15" type="text" id="txtBookingId" /></td>
				<td>Phone Number :</td>
				<td><input name="txtPhn" type="text" id="txtPhn" /></td>
				<td><input type="button" maxlength="12" onclick="javascript:ticket_info();" name="btnSubmit" value="Submit" id="btnSubmit" /></td>
			</tr>
		</table>
	</form>
	<div id="info"></div>
	
	<?php 
	if(!array_key_exists("is_customer_logged_in",$this->session->all_userdata()))
	{
		echo "For Booking History Please <a class='btn-warning btn-small' href='javascript:login(&apos;cust&apos;);'>LogIn</a>";
	}
	else
	{  ?>
		<div id="booking_history">
			<table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
				<tr>
					<th>Date</th><th>Time</th><th colspan="2">Pickup point</th><th>Car type</th>
					<th>Car No</th><th>Booking id</th><th colspan="2">Action</th>
				</tr>
				<tr>
					<td colspan="2"></td><td>Area</td><td>City</td><td colspan="3"></td><td>Cancel</td><td>Resend sms</td>
				</tr>
				<?php if(!empty($details) && isset($details)):
						foreach($details as $det): ?>
					<tr>
						<td><?php echo $det ->JOURNEY_DATE ?> </td>
						<td><?php echo $det ->JOURNEY_TIME ?> </td>
						<td><?php echo $det ->AREA ?> </td>
						<td><?php echo $det ->CITY ?> </td>
						<td><?php echo $det ->CAR_TYPE ?> </td>
						<td><?php echo $det ->CAR_NO ?> </td>
						<td><?php echo $det ->BILL_NO ?> </td>
						<td>
							<a href="javascript: cancel()">
								<img src='<?php echo base_url()?>img/mono-icons/scissors32.png' 
								title='cancel' alt='cancel' class='alignleft' style='width:22px;' />
							</a>
						</td>
						<td>
							<a href="javascript: resend()">
								<img src='<?php echo base_url()?>img/mono-icons/mailopened32.png' 
								title='resend' alt='resend' class='alignleft' style='width:22px;' />
							</a>
						</td>
					</tr>
				<?php endforeach; endif; ?>
			</table>
		</div>
	<?php } ?>
</div>
<script type="text/javascript">
$(document).ready(function($) {
var frmvalidator = new Validator("cancel");
frmvalidator.addValidation("txtBookingId","req","Please enter your Booking Id");
frmvalidator.addValidation("txtBookingId","numeric");
frmvalidator.addValidation("txtPhn","req","Please enter your phone number");
frmvalidator.addValidation("txtPhn","numeric");
});
function ticket_info()
{
	var id = $("input[name='txtBookingId']").val();
	var phone = $("input[name='txtPhn']").val();
	var datastring = 'bookingId='+id
					 +'&txtPhn='+phone;
					 
	jQuery.ajax({
		type:'POST',
		data:datastring,
		url:'<?php echo base_url()?>cancellation/ticket_info',
		success:function(responce){
			$("#info").html(responce);
		}
	});
}
function ticket_cancel(id)
{
	jQuery.ajax({
		type:'POST',
		url:'<?php echo base_url()?>cancellation/ticket_cancel/'+id,
		success:function(responce){
			$.growlUI('Your Ticket <br>has been cancelled !');
			$("input[name='txtBookingId']").val('');
			$("input[name='txtPhn']").val('');
			window.location.reload(); 
		}
	});
}
</script>
<?php $this->load->view('include/footer');?>