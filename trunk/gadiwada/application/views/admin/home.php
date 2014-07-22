<?php  $this->load->view('include/header'); ?>
<style>
.none {
    display:none;
}
</style>
<div class="content-boxs">
		<ul class="nav nav-tabs" id="myTab">
			 <li class="active"><a href="#cities" role="tab" data-toggle="tab">City</a></li>
			 <li><a href="#areas" role="tab" data-toggle="tab">Area</a></li>
			 <li><a href="#cartypes" role="tab" data-toggle="tab">Car Type</a></li>
			 <li><a href="#carmodels" role="tab" data-toggle="tab">Car Model</a></li>
			 <li><a href="#features" role="tab" data-toggle="tab">Features</a></li>
			 <li><a href="#packages" role="tab" data-toggle="tab">Packages</a></li>
			 <li><a href="#discounts" role="tab" data-toggle="tab">Discount coupon</a></li>
			 <li><a href="#block" role="tab" data-toggle="tab">Block/Unblock Agent</a></li>
			 <li><a href="#user" role="tab" data-toggle="tab">Block/Unblock User</a></li>
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
				<form name='featuresform' id='featuresform' method='post' action='<?php echo base_url()?>admin/features'>
					<input type='text' name='feature' id='feature'><br>
					<input type='hidden' name='featureid' id='featureid'><br>
					<input type='submit' name='submitfeatures' id='submitfeatures' value='ADD'>
					<input type='submit' name='updatefeatures'id='updatefeatures' onclick="changeBtnName()" value='UPDATE'>
				</form>
				<div id='showsfeatures'>
					<table class="table table-bordered">
						<tr><th>Feature Name</th><th>Edit</th><th>Delete</th></tr>
						<?php foreach($features as $c){
							echo "<tr><td>".$c->FEATURE_NAME."</td>
							<td>
								<a href=\"javascript: editfeature(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removefeature(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>
			</div>
			<div id='packages' class="tab-pane fade" >
				<h2>Packages</h2>
				<form name='packagesform' id='packagesform' method='post' action='<?php echo base_url()?>admin/packages'>
					<input type="radio" required="true" onclick="setTarget(this.value)" name="chkpackage" value="Local"/>&nbsp;&nbsp;Local
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" required="true" onclick="setTarget(this.value)" name="chkpackage" value="Outstation"/>&nbsp;&nbsp;
					Outstation <br/>
					<?php echo form_dropdown('city',$city);?><br>
					<input type='text' name='package' id='package'><br>
					<input type='hidden' name='packageid' id='packageid'><br>
					<input type='submit' name='submitpackage' id='submitpackage' value='ADD'>
					<input type='submit' name='updatepackage'  onclick="changeBtnName()" id='updatepackage' value='UPDATE'>
				</form>
				<div>
					<div id='Local' style="width:45%;float: left;">
						<fieldset><legend>Local Packages</legend>
							<table class="table table-bordered">
							<tr><th>Name</th><th>Edit</th><th>Delete</th></tr>
							<?php foreach($local as $c){
								echo "<tr><td>".$c->LOCAL_NAME."</td><td>".$c->CITY_NAME."</td>
								<td>
									<a href=\"javascript: editlocal(".$c->ID.")\">
										<img src='".base_url()."img/mono-icons/notepencil32.png' 
										title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
									</a>
								</td>
								<td>
									<a href=\"javascript: removelocal(".$c->ID.")\">
										<img src='".base_url()."img/mono-icons/minus32.png' 
										title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
									</a>
								</td></tr>";
								} ?>
							</table>
						</fieldset>
					</div>
					<div id='Outstation' style='width:45%;float: right;' >
						<fieldset><legend>Outstation Packages</legend>
							<table class="table table-bordered">
							<tr><th>Name</th><th>City</th><th>Edit</th><th>Delete</th></tr>
							<?php foreach($outstation as $c){
								echo "<tr><td>".$c->OUTSTATION_NAME."</td><td>".$c->CITY_NAME."</td>
								<td>
									<a href=\"javascript: editout(".$c->ID.")\">
										<img src='".base_url()."img/mono-icons/notepencil32.png' 
										title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
									</a>
								</td>
								<td>
									<a href=\"javascript: removeout(".$c->ID.")\">
										<img src='".base_url()."img/mono-icons/minus32.png' 
										title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
									</a>
								</td></tr>";
								} ?>
							</table>
						</fieldset>
					</div>
				</div>
			</div>
			<div id='discounts' class="tab-pane fade" >
				<h2>Discounts</h2>
				<form name='discountform' id="discountform" method='post' action='<?php echo base_url()?>admin/discount'>
				<input type="hidden" name='discountid' id='discountid'>
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
						<td><input type='text' name='percentage' maxlength="3" id='percentage'></td>
					</tr>
					<tr><th colspan="2">Criteria of Discount</th></tr>
					<tr>
						<th>Last date of discount</th>
						<td><input class="dt" type='text' name='lastdate' id="datepicker"></td>
					</tr>
					<tr>
						<th>Minimum Purchase price</th>
						<td><input type='text' name='minprice' id='minprice'></td>
					</tr>
					<tr>
						<th>Coupon type</th>
						<td><input type="radio" data-id="General" name='coupontype' required="true" value="General">
						&nbsp;&nbsp;General
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" data-id="Specific" required="true" name='coupontype' value="Specific" >
						&nbsp;&nbsp;Specific</td>
					</tr>
					
					<tr id="Specific" class="none">
						<th>Max limit</th>
						<td><input type='text' maxlength="6" name='limit' id='limit'></td>
					</tr>
					<tr id="General" class="none">
						<th>passenger mobile number</th>
						<td><input type='text' name='mobile' maxlength="10" id='mobile'></td>
					</tr>
					<tr><td colspan="2">
					<input type="submit" name="submitdiscount" id="submitdiscount" value="ADD"/>
					<input type="submit" name="updatediscount" onclick="changeBtnName()" id="updatediscount" value="UPDATE"/>
					</td></tr>
				</table>
				</form>
				<div id='showdiscounts'>
					<table class="table table-bordered">
						<tr>
							<th>Coupon code</th>
							<th>Discount Amount</th>
							<th>Discount Percentage</th>
							<th>Last date of discount</th>
							<th>Minimum Purchase price</th>
							<th>Coupon type</th>
							<th>Max limit</th>
							<th>passenger mobile number</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php foreach($discount as $c){
							echo "<tr>
								<td>".$c->COUPON_CODE."</td>
								<td>".$c->DISCOUNT_AMOUNT."</td>
								<td>".$c->DISCOUNT_PERCENTAGE."</td>
								<td>".$c->EXPIRY_DATE."</td>
								<td>".$c->MIN_PURCHASE_PRICE."</td>
								<td>".$c->COUPON_TYPE."</td>
								<td>".$c->MAX_LIMIT."</td>
								<td>".$c->PASSENGER_MOBILE_NO."</td>
							<td>
								<a href=\"javascript: editdiscount(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removediscount(".$c->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							} ?>
					</table>
				</div>
			</div>
			<div id='block' class="tab-pane fade" >
				<div id="blockmsg" style="display:none; cursor: default; padding:10px;">				
					<h6>Are you sure to block/unblock ?</h6> 
					<br />
					<input type="button" id="blkyes" value="Yes" /> 
					<input type="button" id="blkno" value="No" /> 
				</div>
				<div id="agentlist">
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
						<thead>
						<tr><th>Agent ID</th><th>Agency name</th><th>Contact name</th><th>Contact number</th><th>Place</th><th>City</th><th>Action</th></tr>
						</thead>
						<tbody>
							<?php foreach($agents as $ag){ ?>
							<tr>				
								<td><?php echo $ag->ID ?></td>
								<td><?php echo $ag->BUSINESS_NAME ?></td>
								<td>*******</td>
								<td>*******</td>
								<td><?php echo $ag->ADDRESS_LINE_1.",".$ag->ADDRESS_LINE_2 ?></td>
								<td><?php echo $ag->CITY ?></td>
							<?php 
							if($ag->STATUS == 0)
							{
								echo "<td><a href='javascript:unblock($ag->ID,&apos;agent&apos;);' class='btn-danger btn-small'>UnBlock</a></td>";
							}
							else{
								echo "<td><a href='javascript:block($ag->ID,&apos;agent&apos;);' class='btn-success btn-small'>Block</a></td>";
							}	
							?>
									
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div id="user" class="tab-pane fade">
				<div id="userlist">
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
						<thead>
						<tr><th>User ID</th><th>User Name</th><th>Email</th><th>Contact number</th><th>Action</th></tr>
						</thead>
						<tbody>
							<?php foreach($users as $ag){ ?>
							<tr>				
								<td><?php echo $ag->ID ?></td>
								<td><?php echo $ag->CUST_NAME ?></td>
								<td><?php echo $ag->EMAIL ?></td>
								<td><?php echo $ag->PHONE ?></td>
							<?php 
							if($ag->STATUS == 0)
							{
								echo "<td><a href='javascript:unblock(".$ag->ID.",&apos;user&apos;);' class='btn-danger btn-small'>UnBlock</a></td>";
							}
							else{
								echo "<td><a href='javascript:block(".$ag->ID.",&apos;user&apos;);' class='btn-success btn-small'>Block</a></td>";
							}	
							?>
									
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
</div>
<script type="text/javascript">
var targetname='';
function changeBtnName()
{
	$("#submitcity").show();
	$("#submitarea").show();
	$("#submitcartype").show();
	$("#submitseater").show();
	$("#submitfeatures").show();
	$("#submitpackage").show();
	$("#submitdiscount").show();

	$("#updatecity").hide();
	$("#updatearea").hide();
	$("#updatecartype").hide();
	$("#updateseater").hide();
	$("#updatefeatures").hide();
	$("#updatepackage").hide();
	$("#updatediscount").hide();
}
function setTarget(chk)
{
	targetname = chk;
}
$(document).ready(function()	
{
	$( "#datepicker" ).datepicker({
        numberOfMonths: 2,
        showButtonPanel: true,
        minDate:0
    });
	
	$(':radio').change(function (event) {
	    var id = $(this).data('id');
	    $('#' + id).addClass('none').siblings().removeClass('none');
	});
	
	$("#updatecity").hide();
	$("#updatearea").hide();
	$("#updatecartype").hide();
	$("#updateseater").hide();
	$("#updatefeatures").hide();
	$("#updatepackage").hide();
	$("#updatediscount").hide();


	var cityform = { 
		target:        '#showcity', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 		 
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
			$.unblockUI();
			//$('input#seater').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};

	var featuresform = { 
		target:        '#showsfeatures', // target element(s) to be updated with server response 
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();
			//$('input#seater').val("");	
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	var packagesform = {
		target:        targetname,
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};

	var discountform = {
		target:        '#showdiscounts',
		beforeSubmit:  function(){
			$.blockUI({ message: "<h6>Submiting data...please wait.</h6>" }) 			
		},  // pre-submit callback 
		success: function(){	 	 
			$.unblockUI();
		},  // post-submit callback 
		resetForm: true ,      // reset the form after successful submit 
		cache:false
	};
	
	
	$('#cityform').ajaxForm(cityform);
	$('#areaform').ajaxForm(areaform);
	$('#cartypeform').ajaxForm(cartypeform);
	$('#seaterform').ajaxForm(seaterform);
	$('#featuresform').ajaxForm(featuresform);
	$('#packagesform').ajaxForm(packagesform);
	$('#discountform').ajaxForm(discountform);
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

//Car Features  start
function editfeature(id)
{
	$("#submitfeatures").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_car_feature/"+id,
		success: function(response) {
			var c = response.split("-");
			$('input#feature').val(c[0]);
			$('input#featureid').val(c[1]);
			$("#updatefeatures").show();
		}
	});
}

function removefeature(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_car_feature/"+id,
			success: function(data) {
				$("#showsfeatures").html(data);
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
//local package 
function editlocal(id)
{
	$("#submitpackage").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_local_package/"+id,
		success: function(response) {
			var c = response.split("-");
			//$('input[name="chkpackage"]').val('Local').attr("checked",true);
			$('input:radio[class=test1][id=test2]').prop('checked', true);
			$('input#package').val(c[0]);
			$('input#packageid').val(c[1]);
			$('select[name="city"]').find('option[value='+c[2]+']').attr("selected",true);
			$("#updatepackage").show();
		}
	});
}

function removelocal(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_local_package/"+id,
			success: function(data) {
				$("#Local").html(data);
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

//outstation package 
function editout(id)
{
	$("#submitpackage").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_outstaion_package/"+id,
		success: function(response) {
			var c = response.split("-");
			//$('input[name="chkpackage"]').val('Local').attr("checked",true);
			$('input#package').val(c[0]);
			$('input#packageid').val(c[1]);
			$('select[name="city"]').find('option[value='+c[2]+']').attr("selected",true);
			$("#updatepackage").show();
		}
	});
}

function removeout(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_outstaion_package/"+id,
			success: function(data) {
				$("#Outstation").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}

//Discount 
function editdiscount(id)
{
	$("#submitdiscount").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_discount/"+id,
		success: function(response) {
			var objJSON = JSON.parse(response);
			var discount = objJSON.discount[0];
			$('input#discountid').val(discount.ID);
			$('input#code').val(discount.COUPON_CODE);
			$('input#amount').val(discount.DISCOUNT_AMOUNT);
			$('input#percentage').val(discount.DISCOUNT_PERCENTAGE);
			$('input#lastdate').val(discount.EXPIRY_DATE);
			$('input#minprice').val(discount.MIN_PURCHASE_PRICE);
			$('input#coupontype').val(discount.COUPON_TYPE);
			$('input#limit').val(discount.MAX_LIMIT);
			$('input#mobile').val(discount.PASSENGER_MOBILE_NO);
			$("#updatediscount").show();
		}
	});
}

function removediscount(id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>ajax/delete_discount/"+id,
			success: function(data) {
				$("#showdiscounts").html(data);
				$.growlUI('Sucessfully<br> Deleted !'); 
			}
		});
	});
	jQuery('#no').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}

///block_unblock
function block(id,type)
{
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
    jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/block/"+id+"/"+type,
			success: function(data) {
				if(type =='agent'){
					$("#agentlist").html(data);
				}
				else{
					$("#userlist").html(data);
				}
				$.growlUI('Sucessfully<br> Updated !'); 
			}
		});
	});
	jQuery('#blkno').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
function unblock(id,type)
{
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
    jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/unblock/"+id+"/"+type,
			success: function(data) {
				if(type =='agent'){
					$("#agentlist").html(data);
				}
				else{
					$("#userlist").html(data);
				}
				$.growlUI('Sucessfully<br> Updated !'); 
			}
		});
	});
	jQuery('#blkno').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
</script>
<?php $this->load->view('include/footer'); ?>