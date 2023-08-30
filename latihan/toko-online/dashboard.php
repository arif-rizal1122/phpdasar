<?php
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DASHBOARD</title>
    <link rel="stylesheet" href="css/style.css">

    <link href="http://googleapis.com/css2?family-Quicksand&display=swap" rel="stylesheet">

</head>

<body>
    <!-- header -->
    <header>
        
        <div class="container">
        <h1><a href="dashboard.php">Toko | Online</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-category.php">Data Category</a></li>
            <li><a href="data-produk.php">Data Product</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>

      </div> 
    </header>
    
    <!-- content -->
    
      <div class="section">
         <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?= $_SESSION['a_global']->admin_name ?></h4>
            </div>
         </div>
      </div>

    <!-- footer -->
    
    <footer>
        <div class="container">
            <small>Copyright &copy; 2023 - Toko-Online </small>
        </div>
    </footer>

</body>
</html>