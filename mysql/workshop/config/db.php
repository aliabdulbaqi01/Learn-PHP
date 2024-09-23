<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'todo_app');


function get_connection()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
    $sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
    mysqli_query($conn, $sql);
    mysqli_close($conn);
//        mysqli_select_db($conn, DB_NAME);
    return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

}


//
//$sql = "SELECT * FROM users";
//$result = mysqli_query($conn, $sql);
//$data = mysqli_fetch_assoc($result);
//
//$conn->close();