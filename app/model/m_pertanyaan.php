<?php

class m_pertanyaan extends model {

    function __construct() {
        parent::__construct();
    }

    function getData() {
        return $this->db->selectAll("SELECT * FROM tb_pertanyaan");
    }

    function getDataPertanyaan($id) {
        $rslt = $this->db->selectWhere("SELECT * FROM tb_pertanyaan WHERE id_pertanyaan = :id", array('id' => $id));
        return $rslt['data'];
    }

    function insert($pertanyaan, $penjelasan, $nilai) {
        $stmt = $this->db->prepare("INSERT INTO tb_pertanyaan (id_pertanyaan, pertanyaan, penjelasan, nilai) VALUES (null, '$pertanyaan', '$penjelasan', $nilai)");
        $stmt->execute();
    }

    function update($id, $pertanyaan, $penjelasan, $nilai) {
        $this->db->update("UPDATE tb_pertanyaan SET pertanyaan = :pertanyaan, penjelasan = :penjelasan, nilai = :nilai WHERE id_pertanyaan = :id", array('id' => $id, 'pertanyaan' => $pertanyaan, 'penjelasan' => $penjelasan, 'nilai' => $nilai));
    }

    function delete($id) {
        $this->db->delete("DELETE FROM tb_pertanyaan WHERE id_pertanyaan = :id", array('id' => $id));
    }

}