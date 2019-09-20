<?php
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/globals.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/sqlfunc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/PHPScripts/rawfunc.php';

// Call this function to print the navigation bar onto the HTML document.
function printnav() {
    writefilecontents('/Scripts/nav.html');
}

// Call this function to print the title of the article with the given ID.
function getTitle($id) {
    return '<a href="/Article?id='.$id.'" title="Click here to read more.">'.getcol('articles', $id, 'title').'</a>';
}

// Call this function to print the author of the article with the given ID.
function getAuthor($id) {
    return getcol('articles', $id, 'author');
}

// Call this function to print the date of the article with the given ID.
function getNewsDate($id) {
    return getcol('articles', $id, 'relevant');
}

// Call this function to print the summary of the article with the given ID.
function getSummary($id) {
    return getcol('articles', $id, 'summary');
}

// Call this function to print the embedded soundcloud of the article with the given ID.
function getSoundcloud($id) {
    return getcol('articles', $id, 'sc');
}

// Call this function to print the IMAGE ELEMENT of the article with the given ID.
function getImg($id) {
    $imgpath = getcol('articles', $id, 'imgpath');
    if($imgpath) {
        return '<img class="thumbnail-img" src="'.$imgpath.'">';
    }
    return null;
}

// Call this function to print the division of the article with the given ID.
function getDiv($id) {
    $division = strtolower(substr(getcol('articles', $id, 'division'), 0, 1));
    $divstr = null;
    switch($division) {
        case 'i':
            $divstr = 'International';
            break;
        case 'u':
            $divstr = 'U.S. and Politics';
            break;
        case 'b':
            $divstr = 'Business';
            break;
        case 'c':
            $divstr = 'Science and Conservation';
            break;
        case 'l':
            $divstr = 'Local';
            break;
        case 's':
            $divstr = 'Sports';
            break;
    }
    return '<a href="/Division?topic='.$divstr.'" title="Click to read '.$divstr.' articles.">'.$divstr.'</a>';
}

// Call this function to write the article thumbnail block onto the screen. id = Article ID, layout = Window Layout (e.g. desktop, tablet)
function printArticle($id, $layout) {
    echo '
    <article>
    <section>
      <div class="recent-img">'.getImg($id).'</div>
    </section>
    <section class="'.$layout.'">
      <h4 class="category">'.getDiv($id).'</h4>
      <h3>'.getTitle($id).'</h3>
      <h4 class="author">'.getAuthor($id).'</h4>
      <p>'.trim(substr(getSummary($id), 0, 100)).'...</p>
    </section>
  </article>';
}

?>