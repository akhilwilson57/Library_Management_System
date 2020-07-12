<?php

session_start();

if( isset($_SESSION['user_id']) ){
  header("Location: /lib/student/index.php");
}
require 'connection.php';
require 'team/database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
  
  $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

    $_SESSION['user_id'] = $results['id'];
    header("Location: /lib/student/index.php");

  } else {
    $message = 'Sorry, those credentials do not match';
  }

endif;

?>

<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>
  <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
  <?php endif; ?>
<section>
  <div class="log_img">
   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Login Form</h1><br>
      <form  name="login" action="student_login.php" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="email" placeholder="Email" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:white;" href="">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        New to this website?<a style="color: white;" href="registration.php">Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>

  <!-- <?php 

    // if(isset($_POST['submit']))
    // {
    //   $count=0;
    //   $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
    //   $count=mysqli_num_rows($res);

    //   if($count==0)
    //   {
    //     ?>
    //           
    //           <script type="text/javascript">
    //             alert("The username and password doesn't match.");
    //           </script> 
    //           -->
           <!-- <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
             <strong>The username and password doesn't match</strong>
           </div> -->    
         <!-- <?php 
    //   }
    //   else
    //   {
    //     ?>-->
          <!-- <script type="text/javascript">
    //         window.location="index.php"
    //       </script> -->
      <!--  <?php
    //   }
    // }

  ?> -->

</body>
</html>