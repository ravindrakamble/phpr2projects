<?php

Class Car_type_m extends CI_Model{

	function get_all_car_type($type='')
	{
		$this->db->distinct('type_name');
		$this->db->select('type_name');
		$query=$this->db->get('car_type');
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
							<tr>
								<th>Car Type</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							";
			if(!empty($query))
			{
				foreach ($query as $c)
				{
					echo "<td>".$c->car_type."</td>";
					echo "<td>
							<a href=\"javascript: editcartype(".$c->ID.")\">
								<img src='".base_url()."img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
						</td>
						<td>
							<a href=\"javascript: removecartype(".$c->ID.")\">
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
		$query=$this->db->get_where('car_type',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->car_type.'-'.$c->ID;
	}
	
	function delete_city($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('car_type');
		$this->get_all_car_type('ajax');
	}
}
