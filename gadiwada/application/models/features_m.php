<?php
Class Features_m extends CI_Model{
	
	function get_all_features($type='')
	{
		$this->db->distinct();
		$this->db->select('*');
		$query=$this->db->get('features')->result();
		return $query;
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
		$this->session->set_flashdata('msg', "Successfully Deleted.");
	}
}
?>