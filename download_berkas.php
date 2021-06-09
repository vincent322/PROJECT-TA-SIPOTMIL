<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>
<?php
include('config.php');

if (isset($_GET['kode_registrasi'])) {
    $id = $_GET['kode_registrasi'];

    // fetch file to download from database
    $sql = "SELECT files FROM berkas WHERE kode_registrasi = '$id'";
    $result = mysqli_query($koneksi, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $file = $row['files'];
        $filepath = "uploads/" . $file;
    }

    // echo $filepath;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file));
        readfile('uploads/' . $file);
    }
}
?>