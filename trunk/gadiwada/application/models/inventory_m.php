<?php

Class Inventory_m extends CI_Model{
	
	function save($inventory)
	{
		$this->db->insert('inventory',$inventory);
		return true;
	}
	
	function update($inventory,$id)
	{
		$this->db->where('ID',$id);
		$this->db->update('inventory',$inventory);
		return true;
	}
	
	function get_all_data()
	{
		$id = $this->session->userdata('id');
		$query = $this->db->query("SELECT distinct *,IF(STR_TO_DATE(AGREEMEST_END_DATE, '%d/%m/%Y') < NOW(),TRUE,FALSE) as ISEXPIRED FROM inventory where AGENT_ID = $id");
				 /*$this->db->select("IF(STR_TO_DATE(AGREEMEST_END_DATE,'%d/%m/%Y') < NOW(),1,0) as ISEXPIRED");
		 $this->db->get('inventory');*/
		return $query->result();
	}
	
	function get_inventory_details($id)
	{
		$AGENT_ID = $this->session->userdata('id');
		$query = $this->db->select('*')->where('ID',$id)->where('AGENT_ID',$AGENT_ID)->get('inventory');
		$this->db->distinct();
		return $query->row();
	}
	
	function get_detailsForBilling($id)
	{
		$query = $this->db->select('*')->from('travel_agent');
				$this->db->join('inventory','travel_agent.id = inventory.AGENT_ID')->where('inventory.ID',$id);
				$this->db->distinct();
				$this->db->where('STATUS',1);
		return $query->get()->row_array();
	}
}
?>