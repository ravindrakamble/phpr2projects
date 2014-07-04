<?php

Class Admin_m extends CI_Model{
	
	function get_all_cities()
	{
		$this->db->distinct('city');
		$this->db->select('city_name');
		$query=$this->db->get('city');
		return $query->result();
	}
	
	function get_all_local_packages()
	{
		$this->db->distinct('PACKAGE_NAME');
		$this->db->select('PACKAGE_NAME');
		$query=$this->db->get('package_local');
		return $query->result();
	}
	
	function get_all_outstation_packages()
	{
		$this->db->distinct('PACKAGE_NAME');
		$this->db->select('PACKAGE_NAME');
		$query=$this->db->get('package_outstation');
		return $query->result();
	}
	
	function get_all_car_type()
	{
		$this->db->distinct('type_name');
		$this->db->select('type_name');
		$query=$this->db->get('car_type');
		return $query->result();
	}
	
	function get_all_feature()
	{
		$this->db->distinct('FEATURE_NAME');
		$this->db->select('FEATURE_NAME');
		$query=$this->db->get('features');
		return $query->result();
	}
	
}