<?php
error_reporting(0);
class Logout extends Controller {
    public function index(){
        $this->view('main/logout');
    }
}