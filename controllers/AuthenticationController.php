<?php

class AuthenticationController extends Controller
{
    public function __construct()
    {
       $this->userManager = $this->loadModel("UserManager");
    }

    public function login()
    {
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            //Initialize data posted
            $email=trim(htmlspecialchars($_POST['email']));
            $pass=trim($_POST['password']);
            
            //Initialize error message
            $data = [
                'email' => $email,
                'password' => $pass,
                'email_error' => '',
                'password_error' => ''
            ];
            
            //Validate email
            if (empty($email)) {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }
            //Validate password
            if (empty($pass)) {
                $data['password_error'] = 'Veuiller saisir un mot de passe';
            }
             
            //Check if that email exists in db valable en registration
            if ($this->userManager->findByEmail($email)) {
                //User found ok continue 
            } else {
                //User not found
                $data['email_error'] = 'Email non trouvé!'; 
            }
            //If all errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {
                //Validate 

                $loggedInUser = $this->userManager->login($email, $pass);
            }

            //Check and set logged in User
            $loggedInUser = $this->userManager->login($email, $pass);               

            if ($loggedInUser) {  
                    
                //Create session
                $_SESSION['user_id']        = $loggedInUser->getId();
                $_SESSION['user_email']     = $loggedInUser->getEmail();
                $_SESSION['user_firstname'] = $loggedInUser->getFirstname();
                $_SESSION['user_lastname']  = $loggedInUser->getLastname();
                $_SESSION['profile']         = $loggedInUser->getProfile();
                $_SESSION['user']['token']   = hash("sha512", microtime().rand(0,999999));
                
                //Session cookies
                if (isset($_POST['remember'])) {
                    setcookie('user_id', $_SESSION['user_id'], time()+3600,'/','localhost',false,true);
                    setcookie('user_firstname', $_SESSION['user_firstname'], time()+3600,'/','localhost',false,true);

                    if ($_SESSION['profile'] == 'admin') {
                        header('Location: '. URL_PATH.'Homeadmin');
                    } else {                            
                        header('Location: '. URL_PATH.'posts');
                    }
                } else {
                    if ($_SESSION['profile'] == 'admin') {
                        header('Location: '. URL_PATH.'Homeadmin');
                    } else {                            
                        header('Location: '. URL_PATH.'posts');
                    }
                }
            } else {
                    $data['password_error'] = "Mot de passe invalid";
                    //Reload view with errors
                    $this->loadView('admin/login',$data);
            }
                
        } else {
            //Initialize data 
            $data =[    
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];
            $this->loadView('admin/login',$data);     
        }
    }
    
    public function logout()
    {
        setcookie('user_id','',time()-3600);
        setcookie('user_firstname','',time()-3600);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_firstname']);
        unset($_SESSION['user_lastname']);
        unset($_SESSION['user_email']);
        unset($_SESSION['message']);
        session_destroy();
        
        header('Location: '. URL_PATH.'authentication/login'); 
    }

    public function forgotPassword()
    {
        //Initialize data for edit form
        $data = [
        ];
        //Load view
        $this->loadView('admin/forgotPassword',$data);
    }

    public function requestPassword()
    { 
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              //Pocess form
        
             //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             
            if (isset($_POST['email'])) {
                //Initialize data posted
                $email=trim(htmlspecialchars($_POST['email']));
                              
                //Verify if that email is known
                $user = $this->userManager->findByEmail($email);
                
                if ($user) { 
                    //Generate a random token
                    $token = uniqid();
                    $url = URL_PATH."authentication/resetStart?token=".$token;
                    
                    //Email data
                    $message = "Bonjour, voici le lien pour réinitialiser votre mot de passe. Cliquez-le: ". $url;
                    //$headers = 'Content-Type: text/plain; charset="utf-8"'." ";
                    $headers = [
                        'Content-Type' => 'text/plain',
                        'charset' => 'utf-8',
                        'From' => 'franimpa@yahoo.fr'
                    ];                    
                    if (mail($email, 'Mot de passe oublié', $message, $headers)) {
                        $user->setToken($token)
                            ->setUpdatedAt(date("Y-m-d H:i:s"));
                                     
                        //update token in db
                        $this->userManager->updateToken($user);
                        
                        header('Location: ' . URL_PATH . 'authentication/login');
                    } else {
                        echo 'Une erreur est survenue!';
                    }
                }
            }
        }
    }

    public function resetStart()
    {        
        if (isset($_GET['token']) && !empty($_GET['token'])) {
            //Check if user with that token exists in db
            $userWithToken = $this->userManager->findByToken($_GET['token']);
            
            if ($userWithToken) {
            //Initialize data
            $data = [
                'token' =>  $_GET['token'],
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load reset password view
            $this->loadView('admin/resetPassword', $data);
            } else {
            //Link not found
            echo '<p><h4 style="color:red;">Le lien fourni n\'a pa été reconnu!
            Merci de fournir un lien valide tel qu\'envoyé à votre adresse email.</h4></p>'; 
            }
        }
    }
    public function resetPassword()
    {        
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Initialize data posted
            $email=trim(htmlspecialchars($_POST['email'])); 
            $password=trim(htmlspecialchars($_POST['password']));
            $confirm_password=trim(htmlspecialchars($_POST['confirm_password']));
            

            //Initialize data
            $data = [
                    'email' => $email,
                    'password' => $password,
                    'confirm_password' => $confirm_password,
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];
                
            //Validate email
            if (empty($data['email']) || !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))) {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }
            //Validate confirm_password
            if (empty($data['password'])) {
                $data['password_error'] = 'Veuiller saisir mot de passe';
            }   
            //Validate password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Veuiller confirmer le mot de passe';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Les 2 mots de passe ne sont pas identiques';
                }
            }
                
            //If all errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])
            && empty($data['confirm_password_error'])) {
                
                //Check if user with that token exists in db
                $userToUpdate = $this->userManager->findByToken($data['token']); 
                
                if (!$userToUpdate) {
                    //User not found
                    $data['token_error'] = 'Le lien fourni n\'a pa été reconnu!'; 
                } else {
                    //Validate
                    $userToUpdate->setPassword($data['password'])
                                    ->setToken($data[''])
                                    ->setUpdatedAt(date("Y-m-d H:i:s"));;
                        
                    //update paswword in db using
                    $this->userManager->updatePassword($userToUpdate);  
                
                    header('Location: '. URL_PATH.'authentication/login');
                }
            } else {
                //Reload view with errors
                $this->loadView('admin/resetPassword',$data);
            }           
        } else {
            //Initialize data
            $data = [
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];
            //Load view with errors
            $this->loadView('admin/resetPassword',$data);
        }
    }
}