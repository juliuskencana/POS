<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
    }

	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('dashboard');
		$this->load->view('_components/footer');
	}
}
