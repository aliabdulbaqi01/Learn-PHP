<?php

$isset = fn($var) => isset($var);

// when the variable is not exist
var_dump(isset($count)); // false


// when it exist
$count = 0;
var_dump(isset($count)); // true


// when it null
$count = null;
var_dump(isset($count)); // false


// when using unset
$count = 0;
unset($count);
var_dump(isset($count)); // true


//with array element
$colors = ['primary' => 'blue'];
var_dump(isset($colors['primary']));  // true


// when array element is not exist in the array
$colors = ['primary' => 'blue', 'secondary' => null];
var_dump(isset($colors['secondary']));  // false


// when array element is null
$colors = ['primary' => 'blue','secondary' => null];
var_dump(isset($colors['secondary']));  // flase


// with string offsets
$message = 'Hello';
var_dump(isset($message[0])); // true


// if is set multiple (all true)
$x = 10;
$y = 20;
$z = 30;
var_dump(isset($x, $y, $z)); // true


// if is set multiple (one is null)
$x = 10;
$y = null;
$z = 30;
var_dump(isset($x, $y, $z)); // false


// if is set multiple (one is false)
$x = 10;
$y = false;
$z = 30;
var_dump(isset($x, $y, $z)); // true

