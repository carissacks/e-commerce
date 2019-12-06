<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('cart_model');
		$this->load->model('wishlist_model');
	}

	public function index(){
		// buat pagination
		$config= $this->pagination_config();
		$config['base_url']= base_url('index.php/Products/index');
		$config['total_rows']= $this->product_model->total_data();
		$this->pagination->initialize($config);

		$page= ($this->uri->segment(3))? $this->uri->segment(3):0;
		$data['items']= $this->product_model->get_items_pagination($config['per_page'],$page);
		$data['total_data']= sizeof($data['items']);
		$data['links']= $this->pagination->create_links();
		// endof pagination

		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		else:
			$data['cart_items']='';
		endif;

		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['types']= $this->product_model->get_types();
		$data['selected_type']='';
		$this->load->view('pages/productview.php',$data);
	}

	public function showDetail($id, $modal=NULL){
		$this->load->view('pages/header.php',$this->head_class());
		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$item_exist= $this->wishlist_model->is_itemInWishlist($id,$email);
			if($item_exist)
				$data['wishlist']= TRUE;
			else
				$data['wishlist']= FALSE;
			$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
			$data['login']= TRUE;
		else:
			$data['cart_items']='';
			$data['login']= FALSE;
		endif;

		$get= $this->input->get();
		if(isset($get['status'])){
			$modal=$get['status'];
		}
		$data['modal']= $modal;
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->product_model->get_item_detail($id);
		$data['photos']= $this->product_model->get_photo($id);
		$data['stocks']= $this->product_model->get_stock($id);
		$data['related']= $this->product_model->get_related($id);
		$data['color']= $this->product_model->get_other_color($id);
		$this->load->view('pages/productDetailview.php',$data);
	}

	public function showTypes($type){
		// Pagination 
		$config= $this->pagination_config(4);
		$config['base_url']= base_url('index.php/Products/showTypes/'.$type.'/');
		$config['total_rows']= $this->product_model->total_data($type);
		$this->pagination->initialize($config);

		$page= ($this->uri->segment(4))? $this->uri->segment(4):0;
		$data['items']= $this->product_model->get_item_type_pagination($type,$config['per_page'],$page);
		$data['total_data']= sizeof($data['items']);
		$data['links']= $this->pagination->create_links();

		$this->load->view('pages/header.php',$this->head_class());
		if($this->session->has_userdata('email')):
			$email= $this->session->email;
			$data['cart_items']= $this->cart_model->get_itemInCart($email)->result_array();
		else:
			$data['cart_items']='';
		endif;
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['types']= $this->product_model->get_types();
		$data['selected_type']=$type;
		$this->load->view('pages/productview.php',$data);

	}

	private function pagination_config($uri=3){
		return array (
			'per_page'=> 12,
			'uri_segment'=> $uri,

			'full_tag_open'   => '<ul class="pagination pagination-sm m-t-xs m-b-xs">',
			'full_tag_close'  => '</ul>',
			
			'first_link'      => 'First', 
			'first_tag_open'  => '<li flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04>',
			'first_tag_close' => '</li>',
			
			'last_link'       => 'Last', 
			'last_tag_open'   => '<li flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04>',
			'last_tag_close'  => '</li>',
			
			'next_link'       => ' <i class="glyphicon glyphicon-menu-right"></i> ', 
			'next_tag_open'   => '<li>',
			'next_tag_close'  => '</li>',
			
			'prev_link'       => ' <i class="glyphicon glyphicon-menu-left"></i> ', 
			'prev_tag_open'   => '<li>',
			'prev_tag_close'  => '</li>',
			
			'cur_tag_open'    => '<li><a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">',
			'cur_tag_close'   => '</a></li>',
			
			'num_tag_open'    => '<li class="flex-c-m how-pagination1 trans-04 m-all-7">',
			'num_tag_close'   => '</li>'
		);
	}

	private function head_class(){
		if($this->session->has_userdata('login')) {
			$login=true;
			$email= $this->session->email;
			return array(
				'login'=> $login,
				'new_class' => '',
				'shop_class' => 'active-menu',
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
				'shop_class' => 'active-menu',
				'sale_class' => '',
			);
		}
	}
}
