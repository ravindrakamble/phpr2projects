<?php $this->load->view('include/header');?>
<script type="text/javascript">
$(document).ready(function() {
		$("#registration input[title]").tooltip();
		$("#registration").validator();
		
		$("#name").blur(function() {
			if( !this.value ) {
				$(this).parents('p').addClass('warning');
			}
			else
			{
			   var i = $("#lid").val();
			   var n = $("#name").val();
			   $.ajax({
				type: "GET",
				url: "<?php echo base_url()?>registration/validateUsername/"+i+"/"+n,
				success: function(can){
					$('#valid').html(can);
				}
				});
			}
		});
		$("#email").blur(function() {
			if( !this.value ) {
				$(this).parents('p').addClass('warning');
			}
			else
			{
			   var i = $("#lid").val();
			   var n = $("#email").val();
			   $.ajax({
				type: "GET",
				url: "<?php echo base_url()?>registration/validateEmailId/"+i+"/"+n,
				success: function(can){
					$('#emailValid').html(can);
				}
				});
			}
		});
	});
function inputValidation()
{		
		var password = $("#password").val();
		var confPass = $("#check").val();
		var email = $("#emailValid").text();
		var usname = $("#valid").text();
		if(password.length < 6)
		{
			$("#password").focus();
			alert('Password should of minimum 6 characters.');
			return false;
		}
		else if(password != confPass)
		{
			$("#password").focus();
			alert('Password incorrect');
			return false;
		}
		else if(usname.length > 2)
		{
			$("#name").focus();
			alert('Username already exists');
			return false;
		}
		else if(email.length > 2)
		{
			$("#email").focus();
			alert('Email-id already exists');
			return false;
		}
		return true;
	}
</script>

<table align="center" style='width: 80%;'>
	<tr>
		<td valign="top" width="100%">
			<div> 
				<h3 align = "center">
					Registration
				</h3>
				<?php

				$attributes = array(
					'class'   => 'form-horizontal',
					'id'      => 'registration',
					'name'    =>'registration',
					'onsubmit'=> 'return inputValidation();'
				);
				echo form_open("", $attributes);
				if(isset($conformation) && !empty($conformation))                echo '<br>'.$conformation.'<br>';
				?>
				<div id="valid" align="right"> </div>
				<div class="control-group">
					<input type="hidden" name="lid"  id="lid" >
					<?php
					$attributes = array(
						'class'=> 'control-label'
					);
					echo form_label('Enter your name', 'name', $attributes);
					?>
					<div class="controls">
						<input type="text" name="name" isempty="valid" id="name" required='required' title ='Username for login.' onkeypress = 'return handleEnter(this, event);' />
					</div>
				</div>
				<div id="emailValid" align="right"> </div>
				<div class="control-group">
					<?php
					$attributes = array(
						'class'=> 'control-label'
					);
					echo form_label('Enter your email id', 'email', $attributes);
					?>
					<div class="controls">
						<input type="tel" name="phone" id="phone" required='required' title ='phone number.'maxlength="12" />
					</div>
				</div>
				<div id="phoneValid" align="right"> </div>
				<div class="control-group">
					<?php
					$attributes = array(
						'class'=> 'control-label'
					);
					echo form_label('Enter your phone number', 'phone', $attributes);
					?>
					<div class="controls">
						<input type="email" name="email" isempty="valid" id="email" required='required' title ='E-Mail id for the user.' onkeypress = 'return handleEnter(this, event);' />
					</div>
				</div>
				<div class="control-group">
					<?php
					$attributes = array(
						'class'=> 'control-label'
					);
					echo form_label('Enter password', 'password', $attributes);
					?>
					<div class="controls">

						<input type="password" name="password" minlength="5" id="password" required='required' title ='Password for login minimum length 5' onkeypress = 'return handleEnter(this, event);' />
					</div>
				</div>
				<div class="control-group">
					<?php
					$attributes = array(
						'class'=> 'control-label'
					);
					echo form_label('Retype password', 'cpassword', $attributes);
					?>
					<div class="controls">
						<input type="password" name="check" data-equals="password" minlength="5" id="check" required='required' title ='Password for validation.' onkeypress = 'return handleEnter(this, event);' />
					</div>
				</div>
				

				<div class="control-group">
					<div class="controls">
						<?php $cls = 'class="btn btn-info"'; echo form_submit('submit','Submit',$cls); ?>
						<?php $cls = 'class="btn btn-inverse"'; echo form_reset('reset','Reset',$cls); ?>
					</div>
				</div>
				<!-- end of registration form-->
			</div>
		</td>
	</tr>
</table>
<?php $this->load->view('include/footer');?>