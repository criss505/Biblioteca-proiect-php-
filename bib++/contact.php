<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="resurse/css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php
        include "navbar.php";
    ?>
    <h1>Contact us!</h1>
    <br><br>

    <?php

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize the form data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    // Validate the form data
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address';
    } else {
        $to = 'cristina.damov@s.unibuc.ro';
        $subject = 'Contact form submitted by ' . $name;
        $message = $message . "\n\n" . 'From: ' . $name . ' (' . $email . ')';
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            $success = 'Thank you for your message! We will get back to you as soon as possible.';
        } else {
            $error = 'There was a problem sending your message. Please try again.';
        }
    }
}

?>

<form method="post" action="">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message"></textarea><br>

    <input type="submit" name="submit" value="Send">
</form>

<?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
<?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>



</body>
</html>
