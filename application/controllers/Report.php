<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Report extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('Report_model');
			$this->load->model('Eventtype_model');
			$this->load->model('Outagelist_model');
			$this->load->model('Programtype_model');
			$this->load->model('Player_model');
			$this->load->model('Onairchief_model');
			$this->load->model('Department_model');
			$this->load->model('Users_model');
			$this->load->model('Status_model');
			$this->load->model('Follow_model');
			//$this->load->helper('tgl_indo');
			$this->db2 = $this->load->database('dbhcis', TRUE);
			
			if (!$this->ion_auth->logged_in()) 	
			{								// logged in
				redirect('/auth/logout/');
				
			}
		}
		
		public function index()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Input New Report')),
			'icon' => 'report',
			'create' => base_url().'index.php/report/create',
			//'row' => $this->Report_model->get_all(),
			'id' => set_value('id'),
			'engineer_name' => set_value('engineer_name'),
			'event_date' => set_value('event_date'),
			'priority' => set_value('priority'),
			'outage_type' => set_value('outage_type'),
			'start_time' => set_value('start_time'),
			'end_time' => set_value('end_time'),
			'event_type' => set_value('event_type'),
			'onairchief' => set_value('onairchief'),
			'departments_in_charge' => set_value('departments_in_charge'),
			'program_name' => set_value('program_name'),
			'program_type' => set_value('program_type'),
			'player' => set_value('player'),
			'temperatur' => set_value('temperatur'),
			'problem' => set_value('problem'),
			'caused_by' => set_value('caused_by'),
			'action_taken' => set_value('action_taken'),
			'recommendation' => set_value('recommendation'),
			'follow_up_date' => set_value('follow_up_date'),
			'description' => set_value('description'),
			'id_report' => set_value('id_report'),
			//'status' => set_value('status'),
			
			'button' => 'Save',
			'row_player' => $this->Player_model->get_all(),
			'row_programtype' => $this->Programtype_model->get_all(),
			'row_outage' => $this->Outagelist_model->get_all(),
			'row_eventtype' => $this->Eventtype_model->get_all(),
			'row_onairchief' => $this->Onairchief_model->get_all(),
			'row_department' => $this->Department_model->get_all(),
			//'row_status' => $this->Status_model->get_all(),
			'row' => $this->db2->query("SELECT * FROM HCIS_M_EMP_ALL order by name ASC")->result(),
			'action' => base_url().'index.php/report/create_action',
			);
			
			$this->template->main('report/report_form', $data);
		}
		
		public function report_list()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','View and Update')),
			'icon' => 'report_list',
			'create' => base_url().'index.php/report/create',
			'row' => $this->Report_model->get_by_condition(array()),
			'id' => set_value('id'),
			
			'action' => base_url().'index.php/report/create_action',
			);
			//print_r ($data);die;
			$this->template->main('report/report_list', $data);
		}
		
		
		
		public function email22()
		{
			
			if(!isset($_POST["multiUpdate"])){
				$multiUpdate=0;
			} else{
                $multiUpdate= $_POST["multiUpdate"];
			}
			
			$jumlah = count($multiUpdate);
			
			$berhasil=0;
			$gagal=1;
			$gagal2=0;
			
			
			$str="";
			$str.= "<table border='1'><thead><tr>";
			
			$str.="<th>No</th>";
			$str.="<th>Engineer Name</th>";
			$str.="<th>Report Date</th>";
			$str.="<th>Priority</th>";
			$str.="<th>Outage Type</th>";
			$str.="<th>Start Time</th>";
			$str.="<th>End Time</th>";
			$str.="<th>Event Type</th>";
			$str.="<th>Program Name</th>";
			$str.="<th>Player</th>";
			$str.="<th>On Air Chief</th>";
			$str.="<th>Program Name</th>";
			$str.="<th>Problem</th>";
			$str.="<th>Caused by</th>";
			$str.="<th>Action Taken</th>";
			$str.="<th>Recommendation</th>";
			$str.="<th>Report ID Need to be Followed Up:</th>";
			$str.="</tr>";
			$str.="</thead>";
			$str.="<tbody>";
			
			
			
			for($i=0; $i < $jumlah; $i++) {
				$str.= "<tr>";
				$id=$_POST["multiUpdate"][$i];
				$row=$this->Report_model->get_by_id($id);
				
				
				$str.="<td>".($i+1)."</td>";
				$str.="<td>".$row->engineer_name."</td>";
				$str.="<td>".$row->event_date."</td>";
				$str.="<td>".$row->priority."</td>";
				$str.="<td>".$row->outage_name."</td>";
				$str.="<td>".$row->start_time."</td>";
				$str.="<td>".$row->end_time."</td>";
				$str.="<td>".$row->event_type_name."</td>";
				$str.="<td>".$row->program_name."</td>";
				$str.="<td>".$row->player_description."</td>";
				$str.="<td>".$row->onairchief_description."</td>";
				$str.="<td>".$row->program_name."</td>";
				$str.="<td>".$row->problem."</td>";
				$str.="<td>".$row->caused_by."</td>";
				$str.="<td>".$row->action_taken."</td>";
				$str.="<td>".$row->recommendation."</td>";
				$str.="<td>".$row->follow_up_date."</td>";
				$str.="</tr>";
				
			}
			
			$str.="</tbody>";
			$str.="</table>";
			
			
			
			//$this->load->helper('form'); 
			//$this->load->view('home');
			$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.an.tv',
			'smtp_user' => '',
			'smtp_pass' => '',
			'smtp_port' => 25,
			'mailtype' => 'html'
			));
			
			$emailTo = array('dmanager@an.tv','onar@an.tv');
            $this->load->library('email');
            $this->email->set_newline("\r\n");   
			
			$this->email->from('onairReport@an.tv'); 
			$this->email->to($emailTo);
			$this->email->subject('On Air Report'); 
			//$event_date = date('Y-m-d');
			//!die($event_date);
			//$detail=$this->db->query("SELECT * FROM onar_v_report WHERE event_date='$event_date'")->result();
			//$data['rows']=$detail; 
			//$this->Mail_model->get_by_date($event_date);
			//!die($detail);
			
			//print_r($data['rows']);exit;
			//$body=$this->load->view('mail/submit_report',$data,true);
			//$body = $this->load->view('mail/submit_report', '', TRUE);
			$this->email->message($str); 
			
			
			//Send mail 
			if($this->email->send())
			{
                echo 'Email berhasil terkirim'; 
			}
			else 
			{
                show_error($this->email->print_debugger());
			}
			
		}
		
		public function email($date) {
			//!die($date."TEST");
			
			//$this->load->helper('form'); 
			//$this->load->view('home');
			$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'mail.an.tv',  
			'smtp_user' => '',
			'smtp_pass' => '',
			'smtp_port' => 25,
			'mailtype' => 'html'
			));
			$emailTo = array('dmanager@an.tv','onar@an.tv');
            $this->load->library('email');
            $this->email->set_newline("\r\n");   
			
			$this->email->from('onairReport@an.tv'); 
			$this->email->to($emailTo);
			//$this->email->cc('nini@an.tv');
			$this->email->subject('On Air Report');
			
			//$this->load->helper('tanggal');
			$event_date = date('Y-m-d');
			//echo format_indo($event_date);
			
			//!die($event_date);
			//$detail=$this->db->query("SELECT * FROM onar_v_report WHERE event_date='$event_date'")->result();
			if(!isset($_POST["multiUpdate"])){
				$multiUpdate=0;
			} else{
                $multiUpdate= $_POST["multiUpdate"];
			}
			$jumlah = count( $multiUpdate);
			
			
			
			// for($i=0; $i < $jumlah; $i++) {
			
			// $id=$_POST["multiUpdate"][$i];
			// $row=$this->Report_model->get_by_id($id);
			
			// }
			
			
			$data['jumlah']=$jumlah; 
			$data['multiUpdate']= $multiUpdate;
			$data['date']=$date;
			//$data['rows']=$detail; 
			//$this->Mail_model->get_by_date($event_date);
			//!die($detail);
			
			//print_r($data['rows']);exit;
			$body=$this->load->view('mail/submit_report1',$data,true);
			//$body = $this->load->view('mail/submit_report', '', TRUE);
			$this->email->message($body); 
			
			
			//Send mail 
			if($this->email->send())
			{
				$this->session->set_flashdata('success', 'Send Email Success.');
				redirect('report/report_form_read');
				} else {
				$this->session->set_flashdata('error', 'Create Record failed');
				redirect('report/report_form_read', 'refresh');	
			} 
			
			
		}
		
		public function report_follow_up_date($id_report)
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Follow Up Section Area')),
			'icon' => 'report_list',
			'create' => base_url().'index.php/report/create_follow',
			'row' => $this->Follow_model->get_all(),
			'follow_up_date' => set_value('follow_up_date'),
			'description' => set_value('description'),
			'id_report' => set_value('id_report',$id_report),
			'button' => 'Submit',
			
			'action' => base_url().'index.php/report/create_action_follow',
			);
			
			$this->template->main('report/report_follow_up_date', $data);
		}
		
		public function report_search()
		{
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Query Seaching by Category')),
			'icon' => 'report_search',
			'create' => base_url().'index.php/report/create',
			'event_type' => set_value('event_type'),
			'outage_type' => set_value('outage_type'),
			'row_eventtype' => $this->Eventtype_model->get_all(),
			'row_outage' => $this->Outagelist_model->get_all(),
			'id' => set_value('id'),
			'button' => 'Submit',
			
			'action' => base_url().'index.php/report/report_search_by_query',
			);
			
			$this->template->main('report/report_search', $data);
		}
		
		public function report_search_by_query()
		{
			
			$dataArr = array(
			'event_type' => $this->input->post('event_type',TRUE),
			'outage_type' => $this->input->post('outage_type',TRUE),
			
			);
			
			foreach ($dataArr as $key => $value) {
				$dataquery[1] = trim(1);
				if(trim($value)!="")
				{
					$dataquery[strtoupper($key)] = trim($value);
				}
				
			}
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Daily Report')),
			'icon' => 'report_search',
			'create' => base_url().'index.php/report/create',
			'row' => $this->Report_model->get_by_condition($dataquery),
			'id' => set_value('id'),
			'button' => 'Submit',
			
			'action' => base_url().'index.php/report/create_action',
			);
			
			$this->template->main('report/report_search_by_query', $data);
		}
		
		public function report_list_by_date($date)
		{
			//!die(date('d-m-Y'));
			//echo tgl_indo($date);
			//print_r($row);
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Daily Report')),
			'icon' => 'report_form_read',
			'create' => base_url().'index.php/report/submit_report',
			//$tanggal = date('Y-m-d');
			//tgl_indo($tanggal);
			//'row' => $this->Report_model->get_by_condition(array('event_date' =>date('d-m-Y'))),
			'row' => $this->Report_model->get_by_condition(array('event_date' =>$date)),
			'id' => set_value('id'),
			//'id' => implode(',',$this->input->post('id', TRUE)),
			'button' => 'Submit',
			
			'action' => base_url().'index.php/report/email/'.$date,);
			
			$this->template->main('report/report_list_by_date', $data);
			$this->db->where('event_date', date('d-m-Y'));
		}
		
		public function report_form_read()
		{
			//print_r ($outage_name);
			//$row = $this->Report_model->get_by_id($id);
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Daily Report')),
			'icon' => 'report_form_read',
			'create' => base_url().'index.php/report/read',
			'row' => $this->Report_model->get_all(),
			
			'id' => set_value('id'),
			
			'action' => base_url().'index.php/report/read',
			);
			
			
			$this->template->main('report/report_form_read', $data);
			
		}
		
		public function load()
		{
			$event_data = $this->fullcalendar_model->fetch_all_event();
			foreach($event_data->result_array() as $row)
			{
				$data[] = array(
				'id' => $row['id'],
				'event_data' => $row['event_data'],
				'outage_name' => $row['outage_name']
				);
			}
			echo json_encode($data);
		}
		
		public function read($id) 
		{
			$row = $this->Report_model->get_by_id($id);
			
			if ($row) {
				
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Read Report')),
				'icon' => 'report',
				'id' => set_value('id',$row->id),
				'engineer_name' => set_value('engineer_name',$row->engineer_name),
				'event_date' => set_value('event_date',$row->event_date),
				'priority' => set_value('priority',$row->priority),
				'outage_type' => set_value('outage_type',$row->outage_type),
				'start_time' => set_value('start_time',$row->start_time),
				'end_time' => set_value('end_time',$row->end_time),
				'event_type' => set_value('event_type',$row->event_type),
				'onairchief' => set_value('onairchief',$row->onairchief),
				'departments_in_charge' => set_value('departments_in_charge',$row->departments_in_charge),
				'program_name' => set_value('program_name',$row->program_name),
				'program_type' => set_value('program_type',$row->program_type),
				'player' => set_value('player',$row->player),
				'temperatur' => set_value('temperatur',$row->temperatur),
				'problem' => set_value('problem',$row->problem),
				'caused_by' => set_value('caused_by',$row->caused_by),
				'action_taken' => set_value('action_taken',$row->action_taken),
				'recommendation' => set_value('recommendation',$row->recommendation),
				'follow_up_date' => set_value('follow_up_date',$row->follow_up_date),
				//'status' => set_value('status',$row->status),
				'button' => 'Update',
				'action' => base_url().'index.php/report/update_action',
				);
				
				$this->template->main('report/report_form_read', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('report', 'refresh');
			}
			
		}
		
		public function create() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Input New Report')),
			
			'icon' => 'report',
			'id' => set_value('id'),
			'engineer_name' => set_value('engineer_name'),
			'event_date' => set_value('event_date'),
			'priority' => set_value('priority'),
			'outage_type' => set_value('outage_type'),
			'start_time' => set_value('start_time'),
			'end_time' => set_value('end_time'),
			'event_type' => set_value('event_type'),
			'onairchief' => set_value('onairchief'),
			'departments_in_charge' => set_value('departments_in_charge'),
			'program_name' => set_value('program_name'),
			'program_type' => set_value('program_type'),
			'player' => set_value('player'),
			'temperatur' => set_value('temperatur'),
			'problem' => set_value('problem'),
			'caused_by' => set_value('caused_by'),
			'action_taken' => set_value('action_taken'),
			'recommendation' => set_value('recommendation'),
			'follow_up_date' => set_value('follow_up_date'),
			'id_report' => set_value('id_report'),
			
			'row' => $this->db2->query("SELECT * FROM HCIS_M_EMP_ALL")->result(),
			'button' => 'Create',
			'action' => base_url().'index.php/report/create_action',
			);
			
			
			$this->template->main('report/report_form', $data);
			
			
		}
		
		public function create_follow() 
		{
			
			$data = array(
			
			'title' => strtoupper(str_replace('_',' ','Input New Report')),
			
			'icon' => 'report',
			//'id' => set_value('id'),
			'follow_up_date' => set_value('follow_up_date'),
			'description' => set_value('description'),
			'id_report' => set_value('id_report',$id_report),
			
			
			'button' => 'Create',
			'action' => base_url().'index.php/report/create_action',
			);
			
			
			$this->template->main('report/report_list', $data);
			
		}
		
		
		
		
		public function create_action() 
		{
			$this->_rules();
			// var_dump(this->form_validation->run());
			// print_r($this->input->post);exit;
			if ($this->form_validation->run() == FALSE) {
				//echo 'kesini';
				$this->create();
				
				} else {
				
				
				
				$data = array(
				
				'engineer_name' => $this->input->post('engineer_name',TRUE),
				'event_date' => $this->input->post('event_date',TRUE),
				//'event_date' => date_format(date_create($this->input->post('event_date',TRUE)), 'd-m-Y'),
				'priority' => $this->input->post('priority',TRUE),
				'outage_type' => $this->input->post('outage_type',TRUE),
				
				'start_time' => date_format(date_create($this->input->post('start_time',TRUE)), 'H:i'),
				'end_time' => date_format(date_create($this->input->post('end_time',TRUE)), 'H:i'),
				'event_type' => $this->input->post('event_type',TRUE),				
				'onairchief' => $this->input->post('onairchief',TRUE),
				'departments_in_charge' => $this->input->post('departments_in_charge',TRUE),
				'program_name' => $this->input->post('program_name',TRUE),
				'program_type' => $this->input->post('program_type',TRUE),
				'player' => $this->input->post('player',TRUE),
				'temperatur' => $this->input->post('temperatur',TRUE),
				'status' => 1,
				'problem' => $this->input->post('problem',TRUE),
				'caused_by' => $this->input->post('caused_by',TRUE),
				'action_taken' => $this->input->post('action_taken',TRUE),
				'recommendation' => $this->input->post('recommendation',TRUE),
				'follow_up_date' => $this->input->post('follow_up_date',TRUE),
				
				);
				
				if($save = $this->Report_model->insert($data)) {
					$this->session->set_flashdata('success', 'Create Record Success.');
					redirect('report/report_list', 'refresh');
					} else {
					$this->session->set_flashdata('error', 'Create Record failed');
					redirect('report/report_list', 'refresh');	
				}
				
			}
			
		}
		
		public function create_action_follow() 
		{
			
			
			$data = array(
			
			'follow_up_date' => $this->input->post('follow_up_date',TRUE),
			'description' => $this->input->post('description',TRUE),
			'id_report' => $this->input->post('id_report',TRUE),
			
			);
			
			if($save = $this->Follow_model->insert($data)) {
				$this->session->set_flashdata('success', 'Create Record Success.');
				redirect('report/update/'.$this->input->post('id_report',TRUE), 'refresh');
				} else {
				$this->session->set_flashdata('error', 'Create Record failed');
				redirect('report/update/'.$this->input->post('id_report',TRUE), 'refresh');	
			}
			
			
			
		}
		
		public function update($id) 
		{
			
			$row = $this->Report_model->get_by_id($id);
			//print_r($row);
			if ($row) {
				
				$hitung = $this->db->query("SELECT count(*) as total FROM onar_follow_date")->row();
				// print_r($hitung);
				$data = array(
				
				'title' => strtoupper(str_replace('_',' ','Update Report')),
				
				'icon' => 'report_list',
				'id' => set_value('id',$row->id),
				'engineer_name' => set_value('engineer_name',$row->engineer_name),
				'event_date' => set_value('event_date',$row->event_date),
				'priority' => set_value('priority',$row->priority),
				'outage_type' => set_value('outage_type',$row->outage_type),
				'start_time' => set_value('start_time',$row->start_time),
				'end_time' => set_value('end_time',$row->end_time),
				'event_type' => set_value('event_type',$row->event_type),
				'onairchief' => set_value('onairchief',$row->onairchief),
				'departments_in_charge' => set_value('departments_in_charge',$row->departments_in_charge),
				'program_name' => set_value('program_name',$row->program_name),
				'program_type' => set_value('program_type',$row->program_type),
				'player' => set_value('player',$row->player),
				'temperatur' => set_value('temperatur',$row->temperatur),
				'problem' => set_value('problem',$row->problem),
				'caused_by' => set_value('caused_by',$row->caused_by),
				'action_taken' => set_value('action_taken',$row->action_taken),
				'row_player' => $this->Player_model->get_all(),
				'row_programtype' => $this->Programtype_model->get_all(),
				'row_outage' => $this->Outagelist_model->get_all(),
				'row_eventtype' => $this->Eventtype_model->get_all(),
				'row_department' => $this->Department_model->get_all(),
				'row_onairchief' => $this->Onairchief_model->get_all(),
				
				'is_update' => true,
				'row_status' => $this->Status_model->get_all(),
				'status' => set_value('status'),
				'status' => set_value('status',$row->status),
				'hitung' => set_value('hitung',$hitung->total),
				
				'row' => $this->db2->query("SELECT * FROM HCIS_M_EMP_ALL")->result(),
				'recommendation' => set_value('recommendation',$row->recommendation),
				'follow_up_date' => set_value('follow_up_date',$row->follow_up_date),
				//'id_report' => set_value('id_report',$row->id_report),
				'button' => 'Update',
				'action' => base_url().'index.php/report/update_action',
				);
				
				
				$this->template->main('report/report_form', $data);
			}
			else {
				
				$this->session->set_flashdata('error', 'No Record Found');
				redirect('report', 'refresh');
			}
			
			
		}
		
		public function update_action() 
		{
			$this->_rules();
			
			if ($this->form_validation->run() == FALSE) {
				$this->update($this->input->post('id', TRUE));
				} else {
				
				$data = array(
				'engineer_name' => $this->input->post('engineer_name',TRUE),
				'event_date' => $this->input->post('event_date',TRUE),
				//'event_date' => date_format(date_create($this->input->post('event_date',TRUE)), 'd-m-Y'),
				'priority' => $this->input->post('priority',TRUE),
				'outage_type' => $this->input->post('outage_type',TRUE),
				'start_time' => date_format(date_create($this->input->post('start_time',TRUE)), 'H:i'),
				'end_time' => date_format(date_create($this->input->post('end_time',TRUE)), 'H:i'),
				'event_type' => $this->input->post('event_type',TRUE),
				'onairchief' => $this->input->post('onairchief',TRUE),
				'departments_in_charge' => $this->input->post('departments_in_charge',TRUE),
				'program_name' => $this->input->post('program_name',TRUE),
				'program_type' => $this->input->post('program_type',TRUE),
				'player' => $this->input->post('player',TRUE),
				'temperatur' => $this->input->post('temperatur',TRUE),
				'problem' => $this->input->post('problem',TRUE),
				'caused_by' => $this->input->post('caused_by',TRUE),
				'action_taken' => $this->input->post('action_taken',TRUE),
				'recommendation' => $this->input->post('recommendation',TRUE),
				'follow_up_date' => $this->input->post('follow_up_date',TRUE),
				'status' => $this->input->post('status',TRUE),
				//'id_report' => $this->input->post('id_report',TRUE),
				);
				
				
				$where = array(
				'id'=>$this->input->post('id', TRUE)
				); 
				
				if($update = $this->Report_model->update($data,$where)) {
					$this->session->set_flashdata('success', 'Update Record Success.');
					redirect(site_url('report/report_list'));
					} else {
					$this->session->set_flashdata('error', 'Update Record failed.');
					redirect(site_url('report/report_list'));
				}
			}
			
		}
		
		public function delete($id) 
		{
			
			$row = $this->Report_model->get_by_id($id);
			
			if ($row) {
				
				$where = array(
				'id'=>$id,
				); 
				
				if($this->Report_model->delete($where)) {
					
					$this->session->set_flashdata('success', 'Delete Record Success');
					redirect('report', 'refresh');
					} else {
					$this->session->set_flashdata('success', 'Delete Record Fail');
					redirect('report', 'refresh');
				}
				
				} else {
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect(site_url('report'));
			}
			
		}
		
		
		public function _rules() 
		{
			$this->form_validation->set_rules('engineer_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('event_date', 'is active', 'trim|required');
			$this->form_validation->set_rules('priority', 'is active', 'trim|required');
			$this->form_validation->set_rules('outage_type', 'is active', 'trim|required');
			$this->form_validation->set_rules('start_time', 'is active', 'trim|required');
			$this->form_validation->set_rules('end_time', 'is active', 'trim|required');
			$this->form_validation->set_rules('event_type', 'is active', 'trim|required');
			$this->form_validation->set_rules('onairchief', 'is active', 'trim|required');
			$this->form_validation->set_rules('departments_in_charge', 'is active', 'trim|required');
			$this->form_validation->set_rules('program_name', 'is active', 'trim|required');
			$this->form_validation->set_rules('program_type', 'is active', 'trim|required');
			$this->form_validation->set_rules('player', 'is active', 'trim|required');
			$this->form_validation->set_rules('temperatur', 'is active', 'trim|required');
			$this->form_validation->set_rules('problem', 'is active', 'trim|required');
			$this->form_validation->set_rules('caused_by', 'is active', 'trim|required');
			$this->form_validation->set_rules('action_taken', 'is active', 'trim|required');
			$this->form_validation->set_rules('recommendation', 'is active', 'trim|required');
			//$this->form_validation->set_rules('follow_up_date', 'is active', 'trim|required');
			//$this->form_validation->set_rules('description', 'is active', 'trim|required');
			//$this->form_validation->set_rules('id_report', 'is active', 'trim|required');
			//$this->form_validation->set_rules('status', 'is active', 'trim|required');
			
			$this->form_validation->set_rules('id', 'id', 'trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		}}																															