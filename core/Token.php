<?php

class Token
{
    private $request;
    public function __construct(HttpRequest $request)
    {
        $this->request = $request;
    }
    public static function generate()
    {
       //return Session::sessionData('token', hash("sha512", microtime().rand(0,999999)));
       return hash("sha512", microtime().rand(0,999999));
    }

    public function check($token)
    {
        $tokenName=$this->request->getGet('token');

        if ( $this->request->sessionExists($token) && $tokenName == $this->request->getSession($token)) {
            $this->request->delete($tokenName);
            return true;
        } else {
            return false;
        }
        
    }
}