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

?>