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
		return $this->db->update('data_driver',["status_supir"=>'0']);
	}

	public function deActiveDriverStatus($id)
	{
		$this->db->where('id_supir',$id);
		return $this->db->update('data_driver',["status_supir"=>'1']);
	}

	public function sewa($data)
	{
		return $this->db->insert('data_sewa_mobil',$data);
	}

	public function updateStatusMobil($data)
	{
		$this->db->where('id_mobil',$data['id_mobil']);
		return $this->db->update('mobil',["status"=>'1']);
	}

	public function hapusSupir($id)
	{
		$this->db->where('id_supir',$id);
		return $this->db->delete('data_driver');
	}

	public function getSupirActive()
	{
		$this->db->where('status_supir','0');
		return $this->db->get('data_driver')->result_array();
	}

	public function getAllOrder()
	{
		$this->db->select('dsm.id_sewa,dsm.id_mobil,cus.nama,type.nama_type,car.merk,car.warna,car.no_plat,dd.nama_supir,dsm.tanggal_sewa,dsm.tanggal_kembali,dsm.flag_sewa');
		$this->db->from('data_sewa_mobil as dsm');
		$this->db->join('customer as cus','dsm.id_customer = cus.id_customer');
		$this->db->join('mobil as car','dsm.id_mobil = car.id_mobil');
		$this->db->join('type','car.kode_type = type.kode_type');
		$this->db->join(' data_driver as dd','dsm.id_supir = dd.id_supir');
		// $this->db->where('dsm.flag_sewa !=','0');
		$this->db->order_by('dsm.created_date','asc');
		return $this->db->get()->result_array();

		// query mentahnya or raw query
		// SELECT dsm.id_sewa,cus.nama,type.nama_type,car.merk,car.no_plat,dd.nama_supir,dsm.tanggal_sewa,dsm.tanggal_kembali,dsm.flag_sewa
		// FROM data_sewa_mobil as dsm 
		// 	join customer as cus on dsm.id_customer = cus.id_customer
		// 	join mobil as car on dsm.id_mobil = car.id_mobil
		// 	join type on car.kode_type = type.kode_type
		// 	join data_driver as dd on dsm.id_supir = dd.id_supir
		// ORDER BY dsm.created_date asc
	}

	public function updateCarInRent($id)
	{
		$this->db->where('id_sewa',$id);
		return $this->db->update('data_sewa_mobil',["flag_sewa"=>"1"]);
	}

	public function updateCarIsBack($id)
	{
		$this->db->where('id_sewa',$id);
		return $this->db->update('data_sewa_mobil',["flag_sewa"=>"2"]);
	}
	

	public function updateStatusMobil2($id)
	{
		$this->db->where('id_mobil',$id);
		return $this->db->update('mobil',["status"=>'0']);
	}

	public function cancelSewa($id)
	{
		$this->db->where('id_sewa',$id);
		return $this->db->delete('data_sewa_mobil');
	}
}

?>