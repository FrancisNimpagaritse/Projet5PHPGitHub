<?php

session_start();

//Load Config file
require_once 'config/config.php';

//Load base controller
require_once(APPROOT_REQUIRE.'core/Controller.php');

//Test if Url is supplied. If not redirect to home page
if (!isset($_GET['uc'])) {
    $url[0] = "home";
} else {
    //Secure url by removing all illegal URL characters from the string
    $url = explode('/',filter_var($_GET['uc'],FILTER_SANITIZE_URL));
    
}
try {    
    //Check if the first par of Url corresponds to an existing controller file
    if (!file_exists('controllers/'.ucfirst(strtolower($url[0])).'Controller.php')) {
        throw new Exception('Page non trouvée ! ');
    }

    $controller = ucfirst(strtolower($url[0]).'Controller');
    //Require the controller
    require_once('controllers/'.$controller.'.php');
    
    //Instantiate the controller class
    $controller = new $controller();
    $action = $url[1] ?? "index";

    //Check if second Url parameter corresponds to an action/methd of the controller
    if (!method_exists($controller,$action)) {
        throw new Exception('Page non trouvée ! ');
    }
    
    $controller->$action();

} catch(Exception $e) {    
    header('Location: '. URL_PATH.'home/page404');
}