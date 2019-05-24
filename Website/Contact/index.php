<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title> <!-- Change The Title -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Styles/master.css" />
    <script src="../Scripts/scripts.js"></script>
</head>
<body>
    <!-- HTML Page Starts Here -->
    <?php
    printnav();

    if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['msg'])) { // Check to see if the user submitted the form.
        if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['category']) || !isset($_POST['msg']) ||
        strlen($_POST['name'])<1 || strlen($_POST['email'])<1 || strlen($_POST['category'])<1 || strlen($_POST['msg'])<1) { // Make sure all parameters are set and have value.
            echo '<p class="error">Some information was missing!</p>';
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Validate Email.
            echo '<p class="error">Incorrect email format!</p>';
        }
        else if(!query('INSERT INTO `'.$dbname.'`.`contact` (name, email, category, msg) VALUES ("'.safestring($_POST['name']).'", "'.safestring($_POST['email']).'", "'.safestring($_POST['category']).'", "'.safestring($_POST['msg']).'");')) { // Send and check for success.
            echo '<p class="error">An error occurred sending the contact message. Please try again.</p>';
        } else {
            echo '<p class="success">Sent successfully! Thank you!</p>';
        }
    }

    ?>
    <form id="contactform" action="/Contact/" method="POST">
        <h1>Contact Us</h1>
        <input type="text" name="name" placeholder="Name" maxlength="100"><br>
        <input type="text" name="email" placeholder="Email" maxlength="100"><br>
        <select name="category">
            <option value="g">General Inquiry</option>
            <option value="j">Joining The Cycle News</option>
            <option value="a">Article Feedback</option>
            <option value="o">Other</option>
        </select><br>
        <textarea name="msg" placeholder="Message..."></textarea><br>
        <input type="submit" value="Send">
    </form>
    <?php writefilecontents('/Scripts/script.html'); ?>
</body>
</html>