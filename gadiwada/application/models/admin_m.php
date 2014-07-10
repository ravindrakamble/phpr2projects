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
		$this->db->select('FEATURE_NAME');
		$query=$this->db->get('features');
		return $query->result();
	}
	
	function get_all_operator()
	{
		$this->db->distinct('BUSINESS_NAME');
		$this->db->select('BUSINESS_NAME,ID')->from('travel_agent');
		$query = $this->db->get();
		return $query->result();
	}
	
}