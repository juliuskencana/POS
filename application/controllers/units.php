<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Units extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_unit');
    }

	public function index()
	{
		$data['title'] = "List Units";

		if (!$this->input->get()) {
			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'units/index';
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_unit->count_get_list();
			$this->pagination->initialize($config);

			$data['records'] = $this->m_unit->get_list($this->uri->segment(3), $config['per_page']);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('units/list');
			$this->load->view('_components/footer');
		}else{
			$g = $this->input->get();

			// @pagination 
			$this->load->library('pagination');
			$config['base_url'] = site_url() . 'units/index';
			$config['suffix'] = '?name='.$g["name"];
			$config['first_url'] = site_url() . 'units/index?name=' .$g["name"];
			$config['uri_segment'] = 3;
			$config['per_page'] = 10;
			$config['num_links'] = 10;

			$config['total_rows'] = $this->m_unit->count_get_list_search($g);
			$this->pagination->initialize($config);

			$data['records'] = $this->m_unit->get_list_search($this->uri->segment(3), $config['per_page'], $g);

			$data['pagination'] = $this->pagination->create_links();

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('units/list');
			$this->load->view('_components/footer');
		}
	}

	public function add()
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Units";
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('units/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_unit->insert($p);

			$this->session->set_flashdata('success_insert', 1);
			redirect(site_url('units/add'));
		}
	}

	public function edit($unit_id)
	{
		// @todo validation rules
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add units";
			$data['records'] = $this->m_unit->get_by('unit_id', $unit_id);
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('units/edit');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$this->m_unit->edit('unit_id', $p, $unit_id);

			$this->session->set_flashdata('success_edit', 1);
			redirect(site_url('units'));
		}
	}

	public function delete($unit_id)
	{
		$this->m_unit->delete('unit_id', $unit_id);
		$this->session->set_flashdata('success_delete', 1);
		redirect(site_url('units'));
	}
}
