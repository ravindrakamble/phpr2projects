<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cancellation extends CI_Controller {

	public function index()
	{
		$data['cancellation'] = 'active';
		$this->load->view('cancellation',$data);
	}
}