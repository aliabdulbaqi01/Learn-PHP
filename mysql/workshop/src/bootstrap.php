<?php
session_start();


require_once __DIR__ . '/libs/helpers.php';
require_once __DIR__ . '/libs/csrf.php';
require_once __DIR__ . '/libs/flash.php';
require_once __DIR__ . '/libs/auth.php';
require_once __DIR__ . '/libs/view.php';
require_once __DIR__ . '/libs/middleware.php';
require_once __DIR__ . '/libs/filter.php';


// migration
require_once __DIR__ . '/../database/migration.php';