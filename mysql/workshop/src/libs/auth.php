<?php

function auth()
{
    return $_SESSION['auth'];
}

function is_user($email)
{
    global $conn;

    $user_data = "SELECT * FROM users WHERE email = '$email'";
    return mysqli_fetch_assoc(mysqli_query($conn, $user_data));
}


/*
 * login process
 */
function login($inputs)
{
    // fields for sanitization
    $validation = [
        'email' => 'email | min:5',
        'password' => 'string'
    ];

    // sanitization
    [$inputs, $errors] = filter($inputs, $validation);
    if (!$errors) {

        $user = is_user($inputs['email']);
        if ($user) {
            if (password_verify($inputs['password'], $user['password'])) {
                $_SESSION['auth'] = $user;
                redirect_to('index');
            }
            $errors['password'] = "Wrong password";
            return $errors;
        }
        $errors['email'] = "email is not exist, please register first";
        return $errors;
    }
    return $errors;
}

