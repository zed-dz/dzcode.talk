<?php
/* to show errors manually in php */
ini_set('assert.exception', 1);
ini_set('zend.assertions', 1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*
primitive type declarations only in php7
 */

// ... => you could have a lot of parameters and we will put them
// in an array and shock them in $int array

// to do the poly and coer we use the type of parm before it and then
// it we be auto converted

function parse(int ...$int)
//function parse(int $int, string $str , bool $boolean)
{
    //print the content what is stored inside int
    echo '<pre>' . json_encode($int, JSON_PRETTY_PRINT) . '</pre>';
}
parse(20, "222", 22.12, true);

// we would have a problem if we do some math op of string and int etc..
// so the solution is -> polymorphism & coercion

//coercion => fit a certain data type => integer coercion

//for our example we will try to make all
// the 4 par to integer ( "222" => 222 , 22.22 => 22 , true => 1)

echo "<br>";


/*
object type declarations php5 and up */

//arrays and objects and no polymorphism
function parse2(array $kit)
{
    echo '<pre>' . json_encode($kit, JSON_PRETTY_PRINT)
    . '</pre>';
}

$arr = array("key" => "value", "color" => "red");
parse2($arr);


//function are first class citizens so we consider them as an object
// so we can put functions inside of functions and inside a variable <etc class=""></etc>

//callable calls only a function cause function are like we said objects
function parse3(callable $callback)
{
    echo "this string came from the parse3 function <br>";
    $callback();
}
// parse3(function (){echo "callable function : this string comes from callback function";});

$fcc = function () {
    echo "callable function : this string comes from callback function";
};
parse3($fcc);
echo '<br>';

interface checker
{
}
class cake
{
}
class salad implements checker
{
}
function rest(checker $food)
// function rest(cake $food)
{
    echo var_dump($food);
}
$box = new salad;
rest($box);

echo '<br>';

class potato
{
//self refers to her class mother which is potato and it can only be used in classes !
    public function icing(self $thisPotato)
    {
        echo 'potato to ice <br>';
        echo var_dump($thisPotato);
    }
}

class podding
{
}
$potato1 = new potato;
$potato2 = new potato;
$potato3 = new podding;
$potato2->icing($potato1);
echo '<br>';
// $potato2->icing($potato3);

echo '<br>';

/*
return type declarations php7
which means we can control what data type the return function is
 */
// function dataReturn():int
function dataReturn() : array
{
// return "20"; // it also apply on it the polymorphism from a string to an integer
    return array("key" => "value");
}

echo var_export(dataReturn()) . "<br>";

class obj implements checker
{
}
function dataReturnObj() : checker
{
    return new obj;
}
echo var_export(dataReturnObj()) . "<br>";


function dataCall() : callable
{
    echo "do something and then callback a function <br>";

    return function () {
        echo " a callable function <br>";
    };
}
echo var_export(dataCall()) . "<br>";



class selfObj
{
    public function dataSelfObj($object) : self
    {
        return $object;
    }
}
$a = new selfObj;

echo var_export($a->dataSelfObj(new selfObj)) . " <br>";


/* anonymous classes */

class a
{
    public $hello = "say hello";
}
interface b
{
    public function print();
}
//an annonymous has no name it is good fo security reasons and for like uing it once
$framework = new class("read only param") extends a implements b {
//the parameter of the constructor is declared inside of the class object param
//if a function isnt declared private or pubic then it is left empty means it is public

    private $readonly;

    public function __construct($ro)
    {
        $this->readonly = $ro;
    }

    public function print()
    {
        echo $this->readonly;
    }
    public static function hello()
    {
        echo "hey";
    }
};

// echo $framework->print . '<br>';
echo $framework->hello . '<br>';


/* functional call context */
// we can change $this of the function from the outside with the call method
//take into consideration that $this only allows type of obj not primitives
$context = function () {
    echo var_dump($this).'<br>';
    // echo $this->prop.'<br>';
};
class newOBJ2
{
    public $prop = "hello wolrd! for the million time";
}
$context->call(new newOBJ2);



/* unserialize filtering */
// taking an object and turn it into a string => cause maybe you wanna take that
//string and send it into another php script and then unserialize that string

class objSerialize
{
    public $prop = " hello fucking world";
    private $priv = " hello fucking world privatly saying";
    private $arr = [200, 20, 15];
} //put the object into a string

$data = serialize(new objSerialize);
echo $data . '<br>';

//now puting the string back to an object , the new feature in php7 is
// the allowed classes for more security reasons

$unserialize = unserialize($data, ["allowed_classes" => ["objSerialize","newobj"]]);
echo $unserialize->prop.'<br>';

$unserialize2 = unserialize($data, ["allowed_classes" => ["blabla"]]);
echo var_export($unserialize2).'<br>';





class constr
{
    public function __construct($arg1)
    {
        $this -> createPop = $arg1;
    }

    public static function method()
    {
        echo "method run!";
    }
}
//php7 u need to say construct for the constructor function

constr::method();

$test = new constr("new style constructor");
echo $test->createPop;
echo "<br>";
