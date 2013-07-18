<?php

class User_model extends CI_Model
{
	public function get_user($data)
	{
		return $this->db
					->where('email', $data['email'])
					->where('password', $data['password'])
					->get('users')
					->row();

		// $user_data = $this->db->query("SELECT *
		// 						 FROM users
		// 						 WHERE email = '{$data['email']}'
		// 						 AND password = '{$data['password']}'")
		// 						 ->row();
		// return $user_data;
	}

	public function register_user($user)
	{
		return $this->db->insert("users", $user);
	}


}

//end of class User