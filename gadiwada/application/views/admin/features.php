<?php $this->load->view('include/admin_header');?>
			<?php
			$flash = $this->session->flashdata('msg');
			if(isset($flash) && !empty($flash))
			{
				echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
			}
			?>
			<h2>Features</h2>
			<form name='featuresform' id='featuresform' method='post' 
				  action='<?php echo base_url()?>admin/features'>
					<input type='text' name='feature' id='feature'><br>
					<input type='hidden' name='featureid' id='featureid'><br>
					<input type='submit' name='submitfeatures' id='submitfeatures' value='ADD'>
				<input type='submit' name='updatefeatures'id='updatefeatures' 
				 style="display: none" value='UPDATE'>
			</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Feature Name</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($features as $c)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$c->FEATURE_NAME.'</td>
				<td>
				<a href="javascript: editfeature('.$c->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_car_feature/'.$c->ID.'" class="delete_btn btn btn-danger remove" title="'.$c->FEATURE_NAME.'">
				<i class="icon-remove"></i>
				</a>
				</td>
				</tr>';
				$numbers ++ ;
			}  ?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
jQuery(document).ready(function($)
{ 
 	$("#alert").fadeTo(2000,2000).fadeOut(2000, function(){
    }); 
	$(".delete_btndelete_btn").click(function()
	{
		var name = $(this).attr('title');
		if(confirm("Do you really want to delete ' "+ name + " ' ? ")==false)
		{
			return false;
		}
		return true;
	});
});
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

</script>
<?php  $this->load->view('include/admin_footer'); ?>