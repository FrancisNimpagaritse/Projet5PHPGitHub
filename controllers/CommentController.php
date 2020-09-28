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
                //$this->render('posts/index',['resultMessage' => $resultMessage]);
                header('Location: ' . $this->env['URL_PATH'] . 'posts/index?success');
            } else {
                header('Location: ' . $this->env['URL_PATH'] . 'posts/index?error');
            }
        }
    }
    
    public function publish()
    {
        $commentToPublish = $this->commentManager->findById($this->id);
        $message = "Commentaire publié avec success";
        $this->commentManager->publishOne($commentToPublish);
        
        $comments = $this->commentManager->findAll();
        $this->render('admin/commentAdmin', ['comments'=> $comments, 'message' => $message]);
    }

    public function unPublish()
    {
        //Get post to unPublish from db
        $commentToUnpublish = $this->commentManager->findById($this->id);
        $message = "Commentaire retiré de la publication avec success";
        $this->commentManager->unPublishOne($commentToUnpublish);
        
        $comments = $this->commentManager->findAll();
        $this->render('admin/commentAdmin', ['comments'=> $comments, 'message' => $message]);
    }

    public function delete()
    {
        $token = new Token($this->httpRequest);
        if ($token->check('token')) {
            $commentToDelete = $this->commentManager->findById($this->id);
            $message = "Commentaire supprimé avec success";
            
            $this->commentManager->delete($commentToDelete);

            $comments = $this->commentManager->findAll();
            $this->render('admin/commentAdmin', ['comments'=> $comments, 'message' => $message]);
        }
    }
}