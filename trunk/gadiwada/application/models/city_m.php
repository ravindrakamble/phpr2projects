<?php
Class City_m extends CI_Model{
	
	function get_all_cities($type='',$id=0)
	{
		$this->db->distinct('city');
		$this->db->select('*');
		$query=$this->db->get('city')->result();
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
							<tr>
								<th>City Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							";
			if(!empty($query))
			{
				foreach ($query as $c)
				{
					echo "<td>".$c->CITY_NAME."</td>";
					echo "<td>
							<a href=\"javascript: editcity(".$c->ID.")\">
								<img src='".base_url()."img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
						</td>
						<td>
							<a href=\"javascript: removecity(".$c->ID.")\">
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

	function get_city_name($id)
	{
		$query=$this->db->get_where('city',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->CITY_NAME.'-'.$c->ID;
	}
	
	function delete_city($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('city');
		$this->get_all_cities('ajax');
	}
	
}
?>