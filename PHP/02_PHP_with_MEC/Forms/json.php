<?php

$file = file_get_contents('data.json');
$json = json_decode($file, true);   // by default it will return array of object
                                                 // if make associative to true it will return array of array
echo "<pre>";
var_dump($json);

echo "</pre>";
