<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_item');
    }

	public function index()
	{
		$data['title'] = "List Items";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'items/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_item->count_get_list();
			$this->pagination->initialize($config);

			$data['records'] = $this->m_item->get_list($this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('items/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'items/index';
			$config['suffix'] = '?name='.$g["name"];
			$config['first_url'] = site_url() . 'items/index?name=' .$g["name"];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_item->count_get_list_search($g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_item->get_list_search($this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('items/list');
			$this->load->view('_components/footer');
		}
	}

	public function add()
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Items";
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('items/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_item->insert($p);

			$this->session->set_flashdata('success_insert', 1);
			redirect(site_url('items/add'));
		}
	}

	public function edit($item_id)
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Items";
			$data['records'] = $this->m_item->get_by('item_id', $item_id);
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('items/edit');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_item->edit('item_id', $p, $item_id);

			$this->session->set_flashdata('success_edit', 1);
			redirect(site_url('items'));
		}
	}

	public function delete($item_id)
	{
		$this->m_item->delete('item_id', $item_id);
		$this->session->set_flashdata('success_delete', 1);
		redirect(site_url('items'));
	}
}
