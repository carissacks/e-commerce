<?php
class AdminHome_model extends CI_Model{

	public function ShowDataMonthly()
	{
		$query = $this->db->query("SELECT transaction_detail.id_trans as id, ms_users.name as name, transaction_detail.email_user as email, status.status_desc as status, transaction_detail.trans_date as date
									FROM transaction_detail
									JOIN ms_users on transaction_detail.email_user = ms_users.email_user
									JOIN status on status.id_status = transaction_detail.stats
									JOIN transactions on transactions.id_trans = transaction_detail.id_trans
									GROUP BY transaction_detail.id_trans");
		return $query->result_array();
	}

	public function namauser(){
        $query = $this->db->query("SELECT name as namauser FROM ms_users");
        return $query->result();
	}

	public function ShowDataToday()
	{
		$query = $this->db->query("SELECT t.id_trans, t.quantity, t.UnitPrice, i.item_name 
									FROM Transactions as t
									JOIN item_colored as ic on t.id_item_colored=ic.id_item_colored
									JOIN transaction_detail as td on t.id_trans=td.id_trans
									JOIN items as i on i.id_item=ic.id_item
									WHERE td.trans_date  =  current_date");
		return $query->result_array();
	}

	function countProductShow(){
		$this->db->select('COUNT(id_item_colored) as totalproduct');
		$this->db->where('show = 1');  
		$hasil = $this->db->get('item_colored');
		return $hasil;
	}

	function countProductHide(){
		$this->db->select('COUNT(id_item_colored) as totalproduct');
		$this->db->where('show = 0');  
		$hasil = $this->db->get('item_colored');
		return $hasil;
	}
	
	function EditProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction){
		$item = array(
			'id_item' => $ItemID,
			'item_name' => $ItemName,
			'item_desc' => $Description,
			'weight' => $Weight,
			'selling_price' => $Sellingprice,
			'buying_price' => $Buyingprice,
			'care_ins' => $Careinstruction,
			'id_type' => $ItemType
		);
		
		$this->db->where('id_item', $ItemID);
		$this->db->update('items', $item);
	}

	function EditProductDetail($id_item_colored, $item_size, $item_stock){
		$item = array(
			'id_item_colored' => $id_item_colored,
			'item_size' => $item_size,
			'stock' => $item_stock
		);
		$this->db->where('id_item_colored', $id_item_colored);
		$this->db->update('item_colored', $item);
	}

	function EditProductPhoto($id_item_colored, $ItemPicture){
		$item = array(
			'id_item_colored' => $id_item_colored,
			'item_photo' => $ItemPicture
		);
		$this->db->where('id_item_colored', $id_item_colored);
		$this->db->update('photos', $item);
	}

	function countMonthlysales(){
		$this->db->select('COUNT(id_trans) as totalmonthlysales'); 
		$this->db->where('extract(month from trans_date) = extract(month from current_date)'); 
		$hasil = $this->db->get('transaction_detail');
		return $hasil;
	}
	
	function reviews(){
		$this->db->select('name as nama, description as description_review, reviews.email_user as email, reviews.star as rating');
		$this->db->from('reviews');
		$this->db->join('ms_users', 'ms_users.email_user = reviews.email_user');
		$hasil= $this->db->get();
		return $hasil;
	}
	
	function latestsales(){
		$this->db->select('item_name as name, quantity as quantity, transaction_detail.totalpayment as totalpembelian');
		$this->db->from('transactions');
		$this->db->join('transaction_detail', 'transactions.id_trans = transaction_detail.id_trans');
		$this->db->join('item_colored', 'transactions.id_item_colored = item_colored.id_item_colored');
		$this->db->join('items', 'items.id_item = item_colored.id_item');
		$hasil= $this->db->get();
		return $hasil;
	}
	
	function monthlyearning(){
		$this->db->select('sum(totalpayment) as totalmonthlyearning'); 
		$this->db->where('extract(month from trans_date) = extract(month from current_date)'); 
		$hasil = $this->db->get('transaction_detail');
		return $hasil;
	}

	function countuser(){
		$this->db->select('count(email_user) as totaluser'); 
		$hasil = $this->db->get('ms_users');
		return $hasil;
	}

	function countorder(){
		$this->db->select('count(id_trans) as totalorder'); 
		$this->db->where('extract(month from trans_date) = extract(month from current_date)');
		$this->db->where('stats != 6');
		$hasil = $this->db->get('transaction_detail');
		return $hasil;
	}

	function avgrating(){
		$this->db->select('round(avg(star),2) as avgrating'); 
		$hasil = $this->db->get('reviews');
		return $hasil;
	}

	function get_items_hide(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('show = 0');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function getType(){
		$this->db->order_by('type_desc', 'asc');
		$result = $this->db->get('type');

		$dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $dd[$row->id_type] = $row->type_desc;
            }
		}
        return $dd;
	}

