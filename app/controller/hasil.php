<?php

class hasil extends controller {

    function __construct() {
        parent::__construct();

        if (session::get('cc-loggedIn') == false) {
            header('location:' . URL . '/login?msg=silahkan login terlebih dahulu');
        }

        session::set('cc-title', 'Hasil Uji Kualitas');

        $this->model = $this->model->load('hasil');
    }

    function index() {
        if (session::get('cc-akses') == 'admin') {
            $this->view->data = $this->model->getData('admin');
            $this->view->display('view_admin', 'hasil');
        } else {
            header('location:' . URL . '/uji');
        }
    }

    function detail() {
        if (session::get('cc-akses') == 'admin') {
            if (isset($_GET['username']) && isset($_GET['ke'])) {
                $this->view->hasil = $this->model->getDetail($_GET['username'], $_GET['ke']);
                $this->view->nilai = $this->model->getDetailNilai($_GET['username'], $_GET['ke']);
                $this->view->display('view_detail', 'hasil');
            } else {
                header('location:' . URL . '/hasil');
            }
        } else {
            header('location:' . URL . '/uji/detail');
        }
    }

    function getJumlah($username, $tahap, $ke) {
        return $this->model->getNilai($username, $tahap, $ke);
    }

}