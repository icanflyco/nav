<?php

class ModelsVerify {
    private $table = 'users_yu';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function progressDaftar($data) {
        $query = "UPDATE users_yu SET
                    centang=:centang
                  WHERE surel =:surel";

        $this->db->query($query);
        $this->db->bind('surel', $data['surels']);
        
        $this->db->bind('centang', "");
        $this->db->execute();
        return $this->db->rowCount();
    }
}