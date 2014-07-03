<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cancellation extends CI_Controller {

	public function index()
	{
		$this->load->view('cancellation');
	}
}