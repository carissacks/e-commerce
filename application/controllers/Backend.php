<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('backend_model');
	}

	public function index(){
		// buat pagination
		
	}

	public function insert_product(){

	}

	public function delete_product(){

	}

	public function update_product(){
		
	}
}
