<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Mlogin extends CI_Model {

	
	// Read data using username and password
	public function login($username) {

	
	$query = $this->db->select('*')
		->where('username like binary "'.$username.'"', NULL, FALSE)
		->get('login');

	if ($query->num_rows() == 1) {
	return $query->row();
	} else {
	return false;
	}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}


}


?>