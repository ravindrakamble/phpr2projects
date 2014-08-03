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
	}
	public function show($action='',$id=0)
	{
		if($this->input->post('submit'))
		{
			if($action == 'add'&& $id == 0){
				$car_features = implode(',',$this->input->post('car_features'));
				$inventory = array(
					'AGENT_ID'            =>$this->session->userdata('id'),
					'CAR_TYPE'            => $this->input->post('car_type'),
					'CAR_NAME'            => $this->input->post('car_name'),
					'CAR_NUMBER'          => $this->input->post('car_no'),
					'PURCHASE_YEAR'       => $this->input->post('year'),
					'CAR_FEATURES'        => $car_features,
					'OWNER_NAME'          => $this->input->post('owner_name'),
					'OWNER_NUMBER'        => $this->input->post('owner_no'),
					'AGREEMEST_START_DATE'=> $this->input->post('agg_start'),
					'AGREEMEST_END_DATE'  => $this->input->post('agg_end'),
					'AC'                  => $this->input->post('ac'),
					'NON_AC'              => $this->input->post('nonac'),
					'LOCAL'               => $this->input->post('local'),
					'OUTSTATION'          => $this->input->post('outstation')
				);
				$this->inventory_m->save($inventory);
			}
			if($action == 'update' && $id > 0 )
			{
				$inventory_update = array(
				'OWNER_NAME'          => $this->input->post('owner_name'),
				'OWNER_NUMBER'        => $this->input->post('owner_no'),
				'AGREEMEST_START_DATE'=> $this->input->post('agg_start'),
				'AGREEMEST_END_DATE'  => $this->input->post('agg_end'),
				'AC'                  => $this->input->post('ac'),
				'NON_AC'              => $this->input->post('nonac'),
				'LOCAL'               => $this->input->post('local'),
				'OUTSTATION'          => $this->input->post('outstation')
				);
				$this->inventory_m->update($inventory_update,$id);
			}
		}
		$data['result'] = $this->inventory_m->get_all_data();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['pricing'] = 'active';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		//$data['localflxprice'] = $this->packages_m->get_all_local_flexible_data();
		//$data['localpackprice'] = $this->packages_m->get_all_local_package_data();
		//$data['$outflxprice'] = $this->packages_m->get_all_outstation_flexible_data();
		//$data['$outpackprice'] = $this->packages_m->get_all_outstation_package_data();
		$this->load->view('pricing',$data);
	}
	
	/*public function view($id)
	{
		$result = $this->inventory_m->get_inventory_details($id);
		$view = '';
		$view .= "<h4>Inventory Details</h4><table id='inventory_table'  class='table table-bordered table-striped table-condensed'>
			<tr><th>Car type</th><td>".$result->CAR_TYPE."</td></tr>
			<tr>	<th>Car name</th><td>". $result->CAR_NAME."</td></tr>
			<tr>	<th>Car number</th><td>". $result->CAR_NUMBER."</td></tr>
			<tr>	<th>Purchase year</th><td>". $result->PURCHASE_YEAR."</td></tr>
			<tr>	<th>Car Features</th><td>". $result->CAR_FEATURES."</td></tr>
			<tr>	<th>Owner Name</th><td>". $result->OWNER_NAME."</td></tr>
			<tr>	<th>Owner Number</th><td>". $result->OWNER_NUMBER."</td></tr>
			<tr>	<th>Agreement start date</th><td>". $result->AGREEMEST_START_DATE."</td></tr>
			<tr>	<th>Agreement end date</th><td>". $result->AGREEMEST_END_DATE ."</td></tr>";
		$view .="</table>";
		echo $view;
	}
	*/
	
	public function edit($id)
	{
		$data['edtyp'] = 'Update';
		$data['result'] = $this->inventory_m->get_all_data();
		$data['inventory'] = 'active';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['info'] = $this->inventory_m->get_inventory_details($id);
		$this->load->view('pricing',$data);
	}
	
	public function localFlexible()
	{
		$localPricing = array(
			'car_type' => $this->input->post('car_type'),
			'car_name' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'min_halt_time' => $this->input->post('min_halt_time'),
			'price' => $this->input->post('price'),
			'per_km_price' => $this->input->post('per_km_price'),
			'area0' => $this->input->post('area0'),
			'area1' => $this->input->post('area1'),
			'area2' => $this->input->post('area2'),
			'area3' => $this->input->post('area3'),
			'area4' => $this->input->post('area4'),
			'calculator' => $this->input->post('calculator')
			);
		if($this->input->post('localFlexibleSubmit'))
		{
			$this->db->insert('local_flexible_pricing',$localPricing);
		}
		if($this->input->post('localFlexibleUpdate'))
		{
			$this->db->where('ID',$this->input->post('localflxid'));
			$this->db->update('local_flexible_pricing',$localPricing);
		}
		$result = $this->packages_m->get_all_local_flexible_data('ajax');
		echo $result;
	}
	
	function localPackage()
	{
		$localPricing = array(
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
		if($this->input->post('localPackageSubmit'))
		{
			$this->db->insert('local_package_pricing',$localPricing);
		}
		if($this->input->post('localPackageUpdate'))
		{
			$this->db->where('ID',$this->input->post('localflxid'));
			$this->db->update('local_package_pricing',$localPricing);
		}
		$result = $this->packages_m->get_all_local_package_data('ajax');
		echo $result;
	}   
		  
	public function outstationFlexible()
	{
		$outstationPricing = array(
			'car_type' => $this->input->post('car_type'),
			'car_name' => $this->input->post('car_name'),
			'ac_nonac' => $this->input->post('ac_nonac'),
			'time' => $this->input->post('time'),
			'price' => $this->input->post('price'),
			'extraprice' => $this->input->post('extraprice'),
			'kilometerprice' => $this->input->post('kilometerprice'),
			'area0' => $this->input->post('area0'),
			'area1' => $this->input->post('area1'),
			'area2' => $this->input->post('area2'),
			'area3' => $this->input->post('area3'),
			'area4' => $this->input->post('area4'),
			'calculator' => $this->input->post('calculator')
			);
		if($this->input->post('localFlexibleSubmit'))
		{
			$this->db->insert('local_outstation_pricing',$outstationPricing);
		}
		if($this->input->post('localFlexibleUpdate'))
		{
			$this->db->where('ID',$this->input->post('localflxid'));
			$this->db->update('local_outstation_pricing',$outstationPricing);
		}
		$result = $this->packages_m->get_all_outstation_flexible_data('ajax');
		echo $result;
	}

	function outstationPackage()
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
	}
}