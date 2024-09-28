<?php
require_once "../src/bootstrap.php";

$errors = [];
$inputs = [];
$method = strtoupper($_SERVER['REQUEST_METHOD']);
if ($method === 'POST' && csrf_verify()) {
    $inputs = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => $_FILES['image'] ?? '',
        'user_id' => $_SESSION['auth']['id'],
    ];


    $errors = create_task($inputs);

    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $inputs;
} elseif ($method === 'GET') {
    csrf();
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if (isset($_SESSION['inputs'])) {
        $inputs = $_SESSION['inputs'];
        unset($_SESSION['inputs']);
    }
}

view('header', ['title' => 'Create Task']);
?>
    <div class="row justify_content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-center">Create Task</h2>
                </div>
                <div class="card-body">
                    <form action="<?= htmlspecialchars(current_url()) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_input() ?>
                        <div class="form-group">
                            <label for="title" class="form-label">title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                   value="<?= $inputs['title'] ?? '' ?>">
                            <p class="error text-danger"><?= @$errors['title'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"
                                      id="description"
                                      class="form-control"><?= $inputs['description'] ?? ' ' ?></textarea>
                            <p class="error text-danger"><?= @$errors['description'] ?></p>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                            <p class="error text-danger"><?= @$errors['image'] ?></p>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">add new task</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php
view('footer');