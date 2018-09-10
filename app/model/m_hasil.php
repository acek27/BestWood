<?php

class m_hasil extends model {

    function __construct() {
        parent::__construct();
    }

    function getData($akses) {
        if ($akses == 'admin') {
            return $this->db->selectAll("SELECT * FROM tb_hasil h JOIN tb_user u ON h.id_user = u.id_user JOIN tb_jenis_kopi jk ON h.id_jenis_kopi = jk.id_jenis_kopi JOIN tb_grade g ON h.id_grade = g.id_grade ORDER BY tanggal_uji DESC");
        } else {
            $username = session::get('username');
            $rslt = $this->db->selectWhere("SELECT * FROM tb_hasil h JOIN tb_user u ON h.id_user = u.id_user JOIN tb_jenis_kopi jk ON h.id_jenis_kopi = jk.id_jenis_kopi JOIN tb_grade g ON h.id_grade = g.id_grade WHERE u.id_user = :username ORDER BY tanggal_uji DESC", array('username' => $username));
            if ($rslt['row'] > 0) {
                return $rslt['data'];
            }
        }
    }

    function getDetail($username, $ke) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_hasil h JOIN tb_user u ON h.id_user = u.id_user JOIN tb_jenis_kopi jk ON h.id_jenis_kopi = jk.id_jenis_kopi JOIN tb_grade g ON h.id_grade = g.id_grade WHERE h.id_user = :username AND hasil_ke = :ke", array('username' => $username, 'ke' => $ke));
        return $rslt['data'];
    }

    function getDetailNilai($username, $ke) {
        $rslt = $this->db->selectWhere("SELECT p.id_pertanyaan, p.pertanyaan, p.nilai, n.nilai as nilai_input, n.uji_ke FROM tb_nilai_uji n JOIN tb_pertanyaan p ON n.id_pertanyaan = p.id_pertanyaan WHERE n.id_user = :username AND uji_ke = :ke", array('username' => $username, 'ke' => $ke));
        return $rslt['data'];
    }

    function getNilai($username, $tahap, $ke) {
        $stmt = $this->db->prepare("SELECT * FROM tb_nilai_uji WHERE id_user = '$username' AND uji_ke = $ke AND id_pertanyaan = $tahap");
        $stmt->execute();
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2= $this->db->prepare("SELECT * FROM tb_pertanyaan WHERE id_pertanyaan = $tahap");
        $stmt2->execute();
        $rslt2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rslt as $key => $value) {
            $nilai = $value['nilai'];
        }

        foreach ($rslt2 as $key => $value) {
            $ketetapan = doubleval($value['nilai']);
        }

        $hasil = $nilai * $ketetapan;

        return $hasil;

    }

}