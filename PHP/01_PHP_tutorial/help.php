<?php


// dump and die the code
// with some simple style
function dd($data)
{
    echo "<div class='container ' style='background-color: rgba(4,11,55,0.53);
            color: white; padding: 5px;'>";
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    echo "</div>";
    die();
}


