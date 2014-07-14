<?php
Class Cancellation_m extends CI_Model{
	
	function cancel_ticket($billno)
	{
		$this->db->where('BILL_NO',$billno);
		$this->db->set('STATUS',0);
		$this->db->update('cust_booking');
		return true;
	}
	
	function get_ticket_details($billno,$phone)
	{
		$query = $this->db->select('*')->from('customer');
				$this->db->join('cust_booking','cust_booking.CUST_ID = customer.ID');
				$this->db->where('BILL_NO',$billno);
				$this->db->where('PHONE',$phone);
				$this->db->where('STATUS',1);
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
		$query = $this->db->select('*')->from('cust_booking');
				$this->db->where('CUST_ID',$cust_id);
				$this->db->where('STATUS',1);
				$this->db->order_by('ID','DESC');
				$this->db->distinct();
		return  $query->get()->result();
	}
}
?>