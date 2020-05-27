<?php
if ((require 'prepend.php') === true):
    require __DIR__ . '/../vendor/autoload.php';
    $parsedown = new Parsedown();

    $readme = $parsedown->text(file_get_contents(__DIR__ . '/../README.md'));
    $output .= str_replace('currentToken', $_GET['token'] ?? '', $readme);
endif;
require 'view.php';