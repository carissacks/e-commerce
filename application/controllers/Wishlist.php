<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('wishlist_model');
		$this->load->model('cart_model');
		
		if(!$this->session->has_userdata('login')){
			redirect(base_url('index.php/Login'));
		}
	}

	public function index(){
		$email= $this->session->email;
		$get= $this->input->get();
		$remove= isset($get['status']);
		if($remove) 
			$data['modal_remove']= TRUE;
		else
			$data['modal_remove']= FALSE;
		$this->load->view('pages/header.php',$this->head_class());
		$data['items']= $this->wishlist_model->get_itemWishlist($email)->result_array();
		$data['total_items']= sizeof($data['items']);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['cart_total']= $this->cart_model->get_itemInCart($email)->num_rows();
		$this->load->view('pages/wishlistview',$data);
	}

	public function removeItem($id=-1){
		$post= $this->input->post();
		var_dump($post);
		if($post){
			$id= $post['remove'];
			$page= 1;
		}
		$email= $this->session->email;
		$this->wishlist_model->remove_itemInWishlist($id, $email);
		if($page==1) redirect(base_url('index.php/Wishlist?status=remove'));
		else redirect(base_url('index.php/Products/showDetail/'.$id.'?status=remove'));
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
