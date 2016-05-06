<?php include 'dbconnect.php' ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Bootstrap Registration Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
if(isset($_POST['register'])&& !empty($_POST['fname'])&& !empty($_POST['username'])&& !empty($_POST['password'])){
    
    $fname =$_POST['fname'];
    $username =$_POST['username'];
    $password =$_POST['password'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    if(isset($_POST['selectione']))
	{
	    $updatee = 1;
	}
	else
	{
	    $updatee = 0;
	}
    if(isset($_POST['selectionp']))
	{
	    $updatep = 1;
	}
	else
	{
	    $updatep = 0;
	}
    $sql = "INSERT into users(username,password,name,email,phoneno,emailconfirm,smsconfirm) values ('".$username."','".$password."','".$fname. "','".$email."','".$phone."','".$updatee."','".$updatep."')";
    if ($conn->query($sql) === TRUE) {
        echo "<br/><center><b>New record created successfully</b></center><br/>";
    } else {
        echo "<br/><center><b>Error: " . $sql . "<br>" . $conn->error."</b></center><br/>";
    }$conn->close();

}
?>




    <div class="container">
        <div class="row text-center pad-top ">
            <div class="col-md-12">
                <h2>Registration Page</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Name" name="fname"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Desired Username" name="username" />
                                        </div>
                                         
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name ="password" type="password" class="form-control" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Email Address" name="email" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone" />
                                        </div> 
                                        
 										 <input type="checkbox" name="selectione" value="Email"> Register for email notification<br>
 										 <input type="checkbox" name="selectionp" value="SMS"> Register for sms notification<br>
  										 
									   
                                      <button class="btn btn-success " type = "submit" name = "register">Register</button>
                                      
              
                                    <hr />
                                    Already Registered ?  <a href="index.php" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
   
</body>
</html>
