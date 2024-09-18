<?php
require_once __DIR__ . '/../src/bootstrap.php';
guest();
if (is_post_request()) {
    $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'password_confirmation' => $_POST['password_confirmation']
    ];
    $errors = register($data);
}
view('header', ['title' => 'Home']);
?>
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-center">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?= isset($data['email']) ? $data['email'] : '' ?>">
                            <p class="error"><?= @$errors['email'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <p class="error"><?= @$errors['password'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control">
                            <p class="error"><?= @$errors['password_confirmation'] ?></p>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="text-center">Already have an account? <a href="login.php">Log in</a></p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php view('footer'); ?>
