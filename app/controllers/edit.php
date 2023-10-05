<?php

class Edit extends Controller {
    public function index($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "NAMEBASE") {
            $exp2lodes = explode("_e_nama_", $session);
            $tokenkey = $exp2lodes[1];
            if ($tokenkey == $_SESSION['access_tokenkey']) {
                $tokenkeySession = $exp2lodes[1];
                $namap = $exp2lodes[0];
            } else {
                header("Location: ".BASEURL."home");
            }
        } else {
            header("Location: ".BASEURL."home");
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkeySession;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-name", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function yuname($id) {
        $explodes = explode("_back_", $id);
        if ($explodes[1] == $_SESSION['access_tokenkey']) {
            $tokenkey = $explodes[1];
            $namap = $explodes[0];
            $namad = $_POST['namad'];
        } else {
            header("Location: ".BASEURL."home");
        }
        if (preg_match("/([a-zA-Z0-9]+)/", $namad)) {
            if (preg_match("/([@%\^=|~∆¶×÷π√•_|£¢€¥°%©®™✓{}$#\*]+)/", $namad)) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
                header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
                die();
            } else {
                $data['namad'] = $namad;
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
            header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
            die();
        }

        $datai['nama_pengguna'] = $namap;
        $datai['tokenkey-session'] = $tokenkey;
        $datai['nama_belakang'] = $data['namad'];
        if (strlen($namad) > 0) {
            if ($this->model("ModelsEdit")->changeName($datai) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Names is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
                die();
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
                header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
            header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
            die();
        }
    }
    public function u($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] = "DROPID") {
            $exp2lodes = explode("_uses_", $session);
            $tokenkey = $exp2lodes[1];
            if ($tokenkey == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
                header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Names is Failed!</div>";
            header("Location: ".BASEURL."edit/NAMEBASE-".base64_encode($namap."_e_nama_".$tokenkey));
            die();
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-username", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function un($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] = "ID") {
            $exp2lodes = explode("_use_", $session);
            $tokenkey = $exp2lodes[1];
            if ($tokenkey == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Usernames is Failed!</div>";
                header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Usernames is Failed!</div>";
            header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
            die();
        }
        $namape = $_POST['usern'];
        if (preg_match("/([a-zA-Z0-9]+)/", $namape)) {
            if (preg_match("/([@%\^=|~∆¶×÷π√•|£¢€¥°%©®™✓{}$#\*]+)/", $namape)) {
                session_start();
                $_SESSION['alert-group-input'] = "style='border-danger border border-1'";
                $_SESSION['alert-group-text'] = "<div class='text-danger text-start yu-fs-sm-1 my-2'>Usernames is Used!</div>";
                header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
                die();
            } else {
                $data['namape'] = $namape;
            }
        } else {
            session_start();
            $_SESSION['alert-group-input'] = "style='border-danger border border-1'";
            $_SESSION['alert-group-text'] = "<div class='text-danger text-start yu-fs-sm-1 my-2'>Usernames is Used!</div>";
            header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
            die();
        }
        $datai['nama_pengguna'] = $namap;
        $datai['tokenkey-session'] = $tokenkey;
        $datai['namap'] = $data['namape'];
        $datau['namap'] = $data['namape'];
        #Fetch
        $data['form-users'] = $this->model('ModelsEdit')->getPlaceBy2Namap($datau);
        if ($data['form-users']['nama_pengguna'] == $_POST['usern']) {
            session_start();
            $_SESSION['alert-group-input'] = "border-danger border border-1";
            $_SESSION['alert-group-text'] = "<div class='text-danger text-start yu-fs-sm-1 my-2'>Usernames is Used!</div>";
            header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
            die();

        } else if (strlen($_POST['usern']) > 0) {
            if (strlen($_POST['usern']) > 6) {
                if ($this->model("ModelsEdit")->changeUname($datai) > 0) {
                    session_start();
                    $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Usernames is Success!</div>";
                    header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$datai['namap']));
                    die();
                } else {
                    session_start();
                    $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Usernames is Failed!</div>";
                    header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
                    die();
                }
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Usernames is Failed!</div>";
                header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Usernames is Failed!</div>";
            header("Location: ".BASEURL."edit/u/DROPID-".base64_encode($namap."_uses_".$tokenkey));
            die();
        }
    }
    public function uri($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "URI") {
            $exp2lodes = explode("_urios_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-alamat", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function al($id) {
        $uris = $_POST['alamat'];
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "LA") {
            $exp2lodes = explode("_use_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['urilink'] = $uris;
            }
        }
        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['uris'] = $data['urilink'];

        $datai['namap'] = $namap;
        $datai['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($datai);
        if (strlen($data['urilink']) > 0) {
            if ($this->model("ModelsEdit")->changeUri($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Usernames is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
                die();
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Web Address is Failed!</div>";
                header("Location: ".BASEURL."edit/uri/URI-".base64_encode($namap."_urios_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Web Address is Failed!</div>";
            header("Location: ".BASEURL."edit/uri/URI-".base64_encode($namap."_urios_".$tokenkey));
            die();
        }
    }
    public function no($id) {

        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "NUM") {
            $exp2lodes = explode("_notelp_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $tokenkey = $exp2lodes[1];
                $namap = $exp2lodes[0];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-notel", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function numb($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "NUM") {
            $exp2lodes = explode("_easly_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $tokenkey = $exp2lodes[1];
                $namap = $exp2lodes[0];
                $data['notelp'] = $_POST['notelp'];
            }
        }
        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['notelpon'] = $data['notelp'];

        if (strlen($data['notelp']) > 0) {
            if ($this->model("ModelsEdit")->changeNotelp($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Number Phone is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
                die();
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Number Phone is Failed!</div>";
                header("Location: ".BASEURL."edit/no/NUM-".base64_encode($namap."_notelp__".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Number Phone is Failed!</div>";
            header("Location: ".BASEURL."edit/no/NUM-".base64_encode($namap."_notelp__".$tokenkey));
            die();
        }
    }
    public function bio($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "BIO") {
            $exp2lodes = explode("_texts_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-bio", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function bi($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "BIO") {
            $exp2lodes = explode("_texts_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['bio'] = $_POST['bio'];
            }
        }

        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['bio'] = $data['bio'];
        if (strlen($data['bio']) > 0) {
            if (strlen($data['bio']) > 97) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Bio is Failed!</div>";
                header("Location: ".BASEURL."edit/bio/BIO-".base64_encode($namap."_texts_".$tokenkey));
                die();
            } else {
                if ($this->model("ModelsEdit")->changeBio($datau) > 0) {
                    session_start();
                    $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Bio is Success!</div>";
                    header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
                    die();
                } else {
                    session_start();
                    $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Bio is Failed!</div>";
                    header("Location: ".BASEURL."edit/bio/BIO-".base64_encode($namap."_texts_".$tokenkey));
                    die();
                }
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Bio is Failed!</div>";
            header("Location: ".BASEURL."edit/bio/BIO-".base64_encode($namap."_texts_".$tokenkey));
            die();
        }
    }
    public function gender($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "GEN") {
            $exp2lodes = explode("_gender_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-gender", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function gen($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "GEN") {
            $exp2lodes = explode("_gender_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['gender'] = $_POST['gender'];
            }
        }

        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['gender'] = $data['gender'];
        if (strlen($data['gender']) > 0) {
            if ($this->model("ModelsEdit")->changeGander($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Gender is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Gender is Failed!</div>";
                header("Location: ".BASEURL."edit/gender/GEN-".base64_encode($namap."_gender_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Gender is Failed!</div>";
            header("Location: ".BASEURL."edit/gender/GEN-".base64_encode($namap."_gender_".$tokenkey));
            die();
        }
    }
    public function zippy($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "ID") {
            $exp2lodes = explode("_country_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-negara", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function address($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "ID") {
            $exp2lodes = explode("_country_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['city'] = $_POST['city'];
                $data['address'] = $_POST['address'];
                $data['zip'] = $_POST['zip'];
                $data['country'] = $_POST['country'];
            }
        }
        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['negara'] = $data['city']."_CITY_".$data['address']."_ADDRESS_".$data['zip']."_ZIP_".$data['country'];
        if (strlen($data['city']) > 0 && strlen($data['address']) > 0 && strlen($data['zip']) > 0 && strlen($data['country']) > 0) {
            if ($this->model("ModelsEdit")->changeNegara($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Address is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Address is Failed!</div>";
                header("Location: ".BASEURL."edit/zippy/ID-".base64_encode($namap."_country_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Address is Failed!</div>";
            header("Location: ".BASEURL."edit/zippy/ID-".base64_encode($namap."_country_".$tokenkey));
            die();
        }
    }
    public function work($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "ID") {
            $exp2lodes = explode("_perusahaan_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-pekerjaan", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function per($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "ID") {
            $exp2lodes = explode("_pekerjaan_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['pekerjaan'] = $_POST['work'];
                $data['perusahaan'] = $_POST['peru'];
            }
        }
        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['working'] = $data['pekerjaan']."_PERU_".$data['perusahaan'];

        if (strlen($data['pekerjaan']) > 0 && strlen($data['perusahaan']) > 0) {
            if ($this->model("ModelsEdit")->changeWork($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Worked is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Worked is Failed!</div>";
                header("Location: ".BASEURL."edit/work/ID-".base64_encode($namap."_perusahaan_".$tokenkey));
                die();
            }
        } else {
            session_start();
            $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Worked is Failed!</div>";
            header("Location: ".BASEURL."edit/work/ID-".base64_encode($namap."_perusahaan_".$tokenkey));
            die();
        }
    }
    public function lahir($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "LHR") {
            $exp2lodes = explode("_tanggal_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
            }
        }
        #Root
        Sessionstr::esession();
        $data['mobile'] = "Is Mobile";
        $data['judul'] = "Hello Your Profiles in Yunme";
        $data['css-m-top'] = "mt-5 pt-2 pt-lg-2 pt-md-1";
        #Fecth
        $data['namap'] = $namap;
        $data['tokenkey-session'] = $tokenkey;
        $data['form-profiles'] = $this->model('ModelsPosts')->getPlaceByNamap($data);
        #Router
        $this->view("header/Header", $data);
        $this->view("navbar/NavbarHome", $data);
        $this->view('sidebar/LeftSidebar', $data);
        $this->view("editing/edit-brithday", $data);
        $this->view('sidebar/RightSidebar', $data);
        $this->view("footer/Footer", $data);
    }
    public function tgl($id) {
        $explodes = explode("-", $id);
        $session = base64_decode($explodes[1]);
        if ($explodes[0] == "TGL") {
            $exp2lodes = explode("_tanggal_", $session);
            if ($exp2lodes[1] == $_SESSION['access_tokenkey']) {
                $namap = $exp2lodes[0];
                $tokenkey = $exp2lodes[1];
                $data['lahir'] = $_POST['lhr'];
            }
        }
        $datau['nama_pengguna'] = $namap;
        $datau['tokenkey-session'] = $tokenkey;
        $datau['lahir'] = $data['lahir'];

        if (strlen($data['lahir']) > 0) {
            if ($this->model("ModelsEdit")->changeLahir($datau) > 0) {
                session_start();
                $_SESSION['alert'] = "<div class='bg-success p-2 fw-bold text-white text-center'>Change Your Brithday is Success!</div>";
                header("Location: ".BASEURL."p/id/YID-".base64_encode($tokenkey."_editing_".$namap));
            } else {
                session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Brithday is Failed!</div>";
                header("Location: ".BASEURL."edit/lahir/LHR-".base64_encode($namap."_tanggal_".$tokenkey));
                die();
            }
        } else {
            session_start();
                $_SESSION['alert'] = "<div class='bg-danger p-2 fw-bold text-white text-center'>Change Your Brithday is Failed!</div>";
                header("Location: ".BASEURL."edit/lahir/LHR-".base64_encode($namap."_tanggal_".$tokenkey));
                die();
        }
    }
}