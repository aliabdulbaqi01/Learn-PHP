<?php

require __DIR__ . '/filter.php';

$data = [
    'name' => '',
    'email' => 'john$email.com',
];

$fields = [
    'name' => 'string | required | max: 255',
    'email' => 'email | required | email'
];

[$inputs, $errors] = filter($data, $fields);

print_r($inputs);
print_r($errors);