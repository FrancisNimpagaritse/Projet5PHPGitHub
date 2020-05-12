<?php

//require_once('Entities/User.php');

class UserController extends Controller
{ 
    public function __construct()
    {
       $this->userManager = $this->loadModel("UserManager");
    }
    public function index()
    {        
        $users = $this->userManager->findAll();
         $this->loadAdminView('user',['users'=>$users]);
    }

    //Login function
    public function login()
    { 
        //Avoid data send by GET method
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Initialize data posted
            $email=trim($_POST['email']);
            $pass=trim($_POST['password']);

            //Initialize error message
            $data = [
                'email' => $email,
                'password' => $pass,
                'email_error' => '',
                'password_error' => ''
            ];
            
            //Validate email
            if(empty($email))
            {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }
            //Validate password
            if(empty($pass))
            {
                $data['password_error'] = 'Veuiller saisir un mot de passe';
            }
            
            //Check if that email exists in db valable en registration
            if($this->userManager->findByEmail($email))
            {
               //User found ok continue 
            }
            else
            {
                //User not found
                $data['email_error'] = 'Compte utilisateur non trouvé';               
            }
            //If all errors are empty
            if(empty($data['email_error']) && empty($data['password_error']))
            {             
                //Validate
                
                //Check and set logged in User
                
                //Cryptage/hashage du password avec grain de sel
                $pass = "toto".sha1($pass."123")."2020";
                
                $loggedInUser = $this->userManager->login($email,$pass);
                
                if($loggedInUser)
                {
                   
                    //Create session
                    $_SESSION['user_id'] = $loggedInUser->getId();
                    $_SESSION['user_email'] = $loggedInUser->getEmail();
                    $_SESSION['user_firstname'] = $loggedInUser->getFirstname();
                    $_SESSION['user_lastname'] = $loggedInUser->getLastname();
                    $_SESSION['user_profil'] = $loggedInUser->getProfil();
            
                    $_SESSION['message'] = "Vous êtes connecté";
             
                    header('Location: http://localhost:1234/finances_perso_frontal/user');
                }
                else
                {
                    $data['password_error'] = "Mot de passe invalid";
                    //Reload view with errors
                    $this->loadAdminView('login',$data);

                }                
            } 
            //$data['password_error'] = "Mot de passe invalid";
            //Reload view with errors
            //var_dump($data);
            //die();
            $this->loadAdminView('login', $data);
        }
        else
        {
            //Initialize data 
            $data =[    
                'email' => '',
                'password' => '',            
                'email_error' => '',
                'password_error' => ''                
            ];
            //Load view
            $this->loadAdminView('login',$data);
        }        
    } 
    
     //Méthode qui nous affiche le formulaire vide pour ajouter une nouvelle user
     public function new()
     {
        $mode = "Ajouter";
        $this->loadAdminView('editUser',['mode'=>$mode]);
     }

    public function findById($id)
    {
        $userManager = new UserManager();
        //on récupère l'objet correspondant à l'id specifié de la bdd dans la variable $categorie
        $user = $userManager->findById($id);

        require('views/updateUserView.php');
    } 
    //start the login form in case invalid or not supplied URL
    public function logout()
    {       
        unset($_SESSION['user_id']);
        unset($_SESSION['user_firstname']);
        unset($_SESSION['user_lastname']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_profil']);
        unset($_SESSION['message']);
        session_destroy();
        
        header('Location: http://localhost:1234/finances_perso_frontal/user/login');
    }

    //juste pour afficher le dashboard
    public function dashboard()
    {  
        require('views/dashboard.php');
    }   

    /* Méthode qui nous affiche le formulaire d'edition déjà rempli avec les valeurs
     de l'obet Categorie récupéré en bdd */


    public function register()
    { 
      
        //Avoid data send by GET method
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Initialize data posted
            $firstname=trim($_POST['firstname']);
            $lastname=trim($_POST['lastname']);
            $email=trim($_POST['email']);            
            $pass=trim($_POST['password']);
            $pass_confirm=trim($_POST['password_confirm']);

            //Initialize error message
            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $pass,                
                'password_confirm' => $pass_confirm,
                'firstname_error' => '',
                'lastname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'password_confirm_error' => ''
            ];
            
            //Validate firstname
            if(empty($firstname))
            {
                $data['email_error'] = 'Veuiller saisir votre prénom';
            }
            //Validate lastname
            if(empty($lastname))
            {
                $data['email_error'] = 'Veuiller saisir uvotre nom';
            }
            //Validate email
            if(empty($email))
            {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }
            //Validate password
            if(empty($pass))
            {
                $data['password_error'] = 'Veuiller saisir un mot de passe';
            }            
            //Check if that email exists in db valable en registration
            if($this->userManager->findByEmail($email))
            {
               //User found dupllicate error else continue
               $data['email_error'] = 'Email déja utilisé !'; 
            }
            
            //If all errors are empty
            if(empty($data['firstname_error']) && empty($data['lastname_error'])
            && empty($data['email_error']) && empty($data['password_error']) 
            && empty($data['password_confirm_error']))
            {             
                //Validate
     
               //Cryptage/hashage du password avec grain de sel
                $pass = "toto".sha1($pass."123")."2020";

                $user = new User();                       
                //Assign values to the new user to create
                $user->setFirstname($firstname)
                        ->setLastname($lastname)
                        ->setPassword($pass)
                        ->setEmail($email);
                        //->setConfirmation_token($confirmation_token)
                        //->setConfirmed_at($confirmed_at);
                
                //insertion en BDD via le manager en appelant sa méthode create() et en lui passant l'objet hydraté
                $isSaveOk = $this->userManager->create($user); 
               
            
                    header('Location: http://localhost:1234/finances_perso_frontal/user');
                    //$this->loadAdminView('user');
            }
            else
            {
                // $data['password_error'] = "Mot de passe invalid";
                //Reload view with errors
                $this->loadAdminView('user',$data);

            }
            
        }
        else
        {
            //Initialize data 
            $data = [    
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'password_confirm' => '',
                'firstname_error' => '',
                'lastname_error' => '',            
                'email_error' => '',
                'password_error' => '',
                'password_confirm_error' => ''                
            ];
            //Load view
            $this->loadAdminView('login',$data);
        }        
    } 

    public function update($id,$login,$password,$email,$confirmation_token,$confirmed_at)
    {        
        $userManager = new UserManager();
        $userAModifier = $userManager->findById($id);
        
        $userAModifier->setLogin($login)
            ->setPassword($password)
            ->setEmail($email)
            ->setConfirmation_token($confirmation_token)
            ->setConfirmed_at($confirmed_at);
            
         //require('views/editCategorieView.php');
        //insertion en BDD via le manager en appelant sa méthode create() et en lui passant l'objet hydraté
        $userManager = new UserManager();
        $isUpdateOk = $userManager->update($userAModifier);
        
        if($isUpdateOk)
        {
            header('Location: index.php?action=listUsers');
        }
        else
        {
            die('Impossible de modifier un utilisateur !');

        }
        
    }

    public function delete($id)
    {
        //on fait appel au manager
        $userManager = new UserManager();

        /*on récupère l'objet correspondant à l'id specifié de la bdd.
        On stocke cet objet dans la variable $categorie */
        $user = $userManager->findById($id);

        //On supprime alors cet objet en appelant la méthode du manager et en lui passant l'objet en question
        $isDeleteOk = $userManager->delete($user);

        if(!$isDeleteOk)
        {
            die('Impossible de supprimer l\'élémént!');

        }
        
        else
        {
            header('Location: index.php?action=listUsers');
        }

    }
}