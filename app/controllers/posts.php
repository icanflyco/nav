<?php
error_reporting(0);

class Posts extends Controller {
    public function index($id) {

        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Posts on Yunme @".$data['user-data']['nama_belakang'];
        $data['css-m-top'] = "";
        #Fetch
        $data['post-status'] = $this->model("ModelsHome")->getPostsById($id);

        $token = $data['post-status']['tokenkey_id'];
        $tokenkey = explode("_posting_", $token);
        $data['user-data'] = $this->model("ModelsPosts")->getUsersByTokens($tokenkey[0]);
        $data['user-data2'] = $this->model("ModelsPosts")->getUsersByTokens($tokenkey[1]);
        #End State
        $data['post-id'] = $id;
        $data['count-image'] = $this->model("ModelsPosts")->getCountPostsImage($data);
        $data['tokenkey'] = $_SESSION['access_tokenkey'];
        $data['user-data-session'] = $this->model("ModelsPosts")->getUsersByTokens($data['tokenkey']);
        $datai['post-id'] = $id;
        $data['form-data-iloves'] = $this->model('ModelsHome')->getAksesLoves($data);
        $data['form-data-irepost'] = $this->model('ModelsHome')->getAksesRepost($data);
        $data['form-data-icount'] = $this->model('ModelsHome')->countLoves($datai);
        $data['form-data-rcount'] = $this->model('ModelsHome')->countRepost($datai);
        $data['form-data-comcount'] = $this->model('ModelsHome')->countCommentsy($datai);
        #Comments
        $data['idposts-start'] = $data['post-status']['idposts'];
        $data['post-comments'] = $this->model("ModelsPosts")->getPostsComments();

        #Router
        $this->view('header/Header', $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view('main/post-status', $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view('footer/Footer', $data);
    }
    public function read($id) {
        Sessionstr::esession();
        #Fetch
        $data['post-image'] = $this->model("ModelsHome")->getPostsById($id);
        $tokenkey = $data['post-image']['tokenkey_id'];
        $explodes = explode("_posting_", $tokenkey);
        $data['user-data'] = $this->model("ModelsHome")->getAksesByToken($explodes[0]);
        $data['idposts-me'] = $id;
        $data['access'] = $explodes[0];
        if ($this->model("ModelsPosts")->insPosts($data) > 0) {
            header("Location: ".BASEURL."posts/".$id);
        }
    }
    public function processLoves($id) {
        Sessionstr::esession();
        $explodesas = explode("_uid_", $id);
        $datai['data-id'] = $explodesas[0];
        $datai['access'] = $_SESSION['access_tokenkey'];
        $data['data-id'] = $id;
        $data['access'] = $_SESSION['access_tokenkey'];
        if ($explodesas[1]) {

            $data['form-data-insloves'] = $this->model('ModelsHome')->createLoves($datai);
            $data['hal'] = "posts/".$explodesas[1];
            if ($data['form-data-insloves']) {
                $output = array(
                    "success" => 1
                );
                echo json_encode($output);
                if ($output) {
                    Conditions::rload($explodesas[1], $data['hal']);
                }
            }
        } else {
            $data['form-data-insloves'] = $this->model('ModelsHome')->createLoves($data);
            $data['hal'] = "posts/".$id;
            if ($data['form-data-insloves']) {
                $output = array(
                    "success" => 1
                );
                echo json_encode($output);
                if ($output) {
                    Conditions::rload($id, $data['hal']);
                }
            }
        }
    }
    public function processUnloves($id) {
        Sessionstr::esession();
        $explodesas = explode("_uid_", $id);
        $datai['data-id'] = $explodesas[0];
        $datai['access'] = $_SESSION['access_tokenkey'];
        $data['data-id'] = $id;
        $data['access'] = $_SESSION['access_tokenkey'];
        if ($explodesas[1]) {
            $data['form-data-insloves'] = $this->model('ModelsHome')->deleteLoves($datai);
            $data['hal'] = "posts/".$explodesas[1];
            if ($data['form-data-insloves']) {
                $output = array(
                    "success" => 1
                );
                echo json_encode($output);
                if ($output) {
                    Conditions::rload($explodesas[1], $data['hal']);
                }
            }
        } else {
            $data['form-data-insloves'] = $this->model('ModelsHome')->deleteLoves($data);
            $data['hal'] = "posts/".$id;
            if ($data['form-data-insloves']) {
                $output = array(
                    "success" => 1
                );
                echo json_encode($output);
                if ($output) {
                    Conditions::rload($id, $data['hal']);
                }
            }
        }
    }
    public function processUnreposts($id) {
        Sessionstr::esession();
        $explodesas = explode("_uid_", $id);
        if ($explodesas[1]) {
            $dataii['data-id'] = $explodesas[0];
            $data['form-data-repost'] = $this->model('ModelsHome')->getPostsById($explodesas[0]);
        } else {
            $dataii['data-id'] = $id;
            $data['form-data-repost'] = $this->model('ModelsHome')->getPostsById($id);
        }
        $dataii['access'] = $_SESSION['access_tokenkey'];
        $data['form-user-data'] = $this->model('ModelsHome')->getAksesByToken($_SESSION['access_tokenkey']);
        $dataii['nama_p'] = $data['form-user-data']['nama_pengguna'];
        $tokenstas = $data['form-data-repost']['tokenkey_status'];
        $exp = explode("_eid_", $tokenstas);
        if (strlen($tokenstas) == 12) {
            $spas = $tokenstas;
        } else {
            $spas = $exp[0];
        }
        if ($explodesas[1]) {
            $slia = $spas."_eid_".$dataii['nama_p']."_iid_".$explodesas[0];
            $data['hal'] = "posts/".$explodesas[1];
        } else {
            $slia = $spas."_eid_".$dataii['nama_p']."_iid_".$id;
            $data['hal'] = "posts/".$id;
        }

        $dataii['tokenkey-status'] = $slia;

        if ($this->model('ModelsPosts')->deleteRestatus($dataii) > 0 && $this->model('ModelsPosts')->deleteRepost($dataii) > 0) {
            header("Location: ".BASEURL."".$data['hal']);
        } elseif ($this->model('ModelsPosts')->deleteRestatus($dataii) > 0 || $this->model('ModelsPosts')->deleteRepost($dataii) > 0) {
            header("Location: ".BASEURL."".$data['hal']);
        } else {
            header("Location: ".BASEURL."".$data['hal']);
        }
    }
    public function processRepost($id) {
        Sessionstr::esession();
        $explodesas = explode("_uid_", $id);
        if ($explodesas[1]) {
            $data['data-form-post'] = $this->model('ModelsHome')->getPostsById($explodesas[0]);
            $data['hal'] = "posts/".$explodesas[1];
        } else {
            $data['data-form-post'] = $this->model('ModelsHome')->getPostsById($id);
            $data['hal'] = "posts/".$id;
        }
        $datai['post-id'] = $data['data-form-post']['idposts'];
        $datai['tokenkey-id'] = $data['data-form-post']['tokenkey_id'];
        $datai['status'] = $data['data-form-post']['status'];
        $datai['global'] = $data['data-form-post']['roles'];
        $datai['tokenkey-session'] = $_SESSION['access_tokenkey'];
        $data['form-user-data'] = $this->model('ModelsHome')->getAksesByToken($datai['tokenkey-session']);

        $datai['nama_p'] = $data['form-user-data']['nama_pengguna'];

        $tokenstas = $data['data-form-post']['tokenkey_status'];
        $exp = explode("_eid_", $tokenstas);
        if (strlen($tokenstas) == 12) {
            $exps = $tokenstas;
        } else {
            $exps = $exp[0];
        }
        if($explodesas[1]){
            $tokenstatus = $exps."_eid_".$datai['nama_p']."_iid_".$explodesas[0];
        }else{
            $tokenstatus = $exps."_eid_".$datai['nama_p']."_iid_".$id;
        }
        $datai['tokenkey-status'] = $tokenstatus;
        if ($this->model('ModelsHome')->repStatus($datai) > 0 && $this->model('ModelsHome')->createRepost($datai) > 0) {
            Conditions::rload($id, $data['hal']);
        }
    }
    public function processComments($id) {
        Sessionstr::esession();
        $data = $_POST;
        $data['tokenkey-session'] = $_SESSION['access_tokenkey'];
        $data['post-id'] = $id;
        if (strlen($_POST['comments']) == 0) {
            header("Location: ".BASEURL."posts/".$id);
        } else {
            if ($this->model("ModelsPosts")->insComments($data) > 0 && $this->model('ModelsPosts')->createComments($data) > 0) {
                header("Location: ".BASEURL."posts/".$id);
            }
        }
    }

    public function processBalasComments($id) {
        Sessionstr::esession();
        $data = $_POST;
        $data['tokenkey-session'] = $_SESSION['access_tokenkey'];
        $data['post-id'] = $id;
        if (strlen($_POST['comments']) == 0) {
            header("Location: ".BASEURL."posts/".$id);
        } else {
            if ($this->model("ModelsPosts")->insBalasComments($data) > 0 && $this->model('ModelsPosts')->create2Comments($data) > 0) {
                header("Location: ".BASEURL."posts/".$id);
            }
        }
    }
}