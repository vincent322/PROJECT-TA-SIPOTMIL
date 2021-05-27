<?php 
// koneksi database
include('config.php');
 
// menangkap data yang di kirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$jabatan = $_POST['jabatan'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$Pangkat= $_POST['Pangkat'];
 
// update data ke database
mysqli_query($koneksi,"update akses set  
password='$password', nama_lengkap='$nama_lengkap', jabatan='$jabatan',tanggal_lahir='$tanggal_lahir', 
Pangkat='$Pangkat' where username='$username'");
 
// mengalihkan halaman kembali ke index.php
echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=profile";</script>';
