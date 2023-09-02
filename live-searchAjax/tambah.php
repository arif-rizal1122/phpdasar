<?php
  session_start();

  if ( !isset($_SESSION["login"])) {
 
   header("Location: login.php");
   exit;
  }


require 'functions1.php';

// apakah tombol pernah dipencet atau tidak
if ( isset($_POST["submit"])) {
 


    // cek apakah data lebih besar dari nol / berarti ada data yg masuk
    // post [data yg dari form diambil terus ditangkap oleh data]
    if ( tambah($_POST) > 0) {

        
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'index.php'
        </script>
        ";
        // ini script redirect dari js
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php'
        </script>;
        ";  
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add data mhs</title>
    <style>
        label {
            display: block;
            
        }
    </style>
</head>
<body>

    <h1>add data mahasiswa</h1>

    <!-- form : action untuk menentukan akan dikirimkan kamana default : halamanya sendiri
    ini mesti ditulis agar bisa mengelola file itu sendiri enctype="multipart/form-data">-->

    <form action="" method="post" enctype="multipart/form-data">
   <ul>

    <li>
        <label for="nrp">NRP : </label>
        <input type="text" name="nrp" id="nrp" required>
        <!-- artinya kalau form kosong tidak djlnkn[required] -->
    </li>
    <li>
        <label for="nama">NAMA : </label>
        <input type="text" name="nama" id="nama">
    </li>
    <li>
        <label for="email"> EMAIL : </label>
        <input type="text" name="email" id="email">
    </li>
    <li>
        <label for="jurusan">JURUSAN : </label>
        <input type="text" name="jurusan" id="jurusan">
    </li>
    <li>
        <label for="gambar">GAMBAR : </label>
        <input type="file" name="gambar" id="gambar">
    </li>
   

   </ul>
        <button type="submit" name="submit">tambah data</button>
</form>
    
<a href="index.php">back to homepage</a>
</body>
</html>