<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
?>

<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if (isset($_GET['kode_registrasi'])) {
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$kode = $_GET['kode_registrasi'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM berkas WHERE kode_registrasi='$kode'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) {
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM berkas WHERE kode_registrasi='$kode'") or die(mysqli_error($koneksi));
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="index_lahkara.php?page=tampil_berkas_lahkara";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="?index_lahkara.php?page=tampil_berkas_lahkara";</script>';
		}
	}
}	

?>
