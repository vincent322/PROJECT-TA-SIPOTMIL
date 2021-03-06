<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>

<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Data</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['username'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $user = $_GET['username'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM akses WHERE username='$user'") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if (mysqli_num_rows($select) == 0) {
            echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
            exit();
            //jika hasil query > 0
        } else {
            //membuat variabel $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
    //jika tombol simpan di tekan/klik
    if (isset($_POST['submit'])) {
        $password                 = $_POST['password'];
        $nama                    = $_POST['nama_lengkap'];
        $tanggal                = $_POST['tanggal_lahir'];
        $pangkat                = $_POST['Pangkat'];
        $level                   = $_POST['level'];

        $sql = mysqli_query($koneksi, "UPDATE akses SET password='$password', nama_lengkap='$nama', tanggal_lahir='$tanggal', 
			Pangkat='$pangkat', level='$level' WHERE username='$user'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil merubah data."); document.location="index_atasan.php?page=data_pengguna";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="username" class="form-control" size="4" value="<?php echo $data['username']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
            <div class="col-md-6 col-sm-6">
                <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Pangkat" class="form-control" value="<?php echo $data['Pangkat']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" type="text" placeholder="level" name="level" autocomplete="off" required>
                    <option value="Atasan">Kepala</option>
                    <option value="TAUD">Staff TAUD</option>
                    <option value="Penyidik">Staff Penyidik</option>
                    <option value="Admin">Administrator</option>
                </select>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index_atasan.php?page=data_pengguna" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>