<?php

class Customer extends CI_Model{
  public function getSingleCustomer($where){
    $this->db->select('*');
    $this->db->where('username', $where);
    $this->db->from('user');
    $data = $this->db->get();
		return $data->result_array();
	}
  public function userlogin_authen($username, $password){
    $this->db->select('*');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->from('user');
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return true;
    }
    else{
      return false;
    }
  }

  function insert_user($table, $where){
  	return $this->db->insert($table, $where);
  }

  function hapus_user($where) {
		$this->db->where('username', $where);
		$this->db->delete('user');
  }
}
