<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload an Article</title> <!-- Change The Title -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Styles/master.css" />
    <script src="../Scripts/scripts.js"></script>
</head>
<body>
    <?php
    printnav();

    $success_a = false;
    if(isset($_POST['a_title']) || isset($_POST['a_author'])
    || isset($_POST['a_date']) || isset($_POST['a_summary'])
    || isset($_POST['a_sc']) || isset($_POST['a_img'])) {
        // Add an article to records.
        $a_title = safestring($_POST['a_title']);
        $a_author = safestring($_POST['a_author']);
        if(!isset($_POST['a_date']) || strlen($_POST['a_date']) == 0) {
            $a_date = date('D, M j, Y');
        } else {
            $a_date = date('D, M j, Y', strtotime($_POST['a_date']));
        }
        $a_summary = safestring($_POST['a_summary']);
        $a_sc = addslashes($_POST['a_sc']);
        $a_img = safestring($_POST['a_img']);
        if(strlen($a_title) == 0) {
            echo '<p class="error">Missing title!</p>';
        } else if(strlen($a_summary) < 10 && strlen($a_sc) == 0) {
            echo '<p class="error">Missing Soundcloud or summary is too short!</p>';
        } else if(!query('INSERT INTO `'.$dbname.'`.`articles` (title, author, relevant, summary, sc, imgpath) VALUES ("'.$a_title.'", "'.$a_author.'", "'.$a_date.'", "'.$a_summary.'", "'.$a_sc.'", "'.$a_img.'");')) {
            echo '<p class="error">Could not submit article! Try again!</p>';
        } else {
            echo '<p class="success">Uploaded article! Thank you!</p>';
            $success_a = true;
        }
    }

    ?>
    <!-- HTML Page Starts Here -->
    <form id="uploadform" action="/Upload/" method="POST">
        <h1>Upload an article here!</h1>
        <input type="text" name="a_title" placeholder="Title"> * Required<br>
        <input type="text" name="a_author" placeholder="Author"><br>
        <input type="date" name="a_date"><br>
        <textarea name="a_summary" placeholder="Summary"></textarea> * Recommended<br>
        <input type="text" name="a_sc" placeholder="SoundCloud Embed"> * Recommended <a onclick="alert('This is the code for embedding a SoundCloud audio. This is not the link to SoundCloud! Go to your SoundCloud audio > \'share\' > \'embed\' to find the code, and copy and paste it here.');" href="#">[?]</a><br>
        <input type="text" name="a_img" placeholder="Image Path"><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>