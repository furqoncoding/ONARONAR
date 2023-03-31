<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	class Chart_model extends CI_Model{
		
		public $table = 'report';
		public $id = 'id';
		public $order_asc = 'asc';
		public $order = 'desc';
		
		function __construct()
		{
			parent::__construct();
		}
		
		//get data from database
		/**function get_data(){
			$this->db->select('event_date,event_type,COUNT(event_type) as total');
			$this->db->group_by('event_type'); 
			$this->db->order_by('total', 'desc'); 
			$result = $this->db->get('report');
			return $result;
		}**/
		
		function get_data(){
			$this->db->select('event_date,event_type,outage_type');
			$result = $this->db->get('report');
			return $result;
		}
		
		
	}			