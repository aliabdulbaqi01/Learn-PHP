<?php
require_once __DIR__ . '/../src/bootstrap.php';
global $conn;
is_auth();
$user = auth();
$id = $user['id'];
$tasks = get_all_tasks($id);
view('header', ['title' => 'Todo app']);
?>

    <h1>Todo Tasks</h1>
    <p><a href="create_task.php" class="btn btn-info">add new task</a></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">body</th>
            <th scope="col">image</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task) : ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['title'] ?></td>
                <td><?= $task['description'] ?></td>
                <td><img src="<?= $task['image'] ?>" alt="<?= $task['title'] ?>" width="80px"></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php
view('footer');


