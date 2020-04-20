<?php

/* the colecing operator ?? */

echo '<pre>' . json_encode($_GET, JSON_PRETTY_PRINT)
  . '</pre><br>';

//http://localhost:3000/php7/operator.php?hello=world&var=two

//if there isnt a value name then an alternative is token whick iss john else the global then loz

$personne = "john";
$var = $personne ?? $_GET['name'] ?? 'loz';
echo $var . '<br>';


/* the spaceship operator */
// -1 left less then right , 0 matching , 1 bigger , also polymorhpism is allowed

// $spo = 2 <=> "20";

$spo = array(200, 1, 5) <=> array(200, 2, 5);

echo $spo . '<br>';


// - 1 and 1 are true and 0 is false,, which in the if statement it will do it if it is true

if (array(20, 1, 1) <=> array(2, 1, 1)) {
    echo "something true => 1 or -1 > less or greater then happeneed <br>";
}

if ((array(20, 1, 1) <=> array(2, 1, 1)) === 1) {
    echo " 1 = 1 it is greater <br>";
}

