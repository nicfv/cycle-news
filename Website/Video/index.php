<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload a Video</title> <!-- Change The Title -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../Styles/master.css" />
    <script src="../Scripts/scripts.js"></script>
</head>
<body>
    <?php
    printnav();

    $v_title = null;
    $v_url = null;
    $v_id = null;
    if(isset($_POST['v_title']) || isset($_POST['v_url'])) {
        // Add a video to records.
        $v_title = safestring($_POST['v_title']);
        $v_url = safestring($_POST['v_url']);
        $v_id = substr(strstr(strstr($v_url, '&', true), '='), 1); // Eg. Link of a video in a playlist.
        if(strlen($v_id) == 0) {
            $v_id = substr(strstr($v_url, '='), 1); // Eg. Normal URL for a YouTube video.
        } 
        if(strlen($v_id) == 0) {
            $v_id = substr(strrchr($v_url, '/'), 1); // Eg. Share link for a YouTube video.
        }
        // Validate input.
        if(strlen($v_title) == 0) {
            echo '<p class="error">Missing title!</p>';
        } else if(strlen($v_url) == 0) {
            echo '<p class="error">Missing URL!</p>';
        } else if(strlen($v_id) == 0) {
            echo '<p class="error">URL was in the wrong format!</p>';
        } else if(!query('INSERT INTO `'.$dbname.'`.`videos` (title, url) VALUES ("'.$v_title.'", "'.$v_id.'");')) {
            echo '<p class="error">Could not upload video! Try again!</p>';
        } else {
            echo '<p class="success">Uploaded video! Thank you!</p>';
            // Set all to null because of success.
            $v_title = null;
            $v_url = null;
            $v_id = null;
        }
    }

    ?>
    <!-- HTML Page Starts Here -->
    <form id="uploadform" action="/Upload/" method="POST" enctype="multipart/form-data">
        <h1>Upload a video here!</h1>
        <input type="text" name="v_title" placeholder="Title" <?php if($v_title){echo 'value="'.$v_title.'"';} ?>> * Required<br>
        <input type="text" name="v_url" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" <?php if($v_url){echo 'value="'.$v_url.'"';} ?>><a onclick="alert('Copy the link for a YouTube video and paste it here.');" href="#">[?]</a> * Required<br>
        <input type="submit" value="Upload Video">
    </form>
</body>
</html>