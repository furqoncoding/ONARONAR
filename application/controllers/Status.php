<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Status extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Status_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Status')),
			'icon' => 'status',
			'create' => base_url().'index.php/status/create',
			'row' => $this->Status_model->get_all(),
			);
			
			$this->template->main('status/status_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Status_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Status')),
				'icon' => 'status',
				'id' => set_value('id',$row->id),
				'status_name' => set_value('status_name',$row->status_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/status/update_action',
				);
				
				
				$this->template->main('status/status_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('status', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Event Type')),
			'icon' => 'status',
			'id' => set_value('id'),
			'status_name' => set_value('status_name'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/status/create_action',
			);
			
			
			$this->template->main('status/status_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'status_name' => $this->input->post('status_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Status_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('status/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('status/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Status_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Status')),
				'icon' => 'status',
				'id' => set_value('id',$row->id),
				'status_name' => set_value('status_name',$row->status_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/status/update_action',
				);
				
				
				$this->template->main('status/status_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('status', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'status_name' => $this->input->post('status_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Status_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('status'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('status'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Status_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Status_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('status', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('status', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('status'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('status_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				