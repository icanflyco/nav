<?php

class Sessionstr{
    public static function esession(){
        if(!$_SESSION['access_tokenkey']){
            header("Location: ".BASEURL."masuk");
        }
    }
    public static function logsession(){
        if($_SESSION['access_tokenkey']){
            header("Location: ".BASEURL."home");
        }
    }
}