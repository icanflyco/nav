<?php


class ModelsProfiles
{
    private $table = 'users_yu';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAksesByToken($token)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tokenkey=:tokenkey');

        $this->db->bind('tokenkey', $token);
        return $this->db->single();
    }
    public function createFollow($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkey_id,:roles,:dates)";
        $this->db->query($query);
        $this->db->bind('idposts', $data['data-id']);
        $this->db->bind('tokenkey_id', $data['access']);
        $this->db->bind('roles', 'Follow');
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteFollow($data)
    {
        $query = "DELETE FROM tabposts WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles";
        $this->db->query($query);
        $this->db->bind('tokenkey_id', $data['access']);
        $this->db->bind('roles', 'Follow');
        $this->db->bind('idposts', $data['data-id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getTabposts($data)
    {
        $this->db->query('SELECT count(idposts) AS total FROM tabposts WHERE idposts=:namap AND roles=:roles');
        $this->db->bind('namap', $data['tokenkey']);
        $this->db->bind('roles', 'Follow');
        return $this->db->single();
    }
    public function getTab2posts($data)
    {
        $this->db->query('SELECT count(tokenkey_id) AS total FROM tabposts WHERE tokenkey_id=:tokenkey_id AND roles=:roles');
        $this->db->bind('tokenkey_id', $data['tokenkey']);
        $this->db->bind('roles', 'Follow');
        return $this->db->single();
    }
    public function getAksesFollow($data)
    {
        $this->db->query('SELECT * FROM  tabposts WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles');

        $this->db->bind('tokenkey_id', $data['tokenkey']);
        $this->db->bind('roles', 'Follow');
        $this->db->bind('idposts', $data['post-tokenkey']);
        return $this->db->single();
    }
}