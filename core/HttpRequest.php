<?php

class HttpRequest
{
    private $post;

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

    public function postKeyData($key)
    {
        return $_POST[$key];
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
        return isset($_SESSION[$name]);
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
        return isset($_COOKIE[$name]);
    }

    public function getCookieData($name)
    {
        return $_COOKIE[$name];
    }
}