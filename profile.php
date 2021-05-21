<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
?>

<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">User Profile</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['username'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $username = $_GET['username'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM akses WHERE username='$username'") or die(mysqli_error($koneksi));

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

    <form>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="username" class="form-control" size="4" value="<?php echo $data['username']; ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['nama_lengkap']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>" required>
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
                <input type="text" name="pangkat" class="form-control" value="<?php echo $data['pangkat']; ?>" required>
            </div>
        </div>
</div>
</form>