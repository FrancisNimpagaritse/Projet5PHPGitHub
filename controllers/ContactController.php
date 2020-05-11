<?php

class ContactController extends Controller
{
    
    public function __construct()
    {
        //$this->catMngr = $this->loadModel("CategorieManager");
    }
    public function index()
    {
        
       // $categories = $this->catMngr->findAll();
        
       $this->loadView('contact',['contacts'=>'Les contacts de nos militants']);
    }

}