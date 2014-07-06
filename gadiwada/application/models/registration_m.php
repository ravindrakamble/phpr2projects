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
}
	
?>