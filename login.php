<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/faviconlogo.png" type="image/ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>SIPOTMIL Login</title>
</head>

<body>
    <div class="container">
        <a href="register.php" class="btn btn-danger">Daftar</a>
        <form action="login_proses.php" method="POST" class="border border-white rounded p-4 bg-white w-100">
            <h3 class="text-center">Login</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" placeholder="Input Username" name="username" id="username" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" placeholder="Input Password" name="password" id="password" autocomplete="off" required>
            </div>
            <div class="form-group">
            <label for="hak akses">Login Sebagai</label>
                <select class="form-control" type="password" placeholder="Pilih Hak Akses" name="level" id="level" autocomplete="off" required>
                    <option value="Atasan">Atasan</option>
                    <option value="TAUD">Staff TAUD</option>
                    <option value="Penyidik">Staff Penyidik</option>
                    <option value="Admin">Administrator</option>
                </select>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>