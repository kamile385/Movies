<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        // if no header or footer
        //$this->view->render('index/index', 1);
    }
     public function index() {
        $this->view->render('index/index');
    }
     
    
/*
    public function index($name = '') {
       // $this->view->render('index/index');
        $user = $this->model('User');
        $user->name = $name;
        
        $this->view('index/index', ['name' => $user->name]);
    }
*/
}
