<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_admin();
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
		$ci = $this->input->post('city');
		if(!empty($ci)){
			$city = array( 'CITY_NAME' => $ci);
			if(isset($_POST['city']) != '' && $this->input->post('submitcity'))
			{
				$this->session->set_flashdata('city_msg', "Successfully Added.");
				$this->db->insert('city',$city);
			}
			if($this->input->post('updatecity'))
			{
				$this->session->set_flashdata('city_msg', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('cityid'));
				$this->db->update('city',$city);
			}
		}
		else
		$this->session->set_flashdata('city_msg', "Please Enter City.");
		redirect('admin_c/city');
	}

	public function area()
	{
		$areas = $this->input->post('area');
		$city = $this->input->post('city');
		if(!empty($areas) && !empty($city))
		{
			$area = array( 'AREA_NAME' => $areas,'CITY_ID' =>$city);
			if(isset($_POST['area']) != '' && $this->input->post('submitarea'))
			{
				$this->session->set_flashdata('area_msg', "Successfully Added.");
				$this->db->insert('area',$area);
			}
			if($this->input->post('updatearea'))
			{
				$this->session->set_flashdata('area_msg', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('areaid'));
				$this->db->update('area',$area);
			}
		}
		else
		$this->session->set_flashdata('area_msg', "Please Enter Area.");
		redirect('admin_c/area');
	}

	public function car_type()
	{
		$car_type = $this->input->post('cartype');
		if(!empty($car_type))
		{
			$car_type = array('TYPE_NAME' => $this->input->post('cartype'));
			if(isset($_POST['cartype']) != '' && $this->input->post('submitcartype'))
			{
				$this->session->set_flashdata('type_msg', "Successfully Added.");
				$this->db->insert('car_type',$car_type);
			}
			if($this->input->post('updatecartype'))
			{
				$this->session->set_flashdata('type_msg', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('cartypeid'));
				$this->db->update('car_type',$car_type);
			}
		}
		else
		$this->session->set_flashdata('type_msg', "Please Select Car Type.");
		redirect('admin_c/car_type');
	}
	//Not yet Complited
	public function car_model()
	{
		$model = $this->input->post('model');
		$cartype = $this->input->post('cartype');
		if(!empty($model) && !empty($cartype))
		{
			$seater = array( 'MODEL_NAME' =>$model,'TYPE_ID' =>$cartype);
		if(isset($_POST['model']) != '' && $this->input->post('submitseater'))
			{
				$this->session->set_flashdata('model', "Successfully Added.");
				$this->db->insert('car_model',$seater);
			}
			if($this->input->post('updateseater'))
			{
				$this->session->set_flashdata('model', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('modelid'));
				$this->db->update('car_model',$seater);
			}
		}
		else
		$this->session->set_flashdata('model', "Please Enter Car Model.");
		redirect('admin_c/car_model');
	}

	public function features()
	{
		$features = $this->input->post('feature');
		if(!empty($features))
		{
			$feature = array('FEATURE_NAME' => $features);
			if(isset($_POST['feature']) != '' && $this->input->post('submitfeatures'))
			{
				$this->session->set_flashdata('msg', "Successfully Added.");
				$this->db->insert('features',$feature);
			}
			if($this->input->post('updatefeatures'))
			{
				$this->session->set_flashdata('msg', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('featureid'));
				$this->db->update('features',$feature);
			}
		}
		else
		$this->session->set_flashdata('msg', "Please Enter Features.");
		redirect('admin_c/features');
	}
	
	public function packages($type='')
	{
		if($type =='local')
		{
			$city = $this->input->post('city');
			$package = $this->input->post('package');
			if(!empty($city) && !empty($package))
			{
				$local = array('CITY_ID' => $city,'LOCAL_NAME' => $package);
				if(isset($_POST['package']) != '' && $this->input->post('submitpackage'))
				{
					$this->session->set_flashdata('msg', "Successfully Added.");
					$this->db->insert('package_local',$local);
				}
				if($this->input->post('updatepackage'))
				{
					$this->session->set_flashdata('msg', "Successfully Updated.");
					$this->db->where('ID',$this->input->post('packageid'));
					$this->db->update('package_local',$local);
				}
			}
			else
			$this->session->set_flashdata('msg', "All Fields are required.");
			redirect('admin_c/local_package');
		}
		if($type =='outstation')
		{
			$city = $this->input->post('city');
			$package = $this->input->post('package');
			if(!empty($city) && !empty($package))
			{
				$outstation = array('CITY_ID' =>$city,'OUTSTATION_NAME' => $package);
				if(isset($_POST['package']) != '' && $this->input->post('submitpackage'))
				{
					$this->session->set_flashdata('msg', "Successfully Added.");
					$this->db->insert('package_outstation',$outstation);
				}
				if($this->input->post('updatepackage'))
				{
					$this->session->set_flashdata('msg', "Successfully Updated.");
					$this->db->where('ID',$this->input->post('packageid'));
					$this->db->update('package_outstation',$outstation);
				}
			}
			else
			$this->session->set_flashdata('msg', "All Fields are required.");
			redirect('admin_c/outstation_package');
		}
		
	}
	
	function discount()
	{
		$COUPON_TYPE = $this->input->post('coupontype');
		echo $COUPON_TYPE;die;
		if(!empty($COUPON_TYPE))
		{
			if($COUPON_TYPE == 'Specific')
			{
				$info = array( 
					'COUPON_CODE' => $this->input->post('code'),
					'DISCOUNT_AMOUNT' =>$this->input->post('amount'),
					'DISCOUNT_PERCENTAGE' =>$this->input->post('percentage'),
					'EXPIRY_DATE' =>$this->input->post('lastdate'),
					'MIN_PURCHASE_PRICE' =>$this->input->post('minprice'),
					'PASSENGER_MOBILE_NO' =>$this->input->post('mobile')
				);
			}
			if($COUPON_TYPE == 'General')
			{
				$info = array( 
					'COUPON_CODE' => $this->input->post('code'),
					'DISCOUNT_AMOUNT' =>$this->input->post('amount'),
					'DISCOUNT_PERCENTAGE' =>$this->input->post('percentage'),
					'EXPIRY_DATE' =>$this->input->post('lastdate'),
					'MIN_PURCHASE_PRICE' =>$this->input->post('minprice'),
					'MAX_LIMIT' =>$this->input->post('limit')
				);
			}
			if($this->input->post('submitdiscount'))
			{
				$this->session->set_flashdata('msg', "Successfully Added.");
				$this->db->insert('discount_coupons',$info);
			}
			if($this->input->post('updatediscount'))
			{
				$this->session->set_flashdata('msg', "Successfully Updated.");
				$this->db->where('ID',$this->input->post('discountid'));
				$this->db->update('discount_coupons',$info);
			}
		}
		else
		$this->session->set_flashdata('msg', "Invalid data Inserted.");
		redirect('admin_c/discount');
	}
	
	function block($id,$type)
	{
		$this->db->where('ID',$id);
		$this->db->set('STATUS',0);
		if($type == 'agent'){
			$this->session->set_flashdata('msg', "Successfully Blocked Agent.");
			$this->db->update('travel_agent');
			echo 1;
		}
		if($type == 'user'){
			$this->session->set_flashdata('msg', "Successfully Blocked User.");
			$this->db->update('customer');
			echo 1;
		}
	
	}
	function unblock($id,$type)
	{
		$this->db->where('ID',$id);
		$this->db->set('STATUS',1);
		if($type == 'agent'){
			$this->session->set_flashdata('msg', "Successfully Unblocked Agent.");
			$this->db->update('travel_agent');
			echo 1;
		}
		if($type == 'user'){
			$this->session->set_flashdata('msg', "Successfully Unblocked User.");
			$this->db->update('customer');
			echo 1;
		}
	}
	
	function comm_fixed_save($id,$txtval)
	{
		$this->db->set('commision_fixed',$txtval);
		$this->db->where('ID',$id);
		$this->db->update('pricing_local');
		echo 1;//$this->db->affected_rows();
	}
	function comm_percentage_save($id,$txtval)
	{
		$this->db->set('commision_percentage',$txtval);
		$this->db->where('ID',$id);
		$this->db->update('pricing_local');
		echo 1;//$this->db->affected_rows();
	}
	
	function comm_out_fixed_save($id,$txtval)
	{
		$this->db->set('commision_fixed',$txtval);
		$this->db->where('ID',$id);
		$this->db->update('pricing_outstation');
		echo 1;
	}
	function comm_out_percentage_save($id,$txtval)
	{
		$this->db->set('commision_percentage',$txtval);
		$this->db->where('ID',$id);
		$this->db->update('pricing_outstation');
		echo 1;
	}
	
	function cancellation($type='',$action='')
	{
		$data = array(
			"payers" => $type,
			"deduction" => $this->input->post('deduction'),
			"time1" => $this->input->post('time1'),
			"time2" => $this->input->post('time2'),
			"time3" => $this->input->post('time3')
		);
		$payer_id = $this->input->post('payer_id');
 		if($type == 'full')
		{
			if($action == 'add'){
			//insertion code
				$this->db->insert('cancellation',$data);
				$this->session->set_flashdata('msg', "Successfully Inserted.");
			}
			if($action == 'update'){
				//update code
				$this->db->where('id',$payer_id);
				$this->db->where('payers',$type);
				$this->db->update('cancellation',$data);
				$this->session->set_flashdata('msg', "Successfully Updated.");
			}
			redirect('admin_c/full_payers');
		}
		if($type == 'partial')
		{
			if($action == 'add'){
			//insertion code
				$this->db->insert('cancellation',$data);
				$this->session->set_flashdata('msg', "Successfully Inserted.");
			}
			if($action == 'update'){
				//update code
				$this->db->where('id',$payer_id);
				$this->db->where('payers',$type);
				$this->db->update('cancellation',$data);
				$this->session->set_flashdata('msg', "Successfully Updated.");
			}
			redirect('admin_c/partial_payers');
		}
	}

	
	function is_admin()
	{
		$is_admin_logged_in = $this->session->userdata('is_admin_logged_in');
		if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
		{
		   //redirect(base_url().'admin_c');
		}	
	}

	function payer_delete($id = 0,$type='')
	{
		if($type == 'full' && $id > 0)
		{
			$this->db->where('id',$id);
			$this->db->where('payers',$type);
			$this->db->delete('cancellation');
			echo 1;
		}
		if($type == 'partial' && $id > 0)
		{
			$this->db->where('id',$id);
			$this->db->where('payers',$type);
			$this->db->delete('cancellation');
			echo 1;
		}
	}
	/*function agentlistView()
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
	}*/
}