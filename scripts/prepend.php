<?php
set_time_limit(0);
chdir(dirname(__DIR__));

$tokenFile = getcwd() . '/data/.token';
if (true === file_exists($tokenFile) && file_get_contents($tokenFile) !== ($_GET['token'] ?? '')) {
    $title = 'Access denied';
    $output = '<div class="alert alert-danger">Access denied</div>';
    return false;
}

function get_file(string $file, string $dist): string {
    if (true === file_exists($file)) {
        return $file;
    }
    return $dist;
}

$title = $title ?? 'satis-gitlab';
$output = $output ?? '';

$configDist = getcwd() . '/conf.dist/config.json';
$configUser = getcwd() . '/data/config.json';
$satisTplDist = getcwd() . '/conf.dist/satis-template.json';
$satisTplUser = getcwd() . '/data/satis-template.json';
$configFile = get_file($configUser, $configDist);
$satisTplFile = get_file($satisTplUser, $satisTplDist);
$settings = json_decode(file_get_contents($configFile));
return true;