<?php
if (! isset($_SESSION['Token']) && isset($_GET['steamid'])) {
    die('something went wrong!');
}

$Request->DeleteToken($_GET['steamid']);
echo '<p class="text-center display-6 text-danger">The Token Was Deleted Successful!</p>';