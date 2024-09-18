<?php

//The following example defines a function that allows you to rename multiple files.
// The rename_files() function renames the files that match a pattern.
function rename_files(string $pattern, string $search, string $replace): array
{
    //  get the paths that match a pattern by using the glob() function
    //  The glob() function returns an array of files (or directories) that match a pattern.
    $paths = glob($pattern);

    $results = [];

    foreach ($paths as $path) {
        // check if the pathname is a file
        if (!is_file($path)) {
            $results[$path] = false;
            continue;
        }
        // get the dir and filename
        $dirname = dirname($path);
        $filename = basename($path);

        // replace $search by $replace in the filename
        $new_path = $dirname . '/' . str_replace($search, $replace, $filename);

        // check if the new file exists
        if (file_exists($new_path)) {
            $results[$path] = false;
            continue;
        }

        // rename the file
        $results[$path] = rename($path, $new_path);
    }
    return $results;
}