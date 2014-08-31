<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('car_type_m');
		$this->load->model('area_m');
		$this->load->model('car_model_m');
		$this->load->model('features_m');
		$this->load->model('packages_m');
		$this->load->model('discounts_m');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	function city(){
		$data['city']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$this->load->view('admin/city',$data);
	}
	
	function area()
	{
		$data['area']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['areas']  = $this->area_m->get_all_areas();
		$this->load->view('admin/area',$data);
	}
	
	function car_type()
	{
		$data['type']='active';
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('admin/car_type',$data);
	}
	function car_model()
	{
		$data['car_model']='active';
		$data['car_model'] = $this->car_model_m->get_all_car_model();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('admin/car_model',$data);
	}
	
	function features()
	{
		$data['features']='active';
		$data['features']  = $this->features_m->get_all_features();
		$this->load->view('admin/features',$data);
	}
	
	function local_package()
	{
		$data['localP']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$this->load->view('admin/local_package',$data);
	}
	function outstation_package()
	{
		$data['outP']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$this->load->view('admin/outstation_package',$data);
	}
	
	function discount()
	{
		$data['disc']='active';
		$data['discount']  = $this->discounts_m->get_all_discounts();
		$this->load->view('admin/discount',$data);
	}
	
	function block_unblock_agent()
	{
		$data['agt']='active';
		$data['agents'] = $this->admin_m->get_all_agents();	
		$this->load->view('admin/block_unblock_agent',$data);
	}
	function block_unblock_user()
	{
		$data['user']='active';
		$data['users'] = $this->admin_m->get_all_users();
		$this->load->view('admin/block_unblock_user',$data);
	}
}
?>