<?php

function UpdateToken(int $steamid)
{
    $post = [
        'key' => $_SESSION["Token"],
        'steamid' => $steamid,
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.steampowered.com/IGameServersService/ResetLoginToken/v1/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = json_decode(curl_exec($ch))->response->login_token;
    return $response;
}

function ListToken()
{
    $key = $_SESSION["Token"];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.steampowered.com/IGameServersService/GetAccountList/v1/?key=$key",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = json_decode(curl_exec($curl))->response->servers;
    curl_close($curl);
    return $response;
}

function delToken(int $steamid)
{
    $post = [
        'key' => $_SESSION["Token"],
        'steamid' => $steamid,
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.steampowered.com/IGameServersService/DeleteAccount/v1/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = json_decode(curl_exec($ch));

}

function GenToken(string $memo)
{
    $post = [
        'key' => $_SESSION["Token"],
        'appid' => 730,
        'memo' => $memo,
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.steampowered.com/IGameServersService/CreateAccount/v1/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $response = json_decode(curl_exec($ch))->response->login_token;
    return $response;
}

function Is_ValidaApiKey($key)
{
    $key = $key;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.steampowered.com/IGameServersService/GetAccountList/v1/?key=$key",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = json_decode(curl_exec($curl))->response;
    curl_close($curl);
    $retVal = ($response != null) ? true : false ;
    return $retVal;
}