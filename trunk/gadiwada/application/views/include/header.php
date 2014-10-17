<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
		<title>Book a taxi | Book a cab | India | travelder.com | gadivada.com</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css">
		<!--<link href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>-->
		<!--Templete CSS  -->
		<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<!--<link href="<?php echo base_url()?>css/responsiveslides.css" rel="stylesheet" type="text/css"  media="all" />-->
		<!--Templete CSS End -->
		<!--<link href='<?php echo base_url();?>css/datepicker.css' rel='stylesheet' type='text/css'/>-->
		<link href='<?php echo base_url();?>css/bootstrap.css' rel='stylesheet' type='text/css'/>
		
		
        <link rel="stylesheet" href="<?php echo base_url();?>css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
		<!--Jquery Tab CSS-->
		<link href="<?php echo base_url()?>css/ion.tabs.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/ion.tabs.skinBordered.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/ion.tabs.skinFlat.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/normalize.css" rel="stylesheet" type="text/css"  media="all" />
		<!--Jquery Tab CSS End -->
		
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
		<script src="<?php echo base_url()?>js/bootstrap.js"></script>
		<!--<script src="<?php echo base_url()?>js/bootstrap-datepicker.js"></script>-->
		
		<script type="text/javascript" src="<?php echo base_url();?>js/gs_sortable.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.fancybox.pack.js?v=2.1.0">
		</script>
        <script type="text/javascript" src="<?php echo base_url()?>js/gen_validatorv4.js"></script>
        <script src="<?php echo base_url();?>js/jquery.numeric.js"></script>
		<!--Block UI Start-->
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
		<!--Block UI End-->
		
		<!--Calculator start-->
		<!--<link rel="stylesheet" href="<?php echo base_url();?>calculator/jquery.calculator.css">
		<script src="<?php echo base_url();?>calculator/jquery.plugin.js"></script>
		<script src="<?php echo base_url();?>calculator/jquery.calculator.js"></script>-->
		<!--Calculator end-->

		<!--<script src="<?php echo base_url()?>js/responsiveslides.min.js"></script>-->
		<!--Jquery Tab JS-->
		<!--<script src="<?php echo base_url()?>js/ion-tabs/ion.tabs.min.js"></script>
		<script src="<?php echo base_url()?>js/vendor/jquery-1.10.2.min.js"></script>-->
		<!--Jquery Tab JS END-->
		

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54184848-1', 'auto');
  ga('send', 'pageview');
