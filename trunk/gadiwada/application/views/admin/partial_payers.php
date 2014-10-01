<?php $this->load->view('include/admin_header');?>
<div align="center">
<h3 align="center">Select value from Dropdown To Show/Edit Cancellation policy</h3>
<br />
<form name="myform" method="post" action="<?php echo base_url()?>admin_c/cancellation_payers">
	<select name='payers' onchange="this.form.submit()">
		<option value="">--Select--</option>
		<option value="full_payers">Full Payers</option>
	</select>
</form>
</div>	
<hr/>
<?php if(isset($edtyp))$butlabel = 'Update'; else $butlabel = 'Submit';
	   if($butlabel == 'Submit')$action ='add' ; else $action='update';
$i = 1;
$id = 0;
$time1 = '';
$time2 = '';
$time3 = '';
$deduction = '';
if(isset($partial_payers_edit) && !empty($partial_payers_edit))
{
	foreach($partial_payers_edit as $info){
	$id = $info->id;
	$time1 = $info->time1;
	$time2 = $info->time2;
	$time3 = $info->time3;
	$deduction = $info->deduction;
	$i++;
	}
}
?>
<?php
$flash = $this->session->flashdata('msg');
if(isset($flash) && !empty($flash))
{
	echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
}
?>
	<h3>For Partial Payers</h3>
<form name="myform" method="post" action="<?php echo base_url()?>admin/cancellation/partial/<?php echo $action?>">
	<table align="center" width="50%">
		<input type="hidden" name="payer_id" value="<?php echo $id; ?>" />
		<tr>
			<th>Enter deduction percentatge</th>
			<td><input  type="text" value="<?php echo $deduction?>"
			name="deduction" required="true"  maxlength="5"/></td>
		</tr>
		<tr>
			<th>Enter time level 1 before journey</th>
			<td><input class="time" type="text" value="<?php echo $time1?>"
			name="time1" required="true"   maxlength="4"/></td>
		</tr>
		<tr>
			<th>Enter time level 2 before journey</th>
			<td><input class="time"  type="text" value="<?php echo $time2?>"
			name="time2" required="true"  maxlength="4"/></td>
		</tr>
		<tr>
			<th>Enter time level 3 before journey</th>
			<td><input  class="time" type="text" value="<?php echo $time3?>"
			name="time3" required="true"  maxlength="4"/></td>
		</tr>
		<tr>
			<td>
				<input style="margin-left:40%;" class="btn btn-success" type="submit" 
						name="<?php echo $butlabel?>" value="<?php echo $butlabel?>">
			</td>
			<td>
				<input  class="btn btn-inverse" type="reset" name="reset" value="Reset">
			</td>
	</table>
</form>
	<br/>
	<br/>
<hr/>

<div id="collapse4" class="body">
	<div id="blockmsg" style="display:none; cursor: default; padding:10px;">				
		<h6>Are you sure, you want to save changes ?</h6> 
		<br />
		<input type="button" id="blkyes" value="Yes" /> 
		<input type="button" id="blkno" value="No" /> 
	</div>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Deduction percentatge</th>
				<th>Level 1 before journey</th>
				<th>Level 2 before journey</th>
				<th>Level 2 before journey</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($partial_payers as $row){ ?>
		<tr>				
			<td><?php echo $numbers ?></td>
			<td><?php echo $row->deduction ?></td>
			<td><?php echo $row->time1 ?></td>
			<td><?php echo $row->time2 ?></td>
			<td><?php echo $row->time3 ?></td>
			<td>
				<a href='<?php echo base_url().'admin_c/partial_payers/'.$row->id ?>' class='ajax btn edit'
					 alt='Edit'>
				<i class='icon-edit'></i>
				</a>
			&nbsp;&nbsp;
				<a onclick="payer_delete(<?php echo $row->id?>);" class="delete_btn btn btn-danger remove"
					href="javascript:void(0);" >
				<i class="icon-remove"></i>
				</a>
			</td>
		<?php $numbers ++; ?>
		</tr>	
		<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('.time').datetimepicker({
    datepicker:false,
    format:'H:i',
    step:5
});
 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    });
});
function payer_delete(id)
{
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
	jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/payer_delete/"+id+"/partial",
			success: function(data) {
				window.location.reload();
			}
		});
	});
	jQuery('#blkno').click(function() { 
        $.unblockUI(); 
       return false; 
    }); 
}
</script>
</script>
<?php $this->load->view('include/admin_footer');?>