<?php $this->load->view('include/header');?>
<div class="content-boxs" align="center">
<h2>Admin Login</h2>
    <div id="admin_error" class="alert alert-error"></div>
<form id="adminform" name="adminform">
	<table>
		<tr>
			<td>Email ID: </td>
			<td><input type="email" required="true" name="username" id="adminunm" /></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" required="true"  name="password" id="adminpsw" /></td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="button" class="btn btn-success" name="submit" id="submit" value="LOGIN"/>
			</td>
		</tr>
	</table>
</form>
</div>	
							
<!-- ENDS MAIN -->
<script type="text/javascript">
/*function form_submit(){
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
}*/

jQuery(document).ready(function($) {   

	// hide messages 
	$("#admin_error").hide();
	
	// on submit...
	$("#adminform #submit").click(function() {
		$("#admin_error").hide();
		//required:
		
		//username
		var username = $("input#adminunm").val();
		if(username == ""){
			$("#admin_error").fadeIn().text("Username required.");
			$("input#username").focus();
			return false;
		}
		
		//password
		var password = $("input#adminpsw").val();
		if(password == ""){
			$("#admin_error").fadeIn().text("Password required");
			$("input#password").focus();
			return false;
		}
		
		
		
		// data string
		var dataString = 'username='+ username + '&password=' + password ;						         
		// ajax
		$.ajax({
			type:"POST",
			url: "<?php echo base_url();?>login/admin_login",
			data: dataString,
			success: function(data) {
			   if(data==1)
			   {
			  	  setTimeout(function(){ window.location = "<?php echo base_url() ?>admin_c/city"; }, 50);
			   }
			   else
			   {
				   $("#admin_error").html("INVALID LOGIN PLEASE TYR AGAIN...")
				   $("#admin_error").fadeIn();
			   }
			}
		});
	});  
    return false;
});
</script>	
<?php $this->load->view('include/footer');?>