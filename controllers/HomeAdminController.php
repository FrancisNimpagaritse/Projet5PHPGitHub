<?php

class HomeAdminController extends Controller
{
    public function __construct()
    {
        $this->postManager = $this->loadModel("PostManager");
        $this->commentManager = $this->loadModel("CommentManager");
        $this->userManager = $this->loadModel('UserManager');
    }

    public function index()
    {
        $posts = $this->postManager->countAllPosts();
        $comments = $this->commentManager->countAllComments();
        $users = $this->userManager->countAllUsers();

        $this->loadView('admin/homeAdmin',['posts'=>$posts, 'comments'=>$comments, 'users'=>$users]);
    }
}