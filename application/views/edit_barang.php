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
<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<h1 class="text-center">Nutech Integrasi</h1>
		
		<?php echo form_open_multipart(base_url().'home/edit'); ?>
			<h3>Edit Data Barang</h3>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
			<input type="text" class="form-control" id="imageExisting" name="image_existing" value="<?php echo $image; ?>">
			<div class="form-group">
				<?php echo isset($alert)?$alert:''; ?>
				<label for="recipient-name" class="control-label">Nama Barang:</label>
				<input type="text" class="form-control" id="namaBarang" name="nama" value="<?php echo $nama; ?>">
			</div>
			<div class="form-group">
				<label for="recipient-name" class="control-label">Image:</label>
				<input type="file" class="form-control" id="image" name="image">
			</div>
			<div class="form-group">
				<label for="recipient-name" class="control-label">Harga Jual:</label>
				<input type="text" class="form-control" id="hargaJual" name="harga_jual" value="<?php echo $harga_jual; ?>">
			</div>
			<div class="form-group">
				<label for="recipient-name" class="control-label">Harga Beli:</label>
				<input type="text" class="form-control" id="hargaBeli" name="harga_beli" value="<?php echo $harga_beli; ?>">
			</div>
			<div class="form-group">
				<label for="recipient-name" class="control-label">Stok:</label>
				<input type="text" class="form-control" id="stok" name="stok" value="<?php echo $stok; ?>">
			</div>
			<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
			<a href="<?php echo base_url().'home'; ?>" class="btn btn-default">Batal</a>
		</form>
	</div>
</div>

</body>
</html>