<?php

use Dotenv\Dotenv;

class Config
{
    public function __construct()
    {
       $dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
        $dotenv->load();
        
        //App Route
        $_ENV['APPROOT_REQUIRE'] = substr($_SERVER['SCRIPT_FILENAME'], 0 , -9);

        //URL Route: remember to remove / at the end of it if to include it in href
        //This is the path to the index.php file which is the main entry point to the application*/
        $_ENV['URL_PATH'] = substr($_SERVER['PHP_SELF'], 0 , -9);

        //Website Name
        define('WEBSITENAME', 'Mon Blog');
    }
}