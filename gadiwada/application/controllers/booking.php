<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
	public function index()
	{
		$this->load->model('registration_m');
		$data['boiking_info'] = $this->registration_m->get_booking_info();
		$data['booking'] = 'active';
		$this->load->view('booking',$data);
	}
}