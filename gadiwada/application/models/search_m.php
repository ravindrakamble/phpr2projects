<?php
Class Search_m extends CI_Model
{
	
	function search($selval = '0', $opr_names = '0', $features = '0')
	{
		$curr_session = $this->session->all_userdata();
		$this->db->distinct();
		$this->db->select('inventory.*,travel_agent.BUSINESS_NAME');
		$this->db->from('inventory');
		$this->db->join('travel_agent','inventory.AGENT_ID = travel_agent.ID');
		if($curr_session['localcity'] != '0' ){
			$this->db->where('travel_agent.CITY',$curr_session['localcity']);
		}
		else if($curr_session['city'] != '0' ){
			$this->db->where('travel_agent.CITY',$curr_session['city']);
		}
		if($curr_session['localCarType'] != '0' ){
			$this->db->where('inventory.CAR_TYPE',$curr_session['localCarType']);
		} 
		else if($curr_session['outCarType'] != '0' ){
			$this->db->where('inventory.CAR_TYPE',$curr_session['outCarType']);
		}
		
		if($selval != '0'  && $selval != ''){
			$this->db->where_in('inventory.CAR_NAME',explode(',',$selval));
		}
		
		if($opr_names != '0' && $opr_names != ''){
			$this->db->where_in('travel_agent.BUSINESS_NAME',explode(',',$opr_names));
		}
		
		if($features != '0'  && $features != ''){
			$this->db->like('inventory.CAR_FEATURES',$features);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	

}

?>