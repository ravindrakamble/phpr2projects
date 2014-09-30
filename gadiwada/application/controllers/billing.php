<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('inventory_m');
	}
	/*function _remap($id){
        $this->index($id);
	}*/
	function new_booking($id,$date='')
	{
		date_default_timezone_set('asia/kolkata');
		$time = date('h:i a', time());
		$data['billno'] = $id.time();
		$data['id'] = $id;
		$data['time'] = $time;
		
		if($date == '')
		$date = date('d-m-Y');

		$data['date'] = $date;
		$data['result'] = $this->inventory_m->get_detailsForBilling($id); 
		$data['rcptAuto'] =array();//$this->receipts_m->get_auto_data(); // Get reciept data fields for auto filling input boxes
		//var_dump($data['result']);
		$data['busAuto'] =array();//$this->bus_m->get_auto_data();
		$this->load->view('billing',$data);
	}
	function save()
	{
		$booked_by = '';
		if($this->session->userdata('is_agent_logged_in') == true && $this->session->userdata('type') == 'agent' )
		$booked_by = 'agent';
		if($this->session->userdata('is_customer_logged_in') == true && $this->session->userdata('type') == 'customer')
		$booked_by = 'customer';
		$info = array(
			'CUST_ID'     => $this->session->userdata('id'),
			'AGENT_ID'    => $this->input->post('agent_id'),
			'RECEIPT_DATE'=> $this->input->post('rcptDate'),
			'BILL_NO'     => $this->input->post('billno'),
			'CAR_NO'      => $this->input->post('car_name'),
			'CAR_TYPE'    => $this->input->post('car_type'),
			'OWNER_MOBILE'=> $this->input->post('owner_no'),
			'JOURNEY_DATE'=> $this->input->post('jourdate'),
			'JOURNEY_TIME'=> $this->input->post('jourtime'),
			'AREA'      => $this->input->post('area'),
			'CITY'      => $this->input->post('city'),
			'DESTINATION' => $this->input->post('destination'),
			'FARE'        => $this->input->post('fare'),
			'TOTAL_AMOUNT'=> $this->input->post('totamount'),
			'AMOUNT_PAID' => $this->input->post('amt_paid'),
			'BALANCE'     => $this->input->post('amt_balance'),
			'REMARKS'     => $this->input->post('remarks'),
			'BOOKED_BY'     => $booked_by,
			'INV_ID'     => $this->input->post('inventoryid')
		);
		$this->db->insert('cust_booking',$info);
		$taxi_id = $this->input->post('inventoryid');
		if($taxi_id> 0 )
		{
			$this->db->where('ID',$taxi_id);
			$this->db->set('BOOKING_STATUS',0);
			$this->db->update('inventory');
		}
		$inventoryid = $this->input->post('inventoryid');
		$data['TOTAL_AMOUNT'] = $this->input->post('totamount');
		$data['AMOUNT_PAID'] = $this->input->post('amt_paid');
		$data['BALANCE'] = $this->input->post('amt_balance');
		$data['REMARKS'] = $this->input->post('remarks');
		$data['billno'] = $info['BILL_NO'];
		$data['result'] = $this->inventory_m->get_detailsForBilling($inventoryid); 
		if($this->input->post('print'))
		{
			//Download in PDF format
			$html = $this->load->view('pdf_download',$data,true);
			$pdf_filename  = 'Booking.pdf';
			$this->load->library('dompdf_lib');
			$this->dompdf_lib->convert_html_to_pdf($html, $pdf_filename, true);

		}
		if($this->input->post('sms'))
		{
			
			
		}
		if($this->input->post('email'))
		{
			//Send EMAIL
			$this->load->library('Mailer');
			$body = $this->load->view('emails/parent_welcome',"", TRUE);
			$subject="Booking Details";		
			$to = $this->session->userdata('username'); 
			$result = $this->Mailer->send_mail('info@gadivada.com',$to, $subject, $body);
		}
	}
	
}

	