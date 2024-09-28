<?php

function check_user($email)
{
    global $conn;

    $user_data = "SELECT * FROM users WHERE email = '$email'";
    return mysqli_fetch_assoc(mysqli_query($conn, $user_data));
}

dd(check_user("admin@gmail.com"));