</script>
	</head>
	<body>
		<!--start-header-->
		<div class="header">
			<!--start-wrap-->
			<div class="wrap">
				<!--start-top-header-->
				<div class="top-header">
					<div class="top-header-left">
					<div class="logo">
						<a href="index.html"><img src="<?php echo base_url()?>images/logo1.png" title="logo" /></a>
					</div>
					</div>
					<div class="top-header-right">
						<div class="top-header-contact-info">
							<p>GET FREE CONSULTATION:</p>
							<span>+91 7259164098</span>
						</div>
						<div class="top-header-contact-account">
							<div class="sub-about-grid-social">
								<ul>
									<li><a href="#"><img src="<?php echo base_url()?>images/facebook.png" title="facebook"></a></li>
									<li><a href="#"><img src="<?php echo base_url()?>images/twitter.png" title="Twiiter"></a></li>
									
									<li><a href="#"><img src="<?php echo base_url()?>images/gpluse.png" title="Google+"></a></li>
									<!--<li><a href="javascript:parent.jQuery.fancybox.open({href :'#signup'});">
											<img src="<?php echo base_url()?>images/login.jpg" title="Login">
										</a>
									</li>-->
									&nbsp;&nbsp;
									<?php if($this->session->userdata('type') == 'customer' && $this->session->userdata('is_customer_logged_in') == 'ture' ){
									/*echo "<a href='".base_url()."login/logout'>
											Logout
										</a>";*/
									} 
									elseif($this->session->userdata('type') == 'agent' && $this->session->userdata('is_agent_logged_in') == 'ture' ){
									echo "<a href='".base_url()."booking'>
											Agent View
										</a>";
									}
									
									elseif($this->session->userdata('type') == 'admin' && $this->session->userdata('is_admin_logged_in') == 'ture' ){
									echo "<a href='".base_url()."admin_c/city'>
											Admin View
										</a>";
									}
									else {
										echo 
									"<li><a href='javascript:login(&apos;cust&apos;);'>
											My Account
										</a>
									</li>" ;
									}
									?>
									&nbsp;&nbsp;&nbsp;
									<?php if($this->session->userdata('is_login') == 'ture' ){
									echo "<a href='".base_url()."login/logout'>
											Logout
										</a>";
									}
									else{
									echo "<a href='".base_url()."agent'>
											Agent Login
										</a>";
									}
									?>
								</ul>
							</div>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-top-header-->
				<!--start-main-header-->
				<div class="main-header">
					<div class="top-nav">
						<ul>
							<li <?php if(isset($search) && !empty($search) ) echo "class='active'"; ?>>
								<a href="<?php echo base_url()?>search">Book</a></li>
								
							
								
							<li <?php if(isset($cancellation)&& !empty($cancellation)) echo "class='active'"; ?> >
								<a href="<?php echo base_url()?>cancellation">Cancel</a></li>
							
						<?php
							if($this->session->userdata('type') != 'agent' && $this->session->userdata('is_agent_logged_in') != 'ture'):?>
							
							<li  <?php if(isset($registration)&& !empty($registration)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>registration"> Registration </a></li>
							<?php endif;?>
							
							<li <?php if(isset($about)&& !empty($about)) echo "class='active'"; ?> >
							<a href="<?php echo base_url()?>home/about_us">About Us</a></li>
							
							<li <?php if(isset($policy)&& !empty($policy)) echo "class='active'"; ?> >
							<a href="<?php echo base_url()?>home/privacy_policy">Privacy Policy</a></li>
							
							<li <?php if(isset($terms)&& !empty($terms)) echo "class='active'"; ?> >
						<a href="<?php echo base_url()?>home/terms_and_canditions">Terms & Canditions</a></li>
							
							<li <?php if(isset($contact_us)&& !empty($contact_us)) echo "class='active'"; ?> >
							<a href="<?php echo base_url()?>home/contact_us">Contact Us</a></li>
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!--End-main-heade-->
			</div>
		</div>
		<div class="clear"> </div>
<div id="travelAgent" style="display: none">
	<p class="alert alert-error" id='error'></p>
	<p class="alert alert-success" id='success'></p>
	<h4>Login</h4>
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="email" required="" name="username" id="username" maxlength='30'/> </td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" required="" name="password" id="loginpassword" maxlength='40'/> </td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="button" onclick="return checkLogin();" name="submit" value="Submit" class="btn btn-info"/>
			</td>
		</tr>
	</table>
</div>
<div id="signup" style="display: none">
	<form name="signup" id='signup' method="POST">
		<table>
			<tr>
				<td><font color="#26819b">Already Registered Please</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				<td>
				<a  class="btn-small btn-warning" href="javascript:parent.jQuery.fancybox.open({href :'#travelAgent'});">LOGIN</a>
				</td>
			</tr>
			<tr><td colspan="2"><h4>Create a new account</h4></td></tr>
			<tr>
				<td>Enter your name:</td>
				<td><input type="text" required="true" name="name" id="name" maxlength='30'/> </td>
			</tr>
			<tr>
				<td>Enter  email id:</td>
				<td><input type="email" required="true" name="email" id="email" maxlength='35'/> </td>
			</tr>
			<tr>
				<td>Enter your mobile number:</td>
				<td><input type="tel" required="true" name="phone" id="phone" maxlength='10'/> </td>
			</tr>
			<tr>
				<td>Enter password:</td>
				<td><input type="password" required="true" name="password" id="signpassword" maxlength='15'/> </td>
			</tr>
			<tr>
				<td>Retype password:</td>
				<td><input type="password" required="true" name="repassword"  id="repassword" maxlength='15'/> </td>
			</tr>
			<tr>
				<!--  onclick="return customer_register();" -->
				<td><input type="submit" name="submit" value="Submit" class="btn btn-info"/> </td>
				<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
			</tr>
			<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
		</table>
	</form>
</div>
<script type="text/javascript">
var type ='';
function login(type1)
{
	if(type1 == 'agent')
	{
		type = 'agent';
		parent.jQuery.fancybox.open({href :'#travelAgent'});
	}
	else{
		type = 'cust';
		parent.jQuery.fancybox.open({href :'#signup'});
	}
}
function IsPhone(phone){
	var regex = /\d{10}$/;
	return regex.test(phone);
}
function checkLogin()
{
	var username = $('input#username').val();	
	var password = $('input#loginpassword').val();
	var dataString = 'username='+ username
					+'&password=' + password
					+'&type=' + type
	jQuery.ajax({
		type:"POST",
		url: "<?php echo base_url();?>login/checkLogin",
		data: dataString,
		success: function(data)
		{
			if(data==0)
			{
				jQuery("#error").html("Please check username and password !!!")
			    jQuery("#error").fadeIn();
			    setTimeout(function(){ jQuery("#error").fadeOut(); }, 3500);
			}
			else{
				if(type == 'agent'){
				    setTimeout(function(){ window.location = "<?php echo base_url()?>booking"; }, 50);
				}
				else
				{
					window.location.reload(true);
				    setTimeout(function(){ window.location = "<?php echo base_url()?>"; }, 50);
				}
			}
		}
	});  			
}
//function customer_register()
$("#signup").submit(function(e)
{
	var name = $('input#name').val();	
	var email = $('input#email').val();
	var phone = $('input#phone').val();
	var password = $('input#signpassword').val();
	var confirm_password = $('input#repassword').val();
	var dataString = 'name='+name
					+ '&email='+email			
					+ '&phone='+phone			
					+ '&password='+password;
					
	//var mobile = $("input#phone").val();
	if(!IsPhone(phone)){
		alert("Please enter valid mobile number.")
		return false;
	}	
	if(password == confirm_password)
	{			
		jQuery.ajax({
			type:"POST",
			url: "<?php echo base_url();?>login/create_customer_login",
			data: dataString,
			success: function(res)
			{
				if(res == '1'){
					$.blockUI({ theme: true,baseZ: 99999999, message: "<h5>Your account created successfully please Login...</h5>" }) 
				    setTimeout(function(){ window.location = "<?php echo base_url() ?>"; }, 2000);
				}
				else{
					$.blockUI({ message: "<h5>Please try again...</h5>" }) 	
				}
			}
		}); 
	}
	else{
		alert("Your password and confirm password not match.");
		return false;
	}		 			
});
$(document).ready(function(){
	$('#error').hide();
	$('#success').hide();
});
</script>
