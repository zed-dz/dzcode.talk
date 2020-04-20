<?php
/* to show errors manually in php */
ini_set('assert.exception', 1);
ini_set('zend.assertions', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new mysqli("localhost", "root", "", "messenger");
if ($db->connect_error) {
    die("couldnt connect to db");
}
$username = stripslashes(htmlspecialchars($_GET['username']));
$results = $db->prepare("SELECT * FROM user");
$results->execute();
$results = $results->get_result();
// we are spliting the usernames & the message by // and a cookie by a new line \n
while ($r = $results->fetch_row()) {
    echo $r[1] . "\\" . $r[2] ."\n";
}

// foreach ($results as $r) {
//     echo json_encode($r,JSON_PRETTY_PRINT) . "<br>";
// }
