<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index(){
		// buat pagination
		$config= $this->pagination_config();
		$config['base_url']= base_url('index.php/Products/index');
		$config['total_rows']= $this->product_model->total_data();
		$this->pagination->initialize($config);

		$page= ($this->uri->segment(3))? $this->uri->segment(3):0;
		$data['items']= $this->product_model->get_items_pagination($config['per_page'],$page);
		$data['links']= $this->pagination->create_links();
		// endof pagination

		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		// $data['items']= $this->product_model->get_items(); //kalo gak pake pagination
		$data['types']= $this->product_model->get_types();
		$this->load->view('pages/header.php',NULL);
		$this->load->view('pages/productview.php',$data);
	}

	public function showDetail($id){
		$this->load->view('pages/header.php',NULL);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->product_model->get_item($id);
		$data['photos']= $this->product_model->get_photo($id);
		$data['stocks']= $this->product_model->get_stock($id);
		// // $data['color']= $this->product_model->get_color($id);
		$this->load->view('pages/productDetailview.php',$data);
	}

	public function showTypes($type){
		$config= $this->pagination_config(4);
		$config['base_url']= base_url('index.php/Products/showTypes/'.$type.'/');
		$config['total_rows']= $this->product_model->total_data($type);
		$this->pagination->initialize($config);
		// var_dump($config);
		$page= ($this->uri->segment(4))? $this->uri->segment(4):0;
		$data['items']= $this->product_model->get_item_type_pagination($type,$config['per_page'],$page);
		$data['links']= $this->pagination->create_links();
		$this->load->view('pages/header.php',NULL);

		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		// $data['items']= $this->product_model->get_item_type($type);
		$data['types']= $this->product_model->get_types();

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
			
			'cur_tag_open'    => '<li class="active flex-c-m stext-100 cl5 size-80 bg2 bor1 hov-btn1 p-lr-15 trans-04"><a href="#">',
			'cur_tag_close'   => '</a></li>',
			
			'num_tag_open'    => '<li class="flex-c-m stext-100 cl5 size-80 bg2 bor1 hov-btn1 p-lr-15 trans-04">',
			'num_tag_close'   => '</li>'
		);
	}
}
