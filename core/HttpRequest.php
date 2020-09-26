<?php

class HttpRequest
{
    private $post;
    //private $get;

    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    public function method()
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    public function postKeyExists($key)
    {
        return isset($this->post[$key]);
    }

    public function getKeyExists($key)
    {
        return isset($_GET[$key]);
    }

    public function getGet($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function setSession($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public function getSession($name)
    {
        return $_SESSION[$name];
    }

    public function sessionExists($name)
    {
        if (isset($_SESSION[$name]))
            return true;
        else
            return false;
    }

    public function deleteSession($name)
    {
        if ($this->sessionExists($name))
        {
            unset($_SESSION[$name]);
        }
    }

    public function setCookieData($name, $sessionVal, $duration)
    {
        return setcookie($name, $sessionVal, time()+ $duration, '/', 'localhost', false, true);
    }

    public function cookieExists($name)
    {
        if (isset($_COOKIE[$name]))
            return true;
        else
            return false;
    }
}