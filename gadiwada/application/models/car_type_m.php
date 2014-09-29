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
	
	function get_unique_carname($car_type,$type)
	{
		$agent_id = $this->session->userdata('id');
		$q = $this->db->query("SELECT DISTINCT *FROM (car_model)WHERE TYPE_ID =  $car_type AND id NOT IN (select car_model_id from pricing_local where agent_id =$agent_id  and car_type_id = $car_type and price_for = '$type') ");
		$query = $q->result();
		//echo $this->db->last_query();
		return $query;
	}
}
