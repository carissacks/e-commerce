<?php
class NewArr_model extends CI_Model{
	function get_items(){
		$query= $this->db->query("SELECT * FROM item_colored AS ic
		JOIN items AS i ON i.id_item= ic.id_item
		JOIN photos AS p ON p.id_item_colored= ic.id_item_colored
		JOIN item_stock AS ist ON ist.id_item_colored= ic.id_item_colored
		JOIN type AS t ON t.id_type= i.id_type
		GROUP BY ic.id_item_colored
		ORDER BY ic.id_item_colored DESC
		LIMIT 4;");
		return $query->result_array();
	}

	function get_types(){
		$query= $this->db->query("SELECT * FROM type");
		return $query->result_array();
	}
}
?>
