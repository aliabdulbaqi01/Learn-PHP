<?php

$fields = [
    'firstname' => 'required, max:255',
    'lastname' => 'required, max:255',
    'address' => 'required | min:10, max:255',
    'zipcode' => 'between:5,6',
    'username' => 'required | alphanumeric | between:3,255 | unique:users,username',
    'email' => 'require | email | unique:users,email',
    'password' => 'require | alphanumeric | between: 3,255',
    'password2' => 'require | same:password',
];

// errors messages
const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %s characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should have letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at 
                 least one number, one upper case letter, one lower case 
                 letter and one special character',
    'unique' => 'The %s already exists',
];


/**
 * Validate
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    // Split the array by a separator, trim each element
    // and return the array
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rules
    $rule_messages = array_filter($messages, fn($message) => is_string($message));
    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            // get rule name params
            $params = [];
            // if the rule has parameters e.g., min: 1
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            // by convention, the callback should be is_<rule> e.g.,is_required
            $fn = 'is_' . $rule_name;

            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    // get the error message for a specific field and rule if exists
                    // otherwise get the error message from the $validation_errors
                    $errors[$field] = sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        $field,
                        ...$params
                    );
                }
            }
        }
    }

    return $errors;
}


// check if it required
function is_required(array $data, string $field): bool
{

    return isset($data[$field]) && trim($data[$field]) === '';
}

// check that value is a valid email
function is_email(array $data, string $field): bool
{
    if (empty($data[$field])) {
        return true;
    }
    return filter_var($data[$field], FILTER_VALIDATE_EMAIL);
}

// check that length is greater than or equal to min
function is_min(array $data, string $field, int $min): bool
{
    if (!isset($data[$field])) {
        return true;
    }
    return mb_strlen($data[$field]) >= $min;
}

// check that length is smaller than ore equal to max
function is_max(array $data, string $field, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }
    return mb_strlen($data[$field]) <= $max;
}

// check if the value length between min and max
function is_between(array $data, string $field, int $min, int $max): bool
{
    if (!isset($data[$field])) {
        return true;
    }
    $length = mb_strlen($data[$field]);
    return $length >= $min && $length <= $max;
}

// check if the value contains only letters or character
function is_alphanumeric(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return true;
    }
    return ctype_alnum($data[$field]);
}

// check if value is the same as the other value

function is_same(array $data, string $field, string $other): bool
{
    if (isset($data[$field], $data[$other])) {
        return $data[$field] === $data[$other];
    }
    if (!isset($data[$field]) && !isset($data[$other])) {
        return true;
    }
    return false;
}


// is secure check that field value has between 8 and 64 characters
// and contains at least one number, one upper case letter,
// one lower case letter, and one special character.
function is_secure(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return false;
    }
    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    return preg_match($pattern, $data[$field]);

}


// to check if the value is unique
//function is_unique(array $data, string $field, string $table, string $column): bool
//{
//    if (!isset($data[$field])) {
//        return true;
//    }
//
//    $sql = "SELECT $column FROM $table WHERE $column = :value";
//
//    $stmt = db()->prepare($sql);
//    $stmt->bindValue(":value", $data[$field]);
//
//    $stmt->execute();
//
//    return $stmt->fetchColumn() === false;
//}
