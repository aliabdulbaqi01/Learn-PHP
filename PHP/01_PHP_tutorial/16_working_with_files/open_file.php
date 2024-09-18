<?php
$filename = 'created/readme.txt';

//if (!file_exists($filename)) {
//    die("The file $filename does not exist");
//}

$f = fopen($filename, 'r');

if ($f) {
    echo 'The file ' . $filename . ' is readable' . PHP_EOL;
    fclose($f);
}
echo '<br />';


$functions = [
    'is_readable',
    'is_writable',
    'is_executable'
];

foreach ($functions as $f) {
    echo $f($filename) ? 'The file ' . $filename . $f : '';
    echo '<br />';
}

if (is_file($filename)) {
    $message = "the file $filename already exists.";
} else {
    $message = "the file $filename does not exists.";
}
echo $message . PHP_EOL;


$permissions = fileperms($filename);
echo "<br>";
echo substr(sprintf('%o', $permissions), -4); //0666
echo "<br>";
echo $permissions . PHP_EOL;