<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_barang'),'',TRUE);
	$this->load->library(array('form_validation','pagination'));

}
	public function index()
	{
		if($this->input->post('simpan'))
		{
			$nama = $this->input->post('nama');
			$barang = $this->m_barang->listData(array('nama'=>$nama));
			if(empty($barang)){
				$image = $_FILES["image"]["name"];
				$image = str_replace(' ','_',$image);
	
				$insert = $this->m_barang->insertData(array(
					'nama' => $this->input->post('nama')
					,'image' => $image
					,'harga_jual' => $this->input->post('harga_jual')
					,'harga_beli' => $this->input->post('harga_beli')
					,'stok' => $this->input->post('stok')
				  ));
	
				if($insert == 'success'){
					$path = 'assets/images/barang';
					$this->upload_photo('image',$image,$path);
				}			
							
				redirect(base_url().'home');
			} else {
				$data['alert'] = 'nama sudah tersedia, silahkan gunakan nama yg lain.';
				$this->load->view('index',$data);
			}
		}
		else if($this->input->post('search'))
		{
			$nama = $this->input->post('name_search');
			$data['listBarang'] = $this->m_barang->listData(array('nama'=>$nama));
			$data['name_search'] = $nama;
			$this->load->view('index',$data);
		}
		else
		{
			$data['listBarang'] = $this->m_barang->listData();

			$data['alert'] = '';
			$this->load->view('index',$data);
		}
	}
	public function edit($id='')
	{
		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$barang = $this->m_barang->listData(array('nama'=>$nama));
			if($barang){			
				foreach($barang as $key => $value){
					$data['id'] = $value['id'];
					$data['nama'] = $value['nama'];
					$data['image'] = $value['image'];
					$data['harga_jual'] = $value['harga_jual'];
					$data['harga_beli'] = $value['harga_beli'];
					$data['stok'] = $value['stok'];
				}
				if($id == $value['id']){
					$image = $_FILES["image"]["name"];
					$image = str_replace(' ','_',$image);
	
					if($image == ''){
						$image = $this->input->post('image_existing');
					}
	
					$update = $this->m_barang->updateData(array(
						'id' => $this->input->post('id')
						,'nama'=>$this->input->post('nama')
						,'image' => $image
						,'harga_jual'=>$this->input->post('harga_jual')
						,'harga_beli'=>$this->input->post('harga_beli')
						,'stok'=>$this->input->post('stok')
					));
	
					if($update == 'success'){
						$path = 'assets/images/barang';
						$this->upload_photo('image',$image,$path);
					}	
								
					redirect(base_url().'home');
				} else {
					$data['alert'] = '<div class="alert alert-warning" role="alert">Nama sudah ada, silahkan gunakan nama yg lain.</div>';
					$barang = $this->m_barang->listData(array('id'=>$id));
					foreach($barang as $key => $value){
						$data['id'] = $value['id'];
						$data['nama'] = $value['nama'];
						$data['image'] = $value['image'];
						$data['harga_jual'] = $value['harga_jual'];
						$data['harga_beli'] = $value['harga_beli'];
						$data['stok'] = $value['stok'];
					}
					$this->load->view('edit_barang',$data);
				}
			} else {
				$image = $_FILES["image"]["name"];
				$image = str_replace(' ','_',$image);

				if($image == ''){
					$image = $this->input->post('image_existing');
				}

				$update = $this->m_barang->updateData(array(
					'id' => $this->input->post('id')
					,'nama'=>$this->input->post('nama')
					,'image' => $image
					,'harga_jual'=>$this->input->post('harga_jual')
					,'harga_beli'=>$this->input->post('harga_beli')
					,'stok'=>$this->input->post('stok')
				));

				if($update == 'success'){
					$path = 'assets/images/barang';
					$this->upload_photo('image',$image,$path);
				}	
							
				redirect(base_url().'home');
			}			
		}
		else
		{
			$barang = $this->m_barang->listData(array('id'=>$id));
			foreach($barang as $key => $value){
				$data['id'] = $value['id'];
				$data['nama'] = $value['nama'];
				$data['image'] = $value['image'];
				$data['harga_jual'] = $value['harga_jual'];
				$data['harga_beli'] = $value['harga_beli'];
				$data['stok'] = $value['stok'];
			}

			$data['alert'] = '';
			$this->load->view('edit_barang',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_barang->delete_barang($id);
		redirect(base_url('home'));		
	}
	private function upload_photo($files='',$file_name='',$path='')
	{		
		$this->load->library(array('upload'));
				
		if($_FILES[$files]['error']==4)  //if No file was uploaded. 
        return false;        
        $config['upload_path'] = $path;
        if(!empty($file_name)){$config['file_name'] = $file_name;}
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        //$config['encrypt_name']        = TRUE;
        $config['overwrite']        = TRUE;
        $config['remove_spaces']	= TRUE;
        //$config['max_size']        = 1024;         
        //$config['max_width']      = 4096;
        //$config['max_height']     = 768;
        
        $this->upload->initialize($config);
		
        $this->upload->do_upload($files);        
	}
}
