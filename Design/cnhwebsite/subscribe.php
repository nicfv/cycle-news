<?php

$servername = 'sql141.main-hosting.eu';
$username = 'u560316230_test';
$pwfile = fopen(__DIR__."dbpw.pw", "r") or die("Unable to read file.");
$password = fread($pwfile, filesize(__DIR__."dbpw.pw"));
$dbname = 'u560316230_test';

// Sends a database query to a specific table and returns the result. Returns NULL if there was an error.
function query($sql) {
    global $servername, $username, $password, $dbname;
    // Create connection.
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection.
    if (!$conn) {
        die();
        echo mysqli_connect_error();
        return NULL;
    }
    // Return the result.
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

query('INSERT INTO `'.$dbname.'`.`subscriptions` (email) VALUES ("'.$_POST['email'].'")');

echo '<script>window.location.href="/"</script>';

?>