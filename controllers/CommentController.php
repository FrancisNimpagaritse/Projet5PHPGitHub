<?php

class CommentController extends Controller
{
    public function __construct()
    {  
       $this->commentManager = $this->loadModel('CommentManager');
    }

    public function index()
    {        
        $comments = $this->commentManager->findAll();
        $this->loadView('admin/commentAdmin',['comments'=> $comments]);
    }

    public function add()
    {
        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             //Pocess form
             
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //Initialize data posted
            $postid=trim(htmlspecialchars($_POST['postid']));
            $message=trim(htmlspecialchars($_POST['message']));

            //Initialize data
            $data = [
                'postid' => $postid,
                'message' => $message,
                'postid_error' => '',
                'message_error' => '',
            ];
            
            //Validate postid
            if (empty($data['postid'])) {
                $data['postid_error'] = 'Post invalide';
            }
            //Validate comment
            if (empty($data['message'])) {
                $data['message_error'] = 'Veuiller saisir un commentaire';
            }                      
                  
            //If all errors are empty
            if (empty($data['postid_error']) && empty($data['message_error'])) {             
                //Validate                
                
                $comment = new Comment();
                //Assign values to the new user to create
                $comment->setPostId($postid)
                        ->setMessage($message)
                        ->setAuthorId($_SESSION['user_id']);
                                        
                //insert into db using manager's create method
                $this->commentManager->create($comment);
            
                header('Location: '. URL_PATH.'posts/index');
            } else {
                //Reload view with errors
                echo 'Une erreur est survenue..';
            }            
        } else {
            //Initialize data for blank form
            $data = [  
                'postid' => '',
                'message' => '',
                'postid_error' => '',
                'message_error' => ''
            ];
            //Load view
            $this->loadView('post',$data);
        }        
    }
    
    public function publish($id)
    {  
        //Get post to publish from db
        $commentToPublish = $this->commentManager->findById($id);
        //publish into db
        $this->commentManager->publishOne($commentToPublish);
        
        header('Location: '. URL_PATH.'comment/index');
    }

    public function unPublish($id)
    {
        //Get post to unPublish from db
        $commentToUnpublish = $this->commentManager->findById($id);
        //publish into db
        $this->commentManager->unPublishOne($commentToUnpublish);
        
        header('Location: '. URL_PATH.'comment/index');
    }
}