<?php
class login extends CI_Controller
{
    function __construct()
    {
    parent::__construct();
        $this->load->model('login_m');
    }
   
    function checkAgentLogin()
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
					'is_logged_in'=> true
				);
			$this->session->set_userdata($data);
			//redirect(base_url());
			echo $check;
	    }
		else{
			echo $check;
		}
	}
	
    function logout()
    {
        //destroying the session data.
        $this->session->sess_destroy();
		redirect(base_url());
    }
}