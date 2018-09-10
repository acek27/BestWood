<?php

class dashboard extends controller {

    function __construct() {
        parent::__construct();

        if (session::get('cc-loggedIn') == false) {
            header('location:' . URL . '/login?msg=silahkan login terlebih dahulu');
        }

        session::set('cc-title','Dashboard');
    }

    function index() {
        if (session::get('cc-akses') == 'admin') {
            $this->view->display('view_admin', 'dashboard');
        } else {
            $this->view->display('view_user', 'dashboard');
        }
    }

}