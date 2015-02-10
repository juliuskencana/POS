<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model {

	public function get_by($field, $value, $operator = 'where', $return_type = 'row') {

		$this->db->select('*');
		$this->db->from('admin');

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

	public function update($id, $new) {

		$this->db->where('admin_id', $id);

		return $this->db->update('admin', $new);
	}
}

