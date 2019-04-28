<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Scripts/functions.php';

// Using relative paths.
$masteropenhtml = '/MASTER/master.open.html';
$masterclosehtml = '/MASTER/master.close.html';
$mastercss = '/MASTER/Styles/master.css';

$bodyhtml = '/body.html';

// Begin creating the html document.
writefilecontents($masteropenhtml);

// Write the body here.
writefilecontents($bodyhtml);

// Close tags in the html document.
writefilecontents($masterclosehtml);

?>