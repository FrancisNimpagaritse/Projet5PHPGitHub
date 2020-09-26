<?php

abstract class Model
{ 
    private static $instance = null;

    public static function getPdo(): PDO
    { 
        if (self::$instance == null) {
            try
            {
                self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .';charset=utf8',  DB_USER , DB_PASSWORD,
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