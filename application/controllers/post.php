<?php

class Post extends CI_Controller
{
	// at load new 
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Dashboard_Model');
		// pull posts from DB
		// foreach post -> post
	}


	public function Display_post()
	{
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