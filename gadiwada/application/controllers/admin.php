<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('car_type_m');
		$this->load->model('area_m');
		$this->load->model('car_model_m');
	}
	
	public function index()
	{
		$data['search'] = 'active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->admin_m->get_all_local_packages();
		$data['outstation'] = $this->admin_m->get_all_outstation_packages();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['car_model'] = $this->car_model_m->get_all_car_model();
		$data['areas']  = $this->area_m->get_all_areas();
		$this->load->view('admin/home',$data);
	}

	public function city()
	{
		$city = array( 'CITY_NAME' => $this->input->post('city'));
		if(isset($_POST['city']) != '' && $this->input->post('submitcity'))
		{
			$this->db->insert('city',$city);
		}
		if($this->input->post('updatecity'))
		{
			$this->db->where('ID',$this->input->post('cityid'));
			$this->db->update('city',$city);
		}
		$result = $this->city_m->get_all_cities('ajax');
		echo $result;
	}

	public function area()
	{
		$area = array( 'AREA_NAME' => $this->input->post('area'),'CITY_ID' =>$this->input->post('city'));
		if(isset($_POST['area']) != '' && $this->input->post('submitarea'))
		{
			$this->db->insert('area',$area);
		}
		if($this->input->post('updatearea'))
		{
			$this->db->where('ID',$this->input->post('areaid'));
			$this->db->update('area',$area);
		}
		$result = $this->area_m->get_all_areas('ajax');
		echo $result;
	}

	public function car_type()
	{
		$car_type = array('TYPE_NAME' => $this->input->post('cartype'));
		if(isset($_POST['cartype']) != '' && $this->input->post('submitcartype'))
		{
			$this->db->insert('car_type',$car_type);
		}
		if($this->input->post('updatecartype'))
		{
			$this->db->where('ID',$this->input->post('cartypeid'));
			$this->db->update('car_type',$car_type);
		}
		$result = $this->car_type_m->get_all_car_type('ajax');
		echo $result;
	}
	//Not yet Complited
	public function car_model()
	{
		$seater = array( 'MODEL_NAME' => $this->input->post('model'),'TYPE_ID' =>$this->input->post('cartype'));
		if(isset($_POST['model']) != '' && $this->input->post('submitseater'))
		{
			$this->db->insert('car_model',$seater);
		}
		if($this->input->post('updateseater'))
		{
			$this->db->where('ID',$this->input->post('modelid'));
			$this->db->update('car_model',$seater);
		}
		$result = $this->car_model_m->get_all_car_model('ajax');
		echo $result;
	}
	
}