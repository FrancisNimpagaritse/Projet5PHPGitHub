<?php

abstract class Model
{ 
    private static $instance = null;

    public static function getPdo(): PDO
    { 
        if (self::$instance == null) {
            try
            {
                self::$instance = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] .';charset=utf8',  $_ENV['DB_USER'] , $_ENV['DB_PASSWORD'],
                [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            } 
            catch (Exception $e)
            {
                echo 'Erreur  de connection : ' . $e->getMessage();
            }        
        }
        return self::$instance;
    }
}