<?php 
// mengaktifkan session php
session_start();
 
// menghapus semua session
session_destroy();
echo "<script>alert('Logout berhasil'); window.location=('login.php');</script>";
exit;
