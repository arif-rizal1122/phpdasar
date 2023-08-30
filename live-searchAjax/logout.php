<?php
  // tempat mengakhiri session / logout systemnya
  // sehinnga halaman [login] menjadi default first show(tampilan awal);

  session_start();
  $_SESSION = [];
  
  
  session_unset();
  
  session_destroy();
  // menghapus cookies
  
  setcookie("id", "", time() - 3600);
  setcookie("key", "", time() - 3600);

  header("Location: index.php");
  exit;

?>