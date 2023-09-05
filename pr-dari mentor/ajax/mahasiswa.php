

<?php

require '../functions1.php';
$keyword = $_GET["keyword"];



$query =  "SELECT * FROM mahasiswa 
WHERE 
nama LIKE '%$keyword%' OR 
nrp LIKE '%$keyword%' OR
email LIKE '%$keyword%' OR
jurusan LIKE '%$keyword%' 
";

$mahasiswa = query($query);


?>

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