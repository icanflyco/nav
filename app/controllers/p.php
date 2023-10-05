<?php
error_reporting(0);
class P extends Controller
{
    public function index($id)
    {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $id;
        $data['form-user-data'] = $this->model('ModelsHome')->getByNamap($id);
        $data['form-data-post'] = $this->model('ModelsHome')->getAllData2Status();
        $datai['tokenkey'] = $data['form-user-data']['tokenkey'];
        $data['count-followers'] = $this->model('ModelsProfiles')->getTabposts($datai);
        $data['count-followed'] = $this->model('ModelsProfiles')->getTab2posts($datai);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("profiles/index", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function processLoves($id)
    {
        $data['data-id'] = $id;
        $data['access'] = $_SESSION['access_tokenkey'];
        $data['form-data-insloves'] = $this->model('ModelsHome')->createLoves($data);
        $data['form-post-data'] = $this->model('ModelsHome')->getPostsById($id);
        $explode = explode("_posting_", $data['form-post-data']['tokenkey_id']);
        $data['form-user-data'] = $this->model('ModelsHome')->getAksesByToken($explode[0]);

        $data['hal'] = "p/" . $data['form-user-data']['nama_pengguna'];
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
    public function processUnloves($id)
    {
        $data['data-id'] = $id;
        $data['access'] = $_SESSION['access_tokenkey'];
        $data['form-data-insloves'] = $this->model('ModelsHome')->deleteLoves($data);
        $data['form-post-data'] = $this->model('ModelsHome')->getPostsById($id);
        $explode = explode("_posting_", $data['form-post-data']['tokenkey_id']);
        $data['form-user-data'] = $this->model('ModelsHome')->getAksesByToken($explode[0]);

        $data['hal'] = "p/" . $data['form-user-data']['nama_pengguna'];
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

    public function processUnreposts($id)
    {
        $dataii['data-id'] = $id;
        $data['form-data-repost'] = $this->model('ModelsHome')->getPostsById($id);
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
        $slia = $spas . "_eid_" . $dataii['nama_p'] . "_iid_" . $id;

        $dataii['tokenkey-status'] = $slia;

        if ($this->model('ModelsPosts')->deleteRestatus($dataii) > 0 && $this->model('ModelsPosts')->deleteRepost($dataii) > 0) {
            header("Location: " . BASEURL . "p/" . $data['form-user-data']['nama_pengguna'] . "#Lovesid_" . $id);
        } elseif ($this->model('ModelsPosts')->deleteRestatus($dataii) > 0 || $this->model('ModelsPosts')->deleteRepost($dataii) > 0) {
            header("Location: " . BASEURL . "p/" . $data['form-user-data']['nama_pengguna'] . "#Lovesid_" . $id);
        } else {
            header("Location: " . BASEURL . "p/" . $data['form-user-data']['nama_pengguna'] . "#Lovesid_" . $id);
        }
    }
    public function processRepost($id)
    {
        $data['data-form-post'] = $this->model('ModelsHome')->getPostsById($id);
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
        $tokenstatus = $exps . "_eid_" . $datai['nama_p'] . "_iid_" . $id;
        $datai['tokenkey-status'] = $tokenstatus;
        $data['hal'] = "p/" . $datai['nama_p'];
        if ($this->model('ModelsHome')->repStatus($datai) > 0 && $this->model('ModelsHome')->createRepost($datai) > 0) {
            Conditions::rload($id, $data['hal']);
        }
    }
    public function changeSampul($id)
    {
        $explodes = explode("_change_", $id);
        $data['tokenkey-session'] = $explodes[0];
        $data['nama_pengguna'] = $explodes[1];
        $x = $_POST['x'];
        $foto = $_FILES['fotoSampul']['tmp_name'];
        $foto_name = $_FILES['fotoSampul']['name'];
        $acak = rand(1, 99999);
        $tujuan_foto = md5($acak . $foto_name);
        $tempat_foto = 'foto/sampul/' . $tujuan_foto;


        if (!$foto == "") {
            $buat_foto = $tujuan_foto;
            copy($foto, $tempat_foto);
        } else {
            $buat_foto = $x;
        }
        $data['foto_sampul'] = $buat_foto;
        if (strlen($buat_foto) == 0) {
            header("Location: " . BASEURL . "p/" . $explodes[1]);
        } else {
            if ($this->model("ModelsPosts")->ubahFotoSampul($data) > 0) {
                header("Location: " . BASEURL . "p/" . $explodes[1]);
            } else {
                header("Location: " . BASEURL . "p/" . $explodes[1]);
            }
        }
    }
    public function changeProfiles($id)
    {
        $explodes = explode("_changepro_", $id);
        $data['tokenkey-session'] = $explodes[0];
        $data['nama_pengguna'] = $explodes[1];
        $x = $_POST['x'];
        $foto = $_FILES['fotoProfiles']['tmp_name'];
        $foto_name = $_FILES['fotoProfiles']['name'];
        $acak = rand(1, 99999);
        $tujuan_foto = $explodes[1] . "_take_" . md5($acak . $foto_name);
        $tempat_foto = 'foto/profiles/' . $tujuan_foto;


        if (!$foto == "") {
            $buat_foto = $tujuan_foto;
            copy($foto, $tempat_foto);
        } else {
            $buat_foto = $x;
        }
        $data['foto_profile'] = $buat_foto;
        if (strlen($buat_foto) == 0) {
            header("Location: " . BASEURL . "p/" . $explodes[1]);
        } else {
            if ($this->model("ModelsPosts")->ubahFotoProfiles($data) > 0) {
                header("Location: " . BASEURL . "p/" . $explodes[1]);
            } else {
                header("Location: " . BASEURL . "p/" . $explodes[1]);
            }
        }
    }
    public function id($id)
    {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Edit your Profile in Yunme!";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "YID") {
            $exp2lodes = explode("_editing_", $session);
            $tokenkey = $exp2lodes[0];
            $namap = $exp2lodes[1];
        } else {
            header("Location: " . BASEURL . "home");
        }
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-profiles", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function processFollow($id)
    {
        $entry = base64_decode($id);
        $explodes = explode("_follow_", $entry);

        $data['data-id'] = $explodes[0];

        $data['access'] = $_SESSION['access_tokenkey'];
        $data['form-data-ofollow'] = $this->model('ModelsProfiles')->createFollow($data);

        $data['hal'] = "p/" . $explodes[1];
        if ($data['form-data-ofollow']) {
            $output = array(
                "success" => 1
            );
            echo json_encode($output);
            if ($output) {
                Conditions::rload($id, $data['hal']);
            }
        }
    }
    public function processUnFollow($id)
    {
        $entry = base64_decode($id);
        $explodes = explode("_follow_", $entry);
        $data['data-id'] = $explodes[0];
        $data['access'] = $_SESSION['access_tokenkey'];
        $data['form-data-followed'] = $this->model('ModelsProfiles')->deleteFollow($data);

        $data['hal'] = "p/" . $explodes[1];
        if ($data['form-data-followed']) {
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
