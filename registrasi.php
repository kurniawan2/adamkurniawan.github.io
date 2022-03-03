<?php 
require 'functions.php';
if( isset($_POST["register"]) ) {
    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row justify-content-center py-5">
    <div class="col-md-5">
    <div class="card">
    <div class="card-header mb-0"><h5 class="text-center">Registrasi!</h5></div>
    <div class="card-body">
    
    <form action="" method="post">
        <ul>
            <li>
                <div class="mb-3">
                <label for="username" class="form-label">username :</label>
                <input type="text" class="form-control" name="username" id="username">
                </div>
            </li>
            <li>
                <div class="mb-3">
                <label for="password" class="form-label">password :</label>
                <input type="password" class="form-control" name="password" id="password">
                </div>
            </li>
            <li>
                <div class="mb-3">
                <label for="password2" class="form-label">konfirmasi password :</label>
                <input type="password" class="form-control" name="password2" id="password2">
                </div>
            </li>
            <li>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="register">Registrasi</button>
            </li>
        </ul>
    </form>
    </div>

</body>
</html>