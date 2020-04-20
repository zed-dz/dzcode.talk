<?php

/*
namespacing helps to identify functions and names of other php files so that it wont get conflicts
*/
require 'operator.php'; // it will copy the whole code in here

use php7\operator as op;

use php7\operator; // alias here is the name of the class operator

use php7\class1;
use php7\class2 as c2;

use function php7\function1;
use function php7\function2 as func2;

//the same for the rest

// $obj = new op\function;

// echo "<br>";

// op\function();
