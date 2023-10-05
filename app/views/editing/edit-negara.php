<?php
if ($data['mobile'] == "Is Mobile" && $data['form-profiles']['tokenkey'] == $_SESSION['access_tokenkey']) {
    echo $_SESSION['alert']; unset($_SESSION['alert']);
    $nama = $data['form-profiles']['negara'];
    $exp = explode("_CITY_", $nama);
    if($exp[1]){
    $city = $exp[0];
    $less = $exp[1];
    $e2xp = explode("_ADDRESS_", $less);
    $address = $e2xp[0];
    $le2ss = $e2xp[1];
    $e3xp = explode("_ZIP_", $le2ss);
    $zip = $e3xp[0];
    $country = $e3xp[1];
    }else if ($e3xp[1]) {
        $country = $e3xp[1];
    } else {
        $country = $nama;
    }
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
                <form action="<?php echo BASEURL; ?>edit/address/<?php echo "ID-".base64_encode($data['form-profiles']['nama_pengguna']."_country_".$_SESSION['access_tokenkey']); ?>" method="POST">
                    <div class="mt-3 col-12 col-lg-2 col-md-2">
                        <div class="form-group mb-2">
                            <label for="City" class="mb-2 fw-bold">City</label>
                            <input type="text" name="city" class="form-control w-100" value="<?php echo $city; ?>" autocomplete="off" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="Address" class="mb-2 fw-bold">Address</label>
                            <input type="text" name="address" class="form-control w-100" value="<?php echo $address; ?>" autocomplete="off" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="Code Zip" class="mb-2 fw-bold">Code Zip</label>
                            <input type="text" name="zip" class="form-control w-100" value="<?php echo $zip; ?>" autocomplete="off" />
                        </div>

                        <div class="form-group mb-2">
                            <label for="Country" class="mb-2 fw-bold">Country</label>
                            <input type="text" name="country" class="form-control w-100" value="<?php echo $country; ?>" autocomplete="off" />
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