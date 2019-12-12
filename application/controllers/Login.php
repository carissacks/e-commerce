<?php

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index($error=''){
		if($this->session->has_userdata('login')){
			redirect(base_url(''));
		}
		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['label_attr']= array('class' =>'col-sm-2 col-form-label');
		$data['email_attr']= $this->form_attr('email');
		$data['password_attr']= $this->form_attr('password');
		$data['submit_attr']['class']= 'btn cl2 bg8 bor13 hov-btn3';
		$data['error']= $error;
		$this->load->view('pages/loginview',$data);
	}

	function FormSignUp($error=''){
		$this->load->view('pages/header.php',$this->head_class());
		$data['footer']= $this->load->view('pages/footer.php',NULL,TRUE);
		$data['label_attr']= array('class' =>'col-sm-6 col-form-label');
		$data['email_attr']= $this->form_attr_signup('email');
		$data['password_attr']= $this->form_attr_signup('password');
		$data['passwordconf_attr']= $this->form_attr_signup('passwordconf');
		$data['name_attr']= $this->form_attr_signup('name');
		$data['address_attr']= $this->form_attr_signup('address');
		$data['submit_attr']['class']= 'btn cl2 bg8 bor13 hov-btn3';
		$data['error']= $error;
		$this->load->view('pages/signupview', $data);
	}

	function signup(){
		if($this->isFormSignUpValid()){
			$email_user = $this->input->post('email');
			$pass = $this->input->post('password');
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			
			$this->login_model->signup($email_user, $pass, $name, $address);
			redirect('Login/?status=ok'); 
			
		}else{
			$this->FormSignUp();
		}
	}

	public function logging_in(){

		if($this->isFormValid()){

			$email= $this->input->post('email');
			$password= $this->input->post('password');
			$check_user= $this->login_model->check_user($email);

			// var_dump($check_user);
			if($check_user){
				$salt= $check_user[0]['salt'];
				$name = $check_user[0]['name'];
				$where= array(
					'email_user' => $email,
					'pass' => md5($password.$salt)
				);
				$valid= $this->login_model->validated_user($where);

				// var_dump($valid);
				if($valid){
					// echo"ok";
					$data_session= array(
						'email' => $email,
						'login' => true,
						'name' => $name,
						'priv' => $valid[0]['priv']
					); 
					$status = $valid[0]['priv'];
					
					$this->session->set_userdata($data_session);

				}
				if($status == 1){
					redirect(base_url('index.php/AdminHome'));
				}else {
					redirect(base_url());
				}
					
				
			}
			else{
				$this->index('Email or password is incorrect');
			}
		}else{
			$this->index();
		}
	}

	public function logging_out(){
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

	public function form_attr_signup($name){
		if($name=="passwordconf")
			return array(
				'class'=>'form-control',
				'name'=>$name,
				'id'=>$name,
				'type'=>'password',
				'placeholder'=>'Please insert your password'
			);
		if($name=='password')
			$type='password';
		else if($name == 'email')
			$type='email';
		else $type='text';
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
			'userlogin' => false,
			'new_class' => '',
			'shop_class' => ''
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

	
	public function isFormSignUpValid(){
		$rules_configs= array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim|is_unique[ms_users.email_user]',
				'errors' => array(
					'required' => 'You must provide an %s.',
					'is_unique' => 'This email is registered.'
				)
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|trim|min_length[8]',
				'errors' => array(
					'required' => 'Please input your %s.',
					'min_length' => 'Must have at least {param} characters.'
				)
			),
			array(
				'field' => 'passwordconf',
				'label' => 'Password Confirmation',
				'rules' => 'required|trim|matches[password]',
				'errors' => array(
					'required' => 'Please input your password.'
				)
			),
			array(
				'field' => 'name',
				'label' => 'Full Name',
				'rules' => 'required|trim|min_length[3]',
				'errors' => array(
					'required' => 'Please input your %s.',
					'min_length' => 'Your name must have at least {param} characters.'
				)
			),
			array(
				'field' => 'address',
				'label' => 'address',
				'rules' => 'required|min_length[25]',
				'errors' => array(
					'required' => 'Please input your %s.',
					'min_length' => 'Please input your full address.'
				)
			)
		);

		$this->form_validation->set_rules($rules_configs);
		if($this->form_validation->run() == false){
			return false;
		}
		else{
			return true;
		}
	}
	
}

?>
