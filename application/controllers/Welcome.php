<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
		{
			parent::__construct();
			$this->load->model('Chart_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
	 
	public function index()
	{
		$data['title']='Home';
		$data['icon']=array('event_type','outage_list','program_type','player','report','chart');
		$x['data'] = $this->Chart_model->get_data()->result();
		$this->template->main('chart_view', $data);

		//$this->load->view('chart_view',$x);
		//$this->load->view('welcome_message');
		
	}
	
	/**public function chart_view()
	{
		$data['title']='Bar Chart';
		$data = $this->chart_model->get_data()->result();
		$this->load->view('chart_view',$x);
    }**/
	
}