<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//$this->is_admin();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('car_type_m');
		$this->load->model('area_m');
		$this->load->model('car_model_m');
		$this->load->model('features_m');
		$this->load->model('packages_m');
		$this->load->model('discounts_m');
		$this->load->model('pricing_m');
		$this->load->model('cancellation_m');
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	function city(){
		$this->is_admin();
		$data['city']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$this->load->view('admin/city',$data);
	}
	function area()
	{
		$this->is_admin();
		$data['area']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['areas']  = $this->area_m->get_all_areas();
		$this->load->view('admin/area',$data);
	}
	function car_type()
	{
		$this->is_admin();
		$data['type']='active';
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('admin/car_type',$data);
	}
	function car_model()
	{
		$this->is_admin();
		$data['car_model']='active';
		$data['car_model'] = $this->car_model_m->get_all_car_model();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('admin/car_model',$data);
	}
	function features()
	{
		$this->is_admin();
		$data['features']='active';
		$data['features']  = $this->features_m->get_all_features();
		$this->load->view('admin/features',$data);
	}
	function local_package()
	{
		$this->is_admin();
		$data['localP']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$this->load->view('admin/local_package',$data);
	}
	function outstation_package()
	{
		$this->is_admin();
		$data['outP']='active';
		$data['cities'] = $this->city_m->get_all_cities();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$this->load->view('admin/outstation_package',$data);
	}
	function discount()
	{
		$this->is_admin();
		$data['disc']='active';
		$data['discount']  = $this->discounts_m->get_all_discounts();
		$this->load->view('admin/discount',$data);
	}
	function block_unblock_agent()
	{
		$this->is_admin();
		$data['agt']='active';
		$data['agents'] = $this->admin_m->get_all_agents();	
		$this->load->view('admin/block_unblock_agent',$data);
	}
	function block_unblock_user()
	{
		$this->is_admin();
		$data['user']='active';
		$data['users'] = $this->admin_m->get_all_users();
		$this->load->view('admin/block_unblock_user',$data);
	}
	public function local_flexible_commission()
	{
		$data['localFlexiData'] = $this->pricing_m->get_all_local_flexible_data('flexible');
		$data['com'] = 'active';
		$this->load->view('admin/local_flexible_commission',$data);
	}
	public function local_package_commission()
	{
		$data['com'] = 'active';
		$data['localPackData'] = $this->pricing_m->get_all_local_flexible_data('package');
		$this->load->view('admin/local_package_commission',$data);
	}
	public function outstation_flexible_commission()
	{
		$data['com'] = 'active';
		$data['outFlexiData'] = $this->pricing_m->get_all_outstation_flexible_data('flexible');
		$this->load->view('admin/outstation_flexible_commission',$data);
	}
	public function outstation_package_commission()
	{
		$data['com'] = 'active';
		$data['outPackData'] = $this->pricing_m->get_all_outstation_flexible_data('package');
		$this->load->view('admin/outstation_package_commission',$data);
	}
	
	function commission()
	{
		$this->is_admin();
		$data['com'] = 'active';
		$this->load->view('admin/commission',$data);
	}
	
	function commission_select()
	{
		$val = $this->input->post('comm');
		if(!empty($val))
		{
			if($val == 'local_flexible'){
				redirect('admin_c/local_flexible_commission');
			}
			if($val == 'local_package'){
				redirect('admin_c/local_package_commission');
			}
			if($val == 'outstation_flexible'){
				redirect('admin_c/outstation_flexible_commission');
			}
			if($val == 'outstation_package'){
				redirect('admin_c/outstation_package_commission');
			}
		}
		else{
			redirect('admin_c/commission');
		}
		
	}
	
	function cancellation()
	{
		$this->is_admin();
		$data['cancel'] = 'active';
		$this->load->view('admin/cancellation',$data);
	}

	function cancellation_payers()
	{
		
		$payers = $this->input->post('payers');
		if(!empty($payers))
		{
			if($payers == 'partial_payers'){
				redirect('admin_c/partial_payers');
			}
			if($payers == 'full_payers'){
				redirect('admin_c/full_payers');
			}
		}
		else
		{
			redirect('admin_c/cancellation');
		}
	}

	function partial_payers($id = 0)
	{
		$this->is_admin();
		if($id > 0 )
		{
			$data['edtyp'] = 'Update';
			$data['partial_payers_edit'] = $this->cancellation_m->edit_payers($id,'partial');
		}
		$data['cancel'] = 'active';
		$data['partial_payers'] = $this->cancellation_m->get_all_payers('partial');
		$this->load->view('admin/partial_payers',$data);
	}

	function full_payers($id = 0)
	{
		$this->is_admin();
		if($id > 0 )
		{
			$data['edtyp'] = 'Update';
			$data['full_payers_edit'] = $this->cancellation_m->edit_payers($id,'full');
		}
		$data['cancel'] = 'active';
		$data['full_payers'] = $this->cancellation_m->get_all_payers('full');
		$this->load->view('admin/full_payers',$data);
	}

	function is_admin()
	{
		$is_admin_logged_in = $this->session->userdata('is_admin_logged_in');
		if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
		{
		  redirect(base_url());
		}	
	}
}
?>