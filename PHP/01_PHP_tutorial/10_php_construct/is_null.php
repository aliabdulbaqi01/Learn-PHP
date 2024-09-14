<?php
$isnull = fn($v) => is_null($v);
$color = null;
echo $isnull($color); // true
echo "\n";

$var = false;
echo is_null($var) ? 'true' : 'false';
echo "\n";


$count = 1;
var_dump(is_null($count)); // false
echo "\n";

// with array
$colors = [
    'text' => 'black',
    'background' => 'white'
];

//var_dump(is_null($colors['link']), PHP_EOL);
echo "\n";

function echo_bool(string $title, bool $v): void
{
    echo $title, "\t", $v === true ? 'true' : 'false', PHP_EOL;
}

echo_bool('null == false:', null == false);
echo_bool('null == 0:', null == 0);
echo_bool('null == 0.0:', null == 0.0);
echo_bool('null =="0":', null == false);
echo_bool('null == "":', null == '');
echo_bool('null == []:', null == []);
echo_bool('null == null:', null == null);
echo "\n";
