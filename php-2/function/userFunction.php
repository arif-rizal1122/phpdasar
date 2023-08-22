

<?php  
// function salam($waktu= "datang", $nama="dhika")
function salam($waktu, $nama) {
    return "selamat  $waktu , $nama";
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1><?php echo salam("siang", "sandhika"); ?></h1>
  
</body>
</html>