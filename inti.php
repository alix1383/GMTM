<?php

//! https://partner.steamgames.com/doc/webapi/IGameServersService
// error_reporting(0);

define('ROOT', __DIR__);
define('INC', ROOT . '/inc/');
define('PAGE_TMPL_HTML', ROOT . '/Pages/Html/');
define('PAGE_TMPL_PHP', ROOT . '/Pages/php/');
//! If U need logger set to 1
define('Logger', '0');


require INC . 'vendor/autoload.php';
require INC . 'Class.Rquest.php';
require INC . 'Class.Input.php';

$Input = new Input();
$POST = $Input->post();
$GET = $Input->get();
$SESSION = $Input->session();
$SERVER = $Input->server();

if (isset($SESSION['Token'])) {
    $Request = new Request($SESSION['Token']);
    include_once PAGE_TMPL_HTML . 'header.html';
}

if (isset($GET['list'])) {
    require PAGE_TMPL_PHP . 'list.php';
}

if (isset($GET['regen'])) {
    require PAGE_TMPL_PHP . 'regen.php';
}

if (isset($GET['gen'])) {
    include_once PAGE_TMPL_HTML . 'gen.html';
}

if (isset($GET['memo'])) {
    say('<p class="text-center display-6 text-success"> New Token Is: ' . htmlentities($Request->GenToken($GET['memo'])->login_token, ENT_QUOTES, "UTF-8") . '</p>');
    if (Logger == 1) {
        $log->info(
            'New Token',
            ['Api Key'            => $SESSION['Token'],
                'Toekn Steam id'  => $GET['steamid'],
                'Memo'            => $GET['memo'],
                'New Token'       => $Request->GenToken($GET['memo'])->login_token,
                'IP'              => $SERVER['REMOTE_ADDR'],
                'HTTP_USER_AGENT' => $SERVER['HTTP_USER_AGENT'],
                'SERVER_PROTOCOL' => $SERVER['SERVER_PROTOCOL'],
            ]
        );
    }
    

}

if (isset($GET['del'])) {
    require PAGE_TMPL_PHP . 'del.php';
}
