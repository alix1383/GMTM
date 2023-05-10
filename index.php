<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once 'init.php';
require_once INCLUDES_PATH . 'pages.php';

// foreach ($list as $key => $value) {

    // $steamAPI->deleteToken($value['steamid']);

    // if ($value['is_expired'] == true) {
        // $steamAPI->deleteToken($value['steamid']);
    // }


    // if ($value['is_expired'] == true) {
    //     $steamAPI->resetLoginToken($value['steamid']);
    // }
// }