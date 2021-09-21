<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nutech Integrasi</title>
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#uploadImage").change(function(){
		var fileUpload = document.getElementById("uploadImage");
		var filePath = fileUpload.value;
		var allowedExtensions = /(\.jpg|\.png)$/i;
		var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Tipe file yang diizinkan hanya jpg dan png');
                fileUpload.value = '';
                return false;
            } else {
				if(size > 100) {
					alert("Size tidak boleh melebihi 100 KB");
                	fileUpload.value = '';
					return false;
				}
			}
	});
});
</script>
</head>
<body>

<div class="container">
	<div class="row">
		<h1 class="text-center">Nutech Integrasi</h1>
		<div class="row">
			<div class="col-md-10">
				<?php echo form_open(base_url().'home'); ?> 
					<div class="form-inline">
						<div class="form-group">
							<input type="text" class="form-control" name="name_search" id="nameSearch" placeholder="Nama" value="<?php echo isset($name_search)?$name_search:'';?>">
						</div>
						<input type="submit" name="search" class="btn btn-default" value="Cari">
					</div>
				</form>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				Tambah Barang
				</button>
			</div>
		</div>
		<br>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<?php echo form_open_multipart(base_url().'home'); ?> 
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Input Data Barang</h4>
					</div>
					<div class="modal-body">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nama Barang:</label>
								<input type="text" class="form-control" id="namaBarang" name="nama" required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="control-label">Image:</label>
								<input type="file" class="form-control" id="uploadImage" name="image" required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="control-label">Harga Jual:</label>
								<input type="number" class="form-control" id="hargaJual" name="harga_jual" required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="control-label">Harga Beli:</label>
								<input type="number" class="form-control" id="hargaBeli" name="harga_beli" required>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="control-label">Stok:</label>
								<input type="number" class="form-control" id="stok" name="stok" required>
							</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
					</div>
					</form>
				</div>
			</div>
		</div>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Foto</th>
				<th>Harga Jual</th>
				<th>Harga Beli</th>
				<th>Stok</th>
				<th>Action</th>
			</tr>
			<?php if(isset($listBarang) && count($listBarang)>0) { ?>
				<?php foreach($listBarang as $key => $value) { ?>
					<tr>
						<td><?php echo $key+1;?></td>
						<td><?php echo $value['nama'];?></td>
						<td><img width="150" src="<?php echo base_url().'assets/images/barang/'.$value['image'];?>" class="img-responsive"></td>
						<td><?php echo $value['harga_jual'];?></td>
						<td><?php echo $value['harga_beli'];?></td>
						<td><?php echo $value['stok'];?></td>
						<td><a href="<?php echo base_url().'home/edit/'.$value['id']; ?>" class="btn btn-info">Edit</a>&nbsp;<a href="<?php echo base_url().'home/delete/'.$value['id']; ?>" class="btn btn-warning" onclick="return confirm('Yakin Hapus?')">Delete</a></td>
					</tr>
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan="7" class="text-center">Data tidak ada</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>

</body>
</html>