<?php $this->load->view('include/header');?>
<div class="content-boxs" align="center">

<p id="success" class="alert alert-success"></p>
<p id="error" class="alert alert-danger"></p>
<h2>Agent Login</h2>
	<form id="agentform" name="agentform">
		<table>
			<tr>
				<td>Email ID: </td>
				<td><input type="email" required="true" name="username" id="unm" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" required="true"  title='Enter username' name="password" id="password" /></td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="button" title='Enter Password' id="submit" class="btn" name="submit" value="LOGIN"/>
				</td>
			</tr>
		</table>
	</form>
</div>	
							
<!-- ENDS MAIN -->
<!-- <script type="text/javascript">
jQuery(document).ready(function($) {
	$("#error").hide();
	$("#success").hide();
});

function form_submit(){
	var username = document.getElementById('unm').value;
	var password = $("#psw").val();
	var dataString = 'username='+ username + '&password=' + password ;		
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>login/agent_login",
		data: dataString,
		success: function(data) {
			if(data==1)
			{
				setTimeout(function(){ window.location = "<?php echo base_url() ?>booking"; }, 500);
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
</script>-->
<script type="text/javascript">
$(document).ready(function() { 
	$("#error").hide();
	$("#success").hide();
	

	// on submit...
	$("#agentform #submit").click(function() {
		$("#error").hide();
		//required:
		
		//username
		var username = $("input#unm").val();
		if(username == ""){
			$("#error").fadeIn().text("Username required.");
			$("input#username").focus();
			return false;
		}
		
		//password
		var password = $("input#password").val();
		if(password == ""){
			$("#error").fadeIn().text("Password required");
			$("input#password").focus();
			return false;
		}
		
		
		
		// data string
		var dataString = 'username='+ username + '&password=' + password ;						         
		// ajax
		$.ajax({
			type:"POST",
			url: "<?php echo base_url();?>login/agent_login",
			data: dataString,
			success: function(data) {
			   if(data==1)
			   {
				  $("#success").html("Login Success");   
				  $("#success").fadeIn();
				  $("#agentform").fadeOut();
			  	  setTimeout(function(){ window.location = "<?php echo base_url() ?>booking"; }, 50);
			   }
			   else
			   {
				   $("#error").html("INVALID LOGIN PLEASE TYR AGAIN...")
				   $("#error").fadeIn();
			   }
			}
		});
	});  
    return false;
});
</script>
<?php $this->load->view('include/footer');?>