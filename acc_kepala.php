<?php
include('config.php');
$kode= $_GET['kode_registrasi'];

$sql = mysqli_query($koneksi, "UPDATE berkas SET status_berkas = 'Diproses Kepala' WHERE kode_registrasi = '$kode'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Permohonan Acc ke Kepala berhasil dikirim"); document.location="index_lahkara.php?page=lahkara_cek";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses .</div>';
}