<?php
    session_start();
    $pageTitle = "bib++";
    $description = "Biblioteca de informatica";
    // include "navbar.php";
    // include "db.php";
    // if(isset($_SESSION['login_user']))
    // {
    //     header("location: index.php");
    // }
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description;?>">

    <link rel="stylesheet" href="resurse/css/style.css">
</head>

<body>
    
    <?php
        include "navbar.php";

        // echo $_SESSION['login_user'];
    ?>

    <section class="fundal">
        <img src="resurse/images/bkg2.png">
        <!-- <div class="wrapper">
            <h1> Bine ati venit la biblioteca de informatica </h1>
            <p> Aici puteti gasi carti de informatica, dar si alte materiale utile pentru studentii de informatica. </p>
            <p> Biblioteca se deschide la ora 8:00 si se inchide la ora 20:00 </p>
        </div> -->
    </section>
        
    <footer>
    <?php
        include "footer.php";
    ?>
    </footer>
    </div>


</body>
</html>
