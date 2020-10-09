<?php

require_once('core/Model.php');
require_once('entities/User.php');

class UserManager extends Model
{
    private $pdoStmt;
    
    public function create(User &$user)
    {
        $pdo = $this->getPdo();
        $this->pdoStmt = $pdo->prepare('INSERT INTO users(firstname, lastname, email, password) VALUES(:firstname, :lastname, :email, :password)');
        
        $this->pdoStmt->bindValue(':firstname', $user->getFirstname(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
         
        return $this->pdoStmt->execute();
    }

    //Find all users
    public function findAll()
    {        
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->query('SELECT * FROM users');

        //Initilization if objects array
        $users = []; 
        
        while ($user = $this->pdoStmt->fetchObject('User')) {
           //Each object found is added to the array
           $users[] = $user; 
        }         
        return $users;
    }

    //count all users
    public function countAllUsers()
    {
        $pdo = $this->getPdo();
        
        $this->pdoStmt = $pdo->query('SELECT COUNT(*) as nbUsers FROM users');

        $result = $this->pdoStmt->fetch(PDO::FETCH_OBJ);
        if ($result == null) {
            return [];
        }

        return $result;
    }

    /* Find User by Id that return the object or null */
    public function findById($id)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        
        $this->pdoStmt->bindValue(':id', $id, PDO::PARAM_INT);

        $isExecuteOk = $this->pdoStmt->execute();

        if ($isExecuteOk) {
            $user = $this->pdoStmt->fetchObject('User');            
            return $user;
        } else {
            return false;
        }        
    }

    public function findByEmail($email)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        
        $this->pdoStmt->bindValue(':email', $email, PDO::PARAM_STR);

         $isExecuteOk = $this->pdoStmt->execute();

        if ($isExecuteOk) {
            $user = $this->pdoStmt->fetchObject('User');
            return $user;
        } else {
            return false;
        }        
    }

    public function findByToken($token)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM users WHERE token = :token');
        
        $this->pdoStmt->bindValue(':token', $token, PDO::PARAM_STR);

         $isExecuteOk = $this->pdoStmt->execute();
        
        if ($isExecuteOk) {
            $user = $this->pdoStmt->fetchObject('User');
            return $user;
        } else {
        return false;       
        }
    }

    public function login($email, $pass)
    {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        
        $this->pdoStmt->bindValue(':email', $email, PDO::PARAM_STR);

        $this->pdoStmt->execute();

        $user = $this->pdoStmt->fetchObject('User');
        if (!$user) {
            return false;
        } else {
            $hashed_password = $user->getPassword();
            if (password_verify($pass, $hashed_password)) {
                return $user;
            } else {
                return false;
            }
        }                
    }

    public function update(User $user)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, updatedAt = :updatedAt WHERE id = :id');
        $this->pdoStmt->bindValue(':firstname',$user->getFirstname(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':lastname',$user->getLastname(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':updatedAt',$user->getUpdatedAt(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':id',$user->getId(),PDO::PARAM_INT);

        return $this->pdoStmt->execute();
    }

    public function updatePassword(User $user)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('UPDATE users SET password = :password, updatedAt = :updatedAt WHERE email = :email');
        
        $this->pdoStmt->bindValue(':password',$user->getPassword(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':updatedAt',$user->getUpdatedAt(),PDO::PARAM_STR);

        return $this->pdoStmt->execute();
    }

    public function updateToken(User $user)
     {
        $pdo = $this->getPdo();

        $this->pdoStmt = $pdo->prepare('UPDATE users SET token = :token, updatedAt = :updatedAt WHERE email = :email');
        
        $this->pdoStmt->bindValue(':token',$user->getToken(),PDO::PARAM_STR);
        $this->pdoStmt->bindValue(':email',$user->getEmail(),PDO::PARAM_STR);        
        $this->pdoStmt->bindValue(':updatedAt',$user->getUpdatedAt(),PDO::PARAM_STR);

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