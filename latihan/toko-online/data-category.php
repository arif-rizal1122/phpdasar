






<?php
session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit;
}

include ("db.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DATA CATEGORY</title>
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
            <h3>Data-Category</h3>
            <div class="box">
                <a href="tambah-category.php">Tambah</a>
               <table border="1" cellspacing="0" class="table">
                  <thead>
                    <!-- tr = baris -->
                    <tr>
                        <th width="16px">No</th>
                        <th>Kategory</th>
                        <th width="150px">Aksi</th>                        
                    </tr>
                  </thead>

                  <tbody>

                    <?php 
                    $no = 1;
                    
                    $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");

                    while($row = mysqli_fetch_array($category)) {
     
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['category_name']; ?></td>
                        <td>
                            <!-- "edit-category.php?id= artinya kita menuju halaman edit-category sambil kirim id nya juga -->
                            <a href="edit-category.php?id=<?= $row['category_id'] ?>">Edit || <a href="proses-hapus.php?id=<?= $row['category_id'] ?>">Hapus</a></a>
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
               </table>
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