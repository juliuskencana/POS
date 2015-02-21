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
		$this->load->library('cart');
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
			$data['excel'] = $this->m_transaction->get_all();

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
			$data['excel'] = $this->m_transaction->get_all_list_search($g);

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('transactions/list');
			$this->load->view('_components/footer');
		}
	}

	public function details($transaction_id)
	{
		$data['transaction'] = $this->m_transaction->get_by('transaction_id', $transaction_id);
		// var_dump($data['transaction']);
		if ($data['transaction']->supplier_id != NULL) {
			$data['people'] = $this->m_people->get_by('suppliers', 'supplier_id', $data['transaction']->supplier_id);
		}elseif ($data['transaction']->customer_id != NULL) {
			$data['people'] = $this->m_people->get_by('customers', 'customer_id', $data['transaction']->customer_id);
		}
		// var_dump($data['people']);
		$data['records'] = $this->m_transaction->get_details_by('transaction_id', $transaction_id, 'where', 'result');

		$data['title'] = "Transaction Detail";
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('transactions/detail');
		$this->load->view('_components/footer');
	}

	public function invoice($transaction_id)
	{
		$data['transaction'] = $this->m_transaction->get_by('transaction_id', $transaction_id);
		if ($data['transaction']->supplier_id != NULL) {
			$data['people'] = $this->m_people->get_by('suppliers', 'supplier_id', $data['transaction']->supplier_id);
		}elseif ($data['transaction']->customer_id != NULL) {
			$data['people'] = $this->m_people->get_by('customers', 'customer_id', $data['transaction']->customer_id);
		}
		$data['records'] = $this->m_transaction->get_details_by('transaction_id', $transaction_id, 'where', 'result');

		$data['title'] = "Transaction Detail";
		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('transactions/invoice');
		$this->load->view('_components/footer');
	}

	public function cancel($transaction_id)
	{
		$this->load->model('m_stock');
		$transaction = $this->m_transaction->get_by('transaction_id', $transaction_id);
		$details = $this->m_transaction->get_details_by('transaction_id', $transaction_id, 'where', 'result');

		$this->m_transaction->cancel_transaction($transaction_id);
		if ($transaction->transaction_type == 1) {
			// sales
			foreach ($details as $detail) {
				$this->m_stock->update_plus($detail->quantity, $detail->item_id, $detail->unit_id);
			}
		}elseif ($transaction->transaction_type == 2) {
			// receivings
			foreach ($details as $detail) {
				$this->m_stock->update_min($detail->quantity, $detail->item_id, $detail->unit_id);
			}
		}

		$this->session->set_flashdata('success_cancel', 1);
		redirect(site_url('transactions/details/' . $transaction_id));
	}
}
