<?php 
	require('koneksi.php'); 
	session_start();

   if($_SERVER['REQUEST_METHOD']=="POST"){
      $username=mysql_real_escape_string($_POST['username']); 
      $password=mysql_real_escape_string($_POST['password']);

      #sql 
      $sql="SELECT user.username AS user, user_level.id_level,user_level.nama_level AS level FROM user_level INNER JOIN user WHERE username='$username' AND password='$password' AND user.level_id=user_level.id_level"; 

      $query=mysql_query($sql); 
      $count=mysql_num_rows($query);
       if($count == 1) {
            while($data=mysql_fetch_array($query)){
               $_SESSION['level']=$data['level'];
               $_SESSION['login_user'] = $data['user'];
            }
         header("location: main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   #end POST
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/workround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
               <div>
                     <a href = "fbconfig.php">Login with Facebook</a>
               </div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/workaround.js"></script>
  </body>
</html>
