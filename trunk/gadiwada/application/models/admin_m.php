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
		$this->db->distinct('local_name');
		$this->db->select('local_name');
		$query=$this->db->get('package_local');
		return $query->result();
	}
	
	function get_all_outstation_packages()
	{
		$this->db->distinct('outstation_name');
		$this->db->select('outstation_name');
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
	function search($selval = '0')
	{
		$curr_session = $this->session->all_userdata();
		$this->db->distinct();
		$this->db->select('inventory.*,travel_agent.BUSINESS_NAME');
		$this->db->from('inventory');
		$this->db->join('travel_agent','inventory.AGENT_ID = travel_agent.ID');
		if($curr_session['localcity'] != '0' ){
			$this->db->where('travel_agent.CITY',$curr_session['localcity']);
		}
		if($curr_session['localCarType'] != '0' ){
			$this->db->where('inventory.CAR_TYPE',$curr_session['localCarType']);
		}
		if($selval != '0' ){
			$this->db->where_in('inventory.CAR_NAME',explode(',',$selval));
		}
		/*if($curr_session['localarea'] != '0' ){
			$this->db->where('travel_agent.CITY',$curr_session['localcity']);
		}
		if($curr_session['localestimationjourney'] != '' ){
			$this->db->where('travel_agent.CITY',$curr_session['localcity']);
		}
		if($curr_session['localestimationtime'] != ' ' ){
			$this->db->where('travel_agent.CITY',$curr_session['localcity']);
		}*/
		$query = $this->db->get();
		return $query->result();
	}
	
}