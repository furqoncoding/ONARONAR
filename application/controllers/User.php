<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class User extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
			$this->db2 = $this->load->database('dbhcis', TRUE);
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
			
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Master User')),
			'icon' => 'users',
			'create' => base_url().'index.php/users/create',
			'row' => $this->User_model->get_all(),
			);
			
			$this->template->main('users/user_list', $data);
			
		}
		
		public function read($id) 
		{
			$row = $this->User_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read User')),
				'icon' => 'users',
				'id' => set_value('id',$row->id),
				'active' => set_value('active',$row->active),
				'email' => set_value('email',$row->email),
				'button' => 'Update',
				'action' => base_url().'index.php/users/update_action',
				);
				
				
				$this->template->main('users/user_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('users', 'refresh');
			}
			
		}
		
		
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Create User')),
			'icon' => 'users',
			'id' => set_value('id'),
			'active' => set_value('active'),
			'email' => set_value('email'),
			'button' => 'Create',
			'action' => base_url().'index.php/users/create_action',
			'row' => $this->db2->query("SELECT * FROM HCIS_M_EMP_ALL")->result(),
			);
			
			
			$this->template->main('users/user_form', $data);
			
			
		}
		
		public function create_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				
				$this->create();
				} else {
				
				$data = array(
				'active' => $this->input->post('active',TRUE),
				'email' => $this->input->post('email',TRUE),
				);
				
				if($save = $this->User_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('users/', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('users/', 'refresh');	
				}
				
			}
			
		}
		
		public function update($id) 
		{
			
			$row = $this->User_model->get_by_id($id);
			
			if ($row) {
				
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update User')),
				'icon' => 'users',
				'id' => set_value('id',$row->id),
				'active' => set_value('active',$row->active),
				'email' => set_value('email',$row->email),
				'button' => 'Update',
				'row' => $this->db2->query("SELECT * FROM HCIS_M_EMP_ALL")->result(),
				'action' => base_url().'index.php/users/update_action',
				);
				
				
				$this->template->main('users/user_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('users', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'active' => $this->input->post('active',TRUE),
				'email' => $this->input->post('email',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->User_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('users'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('users'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->User_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->User_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('users', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('users', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('users'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('active', 'is active', 'trim|required');
			$this->form_validation->set_rules('email', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}				