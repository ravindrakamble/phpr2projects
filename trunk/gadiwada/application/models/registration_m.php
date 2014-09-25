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
	
	function get_booking_info($from,$to)
	{
		$noOfDays = 7;
		$where ='';
		$this->db->distinct();
		
		$this->db->select('RECEIPT_DATE,INV_ID,inventory.*, travel_agent.BUSINESS_NAME,TYPE_NAME,MODEL_NAME,BOOKED_BY');
		$this->db->from('inventory');
		$this->db->join('travel_agent','inventory.AGENT_ID = travel_agent.ID');
		$this->db->join('car_type','car_type.ID = inventory.CAR_TYPE');
		$this->db->join('car_model','car_model.ID = inventory.CAR_NAME');
		$this->db->join('cust_booking','cust_booking.AGENT_ID = inventory.AGENT_ID AND cust_booking.INV_ID = inventory.ID AND cust_booking.RECEIPT_DATE >= DATE_FORMAT(CURDATE(),\'%d-%m-%Y\')','LEFT');
		$where .= "STR_TO_DATE(AGREEMEST_END_DATE, '%d/%m/%Y') > CURDATE()";
		
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$retResult = array();
		if($from !='' && $to !='')
		{
			
			$result = $query->result_array();
			
			$start_date = strtotime(str_replace("/","-",$from));
			$to_date = strtotime(str_replace("/","-",$to));
			
			$diff = $to_date - $start_date;
			$diffInDays = floor($diff/(60*60*24));;
			$nextDate = date('d/m/Y', strtotime('+ 0 day', $start_date));
			if($diffInDays < $noOfDays ){
				$noOfDays = $diffInDays + 2;	
			}
			$i = 1;
			while ($i < $noOfDays)
			{
				foreach($result as $row){
					if($row['RECEIPT_DATE'] == ''.$nextDate)
					{
						array_push($retResult, $row);
					} else {
						$newData = array();
						$newData = $row;
						$newData['RECEIPT_DATE'] = $nextDate;
						$newData['INV_ID'] = NULL;
						$newData['BOOKED_BY'] = NULL;
						array_push($retResult, $newData);
					}
				}
   				$nextDate = date('d/m/Y', strtotime('+' . $i++ . ' day', $start_date));
			}
			return $retResult;
		} else {
			$result = $query->result_array();
			$nextDate = date('d/m/Y');
			foreach($result as $row){
				
				if($row['RECEIPT_DATE'] == ''.$nextDate)
				{
					var_dump($row['RECEIPT_DATE']);
				var_dump(''.$nextDate);
					array_push($retResult, $row);
				} else {
					$newData = array();
					$newData = $row;
					$newData['RECEIPT_DATE'] = $nextDate;
					$newData['INV_ID'] = NULL;
					$newData['BOOKED_BY'] = NULL;
					array_push($retResult, $newData);
				}
			}
			
			return $retResult;
		}
	}
}
	
?>