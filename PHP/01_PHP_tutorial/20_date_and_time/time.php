<?php


echo time();
echo "<br>";
echo "<hr>";

// for days
echo "for Days";
echo "<br>";
echo date('d-D-j-z-l-N-S-w', time());
echo "<br>";
echo "<hr>";


// for weeks
echo "for weeks";
echo "<br>";
echo date('W', time());
echo "<br>";
echo "<hr>";


// for months
echo "for months";
echo "<br>";
echo date('F-m-M-n-t', time());
echo "<br>";
echo "<hr>";

// for years
echo "for Years";
echo "<br>";
echo date('L-o-x-X-Y-y', time());
echo "<br>";
echo "<hr>";


// for Time
echo "for Time";
echo "<br>";
echo date('a-A-B-g-G-h-H-i-s-u', time());
echo "<br>";
echo "<hr>";


// for full date/time
echo "for full";
echo "<br>";
echo date('c-r-u', time());
echo "<br>";
echo "<hr>";


echo "<br>";
echo "<br>";

echo 'set the time to a specific time using mktime() functio' . '<br>';
echo '<strong>July 13, 2021 is on a ' . date('l', mktime(0, 0, 0, 7, 13, 2021)) . '</strong>';