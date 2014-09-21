<?php $this->load->view('include/admin_header');?>
<!-- .outer -->
<!--<header>
	<a href="<?php echo base_url();?>admin/add_school" class="btn btn-success">
		Add School
	</a>
</header>-->
			<?php
			$flash = $this->session->flashdata('type_msg');
			if(isset($flash) && !empty($flash))
			{
				echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
			}
			?>
			<h2>Car Type</h2>
			<form name='cartypeform' id='cartypeform' method='post' 
				  action='<?php echo base_url()?>admin/car_type'>
					<input type='text' name='cartype' id='cartype'><br>
					<input type="hidden" name='cartypeid' id='cartypeid'><br>
					<input type='submit' name='submitcartype' id='submitcartype' value='ADD'>
				<input type='submit' name='updatecartype'id='updatecartype' 
				 style="display: none" value='UPDATE'>
			</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car Type</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($car_type as $c)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$c->TYPE_NAME.'</td>
				<td>
				<a href="javascript: editcartype('.$c->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_car_type/'.$c->ID.'" class="delete_btn btn btn-danger remove" title="'.$c->TYPE_NAME.'">
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
var frmvalidator = new Validator("cartypeform");
frmvalidator.addValidation("cartype","req","Please Enter your car Type");
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

</script>
<?php  $this->load->view('include/admin_footer'); ?>