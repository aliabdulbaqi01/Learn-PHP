<?php
require __DIR__ . '/../src/bootstrap.php';

if (is_post_request()) {
    echo 'post';
}

flash(
    'home page',
    'just test our home page.',
    'success'
);

?>
<?php view('header', ['title' => 'Home']); ?>

<h1>welcome to our home page</h1>
<a href="register.php">register</a>

<?php
view('footer'); ?>
