<?php

class Token
{
    public static function generate()
    {
       //return Session::sessionData('token', hash("sha512", microtime().rand(0,999999)));
       return hash("sha512", microtime().rand(0,999999));
    }

    public static function check($token)
    {
        $tokenName=$_GET['token'];//check well the Config class and its get method;

        if ( HttpRequest::sessionExists($token) && $tokenName == HttpRequest::getSession($token)) {
            //HttpRequest::delete($tokenName);
            return true;
        } else {
            return false;
        }
        
    }
}