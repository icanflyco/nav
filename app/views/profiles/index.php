<?php
error_reporting(0);
if ($data['mobile'] == "Is Mobile" && $data['form-user-data']['nama_pengguna'] == $data['namap']) {
?>
<style>
#yup-fotoSampul {
    display: none;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1031;
    margin: 0 auto;
    background-color: #000;
}

#yup-fotoProfiles {
    display: none;
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1031;
    margin: 0 auto;
    background-color: #000;
}

.cos-file {
    color: transparent;
}

.cos-file::-webkit-file-upload-button {
    visibility: hidden;
}

.cos-file::before {
    content: '';
    background: transparent;
    color: #000;
    padding: 50px 12px;
    border-radius: 4px;
    border: 2px dotted #000;
    width: 50%;
    margin: 0 auto;
    position: absolute;
    top: 50%;
    transform: translate(35%, 190%);
    text-align: center;
}

.cos-file:hover::before {
    border-color: black;
}

.cos-file:active {
    outline: 0;
}

.cos-file:hover::before {
    background: #000;
}

.stand {
    width: 100%;
    max-height: 100%;
    bottom: 0;
    left: 0;
    margin: auto;
    overflow: auto;
    position: fixed;
    right: 0;
    top: 0;
    -o-object-fit: contain;
    object-fit: contain;
}

#yu-btn-save,
#yu-btn-save-dua {
    position: fixed;
    bottom: 15px;
    right: 15px;
    left: 15px;
    z-index: 1032;
    width: 330px;
    margin: 0 auto;
    display: none;
}

.yu-panel-edit-foto-p {

    position: absolute;

    bottom: 2.5px;
    right: 2.5px;
    border-radius: 8px;
    z-index: 4;
}

.yu-foto-pages-p {

    height: 110px;

    width: 110px;
    background: #f2f2f2;
}

.yu-x-close {
    position: fixed;
    top: 15px;
    right: 15px;
    z-index: 1032;
    display: block;
}

