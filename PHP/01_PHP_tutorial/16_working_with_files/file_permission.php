<?php

$fileName = 'created/permission.txt';

$f = fopen($fileName, 'a+');
chmod($fileName, 0777);
if (is_executable($fileName)) {
    echo 'is Executable';
    echo "<br>";
} else {
    echo 'is Not Executable';
    echo "<br>";
}
if (file_exists($fileName)) {
    echo "close it ";
    echo "<br>";
    fclose($f);
}


