<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_agent();
		$this->load->model('login_m');
	}
	public function index()
	{
		$this->load->view('agent_login');
	}
	function is_agent()
	{
		$is_agent_logged_in = $this->session->userdata('is_agent_logged_in');
		if(!isset($is_agent_logged_in) || $is_agent_logged_in != true)
		{
		   //redirect(base_url().'agent');
		}	
	}
}