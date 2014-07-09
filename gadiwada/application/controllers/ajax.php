<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('area_m');
		$this->load->model('car_type_m');
		$this->load->model('car_model_m');
	}
	
	function edit_city($id)
	{
		$city_name = $this->city_m->get_city_name($id);
		echo $city_name;
	}
	function delete_city($id)
	{
		$this->city_m->delete_city($id);
	}

	function edit_area($id)
	{
		$area_name = $this->area_m->get_area_name($id);
		echo $area_name;
	}
	
	function delete_area($id)
	{
		$this->area_m->delete_area($id);
	}

	function edit_car_type($id)
	{
		$area_name = $this->car_type_m->get_car_type($id);
		echo $area_name;
	}

	function delete_car_type($id)
	{
		$this->car_type_m->delete_car_type($id);
	}
	
	function edit_car_model($id)
	{
		$model = $this->car_model_m->edit_car_model($id);
		echo $model;
	}
	
	function delete_car_model($id)
	{
		$this->car_model_m->delete_car_model($id);
	}

}


?>