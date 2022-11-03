<?php
if (isset($_GET['steamid']) && isset($_GET['steamid'])) {
    echo "New Token is: " . UpdateToken($_GET['steamid']);
} else {
    die('something went wrong!');
    exit;
}
