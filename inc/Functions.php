<?php
// load the JSON file and store it in a global variable
$appIds = json_decode(file_get_contents(DATA . 'appids.json'), true);

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
    global $appIds;
    foreach ($appIds as $app) {
        if ($app['APPiD'] == $id) {
            return $app['SERVER_NAME'];
        }
    }
    return 'App id not found!!';
}
