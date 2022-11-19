<?php 
class SuperGlobals
{
    public static function _SERVER($key)
    {
        return (isset($_SERVER[$key]) ? $_SERVER[$key] : null);
    }
}



?>