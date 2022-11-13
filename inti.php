<?php
//! https://partner.steamgames.com/doc/webapi/IGameServersService
// error_reporting(0);

define('INC', __DIR__ . '/inc/');
define('PAGE_TMPL_HTML', __DIR__ . '/Pages/Html/');
define('PAGE_TMPL_PHP', __DIR__ . '/Pages/php/');

require INC . 'vendor/autoload.php';
require INC . 'Class.Rquest.php';


if (isset($_SESSION['Token'])) {
    $Request = new Request($_SESSION['Token']);
    include_once PAGE_TMPL_HTML.'header.html'; 
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
    echo '<p class="text-center display-6 text-success"> New Token Is: ' . $Request->GenToken($_GET['memo'])->login_token . '</p>';
}

if (isset($_GET['del'])) {
    require PAGE_TMPL_PHP . 'del.php';
}