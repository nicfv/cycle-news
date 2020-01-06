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
    $a_title = null;
    $a_author = null;
    $a_date = null;
    $a_summary = null;
    // $a_sc = null;
    $a_img = null;
    $a_div = null;
    $unique = uniqid();
    if(isset($_POST['a_title']) || isset($_POST['a_author'])
    || isset($_POST['a_date']) || isset($_POST['a_summary'])
    || isset($_POST['a_sc']) || isset($_POST['a_img'])
    || isset($_POST['a_div'])) {
        // Add an article to records.
        $a_title = safestring($_POST['a_title']);
        $a_author = safestring($_POST['a_author']);
        if(!isset($_POST['a_date']) || strlen($_POST['a_date']) == 0) {
            $a_date = date('D, M j, Y');
        } else {
            $a_date = date('D, M j, Y', strtotime($_POST['a_date']));
        }
        $a_summary = safestring($_POST['a_summary']);
        // $a_sc = addslashes($_POST['a_sc']);
        // $a_img = safestring($_POST['a_img']);
        $a_div = safestring($_POST['a_div']);
        // Define target file paths.
        $target_img_name = '/'.'Uploads/'.basename($_FILES['a_img']["name"]);
        $target_mp3_name = '/'.'Uploads/'.basename($_FILES['a_audio']["name"]);
        $target_img = $_SERVER['DOCUMENT_ROOT'].$target_img_name;
        $target_mp3 = $_SERVER['DOCUMENT_ROOT'].$target_mp3_name;
        if(strlen($a_title) == 0) {
            echo '<p class="error">Missing title!</p>';
        } else if(strlen($a_div) == 0) {
            echo '<p class="error">Missing division/category!</p>';
        } else if(strlen($a_summary) < 10) { // && strlen($a_sc) == 0) {
            echo '<p class="error">Missing summary or summary is too short!</p>';
        // } else if(strlen($a_sc) > 0 && (strlen($a_sc) < 7 || substr($a_sc, 0, 7) != '<iframe')) { // Check to make sure soundcloud starts with '<iframe'
            // echo '<p class="error">The SoundCloud embed is not the right format.</p>';
        } else if($_FILES['a_img']["size"] < 1) {
            echo '<p class="error">Missing image!</p>';
        } else if($_FILES['a_audio']["size"] < 1) {
            echo '<p class="error">Missing audio!</p>';
        } else if(!getimagesize($_FILES['a_img']["tmp_name"])) {
            echo '<p class="error">The image file is not in the right format.</p>';
        // } else if(explode("/", $_FILES['a_audio']['mime_type'])[0] != "audio") {
            // echo '<p class="error">The audio file is not in the right format.</p>';
        } else if(!$_FILES['a_img']["size"] > 10000000) {
            echo '<p class="error">The image file size is too large. Max 10mb</p>';
        } else if($_FILES['a_audio']["size"] > 100000000) {
            echo '<p class="error">The audio file size is too large. Max 100mb</p>';
        } else if(file_exists($target_img)) {
            echo '<p class="error">This image file is already uploaded. Please rename and try again.</p>';
        } else if(file_exists($target_mp3)) {
            echo '<p class="error">This audio file is already uploaded. Please rename and try again.</p>';
        } else if(!move_uploaded_file($_FILES['a_img']["tmp_name"], $target_img)) {
            echo '<p class="error">Error uploading the image file. Try again.</p>';
        } else if(!move_uploaded_file($_FILES['a_audio']["tmp_name"], $target_mp3)) {
            echo '<p class="error">Error uploading the audio file. Try again.</p>';
        } else if(!query('INSERT INTO `'.$dbname.'`.`articles` (title, author, relevant, summary, mp3, imgpath, division) VALUES ("'.$a_title.'", "'.$a_author.'", "'.$a_date.'", "'.$a_summary.'", "'.$target_mp3_name.'", "'.$target_img_name.'", "'.$a_div.'");')) {
            echo '<p class="error">Could not submit article! Try again!</p>';
        } else {
            echo '<p class="success">Uploaded article! Thank you!</p>';
            $success_a = true;
        }
    }

    ?>
    <!-- HTML Page Starts Here -->
    <form id="uploadform" action="/Upload/" method="POST" enctype="multipart/form-data">
        <h1>Upload an article here!</h1>
        <input type="text" name="a_title" placeholder="Title" <?php if($a_title){echo 'value="'.$a_title.'"';} ?>> * Required<br>
        <input type="text" name="a_author" placeholder="Author" <?php if($a_author){echo 'value="'.$a_author.'"';} ?>><br>
        <input type="date" name="a_date"><br>
        <textarea name="a_summary" placeholder="Summary"><?php if($a_summary){echo $a_summary;} ?></textarea> * Recommended<br>
        <!-- <input type="text" name="a_sc" placeholder="SoundCloud Embed" <?php // if($a_sc){echo 'value="'.htmlspecialchars($a_sc).'"';} ?>> * Recommended <a onclick="alert('This is the code for embedding a SoundCloud audio. This is not the link to SoundCloud! Go to your SoundCloud audio > \'share\' > \'embed\' to find the code, and copy and paste it here.');" href="#">[?]</a><br> -->
        <input type="file" name="a_audio"> Upload a mp3<br>
        <input type="file" name="a_img"> <!-- placeholder="Image Path" <?php // if($a_img){echo 'value="'.$a_img.'"';} ?>> --> Upload an image<br>
        <select name="a_div">
            <option value="i">International</option>
            <option value="u">U.S. and Politics</option>
            <option value="b">Business</option>
            <option value="c">Science and Conservation</option>
            <option value="l">Local</option>
            <option value="s">Sports</option>
        </select>
        <input type="submit" value="Upload">
    </form>
</body>
</html>