<?php

require __DIR__ . '/../11_validation/validation.php';
require __DIR__ . '/../12_sanitization/sanitization.php';


// you should include validate and sanitize functions
function filter(array $data, array $fields, array $messages = []): array
{
    $sanitization_rules = [];
    $validation_rules = [];

    foreach ($fields as $field => $rules) {
        if (strpos($rules, '|')) {
            [$sanitization_rules[$field], $validation_rules[$field]] = explode('|', $rules, 2);
        } else {
            $sanitization_rules[$field] = $rules;
        }
    }


    $inputs = sanitize($data, $sanitization_rules);
    $errors = validate($inputs, $validation_rules, $messages);
    return [$inputs, $errors];
}
