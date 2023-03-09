<?php

if (!defined("IN_SB")) {
    die("You should not be here. Only follow links!");
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
function CreateLinkR($title, $url, $tooltip="", $target="_self", $wide=false, $onclick="")
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
    return (strlen($text) > $len) ? substr($text, 0, $len).'...' : $text;
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
function SecondsToString($sec, $textual=true)
{
    if ($textual) {
        $div = array( 2592000, 604800, 86400, 3600, 60, 1 );
        $desc = array('mo','wk','d','hr','min','sec');
        $ret = null;
        foreach ($div as $index => $value) {
            $quotent = floor($sec / $value); //greatest whole integer
            if ($quotent > 0) {
                $ret .= "$quotent {$desc[$index]}, ";
                $sec %= $value;
            }
        }
        return substr($ret, 0, -2);
    } else {
        $hours = floor($sec / 3600);
        $sec -= $hours * 3600;
        $mins = floor($sec / 60);
        $secs = $sec % 60;
        return "$hours:$mins:$secs";
    }
}


function say(string $var = null)
{
    echo htmlentities($var, ENT_QUOTES, "UTF-8");
}

function secure($val)
{
    return (is_array($val)) ? array_map('secure', $val) : htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

function appIdtoName(int $id)
{
    $json = file_get_contents(DATA . 'appids.json');
    $data = json_decode($json, true);
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['APPiD'] == $id) {
            return $data[$i]['SERVER_NAME'];
            break;
        } else {
            return 'App id not found!!';
        }
    }
}
