<?php

class Wall extends CI_Controller
{
	var $view_data;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Post_model');
		$this->view_data = $this->display_post();
	}

	public function index()
	{	
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/main.css">',
			'scripts' => ' ',
			'posts' => $this->view_data
			);

		$this->load->view('headinfo', $data);
		$this->load->view('navbar');
		$this->load->view('wall', $data);
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
		$content = $this->Post_model->pull_post();
		$html = NULL;
		foreach ($content as $key) 
		{
			$message_data[] = array(
			'author_name' => $key['first_name'] . " " . $key['last_name'],
			'text' => $key['text'],
			'created_at' => $key['created_at'],				
			'id' => $key['id'],
			);
		$html .= "
			<div class='row'>
				<div class='large-12 columns'>
					<br />
					<blockquote>
						<p>" . $message_data[0]["text"] . "</p>
						<small>" 
							. $message_data[0]['author_name'] . " : " . $message_data[0]['created_at'] . "
						</small>
					</blockquote>
					<br />
				</div>
			</div>";
		$message_data = array();
		
		// echo $message_data['id'];
		
		// $this->load->view('/posts/post_html_top.php', $message_data);
		
		// $comment_data = fetch_comment($message_data);
		// insert_comment($comment_data);
		// $this->load->view('/posts/post_html_bottom.php');

		// $message_data = array();	
		}
		return $html;
	}


	public function Display_comment()
	{
		//echo comment
		//new comment field
		// -> log comment
	}
}