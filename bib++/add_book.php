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

    
<section>
    <div class="reg_img">
        <br><br>
        <div class="box2">
            <h1>bib++</h1><br>
            <h1>New Book Form</h1><br>
        <form name="registration" action="" method="post">
            <br><br>
            <div class="add_book">
                <input type="text" name="Titlu" placeholder="Titlu" required=""> <br><br>
                <input type="text" name="Autor" placeholder="Autor" required=""> <br><br>
                <input type="text" name="Editura" placeholder="Editura" required=""> <br><br>
                <input type="text" name="An" placeholder="An" required=""> <br><br>
                <input type="text" name="Pagini" placeholder="Pagini" required=""><br><br>
                <input type="text" name="ISBN" placeholder="ISBN" required=""><br><br>
                <input type="text" name="Cod" placeholder="Cod" required=""><br><br>
                <input type="text" name="Cantitate" placeholder="Numar bucati" required=""><br><br>
                
            <input class="btn btn-default" type="submit" name="submit" value="Add book">
            
            </div>
        </form>        
        </div>
    </div>
    </section>

    
    <?php

    if(isset($_POST['submit']))
    {
        mysqli_query($db,"INSERT INTO `books` VALUES('$_POST[Titlu]', '$_POST[Autor]', '$_POST[Editura]', '$_POST[An]', '$_POST[Pagini]', '$_POST[ISBN]', '$_POST[Cod]', '$_POST[Cantitate]');");
    }
    ?>


</body>
</html>