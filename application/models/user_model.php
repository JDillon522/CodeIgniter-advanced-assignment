<?php

class User_model extends CI_Model
{
	public function get_user($data)
	{
		return $this->db
					->where('email', $data['email'])
					->select('first_name, last_name, email, password, id')
					->get('users')
					->row();
	}

	public function register_user($user)
	{
		return $this->db->insert("users", $user);
	}


}

//end of class User