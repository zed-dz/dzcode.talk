<?php
/* some good stuff */

//if there isnt a value name then an alternative is token whick iss john else the global then loz
$personne = "john";
$var = $personne ?? $_GET['name'] ?? 'loz';
echo $var . '<br>';


echo '<br><br>' . json_encode($something, JSON_PRETTY_PRINT);


/* unserialize filtering */


// taking an object and turn it into a string => cause maybe you wanna take that string
// and send it into another php script and then unserialize that string

class objSerialize
{
    public $prop = " hello fucking world";
    private $priv = " hello fucking world privatly saying";
    private $arr = [200, 20, 15];
} //put the object into a string

$data = serialize(new objSerialize);
echo $data . '<br>';

//now puting the string back to an object , the new feature in php7
// is the allowed classes for more security reasons
$unserialize = unserialize($data, ["allowed_classes" => ["objSerialize","newobj"]]);
echo $unserialize->prop.'<br>';

$unserialize2 = unserialize($data, ["allowed_classes" => ["blabla"]]);
echo var_export($unserialize2).'<br>';


/* exceptions */


ini_set('assert.exception', 1);
ini_set('zend.assertions', 1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$num = 20;

class HandleError extends AssertionError
{
    //even if it is empty
}
 assert($num > 200, new HandleError("you can even put an error param "));



/* session config new */

//now in php7 u can edit all the session properties in an array of the session start like so

session_start([
'cache_limiter'=>'private',
'read_and_close'=>false,
]);

$_SESSION['name'] = "amine";

?>
 <a href="operator.php">log in here</a>

<?php
/* encryption */

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

// $ 2 chars for the type of encrypting by default is crypt() the second $ p
// aram of 2 or 3 chars is the cost of the encryption the higher the better but
// the payload will make the page slower and then a $ 10 chars for
// the random salt and the last $ is the password


//password_verify();


/* regex  */

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

// -1 means no limitation and 1 or more means only certain limitation to check
// for match

echo 'num of matches are '. $numOfMatches . '<br>';




/* meta data get informations */

$fp = fopen('http://www.exxample.com', 'r');
$meta = stream_get_meta_data($fp);
// now its only a one param in php7 it will fetch the
// file http or https and will give back so nice informations about
// the http request and much more usefull informations

echo '<pre>'. json_encode($meta, JSON_PRETTY_PRINT) .'</pre>';
fclose($fp);


/* array return function echoed */

function test()
{
    return array(124);
}
echo test()[0]; //echo out the first element of the returned item of the array
