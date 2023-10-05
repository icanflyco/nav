<?php

class ModelsDaftar {
    private $table = 'users_yu';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function tambahDataUsers($data) {
        date_default_timezone_set("Asia/Jakarta");
        $kosong = "";
        $dates = date("H:i d M Y");
        $namaba = $data['namab'];
        $namas = explode(" ",$namaba);
        if(strlen($namas[0]) < 7){
            $rps = "2";
        }else{
            $rps = "1";
        }
        $query = "INSERT INTO users_yu VALUES ('', :tokenkey, :namad, :namab, :namap, :surel, :notelp, :jkelam, :alamat, :negara, :bio, :pekerjaan, :tgllahir, :tglupd,:tglbuat ,:centang ,:roles ,:rolessatu ,:fotop, :fotos, :akses)";

        $this->db->query($query);

        $this->db->bind('tokenkey', md5(date("H:i:s, d M Y")."".rand(1, 99999)));
        $this->db->bind('namad',$data['namad']);
        $this->db->bind('namab', substr($data['namab'],0,20));
        $this->db->bind('namap', strtolower(substr($namas[0],0,5)."_".rand(1,9999)."".substr(md5(date("H:i d M Y")),0,7)));
        $this->db->bind('surel', $data['surel']);
        $this->db->bind('notelp', $kosong);
        $this->db->bind('jkelam', $kosong);
        $this->db->bind('alamat', $kosong);
        $this->db->bind('negara', $data['negara']);
        $this->db->bind('bio', $kosong);
        $this->db->bind('pekerjaan', $kosong);
        $this->db->bind('tgllahir', $data['tgllahir']);
        $this->db->bind('tglupd', $dates);
        $this->db->bind('tglbuat', $dates);
        $this->db->bind('centang', $data['verification']);
        $this->db->bind('roles', '1');
        $this->db->bind('rolessatu', $rps);
        $this->db->bind('fotop', 'default-jpg.jpg');
        $this->db->bind('fotos', 'sampul.jpg');
        $this->db->bind('akses', md5($data['akses']));
        
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getUsersByEmail($surel)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE surel=:surel');
        $this->db->bind('surel', $surel);
        return $this->db->single();
    }
}