<?php $this->load->view('include/header');?>
<script type="text/javascript">
var TSort_Data = new Array ('inventory_table', 's', 's', 'i','i','d','d','');
</script>
			<!-- content -->
<div class="content-boxs">
	<div id='inventory_data'>
		<h3 align="center">Inventory Details</h3>
		<form name="inventory" method="POST" action="#">
		<?php 
		$type = array();
			$type['0']='--';
			    foreach($car_type as $c){
				  $type[$c->type_name]=$c->type_name;
			}
		$features = array();
			$features['0']='--';
			    foreach($feature as $f){
				  $features[$f->FEATURE_NAME]=$f->FEATURE_NAME;
			}
		?>
			<table width="100%">
				<tr>																																						<td style="padding-left: 15%">
						<table>
						<tr>
							<td>Car Type</td>
							<td><?php echo form_dropdown('',$type);?></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Car Details</h5></th>
						</tr>
						<tr>
							<td>Car Name</td>
							<td><input type="text" maxlength="20"/></td>
						</tr>
						<tr>
							<td>Car Number</td>
							<td><input type="text"  maxlength="20"/></td>
						</tr>
						<tr>
							<td>Purchase year</td>
							<td><input type="text"  maxlength="4"/></td>
						</tr>
						<tr>
							<td>Car Feature</td>
							<td><?php echo form_dropdown('',$features);?></td>
						</tr>
					</table>
					</td>
					<td>
						<table>
						<tr>
							<th colspan="2"><h5>Owner Details</h5></th>
						</tr>
						<tr>
							<td>Owner Name</td>
							<td><input type="text" maxlength="30"/></td>
						</tr>
						<tr>
							<td>Owner Number</td>
							<td><input type="text" maxlength="12"/></td>
						</tr>
						<tr>
							<th colspan="2"><h5>Agreement Details</h5></th>
						</tr>
						<tr>
							<td>Agreement start date</td>
							<td><input type="text" class="dt"/></td>
						</tr>
						<tr>
							<td>Agreement end date</td>
							<td><input type="text" class="dt"/></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="ac_nonac[]" value="AC"/> AC</td>
							<td><input type="checkbox" name="ac_nonac[]" value="Non-AC"/> Non-AC</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="out_local[]" value="Local"/> Local</td>
							<td><input type="checkbox" name="out_local[]" value="Outstation"/> Outstation</td>
						</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td style="padding-left: 40%"><input type="submit" name="submit" value="Submit" class="btn btn-info"/> </td>
					<td><input type="reset" name="reset" value="Reset" class="btn btn-inverse"/> </td>
				</tr>
			</table>
		</form>  
	</div>
	<div id='inventory_view'>
		<table id="inventory_table" class="table table-bordered table-striped table-condensed">
			<tr>
				<th>Car type</th>
				<th>Car name</th>
				<th>Car number</th>
				<th>Purchase year</th>
				<th>Agreement start date</th>
				<th>Agreement end date</th>
				<th colspan="3" width="10%">Action</th>
			</tr>
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th><a href="" class="btn btn-danger btn-small">Active</a></th>
				<th><a href="" class="btn btn-warning btn-small">Edit</a></th>
				<th><a href="" class="btn btn-success btn-small">View</a></th>
			</tr>
			<tr>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th>-</th>
				<th><a href="" class="btn btn-danger btn-small">Active</a></th>
				<th><a href="" class="btn btn-warning btn-small">Edit</a></th>
				<th><a href="" class="btn btn-success btn-small">View</a></th>
			</tr>
		</table>
	</div>
</div>
<?php $this->load->view('include/footer');?>