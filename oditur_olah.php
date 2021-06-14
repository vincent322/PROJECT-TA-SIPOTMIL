<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>

<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
    <center>
        <font size="6">Form Olah Oditur</font>
    </center>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if (isset($_GET['kode_registrasi'])) {
        //membuat variabel $id untuk menyimpan id dari GET id di URL
        $kode = $_GET['kode_registrasi'];

        //query ke database SELECT tabel mahasiswa berdasarkan id = $id
        $select = mysqli_query($koneksi, "SELECT * FROM berkas WHERE kode_registrasi='$kode'") or die(mysqli_error($koneksi));

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
        $catatan                 = $_POST['catatan'];
        $file_lama = $_POST['file_lama'];

        if (!file_exists($_FILES['files']['tmp_name']) || !is_uploaded_file($_FILES['files']['tmp_name'])) {
            $nama_file = $file_lama;
        } else {
            $nama_file = $_FILES['files']['name'];
            $tmp_name = $_FILES['files']['tmp_name'];
        }

        // cek yang diupload files
        $ekstensiFilesValid = ['zip', 'rar'];
        $ekstensiFiles = explode('.', $nama_file);
        $ekstensiFiles = strtolower(end($ekstensiFiles));
        if (!in_array($ekstensiFiles, $ekstensiFilesValid)) {
            echo '<script>alert(" File harus diisi "); document.location="?page=tampil_berkas_oditur";</script>';
            return false;
        }


        # move uploaded file to server filepath.
        move_uploaded_file($tmp_name, 'uploads/' . $nama_file);

        $sql = mysqli_query($koneksi, "UPDATE berkas SET catatan='$catatan', status_berkas='Diproses Kepala Tahap Akhir', files='$nama_file' WHERE kode_registrasi='$kode'") or die(mysqli_error($koneksi));

        if ($sql) {
            echo '<script>alert("Berhasil menyimpan data."); document.location="?page=tampil_berkas";</script>';
        } else {
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Registrasi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="kode_registrasi" class="form-control" size="4" value="<?php echo $data['kode_registrasi']; ?>" readonly>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Tersangka</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_tersangka" class="form-control" value="<?php echo $data['nama_tersangka']; ?>" readonly>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Catatan</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="catatan" class="form-control" placeholder="Masukan Catatan">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">File</label>
            <div class="col-md-6 col-sm-6">
                <input type="file" name="files" class="form-control">
                <input type="hidden" name="file_lama" class="form-control" value="<?php echo $data['files']; ?>">
                Berkas sekarang : <?php echo $data['files']; ?>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </div>
    </form>
</div>