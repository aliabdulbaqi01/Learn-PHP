<?php

/*
 * require page and pass values to it
 */
function view(string $filename, array $data = []): void
{
    foreach ($data as $name => $value) {
        $$name = $value;
    }
    require_once __DIR__ . '/../inc/' . $filename . '.php';
}


/*
 * help with debugging
 */
function dd($variable): void
{
    echo "<div class='container mt-5' style='background: rgba(4,11,55,0.53); color: #b7b7b7;'>";
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    echo "</div>";
    die();
}


/*
 * redirect to with name of the page only
 */
function redirect_to(string $url): void
{
    header('Location: ' . $url);
    exit;
}


/*
 * redirect with some data
 */
function redirect_with(string $url, array $messages): void
{
    foreach ($messages as $key => $value) {
        $_SESSION[$key] = $value;
    }
    header('Location: ' . $url);
    exit;
}


/*
 * check if is the request is a post request
 */
function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}


/*
 * check if the request is get request
 */
function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}
