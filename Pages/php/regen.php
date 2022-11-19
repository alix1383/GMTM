<?php

if (!isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}

echo "New Token is: " . htmlentities($Request->UpdateToken($_GET['steamid']), ENT_QUOTES, "UTF-8") ;

$log->info(
    'Regen Token',
    [   'api key' => $_SESSION['Token'],
        'Toekn Steam id' => $_GET['steamid'],
        'new Token' => $Request->UpdateToken($_GET['steamid']),
        'IP' => $_SERVER['REMOTE_ADDR'],
        'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
        'SERVER_PROTOCOL' => $_SERVER['SERVER_PROTOCOL'],
    ]
);
