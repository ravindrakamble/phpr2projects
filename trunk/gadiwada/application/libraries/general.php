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
	
	function get_price($ID)
	{
		//Price calculation	
	   $ci =& get_instance();
	   $ci->load->model('pricing_m');
	   $curr_session = $ci->session->all_userdata();
	   $price = array();
	  	$type = 'LOCAL';
	   /* if($curr_session['option'] == 'Flexible')
	   $type = 'Flexible';
	   if($curr_session['option'] == 'Package')
	   $type = 'Package';*/
	   	if(array_key_exists('search', $curr_session) && $curr_session['search'] !== false)
	   	{
		    if($curr_session['search'] == 'LOCAL SEARCH'){
				$type = 'LOCAL';
			}
			if($curr_session['search'] == 'OUTSTATION SEARCH' ){
				$type = 'OUTSTATION';
			} 
		}
	   	$price = $ci->pricing_m->get_price_for_local($ID,$type);
		$fare ='';
		$eskm  = 1;
		$esth  = 1;
		$min  = 1;
		$trs  = 1;
		$exh  = 1;
		$km  = 1;
		if(!empty($price) && isset($price))
		{
			if(array_key_exists('estimationtime', $curr_session) && array_key_exists('estimationjourney', $curr_session))
		   	{
				if($curr_session['estimationtime'])
				{
			   		$esth = $curr_session['estimationtime']; //Estimated total time 
				}
				if($curr_session['estimationjourney'])
				{
				   $eskm = $curr_session['estimationjourney']; //Estimated Total KM
				}
			}
			if(array_key_exists('search', $curr_session) && $curr_session['search'] !== false)
		   	{
				if($curr_session['search'] == 'LOCAL SEARCH' )
				{
					$min = $price->min_halt_time;
					$trs = $price->price_per_min_booking_time;
					$exh = $price->extra_per_hr;
					$km  = $price->price_per_km;
				}
				if($curr_session['search'] == 'OUTSTATION SEARCH' )
				{
					$min = $price->min_time_hr;
					$trs = $price->price_per_min_booking_time;
					$exh = $price->extra_price_per_hr;
					$km  = $price->price_per_km;
				}
			}
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