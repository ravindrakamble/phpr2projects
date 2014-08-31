<?php $this->load->view('include/header');?>
<div class="content-boxs" align="center">
<h2>Admin Login</h2>
	<table>
		<tr>
			<td>Email ID: </td>
			<td><input type="email" required="true" name="username" id="unm" /></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" required="true"  name="password" id="psw" /></td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="button" onclick="form_submit();" class="btn" name="submit" value="LOGIN"/>
			</td>
		</tr>
	</table>
</div>	
							
<!-- ENDS MAIN -->
<script type="text/javascript">
function form_submit(){
	var username = document.getElementById('unm').value;
	var password = $("#psw").val();
	var dataString = 'username='+ username + '&password=' + password ;		
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>login/admin_login",
		data: dataString,
		success: function(data) {
			if(data==1)
			{
				setTimeout(function(){ window.location = "<?php echo base_url() ?>admin_c/city"; }, 500);
			}
			else
			if(data==0)
			{
				alert("Please Enter correct Username & password.")
			}
			else
			{
				alert("Invalid login!")
			}
		}
	});		
}
</script>	
<?php $this->load->view('include/footer');?>