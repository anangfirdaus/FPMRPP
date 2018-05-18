<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->model('Admin');
      $this->load->model('Customer');
      $this->load->library('form_validation');
    }

    function index()
    {
      $this->load->view('login');
	  }

    public function adminlogin()
    {
      $username = $this->input->post('user');
      $password = $this->input->post('pass');
      $coba = sha1($password);
      $isLogin = $this->Admin->login_authen($username, $password);
      if ($isLogin == TRUE)
      {
        $this->session->set_userdata(array('admin'=>$username));
        redirect('admin/menu');
      }

      else
      {
        echo '<script language="javascript">';
        echo 'alert("Login Gagal");';
        echo 'window.history.go(-1);';
        echo '</script>';
      }
    }

    public function adminlogout()
    {
      //removing session
      $this->session->unset_userdata('admin');
      $this->session->unset_userdata('adminpage');
      redirect('admin');
    }

    public function userloginview() {
  		$this->load->view('userlogin');
  	}

    public function userlogin()
    {
      $username = $this->input->post('user');
      $password = $this->input->post('pass');
      $coba = sha1($password);
      $isLogin = $this->Customer->userlogin_authen($username, $coba);
      if ($isLogin == TRUE)
      {
        $userdata = $this->Customer->getSingleCustomer($username);
        $this->session->set_userdata(
          array(
            'user'=>$username,
            'role'=>"customer",
            'customerName'=>$userdata[0]['name'],
          )
        );
        redirect('dashboard/makanan');
      }
      else
      {
        echo '<script language="javascript">';
        echo 'alert("Login Gagal");';
        echo 'window.history.go(-1);';
        echo '</script>';
      }
    }
    public function userlogout()
    {
        //removing session
        $this->session->unset_userdata('user');
				$this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('/');
		}

	function validateuser(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
    $this->form_validation->set_rules('name','Address','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');

		if ($this->form_validation->run() != false)
    {
    	$this->registeruser();
		} else
    {
			$data['message'] = '';
			$this->load->view('userlogin', $data);
		}
	}

	function registeruser(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
    $coba = sha1($password);
    $email = $this->input->post('email');
    $name = $this->input->post('name');
		$address = $this->input->post('address');

		$where = array(
  		'username' => $username,
  		'password' => $coba,
  		'email'	   => $email,
      'name'    => $name,
  		'alamat'	 => $address,
		);
		$this->Customer->insert_user("user",$where);
		$data['message'] = 'Registrasi berhasil';
		$this->load->view('userlogin', $data);
		redirect('login');
	}

}
