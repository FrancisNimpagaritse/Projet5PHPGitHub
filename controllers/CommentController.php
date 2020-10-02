<?php

class CommentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->commentManager = $this->loadModel('CommentManager');
    }

    public function index()
    {        
        $comments = $this->commentManager->findAll();
        $this->render('admin/commentAdmin', ['comments'=> $comments]);
    }

    public function add()
    {
        //Avoid data send by GET method
        if ($this->httpRequest->method() == 'POST') {
            //Validate entries 
            $validation = new Validator();

            $validation->Validate($this->httpRequest->getPost(), [
                'message' => [
                    'required' => true,
                    'min-length' => 1,
                    'max-length' => 50,
                ],
                'postid' => [
                    'required' => true,
                ]
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $message = $cleanData['message'];
            $postid = $cleanData['postid'];

            $errors = $validation->getErrors();
            //print_r($errors); die();
            //If errors is empty
            if (!$errors) {
                $comment = new Comment();
                //Assign values to the new user to create
                $comment->setPostId($postid)
                        ->setMessage($message)
                        ->setAuthorId($this->httpRequest->getSession('user_id'));

                $this->commentManager->create($comment);
                
                header('Location: ' . $this->env['URL_PATH'] . 'posts/index?success');
            } else {
                
                header('Location: ' . $this->env['URL_PATH'] . 'posts/index?error');
            }
        }
    }
    
    public function publish()
    {
        $sessionToken = $this->httpRequest->getSession('csrf');
        $getToken = $this->httpRequest->getGet('token');
        
        if($sessionToken == $getToken) {
            $commentToPublish = $this->commentManager->findById($this->id);
            $this->commentManager->publishOne($commentToPublish);
            
           header('Location: ' . $this->env['URL_PATH'] . 'comment/index?success');
        } else {
            throw new Exception("Impossible de réaliser l'action !");
        }
    }

    public function unPublish()
    {
        $sessionToken = $this->httpRequest->getSession('csrf');
        $getToken = $this->httpRequest->getGet('token');
        
        if($sessionToken == $getToken) {
            //Get post to unPublish from db
            $commentToUnpublish = $this->commentManager->findById($this->id);
            $this->commentManager->unPublishOne($commentToUnpublish);
            
            header('Location: ' . $this->env['URL_PATH'] . 'comment/index?success');
        } else {
            throw new Exception("Impossible de réaliser l'action !");
        }
    }

    public function delete()
    {
        $sessionToken = $this->httpRequest->getSession('csrf');
        $getToken = $this->httpRequest->getGet('token');
        
        if($sessionToken == $getToken) {
            $commentToDelete = $this->commentManager->findById($this->id);
            $message = "Commentaire supprimé avec success";
            
            $this->commentManager->delete($commentToDelete);

            $comments = $this->commentManager->findAll();
            $this->render('admin/commentAdmin', ['comments'=> $comments, 'message' => $message]);
        } else {
            throw new Exception("Impossible de réaliser l'action !");
        }
    }
}