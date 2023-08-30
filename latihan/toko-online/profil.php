<?php


session_start();

if ($_SESSION['status_login'] != true) {
    header("Location: login.php");
    exit;
}

  include ("db.php");

 $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");

 $d = mysqli_fetch_object($query);
 

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN Profil</title>
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
            <h3>Profil</h3>
            <div class="box">


                <!-- form ubah data -->
                <form action="" method="post">

                    <input type="text" name="nama" class="input-control" placeholder="nama-lengkap" value="<?= $d->admin_name ?>" required><br>


                    <input type="text" name="user" class="input-control" placeholder="nama-user" value="<?= $d->username ?>" required><br>


                    <input type="text" name="hp" class="input-control" placeholder="nomor hp" value="<?= $d->admin_telp ?>" required><br>


                    <input type="email" name="email" class="input-control" placeholder="email" value="<?= $d->admin_email ?>" required><br>


                    <input type="text" name="alamat" class="input-control" placeholder="alamat" value="<?= $d->admin_address ?>" required><br>


                    <input type="submit" name="submit" value="Ubah Profil" class="button">

                    

                </form>

                <?php 
                
                if (isset($_POST['submit'])) {

                    // tampung data pada $_post
                    $nama   = ucwords($_POST['nama']);

                    $user   = $_POST['user'];

                    $hp     =  $_POST['hp'];

                    $email  = $_POST['email'];

                    $alamat = ucwords($_POST['alamat']); 



                    $queryUpdate = mysqli_query($conn, "UPDATE tb_admin SET 
                            admin_name = '".$nama."',
                            username = '".$user."',
                            admin_telp = '".$hp."',
                            admin_email = '".$email."',
                            admin_address = '".$alamat."'
                            WHERE
                            admin_id = '".$d->admin_id."'
                             ");

                    if($queryUpdate){
                        echo '<script> alert ("ubah data berhasil") </script>';
                        echo '<script>window.location="profil.php"</script>';
                       
                    } else {
                        echo "gagal" .mysqli_error($conn);
                    }

                }
                
                ?>


            </div>

            <!-- form ubah password -->
            <h3>Ubah Password</h3>
            <div class="box">

                <form action="" method="post">

                    <input type="password" name="passwordBaru" class="input-control" placeholder="password" required><br>


                    <input type="password" name="konfirmasi" class="input-control" placeholder="konfirmasi" required><br>

                    <input type="submit" name="ubah-password" value="Ubah Password" class="button">

                    

                </form>


                <?php 
                
                if (isset($_POST['ubah-password'])) {

                    // tampung data pada $_post
                    $password = $_POST['passwordBaru'];

                    $konfirmasi = $_POST['konfirmasi'];

                    if($password != $konfirmasi) {
                        echo "<script>alert('konfirmasi Password Tidak sesuai')</script>";
                    } else {
                        $Update_password = mysqli_query($conn, "UPDATE tb_admin SET 
                         password = '".md5($password)."'
                         WHERE
                         admin_id = '".$d->admin_id."'  ");

                         if($Update_password){
                         echo '<script> alert ("ubah data berhasil") </script>';
                         echo '<script>window.location="profil.php"</script>';
                         } else {
                        echo "gagal" .mysqli_error($conn);

                         }  
                    }
                }
                
                ?>


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