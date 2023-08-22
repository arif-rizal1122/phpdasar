

<?php  
  // date / time untuk menampilkan tgl dgn format tertentu
//  echo date("l, d-M-Y");


// time
// UNIX Timestamp / EPOCH time
// detik yg sudah berlalu sjk 1/1/1978
// echo time();


////////////////////////////
// menampikan hari berdasarkan time()+172800 ) ke depanya
// echo date("l", time()+172800 )
// 60*60= 1jam, 1jam*24=1hari, 1hari*100= 100hari
// echo date("l", time()+60*60*24*100 );

// echo date("l, M-Y", time()-60*60*24*100);

// mk time = membuat sendiri fungsi detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo mktime(0,0,0,1,11,2000);

// aplikasi untuk mengetahui hari lahiran
// echo date("l", mktime(0,0,0,1,11,2000));

// strtotime kebalikan dari mktime
// echo strtotime("11 january 2000")


// string

/* 
1. strlen(): untuk menghitung panjang(lenght) dari sebuah string
2. strcmp(): untuk membandingkan 2 string
3. explode(): untuk memecah sebuah string menjadi array (dipakai untuk memanggil nama sebuah file/memecah )
4. htmlspecialchars(): untuk keamanan
*/


// utility

/* 
1. var_damn(): untuk mencetak isi dari sebuah variabel, array, object 
2. isset(): untuk mengecek apa kah sebuah variabel apa sudah pernah dibikin atau belum
3. empty(): untuk mengecek variabel apakah kosong atau tidak
4. die(): untuk memberhentikan program kita
5. slepp(): untuk memberhentikan sementara

*/
?>