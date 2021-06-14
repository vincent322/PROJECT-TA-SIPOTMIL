<?php
include('config.php');
$kode= $_GET['kode_registrasi'];

$sql = mysqli_query($koneksi, "UPDATE berkas SET status_berkas = 'Selesai' WHERE kode_registrasi = '$kode'") or die(mysqli_error($koneksi));

if ($sql) {
    echo '<script>alert("Berkas Perkara berhasil disetujui"); document.location="index_atasan.php?page=tampil_berkas_atasan";</script>';
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses .</div>';
}