<?php $this->load->view('include/admin_header');?>
			<?php
			$flash = $this->session->flashdata('msg');
			if(isset($flash) && !empty($flash))
			{
				echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
			}
			?>
			<h2>Block/Unblock Agent</h2>
		
<div id="collapse4" class="body">
	<div id="blockmsg" style="display:none; cursor: default; padding:10px;">				
		<h6>Are you sure to block/unblock ?</h6> 
		<br />
		<input type="button" id="blkyes" value="Yes" /> 
		<input type="button" id="blkno" value="No" /> 
	</div>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Agent ID</th>
				<th>Agency name</th>
				<th>Website Url</th>
				<th>Place</th>
				<th>City</th>
				<th width="10%">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($agents as $ag){ ?>
		<tr>				
			<td><?php echo $numbers;?></td>
			<td><?php echo $ag->ID ?></td>
			<td><?php echo $ag->BUSINESS_NAME ?></td>
			<td><?php echo $ag->WEBSITE_URL ?></td>
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
		$numbers ++; ?>
		
		</tr>	
		<?php } ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
jQuery(document).ready(function($)
{ 
 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    }); 
});
///block_unblock
function block(id,type)
{
	$.blockUI({ message: jQuery('#blockmsg'), css: { width: '275px' } }); 
    jQuery('#blkyes').click(function() { 
        $.ajax({
			type:"POST",
			url: "<?php echo base_url();?>admin/block/"+id+"/"+type,
			success: function(data) {
				window.location="<?php echo base_url();?>admin_c/block_unblock_agent";
				$.growlUI('Sucessfully<br> Updated !'); 
			}
		});
	});
	jQuery('#blkno').click(function() { 
		id =0;
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
				window.location="<?php echo base_url();?>admin_c/block_unblock_agent";
				$.growlUI('Sucessfully<br> Updated !'); 
			}
		});
	});
	jQuery('#blkno').click(function() { 
		id =0;
        $.unblockUI(); 
       return false; 
    }); 
}
</script>
<?php  $this->load->view('include/admin_footer'); ?>