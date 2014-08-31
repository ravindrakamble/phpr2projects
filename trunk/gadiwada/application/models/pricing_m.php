<?php
Class Pricing_m extends CI_Model{
	function get_all_local_flexible_data($type='',$id=0)
	{
		$q = $this->db->select('pricing_local.*,car_type.TYPE_NAME,car_model.MODEL_NAME')
			->from('pricing_local');
			$this->db->join('car_type', 'car_type.ID = pricing_local.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_local.car_model_id ');
			if($id > 0){
				$this->db->where('pricing_local.ID',$id);
			}
			if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}
			$this->db->distinct();
		$query=$this->db->get()->result();
		//echo $this->db->last_query();die;
		if($type == 'ajax')
		{
			echo "
				<table class='table table-bordered'>
				<tr>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
				<th>Minmum halt time in min/hr</th>
				<th>Price per minimum booking time</th>
				<th>Price per kilometer</th>
				<th>Base operating area 0</th>
				<th>Base operating area 1</th>
				<th>Base operating area 2</th>
				<th>Base operating area 3</th>
				<th>Base operating area 4</th>
				<th>(Commission by admin)Fixed</th>
				<th>(Commission by admin)Percentage</th>
				<th>Edit</th><th>Delete</th></tr>";
				foreach($query as $c){
					echo "<tr>
					<td>".$c->TYPE_NAME."</td>
					<td>".$c->MODEL_NAME."</td>
					<td>".$c->ac_nonac."</td>
					<td>".$c->min_halt_time."</td>
					<td>".$c->price_per_min_booking_time."</td>
					<td>".$c->price_per_km."</td>
					<td>".$c->base_operating_area_0."</td>
					<td>".$c->base_operating_area_1."</td>
					<td>".$c->base_operating_area_2."</td>
					<td>".$c->base_operating_area_3."</td>
					<td>".$c->base_operating_area_4."</td>
					<td>".$c->commision_fixed."</td>
					<td>".$c->commision_percentage."</td>
					<td>
						<a href=".base_url().'pricing/edit/'.$c->ID.">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removelocalflexprice(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/minus32.png' 
							title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
						</a>
					</td></tr>";
				} 
				echo "</table></fieldset>";
		}
		else
		{
			return $query;
		}
	}
	
	function get_all_outstation_flexible_data($type='',$id=0)
	{
		$q = $this->db->select('pricing_outstation.*,car_type.TYPE_NAME,car_model.MODEL_NAME')
			->from('pricing_outstation');
			$this->db->join('car_type', 'car_type.ID = pricing_outstation.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_outstation.car_model_id ');
			if($id > 0){
				$this->db->where('pricing_outstation.ID',$id);
			}
			if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}
			$this->db->distinct();
		$query=$this->db->get()->result();
		//echo $this->db->last_query();die;
		if($type == 'ajax')
		{
			echo "
				<table class='table table-bordered'>
				<tr>
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
				<th>(Commission by admin) Fixed</th>
				<th>(Commission by admin) Percentage</th>
				<th>Edit</th><th>Delete</th></tr>";
				foreach($query as $c){
					echo "<tr>
					<td>".$c->TYPE_NAME."</td>
					<td>".$c->MODEL_NAME."</td>
					<td>".$c->ac_nonac."</td>
					<td>".$c->min_time_hr."</td>
					<td>".$c->price_per_min_booking_time."</td>
					<td>".$c->extra_price_per_hr."</td>
					<td>".$c->price_per_km."</td>
					<td>".$c->base_operating_area_0."</td>
					<td>".$c->base_operating_area_1."</td>
					<td>".$c->base_operating_area_2."</td>
					<td>".$c->base_operating_area_3."</td>
					<td>".$c->base_operating_area_4."</td>
					<td>".$c->commision_fixed."</td>
					<td>".$c->commision_percentage."</td>
					<td>
						<a href=".base_url().'pricing/update/'.$c->ID.'/Flexible'.">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removeoutprice(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/minus32.png' 
							title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
						</a>
					</td></tr>";
				} 
				echo "</table></fieldset>";
		}
		else
		{
			return $query;
		}
	}
	
	function delete_localFlexiblePrice($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('pricing_local');
		$this->get_all_local_flexible_data('ajax');
	}
	
	function delete_outstation_price($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('pricing_outstation');
		$this->get_all_outstation_flexible_data('ajax');
	}
}
?>