<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}
$username = $_SESSION['username'];
?>

<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">User Profile</font>
    </center>

    <hr>

    <?php
    include('config.php');
    $query = "select * from akses where username='$username'";
    $result = mysqli_query($koneksi, $query);
    while ($row = mysqli_fetch_array($result)) :
    ?>

        <form>
            <a href="index.php?page=edit_profile&username=<?php echo $row['username']; ?>"> <i class="btn btn-primary">Edit Berkas</i> </a>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="username" class="form-control" size="4" value="<?php echo $row['username']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Lengkap</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row['nama_lengkap']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
                <div class="col-md-6 col-sm-6">
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $row['tanggal_lahir']; ?>" readonly required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="Pangkat" class="form-control" value="<?php echo $row['Pangkat']; ?>" readonly required>
                </div>
            </div>
        </form>
    <?php
    endwhile;
    ?>
</div>