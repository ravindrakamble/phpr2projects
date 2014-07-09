<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('car_type_m');
	}
	public function index()
	{
		$data['search'] = 'active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->admin_m->get_all_local_packages();
		$data['outstation'] = $this->admin_m->get_all_outstation_packages();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('search',$data);
	}
}