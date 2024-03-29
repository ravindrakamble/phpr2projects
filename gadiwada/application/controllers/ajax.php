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
		$this->load->model('features_m');
		$this->load->model('packages_m');
		$this->load->model('pricing_m');
		$this->load->model('discounts_m');
	}
	
	function edit_city($id)
	{
		$city_name = $this->city_m->get_city_name($id);
		echo $city_name;
	}
	function delete_city($id)
	{
		$this->city_m->delete_city($id);
		redirect('admin_c/city');
	}

	function edit_area($id)
	{
		$area_name = $this->area_m->get_area_name($id);
		echo $area_name;
	}
	
	function delete_area($id)
	{
		$this->area_m->delete_area($id);
		redirect('admin_c/area');
	}

	function edit_car_type($id)
	{
		$car_type = $this->car_type_m->get_car_type($id);
		echo $car_type;
	}

	function delete_car_type($id)
	{
		$this->car_type_m->delete_car_type($id);
		redirect('admin_c/car_type');
	}
	
	function edit_car_model($id)
	{
		$model = $this->car_model_m->edit_car_model($id);
		echo $model;
	}
	
	function delete_car_model($id)
	{
		$this->car_model_m->delete_car_model($id);
		redirect('admin_c/car_model');
	}

	function edit_car_feature($id)
	{
		$car_type = $this->features_m->get_car_feature($id);
		echo $car_type;
	}

	function delete_car_feature($id)
	{
		$this->features_m->delete_car_feature($id);
		redirect('admin_c/features');
	}


	function edit_local_package($id)
	{
		$local = $this->packages_m->edit_local_package($id);
		echo $local;
	}

	function delete_local_package($id)
	{
		$this->packages_m->delete_local_package($id);
		redirect('admin_c/local_package');
	}
	
	function edit_outstaion_package($id)
	{
		$out = $this->packages_m->edit_outstaion_package($id);
		echo $out;
	}

	function delete_outstaion_package($id)
	{
		$this->packages_m->delete_outstaion_package($id);
		redirect('admin_c/outstation_package');
	}
	
	function edit_discount($id)
	{
		$data['discount'] = $this->discounts_m->edit_discount($id);
		$jsondata = json_encode($data);
		echo($jsondata);
	}

	function delete_discount($id)
	{
		$this->discounts_m->delete_discount($id);
		redirect('admin_c/discount');
	}
	
	function get_car_name($car_type)
	{
		$model = $this->car_type_m->get_car_name($car_type);
		if(count($model) == 0){
			echo "";
		} else {
			foreach($model as $r){
				echo "<option value=".$r->ID.">".$r->MODEL_NAME."</option>";
			}
		}
	}
	
	function delete_localFlexiblePrice($id)
	{
		$this->pricing_m->delete_localFlexiblePrice($id);
	}
	function restore_price($id)
	{
		$this->pricing_m->restore_price($id);
	}
	
	function delete_outstation_price($id)
	{
		$this->pricing_m->delete_outstation_price($id);
	}
	function restore_outstation_price($id)
	{
		$this->pricing_m->restore_outstation_price($id);
	}
	function get_unique_carname($car_type,$type)
	{
		$model = $this->car_type_m->get_unique_carname($car_type,$type);
		if(count($model) == 0){
			echo "";
		} else {
			foreach($model as $r){
				echo "<option value=".$r->ID.">".$r->MODEL_NAME."</option>";
			}
		}
	}
}


?>