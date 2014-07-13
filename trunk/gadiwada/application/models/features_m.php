<?php
Class Features_m extends CI_Model{
	
	function get_all_features($type='')
	{
		$this->db->distinct();
		$this->db->select('*');
		$query=$this->db->get('features')->result();
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
							<tr><th>Feature Name</th><th>Edit</th><th>Delete</th></tr> ";
			if(!empty($query))
			{
				foreach ($query as $c)
				{
					echo "<td>".$c->FEATURE_NAME."</td>";
					echo "<td>
							<a href=\"javascript: editfeature(".$c->ID.")\">
								<img src='".base_url()."img/mono-icons/notepencil32.png' 
								title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
							</a>
						</td>
						<td>
							<a href=\"javascript: removefeature(".$c->ID.")\">
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

	function get_car_feature($id)
	{
		$query=$this->db->get_where('features',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->FEATURE_NAME.'-'.$c->ID;
	}
	
	function delete_car_feature($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('features');
		$this->get_all_features('ajax');
	}
}
?>