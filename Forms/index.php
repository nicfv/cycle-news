<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Scripts/globals.php';
include $_SERVER['DOCUMENT_ROOT'] . '/Scripts/sqlfunc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The Cycle News Hour - Subscribe & More</title>
        <meta charset="UTF-8">
        <meta name="description" content="UC Davis news and more!">
        <meta name="keywords" content="cycle,news,hour,Davis">
        <meta name="author" content="CNH Staff / Nicolas Ventura">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Styles/main.css">
    </head>
    <body>
        <?php
            // Subscribe
            echo '<div id="Subscribe"></div>';
            $success_sub = false;
            if(isset($_POST['sub_name']) || isset($_POST['sub_email'])) {
                // Add subscriber to records.
                $name_sub = safestring($_POST['sub_name']);
                $email_sub = safestring($_POST['sub_email']);
                if(strlen($name_sub) == 0 || strlen($email_sub) == 0) {
                    echo '<h1>Error: Missing name or email!</h1>';
                } else if(!query('INSERT INTO `'.$dbname.'`.`subscriptions` (name, email) VALUES ("'.$name_sub.'", "'.$email_sub.'");')) {
                    echo '<h1>Error: Could not subscribe! Try again!</h1>';
                } else {
                    echo '<h1>Subscribed! Thank you!</h1>';
                    $success_sub = true;
                }
            }
            if(!$success_sub) {
                // Show form to subscribe.
                echo '
                    <form action="/Forms/" method="POST">
                        <h1>Subscribe here!</h1>
                        <input type="text" name="sub_name" placeholder="Name"><br>
                        <input type="text" name="sub_email" placeholder="Email"><br>
                        <input type="submit" value="Subscribe!">
                    </form>
                    ';
            }
            // Show current subscribers.
            $result = query('SELECT name, email FROM `'.$dbname.'`.`subscriptions` WHERE 1;');
            echo '<h1>Current Subscribers:</h1>';
            echo '<table>';
            echo '<tr><td>NAME</td><td>EMAIL</td></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td></tr>';
            }
            echo '</table>';



            // Article Upload
            echo '<div id="Article"></div>';
            $success_a = false;
            if(isset($_POST['a_title']) || isset($_POST['a_author'])
            || isset($_POST['a_date']) || isset($_POST['a_summary'])
            || isset($_POST['a_sc']) || isset($_POST['a_img'])) {
                // Add an article to records.
                $a_title = safestring($_POST['a_title']);
                $a_author = safestring($_POST['a_author']);
                $a_date = date('D, M j, Y', safestring($_POST['a_date']));
                $a_summary = safestring($_POST['a_summary']);
                $a_sc = safestring($_POST['a_sc']);
                $a_img = safestring($_POST['a_img']);
                if(strlen($a_title) == 0) {
                    echo '<h1>Error: Missing title!</h1>';
                } else if(!query('INSERT INTO `'.$dbname.'`.`articles` (title, author, relevant, summary, sc, imgpath) VALUES ("'.$a_title.'", "'.$a_author.'", "'.$a_date.'", "'.$a_summary.'", "'.$a_sc.'", "'.$a_img.'");')) {
                    echo '<h1>Error: Could not submit article! Try again!</h1>';
                } else {
                    echo '<h1>Uploaded article! Thank you!</h1>';
                    $success_a = true;
                }
            }
            if(!$success_a) {
                // Show form to submit an article.
                echo '
                    <form action="/Forms/" method="POST">
                        <h1>Upload an article here!</h1>
                        <input type="text" name="a_title" placeholder="Title"> * Required<br>
                        <input type="text" name="a_author" placeholder="Author"><br>
                        <input type="date" name="a_date"><br>
                        <input type="text" name="a_summary" placeholder="Summary"> * Recommended<br>
                        <input type="text" name="a_sc" placeholder="SoundCloud Link"> * Recommended<br>
                        <input type="text" name="a_img" placeholder="Image Path"><br>
                        <input type="submit" value="Upload">
                    </form>
                    ';
            }
            // Show current articles.
            $result = query('SELECT title, author, relevant, summary, sc, imgpath FROM `'.$dbname.'`.`articles` WHERE 1;');
            echo '<h1>All Articles:</h1>';
            echo '<table>';
            echo '<tr><td>TITLE</td><td>AUTHOR</td><td>DATE</td><td>SUMMARY</td><td>SOUNDCLOUD</td><td>IMG</td></tr>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td>'.$row['title'].'</td><td>'.$row['author'].'</td><td>'.$row['relevant'].'</td><td>'.$row['summary'].'</td><td>'.$row['sc'].'</td><td>'.$row['imgpath'].'</td></tr>';
            }
            echo '</table>';
        ?>
    </body>
    <script src="" charset="UTF-8" type="application/javascript"></script>
</html>