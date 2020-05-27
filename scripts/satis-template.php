<?php

$output = ($output ?? '') . '<h1>Edit satis-template.json</h1>';
if ((require 'prepend.php') === true):
    if (true === isset($_POST['config'])) {
        if (json_decode($_POST['config']) === null) {
            $output .= '<div class="alert alert-danger">Invalid json: '. json_last_error_msg() . '</div>';
        } else {
            $output .= '<div class="alert alert-success">Succesfully saved</div>';
            file_put_contents($satisTplUser, $_POST['config']);
        }
    }

    $editContent = htmlentities($_POST['config'] ?? file_get_contents($satisTplFile));
    $output .= <<<HTML
    <form method="post">
        <label for="config">satis-template.json</label>
        <textarea class="form-control" name="config" id="config" style="height:calc(80vh); min-height:300px; font-family: monospace">{$editContent}</textarea>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>
    <?php
    HTML;
endif;
require 'view.php';
