<?php

// check the name variable in the post request
if (filter_has_var(INPUT_POST, 'name')) {
    echo 'The name variable exists: ' . htmlspecialchars($_POST['name']);
}else {
    echo 'The name is required';
}

// or you can use  this
/*

if (isset($_POST['name'])) {}
but should know that
    - this way doesn't check if the variable come from HTTP Request or not
    - which mean you can do this
        - $_POST['name'] = 'ali'
        - and assign the value manualy
 */