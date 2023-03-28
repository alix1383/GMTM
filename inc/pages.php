<?php
global $appidtoName;
switch ($router->getCurrentUri()) {
    case "/login":
        $smarty->display('login.tpl');
        break;

    case '/list';
        $smarty->assign('appidtoName', $appidtoName);
        $smarty->display('list.tpl');
        break;
    default:
        $smarty->display('403.tpl');
}
