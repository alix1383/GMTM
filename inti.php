<?php

//! https://partner.steamgames.com/doc/webapi/IGameServersService
// error_reporting(0);

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
// $_COOKIE = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_SPECIAL_CHARS);
$_SERVER = filter_input_array(INPUT_SERVER, FILTER_SANITIZE_SPECIAL_CHARS);

define('ROOT', __DIR__);
define('INC', ROOT . '/inc/');
define('PAGE_TMPL_HTML', ROOT . '/Pages/Html/');
define('PAGE_TMPL_PHP', ROOT . '/Pages/php/');

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require INC . 'vendor/autoload.php';
require INC . 'Class.Rquest.php';

// date("Y_m_d")


$log = new Logger('Steam Game Server Token Manager');
$log->pushHandler(new StreamHandler("./logs/".date("Y")."/".date("m")."/".date("d")."/" .date('H').".log", Level::Info));


if (isset($_SESSION['Token'])) {
    $Request = new Request($_SESSION['Token']);
    include_once PAGE_TMPL_HTML . 'header.html';
}

if (isset($_GET['list'])) {
    require PAGE_TMPL_PHP . 'list.php';
}

if (isset($_GET['regen'])) {
    require PAGE_TMPL_PHP . 'regen.php';
}

if (isset($_GET['gen'])) {
    include_once PAGE_TMPL_HTML . 'gen.html';
}

if (isset($_GET['memo'])) {
    echo '<p class="text-center display-6 text-success"> New Token Is: ' . htmlentities($Request->GenToken($_GET['memo'])->login_token, ENT_QUOTES, "UTF-8") . '</p>';

    $log->info(
        'New Token',
        [   'Api Key' => $_SESSION['Token'],
            'Toekn Steam id' => $_GET['steamid'],
            'Memo' => $_GET['memo'],
            'New Token' => $Request->GenToken($_GET['memo'])->login_token,
            'IP' => $_SERVER['REMOTE_ADDR'],
            'HTTP_USER_AGENT' => $_SERVER['HTTP_USER_AGENT'],
            'SERVER_PROTOCOL' => $_SERVER['SERVER_PROTOCOL'],
        ]
    );
}

if (isset($_GET['del'])) {
    require PAGE_TMPL_PHP . 'del.php';
}
