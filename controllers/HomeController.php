<?php

class HomeController extends Controller
{    
    public function __construct()
    {
        parent::__construct();
    }

    public function page404()
    {
        $this->render('404',$data=[]);
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
        $this->render('home',$data);
    }

    //Send a message for contact
    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate entries 
            $validation = new Validator();

            $validation->Validate($_POST,[
                'name' => [
                    'required' => true,
                    'min-length' => 1,
                    'max-length' => 50,
                ],
                'email' => [
                    'email' => true,
                    'required' => true,
                    'max-length' => 50,
                ],
                'subject' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 50,
                ],
                'message' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 250,
                ], 
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $name = $cleanData['name'];
            $email = $cleanData['email'];
            $subject = $cleanData['subject'];
            $message = $cleanData['message'];
            
            $errors = $validation->getErrors();
            //If errors is empty
            if (!$errors) {
                $sendTo = 'franimpagaritse@gmail.com';

                $headers = 'From: webmaster@example.com' . "\r\n" .
                            'Reply-To: ' . $email . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                if (mail($sendTo, $subject, $message, $headers)) {
                    $data['result'] = '<div class="alert alert-success"> Votre message a été envoyé. </div>';
                    
                    $this->render('home', $data);
                } else {
                    $data['result'] = '<div class="alert alert-danger"> Votre message n\'a pas été envoyé !</div>';
                }
           }else {
                //Initialize data
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'result' => '<div class="alert alert-danger"> Votre message n\'a pas été envoyé ! Vérifiez les informations soumises !</div>',
                    'name_error' => $errors['name'] ?? '',
                    'email_error' => $errors['email'] ?? '',
                    'subject_error' => $errors['subject'] ?? '',
                    'message_error' => $errors['message'] ?? ''
                ];
                //Reload view with errors
                $this->render('home', $data);
            }
        }
    }
}