<?php

class Token
{
    public static function generate()
    {
       return hash("sha512", microtime().rand(0,999999));
    }

    public static function validToken($token)
    {
        return ($_SESSION[$token] == $_POST[$token]);
    }
}