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



	public function delete_user($input)
	{
		return $this->db->delete('users', array('id' => $input));			
	}

	public function delete_user_post($input)
	{
		return $this->db->delete('posts', array('posts.users_id' => $input));		
	}

	public function delete_user_comment($input)
	{
		return $this->db->delete('comments', array('comments.users_id' => $input));
	}

	public function display_users()
	{
		$result = $this->db->get('users');
		return $result->result_array();
	}

	public function wall_user_info($uri)
	{
		$result = $this->db->get_where('users', array('id' => $uri));
		return $result->result_array();
	}
	
	public function edit_user()
	{
		return $this->db->get('users');
	}

}

//end of class User