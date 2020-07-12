<?php
  include "connection.php";
  include "team/database.php";
  include "navbar.php";
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
	</style>
</head>
<body>
	<!-- ________________________________________Search bar_________________________________________________ -->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books..." required>
				<button style="background-color:#3377b7 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			
		</form>
	</div>
	<h2>List Of Books</h2>
	<?php

	    if (isset($_POST['submit']))
	     {
	       $q=mysqli_query($conn,"SELECT * from books WHERE Book-Name LIKE '%$_POST[search]%' ");
	       if (mysqli_num_rows($q)==0)
	       {
	       	 echo "Sorry! No books found. Try searching again."; 
	       }
	       else
	       {
              echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #3377b7;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{	
				echo "<tr>";
				echo "<td>"; echo $row['ID']; echo "</td>";
				echo "<td>"; echo $row['Book-Name']; echo "</td>";
				echo "<td>"; echo $row['Authors Name']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				echo "<td>"; echo $row['Quantity']; echo "</td>";
				echo "<td>"; echo $row['Department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>"; 
	       }
	    }

	    /*if button is not pressed */
         
	    else
	    {
          $q=mysqli_query($conn,"SELECT * FROM `books`");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #3377b7;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{	
				echo "<tr>";
				echo "<td>"; echo $row['ID']; echo "</td>";
				echo "<td>"; echo $row['Book-Name']; echo "</td>";
				echo "<td>"; echo $row['Authors Name']; echo "</td>";
				echo "<td>"; echo $row['Edition']; echo "</td>";
				echo "<td>"; echo $row['Status']; echo "</td>";
				echo "<td>"; echo $row['Quantity']; echo "</td>";
				echo "<td>"; echo $row['Department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
	    }

	 //    // $res=mysqli_query($con,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
		// $q=mysqli_query($con,"SELECT * FROM `books`");

		// echo "<table class='table table-bordered table-hover' >";
		// 	echo "<tr style='background-color: #3377b7;'>";
		// 		//Table header
		// 		echo "<th>"; echo "ID";	echo "</th>";
		// 		echo "<th>"; echo "Book-Name";  echo "</th>";
		// 		echo "<th>"; echo "Authors Name";  echo "</th>";
		// 		echo "<th>"; echo "Edition";  echo "</th>";
		// 		echo "<th>"; echo "Status";  echo "</th>";
		// 		echo "<th>"; echo "Quantity";  echo "</th>";
		// 		echo "<th>"; echo "Department";  echo "</th>";
		// 	echo "</tr>";	

		// 	while($row=mysqli_fetch_assoc($q))
		// 	{	
		// 		echo "<tr>";
		// 		echo "<td>"; echo $row['ID']; echo "</td>";
		// 		echo "<td>"; echo $row['Book-Name']; echo "</td>";
		// 		echo "<td>"; echo $row['Authors Name']; echo "</td>";
		// 		echo "<td>"; echo $row['Edition']; echo "</td>";
		// 		echo "<td>"; echo $row['Status']; echo "</td>";
		// 		echo "<td>"; echo $row['Quantity']; echo "</td>";
		// 		echo "<td>"; echo $row['Department']; echo "</td>";

		// 		echo "</tr>";
		// 	}
		// echo "</table>";
	?>
</body>
</html>