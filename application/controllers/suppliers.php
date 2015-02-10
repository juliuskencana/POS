<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_people');
    }

	public function index()
	{
		$data['title'] = "List Suppliers";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'suppliers/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_people->count_get_list('suppliers');
			$this->pagination->initialize($config);

			$data['records'] = $this->m_people->get_list('suppliers', $this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('suppliers/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'suppliers/index';
			$config['suffix'] = '?name='.$g["name"];
			$config['first_url'] = site_url() . 'suppliers/index?name=' .$g["name"];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_people->count_get_list_search('suppliers', $g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_people->get_list_search('suppliers', $this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('suppliers/list');
			$this->load->view('_components/footer');
		}
	}

	public function add()
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|integer');
		$this->form_validation->set_rules('hp', 'Handphone', 'required|integer');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Suppliers";
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('suppliers/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_people->insert('suppliers', $p);

			$this->session->set_flashdata('success_insert', 1);
			redirect(site_url('suppliers/add'));
		}
	}

	public function edit($supplier_id)
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|integer');
		$this->form_validation->set_rules('hp', 'Handphone', 'required|integer');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Suppliers";
			$data['records'] = $this->m_people->get_by('suppliers', 'supplier_id', $supplier_id);
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('suppliers/edit');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_people->edit('suppliers', 'supplier_id', $p, $supplier_id);

			$this->session->set_flashdata('success_edit', 1);
			redirect(site_url('suppliers'));
		}
	}

	public function delete($supplier_id)
	{
		$this->m_people->delete('suppliers', 'supplier_id', $supplier_id);
		$this->session->set_flashdata('success_delete', 1);
		redirect(site_url('suppliers'));
	}
}
