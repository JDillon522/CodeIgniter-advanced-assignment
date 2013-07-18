<?php

class User extends CI_Controller
{
	//initalization
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
	}	

	public function login()
	{	
		$this->load->view('index');
	}
	
	public function process_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password0', 'Password', 'min_length[6]|required');
		if ($this->form_validation->run() == FALSE) 
		{
			echo validation_errors();
		}
		else
		{
			$this->load->library('encrypt');

			$data = array();
			$data['email'] = $this->input->post('email');
			$decrypt_password = $this->encrypt->decode($this->input->post('password0'));
			$data['password'] = $decrypt_password;
			$user = $this->User_model->get_user($data);
			$this->session->set_userdata('user_session', $user);
			redirect(base_url('/user/profile'));
		}
	}

	public function process_registration()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', "First Name", 'alpha|required');
		$this->form_validation->set_rules('last_name', "Last Name", 'alpha|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password2', 'Password', 'password2[password1]');
		$this->form_validation->set_rules('password1', 'Password', 'min_length[6]|required');

		if ($this->form_validation->run() == FALSE) 
		{
			$errors = "<div class='alert alert-error alert-block' id='error-box'>" . validation_errors() . "</div>";

			echo json_encode($errors);
		}
		else
		{
			$this->load->library('encrypt');
			$encrypted_password = $this->encrypt->encode($this->input->post('password1'));
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'password' => $encrypted_password
				);
			$user = $this->User_model->register_user($data);
			$success = "<div class='alert alert-success alert-block' id='success-box'><p>Thank you for submitting your data. You may now log in.</p></div>";
				echo json_encode($success);
		}
	}
}
