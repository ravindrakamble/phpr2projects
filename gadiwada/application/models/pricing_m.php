<?php
Class Pricing_m extends CI_Model{
	function get_all_local_flexible_data($type='',$id=0)
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_local.*,car_type.TYPE_NAME,car_model.MODEL_NAME,LOCAL_NAME')
			->from('pricing_local');
			$this->db->join('car_type', 'car_type.ID = pricing_local.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_local.car_model_id');
			$this->db->join('package_local', 'package_local.ID = pricing_local.package','left');
			if($agent_id > 0){
				$this->db->where('agent_id',$agent_id);
			}
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
		//echo $this->db->last_query();
		return $query;
	}
	
	function get_all_outstation_flexible_data($type='',$id=0)
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_outstation.*,car_type.TYPE_NAME,car_model.MODEL_NAME,OUTSTATION_NAME')
			->from('pricing_outstation');
			$this->db->join('car_type', 'car_type.ID = pricing_outstation.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_outstation.car_model_id ');
			$this->db->join('package_outstation', 'package_outstation.ID = pricing_outstation.package','left');
			if($agent_id > 0){
				$this->db->where('agent_id',$agent_id);
			}
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
	
	//Only For Local Flexible
	function get_price_for_local($carID, $modelID,$type){
		//$agentid = $this->session->userdata('id');
		$q = $this->db->select('*')->from('pricing_local');
		if($type != ''){
			if($type == 'Flexible')
			$this->db->where('price_for','Flexible');
			if($type == 'Package')
			$this->db->where('price_for','Package');
		}
		$this->db->where('car_type_id',$carID);
		$this->db->where('car_model_id',$modelID);
		$query = $q->get()->row();
		return $query;
	}
}
?>