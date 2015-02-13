<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_stock extends CI_Model {

	public function get_by($item_id, $unit_id, $return_type = 'row') {

		$this->db->select('*');
		$this->db->from('stocks');

		$this->db->where('unit_id', $unit_id);
		$this->db->where('item_id', $item_id);

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

	public function insert($p) {

		$data = array(
			'admin_id' => $this->session->userdata('admin_id'),
			'item_id' => $p['name'],
			'unit_id' => $p['options']['unit_name'],
			'capital_price' => $p['price'],
			'benefit' => 0,
			'stock' => $p['qty']
		);

		$this->db->insert('stocks', $data);

		return $this->db->insert_id(); 
	}

	public function update($p, $item_id, $unit_id) {

		$this->db->set('stock', $p['qty'] . '+stock', FALSE);
		$this->db->set('capital_price', $p['price_rata2']);

		$this->db->where('unit_id', $unit_id);
		$this->db->where('item_id', $item_id);

		$this->db->update('stocks', $data);

		return $this->db->insert_id(); 
	}

	public function update_plus($qty, $item_id, $unit_id) {

		$this->db->set('stock', $qty . '+stock', FALSE);

		$this->db->where('unit_id', $unit_id);
		$this->db->where('item_id', $item_id);

		$this->db->update('stocks');

		return $this->db->insert_id(); 
	}

	public function update_min($qty, $item_id, $unit_id) {

		$this->db->set('stock', 'stock-' . $qty, FALSE);

		$this->db->where('unit_id', $unit_id);
		$this->db->where('item_id', $item_id);

		$this->db->update('stocks');

		return $this->db->insert_id(); 
	}

	public function count_get_list() {
		
		$this->db->select('*');
		$this->db->from('stocks');

		return $this->db->count_all_results();
	}

	public function get_list($page, $per_page) {
		
		$this->db->select('*, items.name as item_name, units.name as unit_name');
		$this->db->from('stocks');
        $this->db->join('items', 'items.item_id = stocks.item_id');
        $this->db->join('units', 'units.unit_id = stocks.unit_id');

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}

		$this->db->order_by('stock', 'asc');

		$query = $this->db->get();

		return $query->result();
	}

	public function count_get_list_search($g) {
		
		$this->db->select('*');
		$this->db->from('stocks');

		if ($g['item_id'] != '') {
			$this->db->where('item_id', $g['item_id']);
		}elseif ($g['unit_id'] != '') {
			$this->db->where('unit_id', $g['unit_id']);
		}

		return $this->db->count_all_results();
	}

	public function get_list_search($page, $per_page, $g) {
		
		$this->db->select('*, items.name as item_name, units.name as unit_name');
		$this->db->from('stocks');
        $this->db->join('items', 'items.item_id = stocks.item_id');
        $this->db->join('units', 'units.unit_id = stocks.unit_id');

		
		if ($g['item_id'] != '' && $g['unit_id'] != '') {
			$this->db->where('stocks.item_id', $g['item_id']);
			$this->db->where('stocks.unit_id', $g['unit_id']);
		}elseif ($g['item_id'] != '') {
			$this->db->where('stocks.item_id', $g['item_id']);
		}elseif ($g['unit_id'] != '') {
			$this->db->where('stocks.unit_id', $g['unit_id']);
		}

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}
		$this->db->order_by('stock', 'asc');

		$query = $this->db->get();

		return $query->result();
	}

	public function setting_profit($profit, $item_id, $unit_id) {

		$this->db->set('profit', $profit);

		$this->db->where('unit_id', $unit_id);
		$this->db->where('item_id', $item_id);

		$this->db->update('stocks', $data);

		return $this->db->insert_id(); 
	}
}

