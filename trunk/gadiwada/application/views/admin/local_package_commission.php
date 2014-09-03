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
	<h3>Local Package Commission</h3>
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
		foreach($localPackData as $row){ ?>
		<tr>				
			<td><?php echo $numbers ?></td>
			<td><?php echo $row->TYPE_NAME ?></td>
			<td><?php echo $row->MODEL_NAME ?></td>
			<td><?php echo $row->ac_nonac ?></td>
			<td><?php echo $row->package ?></td>
			<td><?php echo $row->extra_per_km ?></td>
			<td><?php echo $row->extra_per_hr ?></td>
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
</div>>
<?php  $this->load->view('include/admin_footer'); ?>