<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
    }

	public function index()
	{
		$data['title'] = "List Sales";
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('sales/add');
		$this->load->view('_components/footer');
	}
	
	public function invoice()
	{
		$data['title'] = "Add Sales";
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('sales/invoice');
		$this->load->view('_components/footer');
	}
}
