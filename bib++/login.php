<?php
    session_start();
    if(isset($_SESSION['login_user']))
    {
        header("location: index.php");
    }
    
?>

<!DOCTYPE html>
<html>
<head>

    <title>Student Login</title>
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

    <section>
    <div class="log_img">
        <br><br>
        <div class="box1">
            <h1>bib++</h1><br>
            <h1>Login Form</h1><br>
            <form name="login" action="" method="post">
                <br><br>
                <div class="login">
                    <input type="text" name="username" placeholder="Username" required=""> <br><br>
                    <input type="password" name="password" placeholder="Password" required=""> <br><br>
                    
                    <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
                </div>
            </form>
            <p class="forgot">
                <br><br>
                <a href="">Forgot password?</a>
                <br>
                <a href="register.php">New to this website?</a>
            </p>
        </div>
    </div>
    </section>

    <?php

        if(isset($_POST['submit']))
        {
            //verifica studenti
            $count=0;
            $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
            $count=mysqli_num_rows($res);

            if($count!=0)
            {
                $_SESSION['login_user'] = $_POST['username'];
                $_SESSION['role'] = "student";
                ?>
                    <script type="text/javascript">
                        window.location="index.php"
                    </script>
                <?php
            }
            else
            {
                //verifica profesor
                $res=mysqli_query($db,"SELECT * FROM `teachers` WHERE username='$_POST[username]' && password='$_POST[password]';");
                $count=mysqli_num_rows($res);

                if($count!=0)
                {
                    $_SESSION['login_user'] = $_POST['username'];
                    $_SESSION['role'] = "teacher";
                    ?>
                        <script type="text/javascript">
                            window.location="index.php"
                        </script>
                    <?php
                }
                else
                {
                    //verifica admin
                    if($_POST['username'] == "admin" && $_POST['password'] == "admin")
                    {
                        $_SESSION['login_user'] = $_POST['username'];
                        $_SESSION['role'] = "admin";
                        ?>
                            <p>abc</p>
                            <script type="text/javascript">
                                window.location="index.php"
                            </script>
                        <?php
                    }
                    else
                    {
                        ?>
                            <script type="text/javascript">
                                alert("The username and password don't match.");
                            </script>
                            <p>Username or password is incorrect</p>
                        <?php
                    }
                }
            }
        }
                        ?>

</body>
</html