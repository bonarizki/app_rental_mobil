<?php


class Dashboard extends Secure_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index ()
	{
		$data ['mobil'] = $this->rental_model->get_data('mobil') ->result();
		$this->load->view('templates_customer/header');
		$this->load->view('customer/dashboard', $data);
		$this->load->view('templates_customer/footer');
	}

	public function detail_mobil ($id)
	{
		$data ['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('templates_customer/header');
		$this->load->view('customer/detail_mobil', $data);
		$this->load->view('templates_customer/footer');
	}

	public function detail_byModal($id)
	{
		echo json_encode($this->rental_model->ambil_id_mobil($id));
	}

	public function sewaMobil()
	{
		$tanggal = date("Y-m-d H:i:s");
		$data = [
			"id_sewa"=>rand(),
			"id_customer"=>$this->session->userdata('id_customer'),
			"id_mobil"=>$this->input->post(['id_mobil'][0]),
			"lama_sewa"=>$this->input->post(['sewa'][0]),
			"total_harga"=>$this->input->post(['harga'][0]),
			"created_date"=>$tanggal
		];
		$this->rental_model->sewa($data);
		$this->rental_model->updateStatusMobil($data);

		echo json_encode(["info"=>'Selamat Mobil Berhasil Anda Sewa']);
	}

	public function dataDriver()
	{
		$data = $this->rental_model->getSupir();

		echo json_encode(["data"=>$data]);
	}

	
}

?>