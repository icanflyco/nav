<?php
class Verify extends Controller {
    public function index() {
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Sir or Mis!";
        $this->view('header/Header', $data);
        $this->view('main/verify-htm', $data);
        $this->view('footer/Footer', $data);
    }
    public function info() {
        echo "Account Not Verification: Check Your Email!";
    }
    public function p($id) {
        $explodes = explode("_emails_", $id);
        $data['surels'] = base64_decode($explodes[1]);
        if ($this->model("ModelsVerify")->progressDaftar($data) > 0) {
            $_SESSION['alert'] = "<div class='p-2 bg-success text-white fw-bold text-center'>Verification Success!</div>";
            header("Location: ".BASEURL."masuk");
            exit;
        }
     else {
        header("Location: ".BASEURL."home");
    }
}
}