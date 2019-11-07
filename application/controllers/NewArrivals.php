<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NewArrivals extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('newArr_model');
	}

	public function index(){
		$data['header']= $this->load->view('pages/header.php',NULL,TRUE);
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['items']= $this->newArr_model->get_items();
		$data['types']= $this->newArr_model->get_types();
		$this->load->view('pages/newArrview.php',$data);
	}
}
