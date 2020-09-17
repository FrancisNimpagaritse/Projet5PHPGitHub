<?php

class HttpRequest
{
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function postData()
    {
        return $_POST;
    }

    public static function postKeyExists($key)
    {
        return isset($_POST[$key]);
    }

    public static function setSession($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function getSession($name)
    {
        return $_SESSION[$name];
    }

    public static function sessionExists($name)
    {
        if (isset($_SESSION[$name]))
            return true;
        else
            return false;   
    }

    public static function delete($name)
    {
        if (self::sessionExists($name))
        {
            unset($_SESSION[$name]);
        }
    }

    public static function cookieData($name, $sessionVal)
    {
        return setcookie($name, $sessionVal, time()+3600,'/','localhost',false,true);
    }

    public static function cookieExists()
    {

    }
}