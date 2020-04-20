<?php

//now in php7 u can edit all the session properties in an array of the session start like so

session_start([
'cache_limiter'=>'private',
'read_and_close'=>false,
]);

$_SESSION['name'] = "amine";

?>
 <a href="stuff.php">log in here</a>

 <?php
//random sault

echo random_bytes(100); //random string of a 100 characters
echo '<br>' . random_int(10, 10000000); //random integer between 10 and a 100000


echo $x = password_hash(
    'password',
    PASSWORD_DEFAULT,
array(
  'cost' => 12
)
);

// $ 2 chars for the type of encrypting by default is crypt()
// the second $ param of 2 or 3 chars is the cost of the encryption
/// the higher the better but the payload will make the page slower
// and then a $ 10 chars for the random salt and the last $ is the password


//password_verify();




// regex

$name = "amine hammou kacem de blida 20 ans aaa";

$numOfMatches;

// preg_replace_callback_array(array
// $patterns_and_callbacks, mixed $subject [, int $limit, int $count]): mixed

preg_replace_callback_array(
[
'~[a]+~i' => function ($match) {
    echo $match[0]. ' match for [a] <br>';
},
'~[b]+~i' => function ($match) {
    echo $match[0]. ' match for [b] <br>';
}
],
$name,
-1,
$numOfMatches
);

// -1 means no limitation and 1 or more means only certain limitation to check for match

echo 'num of matches are '. $numOfMatches . '<br>';
