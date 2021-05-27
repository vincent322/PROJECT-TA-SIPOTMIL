<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
?>

<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Edit Profile</font>
    </center>

    <hr>

    <?php
    include('config.php');
    $username = $_GET['username'];
    $data = mysqli_query($koneksi, "select * from akses where username='$username'");
    while ($row = mysqli_fetch_array($data)) {
    ?>

        <form method="POST" action="updateprofile.php" enctype="multipart/form-data">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="username" class="form-control" size="4" value="<?php echo $row['username']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                <div class="col-md-6 col-sm-6">
                    <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row['nama_lengkap']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
                <div class="col-md-6 col-sm-6">
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="Pangkat" class="form-control" value="<?php echo $row['Pangkat']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</div>