<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		
		if ($this->session->userdata('logged_in') != TRUE) {
			redirect(site_url());
		}
		$this->load->model('m_item');
		$this->load->model('m_unit');
		$this->load->model('m_people');
		$this->load->model('m_transaction');
		$this->load->model('m_stock');
    }

	public function index()
	{
		$this->load->library('cart');
		$data['title'] = "List Sales";

		$this->form_validation->set_rules('item_name', 'Item name', 'required');
		$this->form_validation->set_rules('unit_name', 'Unit', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['items'] = $this->m_item->get_all();
			$data['units'] = $this->m_unit->get_all();
			$data['customer'] = $this->m_people->get_all('customers');

			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('sales/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			$stock = $this->m_stock->get_by($p['item_name'], $p['unit_name']);

			if ($stock) { 
				if ($stock->profit != 0) {
					if ($stock->stock >= $p['qty']) {
						$profit = $stock->capital_price + (round($stock->capital_price * ($stock->profit/100)));

						$data = array(
			               'id'      => strtotime(date('d M Y His')),
			               'name'    => $p['item_name'],
			               'qty'     => $p['qty'],
			               'price'   => $profit,
			               'options' => array(
			                                'unit_name' => $p['unit_name']
			                                )
			            );
						$this->cart->insert($data);
						redirect(site_url('sales'));
					}else{
						$this->session->set_flashdata('error_stock_not_enough', 1);
						redirect(site_url('sales'));
					}
				}else{
					$this->session->set_flashdata('error_profit_not_set', 1);
					redirect(site_url('sales'));
				}
			}else{
				$this->session->set_flashdata('error_not_set_stock', 1);
				redirect(site_url('sales'));
			}
           
		}
	}
	
	public function invoice()
	{
        $this->load->library('cart');
		$data['title'] = "Add Sales";
		$data['people'] = $this->m_people->get_by('customers', 'customer_id', $this->session->userdata('customer_id'));

		$this->load->view('_components/header', $data);
		$this->load->view('_components/menu_top');
		$this->load->view('sales/invoice');
		$this->load->view('_components/footer');
	}

	public function submit_invoice(){
        $this->load->library('cart');
		$p['customer_id'] = $this->session->userdata('customer_id');
		$transaction_id = $this->m_transaction->insert($p, 1);

		foreach ($this->cart->contents() as $record) {
			$stock = $this->m_stock->get_by($record['name'], $record['options']['unit_name']);
			$record['sell_price'] = $record['price'];
			$record['price'] = $stock->capital_price;
			$this->m_transaction->insert_details($record, $transaction_id);

			// update stock
			$this->m_stock->update_min($record['qty'], $record['name'], $record['options']['unit_name']);
		}

		$this->cart->destroy();
		$this->session->unset_userdata('customer_id');
		$this->session->set_flashdata('success_sales', 1);
		redirect(site_url('sales'));
	}

	public function clear_cart()
	{
        $this->load->library('cart');
		$this->cart->destroy();
		redirect(site_url('sales'));
	}

	public function add_cart()
	{
        $this->load->library('cart');
		$this->form_validation->set_rules('customer_id', 'Customer Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_add', 1);
			redirect(site_url('sales'));
		} else {
			if (empty($this->cart->contents())) {
				$this->session->set_flashdata('error_empty_cart', 1);
				redirect(site_url('sales'));
			}else{
				$p = $this->input->post();
				$t = array(
					'customer_id'   => $p['customer_id']
				);

				$this->session->set_userdata($t);
				redirect(site_url('sales/invoice'));
			}
		}
	}
}
