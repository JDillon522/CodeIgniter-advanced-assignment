<?php

class Wall extends CI_Controller
{
	var $view_data;
	var $comment_data;
	var $wall_id;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
		$this->load->model('Post_model');
		$this->load->model('Comment_model');

		$this->wall_id = $this->uri->segment(3);
		// echo $this->wall_id;
		$this->view_data = $this->display_post($this->wall_id);

		$logged_in = $this->check_session();
		$this->output->enable_profiler(TRUE);
	}

	private function check_session()
	{
		if ($this->session->userdata('user_session') == '') 
		{
			header('location: /welcome/index');
		}
	}

	public function index()
	{	
		$data = array(
			'title' => 'Main',
			'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/wall.css">
			<link rel="stylesheet" type="text/css" href="../../assets/CSS/base.css">',
			'scripts' => ' ',
			'posts' => $this->view_data,
			);

		$this->load->view('headinfo', $data);
		if ($this->admin()) 
		{
			$this->user_data = $this->User_model->display_users();
			$data['user_data'] = $this->user_data;
			$this->load->view('navbar_admin', $data);
		}
		else
		{
			$this->load->view('navbar');
		}
		$this->load->view('wall');
		$this->load->view('bottom', $data);
		
	}

	public function admin()
	{
		$temp_session = $this->session->userdata('user_session');
		if ($temp_session->id == 1) 
		{
			return TRUE; 
		}
		else
		{
			return FALSE;
		}
	}

	public function add_post()
	{
		$data = array(
			'users_id' => $this->input->post('user_id'),
			'text' => $this->input->post('post-text'),
			'receiver_id' => $this->input->post('receiver_id')
			);
		$post = $this->Post_model->log_post($data);	
		echo json_encode('TRUE');
	}


	public function display_post($wall_id)
	{
		$content = $this->Post_model->pull_post($wall_id);
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