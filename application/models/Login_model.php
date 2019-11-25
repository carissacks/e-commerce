<?php
	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Login_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function check_user($email){
			$query= $this->db->get_where('ms_users', array('email_user' =>$email));
			
			return $query->result_array();
		}

		public function validated_user($where){
			$this->db->select('*');
			$this->db->from('ms_users');
			$this->db->where($where);
			$query= $this->db->get();
			return $query->result_array();
		}

		public function getpriv($email){
			$query = $this->db->query("SELECT * FROM ms_users where email_user = '$email'");
			return $query->result();
		}
	}

?>
