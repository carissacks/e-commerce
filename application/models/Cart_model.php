<?php
class Cart_model extends CI_Model{
	function get_user($email){
		$this->db->select('email_user, name, address');
		// $this->db->where('email_user',$email);
		$query= $this->db->get_where('ms_users',array('email_user'=> $email));

		// $query= $this->db->get_where(array('email_user'=> $email));
		return $query->row();
	}

	function get_itemInCart($email){
		$this->db->select('*');
		$this->db->from('shopping_cart');
		$this->db->join('item_colored', 'item_colored.id_item_colored = shopping_cart.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('email_user',$email);
		$this->db->group_by('shopping_cart.id_item_colored');

		$query= $this->db->get();
		return $query;
		// return $query->result_array();
	}

	function remove_item($id, $email){
		$this->db->delete('shopping_cart', array('id_item_colored' => $id, 'email_user' => $email));
	}

	function get_totalCartData($email){
		$this->db->select_sum('quantity');
		$query= $this->db->get_where('shopping_cart',array('email_user'=>$email));
		return $query->row()->quantity;
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
			
		)
	}
}
?>
