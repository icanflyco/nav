<?php

if ($data['mobile'] == "Is Mobile" && $data['post-status']['idposts'] == $data['post-id']) {
    ?>
    <style>
        .yu-ovy-3 {
            height: 515px;
            overflow-y: auto;
            overflow-x: hidden;
        }

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
        .yu-block {
            height: 60px;
            width: 100%;
        }
    </style>
    <div class="col-12 col-lg-6 col-md-9" style="border-left:0.75px solid #adb5bd;border-right:0.75px solid #adb5bd;">
        <!--- Flex Display Logo --->
        <div class="col-12 bg-white sticky-top top-0 py-2 yu-border-y-1 text-center justify-content-center text-md-center text-lg-center justify-content-lg-center" style="z-index:4;">
            <a href="<?php echo BASEURL; ?>home" class="">
                <img onerror="this.src='<?php echo BASEURL; ?>foto/default/branded.png'" src="<?php echo BASEURL; ?>foto/default/branded.png" alt="" class="yu-logov yu-cover" />
            </a>
        </div>
        <!--- Flex Display Logo --->
        <!---- Posted Image 4 ---->
        <div class="pt-1 yu-ovy-3">
            <div class="d-flex flex-row">
                <div class="col-2 col-md-1 position-relative col-lg-1">
                    <div class="p-2" id="myImages" style="max-height:1000000px">
                        <div class="yu-pos-sticky-img_1 text-center">
                            <img id="yu-sticky_1" onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['user-data']['foto_profile']; ?>"alt="Foto_<?php echo $data['user-data']['foto_profile']; ?>"
                            class="yu-profile-post yu-cover position-relative rounded-circle" style="z-index:3;" />
                        </div>
                    </div>
                </div>
                <style>
                    .yu-lines-9 {
                        border-top: 2px solid #f2f2f2;
                        width: 60px;
                        position: absolute;
                        top: 13px;
                        left: 22px;
                        z-index: -0;
                    }
                    .yu-lines-3 {
                        border-top: 2px solid #f2f2f2;
                        width: 40px;
                        position: absolute;
                        top: 20px;
                        left: -72.5px;
                        z-index: -0;

                    }
                    .yu-lines-8 {
                        border-top: 2px solid #000;
                        width: 40px;
                        position: absolute;
                        top: 13px;
                        left: -25px;
                        z-index: -0;
                    }
                    .yu-lines-2 {
                        border-left: 2px solid #f2f2f2;
                        height: 104%;
                        position: absolute;
                        bottom: -22px;
                        left: -30px;
                        z-index: -0;
                    }
                    .yu-lines-co-1 {
                        border-left: 2px solid #f2f2f2;
                        height: 105%;
                        position: absolute;
                        top: -136px;
                        left: -30px;
                        z-index: -0;
                    }
                    .yu-lines-6 {
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
                <div class="col-9 col-md-10 col-lg-10 px-md-2 position-relative">
                    <h2 class="m-0 h6 pt-2 fw-bold"><?php echo ucwords(strtolower($data['user-data']['nama_belakang'])); ?> <?php Conditions::centang($data['user-data']['centang']); ?></h2>
                    <div class="text-dark position-relative">
                        <div class="yu-lines-2"></div>
                        <small class="yu-fs-md-0"><span style='font-size:13px;'><a href="#" class="text-decoration-none text-secondary fw-bold"> @<?php echo substr($data['user-data']['nama_pengguna'],0,12); ?>..</a>
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
                            <?php Conditions::breakroles($data['post-status']['rolessatu'], $data['user-data2']['nama_pengguna']);
                            ?>
                        </span> <br><?php Conditions::post2Status($data['post-status']['status'], $display, $data['post-status']['idposts']); ?></small>

                        <?php
                        if ($data['post-status']['rolessatu'] == "comments" || $data['post-status']['rolessatu'] == "balas-comments") {
                            ?>

                            <div class="yu-comments-lines">
                                <?php
                                foreach ($data['post-comments'] as $co2mments) {

                                    $status = base64_decode($co2mments['status']);
                                    $explos = explode("_replace_", $status);
                                    $semi = explode("_display_", $explos[1]);
                                    $idposts = $semi[0];
                                    if ($co2mments['rolessatu'] == "comments" && $co2mments['idposts'] == $data['post-status']['idposts'] || $co2mments['rolessatu'] == "balas-comments" && $co2mments['idposts'] == $data['post-status']['idposts']) {
                                        $datai = $this->model("ModelsHome")->getPostsById($idposts);

                                        $data['tokenkey-posts'] = $datai;
                                        $data2Explode = explode("_posting_", $data['tokenkey-posts']['tokenkey_id']);
                                        #End Explode
                                        #Data Fetch 1 Users State
                                        $data['form-data-user-dua'] = $this->model('ModelsHome')->getAksesByToken($data2Explode[0]);
                                        ?>
                                        <div class="d-flex position-relative">
                                            <div class="col-2">
                                                <img id="yu-sticky_1" onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data-user-dua']['foto_profile']; ?>" alt="" class="yu-profile-post-2 yu-cover rounded-circle" />
                                            </div>
                                            <div class="col-9">
                                                <b style="font-size:14px;"><?php echo substr(ucwords(strtolower($data['form-data-user-dua']['nama_belakang'])), 0, 18); ?> <?php Conditions::centang($data['form-data-user-dua']['centang']); ?></b>
                                                <small class="fw-bold text-secondary">@<?php echo $data['form-data-user-dua']['nama_pengguna']; ?></small>
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

                    <div class="text-secondary position-relative postStatus">
                        <div class="yu-lines-6"></div>
                        <small class="yu-fs-sm-1"> <span class="py-1 fw-bold px-2 rounded-pill" style="border:2px solid #f2f2f2;"><?php echo $data['post-status']['dates']; ?></span>                               <span class="position-relative  py-1 fw-bold px-2 rounded-pill" style="border:2px solid #f2f2f2;"><div class='yu-lines-4'></div>
                            <a href="" class="text-decoration-none text-secondary"><i
                                class="bi-eye text-secondary" style="position:relative;top:0.5px;"></i></a> <span class="text-secondary fw-bold" style="position:relative;top:-0.5px;"><?php echo $data['count-image']['jml']; ?></span></span><?php Conditions::break2roles($data['post-status']['rolessatu'], $data['user-data']['nama_pengguna']); ?></small>
                    </div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex flex-row yu-fo">
                            <div class="position-relative yu-mr-1">
                                <a class="text-decoration-none text-secondary <?php Conditions::iloves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>" id="Loves_<?php echo $data['form-data-iloves']['idposts']; ?>" href="<?php echo BASEURL; ?>posts/<?php echo Conditions::i4loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>/<?php echo $data['post-status']['idposts']; ?>"><i class="bi-heart<?php Conditions::i2loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>"></i></a><span class="mx-1 text<?php Conditions::i3loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-icount']['total']; ?></span>
                            </div>

                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>posts/<?php Conditions::repost3Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>/<?php echo $data['post-status']['idposts']; ?>" class="text-decoration-none text-secondary  <?php Conditions::repostStatus($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>"><i class="bi-repeat yu-fs-md-1"></i></a> <span class=" <?php Conditions::repost2Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-rcount']['total']; ?></span>
                            </div>
                            <div class="position-relative yu-mr-1">
                                <a href="" class="text-decoration-none text-secondary"><i
                                    class="bi-chat text-secondary"></i></a> <span
                                    class="text-secondary yu-fo-re-1"><?php echo $data['form-data-comcount']['total']; ?></span>
                            </div>
                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>home/share/<?php echo $data['post-status']['idposts']; ?>" class="text-decoration-none text-secondary"><i
                                    class="bi-share text-secondary"></i></a>
                            </div>
                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>home/boommark/<?php echo $data['post-status']['idposts']; ?>" class="text-decoration-none text-secondary"><i
                                    class="bi-bookmark text-secondary"></i></a>
                            </div>
                        </div>
                    </div>
                    <!---- Form Comments -->

                    <div class="yu-fixed-sm-2 bg-white">
                        <div class="d-flex flex-row my-2">
                            <div class="col-12">
                                <form action="<?php echo BASEURL; ?>posts/<?php Conditions::actionComment($data['post-status']['rolessatu']); ?>/<?php echo $data['post-status']['idposts']; ?>" method="post" class="d-flex text-center justify-content-center">
                                    <input type="text" name="comments" id="" class="form-control w-100 rounded-pill py-0"
                                    placeholder="Make a Comments?" autocomplete="off">

                                    <button type="submit" class="btn rounded-circle"><i
                                        class="bi-send fs-5 text-secondary"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <style>
                        .yu-cop-1 {
                            width: 25px;
                            height: 25px;
                            border-radius: 100%;
                            object-fit: cover;
                            border: 0.75px solid #f2f2f2;
                            position: relative;
                            z-index: 1;
                        }
                        .yu-mr-1m {
                            margin-left: -7.5px;
                            margin-top: 3.5px;
                        }
                        .yu-fs-sm-2 {
                            font-size: 13px;
                        }
                    </style>

                    <!---- Comments list -->
                    <div class="yu-loadmores">
                        <?php
                        foreach ($data['post-comments'] as $comments) {
                            $status = base64_decode($comments['status']);
                            $semi = explode("_replace_", $status);
                            $explode2s = explode("_display_", $semi[1]);
                            $token = explode("_posting_", $comments['tokenkey_id']);
                            $data['user-data-co'] = $this->model("ModelsPosts")->getUsersByTokens($token[0]);
                            if ($explode2s[0] == $data['idposts-start'] && $comments['rolessatu'] == "comments" || $explode2s[0] == $data['idposts-start'] && $comments['rolessatu'] == "balas-comments") {
                                $datac = $comments['idposts'];
                                $data['form-data-icloves'] = $this->model('ModelsHome')->getAksesLoves($datac);
                                ?>

                                <div class="col-12 my-2">
                                    <div class=" card bg-white border-0 rounded-0">
                                        <div class="d-flex flex-row yu-contents">
                                            <div class="yu-lines-co-1"></div>
                                            <div class="col-2 col-lg-1 col-md-1">
                                                <img onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"' src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['user-data-co']['foto_profile']; ?>" alt="" srcset="" class="yu-com-img border-2 border position-relative yu-cover rounded-circle" style="background:#000;z-index:1;">
                                            </div>

                                            <div class="col-10 col-lg-11 col-md-11 position-relative">
                                                <div class="yu-lines-3"></div>

                                                <div class="w-100 px-3 py-2 yu-bg-gray yu-rounded-normal">
                                                    <div class="d-flex flex-row">
                                                        <div class="col-11">
                                                            <b style="font-size:14px;"><?php echo substr(ucwords(strtolower($data['user-data-co']['nama_belakang'])), 0, 18); ?> <?php Conditions::centang($data['user-data-co']['centang']); ?></b>

                                                            <div class="fw-bold text-secondary yu-fs-sm-1">
                                                                @<?php echo strtolower($data['user-data-co']['nama_pengguna']); ?>
                                                            </div>

                                                        </div>
                                                        <div class="col-1">
                                                            <a class="text-secondary text-decoration-none"><i
                                                                class="bi-three-dots fs-6"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="yu-post">
                                                        <a href="<?php echo BASEURL; ?>posts/read/<?php echo $comments['idposts']; ?>"class="text-decoration-none text-dark yu-fs-md-0"><?php Conditions::CommentsStatus($semi[0]); ?></a>
                                                    </div>
                                                    <div class="yu-date">
                                                        <small class="text-secondary"><?php echo $comments['dates']; ?></small>
                                                    </div>
                                                </div>
                                                <!--- Based Loves --->
                                                <div class="mb-2 mt-2">
                                                    <div class="d-flex flex-row yu-fo">
                                                        <div class="position-relative yu-mr-1">
                                                            <a class="text-decoration-none text-secondary <?php
                                                                $datais['tokenkey'] = $_SESSION['access_tokenkey'];
                                                                $datais['post-id'] = $comments['idposts'];
                                                                $data['form-data-ivloves'] = $this->model('ModelsHome')->getAksesLoves($datais);
                                                                $data['form-data-iscount'] = $this->model('ModelsHome')->countLoves($datais);
                                                                $data['form-data-ivrepost'] = $this->model('ModelsHome')->getAksesRepost($datais);
                                                                $data['form-data-urcount'] = $this->model('ModelsHome')->countRepost($datais);
                                                                $data['form-data-covcount'] = $this->model('ModelsHome')->countCommentsy($datais);
                                                                Conditions::iloves($_SESSION['access_tokenkey'], $data['form-data-ivloves']['idposts'], $data['form-data-ivloves']['roles']); ?>" id="Loves_<?php echo $data['form-data-ivloves']['idposts']; ?>" href="<?php echo BASEURL; ?>posts/<?php echo Conditions::i4loves($_SESSION['access_tokenkey'], $data['form-data-ivloves']['idposts'], $data['form-data-ivloves']['roles']); ?>/<?php echo $comments['idposts']; ?>_uid_<?php echo $data['post-status']['idposts']; ?>"><i class="bi-heart<?php Conditions::i2loves($_SESSION['access_tokenkey'], $data['form-data-ivloves']['idposts'], $data['form-data-ivloves']['roles']); ?>"></i></a><span class="mx-1 text<?php Conditions::i3loves($_SESSION['access_tokenkey'], $data['form-data-ivloves']['idposts'], $data['form-data-ivloves']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-iscount']['total']; ?></span>
                                                        </div>
                                                        <div class="position-relative yu-mr-1">
                                                            <a href="<?php echo BASEURL; ?>posts/<?php Conditions::repost3Status($_SESSION['access_tokenkey'], $data['form-data-ivrepost']['idposts'], $data['form-data-ivrepost']['roles']); ?>/<?php echo $comments['idposts']."_uid_".$data['post-status']['idposts']; ?>" class="text-decoration-none text-secondary  <?php Conditions::repostStatus($_SESSION['access_tokenkey'], $data['form-data-ivrepost']['idposts'], $data['form-data-ivrepost']['roles']); ?>"><i class="bi-repeat yu-fs-md-1"></i></a> <span class=" <?php Conditions::repost2Status($_SESSION['access_tokenkey'], $data['form-data-ivrepost']['idposts'], $data['form-data-ivrepost']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-urcount']['total']; ?></span>
                                                        </div>

                                                        <div class="position-relative yu-mr-1">
                                                            <a href="" class="text-decoration-none text-secondary"><i
                                                                class="bi-chat text-secondary"></i></a> <span
                                                                class="text-secondary yu-fo-re-1"><?php echo $data['form-data-covcount']['total']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        } ?>
                        <!---- End Comments list -->

                        <style>
                            .yu-load-cop {
                                border: 2px solid #f2f2f2;
                                background: #f2f2f2;
                                color: #000;
                                border-radius: 20px;
                                font-size: 12px;
                            }


                        </style>
                        <div class="col-12 mb-3 text-center justify-content-center position-relative yu-load-moredly">
                            <button class="yu-load-cop px-2 py-1 fw-bold">Load Comments</button>
                        </div>

                    </div>
                </div>
                <!--- insal -->
                <div class="col-1 position-relative">
                    <div class="smalls">
                        <div class="mt-2">
                            <a class="" href="#"><i class="bi-three-dots text-secondary  fs-5"></i></a>
                        </div>
                        <div class="mt-1">
                            <a class="" onclick="back()"><i class="bi-x-circle-fill text-secondary fs-5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---- End Posted ---->
        <div class="yu-block">

        </div>
    </div>
    <?php
} else {
    ?>
    <a id="clicked" href="<?php echo BASEURL; ?>"></a>
    <script>
        document.getElementById("clicked").click();
    </script>
    <?php
} ?>