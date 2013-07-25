<?php

class Post_model extends CI_Model
{
	public function log_post($data)
	{
		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('edited_at', 'NOW()', FALSE);

		return $this->db->insert('posts', $data);
	}


	public function pull_post($wall_id)
	{
		$result = $this->db
		    	->select('users.id as user_id, users.first_name, users.last_name, posts.text, posts.created_at, posts.id')
		    	->where('posts.receiver_id', $wall_id)
		    	->from('posts')
				->join('users', 'users.id = posts.users_id')
				->order_by('posts.id', 'desc')
				->get();

		return $result->result_array();
	}

}


