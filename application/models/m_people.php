<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_people extends CI_Model {

	public function insert($from, $p) {

		$data = array(
			'name' => $p['name'],
			'address' => $p['address'],
			'phone' => $p['phone'],
			'hp' => $p['hp'],
			'email' => $p['email']
		);
		
		$this->db->insert($from, $data);

		return $this->db->insert_id(); 
	}

	public function edit($from, $field, $p, $id) {

		$data = array(
			'name' => $p['name'],
			'address' => $p['address'],
			'phone' => $p['phone'],
			'hp' => $p['hp'],
			'email' => $p['email']
		);
		
		$this->db->where($field, $id);
		$this->db->update($from, $data);

		return $this->db->insert_id(); 
	}

	public function delete($from, $field, $id) {
		$this->db->delete($from, array($field => $id));
	}

	public function get_by($from, $field, $value, $operator = 'where', $return_type = 'row') {

		$this->db->select('*');
		$this->db->from($from);

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

	public function get_all($from) {

		$this->db->select('*');
		$this->db->from($from);

		$query = $this->db->get();
		return $query->result();
	}

	public function count_get_list($from) {
		
		$this->db->select('*');
		$this->db->from($from);

		return $this->db->count_all_results();
	}

	public function get_list($from, $page, $per_page) {
		
		$this->db->select('*');
		$this->db->from($from);

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

	public function count_get_list_search($from, $g) {
		
		$this->db->select('*');
		$this->db->from($from);
		$this->db->like('name', $g['name']);

		return $this->db->count_all_results();
	}

	public function get_list_search($from, $page, $per_page, $g) {
		
		$this->db->select('*');
		$this->db->from($from);
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

