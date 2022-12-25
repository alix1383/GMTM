<?php
if (! isset($SESSION['Token']) && isset($GET['steamid'])) {
    echo'something went wrong!';
    exit;
}

echo '<p class="text-center display-6 text-success"> New Token Is: ' . $Request->resetLoginToken($GET['steamid']) . '</p>';

if (Logger == 1) {
    $log->info(
        'Regen Token',
        [
            'api key'         => $SESSION['Token'],
            'Toekn Steam id'  => $GET['steamid'],
            'new Token'       => $Request->resetLoginToken($GET['steamid']),
            'IP'              => $SERVER['REMOTE_ADDR'],
            'HTTP_USER_AGENT' => $SERVER['HTTP_USER_AGENT'],
            'SERVER_PROTOCOL' => $SERVER['SERVER_PROTOCOL'],
        ]
    );
}
