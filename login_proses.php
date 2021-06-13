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
      if ($level == "Atasan") {
        echo "<script>alert('Selamat Datang, Atasan!'); window.location=('index_atasan.php');</script>";
      } elseif ($level == "Lahkara") {
        echo "<script>alert('Selamat Datang, Staff Lahkara!'); window.location=('index_lahkara.php');</script>";
      } elseif ($level == "TAUD") {
        echo "<script>alert('Selamat Datang, Staff TAUD!'); window.location=('index_taud.php');</script>";
      } elseif ($level == "Oditur") {
        echo "<script>alert('Selamat Datang, Staff Oditur!'); window.location=('index_Oditur.php');</script>";
      } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
      }
    } else {
      echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
    }
  }
}
