<?php


/*
 * Generate token
 */
function csrf()
{
    $_SESSION['csrf'] = bin2hex(random_bytes(35));
}


/*
 * Hidden input with csrf taken value;
 */
function csrf_input()
{
    $token = $_SESSION['csrf'];
    return "<input type='hidden' name='token' value='$token'>";
}


/*
 * Verify taken
 */
function csrf_token()
{
    // declare taken contain  the hidden value
    $taken = filter_input(INPUT_POST, 'token', FILTER_UNSAFE_RAW);

    // check if the take equal to the value
    if (!$taken || $taken !== $_SESSION['csrf']) {
        header($_SERVER['SERVER_PROTOCOL'] . " 405 Method Not Allowed");
        exit();
    }
    return true;
}