
<?php
session_start();

include("inc_conn.php");

// jika admin username di login tidak dijalankan maka redirect ke login
if(!isset($_SESSION['admin_username'])){
    header("Location:login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
     <nav>
        <ul>
            <li><a href="admin_depan.php">Halaman depan</a></li>


            <?php if(in_array("guru", $_SESSION['admin_akses'])) { ?>
            <li><a href="admin_guru.php">Halaman guru</a></li>
            <?php } ?> 
            
            <?php if(in_array("siswa", $_SESSION['admin_akses'])) { ?>
            <li><a href="admin_siswa.php">Halaman siswa</a></li>
            <?php } ?>

            <?php if(in_array("spp", $_SESSION['admin_akses'])) { ?>
            <li><a href="admin_spp.php">Halaman Spp</a></li>
            <?php } ?>


            <li><a href="logout.php">Logout >></a></li>
        </ul>
     </nav>  
