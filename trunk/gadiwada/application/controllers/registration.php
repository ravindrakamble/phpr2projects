<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registration extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
	}
	public function index()
	{
		$data['registration'] = 'active';
		$data['cities'] = $this->admin_m->get_all_cities();
		$this->load->view('registration',$data);
	}
}