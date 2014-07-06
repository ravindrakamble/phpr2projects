<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_result extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('search_m');
		$this->load->model('admin_m');
	}

	public function index()
	{
		 //$this->session->sess_destroy();
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
		$this->load->library('pagination');
		$config['base_url']= site_url()."search/page/-/";
		$config['total_rows']= 10;//$this->search_m->search();
		$config['per_page'] = 5;
		$config['num_links'] = 4;
 		$config['uri_segment'] = 4;
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		

		$this->pagination->initialize($config);
		$this->pagination->cur_page = 1;//$offset;
		
		//$result = $this->search_m->search();
		
		//$pagination = $this->pagination->create_links();

		if($type =='ajax'){
			$search_result = $this->build_result_html();
			echo $search_result;
		}
		else{
			$data['search_result'] = $this->build_result_html();
			$data['filter_data'] = $this->build_filter_html($filter=null);
			$data['header'] = $this->search_header();
			$this->load->view('search_result',$data);
		}
	}
	
	public function build_result_html()
	{
		$search_result="";
		$search_result.="<center><h6>No matching car found, try changing your filters.</h6></center>";
		return $search_result;
	}
	
	public function build_filter_html($filter)
	{
		$car_model = $this->admin_m->get_all_car_model();
		$feature = $this->admin_m->get_all_feature();
		$operator = $this->admin_m->get_all_operator();
		
		
		$filter_result="";
		$filter_result .= '<h3>Refine search</h3><hr>';
		$filter_result	.= '<ul><table cellpadding="0" cellspacing="0">';
		$filter_result .= '<li><h5>Car</h5></li>';
		$attributes = array('id' => 'search', 'name' => 'search', 'class' => 'form');

		$filter_result .= form_open("#",$attributes);
		$filter_result .= form_fieldset();
		
		foreach ($car_model as $model){
			$attributes = array('name' =>$model->MODEL_NAME, 'id' => $model->MODEL_NAME,'class' => 'ajx','value' => $model->MODEL_NAME);
			$filter_result .= "<tr><td>".form_checkbox($attributes,$model->MODEL_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$model->MODEL_NAME."</td></tr>";
		}
		$filter_result .= '</table><hr><li><h5>Price</h5></li><table>';
		$filter_result .= "<tr><td colspan=2><input type ='range' name='range' /></td></tr>";
		$filter_result .= '</table><hr><li><h5>Features</h5></li><table>';
		
		foreach ($feature as $f){
			$attributes = array('name' =>$f->FEATURE_NAME, 'id' => $f->FEATURE_NAME,'class' => 'ajx','value' => $f->FEATURE_NAME);
			$filter_result .= "<tr><td>".form_checkbox($attributes,$f->FEATURE_NAME)."&nbsp;&nbsp;&nbsp;</td><td>".$f->FEATURE_NAME."</td></tr>";
		}
		
		$filter_result .= '</table><hr><li><h5>Operator name</h5></li><table>';
		
		foreach ($operator as $nm){
			$attributes = array('name' =>$nm->ID, 'id' => $nm->ID,'class' => 'ajx','value' => $nm->ID);
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
		var_dump($curr_session);
		if($this->session->userdata('localcity') || $this->session->userdata('city')){
			echo "<lable>City : </lable>";
		}
		$header ='';
		$header .= "<table class='table table_bordered'>";
		$header .= "<tr>";
		if($curr_session['localjourneydate'] !== false){
			$header .= "<td>Journey date: </td><td>".$curr_session['localjourneydate']."</td>";
		}else if($curr_session['journeydate'] !== false){
			$header .= "<td>Journey date: </td><td>".$curr_session['journeydate']."</td>";
		}
		
		if($curr_session['localcity'] !== false  || $curr_session['city'] !== false){
			if($curr_session['localcity'] !== false)
				$header .= "<td>From City:</td><td>".$curr_session['localcity']."</td>";
			else
				$header .= "<td>From City:</td><td>".$curr_session['city']."</td>";
		}
		
		if(array_key_exists('localarea', $curr_session) && $curr_session['localarea'] !== false)
			$header .= "<td>Area</td><td>".$curr_session['localarea']."</td>";
		else if(array_key_exists('area', $curr_session) && $curr_session('area') !== false)
			$header .= "<td>Area</td><td>".$curr_session['localarea']."</td>";
		else
			$header .= "<td>Area</td><td>--</td>";
			
		if($curr_session['local'] !== false)
			$header .= "<td>Journey type:</td><td>Local</td>";
		else
			$header .= "<td>Journey type:</td><td>Outstation</td>";
			
		$header .= "</tr>";
		$header .= "<tr>";
		
		
		if($curr_session['localoption'] !== false)
			$header .= "<td>Choice:</td><td>".$curr_session['localoption']."</td>";
		else if($curr_session('option') !== false)
			$header .= "<td>Choice:</td><td>".$curr_session['option']."</td>";
		
		
		if($curr_session['localestimationjourney'] !== false)
			$header .= "<td>Est km:</td><td>".$curr_session['localestimationjourney']."</td>";
		else if($curr_session('estimationjourney') !== false)
			$header .= "<td>Est km:</td><td>".$curr_session['estimationjourney']."</td>";
		
		if($curr_session['localestimationtime'] !== false)
			$header .= "<td>Est hr:</td><td>".$curr_session['localestimationtime']."</td>";
		else if($curr_session('estimationtime') !== false)
			$header .= "<td>Est hr:</td><td>".$curr_session['estimationtime']."</td>";
		
		if($curr_session['localCarTypePackage'] !== false)
			$header .= "<td>Car type</td><td>".$curr_session['localCarTypePackage']."</td>";
		else if($curr_session['CarTypePackage'] !== false)
			$header .= "<td>Car type</td><td>".$curr_session['localCarTypePackage']."</td>";
		
		$header .= "</tr>";
		$header .= "</table>";
		
		return $header;
	}
}

?>