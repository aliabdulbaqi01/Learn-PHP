<?php


// return data from the storage
function get_data($filename)
{
    $data = file_get_contents($filename);
    $data = json_decode($data, true);
    return $data;
}

function put_data($filename, $data): void
{
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
}

// if exist return the data otherwise, return false.
function is_exist(string $email)
{
    $filename = __DIR__ . "/../../storage/users.json";
    if (file_exists($filename)) {
        $users = get_data($filename);
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                return $user;
            }
        }


    }
    return false;
}


// register
function register($data)
{
    $errors = [];

    // if the email is exists return error
    if (is_exist($data['email'])) {
        $errors['email'] = 'Email already exists';
        redirect_to('login');
    }

    // rules for validation
    $fields = [
        'email' => "required | email",
        'password' => "required | min: 8",
        'password_confirmation' => "required | same: password"
    ];

    // validate and return all errors
    $errors = validate($data, $fields);

    // if error is empty
    if (!$errors) {
        // the value that will be stored in the file
        $user = [
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s', time())
        ];
        $filename = __DIR__ . "/../../storage/users.json";
        $users = get_data($filename);
        array_push($users, $user);
        put_data($filename, $users);
        redirect_to('login');
    }
    return $errors;
}

// login
function login($data): array
{
    $errors = [];
    $user = is_exist($data['email']);
    if ($user) {
        if (password_verify($data['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            redirect_to('index.php');
        }
        $errors['password'] = 'Wrong password';
        return $errors;
    }
    $errors['email'] = 'email is not exist';
    return $errors;
}

// logout
function logout(): void
{
    session_destroy();
    redirect_to('login');
}

// update user profile
function updateUserProfile($data): bool
{
    $filename = __DIR__ . "/../../storage/users.json";
    $users = get_data($filename);
    foreach ($users as $user => $value) {
        if ($user['id'] == $_SESSION['user']['id']) {
            $user['email'] = $data['email'];
            $_SESSION['user']['email'] = $data['email'];
            $user['updated_at'] = date('Y-m-d H:i:s', time());
            break;
        }
    }
    put_data($filename, $data);
    return true;
}


// delete user profile
function deleteUserProfile(): bool
{
    $filename = __DIR__ . "/../../storage/users.json";
    $users = get_data($filename);
    foreach ($users as $user => $value) {
        if ($user['id'] == $_SESSION['user']['id']) {
            unset($users[$user]);
            break;
        }
    }
    put_data($filename, $users);
    logout();
    return true;
}

// only authenticated user could access page with auth middleware
function auth()
{
    if (!isset($_SESSION['user'])) {
        redirect_to('login');
    }
}

// cannot access it if your auth
function guest()
{
    if (isset($_SESSION['user'])) {
        redirect_to('index.php');
    }
}















// for test
//  function is_exist(string $data)
//{
//    $filename = __DIR__ . "/../../storage/users.json";
//    if (file_exists($filename)) {
//        $users = get_data($filename);
//        $is_email = filter_var($data, FILTER_VALIDATE_EMAIL);
//        if ($is_email) {
//            foreach ($users as $user) {
//                if ($user['email'] == $data) {
//                    return $user;
//                }
//            }
//        }
//        foreach ($users as $user) {
//            if ($user['username'] == $data) {
//                return $user;
//            }
//        }
//
//    }
//    return false;
//}