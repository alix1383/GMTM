<?php
if(! isset($_SESSION)) 
{ 
    session_start(); 
} 

include_once 'init.php';
require_once INCLUDES_PATH . 'pages.php';
