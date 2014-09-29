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
	
	function get_price($carID, $modelID)
	{
		//Price calculation	
	   $ci =& get_instance();
	   $ci->load->model('pricing_m');
	   $curr_session = $ci->session->all_userdata();
	   $price = array();
	   $type = '';
	   if($curr_session['option'] == 'Flexible')
	   $type = 'Flexible';
	   if($curr_session['option'] == 'Package')
	   $type = 'Package';
	   	$price = $ci->pricing_m->get_price_for_local($carID, $modelID,$type);
	   
	   $fare ='';
	   if(!empty($price) && isset($price))
	   {
		   $esth = $curr_session['estimationtime'];  //Estimated total time 
		   $eskm = $curr_session['estimationjourney']; //Estimated Total KM
		   $min = $price->min_halt_time;
		   $trs = $price->price_per_min_booking_time;
		   $exh = $price->extra_per_hr;
		   $km  = $price->price_per_km;
		   if ($esth > $min)
				$fare= ($trs + ($esth - $min)* $exh ) + ($km * $eskm);
		   else
				$fare = $trs + ($km * $eskm);
			return $fare;
	   }
	   else
	   return $fare;
	}
}