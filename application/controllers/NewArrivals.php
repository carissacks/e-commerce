<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NewArrivals extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('newArr_model');

		// if($this->session->userdata('status')!='login'){
		// 	redirect(base_url('index.php/Login'));
		// }
	}

	public function index(){
		$data['header']= $this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->newArr_model->get_items();
		$data['types']= $this->newArr_model->get_types();
		$this->load->view('pages/newArrview.php',$data);
	}

	private function head_class(){
		// $login = $this->session->login;
		if($this->session->has_userdata('login')) $login=true;
		else $login=false;
		return array(
			'login'=> $login,
			'new_class' => 'active-menu',
			'shop_class' => '',
			'sale_class' => ''
		);
	}
}
