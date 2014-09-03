<?php
class login extends CI_Controller
{
    function __construct()
    {
    	parent::__construct();
        $this->load->model('login_m');
    }
   	function admin_login()
	{
		$uname = $this->input->post('username');
	    $pass = $this->input->post('password');
	    $check= $this->login_m->checkAdminLogin($uname,$pass);
		if($check==1)
	    {
			//$usrId = $this->login_m->getAdminId($uname);
				$data = array(
					'username'    => $uname,
					//'id'          => $usrId,
					'type'        => 'admin',
					'is_admin_logged_in'=> true
				);
			$this->session->set_userdata($data);
			echo $check;
	    }
		else{
			echo $check;
		}
	}

	function agent_login()
	{
		$uname = $this->input->post('username');
	    $pass = $this->input->post('password');
	    $check= $this->login_m->checkAgentLogin($uname,$pass);
	    if($check==1)
	    {
			$usrId = $this->login_m->getAgentID($uname);
				$data = array(
					'username'    => $uname,
					'id'          => $usrId,
					'type'        => 'agent',
					'is_agent_logged_in'=> true
				);
			$this->session->set_userdata($data);
			//redirect(base_url());
			echo $check;
	    }
		else{
			echo $check;
		}
	}

    function checkLogin()
    {
    	
    	if($this->input->post('type') == 'cust')
    	{
			$uname = $this->input->post('username');
		    $pass = $this->input->post('password');
		    $check= $this->login_m->checkCustomerLogin($uname,$pass);
		    if($check==1)
		    {
				$usrId = $this->login_m->getCustID($uname);
					$data = array(
						'username'    => $uname,
						'id'          => $usrId,
						'type'        => 'customer',
						'is_customer_logged_in'=> true
					);
				$this->session->set_userdata($data);
				echo $check;
		    }
			else{
				echo $check;
			}
		}
		/*else{
			$uname = $this->input->post('username');
		    $pass = $this->input->post('password');
		    $check= $this->login_m->checkAgentLogin($uname,$pass);
		    if($check==1)
		    {
				$usrId = $this->login_m->getAgentID($uname);
					$data = array(
						'username'    => $uname,
						'id'          => $usrId,
						'type'        => 'agent',
						'is_agent_logged_in'=> true
					);
				$this->session->set_userdata($data);
				//redirect(base_url());
				echo $check;
		    }
			else{
				echo $check;
			}
		} */
	}
	
	function create_customer_login()
	{
		$data = array(
			'CUST_NAME' =>$this->input->post('name'),
			'EMAIL' =>$this->input->post('email'),
			'PHONE' =>$this->input->post('phone'),
			'PASSWORD' =>md5($this->input->post('password'))
		);
		if($this->db->insert('customer',$data))
		echo '1';
		else echo '0';
	}
	
    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }
}