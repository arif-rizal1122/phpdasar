



<?php


session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit;
}

  include ("db.php");

  if (isset($_POST['submit'])) {
     $nama = ucwords($_POST['nama_category']);
     
     $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
        null,
        '".$nama."'
        ) ");

    if($insert) {
        echo '<script>alert("data-category ditambahkan")</script>';
        echo '<script>window.location="data-category.php"</script>';
             
    } else {
        echo 'gagal' .mysqli_error($conn);
    }    
  }
 

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN Tambah</title>
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
            <h3>Tambah Data Category</h3>
            <div class="box">


                <!-- form ubah data -->
                <form action="" method="post">

                    <input type="text" name="nama_category" class="input-control" placeholder="nama-category" required><br>

                    <input type="submit" name="submit" value="submit" class="button">
                </form>

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