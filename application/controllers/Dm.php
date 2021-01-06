<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Dm extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Onairchief_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master On Air Chief')),
			'icon' => 'onairchief',
			'create' => base_url().'index.php/dm/create',
			'row' => $this->Onairchief_model->get_all(),
			);
			
			$this->template->main('dm/onairchief_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Onairchief_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read On Air Chief')),
				'icon' => 'onairchief',
				'id' => set_value('id',$row->id),
				'onairchief_description' => set_value('onairchief_description',$row->onairchief_description),
				'nik' => set_value('nik',$row->nik),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/dm/update_action',
				);
				
				
				$this->template->main('dm/onairchief_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('dm', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create On Air Chief')),
			'icon' => 'onairchief',
			'id' => set_value('id'),
			'onairchief_description' => set_value('onairchief_description'),
			'nik' => set_value('nik'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/dm/create_action',
			);
			
			
			$this->template->main('dm/onairchief_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'onairchief_description' => $this->input->post('onairchief_description',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Onairchief_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('dm/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('dm/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Onairchief_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update On Air Chief')),
				'icon' => 'onairchief',
				'id' => set_value('id',$row->id),
				'onairchief_description' => set_value('onairchief_description',$row->onairchief_description),
				'nik' => set_value('nik',$row->nik),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/dm/update_action',
				);
				
				
				$this->template->main('dm/onairchief_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('dm', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'onairchief_description' => $this->input->post('onairchief_description',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Onairchief_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('dm'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('dm'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Onairchief_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Onairchief_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('dm', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('dm', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('onairchief'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('onairchief_description', 'is active', 'trim|required');
			$this->form_validation->set_rules('nik', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}						