<?php

class ModelsHome
{
    private $table = 'users_yu';
    private $tableposts = "tabposts";
    private $tablepostsstatus = 'posting_me';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllDataUsers()
    {
        $this->db->query("SELECT * FROM users_yu ORDER BY RAND() LIMIT 4");
        return $this->db->resultSet();
    }
    public function getAksesByToken($token)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE tokenkey=:tokenkey');

        $this->db->bind('tokenkey', $token);
        return $this->db->single();
    }
    public function getAksesUsersSession($data)
    {
        $this->db->query('SELECT * FROM tabposts WHERE tokenkey_id=:tokenkey AND idposts=:idposts');

        $this->db->bind('tokenkey', $data['tokenkey']);
        $this->db->bind('idposts', $data['post-tokenkey']);
        return $this->db->single();
    }
    public function getByNamap($namap)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_pengguna=:nama_pengguna');

        $this->db->bind('nama_pengguna', $namap);
        return $this->db->single();
    }
    public function insStatus($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO posting_me VALUES('',:tokenkeyid,:status,:roles,:rolessatu,:dates,:datesdua,:tokenkeystatus)";

        $this->db->query($query);

        $this->db->bind('tokenkeyid', $data['access'] . "_posting_");
        $this->db->bind('status', base64_encode($data['status'] . "_replace_" . $data['array_image']));
        $this->db->bind('roles', $data['global']);
        $this->db->bind('rolessatu', "posting");
        $this->db->bind('dates', $dates);
        $this->db->bind('datesdua', $dates);
        $this->db->bind('tokenkeystatus', date("Hisdmy"));

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function repStatus($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO posting_me VALUES('',:tokenkeyid,:status,:roles,:rolessatu,:dates,:datesdua,:tokenkeystatus)";

        $this->db->query($query);

        $this->db->bind('tokenkeyid', $data['tokenkey-session'] . "_posting_" . $data['tokenkey-id']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('roles', $data['global']);
        $this->db->bind('rolessatu', "reposts");
        $this->db->bind('dates', $dates);
        $this->db->bind('datesdua', $dates);
        $this->db->bind('tokenkeystatus', $data['tokenkey-status']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getAllDataStatus()
    {
        $this->db->query("SELECT * FROM posting_me ORDER BY idposts DESC LIMIT 100");
        return $this->db->resultSet();
    }
    public function getAllData21Status()
    {
        $this->db->query("SELECT * FROM posting_me ORDER BY RAND() LIMIT 15");
        return $this->db->resultSet();
    }
    public function getAllData2Status()
    {
        $this->db->query("SELECT * FROM posting_me ORDER BY idposts DESC");
        return $this->db->resultSet();
    }
    public function createLoves($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkey_id,:roles,:dates)";
        $this->db->query($query);
        $this->db->bind('idposts', $data['data-id']);
        $this->db->bind('tokenkey_id', $data['access']);
        $this->db->bind('roles', 'Loves');
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteLoves($data)
    {
        $query = "DELETE FROM tabposts WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles";
        $this->db->query($query);
        $this->db->bind('tokenkey_id', $data['access']);
        $this->db->bind('roles', 'Loves');
        $this->db->bind('idposts', $data['data-id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function createRepost($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkey_id,:roles,:dates)";
        $this->db->query($query);
        $this->db->bind('idposts', $data['post-id']);
        $this->db->bind('tokenkey_id', $data['tokenkey-session']);
        $this->db->bind('roles', 'Reposts');
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteRepost($data)
    {
        $query = "DELETE FROM tabposts WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles";
        $this->db->query($query);
        $this->db->bind('tokenkey_id', $data['access']);

        $this->db->bind('roles', 'Reposts');

        $this->db->bind('idposts', $data['data-id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteRestatus($data)
    {
        $query = "DELETE FROM posting_me WHERE rolessatu=:rolessatu AND tokenkey_status=:tokenkey_status";
        $this->db->query($query);
        $this->db->bind('rolessatu', 'reposts');
        $this->db->bind('tokenkey_status', $data['tokenkey-status']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getPostsByTokenTabposts($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tableposts . ' WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('idposts', $id);
        $this->db->bind('roles', 'Reposts');
        return $this->db->single();
    }
    public function getAksesLoves($data)
    {
        $this->db->query('SELECT * FROM ' . $this->tableposts . ' WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles');

        $this->db->bind('tokenkey_id', $data['tokenkey']);
        $this->db->bind('roles', 'Loves');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function getAksesRepost($data)
    {
        $this->db->query('SELECT * FROM ' . $this->tableposts . ' WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles');

        $this->db->bind('tokenkey_id', $data['tokenkey']);
        $this->db->bind('roles', 'Reposts');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function getPostsById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tablepostsstatus . ' WHERE idposts=:idposts');

        $this->db->bind('idposts', $id);
        return $this->db->single();
    }
    public function countLoves($data)
    {
        $this->db->query('SELECT count(roles) AS total FROM tabposts WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('roles', 'Loves');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function countRepost($data)
    {
        $this->db->query('SELECT count(roles) AS total FROM tabposts WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('roles', 'Reposts');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function countCommentsy($data)
    {
        $this->db->query('SELECT count(roles) AS total FROM tabposts WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('roles', 'Comments');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
}
