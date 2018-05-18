<?php
class Pesanan extends CI_Model{
	public function getPesanan(){
		$data = $this->db->query('SELECT * FROM pesanan');
		return $data->result_array();
	}

	public function getDetailPesanan($where){
		$data = $this->db->query("SELECT * FROM detail_pesanan WHERE id_pesanan='$where'");
		return $data->result_array();
	}

	public function kirim($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;
	}

	public function hapus($where){
		$this->db->delete('pesanan',$where);
		$this->db->delete('detail_pesanan',$where);
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
