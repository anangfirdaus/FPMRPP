<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KantinController extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('Menu');
    $this->load->model('Customer');
		$this->load->model('Pesanan');
		$this->load->model('keluhan');
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
function Penjelasan_kustom(){
	$this->session->set_userdata(array('userpage'=>'penjelasan_kustom'));
	$this->load->view('dashboard');
}
function Pilih_kustom()
{
	$this->session->set_userdata(array('userpage'=>'pilih_kustom'));
	$this->load->view('dashboard');
}

function Custom_order($mebel)
{
	$this->session->set_userdata(array('userpage'=>'order_custom'));
	if($mebel == 'lemari'){
		$this->session->set_userdata(array('mebel'=>'lemari'));
	}
	elseif($mebel == 'sofa'){
		$this->session->set_userdata(array('mebel'=>'sofa'));
	}
	$data['materials'] = $this->Pesanan->getMaterial();
	$this->load->view('dashboard', $data);
}

function Hitung_harga($dimensi){
	if($this->session->userdata("mebel") == 'lemari'){
		$volume = ceil(($dimensi['panjang']*$dimensi['lebar']*$dimensi['tinggi'])/0.5);
		if(set_value('triplek')!=0) {
			$triplek = ceil($volume/2);
			$total_harga = (($volume*set_value('kayu'))+($triplek*set_value('triplek')))*$dimensi['qpesan'];
		} else{
			$total_harga = $volume*set_value('kayu')*$dimensi['qpesan'];
		}
		return $total_harga;
	}
	elseif ($this->session->userdata("mebel") == 'sofa') {
		$volume = ceil(($dimensi['panjang']*$dimensi['lebar']*$dimensi['tinggi'])/0.1);
		$busa = ceil($volume/2);
		$total_harga = (($volume*set_value('lapisan'))+($busa*set_value('busa')))*$dimensi['qpesan'];
		return $total_harga;
	}
}

function pesan_kustom()
{
	$config = array(
		'upload_path' => 'assets/pesanan/',
		'allowed_types' => 'jpg|jpeg|png|bmp',
		'max_size' => 15000 //in kb
		);
	$this->upload->initialize($config);
	$fileUpload = array();

	if($this->upload->do_upload('foto')){
			$fileUpload = $this->upload->data();
			$foto = $fileUpload['file_name'];
			if ($this->session->userdata("mebel") == 'lemari') {
				$dimensi = array(
				'panjang' => $this->input->post('panjang'),
				'lebar' => $this->input->post('lebar'),
				'tinggi' => $this->input->post('tinggi'),
				'kayu' => set_value('kayu'),
				'triplek' => set_value('triplek'),
				'qpesan' => $this->input->post('qPesanan')
				);
				$total_harga = $this->Hitung_harga($dimensi);
			}
			elseif ($this->session->userdata("mebel") == 'sofa') {
				$dimensi = array(
				'panjang' => $this->input->post('panjang'),
				'lebar' => $this->input->post('lebar'),
				'tinggi' => $this->input->post('tinggi'),
				'lapisan' => set_value('lapisan'),
				'qpesan' => $this->input->post('qPesanan')
				);
				$total_harga = $this->Hitung_harga($dimensi);
			}
			$pesanan = array(
				'username' => $this->session->userdata('user'),
				'customerName' => $this->session->userdata('customerName'),
				'dateCreated' => date('d/m/Y'),
				'foto' => $foto,
				'harga' => $total_harga,
				'status' => 'sedang diverifikasi',
				'panjang' => $this->input->post('panjang'),
				'lebar' => $this->input->post('lebar'),
				'tinggi' => $this->input->post('tinggi'),
				'lapisan' => set_value('lapisan'),
				'qpesan' => $this->input->post('qPesanan')
			);
			$this->konfirmasi_kustom($pesanan); //input pesanan
		}
	else echo 'gagal';
}

function konfirmasi_kustom($pesanan){
	$this->session->set_userdata(array('userpage'=>'konfirmasi_kustom'));
	$pesan['confirm'] = array(
		'username' => $pesanan['username'],
		'customerName' => $pesanan['customerName'],
		'dateCreated' => $pesanan['dateCreated'],
		'foto' => $pesanan['foto'],
		'harga' => $pesanan['harga'],
		'status' => $pesanan['status'],
		'panjang' =>$pesanan['panjang'],
		'lebar' => $pesanan['lebar'],
		'tinggi' => $pesanan['tinggi'],
		'lapisan' => $pesanan['lapisan'],
		'qpesan' => $pesanan['qpesan']
	);
	$final = array(
		'username' => $this->session->userdata('user'),
		'customerName' => $this->session->userdata('customerName'),
		'dateCreated' => date('d/m/Y'),
		'foto' => $pesanan['foto'],
		'harga' => $pesanan['harga'],
		'status' => 'sedang diverifikasi',
		'qpesan' => $pesanan['qpesan']
	);
	$this->load->view('dashboard', $pesan);
	$this->Pesanan->input_kustom($final);


}
//-------------------------------------Akhir dari Custom order---------------------------------------------

//------------------------------------------User Page--------------------------------------------------
function pesanan_kustom()
{
	$this->session->set_userdata(array('userpage'=>'pesanan_kustom_kustomer'));
	$username = $this->session->userdata('user');
	$data = $this->Pesanan->getPesanan_kustom_user($username);
	$this->load->view('userpage', array('data' => $data));
}

function pesanan()
{
	$this->session->set_userdata(array('userpage'=>'pesanan_kustomer'));
	$username = $this->session->userdata('user');
	$data = $this->Pesanan->getPesanan_user($username);
	$this->load->view('userpage', array('data' => $data));
}
//-------------------------------------Akhir dari Lihat Pesanan--------------------------------------------

//-------------------------------------Fungsi Keluhan-------------------------------------------------------
public function halaman_keluhan(){
	$this->session->set_userdata(array('userpage'=>'halaman_keluhan'));
	$username = $this->session->userdata('user');
	$this->load->view('userpage');
}

public function do_ngeluh(){
		$keluhan = array(
			'username' => $this->session->userdata('user'),
			'customerName' => $this->session->userdata('customerName'),
			'keluhan' => $this->input->post('keluhan'),
			'tanggal_keluhan' => date('d/m/Y')
		);
		$this->keluhan->sambat($keluhan);
		redirect('dashboard');
}
public function halaman_balasan(){
	$this->session->set_userdata(array('userpage'=>'halaman_balasan'));
	$username = $this->session->userdata('user');
	$data['balasan'] = $this->keluhan->getBalasan($username);
	$this->load->view('userpage', $data);
}

public function balasan_detail($id){
	$this->session->set_userdata(array('userpage'=>'balasan_detail'));
	$username = $this->session->userdata('user');
	$data['balasan'] = $this->keluhan->getDetailBalasan($id);
	$this->load->view('userpage', $data);
}
//-------------------------------------akhir dari fungsi keluhan-----------------------------------------------

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
