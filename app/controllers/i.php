<?php
error_reporting(0);
class I extends Controller {
    public function index($id) {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Sir and Mis!";
        #Fetch
        $data['post-image'] = $this->model("ModelsHome")->getPostsById($id);
        $tokenkey = $data['post-image']['tokenkey_id'];
        $explodes = explode("_posting_", $tokenkey);
        $data['user-data'] = $this->model("ModelsHome")->getAksesByToken($explodes[0]);
        $datai['post-id'] = $id;
        $data['count-image'] = $this->model("ModelsPosts")->getCountPostsImage($datai);
        #Router
        $this->view('header/Header', $data);
        $this->view('main/post-image', $data);
        $this->view('footer/Footer', $data);
    }
    public function sendingdata($id) {
        #Fetch
        $data['post-image'] = $this->model("ModelsHome")->getPostsById($id);
        $tokenkey = $data['post-image']['tokenkey_id'];
        $explodes = explode("_posting_", $tokenkey);
        $data['user-data'] = $this->model("ModelsHome")->getAksesByToken($explodes[0]);
        $data['idposts-me'] = $id;
        $data['access'] = $explodes[0];
        if ($this->model("ModelsPosts")->insPosts($data) > 0) {
            header("Location: ".BASEURL."i/".$id);
        }
    }
}