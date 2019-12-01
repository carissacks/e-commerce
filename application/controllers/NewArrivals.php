<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NewArrivals extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('cart_model');
		$this->load->model('wishlist_model');
	}

	public function index($trans=0){
		$data['header']= $this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->product_model->get_new_items();
		$data['types']= $this->product_model->get_types();
		$data['trans']= $trans;
		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
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
				'total_cart_items' => $this->cart_model->get_totalCartData($email),
				'total_wishlist_items' => $this->wishlist_model->get_totalWishlistData($email)
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
