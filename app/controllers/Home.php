<?php
error_reporting(0);
class Home extends Controller
{
    public function index()
    {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Sir and Mis!";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fetch
        $data['form-data-post'] = $this->model('ModelsHome')->getAllDataStatus();
        $data['form-data-2post'] = $this->model('ModelsHome')->getAllData21Status();
        $data['form-data-user-tiga'] = $this->model('ModelsHome')->getAksesByToken($_SESSION['access_tokenkey']);
        $datais['tokenkey'] = $_SESSION['access_tokenkey'];
        $data['count-followed'] = $this->model('ModelsProfiles')->getTab2posts($datais);
        #comments
        $data['post-comments'] = $this->model("ModelsPosts")->getPostsComments2();
        #Router
        $this->view('header/Header', $data);
        $this->view('navbar/NavbarHome', $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view('main/index', $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view('footer/Footer', $data);
    }
    public function posted()
    {
        #Root
        Sessionstr::esession();
        #Fetch
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Make a Posts in Yunme, Starting for to write?";
        $data['form-data'] = $this->model('ModelsHome')->getAksesByToken($_SESSION['access_tokenkey']);
        #Router
        $this->view('header/Header', $data);
        $this->view('main/post', $data);
        $this->view('footer/Footer', $data);
    }
    public function processPosted()
    {
        $data = $_POST;
        $totalFiles = count($_FILES['img']['name']);
        $filesArray = array();

        for ($i = 0; $i < $totalFiles; $i++) {
            $imageName = md5(date("hisdmy") . "" . $_FILES["img"]["name"][$i]);
            $tmpName = $_FILES["img"]["tmp_name"][$i];

            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = uniqid() . '.' . $imageExtension;

            $tml = move_uploaded_file($tmpName, 'foto/status/' . $newImageName);
            $filesArray[] = $newImageName;
        }

        $filesArray = json_encode($filesArray);
        $data['array_image'] = $filesArray;
        $data['access'] = $_SESSION['access_tokenkey'];

        if ($this->model('ModelsHome')->insStatus($data) > 0) {
            header("Location: " . BASEURL . "home");
        }
    }
    public function processLoves($id)
    {
        $data['data-id'] = $id;
        $data['access'] = $_SESSION['access_tokenkey'];
        $data['form-data-insloves'] = $this->model('ModelsHome')->createLoves($data);
        $data['hal'] = "home";
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
        $data['hal'] = "home";
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
        $dataii['data-roles'] = $data['form-data-repost']['roles'];
        $explode = explode("_posting_", $data['form-data-repost']['tokenkey_id']);
        $data['form-user-data'] = $this->model('ModelsHome')->getAksesByToken($dataii['access']);
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
        if ($this->model('ModelsHome')->deleteRestatus($dataii) > 0 && $this->model('ModelsHome')->deleteRepost($dataii) > 0) {
            header("Location: " . BASEURL . "home#Lovesid_" . $id);
        } elseif ($this->model('ModelsHome')->deleteRestatus($dataii) > 0 || $this->model('ModelsHome')->deleteRepost($dataii) > 0) {
            header("Location: " . BASEURL . "home#Lovesid_" . $id);
        } else {
            header("Location: " . BASEURL . "home#Lovesid_" . $id);
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
        $data['hal'] = "home";
        if ($this->model('ModelsHome')->repStatus($datai) > 0 && $this->model('ModelsHome')->createRepost($datai) > 0) {
            Conditions::rload($id, $data['hal']);
        }
    }
    public function share($id)
    {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Share this a Posts - Share in Social Media";
        #Fetch
        $data['idposts'] = $id;
        #Router
        $this->view('header/Header', $data);
        $this->view('main/share', $data);
        $this->view('footer/Footer', $data);
    }
}
