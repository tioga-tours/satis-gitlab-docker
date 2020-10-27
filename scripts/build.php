<?php
if ((require 'prepend.php') === true):
    $cmd = 'php -d memory_limit=1280M ' . getcwd() . '/' . $settings->bin . ' build'
        . ' ' . getcwd() . '/' . $settings->config_file
        . ' ' . getcwd() . '/' . $settings->output;

    foreach (($_GET['package'] ?? $_GET['packages'] ?? []) as $package) {
        $cmd .= ' ' . $package;
    }

    $title = 'Build | satis-gitlab';
    $output .= '<h1>Building</h1>';

    $output .= '<pre>Executing: ' . $cmd . PHP_EOL . '</pre>';
    $output .= '<hr>';

    if (($_GET['exec'] ?? '') === '1') {
		if (true === empty($_GET['package'] ?? $_GET['packages'] ?? [])) {
            echo 'Processing... you can speed it up by specifying packages<br/><pre>';
		}
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
