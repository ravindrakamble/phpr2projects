<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	
	function about_us(){
		$data['about'] = 'active';
		$this->load->view('about_us',$data);
	}
	
	function privacy_policy(){
		$data['policy'] = 'active';
		$this->load->view('privacy_policy',$data);
	}
	
	function terms_and_canditions(){
		$data['terms'] = 'active';
		$this->load->view('terms_and_canditions',$data);
	}
	
	function contact_us(){
		$data['contact_us'] = 'active';
		$this->load->view('contact_us',$data);
	}
}