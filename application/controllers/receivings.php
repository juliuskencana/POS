<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Receivings extends CI_Controller {

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
		$this->form_validation->set_rules('item_name', 'Item name', 'required');
		$this->form_validation->set_rules('unit_name', 'Unit', 'required');
		$this->form_validation->set_rules('cost', 'Cost', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Add Receivings";
			$data['items'] = $this->m_item->get_all();
			$data['units'] = $this->m_unit->get_all();
			$data['suppliers'] = $this->m_people->get_all('suppliers');
			$this->load->view('_components/header', $data);
			$this->load->view('_components/menu_top');
			$this->load->view('receivings/add');
			$this->load->view('_components/footer');
		} else {
			$p = $this->input->post();
			
            $data = array(
               'id'      => strtotime(date('d M Y His')),
               'name'    => $p['item_name'],
               'qty'     => $p['qty'],
               'price'   => $p['cost'],
               'options' => array(
                                'unit_name' => $p['unit_name']
                                )
            );

			$this->cart->insert($data);
			redirect(site_url('receivings'));
		}
	}

	public function add_cart()
	{
        $this->load->library('cart');
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_add', 1);
			redirect(site_url('receivings'));
		} else {
			if (empty($this->cart->contents())) {
				$this->session->set_flashdata('error_empty_cart', 1);
				redirect(site_url('receivings'));
			}else{
				$p = $this->input->post();
				$transaction_id = $this->m_transaction->insert($p, 2);

				foreach ($this->cart->contents() as $record) {
					$this->m_transaction->insert_details($record, $transaction_id);

					// check stock
					$check_stock = $this->m_stock->get_by($record['name'], $record['options']['unit_name']);
					if ($check_stock) {
						// update stock

						$record['price_rata2'] = ( ( $check_stock->capital_price * $check_stock->stock ) + ( $record['price'] * $record['qty'] ) ) / ( $check_stock->stock + $record['qty'] );
						$this->m_stock->update($record, $record['name'], $record['options']['unit_name']);
					}else{
						// insert stock
						$this->m_stock->insert($record);
					}
				}

				$this->cart->destroy();
				$this->session->set_flashdata('success_receivings', 1);
				redirect(site_url('receivings'));
			}
		}
	}

	public function clear_cart()
	{
        $this->load->library('cart');
		$this->cart->destroy();
		redirect(site_url('receivings'));
	}
}
