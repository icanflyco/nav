<?php
error_reporting(0);
class Menus extends Controller {
    public function index() {
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "How Menus working?";
        #Router
        $this->view("header/Header", $data);
        $this->view("menu/index", $data);
        $this->view("footer/Footer", $data);
    }
}