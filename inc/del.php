<?php
if (! isset($_POST['Token'])) {
    die('something went wrong!');
}

if (! isset($_GET['steamid'])) {
    die('something went wrong!');
}

delToken($_GET['steamid']);
echo "the token was deleted successful!";