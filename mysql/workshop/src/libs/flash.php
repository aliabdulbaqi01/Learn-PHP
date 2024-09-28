<?php

// flash messages type

const FLASH = 'FLASH_MESSAGES';
const FLASH_SUCCESS = 'success';
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';


/*
 * format messages
 */
function format_flash_message(array $message)
{
    return sprintf('<div class="alert alert-%s">%s</div>', $message['type'], $message['message']);
}


/*
 * create a flash message
 */
function create_flash_message(string $name, string $message, string $type = 'success')
{
    // remove existing one if it isset
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }
    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}

/*
 * display a flash message
 */
function display_flash_message(string $message)
{
    if (!isset($_SESSION[FLASH][$message])) {
        return;
    }
    // get message from teh session
    $flash_message = $_SESSION[FLASH][$message];

    // delete the flash message
    unset($_SESSION[FLASH][$message]);

    // display the flash message
    echo format_flash_message($flash_message);
}


/*
 * display all flash messages
 */
function display_all_flash_messages()
{
    $flash_messages = $_SESSION[FLASH];

    unset($_SESSION[FLASH]);

    foreach ($flash_messages as $message) {
        echo format_flash_message($message);
    }
}

/*
 * Short cut of flash message functionality
 */
function flash(string $name = '', string $message = '', string $type = '')
{
    if ($name !== '' && $message !== '' && $type !== '') {
        create_flash_message($name, $message, $type);

    } elseif ($name !== '' && $message === '' && $type === '') {
        display_flash_message($name);

    } elseif ($name === '' && $message === '' && $type === '') {
    }
}