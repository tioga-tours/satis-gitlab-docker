<?php

$file = preg_replace('#^.*?([a-z0-9\-]+).*$#i', '$1', $_SERVER['REQUEST_URI']) . '.php';

if (empty($file) === true && false === file_exists(__DIR__ . '/../public/index.html')) {
    $file = 'readme.php';
}

if (true === is_file(__DIR__ . '/' . $file)) {
    require __DIR__ . '/' . $file;
} else {
    return false;
}