<?php
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

$log = new Logger('Game Server Token Manager Steam');

$log->pushHandler(new StreamHandler("./logs/" . date("Y") . "/" . date("m") . "/" . date("d") . "/" . date('H') . ".log", Level::Info));
