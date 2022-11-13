<?php

if (! isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}


echo "New Token is: " . $Request->UpdateToken($_GET['steamid']);