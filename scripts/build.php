<?php
if ((require 'prepend.php') === true):
    $cmd = 'php -d memory_limit=1280M ' . getcwd() . '/' . $settings->bin . ' build'
        . ' ' . getcwd() . '/' . $settings->config_file
        . ' ' . getcwd() . '/' . $settings->output;

	$packages = ($_GET['package'] ?? $_GET['packages'] ?? []);
    foreach ($packages as $package) {
        $cmd .= ' ' . $package;
    }

    $title = 'Build | satis-gitlab';
    $output = ($output??'') . '<h1>Building</h1>';

    $output .= '<pre>Executing: ' . $cmd . PHP_EOL . '</pre>';
    $output .= '<hr>';

    if (($_GET['exec'] ?? '') === '1') {
        echo $output;
        echo 'Run this command with ?exec=show to view full output, this process runs async<br/>';
        if (count($packages) === 0) {
            echo 'Processing... you can speed it up by specifying packages<br/>';
        }
        ob_flush();
        flush();

        $execOutput = [];
        exec('echo ' . $cmd . ' | at now');
        echo '<br/><br/><strong>Process is running in the background, hopefully!</strong>';
        die();
    } elseif (($_GET['exec'] ?? '') === 'show') {
        echo $output;
        echo 'You can run this process async with ?exec=1<br/>';
        ob_flush();
        flush();

        $execOutput = [];
        passthru($cmd);
        echo '</pre>';
        echo '<br/><br/><strong>DONE!</strong>';
        die();
    } else {
        $execUrl = $_SERVER['REQUEST_URI'];
        $execUrl .= strstr($execUrl, '?') === false ? '?' : '&';
        $execUrl .= 'exec=1';
        $output .= '<iframe src="'.$execUrl.'" style="width:100%; height:300px; border:0;">Processing...</iframe>';
    }
endif;
require 'view.php';
