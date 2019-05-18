<?php

// Writes the entire file contents onto the current page. (Uses a relative URL from index.html)
function writefilecontents($path) {
    $myfile = fopen($_SERVER['DOCUMENT_ROOT'].$path, "r") or die("Unable to open file!");
    echo fread($myfile, filesize($_SERVER['DOCUMENT_ROOT'].$path));
    fclose($myfile);
}

?>