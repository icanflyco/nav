<?php

error_reporting(0);
if ($data['mobile'] == "Is Mobile") {
    $data['form-data-user'] = $this->model('ModelsHome')->getAksesByToken($_SESSION['access_tokenkey']);
    ?>
    <!--- Navbar Top --->
    <nav class="navbar navbar-expand fixed-top top-0 max mx-auto  bg-white py-2  yu-border-y-1">
        <!--- Flex container --->
        <div class="container-fluid d-flex flex-column flex-md-row flex-lg-row">
            <!--- Flex Display Column Search --->
            <div class="col-12 d-none d-lg-block d-md-none col-md-3 col-lg-3">
                <a href="#" class="text-decoration-none text-dark d-flex">
                    <input type="text" class="form-control w-100 rounded-pill yu-mr-1" placeholder="Search .." />
                </a>
            </div>
            <!--- End Flex Display Column Search --->
            <!--- Flex Display Logo --->
            <div class="col-12 col-lg-6 col-md-6 text-center justify-content-center text-md-start text-lg-center justify-content-lg-center">
                <a href="<?php echo BASEURL; ?>home" class="start-logo">
                    <img onerror="this.src='<?php echo BASEURL; ?>foto/default/branded.png'" src="<?php echo BASEURL; ?>foto/default/branded.png" alt="" class="yu-logov yu-cover" />
                </a>
            </div>
            <!--- Flex Display Logo --->
            <!--- Flex Display Menu --->
            <div class="col-12 col-lg-3 col-md-6 yu-pos-fix text-lg-end justify-content-lg-end">
                <div class="d-flex text-md-end justify-content-md-end flex-row">
                    <div class="col-2 col-lg-1 col-md-1 mx-12 d-block d-md-none d-lg-none">
                        <a class="text-dark text-decoration-none position-relative" href="<?php echo BASEURL; ?>home"><i
                            class="bi-house-fill fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle">
                            </span>
                        </a>
                    </div>
                    <div class="col-2 col-lg-1 col-md-1 mx-12 d-none d-md-block d-lg-block">
                        <a class="text-dark text-decoration-none" href="<?php echo BASEURL; ?>home/posted"><i class="bi-plus-circle fs-5"></i></a>
                    </div>
                    <div class="col-2 d-block d-lg-none d-md-none col-lg-1 col-md-1 mx-12">
                        <a class="text-dark text-decoration-none" href="<?php echo BASEURL; ?>search"><i class="bi-search fs-5"></i></a>
                    </div>
                    <div class="col-2 d-none d-lg-block d-md-block col-lg-1 col-md-1 mx-12">
                        <a class="text-dark text-decoration-none position-relative" href="<?php echo BASEURL; ?>story"><i
                            class="bi-play-circle fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle">
                            </span></a>
                    </div>
                    <div class="col-2 col-lg-1 col-md-1 mx-12 d-block d-md-none d-lg-none">
                        <a class="text-dark text-decoration-none" href="<?php echo BASEURL; ?>home/posted"><i class="bi-plus-circle fs-5"></i></a>
                    </div>

                    <div class="col-2 d-none d-lg-block d-md-block col-lg-1 col-md-1 mx-12">
                        <a class="text-dark text-decoration-none position-relative" href="<?php echo BASEURL; ?>reading"><i class="bi-pen fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle">
                            </span>
                        </a>
                    </div>
                    <div class="col-2 col-lg-1 col-md-1 mx-12">
                        <a class="text-dark text-decoration-none position-relative" href="<?php echo BASEURL; ?>chat"><i
                            class="bi-chat-square fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle">
                            </span></a>
                    </div>
                    <div class="col-2 col-lg-1 col-md-1 mx-12">
                        <a class="text-dark text-decoration-none position-relative" href="<?php echo BASEURL; ?>notifications"><i
                            class="bi-bell fs-5"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle">
                            </span>
                        </a>
                    </div>
                    <div class="col-2 col-lg-1 col-md-1 text-center mx-lg-2 mx-md-2">
                        <style>
                            .yu-foto-das-profiles {
                                width: 30px;
                                height: 30px;
                                border: 1.5px solid #000;
                            }
                        </style>
                        <a class="text-dark text-decoration-none" href="<?php echo BASEURL; ?>menus"><img onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data-user']['foto_profile']; ?>"  class="rounded-circle yu-foto-das-profiles yu-cover" /></a>
                    </div>
                </div>
            </div>
            <!---End Flex Display Menu --->
        </div>
        <!--- End Flex container --->
    </nav>
    <!--- End Navbar Top --->
    <?php
} else {
    header("Location: home");
} ?>