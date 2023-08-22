
<?php

session_start();
require 'functions1.php';
// cek cookie login
// if ( isset($_COOKIE["login"])) {
//     if( $_COOKIE["login"] == "true" ) {
//         $_SESSION["login"] = true;
//     }
// }

// cek cookies id
if ( isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil username berdasarkan id
    $result = mysqli_query($db, "SELECT username FROM users WHERE id = $id ");

    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ( $key === hash("sha256", $row["username"])) {
         $_SESSION["login"] = true;
    }
}


 if( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
 }






  if ( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE username ='$username'");

    // cek username mysqli_num_rows(untuk mengecek berapa baris yg dikembalikan)
    // biasanya digunakan untuk mencari baris duplikat
    if ( mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    // ini kebalikan dari hash kalo verify itu menerjemahkan hash

    if (password_verify($password, $row["password"])) {

       // set session 
       $_SESSION["login"] = true; 

       // cek remeber me
       if( isset($_POST["remember"])) {

        // buat cookies
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row["username"]), time() + 60);
        // setcookie("login", "true", time() + 60);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
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

    <h1>Halaman Login</h1>

    <?php if ( isset($error)) : ?>
    
        <p style="color: red; font-style: italic;">username / password salah</p>
  
    <?php endif;  ?>

    <form action="" method="post">

    <ul>

        <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
        </li>

        <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
        </li>

     <li>
        
     <label for="remember">remember me:</label>
     <input type="checkbox" name="remember" id="remember" >
 
     </li>

        <button type="submit" name="login">Login</button>
    
    </ul>
    </form>
    
</body>
</html>