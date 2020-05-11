<?php

class AboutController extends Controller
{
    
    public function __construct()
    {
        //$this->catMngr = $this->loadModel("CategorieManager");
    }
    public function index()
    {
        
       // $categories = $this->catMngr->findAll();
        
       $this->loadView('about',['abouts'=>'This about our blog website']);
    }

}