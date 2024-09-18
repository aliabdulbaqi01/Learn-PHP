<?php

/**
 * return view
 * @param string $filename
 * @param array $data
 */
function view(string $filename, array $data = []): void
{
    // create variables from the associative array
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . '/../inc/' . $filename . '.php';
}

/*
 * return ture if it is a post request
 */
function is_post_request() :bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

/*
 * return true if it is a get request
 */
function is_get_request() :bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}