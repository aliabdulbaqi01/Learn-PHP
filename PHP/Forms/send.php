<?php
if (isset($_POST['username'])) {
    $data['username'] = $_POST['username'];
    $data['password']= $_POST['password'];

    $recievedData = file_get_contents("data.json");
    $recievedData = json_decode($recievedData, true);
    $fullData = array_merge($recievedData, $data);
    echo "<pre>";
print_r($recievedData);
    echo "</pre>";
    echo "<pre>";
print_r($data);
    echo "</pre>";
    echo "<pre>";
print_r($fullData);
    echo "</pre>";

die();
    file_put_contents("data.json", $recievedData);
}




$data = file_get_contents("data.json");
$data = json_decode($data, true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Register</h1>
    <form action="send.php" method="post">
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" required class="form-control">
        </div>
        <button type="submit">submit </button>

    </form>


    <div class="container m-5">
        <?php
        if (isset($data) ) {
            foreach ($data as $value) {
                echo "Username: " . $value['username'] . "<br>";
                echo "Password: " . $value['password'] . "<br>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>