<?php
        session_start();
        if($_SESSION['role'] == 'student')
        {
            header("location: login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="resurse/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
        include "navbar.php";
        include "connection.php";
    ?>
    <br><br><br>
    <h1>Students with an account:</h1><br>
    <?php
        $res=mysqli_query($db, "SELECT * FROM `student`;");

        while($row=mysqli_fetch_assoc($res))
        {
            echo "Name: "; echo $row['First name']; echo "<br>";
            echo "Prenume: "; echo $row['Last name']; echo "<br>";
            echo "Username: "; echo $row['Username']; echo "<br>";
            echo "Email: "; echo $row['Email']; echo "<br>";
            echo "Phone: "; echo $row['Phone']; echo "<br>";
            echo "<br>";

        }
        if($_SESSION['role'] == 'admin')
        {
            echo "<a href='remove_user.php'>Remove a student</a>";
        }
    ?>

</body>
</html>