<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/Picture18.png" />
    <title>Application</title>
</head>

<body style="background: linear-gradient(90deg, hsla(177, 87%, 79%, 1) 0%, hsla(235, 89%, 70%, 1) 100%);">
    <div class="container d-flex justify-content-center mt-5 col-sm-3">
        <form action="login_proses.php" method="POST" class="border border-white rounded p-4 bg-white w-100">
            <h3 class="text-center">Login</h3>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" placeholder="Username" name="username" id="username" autocomplete="off" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password" id="password" autocomplete="off" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>