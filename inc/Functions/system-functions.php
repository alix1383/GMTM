<?php

if (!defined("IN_GMTM")) {
    die("You should not be here :/ . Only follow links!");
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
function CreateLinkR($title, $url, $tooltip = "", $target = "_self", $wide = false, $onclick = "")
{
    $class = ($wide) ? "perm" : "tip";

    if (strlen($tooltip) == 0) {
        return "<a href='{$url}' onclick=\"{$onclick}\" target='{$target}'> {$title} </a>";
    }
    return "<a href='{$url}' class='{$class}' title='{$tooltip}' target='{$target}'> {$title} </a>";
}

/**
 * @param  string $text
 * @param  int    $len
 * @return string
 */
function trunc(string $text, int $len)
{
    return (strlen($text) > $len) ? substr($text, 0, $len) . '...' : $text;
}

/**
 * @param int $mask
 */
function CheckAdminAccess($mask)
{
    global $userbank;
    if (!$userbank->HasAccess($mask)) {
        header("Location: index.php?p=login&m=no_access");
        die();
    }
}

/**
 * @param  int  $sec
 * @param  bool $textual
 * @return false|string
 */
function SecondsToString($sec, $textual = true)
{
    $ret = '';
    $div = array(
        2592000 => 'mo',
        604800 => 'wk',
        86400 => 'd',
        3600 => 'hr',
        60 => 'min',
        1 => 'sec'
    );

    foreach ($div as $value => $desc) {
        if ($sec >= $value) {
            $quotient = (int) floor($sec / $value);
            $ret .= $quotient . ' ' . $desc . ', ';
            $sec %= $value;
        }
    }

    $ret = rtrim($ret, ', ');

    if (!$textual) {
        return gmdate('H:i:s', $sec);
    }

    return $ret;
}


// function say(string $var = null)
// {
//     echo htmlentities($var, ENT_QUOTES, "UTF-8");
// }

// function secure($val)
// {
//     return (is_array($val)) ? array_map('secure', $val) : htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
// }

function appIdtoName(int $id)
{
    $data = new Json(DATA . 'appids.json');
    $data->get();

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['APPiD'] == $id) {
            return $data[$i]['SERVER_NAME'];
            break;
        } else {
            return 'App id not found!!';
        }
    }
}
