<?php

class Dashboard extends Secure_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->authForAdmin($this->session->userdata());
		$this->load->model('rental_model');
	}
	
	public function index()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');
	}

	public function data_supir()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_driver');
		$this->load->view('templates_admin/footer');
	}

	public function add_supir()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('jk','Gender','required');
		$this->form_validation->set_rules('no_telepon','No.Telepon','required');
		$this->form_validation->set_rules('no_ktp','No.KTP','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run()==false)
		{
			$json = array(
                'nama' => form_error('nama'),
                'alamat' => form_error('alamat'),
                'tempat_lahir' => form_error('tempat_lahir'),
                'tgl_lahir' => form_error('tgl_lahir'),
                'jk' => form_error('jk'),
                'no_telepon' => form_error('no_telepon'),
                'no_ktp' => form_error('no_ktp'),
                'email' => form_error('email'),
                
			);
			$this->output->set_status_header('404');
			echo json_encode(["info"=>"failed","errors"=>$json]);
		}else{
			$data = [
				"id_supir"=>rand(),
				"nama_supir"=>$this->input->post('nama'),
				"alamat"=>$this->input->post('alamat'),
				"tgl_lahir"=>$this->input->post('tgl_lahir'),
				"tempat_lahir"=>$this->input->post('tempat_lahir'),
				"jk"=>$this->input->post('jk'),
				"no_hp"=>$this->input->post('no_telepon'),
				"no_ktp"=>$this->input->post('no_ktp'),
				"email"=>$this->input->post('email'),
				"status_job"=>'0',
				"status_supir"=>'0'
			];

			$query = $this->rental_model->addSupir($data);
			echo json_encode(["info"=>"success"]);
			
		}
	}

	public function getDataSupir()
	{
		$data = $this->rental_model->getSupir();

		echo json_encode(["data"=>$data]);
	}

	public function activeDriver($id)
	{
		$updateStatus = $this->rental_model->updateDriverStatus($id);

		echo json_encode(["data"=>"berhasil"]);
	}
	
	public function deactiveDriver($id)
	{
		$updateStatus = $this->rental_model->deActiveDriverStatus($id);

		echo json_encode(["data"=>"berhasil"]);
	}

	public function hapusDriver($id)
	{
		$hapus = $this->rental_model->hapusSupir($id);

		echo json_encode(["data"=>"berhasil"]);
	}

	
	public function order_rental()
	{
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/order_rental');
		$this->load->view('templates_admin/footer');
	}

	public function getAllOrder()
	{
		$data = $this->rental_model->getAllOrder();
		echo json_encode(["data"=>$data]);
	}

	public function CarInRent($id)
	{
		$data = $this->rental_model->updateCarInRent($id);
		echo json_encode(["info"=>"success","message"=>"Data Berhasil Diupdate"]);
	}

	public function carIsBack($id,$id_mobil)
	{
		$data = $this->rental_model->updateCarIsBack($id);
		$mobil = $this->rental_model->updateStatusMobil2($id_mobil);
		echo json_encode(["info"=>"success","message"=>"Data Berhasil Diupdate"]);
	}

	public function cancelOrder($id,$id_mobil)
	{
		$data = $this->rental_model->cancelSewa($id);
		$mobil = $this->rental_model->updateStatusMobil2($id_mobil);
		echo json_encode(["info"=>"success","message"=>"Data Berhasil Diupdate"]);
	}
	
}

?>