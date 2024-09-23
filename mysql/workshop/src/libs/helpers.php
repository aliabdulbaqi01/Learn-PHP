<?php

/*
 * var_dump with good design then stop execution (help with debugging)
 */
function dd($data): void
{
    echo '<div class="container mt-3" style=" padding: 5px;background-color: rgba(6,14,61,0.53); color: #b7b7b7;">';
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    echo '</div>';
    die();
}

/*
 * return var_dump with good design
 */
function dump($data): void
{
    echo '<div class="container mt-3" style=" padding: 5px;background-color: rgba(6,14,61,0.53); color: #b7b7b7;">';
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    echo '</div>';
    die();
}