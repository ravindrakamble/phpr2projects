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
		$this->get_all_local_packages('ajax');
	}
	
	function edit_outstaion_package($id)
	{
		$q = $q = $this->db->select('package_outstation.ID,OUTSTATION_NAME,CITY_NAME,CITY_ID')->from('package_outstation')->join('city','city.ID = package_outstation.CITY_ID');
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
		$this->get_all_local_packages('ajax');
	}
	
	function get_all_local_packages($type='')
	{
		$q = $this->db->select('package_local.ID,LOCAL_NAME,CITY_NAME,CITY_ID')->from('package_local')->join('city','city.ID = package_local.CITY_ID');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		if($type == 'ajax')
		{
			echo "<fieldset><legend>Local Packages</legend>
				<table class='table table-bordered'>
				<tr><th>Name</th><th>Edit</th><th>Delete</th></tr>";
				foreach($query as $c){
					echo "<tr><td>".$c->LOCAL_NAME."</td><td>".$c->CITY_NAME."</td>
					<td>
						<a href=\"javascript: editlocal(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removelocal(".$c->ID.")\">
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
	
	function get_all_outstation_packages($type='')
	{
			$q = $this->db->select('package_outstation.ID,OUTSTATION_NAME,CITY_NAME,CITY_ID')->from('package_outstation')->join('city','city.ID = package_outstation.CITY_ID');
			 $this->db->distinct();
		$query=$this->db->get()->result();
		if($type == 'ajax')
		{
			echo "<fieldset><legend>Outstation Packages</legend>
				<table class='table table-bordered'>
				<tr><th>Name</th><th>City</th><th>Edit</th><th>Delete</th></tr>";
				foreach($query as $c){
					echo "<tr><td>".$c->OUTSTATION_NAME."</td><td>".$c->CITY_NAME."</td>
					<td>
						<a href=\"javascript: editout(".$c->ID.")\">
							<img src='".base_url()."img/mono-icons/notepencil32.png' 
							title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
						</a>
					</td>
					<td>
						<a href=\"javascript: removeout(".$c->ID.")\">
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
	
		
}
?>