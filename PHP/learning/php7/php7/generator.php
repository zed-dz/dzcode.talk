<?php

// a generator helps to make stops in a function so that if
// we say we have 3 functions that do the same thing we can
// just put them in one function and then use generator with yeild
// to make stops in the function like a debugger and just make it run is
// we want it to

// generators helps in analytics

function setNav()
{
    $distance = 0;
    echo 'start from driveway';
    yield "<br> first stop";
    echo "<br> take a left";
    yield "<br> second stop sign";
    echo "<br> distination reached";
    echo "<br> your journey was $distance miles ";
    $distance = yield;
    echo "<br> the new value is $distance ";
}
//if we run directly the function it wont work because when we use
// yeild it will make the func an object

$control = setNav();
echo $control -> current();
// we stop at the first yeild and then to print the yeild param out we
// need an echo on the current cause it will take it as a string and then echo it out

$control -> next();
// to the next yeild stop

$val = $control -> current();
//We cant echo next cause it is a void function so we just echo out current again
echo $val . ' concat 123 ';
echo '<br> <br>';


$control -> next();

echo "<br> analysing distnce ... <br>";

$control->send(30);
//this will adjust a value for distance = yield

class myobj
{
};
function values()
{
    yield "string";
    yield 100;
    yield 1.1;
    yield true;
    yield array("hello" => 100,'amine'=>"hammou");
    yield ['string','array',100];
    yield new myobj; //it cant do from a class
    yield from ['string','array',100];
    //the from key will yield at every value so it will stop at every value
    yield from array("hello" => 100,'amine'=>"hammou");
    //it will yield the key from every value 100 HAMMOU
}
$yld = values();

foreach ($yld as $key) {
    echo '<br><br>' . json_encode($key, JSON_PRETTY_PRINT);

    //json pretty print cant print callable objects u just have to call
    // the function of yield
}
function calling()
{
    yield function () {
        echo " <br> hello world <br>";
    };
}
$yld2 = calling();
foreach ($yld2 as $value) {
    $value();
}


function returnGen()
{
    yield from gen2();
    return 500;
}
function gen2()
{
    yield "this is from gen2";
    yield "this is from gen2 php7";
}
$gen = returnGen();
foreach ($gen as $rtn) {
    echo '<br>'. $rtn;
}
echo '<br>'. $gen->getReturn();
//the last return after a yield the order here is important
