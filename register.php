<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/faviconlogo.png" type="image/ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>
            <center>Register Account</center>
        </h1>

        <?php
        include('config.php');
        if (isset($_POST['registrasi'])) {
            $username            = $_POST['username'];
            $password            = $_POST['password'];
            $nama                = $_POST['nama_lengkap'];
            $jabatan             = $_POST['jabatan'];
            $tgllahir            = $_POST['tanggal_lahir'];
            $pangkat            = $_POST['pangkat'];


            $cek = mysqli_query($koneksi, "SELECT * FROM akses WHERE username='$username'") or die(mysqli_error($koneksi));

            if (mysqli_num_rows($cek) == 0) {
                $sql = mysqli_query($koneksi, "INSERT INTO akses(username, password, nama_lengkap, jabatan, tanggal_lahir, pangkat) 
		VALUES('$username', '$password', '$nama', '$jabatan', '$tgllahir', '$pangkat')") or die(mysqli_error($koneksi));

                if ($sql) {
                    echo '<script>alert("Registrasi Berhasil."); document.location="login.php";</script>';
                } else {
                    echo '<div class="alert alert-warning">Gagal melakukan registrasi.</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Gagal, Username sudah terdaftar.</div>';
            }
        }
        ?>

        <form action="" method="POST" class="border border-white rounded p-4 bg-white w-100">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" placeholder="Input Username" name="username" id="username" autocomplete="off" autofocus required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" placeholder="Input Password" name="password" id="password" autocomplete="off" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" placeholder="Konfirmasi Password" name="password2" id="password2" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input class="form-control" type="text" placeholder="Input Nama Lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input class="form-control" type="text" placeholder="Input Jabatan" name="jabatan" id="jabatan" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input class="form-control" type="date" placeholder="" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="pangkat">Pangkat</label>
                <input class="form-control" type="text" placeholder="Input Pangkat" name="pangkat" id="pangkat" autocomplete="off" required>
            </div>
            <button type="submit" name="registrasi" class="btn btn-primary">Submit</button>
            <a href="login.php" class="btn btn-info">Back</a>
        </form>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("password").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Password Tidak Sama, Coba Lagi");
            else
                document.getElementById("password2").setCustomValidity('');
        }
    </script>
    </div>
</body>

</html>