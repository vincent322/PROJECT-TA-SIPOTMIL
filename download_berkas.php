<?php

include('config.php');

   if (isset($_GET['kode_registrasi'])) {
    $id = $_GET['kode_registrasi'];

    // fetch file to download from database
    $sql = "SELECT files FROM berkas WHERE kode_registrasi=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['files'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['files']);
    }

}
?>