<?php

session_start();
if (! isset($SESSION['Token'])) {
    session_destroy();
    header("location: index.php");
    exit;
}
