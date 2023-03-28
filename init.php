<?php
define('IN_GMTM', true);
$Template = 'Spark';

//! Filter all user inputs
$_GET = filter_input_array(
    INPUT_GET,
    FILTER_SANITIZE_SPECIAL_CHARS
);
$_POST = filter_input_array(
    INPUT_POST,
    FILTER_SANITIZE_SPECIAL_CHARS
);
$_COOKIE = filter_input_array(
    INPUT_COOKIE,
    FILTER_SANITIZE_SPECIAL_CHARS
);
$_SERVER = filter_input_array(
    INPUT_SERVER,
    FILTER_SANITIZE_SPECIAL_CHARS
);


//! ---------------------------------------------------
//!  Directories
//! ---------------------------------------------------
define('ROOT', dirname(__FILE__) . "/");

define('INCLUDES_PATH', ROOT . "inc/");
define('FUNCTIONS_PATH', INCLUDES_PATH . "Functions/");
define('CLASS_PATH', INCLUDES_PATH . "Class/");



// ---------------------------------------------------
//  Are we installed?
// ---------------------------------------------------

# Composer autoload
if (!file_exists(INCLUDES_PATH . '/vendor/autoload.php')) {
    die('Compose autoload not found! Run `composer install` in the root directory of your GMTM installation.');
}

use Josantonius\Json\Json;

require_once INCLUDES_PATH . '/vendor/autoload.php';
include_once FUNCTIONS_PATH . 'system-functions.php';
$router = new \Bramus\Router\Router();

// ---------------------------------------------------
//  smarty setup
// ---------------------------------------------------

$smarty = new Smarty();
$smarty->setTemplateDir(ROOT . "template/$Template/");
$smarty->setConfigDir(ROOT . "template/$Template/config");
$smarty->setCompileDir(ROOT . 'smarty/compile/');
$smarty->setCacheDir(ROOT . 'smarty/cache/');

// ---------------------------------------------------
//  Initial setup
// ---------------------------------------------------

$version_json = new Json('version.json');
$version = $version_json->get();

define('GMTM_VERSION', $version['GMTM_VERSION'] ?? 'N/A');
define('GMTM_BRANCH', $version['GMTM_BRANCH'] ?? 'N/A');
