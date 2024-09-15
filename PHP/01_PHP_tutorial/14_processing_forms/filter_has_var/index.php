<?php


$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    require 'inc/get.php';
}
else if ($request_method === 'POST') {
    require 'inc/post.php';
}

