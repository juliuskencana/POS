<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

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
		$data['title'] = "List Customers";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'customers/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_people->count_get_list('customers');
			$this->pagination->initialize($config);

			$data['records'] = $this->m_people->get_list('customers', $this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('customers/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'customers/index';
			$config['suffix'] = '?name='.$g["name"];
			$config['first_url'] = site_url() . 'customers/index?name=' .$g["name"];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_people->count_get_list_search('customers', $g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_people->get_list_search('customers', $this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('customers/list');
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
			$data['title'] = "Add Customers";
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('customers/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_people->insert('customers', $p);

			$this->session->set_flashdata('success_insert', 1);
			redirect(site_url('customers/add'));
		}
	}

	public function edit($customer_id)
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|integer');
		$this->form_validation->set_rules('hp', 'Handphone', 'required|integer');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Customers";
			$data['records'] = $this->m_people->get_by('customers', 'customer_id', $customer_id);
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('customers/edit');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_people->edit('customers', 'customer_id', $p, $customer_id);

			$this->session->set_flashdata('success_edit', 1);
			redirect(site_url('customers'));
		}
	}

	public function delete($customer_id)
	{
		$this->m_people->delete('customers', 'customer_id', $customer_id);
		$this->session->set_flashdata('success_delete', 1);
		redirect(site_url('customers'));
	}
}
