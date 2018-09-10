<?php

class user extends controller {

    function __construct() {
        parent::__construct();

        if (session::get('cc-loggedIn') == false) {
            header('location:' . URL . '/login');
        } else {
            if (session::get('cc-akses') != 'admin') {
                header('location:' . URL . '/profil/' . session::get('cc-username'));
            }
        }

        session::set('cc-title', 'Data User');

        $this->model = $this->model->load('user');
    }

    function index() {
        $this->view->data = $this->model->getData();
        $this->view->display('view_admin', 'user');
    }

}