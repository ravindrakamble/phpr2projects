<?php $this->load->view('include/admin_header');?>
	<?php
	$flash = $this->session->flashdata('area_msg');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
	?>
	<h2>Area</h2>
	<?php 
		$city = array();
		$city['0']='--';
		foreach($cities as $c){
			$city[$c->ID]=$c->CITY_NAME;
		}
	?>	
	<form name='areaform' id='areaform' method='post' action='<?php echo base_url()?>admin/area'>
		<?php echo form_dropdown('city',$city);?><br>
		<input type='text' name='area' id='area'><br>
		<input type="hidden" name='areaid' id='areaid'><br>
		<input type='submit' name='submitarea' id='submitarea' value='ADD'>
		<input type='submit' name='updatearea'id='updatearea' 
		 style="display: none" value='UPDATE'>
	</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>City Name</th>
				<th>Area Name</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($areas as $a)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$a->CITY_NAME.'</td>
				<td>'.$a->AREA_NAME.'</td>
				<td>
				<a href="javascript: editarea('.$a->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_area/'.$a->ID.'" class="delete_btn btn btn-danger remove" title="'.$a->AREA_NAME.'">
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
//area edit
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
</script>
<?php  $this->load->view('include/admin_footer'); ?>