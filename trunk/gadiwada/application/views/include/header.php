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
		
        <script type="text/javascript" src="<?php echo base_url()?>js/jquery.fancybox.pack.js?v=2.1.0"></script>
        
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
									<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
									<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
									<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
									<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
									<li><a href="javascript:parent.jQuery.fancybox.open({href :'#signup'});">
											<img src="images/login.jpg" title="Login">
										</a>
									</li>
										
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
						<a href="index.html"><img src="images/logo1.png" title="logo" /></a>
					</div>
					<div class="top-nav">
						<ul>
							<li <?php if(isset($search) && !empty($search) ) echo "class='active'"; ?>>
								<a href="<?php echo base_url()?>search">Search</a></li>
								
							<li <?php if(isset($booking)&&!empty($booking)) echo "class='active'"; ?> >
								<a href="<?php echo base_url()?>booking">Booking</a></li>
								
							<li <?php if(isset($cancellation)&& !empty($cancellation)) echo "class='active'"; ?> >
								<a href="<?php echo base_url()?>cancellation">Cancellation</a></li>
							
							<li  <?php if(isset($inventory)&& !empty($inventory)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>inventory"> Inventory </a></li>
							
							
							<li  <?php if(isset($registration)&& !empty($registration)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>registration"> Registration </a></li>
							
							<!--<li  <?php if(isset($login)&& !empty($login)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>login"> Login </a></li>
							
							
							<li  <?php if(isset($login)&& !empty($login)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>login"> Login </a></li>
							
							<li  <?php if(isset($login)&& !empty($login)) echo "class='active'"; ?>>
							<a href="<?php echo base_url()?>login"> Login </a></li>-->
							
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<!----End-main-header----->
			</div>
		</div>
		<div class="clear"> </div>
<div id="signup" style="display: none">
	<form name="signup" method="POST" action="#">
		<h4>Create a new account</h4>
		<table>
			<tr>
				<td>Enter your name:</td>
				<td><input type="text" name="name" maxlength='30'/> </td>
			</tr>
			<tr>
				<td>Enter  email id:</td>
				<td><input type="email" name="email" maxlength='35'/> </td>
			</tr>
			<tr>
				<td>Enter your phone number:</td>
				<td><input type="tel" name="phone" maxlength='12'/> </td>
			</tr>
			<tr>
				<td>Enter password:</td>
				<td><input type="password" name="password" maxlength='15'/> </td>
			</tr>
			<tr>
				<td>Retype password:</td>
				<td><input type="password" name="repassword" maxlength='15'/> </td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit" class="btn btn-info"/> </td>
				<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function() {
});
</script>
