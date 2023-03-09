<?php

define('IN_SB', true);


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

define('DATA_PATH', ROOT . "data/");
// define('ROOT', dirname(__FILE__) . "/");

// ---------------------------------------------------
//  Are we installed?
// ---------------------------------------------------

#Composer autoload
if (!file_exists(INCLUDES_PATH . '/vendor/autoload.php')) {
    die('Compose autoload not found! Run `composer install` in the root directory of your SourceBans++ installation.');
}
require_once(INCLUDES_PATH . '/vendor/autoload.php');

// ---------------------------------------------------
//  Initial setup
// ---------------------------------------------------
require_once(CLASS_PATH . 'Crypto.php');

// require_once(INCLUDES_PATH.'/auth/Auth.php');
// require_once(INCLUDES_PATH.'/auth/Host.php');

// require_once(INCLUDES_PATH.'/CUserManager.php');
// require_once(INCLUDES_PATH.'/AdminTabs.php');

$version = @json_decode(file_get_contents(DATA_PATH . 'version.json'), true);
define('GMTM_VERSION', $version['version'] ?? 'N/A');
define('GMTM_BRANCH', $version['branch'] ?? 'N/A');
define('GMTM_DEV', $version['dev'] ?? false);
