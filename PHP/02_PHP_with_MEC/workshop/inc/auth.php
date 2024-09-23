<?php
include_once 'help.php';
session_start();

// array of errors
$errors = [];

// errors message
const USERNAME_NOT_EXIST = "username is not exist";
const PASSWORD_IS_WRONG = "the password is not true, ";
const EMAIL_INVALID = "";


//check if the user exist in the file by username
function is_exist($data)
{
    $filename = __DIR__ . "/../storage/users.json";
    $users = file_get_contents($filename);
    $users = json_decode($users, true);
    foreach ($users as $user) {
        if ($user['username'] == $data['username']) {
            return $user;
        }
    }
    return false;
}


// store the new user in the storage
function register($user)
{
    global $errors;
    $filename = __DIR__ . "/../storage/users.json";
    $data = file_get_contents($filename);
    $data = json_decode($data, true);
    array_push($data, $user);
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    return true;
}

// login
function login($data)
{
    // errors
    global $errors;
    $errors = [];

    // check if user exist in the storage and return that user
    $user = is_exist($data);
    if ($user) {
        if ($data['password'] == $user['password']) {
            $_SESSION['username'] = $user['username'];
            return true;
        }
        $errors['password'] = PASSWORD_IS_WRONG;
        return false;
    }
    $errors['username'] = USERNAME_NOT_EXIST;
    return false;
}


// logout
function logout()
{
    session_destroy();
    header('Location: login.php');
    exit;
}


// for authenticated user
function auth()
{
    // if the user is not authenticated
    if (!isset($_SESSION['username'])) {
        // redirect him to login page
        header('Location: login.php');
    }
}


// for unauthenticated user
function guest()
{
    // if the user is authenticated
    if (isset($_SESSION['username'])) {
        // redirect him to home page
        header('Location: index.php.php');
    }
}


