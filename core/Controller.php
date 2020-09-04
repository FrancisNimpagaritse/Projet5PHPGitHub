<?php

abstract class Controller
{
    protected $id;

    public function __construct()
    {
        if (isset($_GET['uc'])) {
            $url = explode('/',filter_var($_GET['uc'], FILTER_SANITIZE_URL));
            $this->id = $url[2] ?? null;
        }
    }
    //Load model and get data from it
    public function loadModel(string $model)
    {
        require_once(APPROOT_REQUIRE.'models/'.$model.'.php');
        
        //Instantiate model class
        return new $model();
    }

    //Load view and pass data from controller to it
    public function render(string $view, array $data = [])
    {
        extract($data);
        if (file_exists(APPROOT_REQUIRE.'views/'.$view.'View.php')) {
            require_once(APPROOT_REQUIRE.'views/'.$view.'View.php');
        } else {
            header('Location: '. URL_PATH.'home/page404');
        }
    }
}