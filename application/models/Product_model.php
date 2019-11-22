<?php
class Product_model extends CI_Model{
	function get_items(){
		// $query= $this->db->query("SELECT * FROM item_colored AS ic
		// JOIN items AS i ON i.id_item= ic.id_item
		// JOIN photos AS p ON p.id_item_colored= ic.id_item_colored
		// JOIN item_stock AS ist ON ist.id_item_colored= ic.id_item_colored
		// JOIN type AS t ON t.id_type= i.id_type
		// GROUP BY ic.id_item_colored;");

		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		// $this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_types(){
		$query= $this->db->get('type');
		return $query->result_array();
	}

	function get_item_pagination($limit, $start){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->group_by('item_colored.id_item_colored');
	$query= $this->db->query("SELECT * FROM item_colored AS ic
	JOIN items AS i ON i.id_item= ic.id_item
	JOIN photos AS p ON p.id_item_colored= ic.id_item_colored
	JOIN item_stock AS ist ON ist.id_item_colored= ic.id_item_colored
	JOIN type AS t ON t.id_type= i.id_type
	GROUP BY ic.id_item_colored
	LIMIT $limit OFFSET $start; ");
		return $query->result_array();
	}

	// SELECT ic.id_item_colored, p.item_photo, i.id_item, ic.item_color, i.item_name, i.item_desc, i.weight, i.selling_price, i.buying_price, i.care_ins FROM item_colored AS ic
	// JOIN items AS i ON i.id_item= ic.id_item
	// JOIN photos AS p ON p.id_item_colored= ic.id_item_colored
	// JOIN item_stock AS ist ON ist.id_item_colored= ic.id_item_colored
	// JOIN type AS t ON t.id_type= i.id_type
	// WHERE ic.id_item_colored= 1
	// GROUP BY ic.id_item_colored;

	function get_item($id){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		// $this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		// $this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_colored.id_item_colored',$id);
		// $this->db->group_by('item_colored.id_item_colored');


		$query= $this->db->get();
		return $query->result_array();
	}

	function get_photo($id){
		$query= $this->db->get_where('photos', array('id_item_colored' => $id));
		return $query->result_array();
	}

	function get_stock($id){
		$query= $this->db->get_where('item_stock', array('id_item_colored' => $id));
		return $query->result_array();
	}

	function get_related(){}

	function total_data(){
		return $this->db->get('item_colored')->num_rows();
	}

	function get_item_type($type){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		// $this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('type.type_desc',$type);
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->result_array();
	}
}
?>
