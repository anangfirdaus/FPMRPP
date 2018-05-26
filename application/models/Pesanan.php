<?php
class Pesanan extends CI_Model{
	public function getPesanan(){
		$data = $this->db->query('SELECT * FROM pesanan');
		return $data->result_array();
	}

	public function getPesanan_kustom(){
		$data = $this->db->query('SELECT * FROM pesanan_kustom');
		return $data->result_array();
	}

	public function getPesanan_kustom_user($username){
		$this->db->select('id_order, foto, dateCreated, status, harga')
						 ->from('pesanan_kustom')
						 ->where('username', $username);
		$hasil = $this->db->get();
		return $hasil->result_array();
	}

	public function getPesanan_user($username){
		$this->db->select('id_order, dateCreated, status')
						 ->from('pesanan')
						 ->where('username', $username);
		$hasil = $this->db->get();
		return $hasil->result_array();
	}

	public function getDetailPesanan($where){
		$data = $this->db->query("SELECT * FROM detail_pesanan WHERE id_pesanan='$where'");
		return $data->result_array();
	}

	public function getMaterial(){
			$this->db->select('nama_material, jenis, harga')
							 ->from('material');
			$hasil = $this->db->get();
			return $hasil->result();
	}

	public function input_kustom($pesanan){
		$res = $this->db->insert('pesanan_kustom',$pesanan);
		return $res;
	}

	public function kirim($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}

	public function hapus($where){
		$this->db->delete('pesanan',$where);
		$this->db->delete('detail_pesanan',$where);
	}

	public function hapusKustom($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->delete('pesanan_kustom');
	}

	public function insertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}

	public function insertDataDetails($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
}
?>
