<?php
error_reporting(0);
class Daftar extends Controller {
    public function index() {
        Sessionstr::logsession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Make a Memories in Yunme Platform and Send a message to friendly you.";
        $this->view('header/Header', $data);
        $this->view('main/daftar', $data);
        $this->view('footer/Footer', $data);
    }
}