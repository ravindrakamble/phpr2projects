<?php  $this->load->view('include/header'); ?>
<div class="content-boxs">
		<ul class="nav nav-tabs" id="myTab">
			 <li class="active"><a href="#cities" role="tab" data-toggle="tab">City</a></li>
			 <li><a href="#areas" role="tab" data-toggle="tab">Area</a></li>
			 <li><a href="#cartypes" role="tab" data-toggle="tab">Car Type</a></li>
			 <li><a href="#carmodels" role="tab" data-toggle="tab">Car Model</a></li>
			 <li><a href="#features" role="tab" data-toggle="tab">Features</a></li>
			 <li><a href="#packages" role="tab" data-toggle="tab">Packages</a></li>
			 <li><a href="#discounts" role="tab" data-toggle="tab">Discount coupon</a></li>
		</ul>
		<div class="tab-content">
			<div id="question" style="display:none; cursor: default; padding:10px;"> 
				<h6>Are you sure to delete ?</h6> 
				<br />
				<input type="button" id="yes" value="Yes" /> 
				<input type="button" id="no" value="No" /> 
			</div>
			<div id='cities' class="tab-pane fade  active in">
				<h2>City</h2>
				<?php 
					$city = array();
					$city['0']='--';
					foreach($cities as $c){
						$city[$c->ID]=$c->CITY_NAME;
					}
				?>	
				<form name='cityform' method='post' id='cityform' action='<?php echo base_url()?>admin/city'>
					<input type='text' name='city' id='city'><br>
					<input type="hidden" name='cityid' id='cityid'><br>
					<input type='submit' name='submitcity' id='submitcity' value='ADD'>
					<input type='submit' name='updatecity'id='updatecity' onclick="changeBtnName()" value='UPDATE'>
				</form>
				<div id='showcity'>
					<table class="table table-bordered">
						<tr><th>City Name</th><th>Edit</th><th>Delete</th></tr>
						<?php foreach($cities as $c){
							echo "<tr><td>".$c->CITY_NAME."</td>
							<td>
								<a href=\"javascript: editcity(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removecity(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>
			</div>
			<div id='areas' class="tab-pane fade" >
				<h2>Area</h2>
				<form name='areaform' id='areaform' method='post' action='<?php echo base_url()?>admin/area'>
					<?php echo form_dropdown('city',$city);?><br>
					<input type='text' name='area' id='area'><br>
					<input type="hidden" name='areaid' id='areaid'><br>
					<input type='submit' name='submitarea' id='submitarea' value='ADD'>
					<input type='submit' name='updatearea'id='updatearea' onclick="changeBtnName()" value='UPDATE'>
				</form>
				<div id='showarea'>
					<table class="table table-bordered">
						<tr><th>City Name</th><th>Area Name</th><th>Edit</th><th>Delete</th></tr>
						<?php foreach($areas as $a){
							echo "<tr><td>".$a->CITY_NAME."</td><td>".$a->AREA_NAME."</td>
							<td>
								<a href=\"javascript: editarea(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removearea(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>
			</div>

			<div id='cartypes' class="tab-pane fade" >
				<h2>Car Type</h2>
				<form name='cartypeform' id='cartypeform' method='post' action='<?php echo base_url()?>admin/car_type'>
					<input type='text' name='cartype' id='cartype'><br>
					<input type="hidden" name='cartypeid' id='cartypeid'><br>
					<input type='submit' name='submitcartype' id='submitcartype' value='ADD'>
					<input type='submit' name='updatecartype'id='updatecartype' onclick="changeBtnName()" value='UPDATE'>
				</form>
				<div id='showcartypes'>
					<table class="table table-bordered">
						<tr><th>Car Type</th><th>Edit</th><th>Delete</th></tr>
						<?php foreach($car_type as $c){
							echo "<tr><td>".$c->TYPE_NAME."</td>
							<td>
								<a href=\"javascript: editcartype(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removecartype(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>
			</div>

			<div id='carmodels' class="tab-pane fade" >
				<h2>Car Model</h2>
				<?php 
					$type = array();
					$type['0']='--';
					    foreach($car_type as $c){
						  $type[$c->ID]=$c->TYPE_NAME;
					}
				?>
				<form name='seaterform' id='seaterform' method='post' action='<?php echo base_url()?>admin/car_model'>
					<?php echo form_dropdown('cartype',$type);?><br>
					<input type='text' name='model' id='model'><br>
					<input type="hidden" name='modelid' id='modelid'><br>
					<input type='submit' name='submitseater' id='submitseater' value='ADD'>
					<input type='submit' name='updateseater' id='updateseater' onclick="changeBtnName()" value='UPDATE'>
				</form>
				<div id='showseater'>
					<table class="table table-bordered">
						<tr><th>Car Type</th><th>Car Model</th><th>Edit</th><th>Delete</th></tr>
						<?php foreach($car_model as $a){
							echo "<tr><td>".$a->TYPE_NAME."</td><td>".$a->MODEL_NAME."</td>
							<td>
								<a href=\"javascript: editcarmodel(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removecarmodel(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>

			</div>
			<div id='features' class="tab-pane fade" >
				<h2>Features</h2>
				<form name='cityform' method='post' action='<?php echo base_url()?>admin/features'>
					<input type='text' name='feature' id='feature'><br>
					<input type='submit' name='submit' value='ADD'>
				</form>
			</div>
			<div id='packages' class="tab-pane fade" >
				<h2>Packages</h2>
				<form name='packagesform' method='post' action='<?php echo base_url()?>admin/packages'>
					<input type="radio" required="true" name="chkpackage" value="Local"/>Local <br/>
					<input type="radio" required="true" name="chkpackage" value="Outstation"/>Outstation <br/>
					<?php echo form_dropdown('city',$city);?><br>
					<input type='text' name='package' id='package'><br>
					<input type='submit' name='submit' value='ADD'>
				</form>
			</div>
			<div id='discounts' class="tab-pane fade" >
				<h2>Discounts</h2>
				<form name='discountform' method='post' action='<?php echo base_url()?>admin/discount'>
				<table>
					<tr>
						<th>Coupon code</th>
						<td><input type='text' name='code' id='code'></td>
					</tr>
					<tr><th colspan="2">Amount of Discount</th></tr>
					<tr>
						<th>Discount Amount</th>
						<td><input type='text' name='amount' id='amount'></td>
					</tr>
					<tr>
						<th>Discount Percentage</th>
						<td><input type='text' name='percentage' id='percentage'></td>
					</tr>
					<tr><th colspan="2">Criteria of Discount</th></tr>
					<tr>
						<th>Last date of discount</th>
						<td><input type='text' name='lastdate' id='lastdate'></td>
					</tr>
					<tr>
						<th>Minimum Purchase price</th>
						<td><input type='text' name='minprice' id='minprice'></td>
					</tr>
					<tr>
						<th>Coupon type</th>
						<td><input type="radio" name='coupontype' value="General" id='coupontype'>&nbsp;&nbsp;General
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name='coupontype' value="Specific" id='coupontype'>&nbsp;&nbsp;Specific</td>
					</tr>
					
					<tr>
						<th>Max limit</th>
						<td><input type='text' name='limit' id='limit'></td>
					</tr>
					<tr>
						<th>passenger mobile number</th>
						<td><input type='text' name='mobile' id='mobile'></td>
					</tr>
				</table>
				</form>
			</div>
</div>
<script type="text/javascript">
function changeBtnName()
{
	$("#submitcity").show();
	$("#submitarea").show();
	$("#submitcartype").show();
	$("#submitseater").show();

	$("#updatecity").hide();
	$("#updatearea").hide();
	$("#updatecartype").hide();
	$("#updateseater").hide();
}
$(document).ready(function()	
{
	$("#updatecity").hide();
	$("#updatearea").hide();
	$("#updatecartype").hide();
	$("#updateseater").hide();


	var cityform = { 
		target:        '#showcity', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){
			$('#cityform').ajaxForm(cityform);	 	 		 
			$.unblockUI();
			$('input#city').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};

	var areaform = { 
		target:        '#showarea', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){
			$('#areaform').ajaxForm(areaform);	 		 
			$.unblockUI();
			$('input#area').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};

	var cartypeform = { 
		target:        '#showcartypes', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 			 
			$.unblockUI();
			$('input#cartype').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};

	var seaterform = { 
		target:        '#showseater', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 
			$('#seaterform').ajaxForm(seaterform);			 
			$.unblockUI();
			//$('input#seater').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};


	$('#cityform').ajaxForm(cityform);
	$('#areaform').ajaxForm(areaform);
	$('#cartypeform').ajaxForm(cartypeform);
	$('#seaterform').ajaxForm(seaterform);
});

//City start
function editcity(id)
{
	$("#submitcity").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_city/"+id,
		success: function(response) {
			var c = response.split("-");
			$('input#city').val(c[0]);
			$('input#cityid').val(c[1]);
			$("#updatecity").show();
		}
	});
}

function removecity(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_city/"+id,
			success: function(data) {
				$("#showcity").html(data);
				$.growlUI('Sucessfully<br> Deleted !');
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
//end
//Area start
function editarea(id)
{
	$("#submitarea").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_area/"+id,
		success: function(response) {
		
			var c = response.split("-");
			$('input#area').val(c[0]);
			$('input#areaid').val(c[1]);
			$('select[name="city"]').find('option[value='+c[2]+']').attr("selected",true);
			$("#updatearea").show();
		}
	});
}

function removearea(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_area/"+id,
			success: function(data) {
				$("#showarea").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
//end
//Car Type  start
function editcartype(id)
{
	$("#submitcartype").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_car_type/"+id,
		success: function(response) {
			var c = response.split("-");
			$('input#cartype').val(c[0]);
			$('input#cartypeid').val(c[1]);
			$("#updatecartype").show();
		}
	});
}

function removecartype(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_car_type/"+id,
			success: function(data) {
				$("#showcartypes").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
//end
//Car Model  start
function editcarmodel(id)
{
	$("#submitseater").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_car_model/"+id,
		success: function(response) {
			var c = response.split("-");
			$('input#model').val(c[0]);
			$('input#modelid').val(c[1]);
			$('select[name="cartype"]').find('option[value='+c[2]+']').attr("selected",true);
			$("#updateseater").show();
		}
	});
}

function removecarmodel(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_car_model/"+id,
			success: function(data) {
				$("#showseater").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
//end
</script>
<?php $this->load->view('include/footer'); ?>