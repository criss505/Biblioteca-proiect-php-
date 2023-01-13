
<!DOCTYPE>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="resurse/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
            <a class="logo" style="text-decoration: none" href="index.php">
                <img src="resurse/images/logo-cerc.png">
                <h1> bib++ </h1>
            </a>
            <div class="wrapper">
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                            <?php
                        if(isset($_SESSION['login_user']))
                        {
                            if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'teacher')
                            {

                            ?>
                            <li><a href="students.php">Students</a></li>
                            <?php
                            }
                            ?>
                        <li><a href="books.php">Books</a></li>
                        <li><a href="profile.php">Profil</a></li>
                        <li><a href="logout.php">Logout</a></li>
                            <?php
                        }
                        else
                        {
                            ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                            <?php
                        }
                            ?>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
</body>
</html>