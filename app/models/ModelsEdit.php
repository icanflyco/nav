<?php


class ModelsEdit {
    private $table = "tabposts";
    private $usertable = "users_yu";
    private $tablepostsstatus = "posting_me";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function getPlaceBy2Namap($data){
        $this->db->query('SELECT * FROM ' . $this->usertable . ' WHERE nama_pengguna=:nama_pengguna');

        $this->db->bind('nama_pengguna', $data['namap']);
        return $this->db->single();
    }
    public function changeName($data) {
        $query = "UPDATE users_yu SET
                    nama_belakang = :nama_belakang
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('nama_belakang', $data['nama_belakang']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeUname($data) {
        $query = "UPDATE users_yu SET
                    nama_pengguna = :namap
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('namap', $data['namap']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeUri($data) {
        $query = "UPDATE users_yu SET
                    alamat = :alamat
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('alamat', $data['uris']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeNotelp($data) {
        $query = "UPDATE users_yu SET
                    no_telpon=:no_telpon
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('no_telpon', $data['notelpon']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeBio($data) {
        $query = "UPDATE users_yu SET
                    bio=:bio
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('bio', $data['bio']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeGander($data) {
        $query = "UPDATE users_yu SET
                    j_kelamin=:gender
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('gender', $data['gender']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeNegara($data) {
        $query = "UPDATE users_yu SET
                    negara=:negara
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('negara', $data['negara']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeWork($data) {
        $query = "UPDATE users_yu SET
                    pekerjaan=:pekerjaan
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('pekerjaan', $data['working']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function changeLahir($data) {
        $query = "UPDATE users_yu SET
                    tanggal_lahir=:tanggal_lahir
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";

        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('tanggal_lahir', $data['lahir']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}