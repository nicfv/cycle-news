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

?>