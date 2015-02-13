<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stocks extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_item');
		$this->load->model('m_unit');
		$this->load->model('m_stock');
		$this->load->library('cart');
    }

	public function index()
	{
		$data['title'] = "List Stocks";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'stocks/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_stock->count_get_list();
			$this->pagination->initialize($config);

			$data['records'] = $this->m_stock->get_list($this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			
			$data['items'] = $this->m_item->get_all();
			$data['units'] = $this->m_unit->get_all();
			
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('stocks/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'stocks/index';
			$config['suffix'] = '?item_id='.$g["item_id"].'&unit_id='.$g['unit_id'];
			$config['first_url'] = site_url() . 'stocks/index?item_id='.$g["item_id"].'&unit_id='.$g['unit_id'];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_stock->count_get_list_search($g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_stock->get_list_search($this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$data['items'] = $this->m_item->get_all();
			$data['units'] = $this->m_unit->get_all();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('stocks/list');
			$this->load->view('_components/footer');
		}
	}

	public function setting_profit()
	{
		$p = $this->input->post();
		$profit = rtrim($p['profit'], "%");
		$this->m_stock->setting_profit($profit, $p['item_id'], $p['unit_id']);

		$this->session->set_flashdata('success_setting', 1);
		redirect(site_url('stocks'));
	}
}