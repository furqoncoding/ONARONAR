<?php
	class Template{
		protected $_ci;
		
		function __construct(){
			$this->_ci = &get_instance();
			}
		
		function main($content, $data = NULL){
			/*
				* $data['headernya'] , $data['contentnya'] , $data['footernya']
				* variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
			* */
			$data['header'] = $this->_ci->load->view('template/header', $data, TRUE);
			$data['menubar'] = $this->_ci->load->view('template/menubar', $data, TRUE);
			$data['content'] = $this->_ci->load->view($content, $data, TRUE);
			$data['footer'] = $this->_ci->load->view('template/footer', $data, TRUE);
			
			$this->_ci->load->view('template/index', $data);
		}
		
		
		function login($content, $data = NULL){
			/*
				* $data['headernya'] , $data['contentnya'] , $data['footernya']
				* variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
			* */
			$data['header'] = $this->_ci->load->view('template/login/header', $data, TRUE);
			$data['content'] = $this->_ci->load->view($content, $data, TRUE);
			$data['footer'] = $this->_ci->load->view('template/login/footer', $data, TRUE);
			
			$this->_ci->load->view('template/index', $data);
		}
		
		
		
	}	