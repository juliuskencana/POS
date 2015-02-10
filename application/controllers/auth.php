<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		$this->load->model('m_admin');
    }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(site_url('dashboard'));
		}
		$this->load->view('login');
	}

	/**
	 * LOGIN
	 *
	 * interface & processor
	 *
	 * This Function requires:
	 * - username
	 * - password
	 *
	 * <julius@wamplo.com>
	 *
	 **/
	public function login()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect(site_url('dashboard'));
		}
		$post = $this->input->post();

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('login');
		}
		else
		{
			$error = FALSE;
			$user_data = $this->m_admin->get_by('username', $post['username']);
			if(!empty($user_data)) {
				// if is_active
				if($user_data->is_active == 0) {
					// error user not active
					$error = 'not_active';
				}

				// check password
				$check_password = password_verify($post['password'], $user_data->password); // php 5.5+ !!!!!!

				if(!$check_password) {
					// if password hash contradicts
					$error = 'password_mismatch';
				}
			} else {
				// error id not found
				$error = 'not_found';
			}

			if(!$error) {
				$t = array(
					'admin_id'   => $user_data->admin_id,
					'username'  => $user_data->username,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($t);

				redirect(site_url('dashboard'));
			} else {
				$this->session->set_flashdata('login_error', $error);
				redirect(site_url('auth'));
			}
		}
	}

	/**
	 * LOGOUT
	 *
	 * This Function requires:
	 * - none
	 *
	 * <julius@wamplo.com>
	 *
	 **/
	public function logout() {

		$this->session->sess_destroy();

		redirect(site_url('auth'), 'refresh');
	}

}

		