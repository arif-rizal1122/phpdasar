<?php

// pengkondisian \ percabangan
// if else
// if else if else
// ternary
// switch 

// contoh 1
// $x = 20;

// if( $x < 20 ) {
//     echo "benar";
// } else {
//     echo "salah";
// }    


// contoh 2
// $x = 20;

// if( $x < 20 ) {
//     echo "benar";
// } else if($x == 20) {
//     echo "bingo";
// } else {
//     echo "salah";
// }  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="1" cellpadding="10" cellspacing="0">

    <?php for( $i = 1; $i <= 5; $i++) : ?>
        <?php if( $i % 2 == 0 ) : ?>
           <tr class="warna-baris">
        <?php else : ?>
           <tr>
        <?php endif; ?>
            <?php for( $j = 1; $j <= 5; $j++ ) : ?>
                <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
        </tr>
        <?php endfor; ?>

</table>
    
</body>
</html>