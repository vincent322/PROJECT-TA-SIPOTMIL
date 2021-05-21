<?php
session_start();
if(!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}
?>

<center><br><br><br><br><br><br><br><br>
<img src="assets/images/Logo.png" width="200px height="200px" /> <br>
<font Size="6" face="Helvetica">Sistem Informasi Perkara</font> <br>
<font Size="6">Oditurat Militer II-09 Semarang</font>
</center>
