<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter your name"/>
    </div>

    <div>
        <label for="name">Email:</label>
        <input type="email" name="email" placeholder="Enter your email"/>
    </div>

    <div>
        <button type="submit">Subscribe</button>
    </div>
</form>

<?php
/*
The get.php file contains the form.
The $_SERVER['PHP_SELF'] returns the file name of the currently executing script.

For example, if the executing script is https://www.phptutorial.net/app/form/index.php,
the $_SERVER['PHP_SELF'] returns /app/form/index.php.php.

However, the $_SERVER['PHP_SELF'] cannot be trusted since and it’s vulnerable to XSS attacks.
Therefore, you should always escape it using the htmlspecialchars() function.

*/