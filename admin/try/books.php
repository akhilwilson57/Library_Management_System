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
</head>
<body>
	<h2>List Of Books</h2>
	<?php

		// $res=mysqli_query($con,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
		$res=mysqli_query($con,"SELECT * FROM `books`");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: white;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
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
	?>
</body>
</html>