<?php

// image library
/*
 * this library will have all the function that deal with image
 */


/*
 * move to a position in the public from the temp file
 */
function move(array $image, string $filePath): void
{
    move_uploaded_file($image['tmp_name'], public_base("$filePath"));
}


/*
 * will add move to the specific path and return the image name to store in database
 */
function add_image(array $image, string $filePath): string
{
    global $conn;
    $imageFile = $image['name'];
    $imageName = time() . "_" . $imageFile;
    $imageDestination = $filePath . $imageName;
    move($image, $imageDestination);
    return $imageDestination;
}

/*
 * check image
 */
function check_image(array $image): bool
{
    if (isset($image['name']) && !empty($image['name'])) {
        return true;
    }
    return false;

}