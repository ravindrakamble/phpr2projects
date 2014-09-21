<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
	public function index($from ='', $to=''){
		$search = $this->input->post('btnSubmit');
		if($search){
			$from = $this->input->post('fromdate');
			$to = $this->input->post('todate');
		}
		$data['from'] = $from;
		$data['to'] = $to;
		$this->load->model('registration_m');
		$data['booking_info'] = $this->registration_m->get_booking_info($from,$to);
		$data['book'] = 'active';
		$this->load->view('booking',$data);
	}
}