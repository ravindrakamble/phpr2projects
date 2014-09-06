<?php $this->load->view('include/admin_header');?>
<style>
.none {
    display:none;
}
table td, table th{
	/*padding: 3px 10px !important;*/
}
</style>
	<?php
	$flash = $this->session->flashdata('msg');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
	?>
	<h2>Discounts</h2>
	<form name='discountform' id="discountform" method='post' action='<?php echo base_url()?>admin/discount'>
		<input type="hidden" name='discountid' id='discountid'>
		<table>
			<tr>
				<td>Coupon code</td>
				<td><input type='text' name='code' id='code'></td>
			</tr>
			<tr><th colspan="2" align="center">Amount of Discount</th></tr>
			<tr>
				<td>Discount Amount</td>
				<td><input type='text' name='amount' id='amount'></td>
			</tr>
			<tr>
				<td>Discount Percentage</td>
				<td><input type='text' name='percentage' maxlength="3" id='percentage'></td>
			</tr>
			<tr><th colspan="2">Criteria of Discount</th></tr>
			<tr>
				<td>Last date of discount</td>
				<td><input class="dt" type='text' name='lastdate' id="datepicker"></td>
			</tr>
			<tr>
				<td>Minimum Purchase price</td>
				<td><input type='text' name='minprice' id='minprice'></td>
			</tr>
			<tr>
				<td>Coupon type</td>
				<td><input type="radio" onclick="coupon_type(this.value);" id="cou_General" name='coupontype' required="true" value="General">
				&nbsp;&nbsp;General
				&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" onclick="coupon_type(this.value);" id="cou_Specific" required="true" name='coupontype' value="Specific" >
				&nbsp;&nbsp;Specific</td>
			</tr>
			
			<tr id="Specific" class="none">
				<td>Max limit</td>
				<td><input type='text' maxlength="6" name='limit' id='limit'></td>
			</tr>
			<tr id="General" class="none">
				<td>passenger mobile number</td>
				<td><input type='text' name='mobile' maxlength="10" id='mobile'></td>
			</tr>
			<tr><td colspan="2">
			<input type="submit" name="submitdiscount" id="submitdiscount" value="ADD"/>
			<input type='submit' name='updatediscount'id='updatediscount' 
		 style="display: none" value='UPDATE'>
			</td></tr>
		</table>
	</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Coupon code</th>
				<th>Discount Amount</th>
				<th>Discount Percentage</th>
				<th>Last date of discount</th>
				<th>Minimum Purchase price</th>
				<th>Coupon type</th>
				<th>Max limit</th>
				<th>passenger mobile number</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($discount as $c)
			{
				echo "<tr>
				<td>".$numbers."</td>
				<td>".$c->COUPON_CODE."</td>
				<td>".$c->DISCOUNT_AMOUNT."</td>
				<td>".$c->DISCOUNT_PERCENTAGE."</td>
				<td>".$c->EXPIRY_DATE."</td>
				<td>".$c->MIN_PURCHASE_PRICE."</td>
				<td>".$c->COUPON_TYPE."</td>
				<td>".$c->MAX_LIMIT."</td>
				<td>".$c->PASSENGER_MOBILE_NO."</td>
				<td><a href='javascript: editdiscount(".$c->ID.")' class='ajax btn edit' alt='Edit'>
				<i class='icon-edit'></i>
				</a>&nbsp;&nbsp;
				<a href='".base_url().'ajax/delete_discount/'.$c->ID."' class='delete_btn btn btn-danger remove' title='".$c->COUPON_CODE."'>
				<i class='icon-remove'></i>
				</a>
				</td>
				</tr>";
				$numbers ++ ;
			}  ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
jQuery(document).ready(function($)
{ 
	jQuery( "#datepicker" ).datepicker({
        showButtonPanel: true,
		dateFormat: 'dd/mm/yy'
    });
		
 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    }); 
	$(".delete_btn").click(function()
	{
		var name = $(this).attr('title');
		if(confirm("Do you really want to delete ' "+ name + " ' ? ")==false)
		{
			return false;
		}
		return true;
	});
});
function coupon_type(id)
{
    $('#' + id).addClass('none').siblings().removeClass('none');
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
			var jsondt = discount.EXPIRY_DATE;
			var dt = jsondt.replace(/\\/g, '');
			$('input#datepicker').val(dt);
			$('input#minprice').val(discount.MIN_PURCHASE_PRICE);
			if(discount.COUPON_TYPE == 'General') {
				 $('#cou_General').attr("checked", "checked");
			}else {
				$('#cou_Specific').attr("checked", "checked");
			}
			//$('#'+'cou_'+discount.COUPON_TYPE).is(':checked') ;
			//$('input#coupontype').val(discount.COUPON_TYPE);
			$('input#limit').val(discount.MAX_LIMIT);
			$('input#mobile').val(discount.PASSENGER_MOBILE_NO);
			coupon_type(discount.COUPON_TYPE);
			$("#updatediscount").show();
		}
	});
}
var frmvalidator = new Validator("discountform");
frmvalidator.addValidation("code","req","Please enter Coupon code");

frmvalidator.addValidation("amount","req","Please enter Discount Amount");
frmvalidator.addValidation("amount","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("percentage","req","Please enter Discount Percentage");
frmvalidator.addValidation("percentage","numeric",'Please Enter Numeric Value');
frmvalidator.addValidation("lastdate","req","Please enter Last date of discount");
frmvalidator.addValidation("minprice","req","Please enter Minimum Purchase price");
frmvalidator.addValidation("minprice","numeric",'Please Enter Numeric Value');

frmvalidator.addValidation("coupontype","req","Please Select Coupon type");
</script>
<?php  $this->load->view('include/admin_footer'); ?>