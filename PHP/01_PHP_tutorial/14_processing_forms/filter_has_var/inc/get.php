<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP filter_has_var Demo</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="shaddow">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
