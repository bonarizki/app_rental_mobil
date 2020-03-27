<?php

class rental_model extends CI_model {
	public function get_data($table) {
		return $this->db->get($table);
	}

	public function insert_data ($data,$table) {
		$this->db->insert($table,$data);
	}

	public function update_data ($table, $data, $where) {
		$this->db->update($table, $data, $where);
	}

	public function delete_data ($where,$table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_mobil($id)
	{
		$result = $this->db->where('id_mobil', $id)->get('mobil');
		if ($result->num_rows() > 0) {
			return $result->result();
		}else {
			return false;
		}
	}

	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db
					   ->where ('username', $username)
					   ->where ('password', md5 ($password))
					   ->limit (1)
					   ->get('customer');
		if ($result->num_rows() > 0) {
			return $result->row();
		}else {
			return false;
		}
	}

	public function ganti_password_aksi ($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	
	public function getDataById($id)
	{
		$result = $this->db->where('id_customer',$id)->get('customer')->result_array();
		return $result;
	}

	public function addSupir($data)
	{
		return $this->db->insert('data_driver',$data);
	}

	public function getSupir()
	{
		return $this->db->get('data_driver')->result_array();
	}

	public function updateDriverStatus($id)
	{
		$this->db->where('id_supir',$id);
		return $this->db->update('data_driver',["status_supir"=>'1']);
	}

	public function deActiveDriverStatus($id)
	{
		$this->db->where('id_supir',$id);
		return $this->db->update('data_driver',["status_supir"=>'0']);
	}
}

?>