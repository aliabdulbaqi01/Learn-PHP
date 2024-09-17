<?php
include_once 'inc/auth.php';

guest();
if (filter_has_var(INPUT_POST, 'username')) {
    $user = [
        'username' => htmlspecialchars(trim($_POST['username'])),
        'password' => htmlspecialchars(trim($_POST['password']))
    ];

    if (login($user)) {
        header('Location: index.php');
        exit();
    }
}


include_once 'inc/header.php';
?>


    <div class="container mt-5">
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


<?php

include_once 'inc/footer.php';
