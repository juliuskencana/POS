<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_transaction');
		$this->load->model('m_people');
    }

	public function index()
	{
		$data['title'] = "List Transactions";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'transactions/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_transaction->count_get_list();
			$this->pagination->initialize($config);

			$data['records'] = $this->m_transaction->get_list($this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('transactions/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'transactions/index';
			$config['suffix'] = '?type='.$g["type"].'&from='.$g['from'].'&to='.$g['to'];
			$config['first_url'] = site_url() . 'transactions/index?type='.$g["type"].'&from='.$g['from'].'&to='.$g['to'];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;
			$config['total_rows'] = $this->m_transaction->count_get_list_search($g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_transaction->get_list_search($this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('transactions/list');
			$this->load->view('_components/footer');
		}
	}
}
