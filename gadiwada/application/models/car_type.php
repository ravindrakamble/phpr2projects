<?php

Class Car_type_m extends CI_Model{

	function get_all_car_type($type='')
	{
		$this->db->distinct('type_name');
		$this->db->select('type_name');
		$query=$this->db->get('car_type');
		return $query;
	}

	function get_city_name($id)
	{
		$query=$this->db->get_where('car_type',array('ID'=>$id))->result();
		foreach($query as $c)
		return $c->car_type.'-'.$c->ID;
	}
	
	function delete_city($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('car_type');
		$this->get_all_car_type('ajax');
	}
}
