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
function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

/*
 * return true if it is a get request
 */
function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

/*
 * error class return error
 */
function error_class(array $errors, string $field): string
{
    return isset($errors[$field]) ? 'error' : '';
}

/*
 * redirect function
 */
function redirect_to(string $url): void
{
    header('Location: ' . $url);
    exit;
}

/*
 * redirect with data
 */
function redirect_with(string $url, array $message): void
{
    foreach ($message as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}

/*
 * redirect with flash message
 */
function redirect_with_message(string $url, string $message, string $type = FLASH_SUCCESS): void
{
    flash('flash_' . uniqid(), $message, 'success');
    redirect_to($url);
}

/*
 * flash message which will remove the message directly
 */
function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
}