	// function getSize(){
	// 	$query = $this->db->get('item_stock');
	// 	return $query->result_array();
	// }

	// function getItemColored(){
	// 	$this->db->select('id_item_colored'); 
	// 	$this->db->where('item_photo');
	// 	$query = $this->db->get('item_colored');
	// 	return $query->result_array();
	// }

	public function getIDItemColored($ItemID){
		$query = $this->db->query("SELECT id_item_colored FROM item_colored where id_item = '$ItemID'");
		return $query->result();
	}

	public function countidcolor(){
		$query = $this->db->query("SELECT count(id_item_colored) FROM item_colored");
		return $query->result();
	}

	public function AddProductDetail($data){
		$this->db->trans_start();
		$this->db->insert_batch('item_stock', $data);
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else
		{
			$this->db->trans_commit();
		}
	}

	public function AddProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction, $data)
	{
		$this->db->trans_start();
			//INSERT TO ITEM
			$item = array(
				'id_item' => $ItemID,
				'item_name' => $ItemName,
				'item_desc' => $Description,
				'weight' => $Weight,
				'selling_price' => $Sellingprice,
				'buying_price' => $Buyingprice,
				'care_ins' => $Careinstruction,
				'id_type' => $ItemType
			);

			$this->db->insert('items', $item);

			//AUTO GENERATE id_item_colored
			$id_item_colored = $this->db->insert_id();
			
			// $result = array();
            //     foreach($type AS $key => $val){
            //          $result[] = array(
            //           'id_type'   => $package_id,
            //           'type_desc'   => $_POST['halo'][$key]
            //          );
			// 	} 
			
			// $this->db->insert_batch('items', $result);
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

			// $sql = $this->SiswaModel->save_batch($data);

			// var_dump($data);
			// var_dump($id_item_colored);

			$this->db->insert_batch('item_colored', $data);
	
			// $photo = array(
			// 	'item_photo'   => $ItemPicture,
			// 	'id_item_colored'   => $id_item_colored
			// );

			// $this->db->insert('photos', $photo);
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else
		{
			$this->db->trans_commit();
		}
	}

	public function AddPhoto($id_item_colored, $ItemPicture)
	{
		$this->db->trans_start();
			
		$photo = array(
			'id_item_colored'   => $id_item_colored,
			'item_photo'   => $ItemPicture,
		);

		$this->db->insert('photos', $photo);
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else
		{
			$this->db->trans_commit();
		}
	}

	function get_jumpsuit(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 2');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_dress(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 1');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	// function get_items($id){
	// 	$this->db->select('*');
	// 	$this->db->from('items');
	// 	$this->db->join('item_colored', 'item_colored.id_item = items.id_item');
	// 	$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
	// 	$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
	// 	$this->db->join('type', 'items.id_type = type.id_type');
	// 	$this->db->where('items.id_type = array("id_item_colored" => $id)');
	// 	$this->db->where('show = 1');
	// 	// $this->db->group_by('item_colored.id_item_colored');

	// 	$query= $this->db->get();
	// 	return $query->result_array();
	// }
	
	function get_items(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_specific_data($id){
		$query = $this->db->query(
			"SELECT * FROM items WHERE id_item = '$id'"
		);

		return $query->result_array();
	}
	
	function get_detail($id){
		$query = $this->db->query("SELECT * 
									FROM items as i 
									JOIN item_colored as ic on i.id_item = ic.id_item 
									JOIN photos as p on ic.id_item_colored = p.id_item_colored 
									-- JOIN item_stock as ist on ic.id_item_colored = ist.id_item_colored 
									JOIN type as t on i.id_type = t.id_type 
									WHERE (ic.id_item_colored = '$id')
									GROUP BY i.id_item");
		return $query->result_array();
	}

	function get_size_stock($id){
		$this->db->select('item_size, stock');
		$this->db->from('item_stock');
		$this->db->join('item_colored', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->where('item_colored.id_item_colored',$id);


		$query= $this->db->get();
		return $query->result_array();
	}

	function get_item_colored_detail($id){
		$query = $this->db->query("SELECT id_item_colored, item_color FROM item_colored where id_item = '$id'");
		return $query->result_array();

		// $this->db->select('id_item_colored, item_color');
		// $this->db->from('item_colored');
		// $this->db->where('id_item',$id);

		// $query= $this->db->get();
		// return $query->result_array();
	}

	function get_color($id){
		$this->db->select('item_color');
		$this->db->from('item_colored');
		$this->db->where('id_item_colored',$id);


		$query= $this->db->get();
		return $query->result_array();
	}

	function get_transaction($id){
		$this->db->select('*, transactions.quantity, (transactions.quantity*transactions.unitprice) as totalitem');
		$this->db->from('items');
		$this->db->join('item_colored', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->join('transactions', 'item_colored.id_item_colored = transactions.id_item_colored');
		$this->db->join('transaction_detail', 'transaction_detail.id_trans = transactions.id_trans');
		$this->db->where('transactions.id_trans',$id);
		$this->db->group_by('transactions.id_item_colored');
		$this->db->group_by('transaction_detail.id_trans');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_totalpayment($id){
		$this->db->select('sum(transaction_detail.totalpayment) as total');
		$this->db->from('transaction_detail');
		$this->db->where('id_trans',$id);

		$query= $this->db->get();
		return $query->result_array();
	}

	// select ( sum(transaction_detail.totalpayment) from transaction_detail where id_trans = $id) as total

	function get_photo_detail($id){
		$query= $this->db->get_where('photos', array('id_item_colored' => $id));
		return $query->result_array();
	}

	function item_detail($id){
		$this->db->select('*');
		$this->db->from('items');
		$this->db->join('item_colored', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_colored.id_item_colored',$id);
		$this->db->group_by('item_colored.id_item_colored');


		$query= $this->db->get();
		return $query->result_array();
	}
	
	function DeleteProduct($id){
		$this->db->trans_begin();
		// kalo delete biasa, tp ga bs delete kalo udh ada transaksi
		// $this->db->delete('item_stock', array('id_item_colored' => $id));
		// $this->db->delete('photos', array('id_item_colored' => $id));		
		// $this->db->delete('item_colored', array('id_item_colored' => $id));

		//kalo pake update show status
		$this->db->set('show', 0);
		$this->db->where('id_item_colored', $id );
		$this->db->update('item_colored');

		$this->db->delete('wishlist', array('id_item_colored' => $id));

		$this->db->delete('shopping_cart', array('id_item_colored' => $id));

		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
		}
	}
	
	// function DeleteWishlist($id){
	// 	$this->db->trans_begin();	
	// 	$this->db->delete('wishlist', array('id_item_colored' => $id));

	// 	if($this->db->trans_status() === FALSE)
	// 	{
	// 		$this->db->trans_rollback();
	// 		return FALSE;
	// 	}else{
	// 		$this->db->trans_commit();
	// 	}
    // }
}
?>
