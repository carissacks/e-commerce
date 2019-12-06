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

		public function signup($email_user,$password,$name,$address){
			$this->db->trans_start();
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$salt = '';
			for ($i = 0; $i < 10; $i++) {
				$salt = $salt . $characters[rand(0, strlen($characters))];
			}
			$user = array(
				'email_user' => $email_user,
				'pass' => md5($password . $salt),
				'name' => $name,
				'address' => $address,
				'salt' => $salt,
				'priv' => 0,
				'prof_pic' => 'foto.png'
			);
			$this->db->insert('ms_users', $user);

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				$this->db->trans_commit();
			}
		}
	}

?>
