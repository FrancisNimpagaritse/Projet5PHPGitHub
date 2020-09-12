<?php

class UserController extends Controller
{ 
    public function __construct()
    {
        parent::__construct();
        $this->userManager = $this->loadModel("UserManager");
    }

    public function index()
    {        
        $users = $this->userManager->findAll();
        $data = [
                'users' => $users
            ];
        $this->render('admin/user', $data);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate entries 
            $validation = new Validator($_POST);
            
            //Clean validate data
            $firstname = $validation->validate('firstname',$_POST['firstname'], 'text');
            $lastname = $validation->validate('lastname', $_POST['lastname'], 'text'); 
            $email = $validation->validate('email', $_POST['email'], 'email');
            $password = $validation->validate('password', $_POST['password'], 'password');
            $confirm_password = $validation->validate('confirm_password', $_POST['confirm_password'], 'password');
            $validation->verifyConfirmation($password, $confirm_password);

            //Check if that email exists in db valable en registration
            $errors = $validation->getErrors();
            if ($this->userManager->findByEmail($email)) {
                //User found duplicate error else continue
                $errors['email_duplic'] = 'Email déja utilisé !';
            }
            //If errors is empty
            if (!$errors) {
                //Password hash
                $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                
                $user = new User();
                //Assign values to the new user to create
                $user->setFirstname($firstname)
                        ->setLastname($lastname)
                        ->setEmail($email)
                        ->setPassword($pass_hash);
                                        
                //insert into db using manager's create method
                $this->userManager->create($user);
                header('Location: '. URL_PATH.'user/login');
            } else {                    
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'firstname_error' => $errors['firstname'] ?? '',
                    'lastname_error' => $errors['lastname'] ?? '',
                    'email_error' => $errors['email'] ?? '',
                    'email_duplic' => $errors['email_duplic'] ?? '',
                    'password_error' => $errors['password'] ?? '',
                    'confirm_password_error' => $errors['confirm_password'] ?? ''
                ];

                $this->render('admin/register',$data);
            }
        } else {
        //Initialize data for blank form load
                $data =[    
                'firstname' => '',
                'lastname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '', 
                'firstname_error' => '',
                'lastname_error' => '',
                'email_error' => '',
                'email_duplic' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];
            //Load view
            $this->render('admin/register',$data);
        }
    }   
    
    public function findById()
    {
        $userManager = new UserManager();
        $user = $userManager->findById($this->id);

        require('views/updateUserView.php');
    }
    
    public function edit()
    {
        if (isset($_GET['token']) && ($_GET['token'] != $_SESSION['user']['token']) || empty($_GET['token'])) {
            exit("Token périmé!");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate entries 
            $validation = new Validator($_POST);
            
            //Clean validate data
            $firstname = $validation->validate('firstname',$_POST['firstname'], 'text');               
            $lastname = $validation->validate('lastname', $_POST['lastname'], 'text'); 
            $email = $validation->validate('email', $_POST['email'], 'email');
            $password = $validation->validate('password', $_POST['password'], 'password');
            $confirm_password = $validation->validate('confirm_password', $_POST['confirm_password'], 'password');
            $validation->verifyConfirmation($password, $confirm_password);

            //Check if that email exists in db valable en registration
            $errors = $validation->getErrors();
            if ($this->userManager->findByEmail($email)) {
                //User found duplicate error else continue
                $errors['email_duplic'] = 'Email déja utilisé !';
            }

            if (!$errors) { 
                
                //Get user to update from Manager
                $userToUpdate = $this->userManager->findById($this->id); 
                //Assign values to the new user to create
                $userToUpdate->setFirstname($firstname)
                            ->setLastname($lastname)
                            ->setEmail($email)
                            ->setUpdatedAt(date("Y-m-d H:i:s"));
                                 
                //insert into db using manager's create method
                $this->userManager->update($userToUpdate);     
            
                header('Location: '. URL_PATH.'user/index');
            } else {
                //Initialize data
                $data = [
                'id' => $this->id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'firstname_error' => $errors['firstname'] ?? '',
                'lastname_error' => $errors['lastname'] ?? '',
                'email_error' => $errors['email'] ?? '',
                'email_duplic' => $errors['email_duplic'] ?? '',
                'password_error' => $errors['password'] ?? '',
                'confirm_password_error' => $errors['confirm_password'] ?? ''
                
                ];            
                //Reload view with errors
                $this->render('admin/editUser',$data);
            }
        } else {
            //Get existing user from Manager
            $user = $this->userManager->findById($this->id);

            //Check for ownership
            if ($user->getId() != $_SESSION['user_id']){
                //TO BE USED FOR posts
                header('Location: '. URL_PATH.'user/index');
            }
            //Initialize data for edit form
            $data = [
                'id' => $this->id, 
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getlastname(),
                'email' => $user->getEmail(),
                'firstname_error' => '',
                'lastname_error' => '',
                'email_error' => '',                
                'password_error' => '',
                'confirm_password_error' => '' 
            ];
            //Load view
            $this->render('admin/editUser',$data);
        }
    }

    public function delete()
    {
        if (isset($_GET['token']) && ($_GET['token'] != $_SESSION['user']['token']) || empty($_GET['token'])) {
            exit("Token périmé!");
        }

        $userManager = new UserManager();

        $user = $userManager->findById($this->id);

        $isDeleteOk = $userManager->delete($user);

        if (!$isDeleteOk) {
            die('Impossible de supprimer l\'élémént!');
        } else {
            header('Location: '. URL_PATH.'user/index');
        }
    }
}