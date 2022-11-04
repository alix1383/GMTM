<?php
if (! isset($_POST['Token'])) {
    die('something went wrong!');
}

if (! isset($_GET['steamid'])) {
    die('something went wrong!');
}

echo "New Token is: " . UpdateToken($_GET['steamid']);