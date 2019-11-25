<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
	}

	public function index(){
		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$email= $this->session->email;
		// $data['user']= $this->cart_model->get_user($email);
		$data['items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['total']= $this->cart_model->get_itemInCart($email)->num_rows();
		// var_dump($data['items']);
		$this->load->view('pages/cartview',$data);
	}

	public function remove($id){
		$user= $this->session->email;
		$this->cart_model->remove_item($id, $user);
		$this->index();
	}

	public function proceed(){
		$email= $this->session->email;
		$post= $this->input->post();
		// var_dump($post);
		if($post){
			$id= $post['idColor'];
			$qty= $post['qty'];
			$size= $post['size'];
			$old_qty= $post['old_qty'];
			$index= $post['index'];
			// var_dump($old_qty[0]);

			for($x=0; $x<$index; $x++){
				if($old_qty[$x]!=$qty[$x])
					$this->cart_model->updateItem($id[$x], $qty[$x], $size[$x], $email);
			}
		}

		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['user']= $this->cart_model->get_user($email);
		$data['items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['total_item']= $this->cart_model->get_totalCartData($email);
		$data['total_price']= $this->cart_model->get_totalPrice($email);
		$this->load->view('pages/proceedview',$data);
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
				'total_cart_items' => $this->cart_model->get_totalCartData($email)
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
