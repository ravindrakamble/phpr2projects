<?php $this->load->view('include/header');?>

<!-- content -->
<div class="content-boxs">
	<div id='registrationForm'>
		<?php 
		$city = array();
			$city['0']='--';
			    foreach($cities as $c){
				  $city[$c->city_name]=$c->city_name;
			}
		?>
		<h3 align="center">Registration Details</h3>
		<form name="registration" method="POST" action="#">
			<table width="100%">
				<tr>																																						<td style="padding-left: 15%">
						<table>
						<tr>
							<td>Operator Business name</td>
							<td><input type="text" maxlength="30"/></td>
						</tr>
						<tr>
							<td>Type of business</td>
							<td><select></select></td>
						</tr>
						<tr>
							<td>Address line 1</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Address line 2</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>State</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>City</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						
						<tr>
							<td>Pin Code</td>
							<td><input type="text" maxlength="6"/></td>
						</tr>
						
					</table>
					</td>
					<td>
						<table>
						<tr>
							<td>Year of starting the business</td>
							<td><input type="text"  maxlength="4"/></td>
						</tr>
						<tr>
							<td>Website URL</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Corporation number</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>PAN Card number</td>
							<td><input type="text"  maxlength="15"/></td>
						</tr>
						<tr>
							<td>TAN Number</td>
							<td><input type="text" maxlength="12"/></td>
						</tr>
						<tr>
							<td>Other business</td>
							<td><select></select></td>
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
								<td width="10%"><input type="text" name='contact_name[]' id='contact_name'maxlength='30' /></td>
								<td  width="10%"><input type="email" name='contact_email[]' id='contact_email' maxlength="30"/></td>
								<td  width="10%"><input type="text" name='contact_phone[]' id='contact_phone' maxlength="12"/></td>
								<td  width="10%"><input type="text" name='contact_mobile[]' id='contact_mobile' maxlength="12"/></td>
								<td valign="top"  width="5%">
									<a href="javascript:contacts_add();"> <img src="<?php echo base_url()?>images/Knob Add.png" width=16 alt="Add"> </a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td style="padding-left: 40%"><input type="submit" name="submit" value="Submit" class="btn btn-info"/> </td>
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
</script>
<?php $this->load->view('include/footer');?>