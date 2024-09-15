<?php
// sanitize the value
$agree = filter_input(INPUT_POST, 'agree', FILTER_UNSAFE_RAW);

// check against the valid value
if ($agree) {
    echo  'Thank you for joining us!';
} else {
    $errors['agree'] = 'To join us, you need to agree to the TOS.';
}
