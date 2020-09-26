<?php

class AuthenticationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->userManager = $this->loadModel("UserManager");
    }

    public function login()
    {
        
        if ($this->httpRequest->method() == 'POST') {
            
            //Validate entries
            $validation = new Validator();

            
            $validation->Validate($this->httpRequest->getPost(), [
                'email' => [
                    'required' => true 
                ],
                'password' => [
                    'required' => true
                ]
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $email = $cleanData['email'];
            $pass = $cleanData['password'];
            
            $errors = $validation->getErrors();
            
            $loggedInUser = $this->userManager->login($email, $pass);
            if (!$loggedInUser) {
                $errors['password_incorrect_error'] = 'L\'email ou le mot de passe est invalide';
            }
            
            if (!$errors) {
            
                $this->httpRequest->setSession('user_id', $loggedInUser->getId());
                $this->httpRequest->setSession('user_email', $loggedInUser->getEmail());
                $this->httpRequest->setSession('user_firstname', $loggedInUser->getFirstname());
                $this->httpRequest->setSession('user_lastname', $loggedInUser->getLastname());
                $this->httpRequest->setSession('profile', $loggedInUser->getProfile());
                $this->httpRequest->setSession('token', Token::generate());
            
                //Session cookies
                if ($this->httpRequest->postKeyExists('remember')) {
                    $this->httpRequest->setCookieData('user_id', $this->httpRequest->getSession('user_id'), 3600);
                    $this->httpRequest->setCookieData('user_firstname', $this->httpRequest->getSession('user_firstname'), 3600);
                }

                if ($this->httpRequest->getSession('profile') == 'admin') {
                    header('Location: '. URL_PATH.'Homeadmin');
                    return;
                }                          
                
                header('Location: '. URL_PATH.'posts');
                                
            } else {
                
                //Initialize error message
                $data = [
                    'email' => $email,
                    'password' => $pass,
                    'email_error' => $errors['email'] ?? '',
                    'password_error' => $errors['password'] ?? '',
                    'password_incorrect_error' => $errors['password_incorrect_error'] ?? ''
                ]; 
                //Reload view with errors
                $this->render('admin/login',$data);
            }                
        } else {
            //Initialize data 
            $data =[    
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => ''
            ];

            $this->render('admin/login',$data);     
        }
    }
    
    public function logout()
    {
        setcookie('user_id','',time()-3600);
        $this->httpRequest->setCookieData('user_id', $this->httpRequest->getSession('user_id'), -3600);
        setcookie('user_firstname','',time()-3600);
        $this->httpRequest->setCookieData('user_firstname', $this->httpRequest->getSession('user_firstname'), -3600);
        $this->httpRequest->deleteSession('user_id');
        $this->httpRequest->deleteSession('user_firstname');
        $this->httpRequest->deleteSession('user_lastname');
        $this->httpRequest->deleteSession('user_email');
        
        session_destroy();
        
        header('Location: '. URL_PATH.'authentication/login'); 
    }

    public function forgotPassword()
    {
        //Initialize data for edit form
        $data = [
        ];
        //Load view
        $this->render('admin/forgotPassword',$data);
    }

    public function requestPassword()
    { 
        //Avoid data send by GET method
        if ($this->httpRequest->method() == 'POST') {
        
            //Validate entries 
            $validation = new Validator();

            $validation->Validate($this->httpRequest->getPost(),[
                'email' => [
                    'required' => true 
                ]
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $email = $cleanData['email'];

            $errors = $validation->getErrors();            
            
                //Verify if that email is known
            $user = $this->userManager->findByEmail($email);
            if (!$user && !empty($email)) {
                $errors['email_notfound'] = 'L\'email que vous avez fourni n\'est pas reconnu';
            }
            
            if(!$errors) { 
                //Generate a random token
                $token = uniqid();
                $url = 'http://monblog.franimpa.fr' . URL_PATH . "authentication/resetStart?token=".$token;
                
                //Email data
                $message = "Bonjour, voici le lien pour réinitialiser votre mot de passe. Cliquez-le: ". $url;
            
                $headers = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: ' . $email . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                if (mail($email, 'Mot de passe oublié', $message, $headers)) {
                    $user->setToken($token)
                        ->setUpdatedAt(date("Y-m-d H:i:s"));
                                    
                    //update token in db
                    $this->userManager->updateToken($user);
                    
                    header('Location: ' . URL_PATH . 'authentication/login');
                } else {
                    echo 'Une erreur est survenue!';
                }
            } else {
                //Initialize error message
                $data = [
                    'email' => $email,
                    'email_error' => $errors['email'] ?? '',
                    'email_unknown' => $errors['email_notfound'] ?? ''
                ];
                
                $this->render('admin/forgotPassword', $data);
            }
        }
    }

    public function resetStart()
    {       
        if ($this->httpRequest->getKeyExists('token')) {
            //Check if user with that token exists in db
            $userWithToken = $this->userManager->findByToken($_GET['token']);
            
            if ($userWithToken) {
            //Initialize data
            $data = [
                'token' =>  $this->httpRequest->getGet('token'),
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load reset password view
            $this->render('admin/resetPassword', $data);
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
        if ($this->httpRequest->method() == 'POST') {
            //Validate entries 
            $validation = new Validator();
                
            $validation->Validate($this->httpRequest->getPost(), [
                'email' => [
                    'required' => true,
                    'email' => true,
                    'min-length' => 5,
                    'max-length' => 250, 
                ],
                'password' => [
                    'required' => true,
                    'min-length' => 6,
                    'max-length' => 50, 
                ],
                'confirm_password' => [
                    'required' => true,
                    'min-length' => 6,
                    'max-length' => 50,
                    'matches' => 'password'
                ] 
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $email = $cleanData['email'];
            $password = $cleanData['password'];
            $confirm_password = $cleanData['confirm_password'];

            //Check if that email exists in db valable en registration
            $errors = $validation->getErrors();            
            
            $userToUpdate = $this->userManager->findByToken($_POST['token']); 
                
            if (!$userToUpdate) {
                //User not found
                $errors['token_error'] = 'Le lien fourni n\'a pa été reconnu!'; 
            } 
                //If errors is empty
            if (!$errors) {
                //Password hash
                $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                
                //Validate
                $userToUpdate->setPassword($pass_hash)
                                ->setToken($_POST['token'])
                                ->setUpdatedAt(date("Y-m-d H:i:s"));
                    
                //update paswword & token in db
                $this->userManager->updatePassword($userToUpdate);
                $this->userManager->updateToken($userToUpdate);
                
                header('Location: ' . URL_PATH . 'authentication/login');
            } else {
                //Initialize data
                $data = [
                    'email' => $email,
                    'password' => $password,
                    'confirm_password' => $confirm_password,
                    'token' => $_POST['token'],
                    'email_error' => $errors['email'] ?? '',
                    'password_error' => $errors['password'] ?? '',
                    'confirm_password_error' => $errors['confirm_password'] ?? '',
                    'token_error'   => $errors['token'] ?? ''
                ];
                //Reload view with errors
                $this->render('admin/resetPassword',$data);
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
            //Load view for intitial password reset
            $this->render('admin/resetPassword',$data);
        }
    }
}