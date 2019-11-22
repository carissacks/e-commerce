<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('AdminHome_model');
        $this->load->model('Product_model');
	}

	public function index(){
        $data['countproduct'] = $this->AdminHome_model->countProduct();
        $data['countmonthlysale'] = $this->AdminHome_model->countMonthlysales();
        $data['reviews'] = $this->AdminHome_model->reviews();
        $data['latestsales'] = $this->AdminHome_model->latestsales();
        $data['monthlyearning'] = $this->AdminHome_model->monthlyearning();
        $data['countuser'] = $this->AdminHome_model->countuser();
        $data['countorder'] = $this->AdminHome_model->countorder();
        $data['avgrating'] = $this->AdminHome_model->avgrating();
        // $data['namauser'] = $this->AdminHome_model->namauser();
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['content']= $this->load->view('include/ContentDashboard',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/Dashboard.php',$data);
    }

    public function AllProduct()
	{
        // buat pagination
		// $config= $this->pagination_config();
		// $config['base_url']= base_url('index.php/Products/index');
		// $config['total_rows']= $this->Product_model->total_data();
		// $this->pagination->initialize($config);

		// $page= ($this->uri->segment(3))? $this->uri->segment(3):0;
		$data['items']= $this->Product_model->get_items();
		// $data['links']= $this->pagination->create_links();
        // endof pagination
        
        $data['data'] = $this->Product_model->get_items();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['types']= $this->Product_model->get_types();
		$data['selected_type']='';
        $data['card'] = $this->load->view('include/CardProduct', $data, TRUE);
        
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }
    
    public function MonthlyView()
	{
        $data['data'] = $this->AdminHome_model->ShowDataMonthly();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatabel'] = $this->load->view('include/Tabel', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/Monthly.php',$data);
    }
    
    public function TodayView()
	{
		$data['data'] = $this->AdminHome_model->ShowDataToday();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatabel'] = $this->load->view('include/Tabel', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/Today.php',$data);
    }
    
    public function FormAddProduct()
	{
        $data['type']  = $this->AdminHome_model->getType();
        // $data['size']  = $this->AdminHome_model->getSize();
        $data = array(
            'button' => 'Create',
            'type' => $this->AdminHome_model->getType(),
            'type_selected' => $this->input->post('type') ? $this->input->post('type') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/FormAddProduct.php',$data);
    }

    public function FormEditProduct()
	{
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['itemtype']  = $this->AdminHome_model->getItemType();
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/FormEditProduct.php',$data);
    }
    
    public function AddProduct()
	{
        // $this->form_validation->set_rules('itemid', 'itemid', 'required|trim',[
        //     'required' => '*You must provide a string!'
        // ]);

		// $this->form_validation->set_rules('itemname', 'itemname', 'required|trim',[
        //     'required' => '*You must provide a string!'
        // ]);
        // $this->form_validation->set_rules('year', 'Year', 'required|trim|numeric|min_length[4]|max_length[5]',[
        //     'required' => '*You must input year!',
        //     'numeric' => '*You should input a number not string!',
        //     'min_length' => '*Input minimal 4 number!',
        //     'max_length' => '*Input maximal 5 number!'
        // ]);
        // $this->form_validation->set_rules('director', 'Director', 'required|trim|max_length[30]',[
        //     'required' => '*You must input director!',
        //     'max_length' => '*The Director field cannot exceed 30 character in length!'
        // ]);
        // $this->form_validation->set_rules('posterLink', 'PosterLink', 'required',[
		// 	'required' => '*The filetype you are attempting to upload is not allowed!',
		// ]);

        // if($this->form_validation->run() == false){
        //     $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        //     $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        //     $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        //     $data['itemtype']  = $this->AdminHome_model->getItemType();
        //     $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        //     $this->load->view('pages/FormAddProduct.php', $data);
        // }
        // else{
            // $data['itemcolored'] = $this->AdminHome_model->getItemColored();

            // $itemcolored = $this->input->post('itemcolored');
            $ItemID = $this->input->post('itemid');
            $ItemName = $this->input->post('itemname');
            $ItemType = $this->input->post('type');
            $ItemColor = $this->input->post('itemcolor');
            $Weight = $this->input->post('weight');
            $Sellingprice = $this->input->post('sellingprice');
            $Buyingprice = $this->input->post('buyingprice');
            $Description = $this->input->post('description');
            $Careinstruction = $this->input->post('careinstruction');

            $config['upload_path'] = './assets/itempicture';
		    $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = $ItemName;
            
            $this->load->library('upload', $config);
            $this->upload->do_upload('itempicture');
            
            $ItemPicture='assets/itempicture/' . $this->upload->data('file_name');

            $data = array();
            $index = 0; // Set index array awal dengan 0
            $totalcolors = $this->AdminHome_model->countidcolor($ItemID); 
            var_dump($totalcolors);

            // $select_id_type_color = $this->AdminHome_model->select_id_type_color(); 

            foreach($ItemColor as $datacolors){ // Kita buat perulangan berdasarkan nis sampai data terakhir
				array_push($data, array(
					'id_item' => $ItemID,  // Ambil dan set data nama sesuai index array dari $index
                    'item_color'=>$datacolors, // Ambil dan set data alamat sesuai index array dari $index
                ));
			    $index++;
            }

            $this->AdminHome_model->AddProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction, $ItemPicture, $data);
            
            // $data = array();
			// $index = 0; // Set index array awal dengan 0
			// foreach($id_item_colored as $datacolors){ // Kita buat perulangan berdasarkan nis sampai data terakhir
			// 	array_push($data, array(
			// 		'id_item_colored'=>$datacolors,
			// 		'id_item' => $ItemID,  // Ambil dan set data nama sesuai index array dari $index
			// 		'item_color'=>$color[$index], // Ambil dan set data alamat sesuai index array dari $index
			// 	));
			// $index++;
			// }

            // $sql = $this->AdminHome_model->AddProduct($data);
            
            redirect('AdminHome');   
		// }
    }
    
    public function EditProduct()
	{
		$this->form_validation->set_rules('itemname', 'itemname', 'required|trim',[
            'required' => '*You must provide a string!'
        ]);
        $this->form_validation->set_rules('year', 'Year', 'required|trim|numeric|min_length[4]|max_length[5]',[
            'required' => '*You must input year!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Input minimal 4 number!',
            'max_length' => '*Input maximal 5 number!'
        ]);
        $this->form_validation->set_rules('director', 'Director', 'required|trim|max_length[30]',[
            'required' => '*You must input director!',
            'max_length' => '*The Director field cannot exceed 30 character in length!'
        ]);
        $this->form_validation->set_rules('posterLink', 'PosterLink', 'required',[
			'required' => '*The filetype you are attempting to upload is not allowed!',
		]);

        if($this->form_validation->run() == false){
            $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
            $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
            $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
            $data['itemtype']  = $this->AdminHome_model->getItemType();
            $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
            $this->load->view('pages/FormEditProduct.php', $data);
        }
        else{
            
            $this->AdminHome_model->EditProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction, $ItemPicture);
            redirect('AdminHome');   
		}
	}
}
