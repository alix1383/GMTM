<?php
if (isset($_GET['steamid']) && $_GET['steamid'] != null ) {
    delToken($_GET['steamid']);
    echo "the token was deleted successful!";
} else {
    echo "something went wrong!";
    exit;
}
?>