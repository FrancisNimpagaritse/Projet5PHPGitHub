<?php

class HomeadminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->postManager = $this->loadModel("PostManager");
        $this->commentManager = $this->loadModel("CommentManager");
        $this->userManager = $this->loadModel('UserManager');
    }

    public function index()
    {
        $posts = $this->postManager->countAllPosts();
        $publishedPosts = $this->postManager->countAllPublishedPosts();
        $unpublishedPosts = $this->postManager->countAllUnPublishedPosts();

        $comments = $this->commentManager->countAllComments();
        $approvedComments = $this->commentManager->countAllApprovedComments();
        $unapprovedComments = $this->commentManager->countAllUnApprovedComments();
        $users = $this->userManager->countAllUsers();

        $this->render('admin/homeAdmin',[
            'posts'=>$posts,
            'publishedPosts'=>$publishedPosts,
            'unpublishedPosts'=>$unpublishedPosts, 
            'comments'=>$comments,
            'approvedComments'=>$approvedComments,
            'unapprovedComments'=>$unapprovedComments, 
            'users'=>$users]);
    }
}