<?php 
class SuperGlobals
{
    public static function _SERVER($key)
    {
        return (isset($_SERVER[$key]) ? $_SERVER[$key] : null);
    }

    public static function _SESSION($key)
    {
        return (isset($_SESSION[$key]) ? $_SESSION[$key] : null);
    }

    public static function _POST($key)
    {
        return (isset($_POST[$key]) ? $_POST[$key] : null);
    }

    public static function _GET($key)
    {
        return (isset($_GET[$key]) ? $_GET[$key] : null);
    }
}



?>