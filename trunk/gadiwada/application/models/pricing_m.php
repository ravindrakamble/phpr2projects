<?php
Class Pricing_m extends CI_Model{
	function get_all_local_flexible_data($type='',$id=0)
	{
		$q = $this->db->select('pricing_local.*,car_type.TYPE_NAME,car_model.MODEL_NAME')
			->from('pricing_local');
			$this->db->join('car_type', 'car_type.ID = pricing_local.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_local.car_model_id ');
			if($id > 0){
				$this->db->where('pricing_local.ID',$id);
			}
			if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}
			$this->db->distinct();
		$query=$this->db->get()->result();
		return $query;
	}
	
	function get_all_outstation_flexible_data($type='',$id=0)
	{
		$q = $this->db->select('pricing_outstation.*,car_type.TYPE_NAME,car_model.MODEL_NAME')
			->from('pricing_outstation');
			$this->db->join('car_type', 'car_type.ID = pricing_outstation.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_outstation.car_model_id ');
			if($id > 0){
				$this->db->where('pricing_outstation.ID',$id);
			}
			if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}
			$this->db->distinct();
		$query=$this->db->get()->result();
		//echo $this->db->last_query();die;
		return $query;
	}
	
	function delete_localFlexiblePrice($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('pricing_local');
		$this->session->set_flashdata('lpmsg', "Successfully Deleted.");
	}
	
	function delete_outstation_price($id)
	{
		$this->db->where('ID',$id);
		$this->db->delete('pricing_outstation');
		$this->session->set_flashdata('omsg', "Successfully Deleted.");
	}
}
?>