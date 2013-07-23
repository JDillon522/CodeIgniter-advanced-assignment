<?php
	class Comment_model extends CI_Model
	{
		public function log_comment($comment_data)
		{
			$this->db->set('created_at', 'NOW()', FALSE);
			$this->db->set('edited_at', 'NOW()', FALSE);
			return $this->db->insert('comments', $comment_data);
		}


		public function pull_comment($message_data)
		{	
			$result = $this->db
			    	->select('comments.id, comments.text, comments.created_at, comments.edited_at, users.first_name, users.last_name, users.id, comments.comments_id')
			    	->from('comments')
					->join('posts', 'posts.id = comments.comments_id')
					->join('users', 'users.id = posts.users_id')
					->where('posts.id', $message_data[0]['post_id'])
					->get();
			return $result->result_array();
		}
	}

