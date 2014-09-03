<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('login_m');
	}
	public function index()
	{
		$this->load->view('agent_login');
	}
}