<?php
Class Area_m extends CI_Model{
	
	function get_all_areas($type='')
	{
		$this->db->distinct('area');
		$this->db->select('area.ID,AREA_NAME,CITY_NAME')->from('area')->join('city','city.ID = area.CITY_ID');
		$query=$this->db->get()->result();
		return $query;
	}

	function get_area_name($id)
	{
		$q = $this->db->select('area.ID,AREA_NAME,CITY_NAME,CITY_ID')->from('area')->join('city','city.ID = area.CITY_ID');
			 $this->db->where('area.ID',$id);
		$query=$this->db->get()->result();
		foreach($query as $c)
		return $c->AREA_NAME.'-'.$c->ID.'-'.$c->CITY_ID;
	}
	
	function delete_area($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('area');
		$this->session->set_flashdata('area_msg', "Successfully Deleted.");
	}
	
	function get_areas($city)
	{
		$this->db->distinct();
		$this->db->select('area.*');
		$this->db->from('area');
		$this->db->join('city','area.CITY_ID = city.ID');
		$this->db->where('city.CITY_NAME',$city);
		$this->db->where('AREA_NAME !=','');
		$query = $this->db->get()->result();
		return $query;
	}
}
?>