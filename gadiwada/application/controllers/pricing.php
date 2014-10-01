<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pricing extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->is_agent();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('inventory_m');
		$this->load->model('car_type_m');
		$this->load->model('packages_m');
		$this->load->model('pricing_m');
	}
	public function local()
	{
		$id = $this->session->userdata('id');
		//$data['inventory'] = $this->inventory_m->get_inventory_details($id);
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['lf'] = 'active';
		$data['localData'] = $this->pricing_m->get_all_local_pricing_data();
		$this->load->view('local_pricing',$data);
	}
	public function outstation()
	{
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['of'] = 'active';
		$data['outData'] = $this->pricing_m->get_all_outstation_pricing_data();
		$this->load->view('outstation_pricing',$data);
	}
	public function edit($id=0)
	{
		$data['edtyp'] = 'Update';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['lf'] = 'active';
		$data['local_price_edit'] = $this->pricing_m->get_all_local_pricing_data($id);
		$data['localData'] = $this->pricing_m->get_all_local_pricing_data();
		$this->load->view('local_pricing',$data);
	}

	function outstation_edit($id=0)
	{
		$data['edtyp'] = 'Update';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['of'] = 'active';
		$data['outedit'] = $this->pricing_m->get_all_outstation_pricing_data($id);
		$data['outData'] = $this->pricing_m->get_all_outstation_pricing_data();
		$this->load->view('outstation_pricing',$data);
	}
	public function localPricing()
	{ 
		$package =NULL;
		$agent_id = $this->session->userdata('id');
		$price_for = $this->input->post('price_for');
		if($price_for == 'Package')
		$package = $this->input->post('package');
		$localPricing = array(
			'price_for' => $this->input->post('price_for'),
			'package'  =>$package,
			'min_halt_time' => $this->input->post('min_halt_time'),
			'price_per_min_booking_time' => $this->input->post('price'),
			'price_per_km' => $this->input->post('per_km_price'),
			'base_operating_area_0' => $this->input->post('area0'),
			'base_operating_area_1' => $this->input->post('area1'),
			'base_operating_area_2' => $this->input->post('area2'),
			'base_operating_area_3' => $this->input->post('area3'),
			'base_operating_area_4' => $this->input->post('area4')
		);
		$this->db->where('inventory_id',$this->input->post('inv_id'));
		$this->db->update('pricing_local',$localPricing);
		$this->session->set_flashdata('lpmsg', "Successfully Updated.");
		redirect('pricing/local');
	}
	public function outstationPricing()
	{
		$package =NULL;
		$agent_id = $this->session->userdata('id');
		$price_for = $this->input->post('price_for');
		if($price_for == 'Package')
		$package = $this->input->post('package');
			$outstationPricing = array(
				'price_for' => $this->input->post('price_for'),
				'package'  =>$package,
				'min_time_hr' => $this->input->post('min_time_hr'),
				'price_per_min_booking_time' => $this->input->post('booking_time'),
				'extra_price_per_hr' => $this->input->post('extra_price_per_hr'),
				'price_per_km' => $this->input->post('kilometerprice'),
				'base_operating_area_0' => $this->input->post('area0'),
				'base_operating_area_1' => $this->input->post('area1'),
				'base_operating_area_2' => $this->input->post('area2'),
				'base_operating_area_3' => $this->input->post('area3'),
				'base_operating_area_4' => $this->input->post('area4')
			);
			$this->db->where('inventory_id',$this->input->post('inv_id'));
			$this->db->update('pricing_outstation',$outstationPricing);
			$this->session->set_flashdata('omsg', "Successfully Updated.");
			redirect('pricing/outstation','refresh');
	}

	function is_car_available($type,$model)
	{
		$query = $this->db->get_where('pricing_local',array('car_type_id'=>$type,'car_model_id'=>$model));
		$count = $query->num_rows();
		echo $count; 
	}
	
	function is_agent()
	{
		$is_agent_logged_in = $this->session->userdata('is_agent_logged_in');
		if(!isset($is_agent_logged_in) || $is_agent_logged_in != true)
		{
		   redirect(base_url());
		}	
	}
}