<?php

//! https://partner.steamgames.com/doc/webapi/IGameServersService
// error_reporting(0);

use Josantonius\Session\Facades\Session;

define('ROOT', __DIR__);
define('INC', ROOT . '/inc/');
define('PAGE_TMPL_HTML', ROOT . '/Pages/Html/');
define('PAGE_TMPL_PHP', ROOT . '/Pages/php/');
define('DATA', ROOT . '/data/');

//! If U need logger set to 1
define('Logger', '0');


require INC . 'vendor/autoload.php';
require INC . 'Functions.php';
require INC . 'Class.Rquest.php';
require INC . 'Class.Input.php';
require INC . 'logger.php';


$Input = new Input();
$SESSION = new Session();

$POST = $Input->post();
$GET = $Input->get();
$SERVER = $Input->server();

$Tok = $SESSION->get('Token');
if (isset($Tok)) {
    $Request = new Request($Tok);
    include_once PAGE_TMPL_HTML . 'header.html';
} 

if (isset($GET['list'])) {
    require PAGE_TMPL_PHP . 'list.php';
}

if (isset($GET['regen'])) {
    require PAGE_TMPL_PHP . 'regen.php';
}

if (isset($GET['gen'])) {
    include_once PAGE_TMPL_PHP . 'gen.php';
}

if (isset($GET['memo'])) {
    echo '<p class="text-center display-6 text-success"> New Token Is: ' . htmlentities($Request->genToken($GET['memo'], $GET['appid'])->login_token . " Game : " .appIdtoName($GET['appid']), ENT_QUOTES, "UTF-8") . '</p>';
    if (Logger == 1) {
        $log->info(
            'New Token',
            ['Api Key'              => $Tok,
                'Toekn Steam id'    => $GET['steamid'],
                'Memo'              => $GET['memo'],
                'New Token & appId' => $Request->genToken($GET['memo'], $GET['appid'])->login_token,
                'IP'                => $SERVER['REMOTE_ADDR'],
                'HTTP_USER_AGENT'   => $SERVER['HTTP_USER_AGENT'],
                'SERVER_PROTOCOL'   => $SERVER['SERVER_PROTOCOL'],
            ]
        );
    }
}

if (isset($GET['del'])) {
    require PAGE_TMPL_PHP . 'del.php';
}