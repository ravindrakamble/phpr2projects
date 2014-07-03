<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function index()
	{
		$data['booking'] = 'active';
		$this->load->view('booking',$data);
	}
}