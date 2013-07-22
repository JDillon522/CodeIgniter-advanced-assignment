<?php

class Post_model extends CI_Controller
{
	public function log_post($data)
	{
		$this->db->set('created_at', 'NOW()', FALSE);
		$this->db->set('edited_at', 'NOW()', FALSE);

		return $this->db->insert('posts', $data);
		// text
		// created at
		// updated at
		// user id
	}

	public function pog_comment($comment_data)
	{
		// log comment data
	}

	public function pull_post()
	{
		$message_data = $this->db
					    	 ->get('posts, users')
							 ->join('users', 'users.id = posts.users_id'),
							 ->row();

		echo $message_data;
		die();

		// $query = "SELECT message, first_name, last_name, messages.created_at, messages.id
		// 		FROM messages
		// 		JOIN users
		// 		ON users.id = messages.users_id
		// 		ORDER BY created_at DESC";
		// $post_data = fetch_all($query);
		// return $post_data;
	}

	public function Pull_comment()
	{
		//pull comments from DB
	}
}


