<?php

abstract class Controller
{
    protected $id;
    protected $httpRequest;
    protected $env;

    public function __construct()
    {
        $this->env = $_ENV ?? [];
        $this->httpRequest = (new HttpRequest())
            ->setPost($_POST ?? [])
            ->setServer($_SERVER ?? []);

        if ($this->httpRequest->getKeyExists('uc')) {
            $url = explode('/',filter_var($this->httpRequest->getGet('uc'), FILTER_SANITIZE_URL));
            $this->id = $url[2] ?? null;
        }
    }
    //Load model and get data from it
    public function loadModel(string $model)
    {
        require_once($this->env['APPROOT_REQUIRE'].'models/'.$model.'.php');
        
        //Instantiate model class
        return new $model();
    }

    //Load view and pass data from controller to it
    public function render(string $view, array $data = [])
    {
        extract($data);

        if (file_exists($this->env['APPROOT_REQUIRE'].'views/'.$view.'View.php')) {
            require_once($this->env['APPROOT_REQUIRE'].'views/'.$view.'View.php');
            return;
        } 
        
        header('Location: ' . $this->env['URL_PATH'] . 'home/page404');
    }
}