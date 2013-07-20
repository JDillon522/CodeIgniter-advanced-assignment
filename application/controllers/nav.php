<?php

class Nav extends CI_Controller
{
	// public function welcome()
	// {
	// 	$data = array(
	// 		'title' => 'Binaric Aspirations',
	// 		'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/index.css">',
	// 		'scripts' => ' '
	// 		);

	// 	$this->load->view('headinfo', $data);
	// 	$this->load->view('index.php');
	// 	$this->load->view('bottom', $data);
	// }

	public function main()
	{
		// $data = array(
	// 		'title' => 'Binaric Aspirations',
	// 		'addons' => '<link rel="stylesheet" type="text/css" href="../../assets/CSS/index.css">',
	// 		'scripts' => ' '
	// 		);

	// 	$this->load->view('headinfo', $data);
	// 	$this->load->view('index.php');
	// 	$this->load->view('bottom', $data);
		$this->load->view('main');
	}
}