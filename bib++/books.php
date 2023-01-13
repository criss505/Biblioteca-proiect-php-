<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <?php
        include "connection.php";
        include "navbar.php";
		if($_SESSION['role'] == 'teacher' || $_SESSION['role'] == 'admin')
		{
			echo "<a href='add_book.php'>Add a book</a>";
		}
    ?>
	
	
<div id="main">
  

	<!--___________________search bar________________________-->
<!-- 
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div> -->
	<!--___________________request book__________________-->
	<!-- <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div> -->


	<h2>List Of Books</h2>
	<?php
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`Titlu` ASC;");

		    echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
            //Table header
            echo "<th>&nbsp"; echo "ID";	echo "</th>";
            echo "<th>&nbsp"; echo "Book";  echo "</th>";
            echo "<th>&nbsp"; echo "Author";  echo "</th>";
            echo "<th>&nbsp"; echo "Quantity";  echo "</th>";
            echo "<th>&nbsp"; echo "Status";  echo "</th>";
            echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
                echo "<tr>";
                echo "<td>&nbsp&nbsp"; echo $row['Cod']; echo "</td>";
                echo "<td>&nbsp&nbsp"; echo $row['Titlu']; echo "</td>";
                echo "<td>&nbsp&nbsp"; echo $row['Autor']; echo "</td>";
                echo "<td>&nbsp&nbsp"; echo $row['Cantitate']; echo "</td>";

				if($row['Imprumutate']<$row['Cantitate'])
				{
					echo "<td>&nbsp"; echo "Available"; echo "</td>";
				}
				else
				{
					echo "<td>&nbsp"; echo "Not Available"; echo "</td>";
				}

				echo "<td>&nbsp<a href='invoice.php'>request</a></td>";
                echo "</tr>";

			}
		    echo "</table>";

			// while($row=mysqli_fetch_assoc($res)) {
			// 	echo '<div>';
			// 	echo '<img src="resurse/books/112.png" alt="' . $row['title'] . '"/>';
			// 	echo '<h2>' . $row['title'] . '</h2>';
			// 	echo '<p>By ' . $row['author'] . '</p>';
			// 	echo '<p>$' . $row['price'] . '</p>';
			// 	echo '</div>';
			// }
	?>
</div>
</body>

        <?php
            include "api.php";
        ?>

</html>
