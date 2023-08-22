<?php
  session_start();

 if ( !isset($_SESSION["login"])) {

  header("Location: login.php");
  exit;
 }

  require "functions1.php";
  // query ini adalah function
  $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

  
  // tombol cari di klik
  if( isset( $_POST["cari"] )) {
    $mahasiswa = cari($_POST["keyword"]);
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Tampilan</title>
</head>
<body>

<a href="logout.php">logout</a>

<h1>Tampilan Mahasiswa</h1>

<!-- link tambah -->
<a href="tambah.php">tambah data mahasiswa</a>
<br><br>
<a href="registrasi.php">Registrasi!</a>
<br><br>

<!-- ini link searching -->
<form action="" method="post">

  <input type="text" name="keyword" size="40" autofocus placeholder="masukan key woards pencarian.." autocomplete="off">

  <button type="submit" name="cari">cari!</button>

</form>
<br><br>

<!-- table -->
<table border="1" cellpadding="10" ceelspacing="">

  <tr>
    <th>no.</th>
    <th>aksi</th>
    <th>gambar</th>
    <th>nrp</th>
    <th>nama</th>
    <th>email</th>
    <th>jurusan</th>
  </tr>

  

    <?php $u = 1; ?>
    <?php foreach( $mahasiswa as $row) : ?>
     <tr>
      <td> <?= $u; ?></td>
      <td>
        <!-- tombol ubah -->
        <a href="update.php?id=<?= $row["id"]; ?>;">ubah</a>  |
        
        <!-- tombol hapus -->
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick=" return confirm('yakin');">hapus</a>
        
      </td>
      <td>
        <img src="img/<?= $row["gambar"];?>" width="10%">
      </td>

    <td><?= $row["nrp"]; ?></td>
    <td><?= $row["nama"]; ?></td>
    <td><?= $row["email"]; ?></td>
    <td><?= $row["jurusan"]; ?></td>

  </tr>
<?php $u++; ?>  
<?php endforeach; ?>  
</table>

</body>
</html>



<!-- session adalah mekanisme penyimpana informasi ke dalam variabel agar bisa digunakan di lebih dari satu halaman 

informasi- informasi pada session itu disimpan dalam server 

session dan cookie memiliki persamaan sebagai informasi/nilai yg digunakan untuk berbagai halaman cuman bedanya kalau cookie trsimpan dalam sisi client nya sedangkan session tersimpan di sisi server..
-->
