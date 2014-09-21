<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cancellation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cancellation_m');
	}
	public function index()
	{
		$data['cancellation'] = 'active';
		$cust_id = $this->session->userdata('id');
		$data['details'] = $this->cancellation_m->booking_history($cust_id);
		$this->load->view('cancellation',$data);
	}
	
	function ticket_info()
	{
		$billno = $this->input->post('bookingId');
		$phone = $this->input->post('txtPhn');
		$this->cancellation_m->get_ticket_details($billno,$phone);
	}
	
	function ticket_cancel($billno)
	{
		echo  $this->cancellation_m->cancel_ticket($billno);

	}
}