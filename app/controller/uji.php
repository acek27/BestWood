<?php

class uji extends controller {

    public $nilai = 0;

    function __construct() {
        parent::__construct();

        if (session::get('cc-loggedIn') == false) {
            header('location:' . URL . '/login?msg=silahkan login terlebih dahulu');
        }

        session::set('cc-title', 'Uji Kualitas');

        $this->model = $this->model->load('uji');
    }

    function index() {
        $username = session::get('cc-username');
        if (session::get('cc-akses') == 'user') {
            if (session::get('cc-uji') != true) {
                if ($this->model->getJumlahAkses() == 0) {
                    $this->view->display('view_user_awal', 'uji');
                } else {
                    $this->view->data = $this->model->getDataHasil($username);
                    $this->view->display('view_user', 'uji');
                }
            } else {
                header('location:' . URL . '/uji/tahap/' . session::get('cc-tahap_uji'));
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function detail() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_GET['username']) && isset($_GET['ke'])) {
                $this->view->hasil = $this->model->getDetail($_GET['username'], $_GET['ke']);
                $this->view->nilai = $this->model->getDetailNilai($_GET['username'], $_GET['ke']);
                $this->view->display('detail_uji', 'uji');
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            header('location:' . URL . '/uji/tahap/' . session::get('cc-tahap_uji'));
        }
    }

    function getJumlah($username, $tahap, $ke) {
        return $this->model->getNilaiDetail($username, $tahap, $ke);
    }

    function mulai() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_GET['jenis'])) {
                $username = session::get('cc-username');
                if ($_GET['jenis'] == 'arabika') {
                    session::set('cc-jenis_kopi', 1);
                } else {
                    session::set('cc-jenis_kopi', 2);
                }
                session::set('cc-uji', true);
                $this->model->deleteNilai($username);
                $this->model->insertNilai($username);
                header('location:' . URL . '/uji/tahap/1');
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function tahap($tahap) {
        if (session::get('cc-akses') == 'user') {
            if (isset($tahap)) {
                $username = session::get('cc-username');
                if ($tahap <= 20) {
                    session::set('cc-tahap_uji', $tahap);

                    $this->view->nilai = $this->model->getNilai($username, $tahap);
                    $this->view->data = $this->model->getPertanyaan($tahap);
                    $this->view->tahap = $tahap;
                    $this->view->display('uji_user', 'uji');
                } else {
                    header('location:' . URL . '/uji');
                }
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function selesai() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_GET['selesai'])) {
                $username = session::get('cc-username');
                $jenis = session::get('cc-jenis_kopi');

                session::set('cc-uji', false);
                session::set('cc-tahap_uji', 1);

                $this->model->setJumlahAkses(1);
                $array = $this->model->getProsesUji($username);
                $i = 0;
                foreach ($array as $key => $value) {
                    $id_user[$i] = $value['id_user'];
                    $tahap[$i] = $value['tahap'];
                    $nilai[$i] = $value['nilai'];
                    $i++;
                }

                $uji_ke = $this->model->getUjiKe($username) + 1;
                $this->model->setNilaiUjiFix($id_user, $tahap, $nilai, $uji_ke);

                $nilaiTotal = $this->model->getNilaiUji();
                $this->model->deleteNilai($username);
                $this->model->setHasilUji($username, $jenis, $nilaiTotal, $hasil_ke = $uji_ke);
                echo "<script>window.alert('Selamat, anda telah menyelesaikan uji kualitas kopi.');window.location.replace('" . URL . "/uji');</script>";
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function set() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_POST['username']) && isset($_POST['tahap']) && isset($_POST['nilai'])) {
                $username = $_POST['username'];
                $tahap = $_POST['tahap'];
                $nilai = $_POST['nilai'];
                $this->model->updateNilai($username, $tahap, $nilai);
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function reset() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_GET['reset'])) {
                session::set('cc-uji', false);
                session::set('cc-tahap_uji', 1);
                $username = session::get('cc-username');
                $this->model->resetNilai($username);
                echo "<script>window.alert('Berhasil direset, anda akan kembali ke pertanyaan pertama.');window.location.replace('" . URL . "/uji/tahap/1');</script>";
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

    function keluar() {
        if (session::get('cc-akses') == 'user') {
            if (isset($_GET['keluar'])) {
                session::set('cc-uji', false);
                session::set('cc-tahap_uji', 1);
                $username = session::get('cc-username');
                $this->model->deleteNilai($username);
                header('location:' . URL . '/uji');
            } else {
                header('location:' . URL . '/uji');
            }
        } else {
            echo "<script>window.alert('Maaf, anda tidak memiliki akses ke halaman ini.');window.location.replace('" . URL . "/dashboard');</script>";
        }
    }

}