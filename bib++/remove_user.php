<?php
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>
    <link rel="stylesheet" href="resurse/css/style.css">
    <link rel="stylesheet" href="resurse/css/login.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <?php
        include "connection.php";
        include "navbar.php";
    ?>
    <br><br><br>
    <h1>Remove a student</h1>

    <form name="registration" action="" method="post">
        <div class="remove_user">
            <input type="text" name="username" placeholder="Username"> <br>
            <input type="text" name="id" placeholder="Numar matricol"> <br>
        <input class="btn btn-default" type="submit" name="submit" value="Remove student">
        </div>
    </form>

    <?php
        mysqli_query($db,"DELETE FROM `student` WHERE Username='$_POST[username]' && 'Student ID'='$_POST[id]';");

        if(isset($_POST['submit']))
        {
            $count=mysqli_query($db,"SELECT COUNT(*) FROM `student` WHERE Username='$_POST[username]' && 'Student ID'='$_POST[id]';");
            if($count==1)
            {
                mysqli_query($db,"DELETE FROM `student` WHERE Username='$_POST[username]' && 'Student ID'='$_POST[id]';");
                ?>
                <script type="text/javascript">
                    alert("The student was removed");
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                    alert("The username or id doesn't exist");
                </script>
                <?php
            }
            header("location: students.php");
        }
    ?>


</body>