<?php
Class Packages_m extends CI_Model{
	
	function edit_local_package($id)
	{
		$q = $q = $this->db->select('package_local.ID,LOCAL_NAME,CITY_NAME,CITY_ID')->from('package_local')->join('city','city.ID = package_local.CITY_ID');
			$this->db->where('package_local.ID',$id);
			 $this->db->distinct();
		$query=$this->db->get()->result();
		foreach($query as $c)
		return $c->LOCAL_NAME.'-'.$c->ID.'-'.$c->CITY_ID;
	}
	
	function delete_local_package($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('package_local');
		$this->session->set_flashdata('msg', "Successfully Deleted.");
	}
	
	function edit_outstaion_package($id)
	{
		$q = $this->db->select('package_outstation.ID,OUTSTATION_NAME,CITY_NAME,CITY_ID')->from('package_outstation')->join('city','city.ID = package_outstation.CITY_ID');
			$this->db->where('package_outstation.ID',$id);
			 $this->db->distinct();
		$query=$this->db->get()->result();
		foreach($query as $c)
		return $c->OUTSTATION_NAME.'-'.$c->ID.'-'.$c->CITY_ID;
	}
	
	function delete_outstaion_package($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('package_outstation');
		$this->session->set_flashdata('msg', "Successfully Deleted.");
	}
	
	function get_all_local_packages($type='')
	{
		$q = $this->db->select('package_local.ID,LOCAL_NAME,CITY_NAME,CITY_ID')->from('package_local')->join('city','city.ID = package_local.CITY_ID');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		return $query;
	}
	
	function get_all_outstation_packages($type='')
	{
			$q = $this->db->select('package_outstation.ID,OUTSTATION_NAME,CITY_NAME,CITY_ID')->from('package_outstation')->join('city','city.ID = package_outstation.CITY_ID');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		return $query;
	}
	
	function get_all_local_package_data($type='')
	{
		$q = $this->db->select('*')->from('local_package_pricing');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		return $query;
	}

	function get_package($city)
	{
		$this->db->distinct();
		$this->db->select('package_local.*');
		$this->db->from('package_local');
		$this->db->join('city','package_local.CITY_ID = city.ID');
		$this->db->where('city.CITY_NAME',$city);
		$this->db->where('LOCAL_NAME !=','');
		$query = $this->db->get()->result();
		return $query;
	}

	/*function get_all_outstation_flexible_data($type='')
	{
		$q = $this->db->select('*')->from('local_outstation_pricing');
			 $this->db->distinct();
		$query=$this->db->get()->result();
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
				<th>(Commission by admin)Fixed</th>
				<th>(Commission by admin)Percentage</th>
				<th>Edit</th><th>Delete</th></tr>";
				foreach($query as $c){
					echo "<tr>
					<td>".$c->car_type."</td>
					<td>".$c->car_name."</td>
					<td>".$c->ac_nonac."</td>
					<td>".$c->time."</td>
					<td>".$c->price."</td>
					<td>".$c->extraprice."</td>
					<td>".$c->kilometerprice."</td>
					<td>".$c->area0."</td>
					<td>".$c->area1."</td>
					<td>".$c->area2."</td>
					<td>".$c->area3."</td>
					<td>".$c->area4."</td>
					<td>".$c->comm_fixed."</td>
					<td>".$c->comm_percentage."</td>
					<td>
						<a href=\"javascript: editoutstationflexprice(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removeoutstationflexprice(".$c->ID.")\">
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

	function get_all_outstation_package_data($type='')
	{
		$q = $this->db->select('*')->from('outstation_package_pricing');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		if($type == 'ajax')
		{
			echo "
				<table class='table table-bordered'>
				<tr>
				<th>Car type</th>
				<th>Car Name</th>
				<th>Ac/ Non AC</th>
				<th>Package Name</th>
				<th>10hr/100km</th>
				<th>Extra Rs/km</th>
				<th>Extra Rs/hr</th>
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
					<td>".$c->car_type."</td>
					<td>".$c->car_name."</td>
					<td>".$c->ac_nonac."</td>
					<td>".$c->package."</td>
					<td>".$c->extraprice."</td>
					<td>".$c->kilometerprice."</td>
					<td>".$c->hourprice."</td>
					<td>".$c->area0."</td>
					<td>".$c->area1."</td>
					<td>".$c->area2."</td>
					<td>".$c->area3."</td>
					<td>".$c->area4."</td>
					<td>".$c->comm_fixed."</td>
					<td>".$c->comm_percentage."</td>
					<td>
						<a href=\"javascript: editoutstationpackprice(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removeoutstationpackprice(".$c->ID.")\">
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
	}*/
	
	
}
?>