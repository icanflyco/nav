<?php
error_reporting(0);

if ($data['mobile'] == "Is Mobile") {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport"
        content="initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, width=device-width, height=device-height, target-densitydpi=device-dpi">
        <title><?php echo $data['judul']; ?></title>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/dist/reset.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/dist/css/bootstrap-reset.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/font/bootstrap-icons.css" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>assets/font/ardesico.css" type="text/css" media="all" />
        <script src="<?php echo BASEURL; ?>assets/dist/js/jquery-latest.js"></script>
        <script src="<?php echo BASEURL; ?>assets/dist/js/jquery-3.0.1.min.js"></script>
        <style>
            ::-webkit-scrollbar {
                width: 0px;
                background-color: transparent !important;
                color: transparent;
            }
            .yu-loadmores .col-12 {
                display: none;
            }
            .yu-loadmores .yu-contents {
                width: 100%;
            }
        </style>
        <?php

        foreach ($data['post-comments'] as $comments) {
            $status = base64_decode($comments['status']);
            $semi = explode("_replace_", $status);
            $explode2s = explode("_display_", $semi[1]);
            $token = explode("_posting_", $comments['tokenkey_id']);
            $data['user-data-co'] = $this->model("ModelsPosts")->getUsersByTokens($token[0]);
            if ($explode2s[0] == $data['idposts-start'] && $comments['rolessatu'] == "comments" || $explode2s[0] == $data['idposts-start'] && $comments['rolessatu'] == "balas-comments") {
                ?>
                <script>
                    jQuery(document).ready(function($) {
                        $(function () {
                            $(".yu-loadmores .col-12").slice(0, 7).show();
                            if ($(".yu-loadmores .col-12").length == 0) {
                                $(".yu-loadmores .yu-load-moredly").hide();
                        } else if ($(".yu-loadmores .col-12").length  < 7) {
                                $(".yu-loadmores .yu-load-moredly").hide();
                        } else {
                                $(".yu-loadmores .yu-load-moredly").show();

                            }
                            $("body").on('click touchstart', '.yu-loadmores .yu-load-moredly', function (e) {
                                e.preventDefault();
                                $(".yu-loadmores .col-12:hidden").slice(0, 7).slideDown();
                                if ($(".yu-loadmores .col-12:hidden").length == 0) {
                                    $(".yu-loadmores .yu-load-moredly").css('visibility', 'hidden');
                                }
                                $('html,body').animate({
                                    scrollTop: $(this).offset().top
                                }, 1000);
                            });
                        });
                    });
                </script>
                <?php } }?>
            </head>

            <body class="max mx-auto" oncontextmenu="return false">
                <?php
            } else {
                header("Location: ".BASEURL);
            } ?>