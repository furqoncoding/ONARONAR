<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Department extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Department_model');
			
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Department List')),
			'icon' => 'department',
			'create' => base_url().'index.php/department/create',
			'row' => $this->Department_model->get_all(),
			);
			
			$this->template->main('department/department_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Department_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Department List')),
				'icon' => 'department',
				'id' => set_value('id',$row->id),
				'department_name' => set_value('department_name',$row->department_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/department/update_action',
				);
				
				
				$this->template->main('department/department_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('department', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Department Name')),
			'icon' => 'department',
			'id' => set_value('id'),
			'department_name' => set_value('department_name'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/department/create_action',
			);
			
			
			$this->template->main('department/department_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'department_name' => $this->input->post('department_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Department_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('department/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('department/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Department_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Department')),
				'icon' => 'department',
				'id' => set_value('id',$row->id),
				'department_name' => set_value('department_name',$row->department_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/department/update_action',
				);
				
				
				$this->template->main('department/department_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('department', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'department_name' => $this->input->post('department_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Department_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('department'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('department'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Department_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Department_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('department', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('department', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('department'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('department_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				