<?php
include_once 'inc/auth.php';

auth();


include_once 'inc/header.php';
?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Welcome <?= $_SESSION['username'] ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="logout.php" method="post">
                            <p class="text-center">YOu have been logged in </p>
                            <button type="submit" name="logout" class="btn btn-block btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'inc/footer.php';
