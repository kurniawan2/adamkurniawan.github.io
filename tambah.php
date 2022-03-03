<?php 

session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "php");
// mengecek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    // mengambil data dari tiap elemen dalam form
    

    

    // mengecek apakah data berhasil ditambahkan atau tidak
   if( tambah($_POST) > 0 ) {
       echo "
            <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
            </script>
            ";
   } else {
        echo "
            <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
            </script>
    ";
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>
    <div class="container">
    <h1 class="text-center">Tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
            <div class="form-group">
                <label for="nim">NIM : </label>
                <input type="text" class="form-control" name="nim" id="nim" required>
            </div>
            </li>
            <li>
                <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" id="nama">
            </li>
            <li>
                <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" name="username" id="username">
                </div>
            </li>
            <li>
                <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email">
                </div>
            </li>
            <li>
                <div class="form-group">
                <label for="jurusan">Jurusan : </label>
                <input type="text" class="form-control" name="jurusan" id="jurusan">
                </div>
            </li>
            <li>
                <div class="form-group">
                <label for="gambar">Gambar : </label>
                <input type="file" class="form-control" name="gambar" id="gambar">
                </div>
            </li>
            <br>
            <li>
                <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                </div>
            </li>
        </ul>
    </form>
    
</body>
</html>