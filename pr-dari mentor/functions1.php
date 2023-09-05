

<?php

    // koneksi database  
    $db = mysqli_connect("localhost", "root", "", "phpdasar"); 

    // ambil data dari tabel mahasiswa / query data mahasiswa
    // ini menampilkan 
    function  query($query) { 
      // ini yg diambil di index nya query("SELECT * FROM mahasiswa");
      global $db;
      $result = mysqli_query($db, $query);
      // rows adl wadah[array] kosong yg disiapkan
      $rows = [];
               // row adalh baju yg diambil dari loop
        while ($row = mysqli_fetch_assoc($result)) {
          // taruh baju kdlm kotak
           $rows[] = $row;
        }
        // kembalikan kotak[rows adl array assoc]
     return $rows;
    }



    function tambah($data) {
    // ini menambah data
      global $db;
      // ambil data dari tiap element dalam form
      $nrp = htmlspecialchars($data["nrp"]);
      $nama = htmlspecialchars($data["nama"]);
      $email = htmlspecialchars($data["email"]);
      $jurusan = htmlspecialchars($data["jurusan"]);
      $user_id = $_SESSION["user_id"];


      $gambar = upload();
      if( !$gambar ) {
        return false;
      }

      $query = "INSERT INTO mahasiswa_id
                  VALUES
                ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar', '$user_id')";
      mysqli_query($db, $query);
      
      return mysqli_affected_rows($db);
    }  
    


// upload

function upload() {
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];


  // cek apakah tidak ada gambar yg diuopload
  if($error === 4 ) {
    echo "<script> 
    alert('pilih gambar terlebih dahulu');
         </script>";
    return false;     
  }
  // cek apakah extensi file yg boleh diupload
  $ExtensionsGambarValid = ['jpg', 'jpeg', 'png'];
  // triki
  $extensiGambar = explode('.', $namaFile);

  $extensiGambar = strtolower(end($extensiGambar));

  // ada gk string didalm sebuah array
  if( !in_array($extensiGambar, $ExtensionsGambarValid)) {
    echo "<script> 
    alert('yg anda upload bukan gambar');
         </script>";
    return false;     
  }
  // cek size file yg ingin diupload
  if($ukuranFile > 1000000) {
    echo "<script> 
    alert('ukuran gambar terlalu besar');
         </script>";
  }
  // lolos pengecekan gambar siap diupload
  // generate nama gambar baru agar tidak ditimpa nama lama
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensiGambar;

   
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}


function hapus($id) {
  global $db;

  mysqli_query($db, "DELETE FROM mahasiswa_id WHERE id = $id");

  return mysqli_affected_rows($db);
}

// ubah itu menampung dulu data 
function update($data) {
  global $db;
  
  $id = $data["id"];
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambar = htmlspecialchars($data["gambar"]);
  
  $query = "UPDATE mahasiswa_id SET 
  nrp = '$nrp',
  nama ='$nama',
  email = '$email',
  jurusan = '$jurusan',
  gambar = '$gambar'
  WHERE id = $id
  ";
  
  // jalankan query
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}


// function cari($keyword) {                     
//   $query = "SELECT * FROM mahasiswa_id 
//   WHERE 
//   nama LIKE '%$keyword%' OR 
//   nrp LIKE '%$keyword%' OR
//   email LIKE '%$keyword%' OR
//   jurusan LIKE '%$keyword%' 
//   ";
   
//    // kembalikan hasilnya berdasarkan array assoc
//    return query($query);
// }



  // registrasi
  function registrasi($data) {
  global $db;

  // stripslashe = ini adl fungsi agar menghilankan karacter tertentu di input nya
  $username = strtolower(stripslashes($data["username"]));
  // mysqli_real_escape_string = ini untuk memungkinkan user memasukan password berupa karakter tertentu sekaligus enkripsi nya
  $password = mysqli_real_escape_string($db, $data["password"]);
  //  SQL injection dengan menghindari karakter khusus dalam sebuah string sebelum digunakan dalam sebuah query SQL. Fungsi ini membantu melindungi aplikasi dari serangan yang dapat menyisipkan kode berbahaya ke dalam pernyataan SQL. Fungsi ini [mysqli_real_escape_string]
  $password2 = mysqli_real_escape_string($db, $data["password2"]);

  // cek username duplikat
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($db, $sql);
  
  if( mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('username sudah terdaftar');
    </script>";
    return false;
  }

  // cek konfirmasi password

  if ( $password !== $password2 ) { 
    echo "<script>
    alert('konfirmasi password tidak sesuai');
    </script>";
    return false;
  } 
  // enkripsi / mengamankan password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan userbaru ke database
  
  mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$password')");

  return mysqli_affected_rows($db);

  }


?>