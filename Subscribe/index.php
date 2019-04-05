<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Scripts/globals.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Scripts/sqlfunc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The Cycle News Hour - Subscribe</title>
        <meta charset="UTF-8">
        <meta name="description" content="UC Davis news and more!">
        <meta name="keywords" content="cycle,news,hour,Davis">
        <meta name="author" content="CNH Staff / Nicolas Ventura">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Styles/main.css">
    </head>
    <body>
        <?php
            $success_ = false;
            if(isset($_POST['name'] || $_POST['email'])) {
                // Add subscriber to records.
                $name_ = safestring($_POST['name']);
                $email_ = safestring($_POST['email']);
                if(!query('INSERT INTO `'.$dbname.'`.`subscriptions` (name, email) VALUES ("'.$name_.'", "'.$email_.'");')) {
                    echo '<h1>Error: Could not subscribe! Try again!</h1>';
                } else {
                    echo '<h1>Subscribed! Thank you!</h1>';
                    $success_ = true;
                }
            }
            if(!$success_) {
                // Show form to subscribe.
                echo '
                    <form action="/Subscribe/" method="POST">
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="email" placeholder="Email">
                        <input type="submit" value="Subscribe!">
                    </form>
                    ';
            }
            // Show current subscribers.
            $result = query('SELECT name, email FROM `'.$dbname.'`.`subscriptions` WHERE 1;');
            echo '<h1>Current Subscribers:</h1>';
            echo '<table>';
            echo '<tr><td>NAME</td><td>EMAIL</td>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td>';
            }
            echo '</table>';
        ?>
    </body>
    <script src="" charset="UTF-8" type="application/javascript"></script>
</html>