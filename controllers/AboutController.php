<?php

class AboutController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {        
       $this->render('about',[]);
    }

}