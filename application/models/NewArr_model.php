<?php
class NewArr_model extends CI_Model{
	function get_items(){
		$query= $this->db->query("SELECT * FROM item_colored AS ic
		JOIN items AS i ON i.id_item= ic.id_item
		JOIN photos AS p ON p.id_item_colored= ic.id_item_colored
		JOIN item_stock AS ist ON ist.id_item_colored= ic.id_item_colored
		JOIN type AS t ON t.id_type= i.id_type
		WHERE ic.show = 1
		GROUP BY ic.id_item_colored
		ORDER BY ic.id_item_colored DESC
		LIMIT 4;");
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
		$this->db->group_by('shopping_cart.id_item_colored');

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
