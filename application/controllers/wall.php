<?php

class Wall extends CI_Controller
{
	var $view_data;
	var $comment_data;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Post_model');
		$this->load->model('Comment_model');
		$this->view_data = $this->display_post();
	}

	public function index()
	{	
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/wall.css">',
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
		$html_posts = NULL;
		foreach ($content as $key) 
		{
			$message_data[] = array(
			'author_name' => $key['first_name'] . " " . $key['last_name'],
			'text' => $key['text'],
			'created_at' => $key['created_at'],		
			'post_id' => $key['id'],
			'user_id' => $key['user_id'],
			);

			$html_posts .= "
			<div class='row post-content'>
				<div class='large-12 columns'>
					<br />
					<blockquote class='post'>
						<p>" . $message_data[0]["text"] . "</p>" 
							. $message_data[0]['author_name'] . " : " . $message_data[0]['created_at'] . "
					</blockquote>";

			$html_comments = $this->comment_data = $this->display_comment($message_data);
			$html_posts .= $html_comments;
					$html_posts .= "<br />

					<!-- Comment Form -->
					<form method='post' action='../wall/add_comment'>
					    <legend><h4>Comment</h4></legend>					    
					    <input type='hidden' name='post_id' value=" . $message_data[0]['post_id'] . ">
						<textarea row='2' placeholder='Respond...'' name='comment_text' id='comment_text'></textarea>
						<button type='submit' id='comment_btn class='button pretfix'>Submit</button>
					</form>
				</div>
			</div>";
			$message_data = array();		
			}
		return $html_posts;
	}

	public function add_comment()
		{
			
			$temp_session = $this->session->userdata('user_session');
			$data = array(
				'users_id' => $temp_session->id,
				'comments_id' => $this->input->post('post_id'),
				'text' => $this->input->post('comment_text'),
				);
			$post = $this->Comment_model->log_comment($data);
			header('location: /wall/index');
		}

	public function display_comment($message_data)
	{
		$content = $this->Comment_model->pull_comment($message_data);

		$html_comments = NULL;
		foreach ($content as $key) 
		{
			$comment_data[] = array(
			'author_name' => $key['first_name'] . " " . $key['last_name'],
			'text' => $key['text'],
			'created_at' => $key['created_at'],		
			'post_id' => $key['comments_id'],
			'user_id' => $key['id'],
			);

			$html_comments .= "
			<blockquote class='comment'>
		 		<p>" . $comment_data[0]['text'] . "</p>
				" . $comment_data[0]['author_name'] . " " . $comment_data[0]['created_at'] . "
			</blockquote>
			<br />";
			$comment_data = array();
		}
		return $html_comments;
	}
}