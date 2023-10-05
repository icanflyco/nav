<?php
if ($data['mobile'] == "Is Mobile" && $data['form-profiles']['tokenkey'] == $_SESSION['access_tokenkey']) {
    echo $_SESSION['alert']; unset($_SESSION['alert']);
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
                <form action="<?php echo BASEURL; ?>edit/bi/<?php echo "BIO-".base64_encode($data['form-profiles']['nama_pengguna']."_texts_".$_SESSION['access_tokenkey']); ?>" method="POST">
                   <div class="mt-3 col-12 col-lg-4 col-md-4">
                    <div class="form-group mb-2">
                        <label for="Bio" class="mb-2 fw-bold">BIO</label>
                        <textarea id="InputText" type="text" rows="10" cols="10" name="bio" class="form-control w-100" autocomplete="off" placeholder="Write Bio?"><?php echo $data['form-profiles']['bio']; ?></textarea>
                        <div id="Limit"></div>
                    </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf-8">
        var InputText = document.getElementById('InputText');
        var Limit = document.getElementById("Limit");
        var limit = 97;
        Limit.textContent = 0 + "/" + limit;

        InputText.addEventListener('input', function() {
            var textLength = InputText.value.length;
            Limit.textContent = textLength + "/" + limit;

            if (textLength > limit) {
                InputText.style.borderColor = "#ff2851";
                Limit.style.color = "#ff2851";
            } else {
                InputText.style.borderColor = "#31821b";
                Limit.style.color = "#31821b";
            }

        })
    </script>
    <?php
    unset($_SESSION['alert-group-text']);
    unset($_SESSION['alert-group-input']);
}

?>