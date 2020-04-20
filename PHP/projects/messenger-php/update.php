<?php

/* to show errors manually in php */
ini_set('assert.exception', 1);
ini_set('zend.assertions', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* we will do this in OOP PHP */

// $db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$db = new mysqli("localhost", "root", "", "messenger");

if ($db->connect_error) {
    die("couldnt connect to db");
}
// to prevent corss site scripting xss (prevent tags in the url like <abcdef> => &lt;abcdef&gt; )

// $_GET to get the values from the Url
$username = stripslashes(htmlspecialchars($_GET['username']));
$message = stripslashes(htmlspecialchars($_GET['message']));

if ($username === "" || $message === "") {
    die();
} else {
    // URL?username=amine&message=hello%20world
    echo $username . ' ' . $message . "<br>";
}
// prepared statement to prevent sql injections
// '' -> id auto incremented
$result = $db->prepare("INSERT INTO user VALUES('',?,?)");
// ss = string string
 $result->bind_param("ss", $username, $message);
 $result->execute();
