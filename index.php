<?php

session_start();

//Load Config file
require_once 'config/config.php';

//Load the front controller
require_once(APPROOT_REQUIRE.'/controllers/Controller.php');

//Test if Url is supplied. If not redirect to home page
if (!isset($_GET['uc'])) {
    $url[0] = "home";
} else {
    //Secure url by removing all illegal URL characters from the string
    $url = explode('/',filter_var($_GET['uc'],FILTER_SANITIZE_URL));
    
}
//Check if the first par of Url correspond to an existing controller file
if (file_exists('controllers/'.ucfirst(strtolower($url[0])).'Controller.php')) {
    $controller = ucfirst(strtolower($url[0]).'Controller');
    
    $action = isset($url[1]) ? $url[1] : "index";
    
    //Require the controller
    require_once('controllers/'.$controller.'.php');   
    
        
        //Instantiate the controller class
    $controller = new $controller();                  
    
//Check if second Url parameter corresponds to an action/methd of the controller
    if (method_exists($controller,$action)) {
        $id = isset($url[2]) ? $url[2] : "";
        
        if ($id==null) {                
            $controller->$action(); 
        } else {
            $id=(int)$id;                
            $controller->$action($id);
        }            
    } else { 
        http_response_code(404);
        echo "<h1>Erreur 404</h1>";
        echo "La page recherchée n'existe pas"; 
    } 
}
else
{
    http_response_code(404);
    echo "<h1>Erreur 404</h1>";
    echo "La page recherchée n'existe pas"; 
} 