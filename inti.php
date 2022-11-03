<?php
//! https://partner.steamgames.com/doc/webapi/IGameServersService
error_reporting(0);
define('INC', __DIR__ . '/inc/');
include INC . 'functions.php';

if (isset($_GET['list'])) {
    include INC . 'list.php';
}

if (isset($_GET['regen'])) {
    include INC . 'regen.php';
}

if (isset($_GET['gen'])) {
    include_once __DIR__ . '/page/gen.html';
}

if (isset($_GET['memo'])) {
    echo '<p class="text-center display-6 text-success">New Token Is: ' . GenToken($_GET['memo']) . '</p>';
}

if (isset($_GET['del'])) {
    include INC . 'del.php';
}
