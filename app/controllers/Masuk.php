<?php
error_reporting(0);
class Masuk extends Controller {
    public function index() {
        Sessionstr::logsession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Sir or Mis!";
        $this->view('header/Header', $data);
        $this->view('main/masuk', $data);
        $this->view('footer/Footer', $data);
    }
    public function processMasuk() {
        $data['surel'] = $_POST['surel'];
        $data['akses'] = $_POST['passw'];
        $data['form-data'] = $this->model('ModelsMasuk')->getSurelAkses($data);
        $cent = $data['form-data']['centang'];
        $verify = explode("_emails_", $cent);
        $veri2fy = base64_decode($verify[1]);
        if (strlen($data['surel']) > 0 && strlen($data['akses']) > 0) {
            if ($verify[0] && $verify[1] || $veri2fy[1] == $data['surel']) {
                header("Location: ".BASEURL."verify/info");
            } else {
                if ($data['form-data'] > 0) {
                    session_start(); $_SESSION['access_tokenkey'] = $data['form-data']['tokenkey'];
                    header("Location: ".BASEURL."home");
                    exit;
                } else {
                    Flasher::setFlash('Failed', 'to Login', 'danger');
                    header("Location: ".BASEURL."masuk");
                    exit;

                }
            }
        } else {
            Flasher::setFlash('Failed', 'to Login', 'danger');
            header("Location: ".BASEURL."masuk");
            exit;
        }
    }
}