<?php

session_start();
echo 'hello '.$_SESSION['name'].'<br>';


/* meta data get informations */

$fp = fopen('http://www.exxample.com', 'r');
$meta = stream_get_meta_data($fp); // now its only a one param in php7
// it will fetch the file http or https and will give back so nice informations
// about the http request and much more usefull informations

echo '<pre>'. json_encode($meta, JSON_PRETTY_PRINT) .'</pre>';
fclose($fp);


/* array return function echoed */

function test()
{
    return array(124);
}
echo test()[0]; //echo out the first element of the returned item of the array



//json_pretty_print === 128 cause it is a constant , also const === define
const PERSON = array("PERSON", 200, true);
define("OFFICE", array("OFFICE", 400, false));
echo json_encode(PERSON, 128).'<br>'.json_encode(OFFICE, JSON_PRETTY_PRINT).'<br>';

//escaping characteres
echo "&pound;" . '<br>';  // this is the old way
echo "\u{2200}" . '<br>'; // the unicode of html5 utf8 of âˆ€
