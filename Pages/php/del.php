<?php

if (!isset($SESSION['Token']) && isset($GET['steamid'])) {
    echo 'something went wrong!';
    exit;
}

$Request->deleteToken($GET['steamid']);
echo '<p class="text-center display-6 text-danger">The Token Was Deleted Successful!</p>';

if (Logger == 1) {
    $log->info(
        'Del Token',
        [
            'api key'         => $SESSION['Token'],
            'Toekn Steam id'  => $GET['steamid'],
            'IP'              => $SERVER['REMOTE_ADDR'],
            'HTTP_USER_AGENT' => $SERVER['HTTP_USER_AGENT'],
            'SERVER_PROTOCOL' => $SERVER['SERVER_PROTOCOL'],
        ]
    );
}
