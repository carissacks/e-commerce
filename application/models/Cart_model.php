<?php
class Cart_model extends CI_Model{
	function get_user($email){
		$this->db->select('email_user, name, address');
		$query= $this->db->get_where('ms_users',array('email_user'=> $email));
		return $query->row();
	}

	function get_itemInCart($email){
		$this->db->select('*');
		$this->db->from('shopping_cart');
		$this->db->join('item_colored', 'item_colored.id_item_colored = shopping_cart.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->join('item_stock', 'shopping_cart.id_item_colored = item_stock.id_item_colored AND shopping_cart.item_size = item_stock.item_size');
		$this->db->where('email_user',$email);
		$this->db->group_by('shopping_cart.id_item_colored , shopping_cart.item_size');

		$query= $this->db->get();
		return $query;
		// return $query->result_array();
	}

	function is_itemInCart($id,$email,$size){
		$data= array(
			'id_item_colored' => $id,
			'email_user' => $email,
			'item_size' => $size
		);
		$query= $this->db->get_where('shopping_cart',$data);
		return $query->row();
	}

	function remove_item($id, $email, $size){
		$this->db->delete('shopping_cart', array('id_item_colored' => $id, 'email_user' => $email, 'item_size' => $size));
	}

	function get_totalCartData($email){
		$this->db->select_sum('quantity');
		$query= $this->db->get_where('shopping_cart',array('email_user'=>$email));
		if($query->row()->quantity)
			return $query->row()->quantity;
		else return 0;
	}

	function get_totalPrice($email){
		// SELECT SUM(quantity*items.selling_price) FROM `shopping_cart` LEFT JOIN item_colored on shopping_cart.id_item_colored= item_colored.id_item_colored JOIN items on items.id_item=item_colored.id_item
		$total_price= 'SUM(quantity * selling_price)';
		$this->db->select($total_price);
		$this->db->from('shopping_cart');
		$this->db->join('item_colored', 'item_colored.id_item_colored = shopping_cart.id_item_colored','left');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->where('email_user',$email);
		$query= $this->db->get();
		return $query->row()->$total_price;
	}

	function updateItem($id, $qty, $size, $email){
		$data= array(
			'id_item_colored'=> $id,
			'quantity' =>$qty,
			'item_size' => $size,
			'email_user' => $email
		);

		$this->db->replace('shopping_cart',$data);
	}

	function insert_transactionDetail($email, $shipment){
		$data= array(
			'email_user' => $email,
			'stats' => 2,
			'trans_date' => date('Y-m-d'),
			'shipping_fee' => $shipment
		);
		$this->db->trans_begin();
		$this->db->insert('transaction_detail', $data);
		if ($this->db->trans_status() === FALSE)
			$this->db->trans_rollback();
		else
			$this->db->trans_commit();
	}

	function get_idTrans($email){
		$this->db->where('email_user',$email);
		$this->db->order_by('id_trans', 'DESC');
		$query= $this->db->get('transaction_detail');
		return $query->row()->id_trans;
	}

	function insert_transaction($id, $id_item, $qty, $price, $size){
		$data= array(
			'id_trans' => $id,
			'id_item_colored' => $id_item,
			'quantity' => $qty,
			'UnitPrice' => $price,
			'item_size' => $size
		);
		$this->db->trans_begin();
		$this->db->insert('transactions', $data);
		if ($this->db->trans_status() === FALSE)
			$this->db->trans_rollback();
		else
			$this->db->trans_commit();
	}

	function minStock($id, $size, $qty){
		$data= array(
			'id_item_colored' => $id,
			'item_size' => $size
		);
		// $this->db->replace('item_stock', $data);
		$this->db->where($data);
		$this->db->set('stock', 'stock-'.$qty, FALSE);
		$this->db->update('item_stock');
	}

	function delete_usercart($email){
		$this->db->delete('shopping_cart', array('email_user'=> $email));
	}

	function delete_itemcart($id, $size){
		$this->db->delete('shopping_cart', array('id_item_colored'=> $id, 'item_size' => $size));
	}

	function get_transactionHistory($email){
		$this->db->select('SUM(transactions.quantity) AS total, transaction_detail.id_trans, status.status_desc, transaction_detail.stats, transaction_detail.trans_date, transaction_detail.shipping_fee');
		$this->db->from('transaction_detail');
		$this->db->join('status', 'transaction_detail.stats = status.id_status');
		$this->db->join('transactions', 'transaction_detail.id_trans = transactions.id_trans');
		$this->db->where('email_user',$email);
		$this->db->group_by('transaction_detail.id_trans');
		$this->db->order_by('transaction_detail.id_trans','DESC');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_transaction($id){
		$this->db->join('status', 'transaction_detail.stats = status.id_status');
		$query= $this->db->get_where('transaction_detail',array('id_trans'=>$id));
		return $query->row();
	}

	function get_transactionDetail($id){
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->join('item_colored', 'item_colored.id_item_colored = transactions.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('id_trans',$id);
		$this->db->group_by('transactions.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();

		// $this->db->select('SUM(transactions.quantity) AS total, transaction_detail.id_trans, status.status_desc, transaction_detail.stats, transaction_detail.trans_date, transaction_detail.shipping_fee');
		// $this->db->from('transaction_detail');
		// $this->db->join('status', 'transaction_detail.stats = status.id_status');
		// $this->db->join('transactions', 'transaction_detail.id_trans = transactions.id_trans');
		// $this->db->where('email_user',$email);
		// $this->db->group_by('transaction_detail.id_trans');
		// $this->db->order_by('transaction_detail.id_trans','DESC');

		// $query= $this->db->get();
		// return $query->result_array();
	}

	function get_itemStock($id, $size){
		$this->db->select('stock');
		$query = $this->db->get_where('item_stock', array('id_item_colored'=>$id, 'item_size'=>$size));
		return $query->row()->stock;
	}

	function decrease_itemCart($id, $size, $stock){
		$this->db->where("id_item_colored= $id AND item_size LIKE '$size' AND quantity >$stock");
		$this->db->set('quantity', $stock);
		$this->db->update('shopping_cart');
		
	}

	function add_shopping_cart($id,$email,$size,$qty){
		$data= array(
			'id_item_colored' => $id,
			'email_user' => $email,
			'quantity' => $qty,
			'item_size' => $size
		);

		$this->db->trans_begin();
		$this->db->insert('shopping_cart', $data);
		if ($this->db->trans_status() === FALSE)
			$this->db->trans_rollback();
		else
			$this->db->trans_commit();
	}

	function update_shopping_cart($id,$email,$size,$qty){
		$data= array(
			'id_item_colored' => $id,
			'email_user' => $email,
			'quantity' => $qty,
			'item_size' => $size
		);

		$this->db->trans_begin();
		$this->db->replace('shopping_cart', $data);
		if ($this->db->trans_status() === FALSE)
			$this->db->trans_rollback();
		else
			$this->db->trans_commit();
	}
}
?>
