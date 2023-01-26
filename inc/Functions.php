<?php
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
