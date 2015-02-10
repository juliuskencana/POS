<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_admin');
    }

	public function index()
	{
		$data['title'] = "Settings";
		
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('settings');
		$this->load->view('_components/footer');
	}

	public function change_password()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('c_pass', 'Current Password', 'required');
		$this->form_validation->set_rules('n_pass', 'New Password', 'required|min_length[5]');
		$this->form_validation->set_rules('r_pass', 'Re-type New Password', 'required|matches[n_pass]');
		

		if ($this->form_validation->run() == FALSE) 
		{
			$data['title'] = "Settings";
			
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('settings');
			$this->load->view('_components/footer');
		}
		else
		{
			$error = FALSE;

			$user_data = $this->m_admin->get_by('admin_id', $this->session->userdata('admin_id'));
			// check password
			$check_password = password_verify($post['c_pass'], $user_data->password); // php 5.5+ !!!!!!

			if(!$check_password) {
				// if password hash contradicts
				$error = 'password_mismatch';
			}

			if(!$error) {
				$this->m_admin->update($user_data->admin_id, array('password' => password_hash($post['n_pass'], PASSWORD_BCRYPT)));
				$this->session->set_flashdata('change_password_success', 1);
				redirect(site_url('settings'));
			} else {
				$this->session->set_flashdata('change_password_error', $error);
				redirect(site_url('settings'));
			}
		}
	}
}