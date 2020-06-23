<?php

class UserController extends Controller
{ 
    public function __construct()
    {
       $this->userManager = $this->loadModel("UserManager");
    }

    public function index()
    {        
        $users = $this->userManager->findAll();
        $data = [
                'users' => $users
                ];
        $this->loadView('admin/user',$data);
    }

    //Standard User register
    public function register()
    {
            //Avoid data send by GET method
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                 //Pocess form
                 
                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                //Initialize data posted
                $firstname=trim($_POST['firstname']);
                $lastname=trim($_POST['lastname']);
                $email=trim($_POST['email']);            
                $pass=trim($_POST['password']);
                $pass_confirm=trim($_POST['confirm_password']);
    
                //Initialize data
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $pass,                
                    'confirm_password' => $pass_confirm,
                    'firstname_error' => '',
                    'lastname_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];
                
                //Validate firstname
                if (empty($data['firstname'])) {
                    $data['firstname_error'] = 'Veuiller saisir votre prénom';                    
                }
                //Validate lastname
                if (empty($data['lastname'])) {
                    $data['lastname_error'] = 'Veuiller saisir votre nom';
                }
                //Validate email
                if (empty($data['email']) || !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))) {
                    $data['email_error'] = 'Veuiller saisir un email valide';
                }
                //Validate password
                if (empty($data['password'])) {
                    $data['password_error'] = 'Veuiller saisir un mot de passe';
                } else {
                    if (strlen($data['password']) < 6) {
                        $data['password_error'] = 'Le mot de passe doit avoir au moins 6 caractères';
                    }
                }
    
                //Validate confirmed password
                if (empty($data['confirm_password']))
                {
                    $data['confirm_password_error'] = 'Veuiller confirmer le mot de passe';
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_error'] = 'Les 2 mots de passe ne sont pas identiques';
                    }
                }
                //Check if that email exists in db valable en registration
                if ($this->userManager->findByEmail($email)) {
                   //User found duplicate error else continue
                   $data['email_error'] = 'Email déja utilisé !'; 
                }
                
                //If all errors are empty
                if (empty($data['firstname_error']) && empty($data['lastname_error'])
                && empty($data['email_error']) && empty($data['password_error']) 
                && empty($data['confirm_password_error'])) {             
                    //Validate
                    
                    //Password hash
                    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                    
                    $user = new User();                       
                    //Assign values to the new user to create
                    $user->setFirstname($firstname)
                            ->setLastname($lastname)
                            ->setEmail($email)
                            ->setPassword($pass_hash);
                                            
                    //insert into db using manager's create method
                    $result = $this->userManager->create($user);
                    header('Location: '. URL_PATH.'user/login');
                } else {
                    //Reload view with errors
                    $this->loadView('admin/register',$data);
                }            
            } else {
            //Initialize data 
                $data =[    
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '', 
                'firstname_error' => '',
                'lastname_error' => '',           
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''                
            ];
            //Load view
            $this->loadView('admin/register',$data);
        }
    }   
    
    public function findById($id)
    {
        $userManager = new UserManager();
        $user = $userManager->findById($id);

        require('views/updateUserView.php');
    }

    public function add()
    {
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Initialize data posted
            $firstname=trim($_POST['firstname']);
            $lastname=trim($_POST['lastname']);
            $email=trim($_POST['email']);            
            $pass=trim($_POST['password']);
            $pass_confirm=trim($_POST['confirm_password']);

            //Initialize data
            $data = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $pass,                
                'confirm_password' => $pass_confirm,
                'firstname_error' => '',
                'lastname_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];
            
            //Validate firstname
            if (empty($data['firstname'])) {
                $data['firstname_error'] = 'Veuiller saisir votre prénom';
            }
            //Validate lastname
            if (empty($data['lastname'])) {
                $data['lastname_error'] = 'Veuiller saisir votre nom';
            }
            //Validate email
            if (empty($data['email']) || !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))) {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }
            
            //Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Veuiller saisir un mot de passe';
            } else {
                if (strlen($data['password']) < 6) {
                    $data['password_error'] = 'Le mot de passe doit avoir au moins 6 caractères';
                }
            }

            //Validate password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Veuiller confirmer le mot de passe';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Les 2 mots de passe ne sont pas identiques';
                }
            }            
            //Check if that email exists in db
            if ($this->userManager->findByEmail($email)) {
               //User found duplicate error else continue
               $data['email_error'] = 'Email déja utilisé !'; 
            }
            
            //If all errors are empty
            if (empty($data['firstname_error']) && empty($data['lastname_error'])
            && empty($data['email_error']) && empty($data['password_error']) 
            && empty($data['confirm_password_error'])) {             
                //Validate
                
                //Password hash
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

                $user = new User();                       
                //Assign values to the new user to create
                $user->setFirstname($firstname)
                        ->setLastname($lastname)
                        ->setEmail($email)
                        ->setPassword($pass_hash);
                                        
                //insert into db using manager's create method
                $this->userManager->create($user);                
            
                header('Location: '. URL_PATH.'user/index');
            } else {
                //Reload view with errors
                $this->loadView('admin/addUser',$data);
            }            
        } else {
            //Initialize data for blank form
            $data = [  
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'firstname_error' => '',
                'lastname_error' => '',            
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''                
            ];
            //Load view
            $this->loadView('admin/addUser',$data);
        }        
    }    
    
    public function edit($id)
    {
        if (isset($_GET['token']) && ($_GET['token'] != $_SESSION['user']['token']) || empty($_GET['token'])) {
            exit("Token périmé!");
        }

        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Initialize data posted
            $firstname=trim($_POST['firstname']);
            $lastname=trim($_POST['lastname']);
            $email=trim($_POST['email']); 

            //Initialize data
            $data = [
                    'id' => $id,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'firstname_error' => '',
                    'lastname_error' => '',
                    'email_error' => ''
                ];
            
            //Validate firstname
            if (empty($data['firstname'])) {
                $data['firstname_error'] = 'Veuiller saisir votre prénom';
            }
            //Validate lastname
            if (empty($data['lastname'])) {
                $data['lastname_error'] = 'Veuiller saisir votre nom';
            }
            //Validate email
            if (empty($data['email']) || !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))) {
                $data['email_error'] = 'Veuiller saisir un email valide';
            }            
            
            /*Check if that email exists in db valable en registration
            Kugisubiramwo kuko sino on est obligé de créer un email yindi!!!!
            if($this->userManager->findByEmail($email))
            {
               //User found duplicate error else continue
               $data['email_error'] = 'Email déja utilisé !'; 
            }
            */
            
            //If all errors are empty
            if (empty($data['firstname_error']) && empty($data['lastname_error'])
            && empty($data['email_error'])) {             
                //Validate
                
                //Get user to update from Manager
                $userToUpdate = $this->userManager->findById($id);                      
                //Assign values to the new user to create
                $userToUpdate->setFirstname($data['firstname'])
                            ->setLastname($data['lastname'])
                            ->setEmail($data['email'])
                            ->setUpdatedAt(date("Y-m-d H:i:s"));
                                 
                //insert into db using manager's create method
                $this->userManager->update($userToUpdate);                
            
                header('Location: '. URL_PATH.'user/index');
            } else {
                //Reload view with errors
                $this->loadView('admin/editUser',$data);
            }            
        } else {
            //Get existing user from Manager
            $user = $this->userManager->findById($id);

            //Check for ownership
            if ($user->getId() != $_SESSION['user_id']){
                //TO BE USED FOR posts
                header('Location: '. URL_PATH.'user/index');
            }
            //Initialize data for edit form
            $data = [
                'id' => $id, 
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getlastname(),
                'email' => $user->getEmail(),
                'firstname_error' => '',
                'lastname_error' => '', 
                'email_error' => '' 
            ];
            //Load view
            $this->loadView('admin/editUser',$data);
        }
    }

    public function delete($id)
    {
        if (isset($_GET['token']) && ($_GET['token'] != $_SESSION['user']['token']) || empty($_GET['token'])) {
            exit("Token périmé!");
        }

        $userManager = new UserManager();

        $user = $userManager->findById($id);

        $isDeleteOk = $userManager->delete($user);

        if (!$isDeleteOk) {
            die('Impossible de supprimer l\'élémént!');
        } else {
            header('Location: '. URL_PATH.'user/index');
        }
    }
}