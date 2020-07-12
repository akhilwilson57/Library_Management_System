<?php

// session_start();

// if( isset($_SESSION['user_id']) ){
//   header("Location: /");
// }

require 'connection.php';
require 'team/database.php';

$message = '';

if(!empty($_POST['roll']) && !empty($_POST['student-name']) && !empty($_POST['doi']) && !empty($_POST['book_name']) && !empty($_POST['submit']) ):
  
  // Enter the new user in the database
  $sql = "INSERT INTO reserve_book (student-roll-no, student-name,date_of_issue,  book-name) VALUES (:roll, :student-name, :doi, :book_name)";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':roll', $_POST['roll']);
  $stmt->bindParam(':student-name', $_POST['student-name']);
  $stmt->bindParam(':doi', $_POST['doi']);
  $stmt->bindParam(':book_name', $_POST['book_name']);

  
  // if( $stmt->execute() ):
  //   $message = 'Successfully created new user';
  //   header("Location: /lib/student/student_login.php");
  // else:
  //   $message = 'Sorry there must have been an issue creating your account';
  // endif;

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

      <form  action="Add_book.php" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="roll" placeholder="Student Roll no" required=""> <br>
          <input class="form-control" type="text" name="student-name" placeholder="Student Name" required=""> <br>
          <input class="form-control" type="text" name="doi" placeholder="Date of Issue" required=""> <br>
          <input class="form-control" type="text" name="book_name" placeholder="Book name : " required=""><br>
          <input class="btn btn-default" type="submit" name="submit" style="color: black; width: 70px; height: 30px"> 
        </div>
      </form>
    </div>
  </div>


</body>
</html>
