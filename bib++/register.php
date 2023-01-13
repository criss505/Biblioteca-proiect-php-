

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
            <h1>Student Registration Form</h1><br>
        <form name="registration" action="" method="post">
            <br><br>
            <div class="login">
                <input type="text" name="first" placeholder="First Name" required=""> <br><br>
                <input type="text" name="last" placeholder="Last Name" required=""> <br><br>
                <input type="text" name="username" placeholder="Username" required=""> <br><br>
                <input type="password" name="password" placeholder="Password" required=""> <br><br>
                <input type="text" name="roll" placeholder="Nr Matricol" required=""><br><br>
                <input type="text" name="email" placeholder="Email" required=""><br><br>
                <input type="text" name="phone" placeholder="Phone" required=""><br><br>
<!-- 
                <button>Sign Up</button> -->
                
            <input class="btn btn-default" type="submit" name="submit" value="Sign Up">
            <br><br>
            <a href="login.php">Already have an account?</a>
            </div>
        </form>
        
        </div>
    </div>
    </section>

    <?php

    if(isset($_POST['submit']))
    {
        $count=0;
        $sql="SELECT username from `student`";
        $res=mysqli_query($db,$sql);

        // verificam ca usernameul este unic
        while($row=mysqli_fetch_assoc($res))
        {
            if($row['username']==$_POST['username'])
            {
                $count=$count+1;
            }
        }
        if($count==0)
        {
            //verificam mailul
            $email = $_POST["email"];
            $ch = curl_init();
            $apiKey = "5f92aa70f05f4b8eb45e6d6f09ec8a08"; 
          
            curl_setopt_array($ch, [
                CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1?
                api_key=$apiKey&email=$email",
                CURLOPT_RETURNTRANSFER => true, // return the response
                CURLOPT_FOLLOWLOCATION => true //follow redirects
            ]);
            $res = curl_exec($ch); //execute curl request
            curl_close($ch);
          
            $data = json_decode($res , true);
            // if($data['is_smtp_valid']['value']){
            //   $email_err = "Email is not valid";
            // } else
            // if (empty($email))
            // {
            //     $email_err = "You have to enter your email";
            // } else
            // {
            //     $result = $bd->query("SELECT * FROM users WHERE email = '$email'");
            //     if ($result->num_rows > 0) 
            //     {
            //         $email_err = "Email is already in use";
            //     }
            // }

            if(empty($email_err))
            {
                // $sql = "INSERT INTO users (email) VALUES ('$email')";
                // $conn->query($sql);

                $parts = explode("@", $email);
                $username = $parts[0];
                $domain = $parts[1];

                if($domain == "prof.unibuc.ro")
                {
                    mysqli_query($db,"INSERT INTO `teachers` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[phone]', '$_POST[email]', '$_POST[subject]');");
                }
                else
                {
                    mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[roll]', '$_POST[email]', '$_POST[phone]');");
                }
            }
            else
            {
                echo $email_err;
            }


            $imagePath = "resurse/images/profile.jpg"; //de aici ia imaginea standard
            //ca sa o schimbi personalizat pune un buton de upload, sau edit la profile.php
            $newPath = "resurse/pfp/";
            $ext = '.jpg';
            $newName  = $newPath.$_POST['username'].$ext;

            $copied = copy($imagePath , $newName);

            ?>
            
            <script type="text/javascript">
                alert("Registration successful");
                window.location="login.php"
                <?php
                header("location: login.php");
                //send mail code
                $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
                $code = bin2hex(random_bytes(16));
                                    
                $uniqid = uniqid();
                $rand_start = rand(1,5);
                $code = substr($uniqid,$rand_start,8);
                mysqli_query($db,"INSERT INTO `confirm` VALUES('$_POST[username]', '$_POST[password]', '$_POST[email]', '$code');");

                // send activation email
                // require_once __DIR__ . "/../send_email.php";
                // require_once __DIR__ . "/../load_env.php";

                $link = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "/activate?email=$email&code=$code";
                $subject = 'Check your bib++ registration';
                $message = "Hi $login_user!You can start using your library account after clicking on the following link: " . $link;
                sendEmail($_ENV['damovcristina'], 'VCI Verificator', $subject, $message, $email, $name);

                header("location: login.php");
                exit;
                ?>
            </script>
            <?php 
            }
            ?>

                </script>
            <?php
        }
    ?>


</body>
</html>