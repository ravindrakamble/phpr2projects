<?php

Class Car_type_m extends CI_Model{

	function get_all_car_type($type='')
	{
		$this->db->distinct();
		$this->db->select('*');
		$query=$this->db->get('car_type')->result();
		return $query;
	}

	function get_car_type($id)
	{
		$query=$this->db->get_where('car_type',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->TYPE_NAME.'-'.$c->ID;
	}
	
	function delete_car_type($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('car_type');
		$this->session->set_flashdata('type_msg', "Successfully Deleted.");
	}
	
	function get_car_name($car_type)
	{
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('car_model');
		$this->db->where('TYPE_ID',$car_type);
		$query = $this->db->get()->result();
		return $query;
	}
}
