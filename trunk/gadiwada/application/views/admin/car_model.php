<?php $this->load->view('include/admin_header');?>
	<?php
	$flash = $this->session->flashdata('model');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
	?>
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
		<input type='submit' name='updateseater' id='updateseater' 
		 style="display: none" value='UPDATE'>
	</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car Type</th>
				<th>Car Model</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($car_model as $a)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$a->TYPE_NAME.'</td>
				<td>'.$a->MODEL_NAME.'</td>
				<td>
				<a href="javascript: editcarmodel('.$a->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_car_model/'.$a->ID.'" class="delete_btn btn btn-danger remove" title="'.$a->MODEL_NAME.'">
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
//Car Model 
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
</script>
<?php  $this->load->view('include/admin_footer'); ?>