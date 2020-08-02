<?php

class HomeController extends Controller
{    
    public function __construct()
    {

    }
    public function index()
    {
         //Initialize data for blank form
         $data = [
            'name' => '',
            'email' => '',
            'subject' => '',
            'message' => '',
            'result' => '',
            'name_error' => '',
            'email_error' => '',
            'subject_error' => '',
            'message_error' => ''
         ];   
        $this->loadView('home',$data);
    }

    //Send a message for contact
    public function send()
    {
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Pocess form
            
           //Sanitize POST data
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           //Initialize data posted
           if (isset($_POST['name'])) {
               $name = htmlspecialchars($_POST['name']);
           }
           if (isset($_POST['email'])) {
               $email = htmlspecialchars($_POST['email']);
           }
           if (isset($_POST['subject'])) {
               $subject = htmlspecialchars($_POST['subject']);
           }
           if (isset($_POST['message'])) {
               $message = htmlspecialchars($_POST['message']);
           }
           //$result = "";
           //Initialize data
           $data = [
                   'name' => $name,
                   'email' => $email,
                   'subject' => $subject,
                   'message' => $message,
                   //'result' => $result,
                   'name_error' => '',
                   'email_error' => '',
                   'subject_error' => '',
                   'message_error' => ''
               ];
          
           //Validate firstname
           if (empty($data['name'])) {
               $data['name_error'] = 'Veuiller saisir votre nom et prénom';
           }

           //Validate email
           if (empty($data['email']) || !(filter_var($data['email'], FILTER_VALIDATE_EMAIL))) {
            $data['email_error'] = 'Veuiller saisir un email valide';
            }

           //Validate subject
           if (empty($data['subject'])) {
               $data['subject_error'] = 'Veuiller saisir l\'objet du message';
           }

           //Validate message
           if (empty($data['message'])) {
            $data['message_error'] = 'Veuiller saisir le message';
            }
           
           //If all errors are empty
           if (empty($data['name_error']) && empty($data['email_error'])
           && empty($data['subject_error']) && empty($data['message_error'])) { 
            
                $sendTo = 'franimpagaritse@gmail.com';

                $headers = 'From: webmaster@example.com' . "\r\n" .
                            'Reply-To: ' . $email . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                if (mail($sendTo, $subject, $message, $headers)) {
                    $data['result'] = '<div class="alert alert-success"> Votre message a été envoyé. </div>';
                    
                    $this->loadView('home', $data);
                } else {
                    $data['result'] = '<div class="alert alert-danger"> Votre message n\'a pas été envoyé !</div>';
                    
                    //Reload view with errors                    
                    $this->loadView('home', $data);
                }
            }
        }
    }
}