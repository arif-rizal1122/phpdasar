

<?php 
session_start();
if(isset($_SESSION['admin_username'])){
    header("Location:admin_depan.php");
}




include ("inc_conn.php");

   // set default 
   $username = "";
   $password = "";
   $err = "";

// jika tombol login di pencet maka jalankan script slnjtnya
if (isset($_POST['login'])) {
    // ambil value mengunakan $_POST
    $username = $_POST['username'];
    $password = $_POST['password'];

    // jika data tidak diisikan  maka jalankan
    if($username == '' or $password == '') {
       $err .= "<li> silahkan masukan username / password </li>";
    }

    // setelah dipastikan username sudah diisi maka jalankan perintah selanjutnya

    if (empty($err)) {
        $sql = "SELECT * FROM admin WHERE username = '$username'";
        $Q = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($Q);

        // cek isian table admin yg berupa kolom password
        if($row['password'] != md5($password) ) {
            $err .= "<li> Akun tidak ditemukan! </li>"; 
        }

        // cek hak akses di databases
        if (empty($err)) {
            $login_id = $row['login-id'];
            $sql = "SELECT * FROM admin_akses WHERE login_id = '$login_id'";

            $Q = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($Q)) {
                $akses [] = $row['akses-id']; // spp, guru, spp
            }
            // jika tidak punya akses
            if (empty($akses)) {
                $err .= "<li> Tidak punya akses kehalaman admin </li>";
            }
        }
        

        if(empty($err)) {
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_akses'] = $akses;
            header("Location:admin_depan.php");
            exit();
        }

    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <div id="app">
    <form action="" method="post">
     <h1>HALAMAN LOGIN</h1>   
     <?php 
     
    if($err) {
        echo "<ul>$err</ul>";
    }

     ?>
     <input type="text" name ="username" placeholder="isikan username" class="input" value="<?= $username; ?>"><br><br>

     <input type="password" name="password" class="input" placeholder="isikan password"><br><br>

     <input type="submit" name="login" value="masuk ke system "><br><br>

    </form>
  </div>
    
</body>
</html>