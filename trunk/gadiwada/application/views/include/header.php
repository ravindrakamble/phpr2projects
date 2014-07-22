<!DOCTYPE HTML>
<html>
	<head>
		<title>Gadivada</title>
		<link href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' rel='stylesheet' type='text/css'>
		<!--Templete CSS  -->
		<link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<!--<link href="<?php echo base_url()?>css/responsiveslides.css" rel="stylesheet" type="text/css"  media="all" />-->
		<!--Templete CSS End -->
		<link href='<?php echo base_url();?>css/datepicker.css' rel='stylesheet' type='text/css'/>
		<link href='<?php echo base_url();?>css/bootstrap.css' rel='stylesheet' type='text/css'/>
		
		
        <link rel="stylesheet" href="<?php echo base_url();?>css/jquery.fancybox.css?v=2.1.0" type="text/css" media="screen" />
		<!--Jquery Tab CSS-->
		<!--<link href="<?php echo base_url()?>css/ion.tabs.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/ion.tabs.skinBordered.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/ion.tabs.skinFlat.css" rel="stylesheet" type="text/css"  media="all" />
		<link href="<?php echo base_url()?>css/normalize.css" rel="stylesheet" type="text/css"  media="all" />-->
		<!--Jquery Tab CSS End -->
		
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="<?php echo base_url()?>js/bootstrap.js"></script>
		<script src="<?php echo base_url()?>js/bootstrap-datepicker.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url();?>js/gs_sortable.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.fancybox.pack.js?v=2.1.0"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/gen_validatorv4.js"></script>
        <script src="<?php echo base_url();?>js/jquery.numeric.js"></script>
		<!--Block UI Start-->
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
		<!--Block UI End-->
		
		<!--Calculator start-->
		<link rel="stylesheet" href="<?php echo base_url();?>calculator/jquery.calculator.css">
		<script src="<?php echo base_url();?>calculator/jquery.plugin.js"></script>
		<script src="<?php echo base_url();?>calculator/jquery.calculator.js"></script>
		<!--Calculator end-->

		<!--<script src="<?php echo base_url()?>js/responsiveslides.min.js"></script>-->
		<!--Jquery Tab JS-->
		<!--<script src="<?php echo base_url()?>js/ion-tabs/ion.tabs.min.js"></script>
		<script src="<?php echo base_url()?>js/vendor/jquery-1.10.2.min.js"></script>-->
		<!--Jquery Tab JS END-->
		
	</head>
	<body>
		<!-----start-header----->
		<div class="header">
			<!---start-wrap---->
			<div class="wrap">
				<!---start-top-header---->
				<div class="top-header">
					<div class="top-header-left">
						<p>Travel Agency</p>
						<p>GADAVADA</p>
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
									<li><a href="#"><img src="<?php echo base_url()?>images/rss.png" title="Rss"></a></li>
									<li><a href="#"><img src="<?php echo base_url()?>images/gpluse.png" title="Google+"></a></li>
									<!--<li><a href="javascript:parent.jQuery.fancybox.open({href :'#signup'});">
											<img src="<?php echo base_url()?>images/login.jpg" title="Login">
										</a>
									</li>-->
									&nbsp;&nbsp;
									<?php if($this->session->userdata('type') == 'customer' && $this->session->userdata('is_customer_logged_in') == 'ture' ){
									echo "<a href='".base_url()."login/logout'>
											Logout
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
									<?php if($this->session->userdata('type') == 'agent' && $this->session->userdata('is_agent_logged_in') == 'ture' ){
									echo "<a href='".base_url()."login/logout'>
											Logout
										</a>";
									}
									else {
										
										echo 
									"<li><a href='javascript:login(&apos;agent&apos;);'>
											Travel Agent
										</a>
									</li>" ;
									}
									?>
								</ul>
							</div>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="clear"> </div>
				</div>
				<!---End-top-header---->
				<!----start-main-header----->
				<div class="main-header">
					<div class="logo">
						<a href="index.html"><img src="<?php echo base_url()?>images/logo1.png" title="logo" /></a>
					</div>
					<div class="top-nav">
						<ul>
							<li <?php if(isset($search) && !empty($search) ) echo "class='active'"; ?>>
								<a href="<?php echo base_url()?>search">Search</a></li>
								
							
								
							<li <?php if(isset($cancellation)&& !empty($cancellation)) echo "class='active'"; ?> >
								<a href="<?php echo base_url()?>cancellation">Cancellation</a></li>
							
							
							
							<li  <?php if(isset($registration)&& !empty($registration)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>registration"> Registration </a></li>
							
							
							<?php if($this->session->userdata('type') == 'agent' && $this->session->userdata('is_agent_logged_in') == 'ture' ) { ?>
							<li <?php if(isset($inventory) || isset($booking) || isset($pricing) || isset($billing) ) echo "class='active dropdown'" ; else echo "class='dropdown'" ; ?> >
								<a  class="dropdown-toggle" data-toggle="dropdown" 
									href=""> 
									Agent <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li <?php if(isset($inventory)&& !empty($inventory)) echo "class='active'"; ?>>
										<a href="<?php echo base_url()?>inventory/show/"> 
											Inventory
										</a>
									</li>
									<li <?php if(isset($booking)&&!empty($booking)) echo "class='active'"; ?> >
										<a href="<?php echo base_url()?>booking">Booking</a>
									</li>
									<li <?php if(isset($pricing)&&!empty($pricing)) echo "class='active'"; ?> >
										<a href="<?php echo base_url()?>pricing/show">Pricing</a>
									</li>
									<li <?php if(isset($billing)&&!empty($billing)) echo "class='active'"; ?> >
										<a href="<?php echo base_url()?>billing">Billing</a>
									</li>
								</ul>
							<?php } ?>
							</li>
							
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!----End-main-header----->
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
			<td><input type="password" required="" name="password" id="password" maxlength='40'/> </td>
		</tr>
		<tr>
			<td colspan="2">
			<input type="button" onclick="checkLogin()" name="submit" value="Submit" class="btn btn-info"/>
			</td>
		</tr>
	</table>
</div>
<div id="signup" style="display: none">
	<form name="signup" id='signup' method="POST">
		<h4>Create a new account</h4>
		<table>
			<tr>
				<td>Enter your name:</td>
				<td><input type="text" name="name" id="name" maxlength='30'/> </td>
			</tr>
			<tr>
				<td>Enter  email id:</td>
				<td><input type="email" name="email" id="email" maxlength='35'/> </td>
			</tr>
			<tr>
				<td>Enter your phone number:</td>
				<td><input type="tel" name="phone" id="phone" maxlength='12'/> </td>
			</tr>
			<tr>
				<td>Enter password:</td>
				<td><input type="password" name="password" id="password" maxlength='15'/> </td>
			</tr>
			<tr>
				<td>Retype password:</td>
				<td><input type="password" name="repassword"  id="repassword" maxlength='15'/> </td>
			</tr>
			<tr>
				<td><input type="button" onclick="customer_register()" name="submit" value="Submit" class="btn btn-info"/> </td>
				<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
			</tr>
			<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
			<tr>
				<td><font color="#26819b">Already Registered Please</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
				<td>
				<a  class="btn-warning" href="javascript:parent.jQuery.fancybox.open({href :'#travelAgent'});">LOGIN</a>
				</td>
			</tr>
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

function checkLogin()
{
	var username = $('input#username').val();	
	var password = $('input#password').val();
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
				//$("#success").fadeIn();
				window.location.reload(true);
			    setTimeout(function(){ window.location = "<?php echo base_url() ?>"; }, 500);
			}
		}
	});  			
}
function customer_register()
{
	var name = $('input#name').val();	
	var email = $('input#email').val();
	var phone = $('input#phone').val();
	var password = $('input#password').val();
	var dataString = 'name='+name
					+ '&email='+email			
					+ '&phone='+phone			
					+ '&password='+password
	alert(dataString)	
							
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
$(document).ready(function() {
	$('#error').hide();
	$('#success').hide();
});
</script>
