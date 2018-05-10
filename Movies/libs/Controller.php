<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    public function loadModel($name) {
        $path = 'models/' . $name . '_model.php';

        if (file_exists($path)) {
            require 'models/' . $name . '_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }

    }/*
    public function model($model) {
        require_once 'models/' . $name . '_model.php';
        return new $model();
    }
    
    public function view($view, $data = []){
        require_once 'views/' . $view . '.php';
    }*/
}
