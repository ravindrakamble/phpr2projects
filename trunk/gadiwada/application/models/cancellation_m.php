<?php
Class Cancellation_m extends CI_Model{
	
	function cancel_ticket($billno)
	{
		$where = "STR_TO_DATE(RECEIPT_DATE, '%d/%m/%Y') > CURDATE()";
		$this->db->where($where,NULL,FALSE);
		$this->db->where('BILL_NO',$billno);
		$this->db->set('STATUS',0);
		$this->db->update('cust_booking');
		return $this->db->affected_rows();
	}
	
	function get_ticket_details($billno,$phone)
	{
		$query = $this->db->select('*')->from('customer');
				$this->db->join('cust_booking','cust_booking.CUST_ID = customer.ID');
				$this->db->where('BILL_NO',$billno);
				$this->db->where('PHONE',$phone);
				$this->db->where('cust_booking.STATUS',1);
				$where = "STR_TO_DATE(RECEIPT_DATE, '%d/%m/%Y') > CURDATE()";
				$this->db->where($where,NULL,FALSE);
		$info = $query->get()->row_array();
		if(!empty($info) && isset($info)){
			$view = '';
			$view .= "<table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
				<thead>
				<tr>
					<th>You have booked on</th>
					<th>".$info['RECEIPT_DATE']."</th>
				</tr>
				<tr>
					<th>Pick up point</th>
					<th>Area - ".$info['AREA'].", City- ".$info['CITY']."</th>
				</tr>
				<tr>
					<th>Car type</th>
					<th>".$info['CAR_TYPE']."</th>
				</tr>
				<tr>
					<th>Car name</th>
					<th>".$info['CAR_NO']."</th>
				</tr>
				<tr>
					<th colspan=2>
						<input type='button' onclick='ticket_cancel(".$info['BILL_NO'].")' value='CANCEL' />
					</th>
				</tr>";
			$view  .= "</table>";
			
			echo $view;
		}
		else
		{
			echo '<h3>No Result Found</h3>';
		}
	}

	function booking_history($cust_id)
	{
		if(!empty($cust_id) && isset($cust_id)){
			$query = $this->db->select('*')->from('cust_booking');
					$this->db->where('CUST_ID',$cust_id);
					$this->db->where('STATUS',1);
					$this->db->order_by('ID','DESC');
					$this->db->distinct();
					$where = "STR_TO_DATE(RECEIPT_DATE, '%d/%m/%Y') > CURDATE()";
					$this->db->where($where,NULL,FALSE);
			return  $query->get()->result();
		}
		else{
			return array();
		}
	}

	function get_all_payers($type)
	{
		$query = $this->db->get_where('cancellation', array('payers' => $type));
		return $query->result();
	}
	
	function edit_payers($id,$type)
	{
		$q = $this->db->select('*')->from('cancellation');
			 $this->db->where('id',$id);
			 $this->db->where('payers',$type);
		return $q->get()->result();
	}
}
?>