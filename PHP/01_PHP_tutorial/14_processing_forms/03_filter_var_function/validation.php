<?php


if (filter_has_var(INPUT_POST, 'id' )) {
    // sanitize
    $clean_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // validate id
    if ($clean_id) {
        // validate id with options
        $id = filter_var($clean_id, FILTER_VALIDATE_INT, ['options' => [
            'min_range' => 10
        ]]);

        // show the id if it's valid
        echo $id === false ? 'id must be at least 10' : $id;
    }
    else {
        echo 'id is invalid.';
    }
} else {
    echo 'id is required';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="">ID</label>
    <input type="text" name="id">
    <input type="submit" value="add id">
</form>
</body>
</html>