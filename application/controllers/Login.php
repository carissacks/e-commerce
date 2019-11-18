<?php

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index($error=''){
		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['label_attr']= array('class' =>'col-sm-2 col-form-label');
		$data['email_attr']= $this->form_attr('email');
		$data['password_attr']= $this->form_attr('password');
		$data['submit_attr']['class']= 'btn btn-primary';
		$data['error']= $error;
		$this->load->view('pages/loginview',$data);
	}

	function logging_in(){

		if($this->isFormValid()){

			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$check_user= $this->login_model->check_user($email);

			// var_dump($check_user);
			if($check_user){
				$salt= $check_user[0]['salt'];
				$where= array(
					'email_user' => $email,
					'pass' => md5($password.$salt)
				);
				$valid= $this->login_model->validated_user($where);

				// var_dump($valid);
				if($valid){
					echo"ok";
					$data_session= array(
						'email' => $email,
						'login' => true,
						'priv' => $valid[0]['priv']
					); 
					$this->session->set_userdata($data_session);

				}
				redirect(base_url());
			}else{
				$this->index('Email or password is incorrect');
			}
		}else{
			$this->index();
		}
	}

	function logging_out(){
		$this->session->sess_destroy();
		// echo "hm".$this->session->has_userdata('email');
		// echo "hm".$this->session->has_userdata('status');
		redirect(base_url('index.php/Login'));
	}

	public function form_attr($name){
		if($name=='password')
			$type='password';
		else $type='email';
		return array(
			'class'=>'form-control',
			'name'=>$name,
			'id'=>$name,
			'type'=>$type,
			'placeholder'=>'Please insert your '.$name
		);
	}

	private function head_class(){
		return array(
			'login' => false,
			'new_class' => '',
			'shop_class' => '',
			'sale_class' => ''
		);
	}

	public function isFormValid(){
		$rules_config= array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required',
				'errors' => array(
					'required' => 'You must provide an %s.'
				)
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please input your %s.'
				)
			)
		);

		$this->form_validation->set_rules($rules_config);
		if($this->form_validation->run() == false){
			return false;
		}
		else{
			return true;
		}
	}
}

?>
