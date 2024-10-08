<?php

require __DIR__ . '/validation.php';
require_once '../../help.php';

$data = [
    'firstname' => '',
    'username' => 'bob',
    'address' => 'This is my address',
    'zipcode' => '999',
    'email' => 'jo@',
    'password' => 'test123',
    'password2' => 'test',
];


$fields = [
    'firstname' => 'required | max:255',
    'lastname' => 'required | max: 255',
    'address' => 'required | min: 10, max:255',
    'zipcode' => 'between: 5,6',
    'username' => 'required | alphanumeric | between: 3,255 | unique: users,username',
    'email' => 'required | email |',
    'password' => 'required | secure',
    'password2' => 'required | same:password'
];


$errors = validate($data, $fields, [
        'required' => 'The %s is required']
);


dd($errors);