<?php
  session_start();

  if ( !isset($_SESSION["login"])) {
 
   header("Location: login.php");
   exit;
  }


require 'functions1.php';

// ambil dari url[superglobal var]
$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// Apakah tombol pernah dipencet atau tidak
if (isset($_POST["submit"])) {
   
    // Cek apakah data lebih besar dari nol / berarti ada data yg masuk
    // $_POST [data yang dari form diambil terus ditangkap oleh $_POST]
    if (update($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diupdate!');
        document.location.href = 'index.php';
        </script>
        ";
        // Ini script redirect dari JavaScript
    } else {
        echo "
        <script>
        alert('Data gagal diupdate!');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <style>
label {
  display: block;
}

button {
  display: block;
  margin-left: 38px;
}

a {
  display: block;
  margin-left: 38px;
  margin-bottom: 10px;
}

   </style>
</head>
<body>

    <h1>Update Data Mahasiswa</h1>

    <!-- Form : action untuk menentukan akan dikirimkan ke mana (default: halamannya sendiri) -->
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
           <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
           <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
            <li>
                <label for="nrp">NRP :</label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"]; ?>">
                <!-- Artinya kalau form kosong tidak diijinkan (required) -->
            </li>

            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>">
            </li>

            <li>
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"]; ?>">
            </li>

            <li>
                <label for="jurusan">Jurusan :</label> 
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </li>

            <li>
                <label for="gambar">Gambar :</label> <br>
                <img src="img/<?= $mhs["gambar"]; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>

        </ul>
        <button type="submit" name="submit">Update Data</button>
    </form>
    <br>
    <a href="index.php">Back to Homepage</a>
</body>
</html>
