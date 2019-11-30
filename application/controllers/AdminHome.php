<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->model('AdminHome_model');
	}

/////////////////////////////////////////////////////////////// Dashboard
	public function index(){
        $data['countproductshow'] = $this->AdminHome_model->countProductShow();
        $data['countproducthide'] = $this->AdminHome_model->countProductHide();
        $data['countmonthlysale'] = $this->AdminHome_model->countMonthlysales();
        $data['wishlist'] = $this->AdminHome_model->wishlist();
        $data['latestsales'] = $this->AdminHome_model->latestsales();
        $data['monthlyearning'] = $this->AdminHome_model->monthlyearning();
        $data['countuser'] = $this->AdminHome_model->countuser();
        $data['countorder'] = $this->AdminHome_model->countorder();
        $data['countoutstock'] = $this->AdminHome_model->countoutstock();
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['content']= $this->load->view('include/ContentDashboard',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/Dashboard.php',$data);
    }

/////////////////////////////////////////////////////////////// 

    public function Detail($id){
        $data['details']= $this->AdminHome_model->get_detail($id);
        $data['size_stock']= $this->AdminHome_model->get_size_stock($id);
        $data['photos']= $this->AdminHome_model->get_photo_detail($id);
        $data['color']= $this->AdminHome_model->get_color($id);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/Detail', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        $this->load->view('pages/Detail.php',$data);
    }
    
    public function DetailRestore($id){
        $data['details']= $this->AdminHome_model->get_detail($id);
        $data['size_stock']= $this->AdminHome_model->get_size_stock($id);
        $data['photos']= $this->AdminHome_model->get_photo_detail($id);
        $data['color']= $this->AdminHome_model->get_color($id);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/DetailRestore', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        $this->load->view('pages/Detail.php',$data);
    }
    
    public function DetailEdit($id){
        $data['details']= $this->AdminHome_model->get_detail($id);
        $data['size_stock']= $this->AdminHome_model->get_size_stock($id);
        $data['photos']= $this->AdminHome_model->get_photo_detail($id);
        $data['color']= $this->AdminHome_model->get_color($id);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/DetailEdit', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        $this->load->view('pages/Detail.php',$data);
    }

    public function showDetailTransaction(){
        $data['transaction']= $this->AdminHome_model->get_transaction($_GET['id']);
        $data['totalpayment']= $this->AdminHome_model->get_totalpayment($_GET['id']);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/TabelDetail', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/DetailTabel.php',$data);
	}

    public function AddMoreSizeAndStock(){
        $ItemID = $this->input->post('id_item');
        $id_item_colored = $this->input->post('color');
        $item_size = $this->input->post('size');
        $item_stock = $this->input->post('stock');

        $this->AdminHome_model->AddMoreSizeAndStock($id_item_colored, $item_size, $item_stock);
        redirect('AdminHome/FormEditProductDetail?itemid='.$ItemID);
    }

