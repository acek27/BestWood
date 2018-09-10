<?php

class pertanyaan extends controller {

    function __construct() {
        parent::__construct();

        if (session::get('cc-loggedIn') == false) {
            header('location:' . URL . '/login?msg=silahkan login terlebih dahulu');
        }

        session::set('cc-title', 'Pertanyaan');

        $this->model = $this->model->load('pertanyaan');
    }

    function index() {
        if (session::get('cc-akses') == 'admin') {
            $this->view->data = $this->model->getData();
            $this->view->display('view_admin', 'pertanyaan');
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function create() {
        if (session::get('cc-akses') == 'admin') {
            $this->view->display('create_admin', 'pertanyaan');
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function submit() {
        if (session::get('cc-akses') == 'admin') {
            if (isset($_POST['submit'])) {
                $pertanyaan = $_POST['pertanyaan'];
                $penjelasan = $_POST['penjelasan'];
                $nilai = $_POST['nilai'];

                $this->model->insert($pertanyaan, $penjelasan, $nilai);
                echo "<script>window.alert('Berhasil menambah pertanyaan');window.location.replace('" . URL . "/pertanyaan');</script>";
            } else {
                header('location:' . URL . '/pertanyaan');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function detail($id) {
        if (session::get('cc-akses') == 'admin') {
            if (isset($id)) {
                $this->view->data = $this->model->getDataPertanyaan($id);
                $this->view->display('detail_admin', 'pertanyaan');
            } else {
                header('location:' . URL . '/pertanyaan');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function edit($id) {
        if (session::get('cc-akses') == 'admin') {
            if (isset($id)) {
                $this->view->data = $this->model->getDataPertanyaan($id);
                $this->view->display('edit_admin', 'pertanyaan');
            } else {
                header('location:' . URL . '/pertanyaan');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function update() {
        if (session::get('cc-akses') == 'admin') {
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $pertanyaan = $_POST['pertanyaan'];
                $penjelasan = $_POST['penjelasan'];
                $nilai = $_POST['nilai'];

                $this->model->update($id, $pertanyaan, $penjelasan, $nilai);
                echo "<script>window.alert('Berhasil memperbarui data pertanyaan');window.location.replace('" . URL . "/pertanyaan');</script>";
            } else {
                header('location:' . URL . '/pertanyaan');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function delete($id) {
        if (session::get('cc-akses') == 'admin') {
            if (isset($id)) {
                $this->model->delete($id);
                echo "<script>window.alert('Berhasil menghapus pertanyaan');window.location.replace('" . URL . "/pertanyaan');</script>";
            } else {
                header('location:' . URL . '/pertanyaan');
            }
        } else {
            echo "<script>window.alert('Berhasil memperbarui data pertanyaan');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

}