<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registration extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin_m');
		$this->load->model('registration_m');
	}
	public function index()
	{
		if($this->input->post('submit')){
			$info = array (
				'BUSINESS_NAME'     =>	$this->input->post('bname'),
				'BUSINESS_TYPE'     =>	$this->input->post('btype'),
				'ADDRESS_LINE_1'    =>	$this->input->post('add1'),
				'ADDRESS_LINE_2'    =>	$this->input->post('add2'),
				'COUNTRY'           =>	$this->input->post('country'),
				'STATE'             =>	$this->input->post('state'),
				'CITY'              =>	$this->input->post('city'),
				'PINCODE'           =>	$this->input->post('pincode'),
				'STARTED_IN'        =>	$this->input->post('byear'),
				'WEBSITE_URL'       =>	$this->input->post('burl'),
				'CORPORATION_NUMBER'=>	$this->input->post('corpno'),
				'PAN'               =>	$this->input->post('pan'),
				'BUSINESS_TAN'      =>	$this->input->post('tan'),
				'OTHER_BUSINESS'    =>	$this->input->post('other'),
				'USERNAME'    =>	$this->input->post('username'),
				'PASSWORD'    =>	md5($this->input->post('password'))
			);
			$id = $this->registration_m->save($info);
			$con_name = $this->input->post('contact_name');
			$email = $this->input->post('contact_email');
			$phone = $this->input->post('contact_phone');
			$mobile = $this->input->post('contact_mobile');
			if(count($con_name) != 0)
			{
				for($i=0; $i<count($con_name); $i++)
				{
					$contact = array(
						'BUSINESS_ID' => $id,
						'CONTACT_NAME'=> $con_name[$i],
						'EMAIL'       => $email[$i],
						'PHONE_NO'    => $phone[$i],
						'MOBILE_NO'   => $mobile[$i]
					);
					$this->registration_m->save_contact($contact);
				}
			}
		$data['retmsg'] = 'Data Inserted Successfully';
		}
		
		$data['registration'] = 'active';
		$data['cities'] = $this->admin_m->get_all_cities();
		$this->load->view('registration',$data);
	}
	
	/*public function save()
	{
		
		redirect('registration');
		//$this->load->view('registration',$data);
	}*/
}