<?php

use Josantonius\Json\Json;

function getCurrentUri()
{
    $getBasePath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    // Get the current Request URI and remove rewrite base path from it (= allows one to run the router in a sub folder)
    $uri = substr(rawurldecode($_SERVER['REQUEST_URI']), strlen($getBasePath));
    // Don't take query params into account on the URL
    if (strstr($uri, '?')) {
        $uri = substr($uri, 0, strpos($uri, '?'));
    }
    // Remove trailing slash + enforce a slash at the start
    return '/' . trim($uri, '/');
}

/**
 * Creates an anchor tag, and adds tooltip code if needed
 *
 * @param  string $title   The title of the tooltip/text to link
 * @param  string $url     The link
 * @param  string $tooltip The tooltip message
 * @param  string $target  The new links target
 * @param  bool   $wide
 * @param  string $onclick
 * @return string URL
 */
// function createLinkR(string $title, string $url, string $tooltip = "", string $target = "_self", bool $wide = false, string $onclick = ""): string
// {
//     $class = $wide ? "perm" : "tip";
//     $titleAttr = $tooltip ? "title='$tooltip'" : "";

//     return "<a href='$url' class='$class' $titleAttr target='$target' onclick='$onclick'>$title</a>";
// }


/**
 * @param  string $text
 * @param  int    $len
 * @return string
 */
// function trunc(string $text, int $len)
// {
//     return (strlen($text) > $len) ? substr($text, 0, $len) . '...' : $text;
// }

/**
 * @param  int  $sec
 * @param  bool $textual
 * @return false|string
 */
// function SecondsToString($sec, $textual = true)
// {
//     $ret = '';
//     $div = array(
//         2592000 => 'mo',
//         604800 => 'wk',
//         86400 => 'd',
//         3600 => 'hr',
//         60 => 'min',
//         1 => 'sec'
//     );

//     foreach ($div as $value => $desc) {
//         if ($sec >= $value) {
//             $quotient = (int) floor($sec / $value);
//             $ret .= $quotient . ' ' . $desc . ', ';
//             $sec %= $value;
//         }
//     }

//     $ret = rtrim($ret, ', ');

//     if (!$textual) {
//         return gmdate('H:i:s', $sec);
//     }

//     return $ret;
// }

function secure($val)
{
    return (is_array($val)) ? array_map('secure', $val) : htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

function appIdtoName(int $id)
{
    $json = new Json(ROOT . 'data/appids.json');
    $data = $json->get();

    foreach ($data as $app) {
        if ($app['APPiD'] == $id) {
            return $app['SERVER_NAME'];
        }
    }

    return 'App id not found!!';
}

function dataToArray()
{
    $json = new Json(ROOT . 'data/appids.json');
    return $json->get();
}

function verify($key)
{
    $token = $key;
    if (isset($token)) {
        if (strlen($token) != 32) {
            header('Location: login?error=0');
            exit;
        } else {
            $steamAPI = new steamAPI($token);
            if (!$steamAPI->verifyApiKey() === true) {
                header('Location: login?error=0');
                exit;
            } else {
                $_SESSION['token'] = $token;
                header('Location: list');
            }
        }
    }
}
