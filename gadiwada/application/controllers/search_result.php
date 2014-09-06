<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_result extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('search_m');
		$this->load->model('admin_m');
		$this->load->model('city_m');
	}

	public function index()
	{
		$this->session->unset_userdata('post-data');
		$_SESSION['post-data'] = $_POST;
		$this->session->set_userdata($_SESSION['post-data']);
		$this->result();
	}
	
	public function result()
	{
		$type='';
		if($this->input->post('type')){
			$type = $this->input->post('type');
		}
		//$this->load->library('pagination');
		/*$config['base_url']= base_url()."search/page/-/";
		$config['total_rows']= $this->search_m->search();
		$config['per_page'] = 5;
		$config['num_links'] = 4;
 		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		

		$this->pagination->initialize($config);
		$this->pagination->cur_page = $offset;*/
		
		//$result = $this->search_m->search();
		
		//$pagination = $this->pagination->create_links();

		$result = $this->search_m->search();
		if($type =='ajax'){
			$search_result = $this->build_result_html($result);
			echo $search_result;
		}else{
			$data['search_result'] = $this->build_result_html($result);
			$data['filter_data'] = $this->build_filter_html(0,0,$filter=null);
			$data['header'] = $this->search_header();
			$this->load->view('search_result',$data);
		}
	}
	
	public function filter($offset =0)
	{
		$selval = $this->input->post('val');
		$opr_names = $this->input->post('opr_name');
		$features = $this->input->post('features');
		
		$this->filter_data($selval, $opr_names, $features, $firstcall=false);
	}
	
	public function filter_data($selval,$opr_names, $features, $firstcall)
	{
		$result = $this->search_m->search($selval,$opr_names, $features);
		
		if($firstcall == false){
			$search_data = $this->build_result_html($result);
			$filter_data = $this->build_filter_html($selval, $opr_names, $features);
			$all_result = $search_data.'~'.$filter_data;
			echo $all_result;
		}
		else{
			$data['search_result'] = $this->build_result_html($result);
			$data['filter_data'] = $this->build_filter_html($selval, $opr_names, $features);
			$data['header'] = $this->search_header();
			$this->load->view('search_result',$data);
		}
	}
	
	public function build_result_html($result)
	{
		$search_result="";
		$search_result.="<center>
						<table class='table table-bordered' width=100% id='search_table'>
						<tr><th>Operator name</th><th>Car name</th><th>Features</th><th>AC NON-AC</th><th>Price</th><th></th></tr>";
						foreach($result as $row):
						$search_result.= "<tr><td>".$row->BUSINESS_NAME."</td><td>".$row->CAR_NAME."</td><td>".$row->CAR_FEATURES."</td><td>";
						if($row->AC == 1)
						$acnonac = 'AC';
						if($row->NON_AC == 1)
						$acnonac = 'NON AC';
						if($row->AC == 1 && $row->NON_AC == 1)
						$acnonac = 'AC, NON AC';
		$search_result.= $acnonac."</td><td>price</td>
						<td>";
						
						if($this->session->userdata('is_customer_logged_in') == 'ture')
						{
	$search_result.="<a href='".base_url()."billing/new_booking/".$row->ID."' class='btn-small btn-success'>Book</a></td></tr>";
						}
						else{
	$search_result.="<a class='btn-min btn-warning' href='javascript:login(&apos;cust&apos;);'>
											Login
										</a></td></tr>";
						}
						
		
						endforeach;
		$search_result.="</table>
						</center>";
		return $search_result;
	}
	
	public function build_filter_html($selval, $opr_names, $features)
	{
		if($selval != '0')
			$check = explode(',',$selval);
		else 
		$check = array();
		
		$car_model = $this->admin_m->get_all_car_model();
		$feature = $this->admin_m->get_all_feature();
		$operator = $this->admin_m->get_all_operator();
		
		
		$filter_result="";
		$filter_result .= '<h3>Refine search</h3><hr>';
		$filter_result	.= '<ul><table cellpadding="0" cellspacing="0">';
		$filter_result .= '<li><h5>Car</h5></li>';
		$attributes = array('id' => 'search', 'name' => 'search', 'class' => 'form');

		$filter_result .= form_open("#",$attributes);
		
		$isChecked = false;
		foreach ($car_model as $model){
			$isChecked = false;
			if(count($check) > 0)
			foreach ($check as $chkvalue)
				if($chkvalue == $model->MODEL_NAME)
				$isChecked = true;
			$attributes = array('name' =>'car_model', 'id' => $model->MODEL_NAME,'class' => 'ajx','value' => $model->MODEL_NAME);
			if($isChecked)
			$filter_result .= "<tr><td>".form_checkbox($attributes,$model->MODEL_NAME,$model->MODEL_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$model->MODEL_NAME."</td></tr>";
			else
			$filter_result .= "<tr><td>".form_checkbox($attributes,$model->MODEL_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$model->MODEL_NAME."</td></tr>";
		}
		$filter_result .= '</table><hr><li><h5>Price</h5></li><table>';
		$filter_result .= "<tr><td colspan=2><label id='labelprice' for='pricerange'>Rs. 10</label></td></tr>";
		$filter_result .= "<tr><td colspan=2><input type ='range' name='range' id='pricerange' /></td></tr>";
		$filter_result .= '</table><hr><li><h5>Features</h5></li><table>';
		
		if($features != '0')
			$feature_list = explode(',',$features);
		else 
		$feature_list = array();
		
		foreach ($feature as $f){
			$isChecked = false;
			
			if(count($feature_list) > 0)
			foreach ($feature_list as $chkvalue)
				if($chkvalue == $f->FEATURE_NAME)
				$isChecked = true;
				
				$attributes = array('name' =>'features', 'id' => $f->FEATURE_NAME,'class' => 'ajx','value' => $f->FEATURE_NAME);
				if($isChecked)
				$filter_result .= "<tr><td>".form_checkbox($attributes,$f->FEATURE_NAME,$f->FEATURE_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$f->FEATURE_NAME."</td></tr>";
				else
			
			$filter_result .= "<tr><td>".form_checkbox($attributes,$f->FEATURE_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$f->FEATURE_NAME."</td></tr>";
		}
		
		$filter_result .= '</table><hr><li><h5>Operator name</h5></li><table>';
		
		if($opr_names != '0')
			$operators = explode(',',$opr_names);
		else 
		$operators = array();
		foreach ($operator as $nm){
			$isChecked = false;
			if(count($operators) > 0)
			foreach ($operators as $chkvalue)
				if($chkvalue == $nm->BUSINESS_NAME)
				$isChecked = true;
			$attributes = array('name' =>'opr_name', 'id' => $nm->BUSINESS_NAME,'class' => 'ajx','value' => $nm->ID);
			if($isChecked)
			$filter_result .= "<tr><td>".form_checkbox($attributes,$nm->BUSINESS_NAME,$nm->BUSINESS_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$nm->BUSINESS_NAME."</td></tr>";
			else
			$filter_result .= "<tr><td>".form_checkbox($attributes,$nm->ID)."&nbsp;&nbsp;&nbsp;</td><td>".$nm->BUSINESS_NAME."</td></tr>";
		}
		$filter_result .= form_fieldset_close();
		$filter_result .= form_close();
		
		$filter_result .= '</table><hr></ul>';
		return $filter_result;
	}

	public function search_header()
	{
		$curr_session = $this->session->all_userdata();
		$header ='';
		$header .= "<table class='table table_bordered'>";
		$header .= "<tr>";
		if($curr_session['journeydate'] !== false){
			$header .= "<td>Journey date: </td><td>".$curr_session['journeydate']."</td>";
		}
		
		if($curr_session['city'] !== false){
			$header .= "<td>From City:</td><td>".$curr_session['city']."</td>";
		}
		
		if(array_key_exists('area', $curr_session) && $curr_session['area'] !== false)
			$header .= "<td>Area</td><td>".$curr_session['area']."</td>";
		else
			$header .= "<td>Area</td><td>--</td>";	
		if($curr_session['search'] == 'LOCAL SEARCH')
			$header .= "<td>Journey type:</td><td>Local</td>";
		if($curr_session['search'] == 'OUTSTATION SEARCH')
			$header .= "<td>Journey type:</td><td>Outstation</td>";
			
		$header .= "</tr>";
		$header .= "<tr>";
	
		if($curr_session['option'] !== false)
			$header .= "<td>Choice:</td><td>".$curr_session['option']."</td>";
		
		
		if($curr_session['estimationjourney'] !== false)
			$header .= "<td>Est km:</td><td>".$curr_session['estimationjourney']."</td>";
		
		if($curr_session['estimationtime'] !== false)
			$header .= "<td>Est hr:</td><td>".$curr_session['estimationtime']."</td>";
		
		if($curr_session['car_type'] !== false)
			$header .= "<td>Car type</td><td>".$curr_session['car_type']."</td>";
		
		$header .= "</tr>";
		$header .= "</table>";
		
		return $header;
	}
}

?>