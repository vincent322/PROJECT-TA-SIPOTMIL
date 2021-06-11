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
if (isset($_GET['username'])) {
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$user = $_GET['username'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM akses WHERE username='$user'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if (mysqli_num_rows($cek) > 0) {
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM akses WHERE username='$user'") or die(mysqli_error($koneksi));
		if ($del) {
			echo '<script>alert("Berhasil menghapus data."); document.location="index_atasan.php?page=data_pengguna";</script>';
		} else {
			echo '<script>alert("Gagal menghapus data."); document.location="index_atasan.php?page=data_pengguna";</script>';
		}
	} else {
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index_atasan.php?page=data_pengguna";</script>';
	}
} else {
	echo '<script>alert("ID tidak ditemukan di database."); document.location"index_atasan.php?page=data_pengguna";</script>';
}

?>
