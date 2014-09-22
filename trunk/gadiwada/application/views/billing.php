<?php $this->load->view('include/header');?>
<!-- content -->
<div class="content-boxs">
<style>
	.clr{
		color:#1797e3;
	}
</style>
<script>
$(function()
{
	$( "#rcptDate" ).datepicker(
	{
		dateFormat: 'dd/mm/yy',

	});

	$( "#return" ).datepicker(
	{
		dateFormat: 'dd/mm/yy',
	});

	$( "#onwReporting" ).datepicker(
	{
		ampm:true,
		timeOnly:true,
		useLocalTimezone:true,
		dateFormat: 'dd/mm/yy',

	});


	$( "#onwDeparture" ).datepicker(
	{
		ampm:true,
		useLocalTimezone:true,
		dateFormat: 'dd-mm-yy',
	});

$(function()
{

	var names = [
		<?php

		foreach($rcptAuto as $rcptData):
		foreach($rcptData as $x):
		foreach($x as $n):
		if(isset($x->name))
		echo '"'.$x->name.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var phones = [
		<?php

		foreach($rcptAuto as $rcptData):
		foreach($rcptData as $x):
		foreach($x as $n):
		if(isset($x->phone))
		echo '"'.$x->phone.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var nations = [
		<?php

		foreach($rcptAuto as $rcptData):
		foreach($rcptData as $x):
		foreach($x as $n):
		if(isset($x->nationality))
		echo '"'.$x->nationality.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var idproofs = [
		<?php

		foreach($rcptAuto as $rcptData):
		foreach($rcptData as $x):
		foreach($x as $n):
		if(isset($x->idproof))
		echo '"'.$x->idproof.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];


	// End of Reciept Data


	var from = [
		<?php

		foreach($busAuto as $busData):
		foreach($busData as $x):
		foreach($x as $n):
		if(isset($x->from))
		echo '"'.$x->from.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var to = [
		<?php

		foreach($busAuto as $busData):
		foreach($busData as $x):
		foreach($x as $n):
		if(isset($x->to))
		echo '"'.$x->to.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var boarding = [
		<?php

		foreach($busAuto as $busData):
		foreach($busData as $x):
		foreach($x as $n):
		if(isset($x->onw_board_pt))
		echo '"'.$x->onw_board_pt.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var bus = [
		<?php

		foreach($busAuto as $busData):
		foreach($busData as $x):
		foreach($x as $n):
		if(isset($x->bus_type))
		echo '"'.$x->bus_type.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	var travels = [
		<?php

		foreach($busAuto as $busData):
		foreach($busData as $x):
		foreach($x as $n):
		if(isset($x->travels))
		echo '"'.$x->travels.'",';
		endforeach;endforeach;endforeach; ?>
		"" ,];

	$( "#custName" ).autocomplete(
		{
			source: names
		});

	$( "#phone" ).autocomplete(
		{
			source: phones
		});

	$( "#nationality" ).autocomplete(
		{
			source: nations
		});

	$( "#idproof" ).autocomplete(
		{
			source: idproofs
		});

	// End of Reciept Data

	$( "#from" ).autocomplete(
		{
			source: from
		});

	$( "#to" ).autocomplete(
		{
			source: to
		});

	$( "#onwBoarding" ).autocomplete(
		{
			source: boarding
		});

	$( "#bustype" ).autocomplete(
		{
			source: bus
		});

	$( "#travels" ).autocomplete(
		{
			source: travels
		});

});


});

</script>

<script type="text/javascript">
function startCalc()
{
	interval = setInterval("calc()",1);
}
function calc()
{
	amount = document.busTicket.totamount.value;
	paid = document.busTicket.amt_paid.value;
	document.busTicket.amt_balance.value = (amount - paid);

}
function stopCalc()
{
	clearInterval(interval);
}

</script>
	<h3 align="center">
		<font color="#b4b658">
		<?php echo strtoupper($result['BUSINESS_NAME'])?> 
		</font>
		<span style="float:right;">
		[ USER:
		<i>
			<b>
				<?php echo strtoupper($this->session->userdata('username'));?>
			</b>
		</i>]&nbsp;&nbsp;
	</span>
	</h3>
	
	<form name="busTicket" method="post" action="<?php echo base_url();?>billing/save">
		
		<input type="hidden" name="agent_id" value="<?php echo $result['AGENT_ID'] ;?>"/>
		<input type="hidden" name="inventoryid" value="<?php echo $id ;?>"/>
		<table class="table table-bordered" align="center">
			<tr valign="top">
				<td class="clr" height="25">RECEIPT DATE</td>
				<td colspan="2"><input type="text" name="rcptDate" id="rcptDate" readonly="readonly" value="<?php echo date('d-m-Y');?>"/>	</td>
				<td class="clr" height="25">Bill No	</td>
				<td colspan="2">
					<input type="text" name="billno" id="billno" readonly="readonly" value="<?php echo $billno ?>"/>	</td>
			</tr>
			<tr>
				<td colspan="6">
					<u><i>Car Details</i></u>
				</td>
			</tr>
			<tr valign="top">
				<td class="clr">
					VEHICLE NO
				</td>
				<td>
					<input type="hidden" name="car_name" value="<?php echo $result['CAR_NUMBER'] ;?>"/>
					<span><?php echo $result['CAR_NUMBER'];?></span>
				</td>
				<td class="clr">
					VEHICLE TYPE
				</td>
				<td>
				<input type="hidden" name="car_type" value="<?php echo $result['TYPE_NAME'] ;?>"/>
					<span><?php echo $result['TYPE_NAME'];?></span>
				</td>
				<td class="clr">
					OWNER MOBILE
				</td>
				<td>
				<input type="hidden" name="owner_no" value="<?php echo $result['OWNER_NUMBER'] ;?>"/>
					<span><?php echo $result['OWNER_NUMBER'];?></span>
				</td>
			</tr>

			<tr>
				<td colspan="6">
					<u>
						<i>
							Journey Details
						</i>
					</u>
				</td>
			</tr>

			<tr valign="top">
				<td class="clr">DATE </td>
				<td>
					<input type="hidden" name="jourdate" value="<?php echo $this->session->userdata('journeydate') ;?>"/>
					<span><?php echo $this->session->userdata('journeydate');?></span></td>
				<td class="clr">TIME</td>
				<td>
					<input type="hidden" name="jourtime" value="<?php echo $time; ?> "/>
					<span><?php echo $time; ?></td>
				<td class="clr">PICK-UP</td>
				<td>
				
					<input type="hidden" name="area" value="<?php echo $this->session->userdata('area');?>"/>
					<input type="hidden" name="city" value="<?php echo $this->session->userdata('city');?>" />
					 		
				<span><?php echo $this->session->userdata('city').'<br/>'. 
					 $this->session->userdata('area');?></span></td>
			</tr>
			<tr valign="top">
				<td class="clr">DESTINATION</td>
				<td>
					<input type="hidden" name="destination" value="<?php echo '******'; ;?>"/>
					<span><?php echo '******';?></span></td>
				<td class="clr">FARE</td>
				<td>
					<input type="hidden" name="fare" value="<?php echo '******'; ;?>"/>
					<span><?php echo '*****';?></span></td>
				<td></td><td></td>
			</tr>
			<tr>
				<td colspan="6">
					<br />
					<hr />
				</td>
			</tr>
			<tr valign="top">
				<td class="clr">TOTAL AMOUNT *</td>
				<td colspan="2" ><input type="text" name="totamount" size="30" id="totamount"  class="decimal"/>	</td>
				<td class="clr">AMOUNT PAID</td>
				<td colspan="2" ><input type="text" name="amt_paid" size="30" id="amt_paid"  class="decimal" onFocus="startCalc();" onBlur="stopCalc();"/>
				</td>
			</tr>
			<tr>
				<td class="clr">REMARKS</td>
				<td colspan="2"><textarea name="remarks"  id="remarks" cols="24"></textarea> </td>
				<td class="clr">BALANCE</td>
				<td colspan="2"><input type="text" readonly="readonly" name="amt_balance" size="30" id="amt_balance"  class="decimal"/>	</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name='print' id='print' value="Print Bill" class="btn btn-info" /></td>
				<td colspan="2"><input type="submit"  name='sms' id='sms' value="Send SMS" class="btn btn-inverse" /></td>
				<td colspan="2"><input type="submit"  name='email' id='email' value="Send Email" class="btn btn-warning" /></td>
				
			</tr>
		</table>
	</form>
</div>
<?php $this->load->view('include/footer');?>