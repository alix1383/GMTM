<?php
function appIdtoName(int $id)
{
    $json = file_get_contents(DATA . 'linux_compact.json');
    $data = json_decode($json, true);
    var_dump($data);

}
