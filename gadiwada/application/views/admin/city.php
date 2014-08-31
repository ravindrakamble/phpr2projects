<?php $this->load->view('include/admin_header');?>
			<?php
			$flash = $this->session->flashdata('city_msg');
			if(isset($flash) && !empty($flash))
			{
				echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
			}
			?>
			<h2>City</h2>
			<form name='cityform' method='post' id='cityform' action='<?php echo base_url()?>admin/city'>
				<input type='text' name='city' id='city'><br>
				<input type="hidden" name='cityid' id='cityid'><br>
				<input type='submit' name='submitcity' id='submitcity' value='ADD'>
				<input type='submit' name='updatecity'id='updatecity' 
				 style="display: none" value='UPDATE'>
			</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>City Name</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($cities as $c)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$c->CITY_NAME.'</td>
				<td>
				<a href="javascript: editcity('.$c->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_city/'.$c->ID.'" class="delete_btn btn btn-danger remove" title="'.$c->CITY_NAME.'">
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

</script>
<?php  $this->load->view('include/admin_footer'); ?>