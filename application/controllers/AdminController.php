<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	function __construct(){
    parent::__construct();
    $this->load->model('Menu');
		$this->load->model('Pesanan');
		$this->load->model('keluhan');
		$this->load->helper(array('form', 'url'));
   	if(!$this->session->userdata('admin'))
    {
    	redirect('admin');
    }
  }

	function load($page)
	{
    $this->session->set_userdata(array('adminpage'=>$page));
		$data = null;
		if ($page == "menu")
		{
			$data = $this->Menu->getMenu();
		} else if ($page == "pesanan")
		{
			$data = $this->Pesanan->getPesanan();
		} else if ($page == "pesanan_kustom") {
			$data= $this->Pesanan->getPesanan_kustom();
		}
		else if ($page == "lihat_keluhan") {
			$data= $this->keluhan->getKeluhan();
		}
		$this->load->view('adminpage', array('data' => $data));
	}

	function addMenu()
	{
    $this->session->set_userdata(array('adminpage'=>'tambahmenu'));
		$this->load->view('adminpage');
	}

  function do_insert()
  {
		$config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('foto'))
    {
            $error = array('error' => $this->upload->display_errors());
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
    }

		$upload_data = $this->upload->data();
		$filePath = $upload_data['file_name'];

    $data = array(
    	'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
			'deskripsi' => $this->input->post('deskripsi'),
			'gambar' => $filePath,
		);
		$this->Menu->InsertData('menu',$data);
		redirect('admin/menu');
  }

	public function deleteMenu($kode)
  {
		$where = array('kode' => $kode);
		$res = $this->Menu->DeleteData('menu',$where);
		if($res>=1){
			redirect('admin/menu');
    }
  }

  public function editMenu($kode)
  {
		$menu = $this->Menu->getSingleMenu($kode);
		$data = array(
			"kode" => $menu[0]['kode'],
			"nama" => $menu[0]['nama'],
			"harga" => $menu[0]['harga'],
			"deskripsi" => $menu[0]['deskripsi'],
			"gambar" => $menu[0]['gambar'],
		);
    $this->session->set_userdata(array('adminpage'=>'editmenu'));
		$this->load->view('adminpage',$data);
	}

	public function do_update($kode)
  {
		$config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('foto'))
    {
            $error = array('error' => $this->upload->display_errors());
    }
    else
    {
            $data = array('upload_data' => $this->upload->data());
    }

		$upload_data = $this->upload->data();
		$filePath = $upload_data['file_name'];

		$nama	= $_POST['nama'];
		$harga = $_POST['harga'];
		$deskripsi = $_POST['deskripsi'];
		$data_insert = null;

		if ($filePath != null || $filePath != "")
		{
			$gambar = $filePath;

			$data_insert = array(
	  		'nama' => $nama,
	  		'harga' => $harga,
				'deskripsi' => $deskripsi,
				'gambar' => $filePath,
			);
		} else
		{
			$data_insert = array(
	  		'nama' => $nama,
	  		'harga' => $harga,
				'deskripsi' => $deskripsi,
			);
		}

		$where = array('kode' => $kode);
		$res = $this->Menu->UpdateData('menu',$data_insert,$where);
		if($res>=1){
			redirect('admin/menu/update/'.$kode);
    }
  }

	public function kirimPesanan($id) {
		$data = array(
			'status' => 'dikirim',
		);
		$where = array(
			'id_order' => $id,
		);
		$this->Pesanan->kirim('pesanan', $data, $where);
		$this->session->set_userdata(array('adminpage'=>'pesanan'));
		$pesanan = $this->Pesanan->getPesanan();
		$this->load->view('adminpage', array('data' => $pesanan));
	}

	public function verifPesanan($id) {
		$data = array(
			'status' => 'disetujui',
		);
		$where = array(
			'id_order' => $id,
		);
		$this->Pesanan->kirim('pesanan_kustom', $data, $where);
		$this->session->set_userdata(array('adminpage'=>'pesanan'));
		$pesanan = $this->Pesanan->getPesanan();
		$this->load->view('adminpage', array('data' => $pesanan));
	}

	public function hapusPesanan($id) {
		$params = array('id_order' => $id);
		$where = array(
			'id_order' => $id,
		);
		$this->Pesanan->hapus($where);
		$this->session->set_userdata(array('adminpage'=>'pesanan'));
		redirect(base_url('admin/pesanan'));
	}

	public function hapusPesananKustom($id) {
		$this->Pesanan->hapusKustom($id);
		$this->session->set_userdata(array('adminpage'=>'pesanan'));
		redirect(base_url('admin/pesanan_kustom'));
	}

	public function detailPesanan($id) {
		$params = array('id_order' => $id);
		$data = $this->Pesanan->getDetailPesanan($id);
		$this->session->set_userdata(array('adminpage'=>'detailPesanan'));
		redirect(base_url('admin/pesanan'));
	}

	public function balas_keluhan($id){
		$data['keluhan'] = $this->keluhan->getDetailKeluhan($id);
		$this->session->set_userdata(array('adminpage'=>'halaman_balas_keluhan'));
		$username = $this->session->userdata('admin');
		$this->load->view('adminpage',$data);
	}
	public function do_balas($id)
	{
		$balasan = array(
			'balasan' => $this->input->post('balasan'),
			'tanggal_balasan' => date('d/m/Y')
		);
		$this->keluhan->kirimBalasan($id,$balasan);
		redirect(base_url('admin/lihat_keluhan'));
	}
	public function detail_keluhan($id)
	{
		$data['keluhan'] = $this->keluhan->getDetailKeluhan($id);
		$this->session->set_userdata(array('adminpage'=>'detail_keluhan'));
		$username = $this->session->userdata('admin');
		$this->load->view('adminpage',$data);
	}
}
