<?php
Class Discounts_m extends CI_Model{
	
	function get_all_discounts($type='')
	{
		$this->db->distinct();
		$this->db->select('*');
		$query=$this->db->get('discount_coupons')->result();
		return $query;
	}

	function edit_discount($id)
	{
		$query=$this->db->get_where('discount_coupons',array('ID'=>$id))->result();
		return $query;
	}
	
	function delete_discount($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('discount_coupons');
		$this->session->set_flashdata('msg', "Successfully Deleted.");
	}
}
?>