<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_test extends TestCase{
	
        protected $backupGlobalsBlacklist = array( '_SESSION' );
    
        public function setUp(){
            $this->resetInstance();
            $this->CI->load->model('M_login');
            $this->obj1 = $this->CI->M_login;
        }

        public function test_halamanloginadmin(){
    		$output = $this->request('GET', 'Login/index');
    		$this->assertContains('Login Form', $output);
	   } //Cek halaman admin terbuka atau tidak
        
        public function test_adminlogin(){
            $this->request('POST', 'Login/login',
                            [
                            'user' => 'eric',
                            'pass' => 'ericsrizal', 
                            ]
                            );
            $this->assertEquals('eric', $_SESSION['user']);
	   }
        public function test_adminlogin_gagal1()
            {
		$output = $this->request(
			'POST', 'Login/login',
			[
                            'user' => 'eric',
                            'pass' => 'unmatch',
			]
		);
		$this->assertContains('"Login Gagal"', $output);
            }
        
        public function test_adminlogin_gagal2(){
        $output = $this->request(
                'POST', 'Login/login',
                [
                    'user' => '',
                    'pass' => 'ericsrizal',
                ]
        );
        $this->assertContains('"Login Gagal"', $output);
        }
        
        
        public function test_adminlogin_gagal3()
        {
            $output = $this->request('POST', 'Login/login',
                [
                    'user' => 'eric',
                    'pass' => '',
                ]);
            $this->assertContains('"Login Gagal"', $output);
        }
        
        public function test_adminlogin_gagal4()
        {
            $output = $this->request('POST', 'Login/login',
                [
                    'user' => 'eric',
                    'pass' => 'eriicsrizal',
                ]);
            $this->assertContains('"Login Gagal"', $output);
        }
         
        public function test_admin_logout(){
            $_SESSION['user'] = "eric";
            //$this->assertTrue( isset($_SESSION['nama']) );
            $this->request('GET', 'Login/logout');
            //$this->assertEquals( '', $_SESSION['nama'] );
            $this->assertRedirect('Login/index');
            //$this->assertFalse( isset($_SESSION['username']) );
        }
    
}

