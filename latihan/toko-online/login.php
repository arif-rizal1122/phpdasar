        
<?php 




if( isset($_POST['submit'])) {


  session_start();

  include ('db.php');



   $username = mysqli_escape_string($conn, $_POST['username']); 
   $password = mysqli_escape_string($conn, $_POST['password']);

   $cek = mysqli_query ($conn, "SELECT * FROM tb_admin WHERE username = '".$username."' AND password = '".md5($password)."' ");

   if(mysqli_num_rows($cek) > 0 ){
      // jika true cek session
       $d = mysqli_fetch_object($cek);
       // set session
       $_SESSION['status_login'] = true;
       $_SESSION['a_global'] = $d;
       $_SESSION['id'] = $d ->admin_id;

       echo '<script>window.location="dashboard.php"</script>';

   } else {
       echo "<script>
       alert('username / password salah !'); 
         </script>  
         ";
   };

  

}

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | toko online</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- <link href="http://googleapis.com/css2?family-Quicksand&display=swap" rel="stylesheet"> -->

</head>

<body id="bg-login">
    
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="post">

            <input type="text" name="username" placeholder="Username" class="input-control"> <br>

            <input type="password" name="password" placeholder="Password" class="input-control"><br>

            <input type="submit" name="submit" value="login" class="button"><br>

        </form>

    </div>

</body>

</html>