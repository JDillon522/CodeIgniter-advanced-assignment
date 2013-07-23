<?php

class Wall extends CI_Controller
{
	var $posts;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Post_model');
		$posts = $this->display_post();
	}

	public function index()
	{	
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/main.css">',
			'scripts' => ' ',
			'posts' => $posts
			);

		$this->load->view('headinfo', $data);
		$this->load->view('navbar');
		$this->load->view('wall', $posts);
		$this->load->view('bottom', $data);
		
	}

	
	public function add_post()
	{
		$data = array(
			'users_id' => $this->input->post('user_id'),
			'text' => $this->input->post('post-text'),
			);
		$post = $this->Post_model->log_post($data);	
		header('location: /wall/index');
	}

	public function display_post()
	{
		$posts = $this->Post_model->pull_post();
		
		foreach ($posts as $key) 
		{
			$message_data = array(
			'author_name' => $key['first_name'] . " " . $key['last_name'],
			'text' => $key['text'],
			'created_at' => $key['created_at'],				
			'message_id' => $key['id'],
			);

		// echo $message_data['message_id'];
		$this->load->view('posts/post_html_top.html', $message_data);
		// $comment_data = fetch_comment($message_data);
		// insert_comment($comment_data);
		$this->load->view('posts/post_html_bottom.html');
		}
	}



	






	public function Display_comment()
	{
		//echo comment
		//new comment field
		// -> log comment
	}
}