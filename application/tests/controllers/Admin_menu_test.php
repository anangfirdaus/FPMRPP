<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_menu_test extends TestCase
{       
    
    public function test_gagal_akses(){
		$output = $this->request('GET', 'Admin_menu/do_delete/9');
    		$this->assertRedirect('Login/index', $output);
		}
	public function setup(){
		$this->resetInstance();
		$this->CI->load->model('M_adminmenu');
		$this->obj = $this->CI->M_adminmenu;
		// $arrayTest = ['produk_id' => '1', 'produk_nama' => 'Batik Keris Pekalongan', 'produk_deskripsi' => 'Batik dengan corak wayang dan pewarnaan dengan tampak alami' ,'produk_harga' => '80000' ,'produk_size' => 'XL' ,'produk_image' => 'oke2.JPG'];
	}
        
        public function test_load(){
                $_SESSION['user']= 'eric';
		$output = $this->request('GET', 'Admin_menu/load');
    		$this->assertContains('Admin Page', $output);
		}
        public function test_do_insert(){
                $_SESSION['user'] = "eric";
		$mula = $this->obj->getCurrentRow();
		$output = $this->request(
			'POST',
			['Admin_menu', 'do_insert'],
			[
			'nama' => 'Tahu',
			'harga' => '80000',
			'jenis' => 'makanan',
			]
			);
		$akhir = $this->obj->getCurrentRow();
        $expected = $akhir - $mula;
        $this->assertEquals(1, $expected);
        
	}
                
        public function test_formadd(){
                $_SESSION['user']= 'eric';
		$output = $this->request('GET', 'Admin_menu/add_data');
		$this->assertContains('Form Add', $output);
		}
        
        public function testEdit(){
		$_SESSION['user'] = 'eric';
                $id = 0;
		$result = $this->obj->getId('Saparella');
		foreach ($result as $x){
			$id = $x['kode'];
		}
                $url = 'Admin_menu/edit_data/'.$id;
                $output = $this->request('GET', $url);
                $this->assertContains('Saparella' ,$output);
        }
        public function test_do_update(){
                $_SESSION['user'] = "eric";
		$mula = $this->obj->getCurrentRow();
		$output = $this->request(
			'POST',
			['Admin_menu', 'do_update'],
			[
			'nama' => 'Tahu',
			'harga' => '80000',
			'jenis' => 'makanan',
			]
			);
		$akhir = $this->obj->getCurrentRow();
        $expected = $akhir - $mula;
        $this->assertEquals(0, $expected);
        
	}
        public function test_delete(){
                $_SESSION['user'] = 'eric';
		$mula = $this->obj->getCurrentRow();
		$id = 8;
		$result = $this->obj->getId('Tahu');
		foreach ($result as $x){
			$id = $x['kode'];
		}
		$url = 'Admin_menu/do_delete/'.$id;
		$output = $this->request('GET', $url);
		$akhir = $this->obj->getCurrentRow();
	    $expected = $mula - $akhir;
	    $this->assertEquals(1, $expected);
	}
 /*       public function testUpdate(){
                $result = $this->obj->getId('Milkshake');
                foreach ($result as $x){
                                $id = $x['kode'];
                        }
                $this->request(
                        'POST',
                        ['Admin_menu', 'do_update'],
                        [
                        'kode' => $id, 
                        'nama' => 'Milk',
                        'harga' => '25000',
                        'jenis' => 'minuman',
                        'gambar' => 'X.jpg',
                        ]
                        );
                        $_SESSION['user'] = 'eric';
                        $output = $this->request('GET', 'Admin_menu/load');
                        $this->assertContains('Milk' ,$output);
            }
            
        public function testdelete(){
		$mula = $this->obj->getCurrentRow();
		$id = 0;
		$result = $this->obj->getId('Saparella');
		foreach ($result as $x){
			$id = $x['kode'];
		}
		$url = 'Admin_menu/do_delete/'.$id;
		$output = $this->request('GET', $url);
		$akhir = $this->obj->getCurrentRow();
                $expected = $mula - $akhir;
                $this->assertEquals(1, $expected);}
*/
        
        
        
}

