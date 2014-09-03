<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pricing extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('inventory_m');
		$this->load->model('car_type_m');
		$this->load->model('packages_m');
		$this->load->model('pricing_m');
	}
	public function local($view)
	{
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		if($view == 'flexible'){
			$data['lf'] = 'active';
			$data['localFlexiData'] = $this->pricing_m->get_all_local_flexible_data('flexible');
			$this->load->view('local_flexible',$data);
		}
		if($view == 'package'){
			$data['lp'] = 'active';
			$data['localPackData'] = $this->pricing_m->get_all_local_flexible_data('package');
			$this->load->view('local_package',$data);
		}
	}
	public function outstation($view)
	{
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		if($view == 'flexible'){
			$data['of'] = 'active';
			$data['outFlexiData'] = $this->pricing_m->get_all_outstation_flexible_data('flexible');
			$this->load->view('outstation_flexible',$data);
		}
		if($view == 'package'){
			$data['op'] = 'active';
			$data['outPackData'] = $this->pricing_m->get_all_outstation_flexible_data('package');
			$this->load->view('outstation_package',$data);
		}
	}
	public function edit($id=0,$type='')
	{
		$data['edtyp'] = 'Update';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['local'] = $this->packages_m->get_all_local_packages();
		if($type == 'flexible'){
			$data['lf'] = 'active';
			$data['localFlexi'] = $this->pricing_m->get_all_local_flexible_data('flexible',$id);
			$data['localFlexiData'] = $this->pricing_m->get_all_local_flexible_data('flexible');
			$this->load->view('local_flexible',$data);
		}
		if($type == 'package'){
			$data['lp'] = 'active';
			$data['localPack'] = $this->pricing_m->get_all_local_flexible_data('package',$id);
			$data['localPackData'] = $this->pricing_m->get_all_local_flexible_data('package');
			$this->load->view('local_package',$data);
		}
	}
	function outstation_edit($id=0,$type='')
	{
		$data['edtyp'] = 'Update';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		if($type == 'flexible'){
			$data['of'] = 'active';
			$data['outFlexi'] = $this->pricing_m->get_all_outstation_flexible_data('flexible',$id);
			$data['outFlexiData'] = $this->pricing_m->get_all_outstation_flexible_data('flexible');
			$this->load->view('outstation_flexible',$data);
		}
		if($type == 'package'){
			$data['op'] = 'active';
			$data['outPack'] = $this->pricing_m->get_all_outstation_flexible_data('package',$id);
			$data['outPackData'] = $this->pricing_m->get_all_outstation_flexible_data('package');
			$this->load->view('outstation_package',$data);
		}
	}
	public function localFlexible($action='',$type='')
	{
		if($type == 'flexible')
		{
			$localPricing = array(
			'price_for' => $this->input->post('price_for'),
			'car_type_id' => $this->input->post('car_type'),
			'car_model_id' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'min_halt_time' => $this->input->post('min_halt_time'),
			'price_per_min_booking_time' => $this->input->post('price'),
			'price_per_km' => $this->input->post('per_km_price'),
			'base_operating_area_0' => $this->input->post('area0'),
			'base_operating_area_1' => $this->input->post('area1'),
			'base_operating_area_2' => $this->input->post('area2'),
			'base_operating_area_3' => $this->input->post('area3'),
			'base_operating_area_4' => $this->input->post('area4')
			);
			if($action == 'add')
			{
				$this->session->set_flashdata('lpmsg', "Successfully Added.");
				$this->db->insert('pricing_local',$localPricing);
			}
			if($action == 'update')
			{
				$this->db->where('ID',$this->input->post('localflxid'));
				$this->db->update('pricing_local',$localPricing);
				$this->session->set_flashdata('lpmsg', "Successfully Updated.");
			}
			redirect('pricing/local/flexible');
		}
		if($type == 'package')
		{
			$localPricingPackage = array(
			'price_for' => $this->input->post('price_for'),
			'car_type_id' => $this->input->post('car_type'),
			'car_model_id' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'package' => $this->input->post('package'),
			'extra_per_km' => $this->input->post('extra_per_km'),
			'extra_per_hr' => $this->input->post('extra_per_hr'),
			'base_operating_area_0' => $this->input->post('area0'),
			'base_operating_area_1' => $this->input->post('area1'),
			'base_operating_area_2' => $this->input->post('area2'),
			'base_operating_area_3' => $this->input->post('area3'),
			'base_operating_area_4' => $this->input->post('area4')
			);
			if($action == 'add')
			{
				$this->session->set_flashdata('lpmsg', "Successfully Added.");
				$this->db->insert('pricing_local',$localPricingPackage);
			}
			if($action == 'update')
			{
				$this->db->where('ID',$this->input->post('localflxid'));
				$this->db->update('pricing_local',$localPricingPackage);
				$this->session->set_flashdata('lpmsg', "Successfully Updated.");
			}
			redirect('pricing/local/package');
		}
	}
	public function outstationFlexible($action='',$type='')
	{
		if($type == 'flexible')
		{
			$outstationPricing = array(
			'price_for' => $this->input->post('price_for'),
			'car_type_id' => $this->input->post('car_type'),
			'car_model_id' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
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
			if($action == 'add')
			{
				$this->session->set_flashdata('omsg', "Successfully Added.");
				$this->db->insert('pricing_outstation',$outstationPricing);
			}
			if($action == 'update')
			{
				$this->db->where('ID',$this->input->post('outflxid'));
				$this->db->update('pricing_outstation',$outstationPricing);
				$this->session->set_flashdata('omsg', "Successfully Updated.");
			}
			redirect('pricing/outstation/flexible','refresh');
		}
		if($type == 'package')
		{
			$outPricingPackage = array(
			'price_for' => $this->input->post('price_for'),
			'car_type_id' => $this->input->post('car_type'),
			'car_model_id' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'package' => $this->input->post('package'),
			'price_per_km' => $this->input->post('extra_per_km'),
			'extra_price_per_hr' => $this->input->post('extra_per_hr'),
			'base_operating_area_0' => $this->input->post('area0'),
			'base_operating_area_1' => $this->input->post('area1'),
			'base_operating_area_2' => $this->input->post('area2'),
			'base_operating_area_3' => $this->input->post('area3'),
			'base_operating_area_4' => $this->input->post('area4')
			);
			if($action == 'add')
			{
				$this->session->set_flashdata('omsg', "Successfully Added.");
				$this->db->insert('pricing_outstation',$outPricingPackage);
			}
			if($action == 'update')
			{
				$this->db->where('ID',$this->input->post('outflxid'));
				$this->db->update('pricing_outstation',$outPricingPackage);
				$this->session->set_flashdata('omsg', "Successfully Updated.");
			}
			redirect('pricing/outstation/package','refresh');
		}
	}


	/*public function update($id=0,$type='')
	{
		$data['out_price_type'] = $type;
		$data['edtyp'] = 'Update';
		$data['result'] = $this->inventory_m->get_all_data();
		$data['active'] = 'outstation';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['outFlexi'] = $this->pricing_m->get_all_outstation_flexible_data('flexible',$id);
		$data['outPack'] = $this->pricing_m->get_all_outstation_flexible_data('package',$id);
		$data['outFlexiData'] = $this->pricing_m->get_all_outstation_flexible_data('flexible');
		$data['outPackData'] = $this->pricing_m->get_all_outstation_flexible_data('package');
		if($type == 'flexible')
		redirect('pricing/local/flexible');
		if($type == 'package')
		redirect('pricing/local/package');
	}*/
	
	/*function outstationPackage()
	{
		$outstationPricing = array(
			'car_type' => $this->input->post('car_type'),
			'car_name' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'package' => $this->input->post('package'),
			'extraprice' => $this->input->post('extraprice'),
			'kilometerprice' => $this->input->post('kilometerprice'),
			'hourprice' => $this->input->post('hourprice'),
			'area0' => $this->input->post('area0'),
			'area1' => $this->input->post('area1'),
			'area2' => $this->input->post('area2'),
			'area3' => $this->input->post('area3'),
			'area4' => $this->input->post('area4'),
			'calculator' => $this->input->post('calculator')
			);
		if($this->input->post('outstationPackageSubmit'))
		{
			$this->db->insert('outstation_package_pricing',$outstationPricing);
		}
		if($this->input->post('outstationPackageUpdate'))
		{
			$this->db->where('ID',$this->input->post('localflxid'));
			$this->db->update('outstation_package_pricing',$outstationPricing);
		}
		$result = $this->packages_m->get_all_outstation_package_data('ajax');
		echo $result;
	}*/

}