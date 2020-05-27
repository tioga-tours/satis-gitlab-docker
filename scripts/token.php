<?php
if ((require 'prepend.php') === true):
    $newToken = $_GET['new_token'] ?? '';

    if (true === empty($newToken)) {
        @unlink($tokenFile);
        $output .= '<div class="alert alert-info">Token removed</div>';
    } else {
        file_put_contents($tokenFile, $newToken);
        $output .= '<div class="alert alert-info">Token changed</div>';
    }
endif;
require 'view.php';