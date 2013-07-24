<?php

class Dashboard_model extends CI_Model
{
	public function display_users()
	{
		$result = $this->db->get('users');
		return $result->result_array();
	}

}