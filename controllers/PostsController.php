<?php

class PostsController extends Controller
{    
    public function __construct()
    {
        parent::__construct();
        $this->postManager = $this->loadModel("PostManager");
        $this->userManager = $this->loadModel('UserManager');
        $this->commentManager = $this->loadModel('CommentManager');
    }

    public function index()
    {  
       $posts = $this->postManager->findAllPublished();

       $popularOne = $this->postManager->findPopular();
       $topFivePopulars = $this->postManager->findTopFivePopular();
       $catstat = $this->postManager->countPostsByCategory();
       $newPost = $this->postManager->findNew();
       
       $this->render('posts',['posts'=>$posts, 'topFivePopulars'=>$topFivePopulars, 'popularOne'=>$popularOne, 'categorystats'=>$catstat, 'newPost'=>$newPost]);
    }

    public function list()
    {        
        $posts = $this->postManager->findAll();
        $this->render('admin/postsAdmin',['posts'=> $posts]);
    }

    public function show()
    {
        if(!$this->id) { 
            throw new Exception("L'identifiant du post est invalide !", 404);
        }

        $post = $this->postManager->showOneById($this->id);
        if (!$post) {
            header('Location: '. URL_PATH.'home/page404');
        }
        $comments = $this->commentManager->findCommentsByPost($this->id);
        $this->render('show',['post'=>$post, 'comments'=>$comments]);
               
    }
    
    //Add post with data filled via form if any error reload form with input data and display error messages
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        
            //Validate entries 
            $validation = new Validator();

            $validation->Validate($_POST,[
                'title' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 50, 
                ],
                'chapo' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 50, 
                ],
                'category' => [
                    'required' => true,
                    'min-length' => 2,
                    'max-length' => 50, 
                ],
                'content' => [
                    'required' => true,
                    'min-length' => 20,
                    'max-length' => 500, 
                ],
                'postImage' => [
                    'required' => true,
                    'min-length' => 5,
                    'max-length' => 50
                ] 
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $title = $cleanData['title'];
            $chapo = $cleanData['chapo'];
            $category = $cleanData['category'];
            $content = $cleanData['content'];
            $postImage = $cleanData['postImage'];
            
            $errors = $validation->getErrors();
            
            //If errors is empty
            if (!$errors) {
                //Validate
                $post = new Post();
                //Assign values to the new user to create
                $post->settitle($title)
                        ->setchapo($chapo)
                        ->setcategory($category)
                        ->setcontent($content)
                        ->setAuthorId($_SESSION['user_id'])
                        ->setPostImage($postImage);
                                        
                //insert into db using manager's create method
                $this->postManager->create($post);
            
                header('Location: '. URL_PATH.'posts/list?success');

            } else {
                $data = [
                    'title' => $title,
                    'chapo' => $chapo,
                    'category' => $category,
                    'content' => $content,
                    'postImage' => $postImage,
                    'title_error' => $errors['title'] ?? '',
                    'chapo_error' => $errors['chapo'] ?? '',
                    'category_error' => $errors['category'] ?? '',
                    'content_error' => $errors['content'] ?? '',
                    'postImage_error' => $errors['postImage'] ?? ''
                ];
                
                $this->render('admin/addPost',$data);
            }
        } else {
            //Initialize data for blank form
            $data = [  
                'title' => '',
                'chapo' => '',
                'category' => '',
                'content' => '',
                'postImage' => '',
                'title_error' => '',
                'chapo_error' => '',
                'category_error' => '',
                'content_error' => '',
                'postImage_error' => ''
            ];
            //Load view
            $this->render('admin/addPost',$data);
        }
    }
    
    public function publish()
    {  
        //Get post to publish from db
        $postToPublish = $this->postManager->findById($this->id);
        
        $this->postManager->publishOne($postToPublish);

        header('Location: '. URL_PATH.'posts/list?success');
    }

    public function unPublish()
    {
        //Get post to unPublish from db
        $postToUnpublish = $this->postManager->findById($this->id);

        $this->postManager->unPublishOne($postToUnpublish);

        header('Location: '. URL_PATH.'posts/list?success');
    }
    
    public function edit()
    {
        if (isset($_GET['token']) && ($_GET['token'] != $_SESSION['user']['token']) || empty($_GET['token'])) {
            exit("Token périmé!");
        }

        //Avoid data send by GET method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Validate entries 
            $validation = new Validator();

            $validation->Validate($_POST,[
                'title' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 50, 
                ],
                'chapo' => [
                    'required' => true,
                    'min-length' => 3,
                    'max-length' => 50, 
                ],
                'category' => [
                    'required' => true,
                    'min-length' => 2,
                    'max-length' => 50, 
                ],
                'content' => [
                    'required' => true,
                    'min-length' => 20,
                    'max-length' => 500, 
                ],
                'postImage' => [
                    'required' => true,
                    'min-length' => 5,
                    'max-length' => 50
                ] 
            ]);
            //Get cleaned and validated data
            $cleanData = $validation->getClean();
            
            $title = $cleanData['title'];
            $chapo = $cleanData['chapo'];
            $category = $cleanData['category'];
            $content = $cleanData['content'];
            $postImage = $cleanData['postImage'];
            
            $errors = $validation->getErrors();
            
            //If errors is empty
            if (!$errors) {            
                //Get post to update from Manager
                $postToUpdate = $this->postManager->findById($this->id);                      
                //Assign values to the post to edit
                $postToUpdate->settitle($title)
                            ->setchapo($chapo)
                            ->setcategory($category)
                            ->setcontent($content)
                            ->setAuthorId($_SESSION['user_id'])
                            ->setPostImage($postImage);

                $this->postManager->update($postToUpdate);
                     
                header('Location: '. URL_PATH.'posts/list?success');

            } else {
                $data = [
                    'title' => $title,
                    'chapo' => $chapo,
                    'category' => $category,
                    'content' => $content,
                    'postImage' => $postImage,
                    'title_error' => $errors['title'] ?? '',
                    'chapo_error' => $errors['chapo'] ?? '',
                    'category_error' => $errors['category'] ?? '',
                    'content_error' => $errors['content'] ?? '',
                    'postImage_error' => $errors['postImage'] ?? ''
                ];
                //Reload view with errors
                $this->render('admin/editPost',$data);
            }            
        } else { //Initial load view for update
            //Get existing post & author from db
            $post = $this->postManager->findById($this->id);
            $user = $this->userManager->findById($post->getAuthorId());

            //Check for ownership
            if ($user->getId() != $_SESSION['user_id']) {
                header('Location: '. URL_PATH.'post/list');
            }
            //Initialize data for edit form
            $data = [
                'id' => $this->id,
                'title' => $post->getTitle(),
                'category' => $post->getCategory(),
                'chapo' => $post->getChapo(),
                'content' => $post->getContent(),
                'postImage' => $post->getPostImage(),
                'title_error' => '',
                'category_error' => '',
                'chapo_error' => '',
                'content_error' => '',
                'postImage_error' => ''
            ];
            //Load view
            $this->render('admin/editPost',$data);
        }
    }
}