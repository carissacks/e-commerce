<?php
class Wishlist_model extends CI_Model{
	function get_user($email){
		$this->db->select('email_user, name, address');
		// $this->db->where('email_user',$email);
		$query= $this->db->get_where('ms_users',array('email_user'=> $email));

		// $query= $this->db->get_where(array('email_user'=> $email));
		return $query->row();
	}

	function get_itemWishlist($email){
		$this->db->select('*');
		$this->db->from('wishlist');
		$this->db->join('item_colored', 'item_colored.id_item_colored = wishlist.id_item_colored');
		$this->db->join('items', 'item_colored.id_item = items.id_item');
		$this->db->join('photos', 'item_colored.id_item_colored = photos.id_item_colored');
		$this->db->join('type', 'items.id_type = type.id_type');
		$this->db->where('email_user',$email);
		$this->db->group_by('wishlist.id_item_colored');
		// $this->db->group_by('wishlist.id_item_colored , wishlist.item_size');

		$query= $this->db->get();
		return $query;
		// return $query->result_array();
	}

	function add_itemWishlist($id, $size, $email){
		$data= array(
			'id_item_colored' => $id,
			'item_size' => $size,
			'email_user' => $email
		);
		$this->db->trans_begin();
		$this->db->insert('wishlist', $data);
		if ($this->db->trans_status() === FALSE)
			$this->db->trans_rollback();
		else
			$this->db->trans_commit();
	}

	function is_itemInWishlist($id,$email,$size=""){
		if($size==""){
			$data= array(
				'id_item_colored' => $id,
				'email_user' => $email
			);
		}else{
			$data= array(
				'id_item_colored' => $id,
				'email_user' => $email,
				'item_size' => $size
			);
		}
		$query= $this->db->get_where('wishlist',$data);
		return $query->row();
	}

	function get_totalWishlistData($email){
		$this->db->where('email_user', $email);
		$this->db->group_by('wishlist.id_item_colored');
		$query= $this->db->count_all_results('wishlist');
		return $query;
	}

	function remove_itemInWishlist($id, $email){
		$this->db->delete('wishlist', array('id_item_colored' => $id, 'email_user' => $email));
	}
}
?>
