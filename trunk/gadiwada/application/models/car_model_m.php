<?php
Class Car_model_m extends CI_Model{
	
	function get_all_car_model($type='')
	{
		$this->db->distinct();
		$this->db->select('car_model.ID,MODEL_NAME,TYPE_NAME')->from('car_model')->join('car_type','car_type.ID = car_model.TYPE_ID');
		$query=$this->db->get()->result();
		return $query;
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
		$this->session->set_flashdata('model', "Successfully Deleted.");
	}
}
?>