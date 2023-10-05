<?php
error_reporting(0);
if ($data['mobile'] == "Is Mobile" && $data['form-data-user-tiga']['tokenkey'] == $_SESSION['access_tokenkey']) {
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
    ?>
    <style>
        .yu-comments-lines {
            border: 2px solid #f2f2f2;
            padding: 10px;
            border-radius: 16px;
            margin-bottom: 10px;
            margin-top: 0px;
            font-size: 14px;
        }

        .yu-profile-post-2 {
            width: 30px;
            height: 30px;
        }
    </style>
    <div class="col-12 col-lg-6 col-md-9 yu-border-xy yu-ovy-1">
        <?php
        foreach ($data['form-data-post'] as $posts) {
            #Explode 1
            $dataExplode = explode("_posting_", $posts['tokenkey_id']);

            #End Explode
            #Data Fetch 1 Users State
            $data['form-data-user'] = $this->model('ModelsHome')->getAksesByToken($dataExplode[0]);

            $data['form-data-user2'] = $this->model('ModelsHome')->getAksesByToken($dataExplode[1]);

            #End State
            $data['post-id'] = $posts['idposts'];
            $datai['post-id'] = $posts['idposts'];
            $data['tokenkey'] = $_SESSION['access_tokenkey'];

            $data['form-data-iloves'] = $this->model('ModelsHome')->getAksesLoves($data);
            $data['form-data-irepost'] = $this->model('ModelsHome')->getAksesRepost($data);
            $data['form-data-icount'] = $this->model('ModelsHome')->countLoves($datai);
            $data['form-data-rcount'] = $this->model('ModelsHome')->countRepost($datai);
            $data['form-data-comcount'] = $this->model('ModelsHome')->countCommentsy($datai);
            $dataplus['post-id'] = $posts['idposts'];

            $data['post-tokenkey'] = $data['form-data-user']['tokenkey'];
            $data['form-data-users-tab'] = $this->model('ModelsHome')->getAksesUsersSession($data);
            $data['count-imageu'] = $this->model("ModelsPosts")->getCountPostsImage($datai);
            if (!empty($data['tokenkey']) && $data['form-data-users-tab']['idposts'] || $data['tokenkey'] == $dataExplode[0]) {

                ?>
                <!---- Posted Image 1---->
                <div class="mt-1 mt-lg-2 mt-md-2 yu-border-y-1" id="Loves_<?php echo $posts['idposts']; ?>">
                    <div class="d-flex flex-row" data-bs-spy="scroll" data-bs-target="#Lovesid_<?php echo $posts['idposts']; ?>"
                        data-bs-offset="0" tabindex="0">
                        <div class="col-2 col-md-1 col-lg-1 position-relative" id="Lovesid_<?php echo $posts['idposts']; ?>"
                            style="z-index:3;">
                            <div class="p-2 h-100">
                                <div class="yu-pos-sticky-img_1 text-center">
                                    <img id="yu-sticky_1" onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"'
                                    src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data-user']['foto_profile'];

                                    ?>"
                                    alt="" class="yu-profile-post yu-cover rounded-circle" />
                                </div>
                            </div>
                        </div>
                        <div class="col-9 col-md-10 col-lg-10 px-md-2 position-relative">
                            <style>
                                .yu-lines {
                                    border-left: 2px solid #f2f2f2;
                                    height: 95%;
                                    position: absolute;
                                    bottom: 0;
                                    left: -30.5px;
                                    z-index: -0;
                                }

                                #error-s {
                                    display: block;
                                }
                            </style>
                            <div class="yu-lines"></div>
                            <h2 class="m-0 h6 pt-2 fw-bold position-relative">
                                <?php echo ucwords(strtolower($data['form-data-user']['nama_belakang'])); ?>
                                <?php Conditions::centang($data['form-data-user']['centang']); ?></h2>
                            <div class="text-dark position-relative">
                                <small class="yu-fs-md-0"><span style='font-size:13px;'><a
                                    href="<?php echo BASEURL; ?>p/<?php echo $data['form-data-user']['nama_pengguna']; ?>"
                                    class="text-decoration-none text-secondary fw-bold">
                                    @<?php echo substr($data['form-data-user']['nama_pengguna'], 0, 12); ?>..</a>

                                    <style>
                                        .disay-ov {
                                            max-width: 768px;
                                            overflow-y: hidden;
                                            overflow-x: auto;
                                            display: flex;
                                            flex-direction: row;
                                            white-space: nowrap;
                                        }
                                    </style>
                                    <?php
                                    $display = ".disay-ov";
                                    ?>
                                    <?php Conditions::breakroles($posts['rolessatu'], $data['form-data-user2']['nama_pengguna']);
                                    ?>
                                </span><br />
                                    <span
                                        style="word-break:break-all"><?php

                                        Conditions::postStatus($posts['status'], $display, $posts['idposts']); ?>
                                    </span></small>
                                <?php
                                if ($posts['rolessatu'] == "comments" || $posts['rolessatu'] == "balas-comments") {
                                    ?>

                                    <div class="yu-comments-lines">
                                        <?php
                                        foreach ($data['post-comments'] as $comments) {
                                            $status = base64_decode($comments['status']);
                                            $explos = explode("_replace_", $status);
                                            $semi = explode("_display_", $explos[1]);
                                            $idposts = $semi[0];
                                            if ($comments['rolessatu'] == "comments" && $comments['idposts'] == $posts['idposts'] || $comments['rolessatu'] == "balas-comments" && $comments['idposts'] == $posts['idposts']) {
                                                $datai = $this->model("ModelsHome")->getPostsById($idposts);

                                                $data['tokenkey-posts'] = $datai;
                                                $data2Explode = explode("_posting_", $data['tokenkey-posts']['tokenkey_id']);
                                                #End Explode
                                                #Data Fetch 1 Users State
                                                $data['form-data-user-dua'] = $this->model('ModelsHome')->getAksesByToken($data2Explode[0]);
                                                ?>
                                                <div class="d-flex position-relative">
                                                    <div class="col-2 col-md-1 col-lg-1">
                                                        <img id="yu-sticky_1"
                                                        onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"'
                                                        src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data-user-dua']['foto_profile']; ?>"
                                                        alt="" class="yu-profile-post-2 yu-cover rounded-circle" />
                                                    </div>
                                                    <div class="col-9 col-md-10 col-lg-10">
                                                        <b style="font-size:14px;"><?php echo substr(ucwords(strtolower($data['form-data-user-dua']['nama_belakang'])), 0, 18); ?>
                                                            <?php Conditions::centang($data['form-data-user-dua']['centang']); ?></b>
                                                        <small><a class="fw-bold text-secondary text-decoration-none"
                                                            href="<?php echo BASEURL; ?>p/<?php echo $data['form-data-user-dua']['nama_pengguna']; ?>">@<?php echo $data['form-data-user-dua']['nama_pengguna']; ?></a></small>
                                                        <div class="yu-status-comments">
                                                            <?php Conditions::postStatusComments($display, $semi[0], $datai); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <a class="text-secondary text-decoration-none"><i class="bi-share fs-5"></i></a>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } ?>
                                    </div>

                                    <?php


                                }

                                ?>
                            </div>
                            <div class="text-secondary postStatus">
                                <style>
                                    .yu-lines-3 {
                                        border-top: 2px solid #f2f2f2;
                                        width: 30px;
                                        position: absolute;
                                        margin-top: 11.5px;
                                        left: -30px;
                                        z-index: 0;
                                    }

                                    .yu-lines-4 {
                                        border-top: 2px solid #f2f2f2;
                                        width: 5px;
                                        position: absolute;
                                        margin-top: -11.5px;
                                        left: -5px;
                                        z-index: 0;
                                    }

                                    .yu-lines-5 {
                                        border-top: 2px solid #f2f2f2;
                                        width: 5px;
                                        position: absolute;
                                        margin-top: -11.5px;
                                        left: -0px;
                                        z-index: 0;
                                    }
                                </style>
                                <div class="yu-lines-3"></div>
                                <small class="yu-fs-sm-1"> <span class="py-1 fw-bold px-2 rounded-pill"
                                    style="border:2px solid #f2f2f2;"><?php echo $posts['dates']; ?></span> <span
                                    class="position-relative  py-1 fw-bold px-2 rounded-pill" style="border:2px solid #f2f2f2;">
                                    <div class='yu-lines-4'></div>
                                    <span href="" class="text-decoration-none text-secondary"><i class="bi-eye text-secondary"
                                        style="position:relative;top:0.5px;"></i></span> <span
                                        class="text-secondary fw-bold"
                                        style="position:relative;top:-0.5px;"><?php

                                        echo $data['count-imageu']['jml']; ?></span>
                                </span><?php Conditions::break2roles($posts['rolessatu'], $data['form-data-user2']['nama_pengguna']); ?></small>
                            </div>
                            <div class="mb-3 mt-2">
                                <div class="d-flex flex-row yu-fo">
                                    <div class="position-relative yu-mr-1">
                                        <a class="text-decoration-none text-secondary <?php Conditions::iloves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>"
                                            id="Loves_<?php echo $posts['idposts']; ?>"
                                            href="<?php echo BASEURL; ?>home/<?php echo Conditions::i4loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>/<?php echo $posts['idposts']; ?>"><i
                                                class="bi-heart<?php Conditions::i2loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>"></i></a><span
                                            class="mx-1 text<?php Conditions::i3loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-icount']['total']; ?></span>
                                    </div>

                                    <div class="position-relative yu-mr-1">
                                        <a href="<?php echo BASEURL; ?>home/<?php Conditions::repost3Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>/<?php echo $posts['idposts']; ?>"
                                            class="text-decoration-none text-secondary  <?php Conditions::repostStatus($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>"><i
                                                class="bi-repeat yu-fs-md-1"></i></a> <span
                                            class=" <?php Conditions::repost2Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-rcount']['total']; ?></span>
                                    </div>
                                    <div class="position-relative yu-mr-1">
                                        <a href="<?php echo BASEURL; ?>posts/read/<?php echo $posts['idposts']; ?>"
                                            class="text-decoration-none text-secondary"><i class="bi-chat text-secondary"></i></a>
                                        <span
                                            class="text-secondary yu-fo-re-1"><?php echo $data['form-data-comcount']['total']; ?></span>
                                    </div>
                                    <div class="position-relative yu-mr-1">
                                        <a href="<?php echo BASEURL; ?>home/share/<?php echo $posts['idposts']; ?>"
                                            class="text-decoration-none text-secondary"><i class="bi-share text-secondary"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="mt-2">
                                <a class="" href="#"><i class="bi-three-dots text-secondary fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!---- End Posted ---->
                <?php
            } 
            
        }
        $countFollowed = $data['count-followed']['total'];
        
        if($countFollowed < 5){
        $this->view('main/index-random', $data);
        }elseif($countFollowed > 5){
            echo "";
        }else{
            echo "";
        }
        ?>
        <div class="py-1 mt-1 mb-2 text-center justify-content-center">

            <a href="#" class="btn bg-white rounded"><i class="ar ar-refresh fs-5 text-white"></i></a>

        </div>
    </div>
    <?php
} else {
    header("Location: " . BASEURL . "home");
} ?>