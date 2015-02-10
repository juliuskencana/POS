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
}

