<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Eventtype extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Eventtype_model');
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Event Type')),
			'icon' => 'eventtype',
			'create' => base_url().'index.php/eventtype/create',
			'row' => $this->Eventtype_model->get_all(),
			);
			
			$this->template->main('eventtype/event_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Eventtype_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Event Type')),
				'icon' => 'eventtype',
				'id' => set_value('id',$row->id),
				'event_type_name' => set_value('event_type_name',$row->event_type_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/eventtype/update_action',
				);
				
				
				$this->template->main('eventtype/event_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('eventtype', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Event Type')),
			'icon' => 'eventtype',
			'id' => set_value('id'),
			'event_type_name' => set_value('event_type_name'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/eventtype/create_action',
			);
			
			
			$this->template->main('eventtype/event_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'event_type_name' => $this->input->post('event_type_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Eventtype_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('eventtype/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('eventtype/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Eventtype_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Event Type')),
				'icon' => 'eventtype',
				'id' => set_value('id',$row->id),
				'event_type_name' => set_value('event_type_name',$row->event_type_name),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/eventtype/update_action',
				);
				
				
				$this->template->main('eventtype/event_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('eventtype', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'event_type_name' => $this->input->post('event_type_name',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Eventtype_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('eventtype'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('eventtype'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Eventtype_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Eventtype_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('eventtype', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('eventtype', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('eventtype'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('event_type_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				