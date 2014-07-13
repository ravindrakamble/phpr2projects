<html>
<head><link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css" /></head>
<body>
<h3 align="center">
		<font color="#b4b658"><?php echo strtoupper($result['BUSINESS_NAME'])?> </font>
	</h3>
	<span style="float:right;">
		[ USER:
		<i>
			<b>
				<?php echo strtoupper($this->session->userdata('username'));?>
			</b>
		</i>]&nbsp;&nbsp;
	</span>
	<form name="busTicket" method="post" action="<?php echo base_url();?>billing/save">

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
					<span><?php echo $result['CAR_NAME'];?></span>
				</td>
				<td class="clr">
					VEHICLE TYPE
				</td>
				<td>
					<span><?php echo $result['CAR_TYPE'];?></span>
				</td>
				<td class="clr">
					OWNER MOBILE
				</td>
				<td>
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
				<td><span><?php echo $this->session->userdata('localjourneydate');?></span></td>
				<td class="clr">TIME</td>
				<td><span><?php echo '*****'; ?></span></td>
				<td class="clr">PICK-UP</td>
				<td><span><?php echo $this->session->userdata('localcity').'&nbsp;&nbsp;<br/>'. 
					 $this->session->userdata('localarea');?></span></td>
			</tr>
			<tr valign="top">
				<td class="clr">DESTINATION</td>
				<td><span><?php echo '******';?></span></td>
				<td class="clr">FARE</td>
				<td><span><?php echo '*****';?></span></td>
				<td></td><td></td>
			</tr>
			<tr>
				<td colspan="6">
					<br />
					<hr />
				</td>
			</tr>
			<tr valign="top">
				<td class="clr">TOTAL AMOUNT</td>
				<td colspan="2" ><input type="text" name="totamount" size="30"  value="<?php echo $TOTAL_AMOUNT ;?>" id="totamount"  class="decimal"/>	</td>
				<td class="clr">AMOUNT PAID</td>
				<td colspan="2" ><input type="text" name="amt_paid" size="30" value="<?php echo $AMOUNT_PAID ;?>" id="amt_paid"  class="decimal" onFocus="startCalc();" onBlur="stopCalc();"/>
				</td>
			</tr>
			<tr>
				<td class="clr">REMARKS</td>
				<td colspan="2"><textarea name="remarks"  id="remarks" cols="24"><?php echo $REMARKS ;?></textarea> </td>
				<td class="clr">BALANCE</td>
				<td colspan="2"><input type="text" value="<?php echo $BALANCE ;?>" readonly="readonly" name="amt_balance" size="30" id="amt_balance"  class="decimal"/>	</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name='print' id='print' value="Print Bill" class="btn btn-info" /></td>
				<td colspan="2"><input type="submit"  name='sms' id='sms' value="Send SMS" class="btn btn-inverse" /></td>
				<td colspan="2"><input type="submit"  name='email' id='email' value="Send Email" class="btn btn-warning" /></td>
				
			</tr>
		</table>
	</form>
</dody>
</html>