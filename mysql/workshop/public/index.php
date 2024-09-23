<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/bootstrap.php';

global $data;
dd($data);


















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