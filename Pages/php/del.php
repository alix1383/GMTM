<?php

if (!isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}

$Request->DeleteToken(SuperGlobals::_GET('steamid'));
print '<p class="text-center display-6 text-danger">The Token Was Deleted Successful!</p>';

$log->info(
    'Del Token',
    [   'api key' => $_SESSION['Token'],
        'Toekn Steam id' => SuperGlobals::_GET('steamid'),
        'IP' => SuperGlobals::_SERVER('REMOTE_ADDR'),
        'HTTP_USER_AGENT' => SuperGlobals::_SERVER('HTTP_USER_AGENT'),
        'SERVER_PROTOCOL' => SuperGlobals::_SERVER('SERVER_PROTOCOL'),
    ]
);
