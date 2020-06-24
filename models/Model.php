<?php

abstract class Model
{ 

    protected function getPdo()
    { 
        try
        {
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .';charset=utf8',  DB_USER , DB_PASSWORD,
            [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
            
            return $pdo; 
        } 
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }        
    }
}