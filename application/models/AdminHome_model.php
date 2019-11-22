<?php
class AdminHome_model extends CI_Model{

	public function ShowDataMonthly()
	{
		// $query = $this->db->query("SELECT t.id_trans, GROUP_CONCAT(t.quantity), GROUP_CONCAT(t.UnitPrice), GROUP_CONCAT(i.item_name) 
		// 							FROM Transactions as t
		// 							JOIN item_colored as ic on t.id_item_colored=ic.id_item_colored
		// 							JOIN items as i on i.id_item=ic.id_item
		// 							GROUP BY t.id_trans");
		$query = $this->db->query("SELECT t.id_trans, t.quantity, t.UnitPrice, i.item_name
									FROM Transactions as t
									JOIN item_colored as ic on t.id_item_colored=ic.id_item_colored
									JOIN items as i on i.id_item=ic.id_item");
									//ganti jadi isinya monthly itu nama user, status, transaction date, ke detail baru isi yg dipesen apa

		return $query->result_array();
	}

	public function namauser(){
        $query = $this->db->query("SELECT name as namauser FROM ms_users");
        return $query->result();
	}

	public function ShowDataToday()
	{
		// $query = $this->db->query("SELECT * FROM Transactions");

		$query = $this->db->query("SELECT t.id_trans, t.quantity, t.UnitPrice, i.item_name 
									FROM Transactions as t
									JOIN item_colored as ic on t.id_item_colored=ic.id_item_colored
									JOIN transaction_detail as td on t.id_trans=td.id_trans
									JOIN items as i on i.id_item=ic.id_item
									WHERE td.trans_date  =  current_date");
		return $query->result_array();
	}

	function countProduct(){
		$this->db->select('COUNT(id_item) as totalproduct'); 
		$hasil = $this->db->get('items');
		return $hasil;
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


		// return $query->result_array();
	}

	function getSize(){
		$query = $this->db->get('item_stock');
		return $query->result_array();
	}

	// function getItemColored(){
	// 	$this->db->select('id_item_colored'); 
	// 	$this->db->where('item_photo');
	// 	$query = $this->db->get('item_colored');
	// 	return $query->result_array();
	// }

	public function countidcolor(){
		$this->db->select('count(id_item_colored) as totalcolors');
		$hasil = $this->db->get('item_colored');
		return $hasil->result();
		// $query = $this->db->query("SELECT count(id_item_colored) FROM item_colored");
        // return $query->result();
	}

	public function AddProduct($ItemID, $ItemName, $ItemType, $ItemColor, $Weight, $Sellingprice, $Buyingprice, $Description, $Careinstruction, $ItemPicture, $data)
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
			var_dump($id_item_colored);

			$this->db->insert_batch('item_colored', $data);
	
			// $item_colored = array(
			// 	'id_item_colored'   => $id_item_colored,
			// 	'id_item'   => $ItemID,
			// 	'item_color' => $ItemColor
			// );

			// $this->db->insert('item_colored', $item_colored);

			// echo var_dump($ItemType);

			$this->db->select('id_item_colored'); 
			$this->db->where('item_photo');
			$query = $this->db->get('item_colored');
			return $hasil;

			$photo = array(
				'item_photo'   => $ItemPicture,
				'id_item_colored'   => $id_item_colored
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

	function DeletePoduct($id){
		$this->db->trans_begin();
		$this->db->delete('items', array('id_item' => $id));
		$this->db->delete('item_colored', array('id_item' => $id));
		// $this->db->delete('photos', array('photoooooooooooooooo' => $id));
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}else{
			$this->db->trans_commit();
		}
    }
}
?>
