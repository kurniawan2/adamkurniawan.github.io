<?php 
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}


    if( isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if( mysqli_num_rows($result) === 1 ) {

            // cek password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]) ) {
                // set session
                $_SESSION["login"] = true;
                
                // cek remember me
                if( isset($_POST["remember"]) ) {
                    // buat cookie
                    setcookie('id',  $row['id'], time()+60);
                    setcookie('key', hash('sha256', $row['username']), time()+60);
                }

                header("Location: index.php");
                exit;
            }
        }

        $error = true;

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>
    <div class="container">
    <div class="row justify-content-center py-5">
    <div class="col-md-5">
    <div class="card">
    <div class="card-header mb-0"><h5 class="text-center">Login!</h5></div>
    <div class="card-body">
    

    <?php if( isset($error) ) : ?>
            <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
    
        <ul>
            <li>
            <div class="mb-3">
                <label for="username" class="form-label">Username :</label>
                <input type="text"  class="form-control" name="username" id="username">
            </div>
            </li>
            <li>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            </li>
            <li>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label for="remember" class="form-check-label">Remember me</label>
             <div>
            </li>
            <li>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </li>
        </ul>
    </form>
    </div>
</body>
</html>