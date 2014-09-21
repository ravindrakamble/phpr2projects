<?php $this->load->view('include/admin_header');?>
	<?php
	$flash = $this->session->flashdata('msg');
	if(isset($flash) && !empty($flash))
	{
		echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
	}
	?>
	<h2>Outstation Packages</h2>
	<?php 
		$city = array();
		$city['']='--';
		foreach($cities as $c){
			$city[$c->ID]=$c->CITY_NAME;
		}
	?>	
	<form name='packagesform' id='packagesform' method='post' action='<?php echo base_url()?>admin/packages/outstation'>
		<?php echo form_dropdown('city',$city);?><br>
		<input type='text' name='package' id='package'><br>
		<input type='hidden' name='packageid' id='packageid'><br>
		<input type='submit' name='submitpackage' id='submitpackage' value='ADD'>
		<input type='submit' name='updatepackage'id='updatepackage' 
		 style="display: none" value='UPDATE'>
	</form>
<div id="collapse4" class="body">
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Package Name</th>
				<th>City Name</th>
				<th width="10%">OPTIONS</th>
			</tr>
		</thead>
		<tbody>
			<?php $numbers = 1;
			foreach($outstation as $a)
			{
				echo '<tr>
				<td>'.$numbers.'</td>
				<td>'.$a->OUTSTATION_NAME.'</td>
				<td>'.$a->CITY_NAME.'</td>
				<td>
				<a href="javascript: editout('.$a->ID.')" class="ajax btn edit" alt="Edit">
				<i class="icon-edit"></i>
				</a>&nbsp;&nbsp;
				<a href="'.base_url().'ajax/delete_outstaion_package/'.$a->ID.'" class="delete_btn btn btn-danger remove" title="'.$a->OUTSTATION_NAME.'">
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
var frmvalidator = new Validator("packagesform");
frmvalidator.addValidation("city","req","Please select your City.");
frmvalidator.addValidation("package","req","Please Enter your package name.");
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
//outstation package 
function editout(id)
{
	$("#submitpackage").hide();
	$.ajax({
		type:"POST",
		url: "<?php echo base_url();?>ajax/edit_outstaion_package/"+id,
		success: function(response) {
			var c = response.split("-");
			//$('input[name="chkpackage"]').val('Local').attr("checked",true);
			$('input#package').val(c[0]);
			$('input#packageid').val(c[1]);
			$('select[name="city"]').find('option[value='+c[2]+']').attr("selected",true);
			$("#updatepackage").show();
		}
	});
}
</script>
<?php  $this->load->view('include/admin_footer'); ?>