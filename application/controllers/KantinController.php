<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KantinController extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Menu');
    $this->load->model('Customer');
		$this->load->model('Pesanan');
    $this->load->library('form_validation');
  }
//------------------------------------------TAMPILAN---------------------------------------
	public function index()
	{
		$this->load->view('home');
	}

	public function dashboard()
	{
		$data['produk'] = $this->Menu->getMenu();
		$this->session->set_userdata(array('userpage'=>'listmenu'));
		$this->load->view('dashboard', $data);
	}

	public function keranjang()
	{
		$data = $this->cart->contents();
		$this->session->set_userdata(array('userpage'=>'keranjang'));
		$this->load->view('dashboard',array('data' => $data));
	}

	public function detail($menu)
	{
		$data = array('data' => $this->Menu->getSingleMenu($menu));
		$this->session->set_userdata(array('userpage'=>'menudetail'));
		$this->load->view('dashboard', $data);
	}
//--------------------------------------Akhir dari TAMPILAN------------------------------------------------

//------------------------------------------Custom_order---------------------------------------------------
function Custom_order()
{
	$this->session->set_userdata(array('userpage'=>'order_custom'));
	$this->load->view('dashboard');
}

function pesan_kustom()
{
	$data = array(
		 'username' => $this->session->userdata('user'),
		 'customerName' => $this->session->userdata('customerName'),
		 'alamat' => $this->input->post('alamat'),
		 'dateCreated' => date('d/m/Y'),
		 'id_order' => $id_pesanan,
		 'phone' => $this->input->post('phone'),
		 'kelurahan' => $this->input->post('kelurahan'),
		 'status' => 'sedang diproses'
	);
}
//-------------------------------------Akhir dari Custom order---------------------------------------------

//------------------------------------------Lihat Pesanan--------------------------------------------------
public function order(){

}
//-------------------------------------Akhir dari Lihat Pesanan--------------------------------------------

//------------------------------------------Fungsi Cart----------------------------------------------------
	public function cart_add()
	{
		$data = array(
			'id' => $this->input->post('kode'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('jumlah'),
		);
		$this->cart->insert($data);
	}

	public function hapus_cart(){
    $data = array(
      'rowid' => $this->input->post('row_id'),
      'qty' => 0,
    );
    $this->cart->update($data);
    redirect(base_url('/dashboard/keranjang'));
  }

	public function buat_pesanan()
	{
		$id_pesanan = random_string('alnum', 6).random_string('numeric', 5);
		$data = array(
			 'username' => $this->session->userdata('user'),
			 'customerName' => $this->session->userdata('customerName'),
			 'alamat' => $this->input->post('alamat'),
			 'dateCreated' => date('d/m/Y'),
			 'id_order' => $id_pesanan,
			 'phone' => $this->input->post('phone'),
			 'kelurahan' => $this->input->post('kelurahan'),
			 'status' => 'sedang diproses'
		);
		$this->Pesanan->insertData('pesanan', $data);

		foreach ($this->cart->contents() as $item) {
			$detail = array(
				'id_order' => $id_pesanan,
				'nama' => $item['name'],
				'jumlah' => $item['qty'],
			);
			$this->Pesanan->InsertDataDetails('detail_pesanan', $detail);
		}

		$this->cart->destroy();
		redirect(base_url('dashboard'));
	}
}
