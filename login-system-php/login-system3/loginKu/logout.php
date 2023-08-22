<?php
  // tempat mengakhiri session / logout systemnya
  // sehinnga halaman [login] menjadi default first show(tampilan awal);

  session_start();
  $_SESSION = [];
  
  
  session_unset();
  
  session_destroy();

  header("Location: login.php");
  exit;

?>