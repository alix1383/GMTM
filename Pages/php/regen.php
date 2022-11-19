<?php

if (!isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}

print "New Token is: " . htmlentities($Request->UpdateToken(SuperGlobals::_GET('steamid')), ENT_QUOTES, "UTF-8") ;

$log->info(
    'Regen Token',
    [   'api key' => $_SESSION['Token'],
        'Toekn Steam id' => SuperGlobals::_GET('steamid'),
        'new Token' => $Request->UpdateToken(SuperGlobals::_GET('steamid')),
        'IP' => SuperGlobals::_SERVER('REMOTE_ADDR'),
        'HTTP_USER_AGENT' => SuperGlobals::_SERVER('HTTP_USER_AGENT'),
        'SERVER_PROTOCOL' => SuperGlobals::_SERVER('SERVER_PROTOCOL'),
    ]
);
