<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inventory extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
	}
	public function index()
	{
		$data['inventory'] = 'active';
		/*$data['cities'] = $this->admin_m->get_all_cities();
		$data['local'] = $this->admin_m->get_all_local_packages();*/
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->admin_m->get_all_car_type();
		$this->load->view('inventory',$data);
	}
}