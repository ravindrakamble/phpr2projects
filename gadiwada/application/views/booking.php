<?php $this->load->view('include/admin_header');?>


<div id="collapse4" class="body">	
	<div id="question" style="display:none; cursor: default; padding:10px;"> 
		<h6>Are you sure to cancel this ticket ?</h6> 
		<br />
		<input type="button" id="yes" value="Yes" /> 
		<input type="button" id="no" value="No" /> 
	</div>
	<h3>Booking</h3>
	<form name='agtbook' method="POST" action="<?php echo base_url()?>booking">
	<table width="100%" frame="box">
		<tr>
			<td>From Date :</td>
			<td><input name="fromdate" value="<?php echo $from ?>" required="true" type="text" id="fromdate" /></td>
			<td>To Date :</td>
			<td><input name="todate" value="<?php echo $to ?>" required="true" type="text" id="todate" /></td>
			<td style="width: 30%; vertical-align: top;">
			<input type="submit" name="btnSubmit" value="SHOW" class="btn btn-success" id="btnSubmit" />
			</td>
		</tr>
	</table>
	</form>
	<table  id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Car Type</th>
				<th>Car Name</th>
				<th>Car Number</th>
				<th>Purchase Year</th>
				<th>Agreement End Date</th>
				<!--<th>Price</th>-->
				<Th></Th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($booking_info as $b){?>
		<TR>
			<td><?php echo $b['RECEIPT_DATE']?></td>
			<td><?php echo $b['TYPE_NAME']?></td>
			<td><?php echo $b['MODEL_NAME']?></td>
			<td><?php echo $b['CAR_NUMBER']?></td>
			<td><?php echo $b['PURCHASE_YEAR']?></td>
			<td><?php echo $b['AGREEMEST_END_DATE']?></td>
			<!--<td>
				<?php
				$price ='' ;
				$price = $this->general->get_price($b['ID']); //Inventory ID
				echo $price;
				?>
			</td>-->
			<?php if($b['BOOKED_BY'] == 'agent' && $b['INV_ID'] != NULL):?>
			<td><label class="badge badge-success">BOOKED</label>&nbsp;&nbsp;&nbsp;
			
				<a href="javascript:ticket_cancel(<?php echo $b['BILL_NO'].','.$b['INV_ID']?>)">
					<label class="label label-danger">Cancel</label>
				</a>
			</td>
			<?php elseif($b['BOOKED_BY'] == 'customer' && $b['INV_ID'] != NULL):?>
			<td><label class="badge badge-warning">Booked By Travelder</label></td>
			<?php else: 
			?>
			<td>
				<a href="<?php echo base_url()?>billing/new_booking/<?php echo $b['ID'].'/'.$b['RECEIPT_DATE'].'/'.$price?>">
				<label class="badge badge-info"> Book</label>
				</a>
			</td>
			<?php endif;?>
		<?php $numbers ++; 
		ECHO "</TR>";
		} ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
//Date Select From Datepicker start
var fromdate = $('#fromdate').datepicker(
{
	dateFormat: 'dd-mm-yy', maxDate: '+7d',
	minDate: 0,
	onSelect: function(selected) {
		$("#todate").datepicker("option","minDate", selected)
	}

});
var todate = $('#todate').datepicker(
{
	dt1: $('#fromdate').datepicker('getDate'),
	dateFormat: 'dd-mm-yy', 
	maxDate: '+10d',
});

//Date Select From Datepicker end

function ticket_cancel(billno,inv_id)
{
	$.blockUI({ message: jQuery('#question'), css: { width: '275px' } }); 
    jQuery('#yes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>cancellation/ticket_cancel/"+billno+'/'+inv_id,
			success: function(data) {
				$.growlUI('Sucessfully<br> Deleted !');
				setTimeout(function(){window.location = "<?php echo base_url() ?>booking"; },50);
			}
		});
	});
	jQuery('#no').click(function() {
		billno =0;  
        $.unblockUI(); 
       return false; 
    }); 
}
</script>
<?php $this->load->view('include/admin_footer');?>