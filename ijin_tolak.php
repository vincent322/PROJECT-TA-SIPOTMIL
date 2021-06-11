<?php
include('config.php');
$kode_ijin = $_GET['kode_ijin'];

$sql = mysqli_query($koneksi, "UPDATE ijin SET status = 'Ditolak' WHERE kode_ijin = '$kode_ijin'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Ijin berhasil Ditolak."); document.location="index_atasan.php?page=data_ijin";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses .</div>';
}