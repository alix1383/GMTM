<?php
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

$log = new Logger('GMTM - GaMe server Token Manager');
$log->pushHandler(new StreamHandler("./logs/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . date('H') . ".log", Level::Info));