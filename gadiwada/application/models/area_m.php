<?php
Class Area_m extends CI_Model{
	
	function get_all_areas($type='')
	{
		$this->db->distinct('area');
		$this->db->select('area.ID,AREA_NAME,CITY_NAME')->from('area')->join('city','city.ID = area.CITY_ID');
		$query=$this->db->get()->result();
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
							<tr>
								<th>City Name</th>
								<th>Area Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							";
			if(!empty($query))
			{
				foreach ($query as $c)
				{
					echo "<td>".$c->CITY_NAME."</td><td>".$c->AREA_NAME."</td>";
					echo "<td>
							<a href=\"javascript: editarea(".$c->ID.")\">
								<img src='".base_url()."img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
						</td>
						<td>
							<a href=\"javascript: removearea(".$c->ID.")\">
								<img src='".base_url()."img/mono-icons/minus32.png' 
								title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
							</a>
						</td>
				 </tr>";
				}
				echo "</table>";
			}
			else
			echo "";
		}
		else
		{
			return $query;
		}
	}

	function get_area_name($id)
	{
		$q = $this->db->select('area.ID,AREA_NAME,CITY_NAME,CITY_ID')->from('area')->join('city','city.ID = area.CITY_ID');
			 $this->db->where('area.ID',$id);
		$query=$this->db->get()->result();
		foreach($query as $c)
		return $c->AREA_NAME.'-'.$c->ID.'-'.$c->CITY_ID;
	}
	
	function delete_area($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('area');
		$this->get_all_areas('ajax');
	}
}
?>