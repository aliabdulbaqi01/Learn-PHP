<?php

// This code will work good
// but it not reusable
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errors['email'] = "Invalid email";
    }
} else {
    $errors['email'] = "Invalid email";
}