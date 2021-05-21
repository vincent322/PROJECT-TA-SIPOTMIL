<?php
session_start();
include('config.php');

if (isset($_POST["login"])) {

  $username   =   $_POST['username'];
  $password   =   $_POST['password'];


  $result = mysqli_query($koneksi, "SELECT * FROM akses WHERE username = '$username'");

  // cek username
  //cek username
  if (mysqli_num_rows($result) == 1) {

    // cek password
    $row = mysqli_fetch_array($result);
    if (($password) == $row['password']) {

      // set session
      $_SESSION['login'] = 'true';
      $_SESSION['username'] = $username;
      echo "<script>alert('Akses berhasil, Selamat Datang'); window.location=('index.php');</script>";
    }
  } else {
    echo "<script>alert('Username atau password anda salah'); window.location=('login.php');</script>";
  }
}
