<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>
<?php include('config.php'); ?>

<center>
    <font size="6">Pengajuan Cuti</font>
</center>
<hr>
<?php
$username = $_SESSION['username'];
if (isset($_POST['submit'])) {
    $tanggal_mulai          = $_POST['tanggal_mulai'];
    $tanggal_selesai        = $_POST['tanggal_selesai'];
    $jenis_ijin             = $_POST['jenis_ijin'];
    $keterangan             = $_POST['keterangan'];


    // update data ke database
    mysqli_query($koneksi, "INSERT INTO ijin VALUES('', '$username', '$tanggal_mulai', '$tanggal_selesai', '$jenis_ijin', '$keterangan', 'Pending')") or die(mysqli_error($koneksi));

    // mengalihkan halaman kembali ke index.php
    echo '<script>alert("Berhasil menyimpan data."); document.location="?page=pengajuan_ijin";</script>';
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="username" class="form-control" value="<?php echo $username ?>" readonly>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Mulai</label>
        <div class="col-md-6 col-sm-6">
            <input type="date" name="tanggal_mulai" class="form-control" required autocomplete="off">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Selesai</label>
        <div class="col-md-6 col-sm-6">
            <input type="date" name="tanggal_selesai" class="form-control" required autocomplete="off">
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Cuti</label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" type="text" placeholder="Jenis Cuti" name="jenis_ijin" autocomplete="off" required>
                <option value="Sakit">Sakit</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Keluarga">Urusan Keluarga</option>
                <option value="Dinas">Dinas Luar</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
    </div>
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="keterangan" class="form-control" required autocomplete="off">
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        </div>
    </div>
</form>
</div>