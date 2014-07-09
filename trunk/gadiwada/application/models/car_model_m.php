<?php
Class Car_model_m extends CI_Model{
	
	function get_all_car_model($type='')
	{
		$this->db->distinct();
		$this->db->select('car_model.ID,MODEL_NAME,TYPE_NAME')->from('car_model')->join('car_type','car_type.ID = car_model.TYPE_ID');
		$query=$this->db->get()->result();
		if($type == 'ajax')
		{
			echo "	<table class='table table-bordered'>
							<tr>
								<th>Car Type</th>
								<th>Model Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							";
			if(!empty($query))
			{
				foreach ($query as $a)
				{
					echo "<tr><td>".$a->TYPE_NAME."</td><td>".$a->MODEL_NAME."</td>
							<td>
								<a href=\"javascript: editcarmodel(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/notepencil32.png' 
									title='Edit' alt='Edit' class='alignleft' style='width:15px;' />
								</a>
							</td>
							<td>
								<a href=\"javascript: removecarmodel(".$a->ID.")\">
									<img src='".base_url()."img/mono-icons/minus32.png' 
									title='Delete' alt='Delete' class='alignleft' style='width:15px;' />
								</a>
							</td></tr>";
							
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

	function edit_car_model($id)
	{
		$q = $this->db->select('car_model.ID,MODEL_NAME,TYPE_NAME,TYPE_ID')->from('car_model')->join('car_type','car_type.ID = car_model.TYPE_ID');
			$this->db->distinct();
			 $this->db->where('car_model.ID',$id);
		$query = $this->db->get()->result();
		foreach($query as $c)
		return $c->MODEL_NAME.'-'.$c->ID.'-'.$c->TYPE_ID;
	}
	
	function delete_car_model($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('car_model');
		$this->get_all_car_model('ajax');
	}
}
?>