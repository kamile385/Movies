<?php

class About_Model extends Model{

    function __construct() {
        parent::__construct();
        /*echo 'About model';*/
    }
    
    function blah(){
        return 10 + 10;
    }
}