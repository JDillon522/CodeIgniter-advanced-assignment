<?php

class Nav extends CI_Controller
{
	public function login()
	{	
		$this->load->view('login2');
	}

	public function main()
	{
		$this->load->view('main');
	}
}