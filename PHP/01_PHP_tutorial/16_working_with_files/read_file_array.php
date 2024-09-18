<?php


$filename = 'created/readme.txt';
$f = fopen($filename, 'r');

if ($f) {
    $contents = fread($f, filesize($filename));
    fclose($f);
    echo nl2br($contents);
}

//
//
//$lines = file(
//    'created/readme.txt',
//    FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES
//);
//
//
//if ($lines) {
//    foreach ($lines as $line) {
//        echo htmlspecialchars($line) . PHP_EOL;
//    }
//}
