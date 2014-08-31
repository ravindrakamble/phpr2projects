<?php
Class City_m extends CI_Model{
	
	function get_all_cities($type='',$id=0)
	{
		$this->db->distinct('city');
		$this->db->select('*');
		$query=$this->db->get('city')->result();
		return $query;
	}

	function get_city_name($id)
	{
		$query=$this->db->get_where('city',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->CITY_NAME.'-'.$c->ID;
	}
	
	function delete_city($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('city');
		$this->session->set_flashdata('city_msg', "Successfully Deleted.");
	}
	
}
?>