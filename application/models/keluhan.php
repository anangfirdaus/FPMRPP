<?php
class Keluhan extends CI_Model{
  public function getKeluhan(){
    $this->db->select('*')
            ->from('keluhan');
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  public function getDetailKeluhan($id){
    $this->db->select('*')
            ->from('keluhan')
            ->where('id',$id);
    $hasil = $this->db->get();
    return $hasil->row_array();
  }

  public function getBalasan($username){
    $this->db->select('*')
            ->from('keluhan')
            ->where('username', $username);
    $hasil = $this->db->get();
    return $hasil->result_array();
  }

  public function getDetailBalasan($id){
    $this->db->select('*')
            ->from('keluhan')
            ->where('id',$id);
    $hasil = $this->db->get();
    return $hasil->row_array();
  }

  public function kirimBalasan($id,$balasan){
    $this->db->where('id',$id)
             ->update('keluhan',$balasan);
  }

  public function sambat($keluhan){
    $this->db->insert('keluhan', $keluhan);
  }
}
?>