@media (min-width:600px) and (max-width:1400px) {
    .cos-file::before {
        position: absolute;
        top: 50%;
        transform: translate(35%, 120%);
        text-align: center;
    }

    .yu-overs-profile {
        max-height: 100vh;
        overflow-y: auto;
        overflow-x: hidden;
    }
}
</style>
<div class="col-12 col-lg-6 col-md-9 yu-border-xy yu-overs-profile">
    <div class="yu-sampul position-relative">
        <?php
            if (strlen($data['form-user-data']['foto_sampul']) > 0) {
            ?>
        <img src="<?php echo BASEURL; ?>foto/default/loading.gif"
            data-echo="<?php echo BASEURL; ?>foto/sampul/<?php echo $data['form-user-data']['foto_sampul']; ?>"
            alt="<?php echo $data['form-user-data']['foto_sampul']; ?>" class="yu-sampul-pages yu-cover">
        <?php
            } else {
            ?>
        <img onerror='this.src="<?php echo BASEURL; ?>foto/default/sampul.jpg"'
            src="<?php echo BASEURL; ?>foto/default/sampul.jpg"
            alt="<?php echo $data['form-user-data']['foto_sampul']; ?>" class="yu-sampul-pages yu-cover">
        <?php
            }

            if ($_SESSION['access_tokenkey'] == $data['form-user-data']['tokenkey']) {
            ?>
        <div class="yu-panel-edit-sampul">
            <a onclick="takePhotoSampul()" class="text-decoration-none text-dark"><i
                    class="bi-camera yu-cam-edit fs-6"></i></a>
            <form id="yup-fotoSampul" method="post"
                action="<?php echo BASEURL; ?>p/changeSampul/<?php echo $_SESSION['access_tokenkey'] . "_change_" . $data['form-user-data']['nama_pengguna']; ?>"
                enctype="multipart/form-data">
                <input type="hidden" name="x"
                    value="<?php echo BASEURL; ?>foto/<?php echo $data['form-user-data']['foto_sampul']; ?>" />
                <div id="inputFotoSampul"></div>
                <div id="loadImagesampul"></div>
                <button id="yu-btn-save" class="fw-bold btn btn-primary" type="submit" name="">Save</button>
                <a href="<?php echo BASEURL; ?>p/<?php echo $data['form-user-data']['nama_pengguna']; ?>"
                    class="yu-x-close text-white"><i class="bi-x-circle fs-4"></i></a>
            </form>
        </div>
        <?php
            } ?>
        <div class="yu-foto rounded-circle">
            <div class="position-relative">
                <img src="<?php echo BASEURL; ?>foto/default/loading.gif"
                    data-echo="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-user-data']['foto_profile']; ?>"
                    alt="<?php echo $data['form-user-data']['foto_profile']; ?>"
                    class="yu-foto-pages-p yu-cover rounded-circle">
                <?php if ($_SESSION['access_tokenkey'] == $data['form-user-data']['tokenkey']) {
                    ?>
                <div class="yu-panel-edit-foto-p">
                    <a onclick="takePhotoProfiled()" class="text-decoration-none text-dark"><i
                            class="bi-camera yu-cam-edit fs-6"></i></a>
                </div>
                <form id="yup-fotoProfiles" method="post"
                    action="<?php echo BASEURL; ?>p/changeProfiles/<?php echo $_SESSION['access_tokenkey'] . "_changepro_" . $data['form-user-data']['nama_pengguna']; ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" name="x"
                        value="<?php echo BASEURL; ?>foto/<?php echo $data['form-user-data']['foto_sampul']; ?>" />
                    <div id="inputFotoProfiles"></div>
                    <div id="loadImageProfiles"></div>
                    <button id="yu-btn-save-dua" class="fw-bold btn btn-primary" type="submit" name="">Save</button>
                    <a href="<?php echo BASEURL; ?>p/<?php echo $data['form-user-data']['nama_pengguna']; ?>"
                        class="yu-x-close text-white"><i class="bi-x-circle fs-4"></i></a>
                </form>
                <?php
                    } ?>
            </div>
        </div>
    </div>
    <style>
    @media (max-width:591px) {
        .mrs-2 {
            margin-right: 12.5px;
        }
    }
    </style>
    <?php
        if ($_SESSION['access_tokenkey'] == $data['form-user-data']['tokenkey']) {
        ?>
    <div class="d-flex text-end justify-content-end px-2 pt-2 position-relative">
        <div class="col-2" style="position:relative;top:-5.5px;">
            <a href="" class="btn text-primary" style="font-size:1px"><i class="bi-bar-chart mx-1 fs-4"></i></a>
        </div>
        <div class="col-4 col-lg-3 col-md-3">
            <a href="<?php echo BASEURL; ?>p/id/<?php echo "YID-" . base64_encode($_SESSION['access_tokenkey'] . "_editing_" . $data['form-user-data']['nama_pengguna']); ?>"
                class="btn border-1 border border-primary text-primary w-100 rounded-pill" style="font-size:13px">Edit
                Profile</a>
        </div>
    </div>
    <?php
        } else {
            $data['post-id'] = $data['namap'];
            $data['post-tokenkey'] = $data['form-user-data']['tokenkey'];
            $data['tokenkey'] = $_SESSION['access_tokenkey'];
            $data['form-data-follow'] = $this->model('ModelsProfiles')->getAksesFollow($data);
        ?>
    <div class="d-flex text-end justify-content-end px-2 pt-2 position-relative">
        <div class="col-2" style="position:relative;top:-6px;">
            <a href="" class="btn text-primary" style="font-size:11px"><i class="bi-envelope mx-1 fs-4"></i></a>
        </div>
        <div class="col-3 text-center justify-content-center col-lg-2 col-md-2">
            <a href="<?php echo BASEURL; ?>p/<?php echo Conditions::i4follow($_SESSION['access_tokenkey'], $data['form-data-follow']['idposts'], $data['form-data-follow']['roles']); ?>/<?php echo base64_encode($data['form-user-data']['tokenkey'] . "_follow_" . $data['post-id']); ?>"
                class="<?php Conditions::ifollow($_SESSION['access_tokenkey'], $data['form-data-follow']['idposts'], $data['form-data-follow']['roles']); ?>"
                id="Loves_<?php echo $data['tokenkey']; ?>"
                style="font-size:13px"><?php Conditions::i2follow($_SESSION['access_tokenkey'], $data['form-data-follow']['idposts'], $data['form-data-follow']['roles']); ?></a>
        </div>
        <div class="col-1 mrs-2" style="position:relative;top:-5.5px;">
            <a href="" class="btn text-primary" style="font-size:11px"><i class="bi-three-dots-vertical fs-4"></i></a>
        </div>
    </div>
    <?php
        } ?>
    <div class="">
        <div class="pt-1  px-3 yu-border-y-1 pb-2" style="word-break:break-all;">
            <h1 class="h4 m-0 fw-bold"><?php echo ucwords(strtolower($data['form-user-data']['nama_belakang'])); ?>
                <small class="yu-fs-sm-1"
                    style="position:relative;top:-3px;"><?php Conditions::centang($data['form-user-data']['centang']); ?>
                    <?php Conditions::shehim($data['form-user-data']['j_kelamin']); ?></small>
            </h1>
            <div class="mb-1 yu-w-app">
                <small><b
                        class="text-secondary">@<?php echo $data['form-user-data']['nama_pengguna']; ?></b></small><br><?php echo Conditions::yunmeWork($data['form-user-data']['pekerjaan']); ?>
                <div class="yu-bio">
                    <?php echo $data['form-user-data']['bio']; ?> - <b>Joined,
                        <?php Conditions::dateBuat($data['form-user-data']['tanggal_buat']); ?></b>
                </div>
                <div class="my-1">
                    <a href="" class="text-decoration-none"><i class="bi-pin-map"></i>
                        <?php echo Conditions::countryPage($data['form-user-data']['negara']); ?></a>
                    - Brithday,
                    <?php Conditions::dateLahir($data['form-user-data']['tanggal_lahir']); ?>
                </div>
                <div class="my-1">

                    <?php Conditions::urlprf($data['form-user-data']['alamat']); ?>
                </div>

                <div class="yu-action yu-fs-md-0">
                    <a href="" class="text-decoration-none">
                        <?php
                            foreach ($data['form-data-post'] as $posed) {
                                $tokenkey2User = explode("_posting_", $posed['tokenkey_id']);
                                if ($tokenkey2User[0] == $data['form-user-data']['tokenkey']) {
                                    $counters += count($posed['rolessatu']);
                                }
                            }
                            echo $counters;
                            ?>
                        Posts •</a>
                    <a href="" class="text-decoration-none">
                        <?php
                            $countFollow += $data['count-followers']['total'];
                            echo $countFollow;
                            ?> Followers •</a>
                    <a href="" class="text-decoration-none">
                        <?php
                            $countFollowed += $data['count-followed']['total'];
                            if ($_SESSION['access_tokenkey'] == $data['form-user-data']['tokenkey']) {
                                echo $countFollowed;
                            } else {
                                echo "0";
                            }

                            ?> Following</a>
                </div>
            </div>
            <style>
            .yu-col-1 {
                width: 90px;
            }

            @media (max-width:500px) {
                .yu-col-1 {
                    width: 80px;
                }
            }
            </style>
            <!--- Story Saved --->
            <div class="yu-story-profiles">
                <div class="mt-2 d-flex flex-row yu-ov-x-1">
                    <!--- Lines Story --->
                    <?php
                        if ($_SESSION['access_tokenkey'] == $data['form-user-data']['tokenkey']) {

                        ?>
                    <div class="yu-col-1 text-center justify-content-center yu-mr-1">
                        <a href="#" class="text-decoration-none text-dark">
                            <img onerror='this.src="<?php echo BASEURL; ?>foto/default/plus.jpg"'
                                src="<?php echo BASEURL; ?>foto/default/plus.jpg" alt=""
                                class="yu-img-tren-2 border border-3 p-1 border-light yu-cover rounded-circle" />
                            <div class="my-1  fw-bold yu-fs-sm-1 text-center text-secondary">
                                Your Gallery
                            </div>
                        </a>
                    </div>
                    <!--- End Lines Story --->
                    <?php
                        } ?>
                    <!--- Lines Story --->

                    <div class="yu-col-1 text-center justify-content-center yu-mr-1">
                        <a href="#" class="text-decoration-none text-dark">
                            <img src="<?php echo BASEURL; ?>foto/default/loading.gif"
                                data-echo="<?php echo BASEURL; ?>foto/default/badges.png" alt=""
                                class="yu-img-tren-2 border border-3 p-1 border-light yu-cover rounded-circle" />
                            <div class="my-1  fw-bold yu-fs-sm-1 text-center text-secondary">
                                Yunme Platf..
                            </div>
                        </a>
                    </div>
                    <!--- End Lines Story --->

                </div>
            </div>
            <!--- End Story Saved --->
        </div>

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
                $data['form-data-ccount'] = $this->model('ModelsHome')->countCommentsy($datai);
                $tokenkeUser = explode("_posting_", $posts['tokenkey_id']);
                $data['count-image'] = $this->model("ModelsPosts")->getCountPostsImage($datai);

                if ($tokenkeUser[0] == $data['form-user-data']['tokenkey']) {
            ?>
        <!---- Posted Image 1---->
        <div class="mt-1 mt-lg-2 mt-md-2 yu-border-y-1" id="Loves_<?php echo $posts['idposts']; ?>">
            <div class="d-flex flex-row" data-bs-spy="scroll" data-bs-target="#Lovesid_<?php echo $posts['idposts']; ?>"
                data-bs-offset="0" tabindex="0">
                <div class="col-2 col-md-1 col-lg-1 position-relative" id="Lovesid_<?php echo $posts['idposts']; ?>"
                    style="z-index:3;">
                    <div class="p-2 h-100">
                        <div class="yu-pos-sticky-img_1 text-center">
                            <img id="yu-sticky_1"
                                onerror='this.src="<?php echo BASEURL; ?>foto/default/default-jpg.jpg"'
                                src="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-data-user']['foto_profile']; ?>"
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
                    </style>
                    <div class="yu-lines"></div>
                    <h2 class="m-0 h6 pt-2 fw-bold position-relative">
                        <?php echo ucwords(strtolower($data['form-data-user']['nama_belakang'])); ?>
                        <?php Conditions::centang($data['form-data-user']['centang']); ?></h2>
                    <div class="text-dark position-relative">
                        <small class="yu-fs-md-0"><span style='font-size:13px;'><a href="#"
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
                            <?php Conditions::postStatus($posts['status'], $display, $posts['idposts']); ?> </small>
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
                                style="border:2px solid #f2f2f2;"><?php echo $posts['dates']; ?></span> <span> <span
                                    class="position-relative  py-1 fw-bold px-2 rounded-pill"
                                    style="border:2px solid #f2f2f2;">
                                    <div class='yu-lines-4'></div>
                                    <a href="" class="text-decoration-none text-secondary"><i
                                            class="bi-eye text-secondary" style="position:relative;top:0.5px;"></i></a>
                                    <span class="text-secondary fw-bold"
                                        style="position:relative;top:-0.5px;"><?php echo $data['count-image']['jml']; ?></span>
                                </span><?php Conditions::break2roles($posts['rolessatu'], $data['form-data-user2']['nama_pengguna']); ?></small>
                    </div>
                    <div class="mb-3 mt-2">
                        <div class="d-flex flex-row yu-fo">
                            <div class="position-relative yu-mr-1">
                                <a class="text-decoration-none text-secondary <?php Conditions::iloves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>"
                                    id="Loves_<?php echo $posts['idposts']; ?>"
                                    href="<?php echo BASEURL; ?>p/<?php echo Conditions::i4loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>/<?php echo $posts['idposts']; ?>"><i
                                        class="bi-heart<?php Conditions::i2loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?>"></i></a><span
                                    class="mx-1 text<?php Conditions::i3loves($_SESSION['access_tokenkey'], $data['form-data-iloves']['idposts'], $data['form-data-iloves']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-icount']['total']; ?></span>
                            </div>

                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>p/<?php Conditions::repost3Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>/<?php echo $posts['idposts']; ?>"
                                    class="text-decoration-none text-secondary  <?php Conditions::repostStatus($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?>"><i
                                        class="bi-repeat yu-fs-md-1"></i></a> <span
                                    class=" <?php Conditions::repost2Status($_SESSION['access_tokenkey'], $data['form-data-irepost']['idposts'], $data['form-data-irepost']['roles']); ?> yu-fo-re-1"><?php echo $data['form-data-rcount']['total']; ?></span>
                            </div>
                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>posts/read/<?php echo $posts['idposts']; ?>"
                                    class="text-decoration-none text-secondary"><i
                                        class="bi-chat text-secondary"></i></a> <span
                                    class="text-secondary yu-fo-re-1"><?php echo $data['form-data-ccount']['total']; ?></span>
                            </div>
                            <div class="position-relative yu-mr-1">
                                <a href="<?php echo BASEURL; ?>home/share/<?php echo $posts['idposts']; ?>"
                                    class="text-decoration-none text-secondary"><i
                                        class="bi-share text-secondary"></i></a>
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
            } ?>

    </div>
    <div class="py-1 mt-1 mb-2 text-center justify-content-center">
        <a href="#" class="btn btn-white text-white rounded"><i class="ar ar-refresh fs-5"></i></a>
    </div>

