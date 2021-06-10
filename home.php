<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>

<center><br><br><br><br><br><br><br><br>
<img src="assets/images/Logo.png" width="200px height="200px" /> <br>
<font Size="6" face="Helvetica">Sistem Informasi</font> <br>
<font Size="6">Oditurat Militer II-09 Semarang</font>
</center>
