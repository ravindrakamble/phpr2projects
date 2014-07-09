<?php
Class Search_m extends CI_Model
{
	
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

?>