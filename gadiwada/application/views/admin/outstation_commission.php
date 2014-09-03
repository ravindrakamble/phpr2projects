<?php $this->load->view('include/admin_header');?>
			<?php
			$flash = $this->session->flashdata('cmsg');
			if(isset($flash) && !empty($flash))
			{
				echo "<div id='alert' class='alert alert-info'>".$flash."</div>";
			}
			?>
		
<div id="collapse4" class="body">
	<h3>Outstation Flexible Commission</h3>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
				<th>Minmum booking time in hrs</th>
				<th>Price per minimum booking time</th>
				<th>Extra price in 1 hr</th>
				<th>Price per kilometer</th>
				<th>Base operating area 0</th>
				<th>Base operating area 1</th>
				<th>Base operating area 2</th>
				<th>Base operating area 3</th>
				<th>Base operating area 4</th>
				<th>Commission Fixed</th>
				<th>Commission Percentage</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($outFlexiData as $row){ ?>
		<tr>				
			<td><?php echo $numbers ?></td>
			<td><?php echo $row->TYPE_NAME ?></td>
			<td><?php echo $row->MODEL_NAME ?></td>
			<td><?php echo $row->ac_nonac ?></td>
			<td><?php echo $row->min_time_hr ?></td>
			<td><?php echo $row->price_per_min_booking_time ?></td>
			<td><?php echo $row->extra_price_per_hr ?></td>
			<td><?php echo $row->price_per_km ?></td>
			<td><?php echo $row->base_operating_area_0 ?></td>
			<td><?php echo $row->base_operating_area_1 ?></td>
			<td><?php echo $row->base_operating_area_2 ?></td>
			<td><?php echo $row->base_operating_area_3 ?></td>
			<td><?php echo $row->base_operating_area_4 ?></td>
			<td><?php echo $row->commision_fixed ?></td>
			<td><?php echo $row->commision_percentage ?></td>
			<td>
				<a href="<?php echo base_url()?>" >
					<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
					title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
				</a>
			</td>
		<?php $numbers ++; ?>
		</tr>	
		<?php } ?>
		</tbody>
	</table>
	<hr/>
	<h3>Outstation Package Commission</h3>
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
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
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php $numbers = 1;
		foreach($outPackData as $row){ ?>
		<tr>				
			<td><?php echo $numbers ?></td>
			<td><?php echo $row->TYPE_NAME ?></td>
			<td><?php echo $row->MODEL_NAME ?></td>
			<td><?php echo $row->ac_nonac ?></td>
			<td><?php echo $row->package ?></td>
			<td><?php echo $row->extra_price_per_hr ?></td>
			<td><?php echo $row->price_per_km ?></td>
			<td><?php echo $row->base_operating_area_0 ?></td>
			<td><?php echo $row->base_operating_area_1 ?></td>
			<td><?php echo $row->base_operating_area_2 ?></td>
			<td><?php echo $row->base_operating_area_3 ?></td>
			<td><?php echo $row->base_operating_area_4 ?></td>
			<td><?php echo $row->commision_fixed ?></td>
			<td><?php echo $row->commision_percentage ?></td>
			<td>
				<a href="<?php echo base_url()?>" >
					<img src='<?php echo base_url()?>img/mono-icons/notepencil32.png' 
					title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
				</a>
			</td>
		<?php $numbers ++; ?>
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

</script>
<?php  $this->load->view('include/admin_footer'); ?>