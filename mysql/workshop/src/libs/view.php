<?php

/*
 * Require file from inc files with data
 */
function view(string $file, array $item = [])
{
    foreach ($item as $key => $value) {
        $$key = $value;
    }
    include_once __DIR__ . "/../inc/$file.php";
}

/*
 * to redirect to file in the public
 */
function redirect_to(string $url)
{
    header("Location: $url.php");
    exit;
}

/*
 *  redirect with
 */
function redirect_with(string $url, array $item): void
{
    foreach ($item as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}

/*
 * redirect to with a flash message
 */
function redirect_with_message(string $url, string $message, string $type = FLASH_SUCCESS)
{
    flash('flash_' . uniqid(), $message, $type);
    redirect_to($url);
}