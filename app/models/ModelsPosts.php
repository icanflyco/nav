<?php
Sessionstr::esession();

class ModelsPosts {
    private $table = "tabposts";
    private $usertable = "users_yu";
    private $tablepostsstatus = "posting_me";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function insPosts($data) {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkeyid,:roles,:dates)";

        $this->db->query($query);
        $this->db->bind('idposts', $data['idposts-me']);
        $this->db->bind('tokenkeyid', $data['access']);
        $this->db->bind('roles', 'view-status');
        $this->db->bind('dates', $dates);

        $this->db->execute();

        return $this->db->rowCount();
    }
    
    public function getUsersByTokens($tokenkey) {
        $this->db->query('SELECT * FROM ' . $this->usertable . ' WHERE tokenkey=:tokenkey');

        $this->db->bind('tokenkey', $tokenkey);
        return $this->db->single();
    }
    public function deleteRepost($data) {
        $query = "DELETE FROM tabposts WHERE tokenkey_id=:tokenkey_id AND idposts=:idposts AND roles=:roles";
        $this->db->query($query);
        $this->db->bind('tokenkey_id', $data['access']);
        
        $this->db->bind('roles', 'Reposts');
        
        $this->db->bind('idposts', $data['data-id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function deleteRestatus($data) {
        $query = "DELETE FROM posting_me WHERE rolessatu=:rolessatu AND tokenkey_status=:tokenkey_status";
        $this->db->query($query);
        $this->db->bind('rolessatu', 'reposts');
        $this->db->bind('tokenkey_status', $data['tokenkey-status']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function insComments($data) {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO posting_me VALUES('',:tokenkeyid,:status,:roles,:rolessatu,:dates,:datesdua,:tokenkeystatus)";

        $this->db->query($query);

        $this->db->bind('tokenkeyid', $data['tokenkey-session']."_posting_");
        $this->db->bind('status', base64_encode($data['comments']."_replace_".$data['post-id']."_display_comments"));
        $this->db->bind('roles', 'Publics');
        $this->db->bind('rolessatu', "comments");
        $this->db->bind('dates', $dates);
        $this->db->bind('datesdua', $dates);
        $this->db->bind('tokenkeystatus', date("Hisdmy"));

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getPostsComments() {
        $this->db->query("SELECT * FROM posting_me");
        return $this->db->resultSet();
    }
    
    public function getPostsCommentsDua($id) {
        $this->db->query('SELECT * FROM posting_me WHERE idposts=:idposts AND rolessatu=:rolessatu');

        $this->db->bind('idposts', $id);
        $this->db->bind('rolessatu', 'balas-comments');
        return $this->db->single();
    }
    public function getPostsComments2() {
        $this->db->query("SELECT * FROM posting_me ORDER BY idposts DESC");
        return $this->db->resultSet();
    }
    public function getCountPostsImage($data) {
        $this->db->query('SELECT count(roles) AS jml FROM tabposts WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('roles', 'view-status');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function getPostById2($data) {
        $this->db->query('SELECT * FROM tabposts WHERE idposts=:idposts AND roles=:roles');

        $this->db->bind('roles', 'view-status');
        $this->db->bind('idposts', $data['post-id']);
        return $this->db->single();
    }
    public function createComments($data) {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkey_id,:roles,:dates)";
        $this->db->query($query);
        $this->db->bind('idposts', $data['post-id']);
        $this->db->bind('tokenkey_id', $data['tokenkey-session']);
        $this->db->bind('roles', 'Comments');
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function create2Comments($data) {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO tabposts VALUES('',:idposts,:tokenkey_id,:roles,:dates)";
        $this->db->query($query);
        $this->db->bind('idposts', $data['post-id']);
        $this->db->bind('tokenkey_id', $data['tokenkey-session']);
        $this->db->bind('roles', 'Comments');
        $this->db->bind('dates', $dates);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function insBalasComments($data) {
        date_default_timezone_set("Asia/Jakarta");
        $dates = date('H:i d M Y');
        $query = "INSERT INTO posting_me VALUES('',:tokenkeyid,:status,:roles,:rolessatu,:dates,:datesdua,:tokenkeystatus)";

        $this->db->query($query);

        $this->db->bind('tokenkeyid', $data['tokenkey-session']."_posting_");
        $this->db->bind('status', base64_encode($data['comments']."_replace_".$data['post-id']."_display_balas-comments"));
        $this->db->bind('roles', 'Publics');
        $this->db->bind('rolessatu', "balas-comments");
        $this->db->bind('dates', $dates);
        $this->db->bind('datesdua', $dates);
        $this->db->bind('tokenkeystatus', date("Hisdmy"));

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahFotoSampul($data)
    {
        $query = "UPDATE users_yu SET
                    foto_sampul = :foto_sampul
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";
        
        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('foto_sampul', $data['foto_sampul']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahFotoProfiles($data)
    {
        $query = "UPDATE users_yu SET
                    foto_profile = :foto_profile
                  WHERE nama_pengguna = :nama_pengguna AND tokenkey=:tokenkey";
        
        $this->db->query($query);
        $this->db->bind('nama_pengguna', $data['nama_pengguna']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        $this->db->bind('foto_profile', $data['foto_profile']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getPlaceByNamap($data){
        $this->db->query('SELECT * FROM ' . $this->usertable . ' WHERE nama_pengguna=:nama_pengguna AND tokenkey=:tokenkey');

        $this->db->bind('nama_pengguna', $data['namap']);
        $this->db->bind('tokenkey', $data['tokenkey-session']);
        return $this->db->single();
    }
}