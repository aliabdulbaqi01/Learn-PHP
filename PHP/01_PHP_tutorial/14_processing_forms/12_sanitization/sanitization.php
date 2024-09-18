<?php


function array_trim(array $items): array
{
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item);
        } elseif (is_array($item)) {
            return array_trim($item);
        } else
            return $item;
    }, $items);
}

function sanitize(array $inputs, array $fields = [], int $default_filter = FILTER_UNSAFE_RAW, array $filters = FILTERS, bool $trim = true): array
{

    // filter array
    if ($fields) {
        $options = array_map(fn($field) => $filters[$field], $fields);
        $data = filter_var_array($inputs, $options);
    } else {

        $data = filter_var_array($inputs, $default_filter);
    }
    return $trim ? array_trim($data) : $data;

}


// example of $fields
// should be an associative array in which the key
$fields = [
    'name' => 'string',
    'email' => 'email',
    'age' => 'int',
    'weight' => 'float',
    'github' => 'url',
    'hobbies' => 'string[]'
];
// strings[] an array of strings

// to get a filter based on the rule of a field
const FILTERS = [
    'string' => FILTER_UNSAFE_RAW,
    'string[]' => [
        'filter' => FILTER_UNSAFE_RAW,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'email' => FILTER_SANITIZE_EMAIL,
    'int' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_SCALAR
    ],
    'int[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'float' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_FLAG_ALLOW_FRACTION
    ],
    'float[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'url' => FILTER_SANITIZE_URL,
];