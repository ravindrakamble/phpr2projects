<?php $this->load->view('include/admin_header');?>
<h3 align="center">Select value from Dropdown To Show/Edit Cancellation policy</h3>
<br />
<div align="center">
<form name="myform" method="post" action="<?php echo base_url()?>admin_c/cancellation_payers">
	<select name='payers' onchange="this.form.submit()">
		<option value="">--Select--</option>
		<option value="full_payers">Full Payers</option>
		<option value="partial_payers">Partial Payers</option>
	</select>
</form>
</div>
<?php $this->load->view('include/admin_footer');?>