<?php
include_once 'init.php';

// $response = secure($Request->getTokenList());
// $smarty->display('index.tpl');
include_once INCLUDES_PATH . 'pages.php';




$router->get('/123', function () {
    echo 'AA';

});

$router->run();
