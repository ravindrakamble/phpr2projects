<?php
Class Pricing_m extends CI_Model{
	function get_all_local_pricing_data($id=0)
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_local.*,NON_AC,AC,LOCAL,car_type.TYPE_NAME,car_model.MODEL_NAME,LOCAL_NAME')
			->from('pricing_local');
			$this->db->join('inventory', 'inventory.ID = pricing_local.inventory_id');
			$this->db->join('car_type', 'car_type.ID = pricing_local.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_local.car_model_id');
			$this->db->join('package_local', 'package_local.ID = pricing_local.package','left');
			if($agent_id > 0){
				$this->db->where('inventory.agent_id',$agent_id);
			}
			if($id > 0){
				$this->db->where('pricing_local.inventory_id',$id);
			}
			$this->db->where('inventory.LOCAL',1); //for Only Local
			/*if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}*/
			$this->db->distinct();
		$query=$this->db->get()->result();
		//echo $this->db->last_query();
		return $query;
	}
	
	function get_all_outstation_pricing_data($id=0)
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_outstation.*,NON_AC,AC,LOCAL,car_type.TYPE_NAME,car_model.MODEL_NAME,OUTSTATION_NAME')
			->from('pricing_outstation');
			$this->db->join('inventory', 'inventory.ID = pricing_outstation.inventory_id');
			$this->db->join('car_type', 'car_type.ID = pricing_outstation.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_outstation.car_model_id ');
			$this->db->join('package_outstation', 'package_outstation.ID = pricing_outstation.package','left');
			if($agent_id > 0){
				$this->db->where('inventory.agent_id',$agent_id);
			}
			if($id > 0){
				//$this->db->where('pricing_outstation.ID',$id);
				$this->db->where('pricing_outstation.inventory_id',$id);
			}
			$this->db->where('inventory.OUTSTATION',1); 
			/*if($type == 'package'){
				$this->db->where('price_for','Package');
			}
			if($type == 'flexible'){
				$this->db->where('price_for','Flexible');
			}*/
			$this->db->distinct();
		$query=$this->db->get()->result();
		//echo $this->db->last_query();die;
		return $query;
	}

	function get_all_outstation_flexible_data($type='',$id=0,$agtnm='')
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_outstation.*,NON_AC,AC,LOCAL,car_type.TYPE_NAME,car_model.MODEL_NAME,OUTSTATION_NAME,BUSINESS_NAME')
			->from('pricing_outstation');
			$this->db->join('inventory', 'inventory.ID = pricing_outstation.inventory_id');
			$this->db->join('car_type', 'car_type.ID = pricing_outstation.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_outstation.car_model_id ');
			$this->db->join('travel_agent', 'travel_agent.ID = inventory.AGENT_ID','left');
			$this->db->join('package_outstation', 'package_outstation.ID = pricing_outstation.package','left');
			if($agent_id > 0){
				$this->db->where('inventory.agent_id',$agent_id);
			}
			if($id > 0){
				$this->db->where('travel_agent.ID',$id);
			}
			if($agtnm != ''){
				$this->db->where('travel_agent.BUSINESS_NAME',$agtnm);
			}
			$this->db->where('inventory.OUTSTATION',1); 
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


	function get_all_local_flexible_data($type='',$id=0,$agtnm='')
	{
		$agent_id=0;
		$agent_id = $this->session->userdata('id');
		$q = $this->db->select('pricing_local.*,NON_AC,AC,LOCAL,car_type.TYPE_NAME,car_model.MODEL_NAME,LOCAL_NAME,BUSINESS_NAME')
			->from('pricing_local');
			$this->db->join('inventory', 'inventory.ID = pricing_local.inventory_id');
			$this->db->join('car_type', 'car_type.ID = pricing_local.car_type_id');
			$this->db->join('car_model', 'car_model.TYPE_ID = car_type.ID and car_model.ID = pricing_local.car_model_id ');
			$this->db->join('travel_agent', 'travel_agent.ID = inventory.AGENT_ID','left');
			$this->db->join('package_local', 'package_local.ID = pricing_local.package','left');
			if($agent_id > 0){
				$this->db->where('inventory.agent_id',$agent_id);
			}
			if($id > 0){
				$this->db->where('travel_agent.ID',$id);
			}
			if($agtnm != ''){
				$this->db->where('travel_agent.BUSINESS_NAME',$agtnm);
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
	
	function delete_localFlexiblePrice($id)
	{
		/*
		$this->db->delete('pricing_local');*/
		$this->db->set('status',0);
		$this->db->where('inventory_id',$id);
		$this->db->update('pricing_local');
		$this->session->set_flashdata('lpmsg', "Successfully Deleted.");
	}
	function restore_price($id)
	{
		$this->db->set('status',1);
		$this->db->where('inventory_id',$id);
		$this->db->update('pricing_local');
		$this->session->set_flashdata('lpmsg', "Successfully Resored.");
	}
	function restore_outstation_price($id)
	{
		$this->db->set('status',1);
		$this->db->where('inventory_id',$id);
		$this->db->update('pricing_outstation');
		$this->session->set_flashdata('lpmsg', "Successfully Resored.");
	}
	function delete_outstation_price($id)
	{
		//$this->db->where('ID',$id);
		//$this->db->delete('pricing_outstation');
		
		$this->db->set('status',0);
		$this->db->where('inventory_id',$id);
		$this->db->update('pricing_outstation');
		$this->session->set_flashdata('omsg', "Successfully Deleted.");
	}
	
	//Only For Local Flexible
	function get_price_for_local($ID,$type){
		if($type == 'LOCAL')
		{
			$q = $this->db->select('*')->from('pricing_local');
			$this->db->join('inventory', 'inventory.ID = pricing_local.inventory_id');
		}
		if($type == 'OUTSTATION')
		{
			$q = $this->db->select('*')->from('pricing_outstation');
			$this->db->join('inventory', 'inventory.ID = pricing_outstation.inventory_id');
		}
		$this->db->where('inventory_id',$ID);
		$query = $q->get()->row();
		//echo $this->db->last_query();
		return $query;
	}
}
?>