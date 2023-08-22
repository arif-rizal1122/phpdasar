
<?php     
  // koneksi database 
  $db = mysqli_connect("localhost", "root", "", "phpdasar");
  // ambil data dari tabel mahasiswa / query data mahasiswa
  $result = mysqli_query($db, "SELECT * FROM mahasiswa");
  // var_dump($result);
  // if ( !$result) {
  //   echo mysqli_error($db);
  // }

  // ambil data mahasiswa (fetch) mahasiswa dari object result


  // mysqli_fetch_row(): mengembalikan array numeric/index angka...

  // mysqli_fetch_assoc(): mengembalikan array asosiative

  // mysqli_fetch_array(): bisa mengembalikan array asosiative dan numeric (flexibel) kekurangan bisa menduplicat(asosiative dan numeric)

  // mysqli_fetch_object() : ini kurang dipakai
  
  // $mhs = mysqli_fetch_row($result);
  // var_dump($mhs[3]);

  // $mhs = mysqli_fetch_assoc($result);
  // var_dump($mhs["jurusan"]);

  // $mhs = mysqli_fetch_array($result);
  // var_dump($mhs["jurusan"]);
  // var_dump($mhs[3]);

  
//  while ($mhs = mysqli_fetch_assoc($result)) {
//  var_dump($mhs);
// };
 

  


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document Admin</title>
</head>
<body>
 

    <h1>Daftar Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
<!-- tr adalah untuuk row nya -->

    <tr>
      <th>no.</th>
      <th>Aksi</th>
      <th>gambar</th>
      <th>nrp</th>
      <th>nama</th>
      <th>email</th>
      <th>jurusan</th>
    </tr>
    
    <?= $i = 1; ?>
    <?php while( $row = mysqli_fetch_assoc($result)) : ?>
     <tr>
      <td> <?= $i; ?></td>
      <td>
        <a href="">ubah</a>
        <a href="">hapus</a>
      </td>

      <td><img src="img/<?= $row["gambar"]; ?>" width="25%"></td>

      <td></td>
      <td>sandhika</td>
      <td>sdsds@gmail.com</td>
      <td>teknik industri</td>
     </tr>


     <?php $i++; ?>
     <?php endwhile; ?>

</table>  


</body>
</html>