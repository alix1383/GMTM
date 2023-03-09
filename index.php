<?php

include_once 'init.php';
include_once(INCLUDES_PATH . "/system-functions.php");
include_once('config.php');
include_once(INCLUDES_PATH . "/sb-callback.php");
$xajax->processRequests();
session_start();
include_once(INCLUDES_PATH . "/page-builder.php");

$route = route(Config::get('config.defaultpage'));
build($route[0], $route[1]);
