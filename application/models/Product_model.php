<?php
class Product_model extends CI_Model{
	function get_new_items(){
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
		$query= $this->db->get('type');
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

	function get_related($id){
		$this->db->select('id_type');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->where('id_item_colored',$id);
		$where_clause= $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where("items.id_type = ($where_clause)");
		$this->db->where("show",1);
		$this->db->where("item_colored.id_item_colored !=",$id);
		$this->db->group_by('item_colored.id_item_colored');

		$this->db->limit(4);
		$query= $this->db->get();
		return $query->result_array();
	}

	function get_other_color($id){

		$this->db->select('id_item');
		$this->db->from('item_colored');
		$this->db->where('id_item_colored',$id);
		$where_clause= $this->db->get_compiled_select();

		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->where("id_item = ($where_clause) AND id_item_colored != $id AND show = 1");

		$query= $this->db->get();
		return $query->result_array();
	}

	function get_items_pagination($limit, $start){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where("show",1);
		$this->db->group_by('item_colored.id_item_colored');
		$this->db->limit($limit, $start);
		$query= $this->db->get();

		return $query->result_array();
	}

	function get_item_detail($id){
		$this->db->select('*');
		$this->db->from('items');
		$this->db->join('item_colored', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('item_colored.id_item_colored',$id);
		$this->db->group_by('item_colored.id_item_colored');

		$query= $this->db->get();
		return $query->row();
	}

	function total_data($type='none'){
		if($type=='none') {
			// $this->db->where("show",1);
			return $this->db->get_where('item_colored', array('show' => 1))->num_rows();
		}
		else {
			$this->db->select('*');
			$this->db->from('item_colored');
			$this->db->join('items', 'item_colored.id_item = items.id_item');
			$this->db->join('type', 'items.id_type = type.id_type');
			$this->db->where('type.type_desc', $type);
			$this->db->where("show",1);

			return $this->db->get()->num_rows();
		}
	}

	// function get_item_type($type){
	// 	$this->db->select('*');
	// 	$this->db->from('item_colored');
	// 	$this->db->join('items', 'item_colored.id_item = items.id_item');
	// 	$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
	// 	$this->db->join('type', 'items.id_type = type.id_type');

	// 	// $this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
	// 	$this->db->where('type.type_desc', $type);
	// 	$this->db->where("show",1);
	// 	$this->db->group_by('item_colored.id_item_colored');

	// 	$query= $this->db->get();
	// 	return $query->result_array();
	// }

	function get_item_type_pagination($type, $limit, $start){
		$this->db->select('*');
		$this->db->from('item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');

		// $this->db->join('item_stock', 'item_colored.id_item_colored = item_stock.id_item_colored');
		$this->db->where('type.type_desc', $type);
		$this->db->where("show",1);
		$this->db->group_by('item_colored.id_item_colored');

		$this->db->limit($limit, $start);
		$query= $this->db->get();
		return $query->result_array();
	}
}
?>
