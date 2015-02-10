<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_item extends CI_Model {

	public function insert($p) {

		$data = array(
			'name' => $p['name']
		);
		
		$this->db->insert('items', $data);

		return $this->db->insert_id(); 
	}

	public function edit($field, $p, $id) {

		$data = array(
			'name' => $p['name']
		);
		
		$this->db->where($field, $id);
		$this->db->update('items', $data);

		return $this->db->insert_id(); 
	}

	public function delete($field, $id) {
		$this->db->delete('items', array($field => $id));
	}

	public function get_all() {

		$this->db->select('*');
		$this->db->from('items');

		$query = $this->db->get();
		return $query->result();
	}

	public function get_by($field, $value, $operator = 'where', $return_type = 'row') {

		$this->db->select('*');
		$this->db->from('items');

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

	public function count_get_list() {
		
		$this->db->select('*');
		$this->db->from('items');

		return $this->db->count_all_results();
	}

	public function get_list($page, $per_page) {
		
		$this->db->select('*');
		$this->db->from('items');

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}

		$this->db->order_by('name');

		$query = $this->db->get();

		return $query->result();
	}

	public function count_get_list_search($g) {
		
		$this->db->select('*');
		$this->db->from('items');
		$this->db->like('name', $g['name']);

		return $this->db->count_all_results();
	}

	public function get_list_search($page, $per_page, $g) {
		
		$this->db->select('*');
		$this->db->from('items');
		$this->db->like('name', $g['name']);

		if($page || $per_page) {
			if(!$page) {
				$page = 0;
			}
			$this->db->limit($per_page, $page);
		}

		$this->db->order_by('name');

		$query = $this->db->get();

		return $query->result();
	}

}

