<?php
include('config.php');
$kode_ijin = $_GET['kode_ijin'];

$sql = mysqli_query($koneksi, "UPDATE ijin SET status = 'Diterima' WHERE kode_ijin = '$kode_ijin'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Ijin berhasil Diterima."); document.location="index_atasan.php?page=data_ijin";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses .</div>';
}