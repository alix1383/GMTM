<?php
if (!isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}

$Request->DeleteToken($_GET['steamid']);
echo '<p class="text-center display-6 text-danger">The Token Was Deleted Successful!</p>';

$log->info('Del Token',
    [   'api key' => $_SESSION['Token'],
        'Toekn Steam id' => $_GET['steamid'],
        'IP' => $_SERVER['REMOTE_ADDR'],
        'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
        'SERVER_PROTOCOL' => $_SERVER['SERVER_PROTOCOL'],
    ]);