</div>

<script>
var takePhotos = document.getElementById("takePhoto");

function takePhotoSampul() {
    document.getElementById("yup-fotoSampul").style.display = "block";
    $("#inputFotoSampul").append(
        '<input type="file" id="takePhoto" name="fotoSampul" accept=".jpg, .jpeg, .png" onchange="loadFoto(event)" required class="cos-file" />'
    );
    takePhoto.click();
}
</script>
<script>
function takePhotoProfiled() {
    document.getElementById("yup-fotoProfiles").style.display = "block";
    $("#inputFotoProfiles").append(
        '<input type="file" id="takePhoto" name="fotoProfiles" accept=".jpg, .jpeg, .png" onchange="loadFotop(event)" required class="cos-file" />'
    );
    takePhoto.click();
}
</script>
<script type="text/javascript">
var loadFoto = function(event) {
    var output = document.getElementById('output-img-sampul');
    var total_file = document.getElementById("takePhoto").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#loadImagesampul').append("<img id='output-img-sampul' width='100%' height='auto' class='stand' src='" +
            URL.createObjectURL(event.target.files[i]) + "'>");
        document.getElementById("yu-btn-save").style.display = "block";
    }
};
var loadFotop = function(event) {
    var output = document.getElementById('output-img-profiles');
    var total_file = document.getElementById("takePhoto").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#loadImageProfiles').append(
            "<img id='output-img-profiles' width='100%' height='auto' class='stand' src='" + URL
            .createObjectURL(event.target.files[i]) + "'>");
        document.getElementById("yu-btn-save-dua").style.display = "block";
    }
};
</script>
<?php
} else {
?>
<a id="clicked" href="<?php echo BASEURL; ?>"></a>
<script>
document.getElementById("clicked").click();
</script>
<?php
} ?>