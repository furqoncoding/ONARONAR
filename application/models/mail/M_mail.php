<?php
	
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Mail extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('mail/M_mail','M_mail');
		}

	public function data()
	{
		$REMAIN = $this->M_mail->hit_data();
			if ($REMAIN == "0"){
				echo "Tidak ada";
			}
			else {
			    $config = Array(        
	            'protocol' => 'smtp',
	            'smtp_host' => "172.16.4.14",
	            'smtp_port' => 25 ,
	            'smtp_user' => 'antv.apps@an.tv',
	            'smtp_pass' => 'antvapps123',
	            'smtp_timeout' => '10',
	            'mailtype'  => 'html', 
	            'charset'   => 'iso-8859-1'
		        );
			    $this->load->library('email', $config);
			    $this->email->set_newline("\r\n");
			    
			    $this->email->set_mailtype("html");
			    $this->email->from('noreply@an.tv', 'Audio Post');
				//$userids = $this->tank_auth->get_user_id();
				//$INPUT_FULLNAME= $this->globalfunction->full_name($userids);
			    $data['udata'] = $this->M_mail->tampil_data()->result();
				
				$userEmail = "alfa.dynasty@gmail.com";
				$userEmail1 = "salman.alfarisyi@an.tv";
				$subject = "Reminder Audio Post Request Form";
				//$list = array('ari.suwarno@an.tv', 'arya.wibowo@an.tv', 'derry.sugiharto@an.tv');
				$bcc = array('salman.alfarisyi@an.tv','alfa.dynasty@gmail.com');
				$this->email->to($bcc);
				$this->email->bcc($bcc);  
				$this->email->subject($subject); // replace it with relevant subject 
			    
				$body = $this->load->view('mail/v_mail',$data,TRUE);
				$this->email->message($body);   
				$this->email-> send ();
			}
	}


	public function datas()
	{
	        $data = $this->M_mail->hit_data();
			echo $data;
	}

}
		