<?php

require_once('Model.php');
require_once('Entities/User.php');

class UserManager extends Model
{
    private $pdoStmt;
    
    public function create(User &$user)
    {
        $pdo = $this->getPdo();
        $this->pdoStmt = $pdo->prepare("INSERT INTO users VALUES(null, :firstname, :lastname, :password, :email,:new_pwd)");

        $this->pdoStmt->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':laststname', $user->getLastname(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':new_pwd', $user->getNewPwd(), PDO::PARAM_INT);
        
        //Query Execution 
        $isExecuteOk = $this->pdoStmt->execute();

        if($isExecuteOk==false)
        {
            return false;
        }
        else
        {
            //Get the last inserted Id
            $id = $pdo->LastInsertId();

            //Find the last inserted user by his Id
            $user = $this->findById($id);

            return true;
        }

    }

    public function findAll()
    {        
        $pdo = $this->getPdo();

        //Query
        $this->pdoStmt = $pdo->query("SELECT * FROM users");

        //Initilization if objects array
        $users=[]; // If no object found then it should return empty array
        
        while($user = $this->pdoStmt->fetchObject('User'))
        {
            $users[] = $user; //Each object is added to the array of users
        }
         //retur the array of users at the end
         return $users;
    }

    /* Find User by Id that return the object or null */
    public function findById($id)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
        
        //Param value bind
        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

         $isExecuteOk = $this->pdoStmt->execute();

         if($isExecuteOk)
         {
            $user = $this->pdoStmt->fetchObject('User');

            if($user==false)
            {
                return null;
            }
            else
            {
                return $user;
            }
         }
         else{
             return false; //In case of execution error
         }        
    }

    public function findByEmail($email)
    {
        $pdo = $this->getPdo();

        //Requête préparée pour sécuriser les données passées en paramètres
        $this->pdoStmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        
        //liaison des paramètres en indiquant aussi le type de la valeur à passer
        $this->pdoStmt->bindValue(':email', $email, PDO::PARAM_STR);

        //exécuter la requête
         $isExecuteOk = $this->pdoStmt->execute();

         if($isExecuteOk)
         {
            $user = $this->pdoStmt->fetchObject('User');

            //On fait un test sur le retour/résultat ($user) de l'exécution de la requête
            if($user==false)
            {
                //retourne null si pas de resultat
                return null;
            }
            else
            {
                //retourne l'object trouvé
                return $user;
            }
         }
         else{
             return false; //Erreur d'exécution
         }        
    }

    /* -----Fonction de login------- */
    public function login($email,$pass)
    {
        $pdo = $this->getPdo();

        //Requête préparée pour sécuriser les données passées en paramètres
        $this->pdoStmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :pass");
        
        //liaison des paramètres en indiquant aussi le type de la valeur à passer
        $this->pdoStmt->bindValue(':email', $email, PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':pass', $pass, PDO::PARAM_STR);

        //exécuter la requête
        $isExecuteOk = $this->pdoStmt->execute();
        
         if($isExecuteOk)
         {
            $user = $this->pdoStmt->fetchObject('User');

            if($user==false)
            {
                return null;
            }
            else
            {
                return $user;
            }
         }
         else{
             return false;
         } 
                
    }

     public function update(User $user)
     {
         $pdo = $this->getPdo();

         $this->pdoStmt = $pdo->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, password = :password, email = :email WHERE id = :id LIMIT 1");
         $this->pdoStmt->bindValue(':firstname',$user->getFirstname(),PDO::PARAM_STR);
         $this->pdoStmt->bindValue(':lastname',$user->getLastname(),PDO::PARAM_STR);
         $this->pdoStmt->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
         $this->pdoStmt->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
         $this->pdoStmt->bindValue(':new_pwd',$user->getNewPwd(),PDO::PARAM_INT);
         $this->pdoStmt->bindValue(':id',$user->getId(),PDO::PARAM_INT);

         return $this->pdoStmt->execute();

     }

    public function delete(User $user)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare("DELETE FROM users WHERE id=:id LIMIT 1");

        $this->pdoStmt->bindValue(':id',$user->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

}