<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

echo "<script>alert('Logout berhasil'); window.location=('login.php');</script>";
exit;
