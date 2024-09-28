<?php
require_once __DIR__ . '/../database/migration.php';
require_once __DIR__ . '/../src/bootstrap.php';
is_auth();

view('header', ['title' => 'Todo app']);
?>

<?php
view('footer');


