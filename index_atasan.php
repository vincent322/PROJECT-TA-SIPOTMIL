<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/faviconlogo.png" type="image/ico" />

  <title> Sistem Informasi Perkara OTMIL II-09 Semarang</title>
  <!-- Bootstrap -->
  <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
</head>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <center>
              &nbsp; <a href="index.php" style="color:#fff;">
                <img src="assets/images/Logo.png" width="50" height="50">
                <span>
                  <font size="6" color="white" face="Helvetica Neue">SIPOTMIL</font>
                </span></a>
            </center>
          </div>

          <div class="clearfix"></div>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="index_atasan.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="index_atasan.php?page=tampil_berkas"><i class="glyphicon glyphicon-book"></i> Data Berkas Perkara <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="index_atasan.php?page=data_ijin"><i class="glyphicon glyphicon-tasks"></i> Data Ijin Masuk <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="index_atasan.php?page=history_ijin"><i class="glyphicon glyphicon-list"></i> History Data Perijinan <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="index_atasan.php?page=data_pengguna"><i class="glyphicon glyphicon-list-alt"></i> Data Pengguna Sistem <span class="fa fa-chevron"></span></a>
                </li>
                <li><a href="index_atasan.php?page=logout"><i class="fa fa-sign-out"></i> Logout <span class="fa fa-chevron"></span></a>
                </li>
                <li> Selamat datang, <?= $_SESSION['nama_lengkap'] ?> anda berhasil login sebagai atasan OTMIL II/09 Semarang </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="glyphicon glyphicon-arrow-left"></i></a>
          </div>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content - HALAMAN UTAMA ISI DISINI -->
      <div class="right_col" role="main">
        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
          case 'tampil_berkas':
            # code...
            include 'tampil_berkas.php';
            break;
          case 'data_berkas':
            # code...
            include 'data_berkas.php';
            break;
          case 'edit_berkas':
            # code...
            include 'edit_berkas.php';
            break;
          case 'edit_berkas_save':
            # code...
            include 'edit_berkas.php';
            break;
          case 'logout':
            # code...
            include 'logout.php';
            break;
          case 'edit_profile_save':
            # code...
            include 'updateprofile.php';
            break;
          case 'data_ijin':
            # code...
            include 'data_ijin.php';
            break;
          case 'history_ijin':
            # code...
            include 'history_ijin.php';
            break;
          case 'cetak_berkas':
            # code...
            include 'cetak_berkas.php';
            break;
          case 'data_pengguna':
            # code...
            include 'data_pengguna.php';
            break;
          case 'edit_user':
            # code...
            include 'edit_user.php';
            break;
          default:
            #code...
            include 'home.php';
            break;
        }
        ?>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Copyright @ 2021 SIPOTMIL
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="assets/js/custom.min.js"></script>

</body>

</html>