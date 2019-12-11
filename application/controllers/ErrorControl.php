<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorControl extends CI_Controller{
	public function __construct(){
		parent::__construct();		
		$this->load->model('cart_model');
		$this->load->model('wishlist_model');
		if($this->session->has_userdata('login')){	
			if($this->session->status == 1)
				redirect(base_url('index.php/AdminHome'));
		}else {
			redirect(base_url('index.php/'));
		}
	}

	public function index(){
		if($this->session->has_userdata('login')){	
			if($this->session->priv == 1)
				$this->admin();
			else {
				$this->user();
			}
		}else {
			$this->user();
		}
	}

	public function user(){
		$data['header']= $this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		else:
			$data['cart_items']='';
		endif;
		$this->load->view('errors/html/error_user.php',$data);
	}

	public function admin(){

		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
		$data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
		$data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('errors/html/error_admin.php', $data);

	}

	private function head_class(){
		if($this->session->has_userdata('login')) {
			$login=true;
			$email= $this->session->email;
			return array(
				'login'=> $login,
				'new_class' => '',
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
				'new_class' => '',
				'shop_class' => '',
				'sale_class' => '',
			);
		}
	}
}
?>
