<?php

session_start();

if( isset($_SESSION['user_id']) ){
  header("Location: /");
}

require 'connection.php';
require 'team/database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['username']) && !empty($_POST['roll']) && !empty($_POST['contact']) && !empty($_POST['password'])):
  
  // Enter the new user in the database
  $sql = "INSERT INTO users (email, password,first,last,username,roll,contact) VALUES (:email, :password, :first, :last, :username, :roll, :contact)";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':first', $_POST['first']);
  $stmt->bindParam(':last', $_POST['last']);
  $stmt->bindParam(':username', $_POST['username']);
  $stmt->bindParam(':roll', $_POST['roll']);
  $stmt->bindParam(':contact', $_POST['contact']);
  $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

  if( $stmt->execute() ):
    $message = 'Successfully created new user';
    header("Location: /lib/student/student_login.php");
  else:
    $message = 'Sorry there must have been an issue creating your account';
  endif;

endif;

?>
<?php
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <?php if(!empty($message)): ?>
    <p><?= $message ?></p>
  <?php endif; ?>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      /*margin-top: -20px;*/
    }
  </style>   
</head>
<body>


  <div class="reg_img" >
    <br><br>
    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>

      <form  action="registration.php" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>

          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" style="color: black; width: 70px; height: 30px"> 
        </div>
      </form>
    </div>
  </div>


</body>
</html>
  


   <!-- <?php 
    
   
    // if (isset($_POST['submit'])){
    
    // $fr = $_POST['first'];
    // $ls = $_POST['last'];
    // $us = $_POST['username'];
    // $ps = $_POST['password'];
    // $rl = $_POST['roll'];
    // $em = $_POST['email'];
    // $ph = $_POST['contact'];



    
  
    // echo "insert into student (first,last,username,password,roll,email,contact) 
    // values ('$fr', '$ls', '$us', '$ps', '$rl', '$em', '$ph')";
  
  
    //   $query = "insert into student (first,last,username,password,roll,email,contact) 
    //          values ('$fr', '$ls', '$us', '$ps', '$rl', '$em', '$ph')";
    
    //   $insert = mysqli_query($con, $query);
  
    //   if($insert){
    //     echo "Data has been added";
  
    //   }
    //   else{
    //     echo "please try again!!";
    //   }
    // }
   
   
   
   
   
   
   ?> -->



















     <!-- <?php 
      // if(isset($_POST['submit']))
      {
        // $count=0;
        // $sql="SELECT username from `student`";
        // $res=mysqli_query($db,$sql);

        // while($row=mysqli_fetch_assoc($res))
        {
          // if($row['username']==$_POST['username'])
          {
            // $count=$count+1;
          }
        }
        // if($count==0)
        {
          // mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[contact]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        // else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>  -->


