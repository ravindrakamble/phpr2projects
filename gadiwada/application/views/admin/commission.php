<?php $this->load->view('include/admin_header');?>
<h3 align="center">Select value from Dropdown To Show/Edit Commission</h3>
<br />
<div align="center">
<form name="myform" method="post" action="<?php echo base_url()?>admin_c/commission_select">
	<select name='comm' onchange="this.form.submit()">
		<option value="">--Select--</option>
		<option value="local_flexible">Local Flexible Commission</option>
		<option value="local_package">Local Package Commission</option>
		<option value="outstation_flexible">Outstation Flexible Commissiom</option>
		<option value="outstation_package">Outstation Package Commissiom</option>
	</select>
</form>
</div>
<?php $this->load->view('include/admin_footer');?>