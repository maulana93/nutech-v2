<?php
Class M_barang extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';
		$nama = isset($params["nama"])?$params["nama"]:'';

		$conditional = "WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}
		if($nama != '') {
			$conditional .= "AND nama = '".$this->db->escape_str($nama)."'";
		}

		$mysql = "select * from barang ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['nama'] = isset($params["nama"])?$params["nama"]:'';
		$data ['image'] = isset($params["harga_beli"])?$params["image"]:'';
		$data ['harga_jual'] = isset($params["harga_jual"])?$params["harga_jual"]:'';
		$data ['harga_beli'] = isset($params["harga_beli"])?$params["harga_beli"]:'';
		$data ['stok'] = isset($params["stok"])?$params["stok"]:'';

		$insert = $this->db->insert('barang', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}
	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$nama = isset($params["nama"])?$params["nama"]:'';
		$image = isset($params["image"])?$params["image"]:'';
		$harga_jual = isset($params["harga_jual"])?$params["harga_jual"]:'';
		$harga_beli = isset($params["harga_beli"])?$params["harga_beli"]:'';
		$stok = isset($params["stok"])?$params["stok"]:'';

		$data = "
			nama = '".$this->db->escape_str($nama)."'
			,image = '".$this->db->escape_str($image)."'
			,harga_jual = '".$this->db->escape_str($harga_jual)."'
			,harga_beli = '".$this->db->escape_str($harga_beli)."'
			,stok = '".$this->db->escape_str($stok)."'
		";
					
		$select = $this->db->query("
			UPDATE barang
			SET
				".$data."
			WHERE
				id = ".$this->db->escape_str($id)."
		");

		if($select){
			return 'success';
		} else {
			return 'failed';
		}
	}

	function delete_barang($id){
		$this->db->where('id', $id);
		$this->db->delete('barang');
	}
}
?>
