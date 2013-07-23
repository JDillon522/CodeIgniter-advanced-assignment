<?php

class Post_model extends CI_Model
{
	public function log_post($data)
	{
		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('edited_at', 'NOW()', FALSE);

		return $this->db->insert('posts', $data);
	}

	public function log_comment($comment_data)
	{
		// log comment data
	}

	public function pull_post()
	{
		$result = $this->db
		    	->select('*')
		    	->from('posts')
				->join('users', 'users.id = posts.users_id')
				->get();
		return $result->result_array();
	}

	public function Pull_comment()
	{
		//pull comments from DB
	}
}


