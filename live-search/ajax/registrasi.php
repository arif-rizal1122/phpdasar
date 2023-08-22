<?php

  require 'functions1.php';

  if ( isset($_POST["registrasi"])) {
    
    if( registrasi($_POST) > 0) {
        echo "<script>
          alert('user baru berhasil ditambahkan');
          document.location.href = 'index.php'
        </script>";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'registrasi.php'
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
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;

        }

        a {
            display: block;
            margin-left: 38px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
        <h2>Halaman Registrasi</h2>

        <form action="" method="post">

        <ul>
            <!-- username -->
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>

            <!-- password -->
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li> 

            <!-- password2 -->
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2">
            </li>

                <button type="submit" name="registrasi">Registrasi!
                </button>

        </ul>
        </form>
     <a href="index.php">Kembali Ke Halaman Utama</a>

</body>
</html>