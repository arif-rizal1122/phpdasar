<?php
// pengulangan
// for
// while
// do.. while
// foreach : pengulangan khusus array

// for( $i = 0; $i < 5; $i++ ) {
//     // echo "hello world" . " " ;
//     echo "hello world ";
// }

// selamat nilai nya true maka eksekusi
// kalau nilainya fals diawal maka ia tidak akan mengeksekusi


// $i = 0;
// while( $i < 5 )  {
//     echo "hello world <br>";
//     $i++;
// }

// jenis looping ini mirip dengan while 
// walaupon nilai pertama nya fals maka jalankan sekali setelah itu berhenti
// $i = 10;
// do {
//     echo "hello world <br>";
//         $i++;
// } while ($i < 5);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <!-- pembuatan kolom -->
    <table border="1" cellpadding="10" cellspacing="0">
    

    
    <?php for( $i = 1; $i <= 5; $i++) : ?>
        <tr>
            <?php for( $j = 1; $j <= 5; $j++ ) : ?>
                <td><?= "$i, $j"; ?></td>
                <?php endfor; ?>
        </tr>
        <?php endfor; ?>
        
    
    </table>
</body>
</html>