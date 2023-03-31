<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Source extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Player_model');
			
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master Source')),
			'icon' => 'player',
			'create' => base_url().'index.php/source/create',
			'row' => $this->Player_model->get_all(),
			);
			
			$this->template->main('source/player_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->Player_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Source')),
				'icon' => 'player',
				'id' => set_value('id',$row->id),
				'player_description' => set_value('player_description',$row->player_description),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/source/update_action',
				);
				
				
				$this->template->main('source/player_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('player', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create Source')),
			'icon' => 'player',
			'id' => set_value('id'),
			'player_description' => set_value('player_description'),
			'status' => set_value('status'),
			'button' => 'Create',
			'action' => base_url().'index.php/source/create_action',
			);
			
			
			$this->template->main('source/player_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'player_description' => $this->input->post('player_description',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				if($save = $this->Player_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('source/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('source/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
		
			$row = $this->Player_model->get_by_id($id);
			//print_r($row);
			if ($row) {
				
				//!die($row);
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Source')),
				'icon' => 'player',
				'id' => set_value('id',$row->id),
				'player_description' => set_value('player_description',$row->player_description),
				'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/source/update_action',
				);
				
				
				$this->template->main('source/player_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('source', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'player_description' => $this->input->post('player_description',TRUE),
				'status' => $this->input->post('status',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Player_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('source'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('source'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Player_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Player_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('source', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('source', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('source'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('player_description', 'is active', 'trim|required');
			$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				