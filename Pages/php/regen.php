<?php

if (!isset($SESSION['Token']) && isset($GET['steamid'])) {
    die('something went wrong!');
}

echo "New Token is: " . $Request->UpdateToken($GET['steamid']);
if (Logger == 1) {
    $log->info(
        'Regen Token',
        [
            'api key'         => $SESSION['Token'],
            'Toekn Steam id'  => $GET['steamid'],
            'new Token'       => $Request->UpdateToken($GET['steamid']),
            'IP'              => $SERVER['REMOTE_ADDR'],
            'HTTP_USER_AGENT' => $SERVER['HTTP_USER_AGENT'],
            'SERVER_PROTOCOL' => $SERVER['SERVER_PROTOCOL'],
        ]
    );
}
