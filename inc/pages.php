<?php
global $appidtoName;



// $router->get('/login', function (){

// });

switch ($router->getCurrentUri()) {
    case "/login":
        $smarty->display('login.tpl');
        $router->run();
        break;

    case '/list';
        $steamAPI = new steamAPI($session->get('token'));
        $smarty->assign([
            'appidtoName' => $appidtoName,
            'steamAPI' => $steamAPI
        ]);
        $smarty->assign('appidtoName', $appidtoName);
        $smarty->display('list.tpl');
        $router->run();
        break;

    case '/verify';
        $router->post('/verify', verify($_POST['apikey']));
        $router->run();
        break;

    case '/logout';
        $session->destroy();
        header('Location: login');
        exit;
        break;

    default:
        $smarty->display('403.tpl');
}
