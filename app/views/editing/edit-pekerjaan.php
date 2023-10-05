<?php
if ($data['mobile'] == "Is Mobile" && $data['form-profiles']['tokenkey'] == $_SESSION['access_tokenkey']) {
    echo $_SESSION['alert']; unset($_SESSION['alert']);
    $nama = $data['form-profiles']['pekerjaan'];
    $exp = explode("_PERU_", $nama);
    $pekerjaan = $exp[0];
    $perusahaan = $exp[1];
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
                <form action="<?php echo BASEURL; ?>edit/per/<?php echo "ID-".base64_encode($data['form-profiles']['nama_pengguna']."_pekerjaan_".$_SESSION['access_tokenkey']); ?>" method="POST">
                    <div class="mt-3 col-12 col-lg-2 col-md-2">
                        <div class="form-group mb-2">
                            <label for="Worked" class="mb-2 fw-bold">Worked</label>
                            <input type="text" name="work" class="form-control w-100" value="<?php echo $pekerjaan; ?>" autocomplete="off" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="Company" class="mb-2 fw-bold">Company</label>
                            <input type="text" name="peru" class="form-control w-100" value="<?php echo $perusahaan; ?>" autocomplete="off" />
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 w-100 fw-bold">Save</button>
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