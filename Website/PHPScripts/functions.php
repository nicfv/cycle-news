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
    echo getcol('articles', $id, 'title');
}

// Call this function to print the author of the article with the given ID.
function getAuthor($id) {
    echo getcol('articles', $id, 'author');
}

// Call this function to print the date of the article with the given ID.
function getNewsDate($id) {
    echo getcol('articles', $id, 'relevant');
}

// Call this function to print the summary of the article with the given ID.
function getSummary($id) {
    echo getcol('articles', $id, 'summary');
}

// Call this function to print the embedded soundcloud of the article with the given ID.
function getSoundcloud($id) {
    echo getcol('articles', $id, 'sc');
}

// Call this function to print the IMAGE ELEMENT of the article with the given ID.
function getImg($id) {
    $imgpath = getcol('articles', $id, 'imgpath');
    if($imgpath) {
        echo '<img src="'.$imgpath.'">';
    }
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
    echo '<a href="/Division?topic='.$divstr.'" title="Click to read articles on '.$divstr.' news.">'.$divstr.'</a>';
}

?>