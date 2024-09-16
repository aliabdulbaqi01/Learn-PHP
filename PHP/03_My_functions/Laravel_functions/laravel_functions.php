<?php

function dd($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}

// this is just example not the real function
// and not the real implementation of the view in laravel
function view1(string $file): void
{
    require __DIR__ . $file;
}
// To pass the data to the script specified by the $file,
// you can add a second parameter to the view() function like this:
// to access the variable in the view you have to access it by the array
// like this $data['name']

function view2(string $file, array $data): void
{
    require __DIR__ . $file . '.php';
}

// to Solve that you can use foreach and access the key by the variable name
// this an example to the usage of the variable variables
function view(string $file, array $data) :void
{
    foreach ($data as $key => $value) {
        // now you can access the value by the value of the key.
        $$key = $value;
    }
    require __DIR__ . '/' . $file;
}
