<?php
require __DIR__ .'/../src/bootstrap.php';

if (is_post_request()){
    echo 'post';
}

    flash(
        'user_register_success',
        'Your account has been created successfully. Please login here.',
        'success'
    );

?>
<?php view('header', ['title' => 'Register']);?>

<form action="register.php" method="post">

</form>

<?php
view('footer');?>
