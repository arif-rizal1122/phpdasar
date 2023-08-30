



<?php

include("inc_header.php");

if(!in_array("siswa", $_SESSION['admin_akses'])){
    echo "kamu tidak punya akses";
    include ("inc_footer.php");
    exit();
}
?>

<h1>HALAMAN SISWA</h1>
Selamat datang di halaman Siswa

<?php

include("inc_footer.php");


?>