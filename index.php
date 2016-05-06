

<?php include 'dbconnect.php' ?>
<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootstrap Login Form</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>
    <?php
    //checking login and session
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      $msg = '';

      if (isset($_POST['login']) && !empty($_POST['username']) 
         && !empty($_POST['password']))
      {
       $username1 = $_POST['username'];
       $password1 = $_POST['password'];





       $sql= "SELECT * FROM users WHERE username='$username1' AND password='$password1'";
       if($query_run = mysqli_query($conn, $sql))
       {
          $query_num_rows = mysqli_num_rows($query_run);
          $stmt =mysqli_prepare($conn, $sql);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);

          if($query_num_rows==1)
          {
             $row = mysqli_fetch_assoc($query_run);
             $user_id =  $row['id'];
             $name=$row['name'];
             //creating session
             $_SESSION['valid'] = true;
             $_SESSION['timeout'] = time();
             $_SESSION['userid'] = $user_id;
             $_SESSION['name'] = $name;
             header("Location:calander2.php");

             echo 'logedd in';
           }
          

       
       else 
       {
         $msg = '*Wrong username or password';
      }
    }
   }
   ?>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
        
          <h1 class="text-center">Login</h1>
           <h4 ><?php echo "<center>".$msg."</center>"; ?></h4>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method ="post">
            <div class="form-group">
              <input  type = "text" name = "username" placeholder = "username......." 
      required autofocus class="form-control input-lg">
            </div>
            <div class="form-group">
              <input type = "password" name = "password" placeholder = "password......" required class="form-control input-lg">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type = "submit" name = "login">Sign In</button>
              <span class="pull-right"><a href="register.php">Register</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
            
      </div>  
      </div>
  </div>
  </div>
</div>
  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>