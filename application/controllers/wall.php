<?php

class Wall extends CI_Controller
{

	public function main()
	{
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/main.css">',
			'scripts' => ' '
			);

		$this->load->view('headinfo', $data);
		$this->load->view('navbar');
		$this->load->view('wall');
		$this->load->view('bottom', $data);
		
	}




	public function load()
	{
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/main.css">',
			'scripts' => ' '
			);

		$this->load->view('headinfo', $data);
		$this->load->view('navbar');
		$this->load->view('wall');
		$this->load->view('bottom', $data);
	}
	

	public function add_post()
	{
		$data = array(
			'users_id' => $this->input->post('user_id'),
			'text' => $this->input->post('post-text'),
			);
		$post = $this->Post_model->log_post($data);	
		header('location: /nav/main');
	}

	public function display_post()
	{
		foreach ($post_data as $key) 
		{
			$message_data = array 
			(
			'author_name' => $key['first_name'] . " " . $key['last_name'],
			'message' => $key['message'],
			'created_at' => $key['created_at'],				
			'message_id' => $key['id'],
			);

		echo $message_data['message_id'];
		
		include('post_html_top.html');
		$comment_data = fetch_comment($message_data);
		insert_comment($comment_data);
		include('post_html_bottom.html');
		}
		// comment field
		// -> log post
		// echo post
		// pull comments 
		// foreach comment -> comment
	}



	






	public function Display_comment()
	{
		//echo comment
		//new comment field
		// -> log comment
	}
}