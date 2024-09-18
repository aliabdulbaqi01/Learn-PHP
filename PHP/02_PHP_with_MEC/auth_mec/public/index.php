<?php
require_once __DIR__ . '/../src/bootstrap.php';
auth();
if (is_post_request()) {
    logout();
}
view('header', ['title' => 'Home']);
?>
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-center">hi <?= $_SESSION['user']['email'] ?></h2>
                </div>
                <div class="card-body">
                    <h2 class="card-center">
                        we have been logged in
                    </h2>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <button type="submit" name="logout" class="btn btn-primary btn-block">logout</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php view('footer'); ?>
