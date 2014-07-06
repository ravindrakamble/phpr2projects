<?php $this->load->view('include/header');?>
<!-- content -->
<div class="content-boxs">
	<div id='registrationForm'>
		<?php 
		$city = array();
			$city['--']='--';
			    foreach($cities as $c){
				  $city[$c->city_name]=$c->city_name;
			}
		?>
		<?php if(isset($retmsg) && !empty($retmsg)){
			echo '<div class="alert alert-success">
			    <a href="#" class="close" data-dismiss="alert">&times;</a>
			   <strong>Success!</strong>&nbsp;&nbsp;'. $retmsg.
			'</div>';
		} ?>
		<p class="info-success"></p>
		<h3 align="center">Registration Details</h3>
		<form name="registration" id='registration' method="POST" action="<?php echo base_url()?>registration">
			<table width="100%">
				<tr>																												<td style="padding-left: 15%">
						<table>
						<tr>
							<td>Operator Business name</td>
							<td><input type="text" name="bname" maxlength="30"/></td>
						</tr>
						<tr>
							<?php $btype = array('--' =>'--',
								'Individual' =>'Individual',
								'Proprietor' =>'Proprietor',
								'Partnership' =>'Partnership',
								'LLC' =>'LLC',
								'Pvt Ltd' =>'Pvt Ltd',
								'Public Ltd' =>'Public Ltd');?>
							<td>Type of business</td>
							<td><?php echo form_dropdown('btype',$btype);?></td>
						</tr>
						<tr>
							<td>Address line 1</td>
							<td><input type="text" name="add1" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Address line 2</td>
							<td><input type="text" name="add2" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type="text" name="country" maxlength="20"/></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" name="state" maxlength="20"/></td>
						</tr>
						<tr>
							<td>City</td>
							<td><?php echo form_dropdown('city',$city);?></td>
						</tr>
						
						<tr>
							<td>Pin Code</td>
							<td><input type="text" name="pincode" maxlength="6"/></td>
						</tr>
						
					</table>
					</td>
					<td>
						<table>
						<tr>
							<td>Year of starting the business</td>
							<td><input type="text" name='byear'  maxlength="4"/></td>
						</tr>
						<tr>
							<td>Website URL</td>
							<td><input type="text" name="burl" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Corporation number</td>
							<td><input type="text" name="corpno" maxlength="20"/></td>
						</tr>
						<tr>
							<td>PAN Card number</td>
							<td><input type="text" name="pan"  maxlength="15"/></td>
						</tr>
						<tr>
							<td>TAN Number</td>
							<td><input type="text" name="tan" maxlength="12"/></td>
						</tr>
						<tr>
							<?php $other = array('' =>'--',
								'Flight booking' =>'Flight booking',
								'Train booking' =>'Train booking',
								'Hotel booking' =>'Hotel booking');?>
							<td>Other business</td>
							<td><?php echo form_dropdown('other',$other);?></td>
						</tr>
						<tr>
							<td>Email Id (Username)</td>
							<td><input type="email" name="username" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password" maxlength="30"/></td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<table id='contacts' class="table table-bordered">
							<tr><td colspan="5"><h4 align="center">Contacts</h4></td></tr>
							<tr><th>Name</th><th>Email</th><th>Phone</th><th>Mobile</th><th></th></tr>
							<tr>
								<td width="10%"><input type="text" name='contact_name[]' id='contact_name'
								maxlength='30' /></td>
								<td  width="10%"><input type="email" name='contact_email[]' id='contact_email'
								 maxlength="30"/></td>
								<td  width="10%"><input type="text" name='contact_phone[]' id='contact_phone' 
								maxlength="12"/></td>
								<td  width="10%"><input type="text" name='contact_mobile[]' id='contact_mobile' 
								maxlength="12"/></td>
								<td valign="top"  width="5%">
									<a href="javascript:contacts_add();"> 
										<img src="<?php echo base_url()?>images/Knob Add.png" width=16 alt="Add"> 
									</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td style="padding-left: 40%"><input type="submit" name="submit" value="Submit" 
					class="btn btn-info"/> </td>
					<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
				</tr>
			</table>
		</form>  
	</div>
</div>
<script type="text/javascript">
$(document).ready(function($) {
});
function contacts_add()
{
	var appendTxt = "<tr><td width='10%'><input type='text' name='contact_name[]' id='contact_name'maxlength='30' /></td><td  width='10%'><input type='email' name='contact_email[]' id='contact_email' maxlength='30'/></td><td  width='10%'><input type='text' name='contact_phone[]' id='contact_phone' maxlength='12'/></td><td  width='10%'><input type='text' name='contact_mobile[]' id='contact_mobile' maxlength='12'/></td><td width='5%' valign='top'><a onclick='deleteRow(this)'><img style='margin-top:5px;' class='del' src='<?php echo base_url()?>images/Knob Remove Red.png' width=16 alt='Remove'></a></td></tr>";
		$('#contacts tr:last').after(appendTxt);
}
function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('contacts').deleteRow(i);
}
var frmvalidator = new Validator("registration");
frmvalidator.addValidation("bname","req","Please enter your Business Name");
frmvalidator.addValidation("bname","alpha","Alphabetic chars only");
frmvalidator.addValidation("btype","dontselect=--",'Please select your Business Type');
frmvalidator.addValidation("add1","req","Please enter your Address");
frmvalidator.addValidation("country","req","Please enter your country");
frmvalidator.addValidation("country","alpha","Please enter valid country name");
frmvalidator.addValidation("city","dontselect=--","Please select your City");
frmvalidator.addValidation("pincode","req","Please enter your pincode");
frmvalidator.addValidation("pincode","numeric");
frmvalidator.addValidation("byear","req","Please enter Year of starting the business");
frmvalidator.addValidation("byear","numeric");
frmvalidator.addValidation("corpno","req","Please enter Corporation number");
frmvalidator.addValidation("pan","req","Please enter pan card number");
</script>
<?php $this->load->view('include/footer');?>