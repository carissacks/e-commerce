<?php
class NewArr_model extends CI_Model{
	function get_items(){
		$this->db->select('*');
		$this->db->from('items');
		$this->db->join('item_colored', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_colored.show',1);
		$this->db->group_by('item_colored.id_item_colored');
		$this->db->order_by('item_colored.id_item_colored', 'desc');
		$this->db->limit(4);

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_types(){
		$query= $this->db->query("SELECT * FROM type");
		return $query->result_array();
	}

	function get_itemInCart($email){
		$this->db->select('*');
		$this->db->from('shopping_cart');
		$this->db->join('item_colored', 'item_colored.id_item_colored = shopping_cart.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('email_user',$email);
		$this->db->group_by('shopping_cart.id_item_colored , shopping_cart.item_size');

		$query= $this->db->get();
		// return $query;
		return $query->result_array();
	}

	function get_totalCartData($email){
		$this->db->select_sum('quantity');
		$query= $this->db->get_where('shopping_cart',array('email_user'=>$email));
		if($query->row()->quantity)
			return $query->row()->quantity;
		else return 0;
	}
}
?>
