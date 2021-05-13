<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Data</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {
	$kode			= $_POST['kode_registrasi'];
	$nama			= $_POST['nama_tersangka'];
	$tanggal		= $_POST['tanggal'];
	$kesatuan		= $_POST['kesatuan'];
	$status			= $_POST['status_berkas'];
	$nama_file = $_FILES['files']['name'];
    $tmp_name = $_FILES['files']['tmp_name'];
    $file_size = $_FILES['files']['size'];
    $ekstensi = explode('.', $nama_file);
    $ekstensi = strtolower(end($ekstensi));

    # define allowed format to upload
    $allowed_format = ['zip'];

    # check if uploaded file is an allowed format
    if(!in_array($ekstensi, $allowed_format)) {
		echo '<script>alert("Berhasil menambahkan data baru."); document.location="index.php?page=tambah_berkas";</script>';
    }

    # check if uploaded file is smaller than 3MB
    if ($file_size > 3000000) {
		echo '<script>alert("Berhasil menambahkan data baru."); document.location="index.php?page=tampil_berkas";</script>';
    }

    # set default file name to save in server.
    $save_file = strtolower($kode) . "." . $ekstensi;

    # move uploaded file to server filepath.
    move_uploaded_file($tmp_name, '../../../upload/' . $save_file);
	

	$cek = mysqli_query($koneksi, "SELECT * FROM berkas WHERE kode_registrasi='$kode'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($koneksi, "INSERT INTO berkas(kode_registrasi, nama_tersangka, tanggal, kesatuan, status_berkas, files) 
		VALUES('$kode', '$nama', '$tanggal', '$kesatuan', '$status', '$save_file)") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menambahkan data baru."); document.location="index.php?page=tampil_berkas";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, Kode Berkas sudah terdaftar.</div>';
	}
}
?>

<form action="index.php?page=tambah_berkas" method="post">
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Kode Registrasi</label>
		<div class="col-md-6 col-sm-6 ">
			<input type="text" name="kode_registrasi" class="form-control" size="4" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tersangka</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nama_tersangka" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
		<div class="col-md-6 col-sm-6">
			<input type="date" name="tanggal" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Kesatuan</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="kesatuan" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Status Berkas</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="status_berkas" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align" >File</label>
		<div class="col-md-6 col-sm-6">
			<input type="file" name="files" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
		</div>
</form>
</div>