<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->model('wishlist_model');
		
		if(!$this->session->has_userdata('login')){
			redirect(base_url('index.php/Login'));
		}
	}

	public function index(){
		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$email= $this->session->email;
		// $data['user']= $this->cart_model->get_user($email);
		$data['items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['total']= sizeof($data['items']);
		// var_dump($data['items']);
		$this->load->view('pages/cartview',$data);
	}

	public function add_item(){
		$email= $this->session->email;
		$post= $this->input->post();
		$id= $post['idColor'];
		$size= $post['size'];
		$qty= $post['qty'];
		if ($this->input->post('addtocart')) {	
			$item_exist= $this->cart_model->is_itemInCart($id,$email,$size);
			if($item_exist){
				$qty= $item_exist->quantity+$qty;
				$this->cart_model->update_shopping_cart($id,$email,$size,$qty);
			}
			else
				$this->cart_model->add_shopping_cart($id,$email,$size,$qty);
			redirect(base_url('index.php/Products/showDetail/'.$id.'/?status=cart'));
		} else {
			var_dump($id);
			$item_exist= $this->wishlist_model->is_itemInWishlist($id,$email,$size);
			if(!$item_exist){
				$this->wishlist_model->add_itemWishlist($id, $size, $email);
			}
			redirect(base_url('index.php/Products/showDetail/'.$id.'/?status=wishlist'));
		}
		// var_dump($post);
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
		$flag= TRUE;
		$email= $this->session->email;
		$shipment= $this->input->post('shipment');
		$this->cart_model->insert_transactionDetail($email, $shipment);
		$shoppingcart_items= $this->cart_model->get_itemInCart($email)->result_array();

		$id_trans= $this->cart_model->get_idTrans($email);

		foreach($shoppingcart_items as $item){
			$stock= $this->cart_model->get_itemStock($item['id_item_colored'],$item['item_size']);
			if($item['quantity']<=$stock){
				$this->cart_model->insert_transaction($id_trans, $item['id_item_colored'], $item['quantity'],$item['selling_price'], $item['item_size']);
				$this->cart_model->minStock($item['id_item_colored'],$item['item_size'], $item['quantity']);
				$stock= $this->cart_model->get_itemStock($item['id_item_colored'],$item['item_size']);
				var_dump($stock);
				if($stock!=0){
					$this->cart_model->decrease_itemcart($item['id_item_colored'],$item['item_size'],$stock);
				}else{
					$this->cart_model->delete_itemcart($item['id_item_colored'],$item['item_size']);
				}
			}else{
				if($stock!=0){
					$this->cart_model->decrease_itemcart($item['id_item_colored'],$item['item_size'],$stock);
				}else{
					$this->cart_model->delete_itemcart($item['id_item_colored'],$item['item_size']);
				}
				$flag= false;
				break;
			}
		}
		if($flag){
			$this->cart_model->delete_usercart($email);
			return redirect(base_url('index.php/NewArrivals/index/succeed'));
		}else{
			return redirect(base_url('index.php/NewArrivals/index/failed'));
		}
		
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
		$data['trans']= $this->cart_model->get_transaction($id);
		// $data['total']= sizeof($data['trans']);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		$data['cart_total']= $this->cart_model->get_itemInCart($email)->num_rows();
		$this->load->view('pages/transDetailview',$data);
	}

	private function head_class(){
		if($this->session->has_userdata('login')) {
			if($this->session->priv ==0) {
				$login=true;
				$email= $this->session->email;
				return array(
					'userlogin'=> $login,
					'new_class' => '',
					'shop_class' => '',
					'total_cart_items' => $this->cart_model->get_totalCartData($email),
					'total_wishlist_items' => $this->wishlist_model->get_totalWishlistData($email)
				);
			}
		}
		$login=false;
		return array(
			'userlogin'=> $login,
			'new_class' => '',
			'shop_class' => ''
		);
	}
}
