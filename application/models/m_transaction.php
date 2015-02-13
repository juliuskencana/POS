<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_transaction extends CI_Model {

	public function insert($p, $transaction_type) {

		$data = array(
			'admin_id' => $this->session->userdata('admin_id'),
			'transaction_type' => $transaction_type
		);

		if (isset($p['customer_id'])) {
			$data['customer_id'] = $p['customer_id'];
		}

		if (isset($p['supplier_id'])) {
			$data['supplier_id'] = $p['supplier_id'];
		}

		if (isset($p['debt_transaction_id'])) {
			$data['debt_transaction_id'] = $p['debt_transaction_id'];
		}
		
		$this->db->insert('transactions', $data);

		return $this->db->insert_id(); 
	}

	public function insert_details($p, $transaction_id) {

		$data = array(
			'transaction_id' => $transaction_id,
			'item_id' => $p['name'],
			'unit_id' => $p['options']['unit_name'],
			'capital_price' => $p['price'],
			'quantity' => $p['qty'],
		);

		if (isset($p['sell_price'])) {
			$data['sell_price'] = $p['sell_price'];
		}
		
		$this->db->insert('transaction_details', $data);

		return $this->db->insert_id(); 
	}

	public function get_by($field, $value, $operator = 'where', $return_type = 'row') {

		$this->db->select('*');
		$this->db->from('transactions');

		$this->db->$operator($field, $value);

		$query = $this->db->get();
		
		switch($return_type) {
			case 'row':
					return $query->row();
				break;

			case 'result':
					return $query->result();
				break;
		}
	}

	public function get_details_by($field, $value, $operator = 'where', $return_type = 'row') {

		$this->db->select('items.name as item_name, units.name as unit_name, capital_price, sell_price, quantity, units.unit_id as unit_id, items.item_id as item_id');
		$this->db->from('transaction_details');
        $this->db->join('items', 'items.item_id = transaction_details.item_id');
        $this->db->join('units', 'units.unit_id = transaction_details.unit_id');

		$this->db->$operator($field, $value);

		$query = $this->db->get();
		
		switch($return_type) {
			case 'row':
					return $query->row();
				break;

			case 'result':
					return $query->result();
				break;
		}
	}

	public function get_all() {

		$this->db->select('*');
		$this->db->from('transactions');

		$query = $this->db->get();
		return $query->result();
	}

	public function count_get_list() {
		
		$this->db->select('*');
		$this->db->from('transactions');

		return $this->db->count_all_results();
	}

	public function get_list($page, $per_page) {
		
		$this->db->select('*');
		$this->db->from('transactions');

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}

		$this->db->order_by('timestamp', 'desc');

		$query = $this->db->get();

		return $query->result();
	}

	public function count_get_list_search($g) {
		
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('transaction_type', $g["type"]);

		if ($g['from'] != '' && $g['to'] != '') {
			$from = date("Y-m-d H:i:s", strtotime($g['from']));
			$to = date("Y-m-d H:i:s", strtotime($g['to']));
			$this->db->where('timestamp >', $from);
			$this->db->where('timestamp <', $to);
		}elseif ($g['from'] != '') {
			$from = date("Y-m-d H:i:s", strtotime($g['from']));
			$this->db->where('timestamp >', $from);
		}elseif ($g['to'] != '') {
			$to = date("Y-m-d H:i:s", strtotime($g['to']));
			$this->db->where('timestamp <', $to);
		}

		return $this->db->count_all_results();
	}

	public function get_list_search($page, $per_page, $g) {
		
		$this->db->select('*');
		$this->db->from('transactions');
		$this->db->where('transaction_type', $g['type']);

		
		if ($g['from'] != '' && $g['to'] != '') {
			$from = date("Y-m-d H:i:s", strtotime($g['from']));
			$to = date("Y-m-d H:i:s", strtotime($g['to']));
			$this->db->where('timestamp >', $from);
			$this->db->where('timestamp <', $to);
		}elseif ($g['from'] != '') {
			$from = date("Y-m-d H:i:s", strtotime($g['from']));
			$this->db->where('timestamp >', $from);
		}elseif ($g['to'] != '') {
			$to = date("Y-m-d H:i:s", strtotime($g['to']));
			$this->db->where('timestamp <', $to);
		}

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}
		$this->db->order_by('timestamp', 'desc');

		$query = $this->db->get();

		return $query->result();
	}

	public function cancel_transaction($transaction_id) {

		$data = array(
			'is_cancel' => 1,
		);
		
		$this->db->where('transaction_id', $transaction_id);
		$this->db->update('transactions', $data);

	}
}