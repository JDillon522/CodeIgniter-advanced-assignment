<?php

class Dashboard extends CI_Controller
{
	var $view_data;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Dashboard_model');
		$logged_in = $this->check_session();
		$this->view_data = $this->Dashboard_model->display_users();
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
			'title' => 'Dashboard',
			'addons' => '
			<link rel="stylesheet" type="text/css" href="../../assets/CSS/base.css">
			<link rel="stylesheet" type="text/css" href="../../assets/CSS/dashboard.css">',
			'view_data' => $this->view_data
			);
		$this->load->view('headinfo', $data);
		$this->load->view('navbar');
		$this->load->view('dashboard', $data);
		$this->load->view('bottom', $data);
	}




}