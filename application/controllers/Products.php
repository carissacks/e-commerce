<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('product_model');
	}

	public function index(){
		// buat pagination
		$config['base_url']= base_url('index.php/Products/index');
		$config['total_rows']= $this->product_model->total_data();
		$config['per_page']= 12;
		$config['uri_segment']= 3;

		$config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = ' <i class="glyphicon glyphicon-menu-right"></i> '; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="glyphicon glyphicon-menu-left"></i> '; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active flex-c-m stext-100 cl5 size-80 bg2 bor1 hov-btn1 p-lr-15 trans-04"><a href="#">';
		$config['cur_tag_close']   = '</a></li>';
		
        $config['num_tag_open']    = '<li class="flex-c-m stext-100 cl5 size-80 bg2 bor1 hov-btn1 p-lr-15 trans-04">';
        $config['num_tag_close']   = '</li>';

		$this->pagination->initialize($config);

		$page= ($this->uri->segment(3))? $this->uri->segment(3):0;
		$data['items']= $this->product_model->get_item_pagination($config['per_page'],$page);
		$data['links']= $this->pagination->create_links();
		// endof pagination
		// $data['header']= 
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
		$this->load->view('pages/header.php',NULL);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->product_model->get_item_type($type);
		$data['types']= $this->product_model->get_types();

		$this->load->view('pages/productview.php',$data);

	}
}
