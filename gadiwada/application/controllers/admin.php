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
		$this->load->model('features_m');
		$this->load->model('packages_m');
		$this->load->model('discounts_m');
	}
	
	public function index()
	{
		$data['search'] = 'active';
		$data['agents'] = $this->admin_m->get_all_agents();	
		$data['users'] = $this->admin_m->get_all_users();	
		$data['cities'] = $this->city_m->get_all_cities();
		$data['local'] = $this->packages_m->get_all_local_packages();
		$data['outstation'] = $this->packages_m->get_all_outstation_packages();
		$data['car_type'] = $this->car_type_m->get_all_car_type();
		$data['car_model'] = $this->car_model_m->get_all_car_model();
		$data['areas']  = $this->area_m->get_all_areas();
		$data['features']  = $this->features_m->get_all_features();
		$data['discount']  = $this->discounts_m->get_all_discounts();
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

	public function features()
	{
		$feature = array('FEATURE_NAME' => $this->input->post('feature'));
		if(isset($_POST['feature']) != '' && $this->input->post('submitfeatures'))
		{
			$this->db->insert('features',$feature);
		}
		if($this->input->post('updatefeatures'))
		{
			$this->db->where('ID',$this->input->post('featureid'));
			$this->db->update('features',$feature);
		}
		$result = $this->features_m->get_all_features('ajax');
		echo $result;
	}
	
	public function packages()
	{
		if($this->input->post('chkpackage') == 'Local')
		{
		$local = array('CITY_ID' => $this->input->post('city'),'LOCAL_NAME' => $this->input->post('package'));
			if(isset($_POST['package']) != '' && $this->input->post('submitpackage'))
			{
				$this->db->insert('package_local',$local);
			}
			if($this->input->post('updatepackage'))
			{
				$this->db->where('ID',$this->input->post('packageid'));
				$this->db->update('package_local',$local);
			}
			$result = $this->packages_m->get_all_local_packages('ajax');
			echo $result;
		}
		if($this->input->post('chkpackage') == 'Outstation')
		{
			$outstation = array('CITY_ID' => $this->input->post('city'),'OUTSTATION_NAME' => $this->input->post('package'));
			if(isset($_POST['package']) != '' && $this->input->post('submitpackage'))
			{
				$this->db->insert('package_outstation',$outstation);
			}
			if($this->input->post('updatepackage'))
			{
				$this->db->where('ID',$this->input->post('packageid'));
				$this->db->update('package_outstation',$outstation);
			}
			$result = $this->packages_m->get_all_outstation_packages('ajax');
			echo $result;
		}
		
	}
	
	function discount()
	{
		$info = array( 
			'COUPON_CODE' => $this->input->post('code'),
			'DISCOUNT_AMOUNT' =>$this->input->post('amount'),
			'DISCOUNT_PERCENTAGE' =>$this->input->post('percentage'),
			'EXPIRY_DATE' =>$this->input->post('lastdate'),
			'MIN_PURCHASE_PRICE' =>$this->input->post('minprice'),
			'COUPON_TYPE' =>$this->input->post('coupontype'),
			'MAX_LIMIT' =>$this->input->post('limit'),
			'PASSENGER_MOBILE_NO' =>$this->input->post('mobile')
		);
		if($this->input->post('submitdiscount'))
		{
			$this->db->insert('discount_coupons',$info);
		}
		if($this->input->post('updatediscount'))
		{
			$this->db->where('ID',$this->input->post('discountid'));
			$this->db->update('discount_coupons',$info);
		}
		$result = $this->discounts_m->get_all_discounts('ajax');
		echo $result;
	}
	
	function block($id,$type)
	{
		$this->db->where('ID',$id);
		$this->db->set('STATUS',0);
		if($type == 'agent'){
			$this->db->update('travel_agent');
			$this->agentlistView();
		}
		if($type == 'user'){
			$this->db->update('customer');
			$this->userlistView();
		}
	
	}
	function unblock($id,$type)
	{
		$this->db->where('ID',$id);
		$this->db->set('STATUS',1);
		if($type == 'agent'){
			$this->db->update('travel_agent');
			$this->agentlistView();
		}
		if($type == 'user'){
			$this->db->update('customer');
			$this->userlistView();
		}
	}
	
	function agentlistView()
	{
		$agents = $this->admin_m->get_all_agents();	
		$view = '';
		$view .= "<table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
			<thead>
			<tr><th>Agent ID</th><th>Agency name</th><th>Contact name</th><th>Contact number</th><th>Place</th><th>City</th><th>Action</th></tr>
			</thead>
			<tbody>";
			foreach($agents as $ag)
			{ 
			$view .= "<tr>
					<td>".$ag->ID."</td>
					<td>".$ag->BUSINESS_NAME."</td>
					<td>*******</td>
					<td>*******</td>
					<td>".$ag->ADDRESS_LINE_1.",".$ag->ADDRESS_LINE_2."</td>
					<td>".$ag->CITY."</td>";
				if($ag->STATUS == 0)
				{
					$view .= "<td><a href='javascript:unblock($ag->ID,&apos;agent&apos;);' class='btn-danger btn-small'>UnBlock</a></td>";
				}
				else{
					$view .= "<td><a href='javascript:block($ag->ID,&apos;agent&apos;);' class='btn-success btn-small'>Block</a></td>";
				}
				
				$view .= "</tr>";
			}
			$view  .= "</tbody>
		</table>";
		
		echo $view;
	}

	function userlistView()
	{
		$agents = $this->admin_m->get_all_users();	
		$view = '';
		$view .= "<table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
			<thead>
			<tr><th>User ID</th><th>User Name</th><th>Email</th><th>Contact number</th><th>Action</th></tr>
			</thead>
			<tbody>";
			foreach($agents as $ag)
			{ 
			$view .= "<tr>
					<td>".$ag->ID."</td>
					<td>".$ag->CUST_NAME."</td>
					<td>".$ag->EMAIL."</td>
					<td>".$ag->PHONE."</td>";
				if($ag->STATUS == 0)
				{
					$view .= "<td><a href='javascript:unblock($ag->ID,&apos;user&apos;);' class='btn-danger btn-small'>UnBlock</a></td>";
				}
				else{
					$view .= "<td><a href='javascript:block($ag->ID,&apos;user&apos;);' class='btn-success btn-small'>Block</a></td>";
				}
				
				$view .= "</tr>";
			}
			$view  .= "</tbody>
		</table>";
		
		echo $view;
	}
}