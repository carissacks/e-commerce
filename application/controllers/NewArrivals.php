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
		$thanks= $this->input->post();
		if($thanks) $data['thanks']= TRUE;
		else $data['thanks']= FALSE;
		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$data['cart_items']= $this->newArr_model->get_itemInCart($email);
		else:
			$data['cart_items']='';
		endif;
		$this->load->view('pages/newArrview.php',$data);
	}

	private function head_class(){
		if($this->session->has_userdata('login')) {
			$login=true;
			$email= $this->session->email;
			return array(
				'login'=> $login,
				'new_class' => 'active-menu',
				'shop_class' => '',
				'sale_class' => '',
				'total_cart_items' => $this->newArr_model->get_totalCartData($email)
			);
		}
		else {
			$login=false;
			return array(
				'login'=> $login,
				'new_class' => 'active-menu',
				'shop_class' => '',
				'sale_class' => '',
			);
		}
	}
	
}
