<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Menu_test extends TestCase{
	
        protected $backupGlobalsBlacklist = array( '_SESSION' );
    
        public function setUp(){
            $this->resetInstance();
            $this->CI->load->model('M_login');
            $this->obj = $this->CI->M_login;
            $this->CI->load->model('M_adminmenu');
            $this->obj1 = $this->CI->M_adminmenu;
        }
        
        public function test_halamanawal(){
            $output = $this->request('GET', 'Menu/index');
            $this->assertContains('<title>Kopi Ganes</title>', $output);
	}
        public function test_halamanloginuser(){
            $output = $this->request('GET', 'Menu/userloginview');
            $this->assertContains('<title>Login User</title>', $output);
	}
        public function test_userlogin(){
            $this->request('POST', 'Menu/userlogin',
                            [
                            'user' => 'anang',
                            'pass' => 'anangfirdaus', 
                            ]
                            );
            $this->assertEquals('anang', $_SESSION['user']);
	   }
        public function test_userlogin_gagal1()
            {
		$output = $this->request(
			'POST', 'Menu/userlogin',
			[
                            'user' => 'anang',
                            'pass' => 'unmatch',
			]
		);
		$this->assertContains('"Login Gagal"', $output);
            }
        
        public function test_adminlogin_gagal2(){
        $output = $this->request(
                'POST', 'Menu/userlogin',
                [
                    'user' => '',
                    'pass' => 'anangfirdaus',
                ]
        );
        $this->assertContains('"Login Gagal"', $output);
        }
        
        
        public function test_adminlogin_gagal3()
        {
            $output = $this->request('POST', 'Menu/userlogin',
                [
                    'user' => 'anang',
                    'pass' => '',
                ]);
            $this->assertContains('"Login Gagal"', $output);
        }
        
        public function test_adminlogin_gagal4()
        {
            $output = $this->request('POST', 'Menu/userlogin',
                [
                    'user' => 'eric',
                    'pass' => 'eriicsrizal',
                ]);
            $this->assertContains('"Login Gagal"', $output);
        }
         
        public function test_user_logout(){
            $_SESSION['user'] = "anang";
            //$this->assertTrue( isset($_SESSION['nama']) );
            $this->request('GET', 'Menu/userlogout');
            //$this->assertEquals( '', $_SESSION['nama'] );
            $this->assertRedirect('Menu/index');
            //$this->assertFalse( isset($_SESSION['username']) );
        }
        
          public function test_validationUser_success(){
		$output = $this->request(
                    'POST',
                    'Menu/validateuser',
                        [
                            'username' => 'bejosubianto',
                            'password' => '123',
                            'email'    => 'testsukses@gmail.com',
			]
		);
                $this->assertContains('Validate berhasil', $output);
		$where = 'bejosubianto';
		$this->obj->hapus_user($where);
		}
          public function test_validationUser_fail(){
		//$this->assertFalse( isset($_SESSION['customer']) );
		$output = $this->request(
			'POST','Menu/validateUser',
                            [
                                    'username' => '',
                                    'password' => '123',
                                    'email'    => 'test@gmail.com',
                            ]
		);
		//$output = $this->request('GET', 'user/login');
		$this->assertContains('Gagal Validate', $output);
		}
          
          public function test_validationUser_fail2(){
		//$this->assertFalse( isset($_SESSION['customer']) );
		$output = $this->request(
			'POST','Menu/validateUser',
                            [
                                    'username' => 'bejosubianto',
                                    'password' => '',
                                    'email'    => 'test@gmail.com',
                            ]
		);
		//$output = $this->request('GET', 'user/login');
		$this->assertContains('Gagal Validate', $output);
		}
          
          public function test_validationUser_fail3(){
		//$this->assertFalse( isset($_SESSION['customer']) );
		$output = $this->request(
			'POST','Menu/validateUser',
                            [
                                    'username' => 'bejosubianto',
                                    'password' => '123',
                                    'email'    => '',
                            ]
		);
		//$output = $this->request('GET', 'user/login');
		$this->assertContains('Gagal Validate', $output);
		}
}

