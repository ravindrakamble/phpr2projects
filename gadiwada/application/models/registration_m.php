<?php

Class Registration_m extends CI_Model{
	function save($data)
	{
		$this->db->insert('travel_agent',$data);
		return $this->db->insert_id();
	}
	function save_contact($contact)
	{
		$this->db->insert('agent_contacts',$contact);
		return true;
	}
	
	function get_booking_info($from,$to)
	{
		$where ='';
		$this->db->distinct();
		$this->db->select('RECEIPT_DATE,inventory.*, travel_agent.BUSINESS_NAME,TYPE_NAME,MODEL_NAME');
		$this->db->from('inventory');
		$this->db->join('travel_agent','inventory.AGENT_ID = travel_agent.ID');
		$this->db->join('car_type','car_type.ID = inventory.CAR_TYPE');
		$this->db->join('car_model','car_model.ID = inventory.CAR_NAME');
		$this->db->join('cust_booking','cust_booking.AGENT_ID = inventory.AGENT_ID','LEFT');
		$where .= "STR_TO_DATE(AGREEMEST_END_DATE, '%d/%m/%Y') > CURDATE()";
		$where .=  "AND RECEIPT_DATE IS NOT NULL ";
		if($from !='' && $to !='')
		{
			$where .= "AND RECEIPT_DATE >= '$from' ";
			$where .= "AND RECEIPT_DATE <= '$to' ";
		}
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
		return array();
	}
}
	
?>