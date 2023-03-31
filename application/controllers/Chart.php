<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	 function __construct()
		{
			parent::__construct();
			$this->load->model('chart_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
	 
	
	
	public function index(){
		$data['title']='Home';
		$data['icon']=array('event_type','outage_list','program_type','player','report','chart');
		$x['data'] = $this->chart_model->get_data()->result();
		//$x['data'] = json_encode($data);
		$this->template->main('chart_view',$data);
		//$this->load->view('chart_view',$x);
		
		//$this->template->main('chart_view', $data);
    }
}