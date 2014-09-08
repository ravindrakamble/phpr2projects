<?php

Class Admin_m extends CI_Model{
	
	function get_all_car_model()
	{
		$this->db->distinct('MODEL_NAME');
		$this->db->select('ID,MODEL_NAME');
		$this->db->where('MODEL_NAME !=','');
		$query=$this->db->get('car_model');
		return $query->result();
	}
	
	function get_all_feature()
	{
		$this->db->distinct('FEATURE_NAME');
		$this->db->select('FEATURE_NAME,ID');
		$this->db->where('FEATURE_NAME !=','');
		$query=$this->db->get('features');
		return $query->result();
	}
	
	function get_all_operator()
	{
		$this->db->distinct();
		$this->db->select('*')->from('travel_agent');
		$this->db->where('BUSINESS_NAME !=','');
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
		$this->db->where('CUST_NAME !=','');
		$query = $this->db->get();
		return $query->result();
	}
	
}