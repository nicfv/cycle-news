<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/globals.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/sqlfunc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/rawfunc.php';

// Call this function to print the navigation bar onto the HTML document.
function printnav() {
    writefilecontents('/Scripts/nav.html');
}

// Call this function to print the footer onto the HTML document.
function printfooter() {
    global $dbname;
    echo '<footer>';
    if(isset($_POST['email'])) {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            if(query('INSERT INTO `'.$dbname.'`.`subscriptions` (email) VALUES ("'.$_POST['email'].'");')) {
            echo '<p class="success">Thank you for subscribing!</p>';
            } else {
            echo '<p class="error">An error occurred. Could not subscribe. Please try again.</p>';
            }
        } else {
            echo '<p class="error">Invalid email format.</p>';
        }
    }
    writefilecontents('/Scripts/footer.html');
    echo '</footer>';
}

// Call this function to print the navigation bar onto the HTML document.
function printsocials() {
    writefilecontents('/Scripts/socials.html');
}

// Call this function to return the title of the article with the given ID.
function getTitle($id) {
    return '<a href="/Article?id='.$id.'" title="Click here to read more.">'.getcol('articles', $id, 'title').'</a>';
}

// Call this function to return the author of the article with the given ID.
function getAuthor($id) {
    return getcol('articles', $id, 'author');
}

// Call this function to return the date of the article with the given ID.
function getNewsDate($id) {
    return getcol('articles', $id, 'relevant');
}

// Call this function to return the summary of the article with the given ID.
function getSummary($id) {
    return getcol('articles', $id, 'summary');
}

// Call this function to return the embedded soundcloud of the article with the given ID.
/* function getSoundcloud($id) {
    return getcol('articles', $id, 'sc');
} */

// Call this function to return the embedded audio file of the article with the given ID.
function getAudio($id) {
    return '<audio controls><source src="'.getcol('articles', $id, 'mp3').'">Your browser does not support embedded audio.</audio>';
}

// Call this function to return the IMAGE ELEMENT of the article with the given ID.
function getImg($id, $divclass = 'recent-img') {
    $imgpath = getcol('articles', $id, 'imgpath');
    if($imgpath) {
        return '<div class="'.$divclass.'"><img class="thumbnail-img" src="'.$imgpath.'"></div>';
    }
    return null;
}

// Call this function to return the division ID of the article with the diven ID.
function getDivID($id) {
    return strtolower(substr(getcol('articles', $id, 'division'), 0, 1));
}

// Call this function to return the division of the article with the given ID.
function getDiv($id) {
    $division = getDivID($id);
    $divstr = null;
    $urlstr = null;
    switch($division) {
        case 'i':
            $divstr = 'International';
            $urlstr = 'International';
            break;
        case 'u':
            $divstr = 'U.S. and Politics';
            $urlstr = 'Politics';
            break;
        case 'b':
            $divstr = 'Business';
            $urlstr = 'Business';
            break;
        case 'c':
            $divstr = 'Science and Conservation';
            $urlstr = 'Science';
            break;
        case 'l':
            $divstr = 'Local';
            $urlstr = 'Local';
            break;
        case 's':
            $divstr = 'Sports';
            $urlstr = 'Sports';
            break;
    }
    return '<a href="/Division?topic='.$urlstr.'" title="Click to read '.$divstr.' articles.">'.$divstr.'</a>';
}

// Call this function to write the article thumbnail block onto the screen. id = Article ID, layout = Window Layout (e.g. desktop, tablet)
function printArticle($id, $layout) {
    echo '
    <article>
    <section>
      '.getImg($id).'
    </section>
    <section class="'.$layout.'">
      <h4 class="category">'.getDiv($id).'</h4>
      <h3>'.getTitle($id).'</h3>
      <h4 class="author">'.getAuthor($id).'</h4>
      <p>'.trim(substr(getSummary($id), 0, 100)).(getSummary($id)?'...':'').'</p>
    </section>
  </article>';
}

// Call this function to print several recent articles. Parameters: Division/Null, Maximum Amount to Print, Desktop/Tablet/Mobile
function getRecent($div, $limit, $layout) {
    global $dbname;
    $result = null;
    if($div) {
        $result = query('SELECT id FROM `'.$dbname.'`.`articles` WHERE division="'.$div.'" ORDER BY id DESC LIMIT '.(int)$limit.';');
    } else {
        $result = query('SELECT id FROM `'.$dbname.'`.`articles` ORDER BY id DESC LIMIT '.(int)$limit.';');
    }
    while($row = mysqli_fetch_assoc($result)) {
        printArticle($row['id'], $layout);
    }

}

?>