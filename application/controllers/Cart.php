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

	public function remove($id, $size){
		$user= $this->session->email;
		$this->cart_model->remove_item($id, $user, $size);
		return redirect(base_url('index.php/Cart'));
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

	public function paid(){
		$email= $this->session->email;
		$shipment= $this->input->post('shipment');
		$this->cart_model->insert_transactionDetail($email, $shipment);
		$shoppingcart_items= $this->cart_model->get_itemInCart($email)->result_array();

		$id_trans= $this->cart_model->get_idTrans($email);

		foreach($shoppingcart_items as $item){
			$this->cart_model->insert_transaction($id_trans, $item['id_item_colored'], $item['quantity'],$item['selling_price'], $item['item_size']);
			$this->cart_model->minStock($item['id_item_colored'],$item['item_size'], $item['quantity']);
		}

		$this->cart_model->delete_cart($email);

		return redirect(base_url(''));
	}

	public function history(){
		$email= $this->session->email;
		$this->load->view('pages/header.php',$this->head_class());
		$data['trans']= $this->cart_model->get_transactionHistory($email);
		$data['total']= sizeof($data['trans']);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['cart_total']= $this->cart_model->get_itemInCart($email)->num_rows();
		$this->load->view('pages/transHistoryview',$data);
	}
	
	public function historyDetail($id){
		$email= $this->session->email;
		$this->load->view('pages/header.php',$this->head_class());
		$data['items']= $this->cart_model->get_transactionDetail($id);
		// $data['total']= sizeof($data['trans']);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['cart_total']= $this->cart_model->get_itemInCart($email)->num_rows();
		$this->load->view('pages/transDetailview',$data);
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
