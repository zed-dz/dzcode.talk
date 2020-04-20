<?php

/* Warning
Using string as the assertion is DEPRECATED as of PHP 7.2.

description
An optional description that will be included in the failure message if the assertion
fails.

exception
In PHP 7, the second parameter can be a Throwable object instead of a descriptive
string, in which case this is
the object that will be thrown if the assertion
fails and the assert.exception configuration directive is enabled.

*/

//assertion === affirmation , it is confirm test exceptions

/* php5 old testing with booloean 0 false 1 true of the first param in assert
$num = "number";
assert(is_numeric($num), 'no it is an error string');

the string output is no longer supported in php7 you must use an object

 assert($num > 100, "yes it is"); // php7 makes the 2 param more dynamic
 the 1fst => 1 , 0 , false , true , polymorph .... , the
  2nd => can be an obj handler
  it goes on the php.ini and enables the assert.exception error handling
*/

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
