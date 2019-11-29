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

	function get_specific_item_detail($itemID)
	{
		$query = $this->db->query("SELECT ist.id_item_colored, ist.item_size, ist.stock, ic.item_color, it.id_item 
									FROM items as it
									JOIN item_colored as ic on ic.id_item = it.id_item 
									join item_stock as ist on ist.id_item_colored = ic.id_item_colored
									WHERE it.id_item = '$itemID'");
		return $query->result_array();
	}

	function get_data_color($itemID){
		$this->db->select('ic.id_item_colored, ic.item_color');
		$this->db->from('items as it');
		$this->db->join('item_colored as ic', 'ic.id_item = it.id_item');
		$this->db->where('it.id_item', $itemID);
		$this->db->group_by('1');
		$this->db->order_by('ic.item_color', 'asc');
		$result = $this->db->get();

		$dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $dd[$row->id_item_colored] = $row->item_color;
            }
		}
        return $dd;
	}

	function get_color_form($itemID){
		$this->db->select('ist.id_item_colored, ic.item_color');
		$this->db->from('items as it');
		$this->db->join('item_colored as ic', 'ic.id_item = it.id_item');
		$this->db->join('item_stock as ist', 'ist.id_item_colored = ic.id_item_colored');
		$this->db->where('it.id_item', $itemID);
		$this->db->group_by('1');
		$this->db->order_by('ic.item_color', 'asc');
		$result = $this->db->get();

		$dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                $dd[$row->id_item_colored] = $row->item_color;
            }
		}
        return $dd;
	}

	function AddMoreSizeAndStock($id_item_colored, $item_size, $item_stock)
	{
		$this->db->trans_start();

		$item = array(
			'id_item_colored' => $id_item_colored,
			'item_size' => $item_size,
			'stock' => $item_stock
		);

		$this->db->insert('item_stock', $item);

		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else
		{
			$this->db->trans_commit();
		}
	}

	function countProductHide(){
		$this->db->select('DISTINCT COUNT(item_colored.id_item_colored) as totalproduct');
		$this->db->from('item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->where('item_colored.show = 0');  
		$this->db->where('item_stock.stock > 0');
		// $this->db->group_by('item_colored.id_item_colored, ');
		$hasil= $this->db->get();
		return $hasil;
	}

	// $this->db->select('name as nama, item_name as item_name, ms_users.email_user as email, wishlist.item_size as size');
	// 	$this->db->from('wishlist');
	// 	$this->db->join('item_colored', 'wishlist.id_item_colored = item_colored.id_item_colored');
	// 	$this->db->join('items', 'item_colored.id_item = items.id_item');
	// 	$this->db->join('ms_users', 'ms_users.email_user = wishlist.email_user');
	// 	// $this->db->where('count(wishlist.id_item_colored) > 5');
	// 	$this->db->group_by('wishlist.id_item_colored'); 
	// 	$hasil= $this->db->get();
	// 	return $hasil;
	
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

	function DeleteProductStock($id_item_colored, $item_size){
		$this->db->where('id_item_colored', $id_item_colored);
		$this->db->where('item_size', $item_size);
		$this->db->delete('item_stock');
	}

	function EditProductDetail($id_item_colored, $item_size, $item_stock, $item_size_before){
		$item = array(
			'id_item_colored' => $id_item_colored,
			'item_size' => $item_size,
			'stock' => $item_stock
		);
		$this->db->where('id_item_colored', $id_item_colored);
		$this->db->where('item_size', $item_size_before);
		$this->db->update('item_stock', $item);
		
	}

	function get_all_size_and_stock($id_item_colored, $size)
	{
		$query = $this->db->query("SELECT * FROM item_stock WHERE id_item_colored = '$id_item_colored' and item_size = '$size'");
		return $query->result_array();
		// $this->db->select('*');
		// $this->db->where('id_item_colored', $id_item_colored);  
		// $hasil = $this->db->get('item_stock');
		// return $hasil;
	}

	function EditProductPhoto($id_item_colored, $ItemPicture, $oldphoto){
		$item = array(
			'id_item_colored' => $id_item_colored,
			'item_photo' => $ItemPicture
		);
		$this->db->where('item_photo', $oldphoto);
		$this->db->update('photos', $item);
	}

	function countMonthlysales(){
		$this->db->select('COUNT(id_trans) as totalmonthlysales'); 
		$this->db->where('extract(month from trans_date) = extract(month from current_date)'); 
		$hasil = $this->db->get('transaction_detail');
		return $hasil;
	}
	
	function wishlist(){
		$this->db->select('name as nama, item_name as item_name, ms_users.email_user as email, wishlist.item_size as size');
		$this->db->from('wishlist');
		$this->db->join('item_colored', 'wishlist.id_item_colored = item_colored.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('ms_users', 'ms_users.email_user = wishlist.email_user');
		// $this->db->where('count(wishlist.id_item_colored) > 5');
		$this->db->group_by('wishlist.id_item_colored'); 
		$hasil= $this->db->get();
		return $hasil;
	}
	
	function latestsales(){
		$this->db->select('item_name as name, quantity as quantity, transaction_detail.totalpayment as totalpembelian');
		$this->db->from('transactions');
		$this->db->join('transaction_detail', 'transactions.id_trans = transaction_detail.id_trans');
		$this->db->join('item_colored', 'transactions.id_item_colored = item_colored.id_item_colored');
		$this->db->join('items', 'items.id_item = item_colored.id_item');
		$this->db->order_by("transactions.id_trans", "desc");

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

	function countoutstock(){
		$this->db->select('count(item_stock.id_item_colored) as countoutstock');
		$this->db->from('item_stock');
		$this->db->where('item_stock.stock = 0');

		$query= $this->db->get();
		return $query->result_array();
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

	function get_out_stock(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_stock.stock < 1');
		$this->db->group_by('item_stock.item_size');

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
			$this->db->insert_batch('item_colored', $data);
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

	function get_photo($iditem){
		$query = $this->db->query("SELECT i.item_name, ic.id_item_colored, ic.id_item, t.type_desc, ic.item_color, p.item_photo 
									FROM items as i
									JOIN item_colored as ic on i.id_item = ic.id_item
									JOIN type as t on t.id_type = i.id_type
									JOIN photos as p on ic.id_item_colored = p.id_item_colored
									WHERE i.id_item = '$iditem'");
		return $query->result_array();
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

	function get_blouse(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 3');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_shirt(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 4');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_tees(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 5');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_skirt(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 6');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_jeans(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 7');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_shorts(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('items.id_type = 8');
		$this->db->where('show = 1');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_items(){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_colored.show = 1');
		$this->db->where('item_stock.stock > 0');
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
	}

	function get_specific_color($item_id_colored, $id_item)
	{
		$this->db->select('item_color');
		$this->db->from('item_colored');
		$this->db->where('id_item_colored',$item_id_colored);
		$this->db->where('id_item', $id_item);

		$query= $this->db->get();
		return $query->result_array();
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

	function AddNewColor($ItemID, $show, $color){
		$this->db->trans_begin();

		$color = array(
			'id_item' => $ItemID,
			'show' => $show,
			'item_color' => $color
		);

		$this->db->insert('item_colored', $color);

		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
		}
	}

	function DeleteProductPhoto($id){
		$this->db->trans_begin();

		$this->db->delete('photos', array('item_photo' => $id));

		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
		}
	}

	function restore($id){
		$query = $this->db->query("UPDATE item_colored
									JOIN item_stock on item_colored.id_item_colored = item_stock.id_item_colored
									SET item_colored.show = 1
									WHERE (item_colored.id_item_colored = $id) AND (item_stock.stock > 0)");
	}
	

}
?>
