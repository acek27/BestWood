<?php

class m_uji extends model {

    function __construct() {
        parent::__construct();
    }

    function getJumlahAkses() {
        $rslt = $this->db->selectWhere("SELECT jumlah_akses_uji FROM tb_user WHERE id_user = :id", array('id' => session::get('cc-username')));
        foreach ($rslt['data'] as $key => $value) {
            $jumlah = $value['jumlah_akses_uji'];
        }
        return $jumlah;
    }

    function getDetail($username, $ke) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_hasil h JOIN tb_user u ON h.id_user = u.id_user JOIN tb_jenis_kopi jk ON h.id_jenis_kopi = jk.id_jenis_kopi JOIN tb_grade g ON h.id_grade = g.id_grade WHERE h.id_user = :username AND hasil_ke = :ke", array('username' => $username, 'ke' => $ke));
        return $rslt['data'];
    }

    function getDetailNilai($username, $ke) {
        $rslt = $this->db->selectWhere("SELECT p.id_pertanyaan, p.pertanyaan, p.nilai, n.nilai as nilai_input, n.uji_ke FROM tb_nilai_uji n JOIN tb_pertanyaan p ON n.id_pertanyaan = p.id_pertanyaan WHERE n.id_user = :username AND uji_ke = :ke", array('username' => $username, 'ke' => $ke));
        return $rslt['data'];
    }

    function getDataHasil($username) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_hasil h JOIN tb_user u ON h.id_user = u.id_user JOIN tb_jenis_kopi jk ON h.id_jenis_kopi = jk.id_jenis_kopi JOIN tb_grade g ON h.id_grade = g.id_grade WHERE u.id_user = :username ORDER BY tanggal_uji DESC", array('username' => $username));
        if ($rslt['row'] > 0) {
            return $rslt['data'];
        }
    }

    function setJumlahAkses($akses) {
        $this->db->update("UPDATE tb_user SET jumlah_akses_uji = :akses WHERE id_user = :id", array('id' => session::get('cc-username'), 'akses' => $akses));
    }

    function getPertanyaan($id) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_pertanyaan WHERE id_pertanyaan = :id", array('id' => $id));
        return $rslt['data'];
    }

    function insertNilai($username) {
        $stmt = $this->db->prepare("SELECT * FROM tb_pertanyaan");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        $jumlah = $stmt->rowCount();

        for ($i = 1; $i <= $jumlah; $i++) {
            $rslt = $this->db->prepare("INSERT INTO tb_proses_uji (id_user, tahap, nilai) VALUES ('$username', $i, 0)");
            $rslt->execute();
        }
    }

    function resetNilai($username) {
        for ($i = 1; $i <= 20; $i++) {
            $rslt = $this->db->update("UPDATE tb_proses_uji SET nilai = 0 WHERE id_user = :username", array('username' => $username));
        }
    }

    function getNilai($username, $tahap) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_proses_uji WHERE id_user = :username AND tahap = :tahap", array('username' => $username, 'tahap' => $tahap));
        foreach ($rslt['data'] as $key => $value) {
            $nilai = $value['nilai'];
        }
        return $nilai;
    }

    function getNilaiDetail($username, $tahap, $ke) {
        $stmt = $this->db->prepare("SELECT * FROM tb_nilai_uji WHERE id_user = '$username' AND uji_ke = $ke AND id_pertanyaan = $tahap");
        $stmt->execute();
        $rslt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $this->db->prepare("SELECT * FROM tb_pertanyaan WHERE id_pertanyaan = $tahap");
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

    function updateNilai($username, $tahap, $nilai) {
        $rslt = $this->db->update("UPDATE tb_proses_uji SET nilai = :nilai WHERE id_user = :username AND tahap = :tahap", array('username' => $username, 'tahap' => $tahap, 'nilai' => $nilai));
    }

    function deleteNilai($username) {
        $rslt = $this->db->delete("DELETE FROM tb_proses_uji WHERE id_user = :username", array('username' => $username));
    }

    function getNilaiUji() {
        $rslt = $this->db->selectAll("SELECT * FROM tb_proses_uji");
        $rslt2 = $this->db->selectAll("SELECT * FROM tb_pertanyaan");

        $nilai = array();
        $ketetapan = array();
        $hasil = array();

        $i = 0;
        foreach ($rslt as $key => $value) {
            $nilai[$i] = intval($value['nilai']);
            $i++;
        }

        $i = 0;
        foreach ($rslt2 as $key => $value) {
            $ketetapan[$i] = floatval($value['nilai']);
            $i++;
        }

        for ($i = 0; $i < 20; $i++) {
            $hasil[$i] = $nilai[$i] * $ketetapan[$i];
        }

        return array_sum($hasil);
    }

    function getProsesUji($id) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_proses_uji WHERE id_user = :id", array('id' => $id));
        return $rslt['data'];
    }

    function getUjiKe($username) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_nilai_uji WHERE id_user = :username ORDER BY uji_ke DESC LIMIT 1", array('username', $username));
        foreach ($rslt['data'] as $key => $value) {
            return intval($value['uji_ke']);
        }
    }

    function setNilaiUjiFix($username, $tahap, $nilai, $uji_ke) {
        $stmt = $this->db->prepare("SELECT * FROM tb_pertanyaan");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        $jumlah = $stmt->rowCount();

        for ($i = 0; $i < $jumlah; $i++) {
            $u = $username[$i];
            $t = $tahap[$i];
            $n = $nilai[$i];
            $rslt = $this->db->prepare("INSERT INTO tb_nilai_uji (id_user, id_pertanyaan, nilai, uji_ke) VALUES ('$username[$i]', $t, $n, $uji_ke)");
            $rslt->execute();
        }
    }

    function setHasilUji($username, $jenis, $nilai, $hasil_ke) {
        if ($nilai <= 11) {
            $grade = 1;
        } else if ($nilai >= 12 && $nilai <= 25) {
            $grade = 2;
        } else if ($nilai >= 26 && $nilai <= 44) {
            $grade = 3;
        } else if ($nilai >= 45 && $nilai <= 80 && $jenis == 1) {
            $grade = 4;
        } else if ($nilai >= 45 && $nilai <= 60 && $jenis == 2) {
            $grade = 5;
        } else if ($nilai >= 61 && $nilai <= 80 && $jenis == 2) {
            $grade = 6;
        } else if ($nilai >= 81 && $nilai <= 150) {
            $grade = 7;
        } else if ($nilai >= 151) {
            $grade = 8;
        }

        $stmt = $this->db->prepare("INSERT INTO tb_hasil (id_hasil, id_user, id_jenis_kopi, id_grade, nilai_cacat, tanggal_uji, hasil_ke) VALUES (null, '$username', $jenis, $grade, $nilai, CURRENT_DATE, $hasil_ke)");
        $stmt->execute();
    }

}