<?php
include('config.php');

if (isset($_POST["login"])) {

  $username   =   $_POST['username'];
  $password   =   $_POST['password'];
  $level = $_POST['level'];

  $result = mysqli_query($koneksi, "SELECT * FROM akses WHERE username = '$username' AND level = '$level'");
  $user_valid = mysqli_fetch_array($result);
  //jika username terdaftar
  if ($user_valid) {
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
      //jika password sesuai
      //buat session
      session_start();

      // set session username
      $_SESSION['login'] = 'true';
      $_SESSION['username'] = $username;
      $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
      $_SESSION['level'] = $user_valid['level'];
      //uji level user
      if ($level == "Kepala") {
        echo "<script>alert('Selamat Datang, Kepala!'); window.location=('index.php');</script>";
      } elseif ($level == "WakilKepala") {
        echo "<script>alert('Selamat Datang, Wakil Kepala!'); window.location=('index.php');</script>";
      } elseif ($level == "StaffPenyidik") {
        echo "<script>alert('Selamat Datang, Staff Penyidik!'); window.location=('index.php');</script>";
      } elseif ($level == "StaffTAUD") {
        echo "<script>alert('Selamat Datang, Staff TAUD!'); window.location=('index.php');</script>";
      } elseif ($level == "Admin") {
        echo "<script>alert('Selamat Datang, Admin!'); window.location=('index.php');</script>";
      }
    } else {
      echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
  } else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
  }
}
