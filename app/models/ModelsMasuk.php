<?php

class ModelsMasuk {
    private $table = 'users_yu';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function getSurelAkses($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE surel=:surel AND akses=:akses');
        $this->db->bind('surel', $data['surel']);
        $this->db->bind('akses', md5($data['akses']));
        return $this->db->single();
    }
}