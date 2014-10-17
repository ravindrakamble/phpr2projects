<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('car_type_m');
		$this->load->model('packages_m');
		$this->load->model('area_m');
	}
	public function index()
	{
		$data['search'] = 'active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('search',$data);
	}
	
	public function get_areas($city)
	{
		$area = $this->area_m->get_areas($city);
		if(count($area) == 0){
			echo "";
		} else {
			foreach($area as $r){
				echo "<option value=".$r->AREA_NAME.">".$r->AREA_NAME."</option>";
			}
		}
		
		//return $options;
	}
	
	function get_package($city)
	{
		$package = $this->packages_m->get_package($city);
		if(count($package) == 0){
			echo "";
		} else {
			foreach($package as $r){
				echo "<option value=".$r->LOCAL_NAME.">".$r->LOCAL_NAME."</option>";
			}
		}
		
	}
}