/////////////////////////////////////////////////////////////// Header Side bar 
    public function AllProduct()
	{
        $data['items']= $this->AdminHome_model->get_items();
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function DressProduct()
	{
		$data['items']= $this->AdminHome_model->get_dress();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function JumpsuitProduct()
	{
        $data['items']= $this->AdminHome_model->get_jumpsuit();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function BlouseProduct()
	{
		$data['items']= $this->AdminHome_model->get_blouse();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function ShirtProduct()
	{
		$data['items']= $this->AdminHome_model->get_shirt();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function TeesProduct()
	{
		$data['items']= $this->AdminHome_model->get_tees();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function SkirtProduct()
	{
		$data['items']= $this->AdminHome_model->get_skirt();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function JeansProduct()
	{
		$data['items']= $this->AdminHome_model->get_jeans();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

    public function ShortsProduct()
	{
		$data['items']= $this->AdminHome_model->get_shorts();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TableProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/AllProduct.php',$data);
    }

/////////////////////////////////////////////////////////////// See More
    public function HideProduct()
	{
        $data['items']= $this->AdminHome_model->get_items_hide();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TabelHideProduct', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/HideProduct.php',$data);
    }

    public function OutStock()
	{
        $data['items']= $this->AdminHome_model->get_out_stock();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatables'] = $this->load->view('include/TabelProductSize', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

        $this->load->view('pages/OutStockProduct.php',$data);
    }

/////////////////////////////////////////////////////////////// All Transactions
    
    public function AllTrasactionsView()
	{
        $data['data'] = $this->AdminHome_model->ShowDataMonthly();
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatabel'] = $this->load->view('include/Tabel', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/AllTransactions.php',$data);
    }

/////////////////////////////////////////////////////////////// Today Transactions
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

/////////////////////////////////////////////////////////////// Add Product
    public function FormAddProduct()
	{
        $data['type']  = $this->AdminHome_model->getType();
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

    public function FormAddProductDetail(){
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/FormAddStockSize.php',$data);
    }
    
    public function form_attr($name){
		if($name=='item_photo')
			$class='form-control-file';
		else $class='form-control';
		return array(
			'class'=>$class,
			'name'=>$name,
			'id'=>$name
		);
    }
    
    public function showProductColor(){
        $data['data'] = $this->AdminHome_model->get_item_colored_detail($_GET['id']);
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['poster_attr']= $this->form_attr('item_photo');
        $data['datatabel'] = $this->load->view('include/TableColorDetail', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/TableProductColor.php',$data);
    }

    public function AddProductDetail(){
        $this->form_validation->set_rules('itemsize[]', 'itemsize', 'required|trim|min_length[1]|max_length[2]',[
            'required' => '*You must input item size!',
            'min_length' => '*Input minimal 1 character in length!',
            'max_length' => '*The Description field cannot exceed 2 character in length!'
        ]);

        $this->form_validation->set_rules('itemstock[]', 'itemstock', 'required|trim|numeric|min_length[1]|max_length[3]',[
            'required' => '*You must input item stock!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 1!',
            'max_length' => '*Weight must be less than or equal to 999!'
        ]);

        if($this->form_validation->run() == false){
            $id =  $this->input->post('id_item_colored');
            $color = $this->input->post('value');
            $itemid = $this->input->post('itemID');

            $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
            $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
            $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
            $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
            redirect('AdminHome/FormAddProductDetail?id='.$id.'&color='.$color.'&itemid='.$itemid);
        }

        else{
            $ItemIDColored = $this->input->post('id_item_colored');
            $ItemID = $this->input->post('itemID');
            $itemSize = $this->input->post('itemsize');
            $itemStock = $this->input->post('itemstock');

            $data = array();
                $index = 0; // Set index array awal dengan 0

                foreach($itemSize as $datasizes){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                    array_push($data, array(
                        'id_item_colored' => $ItemIDColored,  // Ambil dan set data nama sesuai index array dari $index
                        'item_size'=>$datasizes, // Ambil dan set data alamat sesuai index array dari $index
                        'stock'=>$itemStock[$index],
                    ));
                    $index++;
                }
                $this->AdminHome_model->AddProductDetail($data);
                redirect('AdminHome/showProductColor?id='.$ItemID);
        }  
    }

    public function AddMorePhoto(){
        $ItemIDColored = $this->input->post('color');
        $ItemID = $this->input->post('id_item');
        $color = $this->AdminHome_model->get_specific_color($ItemIDColored, $ItemID);
        $namecolor = $color[0]['item_color'];
        
        $type = $this->input->post('type_desc');

        $ext = pathinfo($_FILES["item_photo"]["name"], PATHINFO_EXTENSION);
        $filename = $ItemID."-".$namecolor."-".mt_rand(1,1000).".". $ext;
        $config['upload_path']      = './asset/images/' . $type . "/";
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = '4960';
        $config['overwrite']        = false;
        $config['file_name']        = $filename;

        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $config);

        $success = $this->upload->do_upload('item_photo');
        if(!$success){
            print_r($this->upload->display_errors());
        }
        else {
            $this->AdminHome_model->AddPhoto($ItemIDColored, $filename);
            redirect('AdminHome/FormEditPhoto?id='.$ItemID); 
        }
    }

    public function AddPhoto()
    {
        $ItemIDColored = $this->input->post('id_item_colored');
        $ItemID = $this->input->post('item_id');

        $color = $this->AdminHome_model->get_specific_color($ItemIDColored, $ItemID);
        $namecolor = $color[0]['item_color'];

        $type_desc = $this->AdminHome_model->get_specific_type($ItemID);
        $type = $type_desc[0]['type_desc'];
        
        $ext = pathinfo($_FILES["item_photo"]["name"], PATHINFO_EXTENSION);
        $filename = $ItemID."-".$namecolor."-".mt_rand(1,1000).".". $ext;
        $config['upload_path']      = './asset/images/' . $type . "/";
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = '4960';
        $config['overwrite']        = false;
        $config['file_name']        = $filename;

        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $config);

        $success = $this->upload->do_upload('item_photo');
        if(!$success){
            print_r($this->upload->display_errors());
        }
        else {
            $this->AdminHome_model->AddPhoto($ItemIDColored, $filename);
            redirect('AdminHome/showProductColor?id='.$ItemID); 
        }
            
    }

    public function AddProduct()
	{
        $this->form_validation->set_rules('itemid', 'itemid', 'required|trim',[
            'required' => '*You must input item ID!'
        ]);

		$this->form_validation->set_rules('itemname', 'itemname', 'required|trim',[
            'required' => '*You must input item name!'
        ]);

        $this->form_validation->set_rules('type', 'itemtype', 'required|trim',[
            'required' => '*You must input item type!'
        ]);

        $this->form_validation->set_rules('itemcolor[]', 'itemcolor', 'required|trim',[
            'required' => '*You must input item color!'
        ]);

        $this->form_validation->set_rules('weight', 'weight', 'required|trim|numeric|min_length[2]|max_length[3]',[
            'required' => '*You must input weight!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10!',
            'max_length' => '*Weight must be less than or equal to 999!'
        ]);

        $this->form_validation->set_rules('sellingprice', 'sellingprice', 'required|trim|numeric|min_length[4]|max_length[7]',[
            'required' => '*You must input selling price!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10000!',
            'max_length' => '*Weight must be less than or equal to 9999999!'
        ]);

        $this->form_validation->set_rules('buyingprice', 'buyingprice', 'required|trim|numeric|min_length[4]|max_length[7]',[
            'required' => '*You must input selling price!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10000!',
            'max_length' => '*Weight must be less than or equal to 9999999!'
        ]);

        $this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[100]',[
            'required' => '*You must input item description!',
            'min_length' => '*Input minimal 10 character in length!',
            'max_length' => '*The Description field cannot exceed 100 character in length!'
        ]);

        $this->form_validation->set_rules('careinstruction', 'careinstruction', 'required|trim|min_length[10]|max_length[100]',[
            'required' => '*You must input item description!',
            'min_length' => '*Input minimal 10 character in length!',
            'max_length' => '*The Description field cannot exceed 100 character in length!'
        ]);

        if($this->form_validation->run() == false){
            $data['type']  = $this->AdminHome_model->getType();
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
        else{
            $ItemID = $this->input->post('itemid');
            $ItemName = $this->input->post('itemname');
            $ItemType = $this->input->post('type');
            $ItemColor = $this->input->post('itemcolor');
            $itemSize = $this->input->post('itemsize');
            $itemStock = $this->input->post('itemstock');
            $Weight = $this->input->post('weight');
            $Sellingprice = $this->input->post('sellingprice');
            $Buyingprice = $this->input->post('buyingprice');
            $Description = $this->input->post('description');
            $Careinstruction = $this->input->post('careinstruction');

            $data = array();
            
            foreach($ItemColor as $datacolors){ // Kita buat perulangan berdasarkan nis sampai data terakhir
				array_push($data, array(
					'id_item' => $ItemID,  // Ambil dan set data nama sesuai index array dari $index
                    'item_color'=>$datacolors, // Ambil dan set data alamat sesuai index array dari $index
                ));
            }
            $this->AdminHome_model->AddProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction, $data);
            redirect('AdminHome/showProductColor?id='.$ItemID);   
		}
    }

/////////////////////////////////////////////////////////////// Edit Product
    public function FormEditProductStock()
    {
        $data['data'] = $this->AdminHome_model->get_all_size_and_stock($_GET['id'], $_GET['size']);
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/FormEditStockSize.php',$data);
    }
    
    public function FormEditProductDetail()
    {
        $data['color']  = $this->AdminHome_model->get_color_form($_GET['itemid']);
        $data = array(
            'button' => 'Create',
            'color' => $this->AdminHome_model->get_data_color($_GET['itemid']),
            'color_selected' => $this->input->post('color') ? $this->input->post('color') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );
        $data['data'] = $this->AdminHome_model->get_specific_item_detail($_GET['itemid']);
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['datatabel'] = $this->load->view('include/TableDetailEdit', $data, TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);

		$this->load->view('pages/TableProductEdit.php',$data);
    }

    public function DeleteProductStock(){
        $ItemID = $_GET['itemID'];
        $id_item_colored = $_GET['id'];
        $item_size = $_GET['size'];

        $this->AdminHome_model->DeleteProductStock($id_item_colored, $item_size);
        redirect('AdminHome/FormEditProductDetail?itemid='.$ItemID);
    }

    public function EditProductDetail()
    {
        $ItemID = $this->input->post('itemID');
        $id_item_colored = $this->input->post('id_item_colored');
        $item_size = $this->input->post('size');
        $item_size_before = $this->input->post('sizebefore');
        $item_stock = $this->input->post('stock');
        $this->AdminHome_model->EditProductDetail($id_item_colored, $item_size, $item_stock, $item_size_before);
        redirect('AdminHome/FormEditProductDetail?itemid='.$ItemID);
    }

    public function FormEditPhoto(){
        $data['color']  = $this->AdminHome_model->get_color_form($_GET['id']);
        $data = array(
            'button' => 'Create',
            'color' => $this->AdminHome_model->get_color_form($_GET['id']),
            'color_selected' => $this->input->post('color') ? $this->input->post('color') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );
        $data['poster_attr']= $this->form_attr('item_photo');
        $data['photo']= $this->AdminHome_model->get_photo($_GET['id']);
        $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['poster_attr']= $this->form_attr('item_photo');
        $data['datatabel'] = $this->load->view('include/TabelPhotoEdit', $data, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('include/FormEditPhoto.php',$data);
    }

    public function EditProductPhoto(){
        $id_item_colored = $this->input->post('id_item_colored');
        $ItemID = $this->input->post('itemid');

        $color = $this->AdminHome_model->get_specific_color($id_item_colored, $ItemID);
        $type_desc = $this->AdminHome_model->get_photo($ItemID);
        $type = $type_desc[0]['type_desc'];
        $oldphoto = $this->input->post('oldphoto');
        $colorname = $color[0]['item_color'];       

        $path = './asset/images/' . $type . "/" . $oldphoto;
        unlink($path);

        $ext = pathinfo($_FILES["item_photo"]["name"], PATHINFO_EXTENSION);
        $filename = $ItemID."-".$colorname."-".mt_rand(1,1000).".". $ext;

        $config['upload_path']          = './asset/images/'. $type. "/";
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = '4960';
        $config['overwrite']			= false;
        $config['file_name']        = $filename;

        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $config);

        $success = $this->upload->do_upload('item_photo');
        if(!$success){
            print_r($this->upload->display_errors());
        }
        else {
            $this->AdminHome_model->EditProductPhoto($id_item_colored, $filename, $oldphoto);
            redirect('AdminHome/FormEditPhoto?id='.$ItemID);
        }
    }

    public function AddNewColor(){
        $ItemId = $this->input->post('itemid');
        $show = $this->input->post('show');
        $color = $this->input->post('color');

        echo $ItemId;
        echo $show;
        echo $color;
        $this->AdminHome_model->AddNewColor($ItemId, $show, $color);
        redirect('AdminHome/FormEditProductDetail?itemid='.$ItemId);
    }

    public function DeleteProductPhoto()
	{
        $item_photo = $_GET['id']; //nama item photo yg baru
        $iditem = $_GET['iditem']; //id item

        $data = $this->AdminHome_model->get_specific_photo($iditem, $item_photo);
        
        $id_item_colored = $data[0]['id_item_colored'];
        $type_desc = $data[0]['type_desc'];

        $path = './asset/images/' . $type_desc . "/" . $item_photo;
        unlink($path);
        $this->AdminHome_model->DeleteProductPhoto($item_photo);
        redirect('AdminHome/FormEditPhoto?id='.$iditem);
    }

    public function FormEditProduct()
	{
        $item_type = $_GET['type'];
        $data['type']  = $this->AdminHome_model->getType();
        
        $data = array(
            'button' => 'Create',
            'type' => $this->AdminHome_model->getType(),
            'type_selected' => $this->input->post('type') ? $this->input->post('type') : $item_type, // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
        );
        $data['details']= $this->AdminHome_model->get_specific_data($_GET['id_item']);
		$data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
        $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
        $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $this->load->view('pages/FormEditProduct.php',$data);
    }

    public function EditProduct()
	{
		$this->form_validation->set_rules('itemid', 'itemid', 'required|trim',[
            'required' => '*You must input item ID!'
        ]);

		$this->form_validation->set_rules('itemname', 'itemname', 'required|trim',[
            'required' => '*You must input item name!'
        ]);

        $this->form_validation->set_rules('type', 'itemtype', 'required|trim',[
            'required' => '*You must input item type!'
        ]);

        $this->form_validation->set_rules('itemcolor[]', 'itemcolor', 'required|trim',[
            'required' => '*You must input item color!'
        ]);

        $this->form_validation->set_rules('weight', 'weight', 'required|trim|numeric|min_length[2]|max_length[3]',[
            'required' => '*You must input weight!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10!',
            'max_length' => '*Weight must be less than or equal to 999!'
        ]);

        $this->form_validation->set_rules('sellingprice', 'sellingprice', 'required|trim|numeric|min_length[4]|max_length[7]',[
            'required' => '*You must input selling price!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10000!',
            'max_length' => '*Weight must be less than or equal to 9999999!'
        ]);

        $this->form_validation->set_rules('buyingprice', 'buyingprice', 'required|trim|numeric|min_length[4]|max_length[7]',[
            'required' => '*You must input selling price!',
            'numeric' => '*You should input a number not string!',
            'min_length' => '*Weight must be more than or equal to 10000!',
            'max_length' => '*Weight must be less than or equal to 9999999!'
        ]);

        $this->form_validation->set_rules('description', 'description', 'required|trim|min_length[10]|max_length[100]',[
            'required' => '*You must input item description!',
            'min_length' => '*Input minimal 10 character in length!',
            'max_length' => '*The Description field cannot exceed 100 character in length!'
        ]);

        $this->form_validation->set_rules('careinstruction', 'careinstruction', 'required|trim|min_length[10]|max_length[100]',[
            'required' => '*You must input item description!',
            'min_length' => '*Input minimal 10 character in length!',
            'max_length' => '*The Description field cannot exceed 100 character in length!'
        ]);
        if($this->form_validation->run() == false){
            $item_type = $_GET['type'];
            $data['type']  = $this->AdminHome_model->getType();
            
            $data = array(
                'button' => 'Create',
                'type' => $this->AdminHome_model->getType(),
                'type_selected' => $this->input->post('type') ? $this->input->post('type') : $item_type, // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
            );
            $data['details']= $this->AdminHome_model->get_specific_data($_GET['id_item']);
            $data['style'] = $this->load->view('include/StyleAdmin', NULL, TRUE);
            $data['script'] = $this->load->view('include/ScriptAdmin', NULL, TRUE);
            $data['header']= $this->load->view('include/HeaderAdmin',NULL,TRUE);
            $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
            
            $this->load->view('pages/FormEditProduct.php',$data);
        }
        else{
            $ItemID = $this->input->post('itemid');
            $ItemName = $this->input->post('itemname');
            $ItemType = $this->input->post('type');
            $ItemColor = $this->input->post('itemcolor');
            $Weight = $this->input->post('weight');
            $Sellingprice = $this->input->post('sellingprice');
            $Buyingprice = $this->input->post('buyingprice');
            $Description = $this->input->post('description');
            $Careinstruction = $this->input->post('careinstruction');
            
            $this->AdminHome_model->EditProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction);
            redirect('AdminHome/FormEditProductDetail?itemid='.$ItemID);
		}
    }

/////////////////////////////////////////////////////////////// Delete Product
    public function Delete()
	{
        $data['details']= $this->AdminHome_model->get_detail($_GET['id']);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/Detail', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $id = $_GET['id'];

        $this->AdminHome_model->DeleteProduct($id);
        redirect('AdminHome');
    }

/////////////////////////////////////////////////////////////// Restore Product
    public function Restore()
	{
        $data['details']= $this->AdminHome_model->get_detail($_GET['id']);
        $data['style'] = $this->load->view('include/css', NULL, TRUE);
        $data['script'] = $this->load->view('include/js', NULL, TRUE);
        $data['Detail'] = $this->load->view('include/Detail', $data, TRUE);
		$data['header']= $this->load->view('include/HeaderAdmin',$data,TRUE);
        $data['footer']= $this->load->view('include/FooterAdmin',NULL,TRUE);
        
        $id = $_GET['id'];

        $this->AdminHome_model->Restore($id);
        redirect('AdminHome');
    }
}
