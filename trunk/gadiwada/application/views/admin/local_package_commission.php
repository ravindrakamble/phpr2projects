<?php $this->load->view('include/admin_header');?>
<div align="center">
<form name="myform" method="post" action="<?php echo base_url()?>admin_c/commission_select">
	<select name='comm' onchange="this.form.submit()">
		<option value="">--Select--</option>
		<option value="local_flexible">Local Flexible Commission</option>
		<option value="outstation_flexible">Outstation Flexible Commission</option>
		<option value="outstation_package">Outstation Package Commission</option>
	</select>
</form>
</div>	
<div id="collapse4" class="body">
	<div id="blockmsg" style="display:none; cursor: default; padding:10px;">				
		<h6>Are you sure, you want to save changes ?</h6> 
		<br />
		<input type="button" id="blkyes" value="Yes" /> 
		<input type="button" id="blkno" value="No" /> 
	</div>	
	<h3>Local Package Commission</h3>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Agent</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Package Name</th>
				<th>Extra Rs/km</th>
				<th>Extra Rs/hr</th>
				<th>Base operating area 0</th>
				<th>Base operating area 1</th>
				<th>Base operating area 2</th>
				<th>Base operating area 3</th>
				<th>Base operating area 4</th>
				<th>Commission Fixed</th>
				<th>Commission Percentage</th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($localPackData as $row){ ?>
		<tr>				
			<td><?php echo $numbers ?></td>
			<td><?php echo $row->BUSINESS_NAME ?></td>
			<td><?php echo $row->TYPE_NAME ?></td>
			<td><?php echo $row->MODEL_NAME ?></td>
			<td><?php echo $row->LOCAL_NAME ?></td>
			<td><?php echo $row->extra_per_km ?></td>
			<td><?php echo $row->extra_per_hr ?></td>
			<td><?php echo $row->base_operating_area_0 ?></td>
			<td><?php echo $row->base_operating_area_1 ?></td>
			<td><?php echo $row->base_operating_area_2 ?></td>
			<td><?php echo $row->base_operating_area_3 ?></td>
			<td><?php echo $row->base_operating_area_4 ?></td>
			<td>
				<input maxlength=6 id="txt_<?php echo $row->ID?>" type="textbox" 
						value="<?php echo $row->commision_fixed ?>" style="display:none; width:80%"/>
				<span id="span_<?php echo $row->ID?>"><?php echo $row->commision_fixed ?></span>
				<a id="<?php echo 'edit_'.$row->ID?>" class="icon-edit icon-large" 
				    onclick="fixed_edit(<?php echo $row->ID?>);" 
					href="javascript:void(0);" >
				</a>
				<a id="<?php echo 'save_'.$row->ID?>"  style="display:none;" class="icon-save icon-large" 
				    onclick="fixed_save(<?php echo $row->ID?>);" 
					href="javascript:void(0);" >
					
				</a>
			</td>
			<td>
				<input maxlength=6 id="txt1_<?php echo $row->ID?>" type="textbox" 
						value="<?php echo $row->commision_percentage ?>" style="display:none; width:80%"/>
				<span id="span1_<?php echo $row->ID?>"><?php echo $row->commision_percentage ?></span>
				<a id="<?php echo 'edit1_'.$row->ID?>" class="icon-edit icon-large" 
				    onclick="percentage_edit(<?php echo $row->ID?>);" 
					href="javascript:void(0);" >
				</a>
				<a id="<?php echo 'save1_'.$row->ID?>"  style="display:none;" class="icon-save icon-large" 
				    onclick="percentage_save(<?php echo $row->ID?>);" 
					href="javascript:void(0);" >
					
				</a>
				
			</td>
		<?php $numbers ++; ?>
		</tr>	
		<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
function fixed_edit(id)
{
	var span = '#span_'+id;
    var txtid = '#txt_'+id;
	var edit = '#edit_'+id;
	var save = '#save_'+id;
	$(txtid).show();
	$(save).show();
	$(edit).hide();
	$(span).hide();
	//var txtvalue = $('#txt_'+id).val();
	//alert(txtid);
}
function fixed_save(id)
{
	var span = '#span_'+id;
    var txtid = '#txt_'+id;
	var edit = '#edit_'+id;
	var save = '#save_'+id;
	
	var val = $('#txt_'+id).val();
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
    jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/comm_fixed_save/"+id+'/'+val,
			success: function(data) {
				window.location.reload();
			}
		});
	});
	jQuery('#blkno').click(function() { 
        $.unblockUI(); 
		$(txtid).hide();
		$(save).hide();
		$(edit).show();
		$(span).show();
       return false; 
    }); 
}

function percentage_edit(id)
{
	var span = '#span1_'+id;
    var txtid = '#txt1_'+id;
	var edit = '#edit1_'+id;
	var save = '#save1_'+id;
	$(txtid).show();
	$(save).show();
	$(edit).hide();
	$(span).hide();
	//var txtvalue = $('#txt_'+id).val();
	//alert(txtid);
}
function percentage_save(id)
{
	var span = '#span1_'+id;
    var txtid = '#txt1_'+id;
	var edit = '#edit1_'+id;
	var save = '#save1_'+id;
	
	var val = $('#txt1_'+id).val();
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
    jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/comm_percentage_save/"+id+'/'+val,
			success: function(data) {
				window.location.reload();
			}
		});
	});
	jQuery('#blkno').click(function() { 
        $.unblockUI(); 
		$(txtid).hide();
		$(save).hide();
		$(edit).show();
		$(span).show();
       return false; 
    }); 
}
</script>
<?php  $this->load->view('include/admin_footer'); ?>