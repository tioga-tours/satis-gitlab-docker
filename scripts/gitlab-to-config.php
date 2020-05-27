<?php

if ((require 'prepend.php') === true):
    $cmd = 'php -d memory_limit=1280M ' . getcwd() . '/' . $settings->bin . ' gitlab-to-config'
        . ' --output ' . getcwd() . '/' . $settings->config_file
        . ' --template ' . $satisTplFile
        . ' ' . $settings->gitlab_url
        . ' ' . $settings->gitlab_token;

    $output .= '<h1>Creating config</h1><pre>';
    ob_flush();flush();
    $output .= 'Executing: ' . $cmd . PHP_EOL;
    $output .= '<hr>';

    $execOutput = [];
    exec($cmd, $execOutput);

    $output .= implode(PHP_EOL, $execOutput);
    $output .= '</pre>';
endif;

require 'view.php';