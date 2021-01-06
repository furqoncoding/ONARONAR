<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Outagelist extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Outagelist_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
			}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Outage List')),
			'icon' => 'outagelist',
			'create' => base_url().'index.php/outagelist/create',
			'row' => $this->Outagelist_model->get_all(),
			);
			
			$this->template->main('outagelist/outage_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Outagelist_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Outage List')),
				'icon' => 'outagelist',
				'id' => set_value('id',$row->id),
				'outage_name' => set_value('outage_name',$row->outage_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/outagelist/update_action',
				);
				
				
				$this->template->main('outagelist/outage_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('outagelist', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Outage List')),
			'icon' => 'outagelist',
			'id' => set_value('id'),
			'outage_name' => set_value('outage_name'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/outagelist/create_action',
			);
			
			
			$this->template->main('outagelist/outage_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'outage_name' => $this->input->post('outage_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Outagelist_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('outagelist/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('outagelist/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Outagelist_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Outagelist')),
				'icon' => 'outagelist',
				'id' => set_value('id',$row->id),
				'outage_name' => set_value('outage_name',$row->outage_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/outagelist/update_action',
				);
				
				
				$this->template->main('outagelist/outage_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('outagelist', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'outage_name' => $this->input->post('outage_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Outagelist_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('outagelist'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('outagelist'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Outagelist_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Outagelist_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('outagelist', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('outagelist', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('outagelist'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('outage_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				