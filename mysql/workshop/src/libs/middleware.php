<?php

/*
 * in case the user not authenticated redirect him to the login page.
 */
function is_auth()
{
    if (!isset($_SESSION['auth'])) {
        redirect_to('login');
    }
}

/*
 * in case the user authenticated redirect him to the index
 */
function is_guest()
{
    if (isset($_SESSION['auth'])) {
        redirect_to('index');
    }
}