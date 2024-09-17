<?php
include_once 'inc/auth.php';
if (isset($_POST["logout"])) {
    logout();
} else {
    header("Location: index.php");
    exit;
}
