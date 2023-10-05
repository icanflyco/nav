<?php

if ($data['mobile'] == "Is Mobile" && $data['form-profiles']['tokenkey'] == $_SESSION['access_tokenkey']) {
?>
<style>
.yu-edit-fo-pro {
    width: 120px;
    height: 120px;
}

.yu-overs-y-1 {
    height: 75vh;
    overflow-y: auto;
    overflow-x: hidden;
}

#yu-backdrop {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1031;
    background: #000;
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

    .yu-overs-y-1 {
        height: 90vh;
    }
}
</style>
<div class="col-12 col-lg-6 col-md-9 yu-overs-y-1 yu-border-xy">
    <?php echo $_SESSION['alert'];
        unset($_SESSION['alert']); ?>
    <div class="text-center mt-2 justify-content-center" style="border-bottom:0.75px solid #f2f2f2;">
        <img src="<?php echo BASEURL; ?>foto/default/loading.gif"
            data-echo="<?php echo BASEURL; ?>foto/profiles/<?php echo $data['form-profiles']['foto_profile']; ?>"
            class="yu-cover rounded-circle yu-edit-fo-pro" />
        <div class="mt-2 mb-3">
            <a onclick="priviewProf()" class="btn btn-light">
                Change Photo
            </a>
        </div>
        <form id="yu-backdrop"
            action="<?php echo BASEURL; ?>p/changeProfiles/<?php echo $_SESSION['access_tokenkey'] . "_changepro_" . $data['form-profiles']['nama_pengguna']; ?>"
            method="POST" enctype="multipart/form-data">
            <div id="inputFotoProfilesDua"></div>
            <div id="loadImageProfilesDua"></div>
            <button id="yu-btn-save" class="fw-bold btn btn-primary" type="submit" name="">Save</button>
            <a onclick="closePrev()" class="yu-x-close text-white"><i class="bi-x-circle fs-4"></i></a>
        </form>
    </div>
    <div class="w-100 py-2 px-3 mt-3">
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Name
                </div>
                <h1 class="m-0 py-1 h6 fw-bold"><?php echo $data['form-profiles']['nama_belakang']; ?></h1>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/<?php echo "NAMEBASE-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_e_nama_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Username
                </div>
                <h1 class="m-0 py-1 h6"><?php echo $data['form-profiles']['nama_pengguna']; ?></h1>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/u/<?php echo "DROPID-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_uses_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Web Address
                </div>
                <h2 class="m-0 py-1 h6 "><?php Conditions::url2prf($data['form-profiles']['alamat']); ?></h2>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/uri/<?php echo "URI-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_urios_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    No Telp.
                </div>
                <h1 class="m-0 py-1 h6 fw-bold"><?php echo $data['form-profiles']['no_telpon']; ?></h1>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/no/<?php echo "NUM-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_notelp_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Bio
                </div>
                <p class="m-0 py-1 h6">
                    <?php echo $data['form-profiles']['bio']; ?>
                </p>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/bio/<?php echo "BIO-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_texts_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Gender
                </div>
                <h1 class="m-0 py-1 h6 fw-bold"><?php echo Conditions::shehim($data['form-profiles']['j_kelamin']); ?>
                </h1>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/gender/<?php echo "GEN-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_gender_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Address
                </div>
                <h2 class="m-0 py-1 h6 fw-bold"><?php echo Conditions::countryPage($data['form-profiles']['negara']); ?>
                </h2>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/zippy/<?php echo "ID-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_country_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Working
                </div>
                <h2 class="m-0 py-1 h6"><?php echo Conditions::yunmeWork($data['form-profiles']['pekerjaan']); ?></h2>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/work/<?php echo "ID-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_perusahaan_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="col-10">
                <div class="">
                    Birthday
                </div>
                <h2 class="m-0 py-1 fw-bold h6"><?php Conditions::dateLahir($data['form-profiles']['tanggal_lahir']); ?>
                </h2>
            </div>
            <div class="col-2">
                <div class="text-end justify-content-end">
                    <a href="<?php echo BASEURL; ?>edit/lahir/<?php echo "LHR-" . base64_encode($data['form-profiles']['nama_pengguna'] . "_tanggal_" . $_SESSION['access_tokenkey']); ?>"
                        class="text-decoration-none">Edit</a>
                </div>
            </div>
        </div>
        <div class="my-2 text-center justify-content-center">
            <a href="<?php echo BASEURL; ?>p/<?php echo $data['form-profiles']['nama_pengguna']; ?>"
                class="btn btn-primary fw-bold">Save</a>
        </div>
    </div>
</div>
<script>
function priviewProf() {
    document.getElementById("yu-backdrop").style.display = "block";
    $("#inputFotoProfilesDua").append(
        '<input type="file" id="takePhoto" name="fotoProfiles" accept=".jpg, .jpeg, .png" onchange="loadFotoprof(event)" required class="cos-file" />'
    );
    takePhoto.click();
}
var loadFotoprof = function(event) {
    var output = document.getElementById('output-img-profiles-dua');
    var total_file = document.getElementById("takePhoto").files.length;
    for (var i = 0; i < total_file; i++) {
        $('#loadImageProfilesDua').append(
            "<img id='output-img-profiles-dua' width='100%' height='auto' class='stand' src='" + URL
            .createObjectURL(event.target.files[i]) + "'>");
        document.getElementById("yu-btn-save").style.display = "block";
    }
};

function closePrev() {
    document.getElementById("yu-backdrop").style.display = "none";
}
</script>
<?php
} ?>