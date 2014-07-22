<?php

Class Admin_m extends CI_Model{
	
	function get_all_car_model()
	{
		$this->db->distinct('MODEL_NAME');
		$this->db->select('MODEL_NAME');
		$query=$this->db->get('car_model');
		return $query->result();
	}
	
	function get_all_feature()
	{
		$this->db->distinct('FEATURE_NAME');
		$this->db->select('FEATURE_NAME,ID');
		$query=$this->db->get('features');
		return $query->result();
	}
	
	function get_all_operator()
	{
		$this->db->distinct();
		$this->db->select('*')->from('travel_agent');
		$this->db->where('STATUS',1);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_all_agents()
	{
		$this->db->distinct();
		$this->db->select('*')->from('travel_agent');
		/*$this->db->join('inventory','inventory.AGENT_ID = travel_agent.ID');*/
		//$this->db->where('STATUS',1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_all_users()
	{
		$this->db->distinct();
		$this->db->select('*')->from('customer');
		$query = $this->db->get();
		return $query->result();
	}
	
}