<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class general 
{
	function is_admin()
	{
		$ci =& get_instance();
		$is_admin_logged_in = $ci->session->userdata('is_admin_logged_in');
		if(!isset($is_admin_logged_in) || $is_admin_logged_in != true)
		{
		   redirect(base_url().'admin_c');
		}	
	}
	
	function is_agent()
	{
		$ci =& get_instance();
		$is_agent_logged_in = $ci->session->userdata('is_agent_logged_in');
		if(!isset($is_agent_logged_in) || $is_agent_logged_in != true)
		{
		   //redirect(base_url().'agent');
		}	
	}
}