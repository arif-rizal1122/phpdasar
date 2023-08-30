

<?php

include("inc_header.php");
if(!in_array("guru", $_SESSION['admin_akses'])){
    echo "kamu tidak punya akses";
    include ("inc_footer.php");
    exit();
}
?>

<h1>HALAMAN GURU</h1>
Selamat datang di halaman guru

<?php

include("inc_footer.php");


?>