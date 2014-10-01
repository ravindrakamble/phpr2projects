<?php
Class Search_m extends CI_Model
{
	
	function search($selval = '0', $opr_names = '0', $features = '0')
	{
		$where ='';
		$curr_session = $this->session->all_userdata();
		$this->db->distinct();
		$this->db->select('RECEIPT_DATE, cust_booking.INV_ID, inventory.*, travel_agent.BUSINESS_NAME, TYPE_NAME, MODEL_NAME,BOOKED_BY');
		$this->db->from('inventory');
		$this->db->join('travel_agent','inventory.AGENT_ID = travel_agent.ID');
		$this->db->join('car_type','car_type.ID = inventory.CAR_TYPE');
		$this->db->join('car_model','car_model.ID = inventory.CAR_NAME');
		//For Booked Cars Reject From List
		$this->db->join('cust_booking','cust_booking.INV_ID = inventory.ID AND cust_booking.RECEIPT_DATE >= DATE_FORMAT(CURDATE(),\'%d-%m-%Y\') AND cust_booking.STATUS =1','LEFT');
		$where .= "STR_TO_DATE(AGREEMEST_END_DATE, '%d/%m/%Y') >= CURDATE()";
		$this->db->where($where);
		//Block UnBlock Agent
		$this->db->where('travel_agent.STATUS',1);
		if($curr_session['city'] != '0' ){
			$this->db->where('travel_agent.CITY',$curr_session['city']);
		}
		if($curr_session['search'] == 'LOCAL SEARCH' ){
			$this->db->where('inventory.LOCAL',1);
		}
		if($curr_session['search'] == 'OUTSTATION SEARCH' ){
			$this->db->where('inventory.OUTSTATION',1);
		} 
		if($curr_session['car_type'] != '0' ){
			$this->db->where('inventory.CAR_TYPE',$curr_session['car_type']);
		}
		if($curr_session['CarTypePackage'] != '0' ){
			$this->db->where('inventory.CAR_TYPE',$curr_session['CarTypePackage']);
		}
		if($selval != '0'  && $selval != ''){
			$this->db->where_in('car_model.MODEL_NAME',explode(',',$selval));
		}
		
		if($opr_names != '0' && $opr_names != ''){
			$this->db->where_in('travel_agent.BUSINESS_NAME',explode(',',$opr_names));
		}
		if($features != '0'  && $features != ''){
			$this->db->like('inventory.CAR_FEATURES',$features);
		}

		$this->db->where('BOOKING_STATUS',1);
		$where  = "STR_TO_DATE(AGREEMEST_END_DATE, '%d/%m/%Y') >= CURDATE()";
		$this->db->where($where,NULL,FALSE);
		$query  = $this->db->get();
		$result = $query->result_array();
		//echo $this->db->last_query();
		$retResult = array();
		if($curr_session['journeydate'] != '0' && $curr_session['journeydate'] != '')
		{
			$DT = $curr_session['journeydate'];
			$nextDate = date(str_replace("/","-",$DT));
		}
		else
		$nextDate = date('d-m-Y');
		foreach($result as $row)
		{
			if($row['RECEIPT_DATE'] == ''.$nextDate)
			{
				array_push($retResult, $row);
			} 
			else 
			{
				$newData = array();
				$newData = $row;
				$newData['RECEIPT_DATE'] = $nextDate;
				$newData['INV_ID'] = NULL;
				$newData['BOOKED_BY'] = NULL;
				array_push($retResult, $newData);
			}
		}
		return $retResult;;
		//return $query->result();
	}
	

}

?>