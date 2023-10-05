<?php
if ($data['mobile'] == "Is Mobile" && $data['form-profiles']['tokenkey'] == $_SESSION['access_tokenkey']) {
    echo $_SESSION['alert']; unset($_SESSION['alert']);
    $nama = $data['form-profiles']['j_kelamin'];
    ?>
    <style>
        .yu-pos-x-1 {
            position: absolute;
            right: 15px;
            top: -10px;
        }
    </style>
    <div class="col-12 col-lg-6 col-md-9">
        <div class="p-3">
        <div class="mt-2 text-center justify-content-center position-relative">
        <a onclick="back()" class="text-decoration-none text-secondary yu-pos-x-1"><i class="bi-x-circle fs-3"></i></a>
        </div>
            <div class="my-2">
                <form action="<?php echo BASEURL; ?>edit/gen/<?php echo "GEN-".base64_encode($data['form-profiles']['nama_pengguna']."_gender_".$_SESSION['access_tokenkey']); ?>" method="POST">
                    <div class="mt-3 col-12 col-lg-2 col-md-2"> 
                    <div class="form-group mb-2">
                        <label for="Gender" class="mb-2 fw-bold">Gender</label>
                        <select name="gender" class="form-control">
                            <option selected disabled><?php echo Conditions::gen2r($nama); ?></option>
                            <option value="L">He/Him (Man)</option>
                            <option value="P">She/Her (Woman)</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['alert-group-text']);
    unset($_SESSION['alert-group-input']);
}

?>