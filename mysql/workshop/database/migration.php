<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/libs/helpers.php';

$conn = get_connection();
//dd($conn);


/*
 * create user table
 */
$create_users_table = "CREATE TABLE IF NOT EXISTS `users` (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    )";
mysqli_query($conn, $create_users_table);


/*
 * Create task table
*/
$create_tasks_table = "CREATE TABLE IF NOT EXISTS `tasks` (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description text,
    image VARCHAR(255),
    status BOOLEAN DEFAULT 1,
    user_id INT(11) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";
mysqli_query($conn, $create_tasks_table);

/*
 * insert a default user to users ta table
 */
$name = 'admin';
$email = 'admin@gmail.com';
$password = password_hash('password', PASSWORD_DEFAULT);

$check_user = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $check_user);
if (mysqli_num_rows($result) == 0) {
    $insert_default_user = "INSERT INTO `users` ( `name`, `email`, `password`,) VALUES
                                ('ali', 'admin', '$password') ";
    mysqli_query($conn, $insert_default_user);
}


