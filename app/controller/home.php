<?php

class home extends controller {

    function __construct() {
        parent::__construct();
        session::set('cc-title','Temukan Kualitas Kayu Terbaik dengan BestWood');
        session::set('cc-log', false);
    }

    function index() {
        $this->view->display('home');
    }

}