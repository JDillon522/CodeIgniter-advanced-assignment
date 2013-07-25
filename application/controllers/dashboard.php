<?php

class Dashboard extends CI_Controller
{
	var $view_data;

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
		$logged_in = $this->check_session();
		$this->user_data = $this->User_model->display_users();
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
			'user_data' => $this->user_data
			);

		$this->load->view('headinfo', $data);
		if ($this->admin()) 
		{
			$this->load->view('navbar_admin', $data);
		}
		else
		{
			$this->load->view('navbar', $data);
		}
		$this->load->view('dashboard', $data);
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


}