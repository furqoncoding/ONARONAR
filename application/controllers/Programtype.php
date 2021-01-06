<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Programtype extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Programtype_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Program Type')),
			'icon' => 'programtype',
			'create' => base_url().'index.php/programtype/create',
			'row' => $this->Programtype_model->get_all(),
			);
			
			$this->template->main('programtype/program_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Programtype_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Program Type')),
				'icon' => 'programtype',
				'id' => set_value('id',$row->id),
				'program_type_description' => set_value('program_type_description',$row->program_type_description),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/programtype/update_action',
				);
				
				
				$this->template->main('programtype/program_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('programtype', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Program Type')),
			'icon' => 'programtype',
			'id' => set_value('id'),
			'program_type_description' => set_value('program_type_description'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/programtype/create_action',
			);
			
			
			$this->template->main('programtype/program_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'program_type_description' => $this->input->post('program_type_description',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Programtype_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('programtype/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('programtype/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Programtype_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Program Type')),
				'icon' => 'programtype',
				'id' => set_value('id',$row->id),
				'program_type_description' => set_value('program_type_description',$row->program_type_description),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/programtype/update_action',
				);
				
				
				$this->template->main('programtype/program_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('programtype', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'program_type_description' => $this->input->post('program_type_description',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Programtype_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('programtype'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('programtype'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Programtype_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Programtype_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('programtype', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('programtype', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('programtype'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('program_type_description', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}						