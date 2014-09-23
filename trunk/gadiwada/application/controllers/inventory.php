<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inventory extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->is_agent();
		$this->load->model('admin_m');
		$this->load->model('city_m');
		$this->load->model('inventory_m');
		$this->load->model('car_type_m');
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
		$data['inventory'] = 'active';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$this->load->view('inventory',$data);
	}
	
	public function view($id)
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
	
	public function edit($id)
	{
		$data['edtyp'] = 'Update';
		$data['result'] = $this->inventory_m->get_all_data();
		$data['inventory'] = 'active';
		$data['feature'] = $this->admin_m->get_all_feature();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['info'] = $this->inventory_m->get_inventory_details($id);
		$this->load->view('inventory',$data);
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