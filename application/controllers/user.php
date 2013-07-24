<?php

class User extends CI_Controller
{
	//initalization
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('User_model');
	}	
	
	public function process_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password0', 'Password', 'min_length[6]|required');
		if ($this->form_validation->run() == FALSE) 
		{
			$errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";

			echo json_encode($errors);
		}
		else
		{
			$this->load->library('encrypt');
			
			$data = array();
			$data['email'] = $this->input->post('email');
			
			$user = $this->User_model->get_user($data);
		
			$decrypted_password = $this->encrypt->decode($user->password);

			if (count($user) > 0 AND $decrypted_password == $this->input->post('password0')) 
			{
				$this->session->set_userdata('user_session', $user);
				echo json_encode("success");
			}
			else
			{
				$errors = "<div class='alert-box alert' id='error-box'><p>Your login information did not match our reccords. Try again</p></div>";

			echo json_encode($errors);
			}		
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
			$errors = "<div class='alert-box alert' id='error-box'>" . validation_errors() . "</div>";
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
			$success = "<div class='alert-box success' id='success-box'><p>Thank you for submitting your data. You may now log in.</p></div>";
				echo json_encode($success);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('location: /welcome/index');
	}

}
