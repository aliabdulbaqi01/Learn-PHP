<?php

function get_all_tasks($user_id)
{
    global $conn;
    $select_all_tasks = "SELECT * FROM tasks WHERE user_id = $user_id";
    return mysqli_fetch_all(mysqli_query($conn, $select_all_tasks), MYSQLI_ASSOC);

}


function create_task($inputs)
{
    global $conn;

    $fields = [
        'title' => 'string | min:1 | max:255',
        'description' => 'string | min:5',
        'user_id' => 'int',
    ];
    $image = $inputs['image'];
    [$inputs, $errors] = filter($inputs, $fields);


    if (!$errors) {
        $user_id = $inputs['user_id'];
        $title = $inputs['title'];
        $description = $inputs['description'];
        if (check_image($image)) {
       
            $image = add_image($image, 'uploads/');
        }
        $create_task = "INSERT INTO tasks (user_id, title, description, image) VALUES ('$user_id', '$title', '$description', '$image')";
        mysqli_query($conn, $create_task);
        redirect_with_message('index', 'task added successfully');
    }

    return $errors;
}