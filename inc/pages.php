<?php
global $appidtoName, $dataToArray;

switch (getCurrentUri()) {
    case '/':
        if ($_SESSION['token'] != null) {
            header("Location: list");
            exit;
        } else {
            header("Location: login");
            exit;
        }
        break;

    case "/login":
        $smarty->display('login.tpl');
        break;

    case '/list';
        session_start();
        $token = $_SESSION['token'];
        $steamAPI = new steamAPI($token);
        $list = $steamAPI->getTokenList();
        $smarty->assign([
            'appidtoName' => $appidtoName,
            'List' => $list
        ]);
        $smarty->display('list.tpl');
        break;

    case '/verify';
        verify($_POST['apikey']);
        break;

    case '/logout';
        session_destroy();
        header('Location: login');
        exit;

    case '/action':
        $token = $_SESSION['token'];
        $steamAPI = new steamAPI($token);
        
        switch ($_GET['a']) {
            case 'remove':
                $steamId = $_GET['steamId'];
                $steamAPI->deleteToken($steamId);
                header("Location: list");
                exit;
            case 'renew':
                $steamId = $_GET['steamId'];
                $steamAPI->resetLoginToken($steamId);
                header("Location: list");
                exit;
            case 'create':
                $smarty->assign('dataToArray', $dataToArray);
                $smarty->display('create.tpl');
                break;
        }
        break;
    case '/create':
        $token = $_SESSION['token'];
        $steamAPI = new steamAPI($token);
        $appId = $_GET['appid'];
        $memo = $_GET['memo'];
        $steamAPI->generateToken($memo, $appId);
        header("Location: list");
        exit;
    default:
        $smarty->display('403.tpl');
}