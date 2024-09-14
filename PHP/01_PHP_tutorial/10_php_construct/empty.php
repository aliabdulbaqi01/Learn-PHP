<?php

// all of this are varaible that is not set is empty or its value equals the following

/*
 The false
The integer 0
The float 0.0 and -0.0
The string "0"
The empty string ''
An array with no element
null
SimpleXML objects created from empty elements that have no attributes.
 */

// !isset($v) ||  $v == false

// it is construct so we cannot return value from it, to solve that
function not_exist_or_false($var) : bool
{
    return empty($var);
}

//
var_dump(empty($count));

// for each of this value the resul will be true
$falsy_values = [false, 0, 0.0, "0", '', null, []];

foreach($falsy_values as $value) {
    var_dump(empty($value));
}