<?php
require_once __DIR__ . '/../database/migration.php';
require_once __DIR__ . '/../src/bootstrap.php';


global $conn;
dd($conn);


// project description (to do list)
/*
 * user has many tasks
 * tasks belongs to one user
 * User relation:
 *      - id
 *      - username
 *      - email
 *      - password
 *      - img
 *      - task_id


 * Task relations
 *      - id
 *      - title
 *      - desc
 *      - img
 *      - status
 */