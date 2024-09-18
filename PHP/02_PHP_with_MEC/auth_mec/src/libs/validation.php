<?php

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must be at least %d characters',
    'max' => 'The %s must be at least %d characters',
    'between' => 'The %s must be between %d and %d characters',
    'alphanumeric' => 'The %s must contain only alphanumeric characters',
    'same' => 'The %s must be the same as %s',
];
$fields = [
    'name' => 'required | min:55',
];
// $data
// check if it valid or not
// fields contain each input should be valid in what
function validate(array $data, array $fields, array $messages): array
{
    $splits = fn($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rule
    $rule_messages = array_filter($messages, fn($message) => is_string($message));

    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);
    $errors = [];

    foreach ($fields as $field => $options) {
        // ['required', 'min:55']
        $rules = $splits($options, '|');

        foreach ($rules as $rule) {
            // get rules name
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $splits($rule, ':');
                $params = $splits($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            $fn = 'is_' . $rule_name;
            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if ($pass) {
                    $errors[$field] = sprintf($messages[$field][$rule_name] ?? $validation_errors[$rule_name], $field, ...$params);
                }
            }
        }
    }


    return $errors;
}

// should be required
function is_required(array $data, string $field): bool
{
    return isset($data[$field]) && trim($data[$field]) !== '';
}

function is_email(array $data, string $field): bool
{
    return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
}

// return ture if it greater than min length
function is_min(array $data, string $field, int $min): bool
{
    return mb_strlen($data[$field]) >= $min;
}

// return ture if it less than max length
function is_max(array $data, string $field, int $max): bool
{
    return mb_strlen($data[$field]) <= $max;
}

// return true if the length between min and max number
function is_between(array $data, string $field, int $min, int $max): bool
{
    $length = mb_strlen($data[$field]);
    return $length >= $min && $length <= $max;
}

// return true if it alphanumeric
function is_alphanumeric(array $data, string $field): bool
{
    return ctype_alnum($data[$field]);
}